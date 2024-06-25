<?php

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use GuzzleHttp\Exception\RequestException;

defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

/**
 * Load custom lang for the given language
 *
 * @since 3.0.0
 *
 * @param  string $language
 *
 * @return void
 */
function load_custom_lang_file($language)
{
    $CI = &get_instance();
    if (file_exists(APPPATH . 'language/' . $language . '/custom_lang.php')) {
        if (array_key_exists('custom_lang.php', $CI->lang->is_loaded)) {
            unset($CI->lang->is_loaded['custom_lang.php']);
        }
        $CI->lang->load('custom_lang', $language);
    }
}

/**
 * Generate short_url
 * @since  Version 2.7.3
 *
 * @param  array $data
 * @return mixed Url
 */
function app_generate_short_link($data)
{
    hooks()->do_action('before_generate_short_link', $data);
    $accessToken = get_option('bitly_access_token');
    $client      = new Client();

    try {
        $response = $client->request('POST', 'https://api-ssl.bitly.com/v4/bitlinks', [
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Accept'        => 'application/json',
            ],
            'json' => [
                'long_url' => $data['long_url'],
                'domain'   => 'bit.ly',
                'title'    => $data['title'],
            ],
        ]);

        $response = json_decode($response->getBody());

        return $response->link;
    } catch (RequestException $e) {
        log_activity('Bitly ERROR' . (string) $e->getResponse()->getBody());

        return false;
    }
}
/**
 * Archive/remove short url
 * @since  Version 2.7.3
 *
 * @param  string $link
 * @return boolean
 */
function app_archive_short_link($link)
{
    $accessToken = get_option('bitly_access_token');

    if (empty($accessToken)) {
        return false;
    }

    hooks()->do_action('before_archive_short_link', $link);

    $link = str_replace('https://', '', $link);

    $client = new Client();

    try {
        $client->patch('https://api-ssl.bitly.com/v4/bitlinks/' . $link, [
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Accept'        => 'application/json',
            ],
            'json' => [
                'archived' => true,
            ],
        ]);

        return true;
    } catch (RequestException $e) {
        log_activity('Bitly ERROR' . (string) $e->getResponse()->getBody());

        return false;
    }
}

/**
 * Get total number of days overdue
 * @since  Version 2.7.1
 * @param  object $duedate  due date
 * @return int days overdue
 */
function get_total_days_overdue($duedate)
{
    if (Carbon::parse($duedate)->isPast()) {
        return Carbon::parse($duedate)->diffInDays();
    }

    return 0;
}

/**
 * Check if the document should be RTL or LTR
 * The checking are performed in multiple ways eq Contact/Staff Direction from profile or from general settings *
 * @param  boolean $client_area
 * @return boolean
 */
function is_rtl($client_area = false)
{
    $CI = &get_instance();
    if (is_client_logged_in()) {
        $CI->db->select('direction')->from(db_prefix() . 'contacts')->where('id', get_contact_user_id());
        $direction = $CI->db->get()->row()->direction;

        if ($direction == 'rtl') {
            return true;
        } elseif ($direction == 'ltr') {
            return false;
        } elseif (empty($direction)) {
            if (get_option('rtl_support_client') == 1) {
                return true;
            }
        }

        return false;
    } elseif ($client_area == true) {
        // Client not logged in and checked from clients area
        if (get_option('rtl_support_client') == 1) {
            return true;
        }
    } elseif (is_staff_logged_in()) {
        if (isset($GLOBALS['current_user'])) {
            $direction = $GLOBALS['current_user']->direction;
        } else {
            $CI->db->select('direction')->from(db_prefix() . 'staff')->where('staffid', get_staff_user_id());
            $direction = $CI->db->get()->row()->direction;
        }

        if ($direction == 'rtl') {
            return true;
        } elseif ($direction == 'ltr') {
            return false;
        } elseif (empty($direction)) {
            if (get_option('rtl_support_admin') == 1) {
                return true;
            }
        }

        return false;
    } elseif ($client_area == false) {
        if (get_option('rtl_support_admin') == 1) {
            return true;
        }
    }

    return false;
}

/**
 * Check whether the data is intended to be shown for the customer
 * For example this function is used for custom fields, pdf language loading etc...
 * @return boolean
 */
function is_data_for_customer()
{
    return is_client_logged_in()
        || (!is_staff_logged_in() && !is_client_logged_in())
        || defined('SEND_MAIL_TEMPLATE')
        || defined('CLIENTS_AREA')
        || defined('GDPR_EXPORT');
}

/**
 * Generate encryption key for app-config.php
 * @return stirng
 */
function generate_encryption_key()
{
    $CI = &get_instance();
    // In case accessed from my_functions_helper.php
    $CI->load->library('encryption');
    $key = bin2hex($CI->encryption->create_key(16));

    return $key;
}

/**
 * Return application version formatted
 * @return string
 */
function get_app_version()
{
    $CI = &get_instance();
    $CI->load->config('migration');

    return wordwrap($CI->config->item('migration_version'), 1, '.', true);
}

/**
 * Set current full url to for user to be redirected after login
 * Check below function to see why is this
 */
function redirect_after_login_to_current_url()
{
    $redirectTo = current_full_url();

    // This can happen if at the time you received a notification but your session was expired the system stored this as last accessed URL so after login can redirect you to this URL.
    if (strpos($redirectTo, 'notifications_check') !== false) {
        return;
    }

    get_instance()->session->set_userdata([
        'red_url' => $redirectTo,
    ]);
}
/**
 * Check if user accessed url while not logged in to redirect after login
 *
 * @return null
 */
function maybe_redirect_to_previous_url()
{
    $CI = &get_instance();
    if ($CI->session->has_userdata('red_url')) {
        $red_url = $CI->session->userdata('red_url');
        $CI->session->unset_userdata('red_url');

        // If staff previously accessed client URL's
        // we should ensure to redirect to staff after login as it's confused
        // if redirects to the client url
        if (strpos($red_url, 'clients') !== false && is_staff_logged_in()) {
            return;
        }

        redirect($red_url);
    }
}
/**
 * Function used to validate all recaptcha from google reCAPTCHA feature
 * @param  string $str
 * @return boolean
 */
function do_recaptcha_validation($str = '')
{
    $CI = &get_instance();
    $CI->load->library('form_validation');
    $google_url = 'https://www.google.com/recaptcha/api/siteverify';
    $secret     = get_option('recaptcha_secret_key');
    $ip         = $CI->input->ip_address();
    $url        = $google_url . '?secret=' . $secret . '&response=' . $str . '&remoteip=' . $ip;
    $curl       = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    $res = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($res, true);
    //reCaptcha success check
    if ($res['success']) {
        return true;
    }
    $CI->form_validation->set_message('recaptcha', _l('recaptcha_error'));

    return false;
}
/**
 * Get current date format from options
 * @return string
 */
function get_current_date_format($php = false)
{
    $format = get_option('dateformat');
    $format = explode('|', $format);

    $format = hooks()->apply_filters('get_current_date_format', $format, $php);

    if ($php == false) {
        return $format[1];
    }

    return $format[0];
}
/**
 * Is user logged in
 * @return boolean
 */
function is_logged_in()
{
    return (is_client_logged_in() || is_staff_logged_in());
}
/**
 * Is client logged in
 * @return boolean
 */
function is_client_logged_in()
{
    return get_instance()->session->has_userdata('client_logged_in');
}
/**
 * Is staff logged in
 * @return boolean
 */
function is_staff_logged_in()
{
    return get_instance()->session->has_userdata('staff_logged_in');
}
/**
 * Return logged staff User ID from session
 * @return mixed
 */
function get_staff_user_id()
{
    $CI = &get_instance();

    if (defined('API')) {
        $CI->load->config('rest');

        $api_key_variable = $CI->config->item('rest_key_name');
        $key_name         = 'HTTP_' . strtoupper(str_replace('-', '_', $api_key_variable));

        if ($key = $CI->input->server($key_name)) {
            $CI->db->where('key', $key);
            $key = $CI->db->get($CI->config->item('rest_keys_table'))->row();
            if ($key) {
                return $key->user_id;
            }
        }
    }

    if (!is_staff_logged_in()) {
        return false;
    }

    return $CI->session->userdata('staff_user_id');
}
/**
 * Return logged client User ID from session
 * @return mixed
 */
function get_client_user_id()
{
    if (!is_client_logged_in()) {
        return false;
    }

    return get_instance()->session->userdata('client_user_id');
}

/**
 * Get contact user id
 * @return mixed
 */
function get_contact_user_id()
{
    $CI = &get_instance();
    if (!$CI->session->has_userdata('contact_user_id')) {
        return false;
    }

    return $CI->session->userdata('contact_user_id');
}
/**
 * Get timezones list
 * @return array timezones
 */
function get_timezones_list()
{
    return app\services\Timezones::get();
}

/**
 * Check if visitor is on mobile
 * @return boolean
 */
function is_mobile()
{
    if (get_instance()->agent->is_mobile()) {
        return true;
    }

    return false;
}
/**
 * Set session alert / flashdata
 * @param string $type    Alert type
 * @param string $message Alert message
 */
function set_alert($type, $message)
{
    get_instance()->session->set_flashdata('message-' . $type, $message);
}
/**
 * Redirect to blank admin page
 * @param  string $message Alert message
 * @param  string $alert   Alert type
 */
function blank_page($message = '', $alert = 'danger')
{
    set_alert($alert, $message);
    redirect(admin_url('not_found'));
}
/**
 * Redirect to access danied page and log activity
 * @param  string $permission If permission based to check where user tried to acces
 */
function access_denied($permission = '')
{
    set_alert('danger', _l('access_denied'));

    log_activity('Tried to access page where don\'t have permission' . ($permission != '' ? ' [' . $permission . ']' : ''));

    if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
        redirect($_SERVER['HTTP_REFERER']);
    } else {
        redirect(admin_url('access_denied'));
    }
}
/**
 * Throws header 401 not authorized, used for ajax requests
 */
function ajax_access_denied()
{
    header('HTTP/1.0 401 Unauthorized');
    echo _l('access_denied');
    die;
}
/**
 * Set debug message - message wont be hidden in X seconds from javascript
 * @since  Version 1.0.1
 * @param string $message debug message
 */
function set_debug_alert($message)
{
    get_instance()->session->set_flashdata('debug', $message);
}

/**
 * System popup message for admin area
 * This is used to show some general message for user within a big full screen div with white background
 * @param string $message message for the system popup
 */
function set_system_popup($message)
{
    if (!is_admin()) {
        return false;
    }

    if (defined('APP_DISABLE_SYSTEM_STARTUP_HINTS') && APP_DISABLE_SYSTEM_STARTUP_HINTS) {
        return false;
    }

    get_instance()->session->set_userdata([
        'system-popup' => $message,
    ]);
}
/**
 * Available date formats
 * @return array
 */
function get_available_date_formats()
{
    $date_formats = [
        'd-m-Y|%d-%m-%Y' => 'd-m-Y',
        'd/m/Y|%d/%m/%Y' => 'd/m/Y',
        'm-d-Y|%m-%d-%Y' => 'm-d-Y',
        'm.d.Y|%m.%d.%Y' => 'm.d.Y',
        'm/d/Y|%m/%d/%Y' => 'm/d/Y',
        'Y-m-d|%Y-%m-%d' => 'Y-m-d',
        'd.m.Y|%d.%m.%Y' => 'd.m.Y',
    ];

    return hooks()->apply_filters('available_date_formats', $date_formats);
}
/**
 * Get weekdays as array
 * @return array
 */
function get_weekdays()
{
    return [
        _l('wd_monday'),
        _l('wd_tuesday'),
        _l('wd_wednesday'),
        _l('wd_thursday'),
        _l('wd_friday'),
        _l('wd_saturday'),
        _l('wd_sunday'),
    ];
}
/**
 * Get non translated week days for query help
 * Do not edit this
 * @return array
 */
function get_weekdays_original()
{
    return [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday',
    ];
}
/**
 * Outputs language string based on passed line
 * @since  Version 1.0.1
 * @param  string $line   language line key
 * @param  mixed $label   sprint_f label
 * @return string         language text
 */
function _l($line, $label = '', $log_errors = true)
{
    $CI = &get_instance();

    $hook_data = hooks()->apply_filters('before_get_language_text', ['line' => $line, 'label' => $label]);

    $line  = $hook_data['line'];
    $label = $hook_data['label'];

    if (is_array($label) && count($label) > 0) {
        $_line = vsprintf($CI->lang->line(trim($line), $log_errors), $label);
    } else {
        if (version_compare(PHP_VERSION, '8.0.0') >= 0) {
            try {
                $_line = sprintf($CI->lang->line(trim($line), $log_errors), $label);
            } catch (\ValueError $e) {
                $_line = $CI->lang->line(trim($line), $log_errors);
            }
        } else {
            $_line = @sprintf($CI->lang->line(trim($line), $log_errors), $label);
        }
    }

    $hook_data = hooks()->apply_filters('after_get_language_text', ['line' => $line, 'formatted_line' => $_line]);

    $_line = $hook_data['formatted_line'];
    $line  = $hook_data['line'];

    if ($_line != '') {
        if (preg_match('/"/', $_line) && !is_html($_line)) {
            $_line = html_escape($_line);
        }

        return ForceUTF8\Encoding::toUTF8($_line);
    }

    if (mb_strpos($line, '_db_') !== false) {
        return 'db_translate_not_found';
    }

    return ForceUTF8\Encoding::toUTF8($line);
}

/**
 * Format date to selected dateformat
 * @param  date $date Valid date
 * @return date/string
 */
function _d($date)
{
    $formatted = '';

    if ($date == '' || is_null($date) || $date == '0000-00-00') {
        return $formatted;
    }

    if (strpos($date, ' ') !== false) {
        return _dt($date);
    }

    $format = get_current_date_format();

    try {
        $dateTime  = new DateTime($date);
        $formatted = $dateTime->format(str_replace('%', '', $format));
    } catch (Exception $e) {
        $formatted = $date;
    }

    return hooks()->apply_filters('after_format_date', $formatted, $date);
}

/**
 * Format datetime to selected datetime format
 * @param  datetime $date datetime date
 * @return datetime/string
 */
function _dt($date, $is_timesheet = false)
{
    $original = $date;

    if ($date == '' || is_null($date) || $date == '0000-00-00 00:00:00') {
        return '';
    }

    $format = get_current_date_format();
    $hour12 = (get_option('time_format') == 24 ? false : true);

    if ($is_timesheet == false) {
        $date = strtotime($date);
    }

    if ($hour12 == false) {
        $tf = 'H:i:s';
        if ($is_timesheet == true) {
            $tf = 'H:i';
        }

        if (is_numeric($date)) {
            $date = date('Y-m-d H:i:s', $date);
        }

        try {
            $dateTime = new DateTime($date);
            $date     = $dateTime->format(str_replace('%', '', $format . ' ' . $tf));
        } catch (Exception $e) {
        }
    } else {
        $date = date(get_current_date_format(true) . ' g:i A', $date);
    }

    return hooks()->apply_filters('after_format_datetime', $date, ['original' => $original, 'is_timesheet' => $is_timesheet]);
}

/**
 * Convert string to sql date based on current date format from options
 * @param  string $date date string
 * @return mixed
 */
function to_sql_date($date, $datetime = false)
{
    if ($date == '' || $date == null) {
        return null;
    }

    $to_date     = 'Y-m-d';
    $from_format = get_current_date_format(true);

    $date = hooks()->apply_filters('before_sql_date_format', $date, [
        'from_format' => $from_format,
        'is_datetime' => $datetime,
    ]);

    if ($datetime == false) {
        // Is already Y-m-d format?
        if (preg_match('/^(\d{4})-(\d{1,2})-(\d{1,2})$/', $date)) {
            return $date;
        }

        return hooks()->apply_filters(
            'to_sql_date_formatted',
            DateTime::createFromFormat($from_format, $date)->format($to_date)
        );
    }

    if (strpos($date, ' ') === false) {
        $date .= ' 00:00:00';
    } else {
        $hour12 = (get_option('time_format') == 24 ? false : true);
        if ($hour12 == false) {
            $_temp = explode(' ', $date);
            $time  = explode(':', $_temp[1]);
            if (count($time) == 2) {
                $date .= ':00';
            }
        } else {
            $tmp  = _simplify_date_fix($date, $from_format);
            $time = date('G:i', strtotime($tmp));
            $tmp  = explode(' ', $tmp);
            $date = $tmp[0] . ' ' . $time . ':00';
        }
    }

    $date = _simplify_date_fix($date, $from_format);
    $d    = date('Y-m-d H:i:s', strtotime($date));

    return hooks()->apply_filters('to_sql_date_formatted', $d);
}

/**
 * Function that will check the date before formatting and replace the date places
 * This function is custom developed because for some date formats converting to y-m-d format is not possible
 * @param  string $date        the date to check
 * @param  string $from_format from format
 * @return string
 */
function _simplify_date_fix($date, $from_format)
{
    if ($from_format == 'd/m/Y') {
        $date = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $date);
    } elseif ($from_format == 'm/d/Y') {
        $date = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$1-$2 $4', $date);
    } elseif ($from_format == 'm.d.Y') {
        $date = preg_replace('#(\d{2}).(\d{2}).(\d{4})\s(.*)#', '$3-$1-$2 $4', $date);
    } elseif ($from_format == 'm-d-Y') {
        $date = preg_replace('#(\d{2})-(\d{2})-(\d{4})\s(.*)#', '$3-$1-$2 $4', $date);
    }

    return $date;
}
/**
 * Check if passed string is valid date
 * @param  string  $date
 * @return boolean
 */
function is_date($date)
{
    if (empty($date) || strlen($date) < 10) {
        return false;
    }

    return (bool) strtotime($date);
}
/**
 * Get available locaes predefined for the system
 * If you add a language and the locale do not exist in this array you can use action hook to add new locale
 * @return array
 */
function get_locales()
{
    $locales = \app\services\utilities\Locale::app();

    return hooks()->apply_filters('before_get_locales', $locales);
}
/**
 * Get locale key by system language
 * @param  string $language language name from (application/languages) folder name
 * @return string
 */
function get_locale_key($language = 'english')
{
    $locale = \app\services\utilities\Locale::getByLanguage($language);

    return hooks()->apply_filters('before_get_locale', $locale);
}
/**
 * Get current url with query vars
 * @return string
 */
function current_full_url()
{
    $CI  = &get_instance();
    $url = $CI->config->site_url($CI->uri->uri_string());

    return $_SERVER['QUERY_STRING'] ? $url . '?' . $_SERVER['QUERY_STRING'] : $url;
}
/**
 * Triggers
 * @param  array  $users id of users to receive notifications
 * @return null
 */
function pusher_trigger_notification($users = [])
{
    if (get_option('pusher_realtime_notifications') == 0) {
        return false;
    }

    if (!is_array($users) || count($users) == 0) {
        return false;
    }

    $channels = [];
    foreach ($users as $id) {
        array_push($channels, 'notifications-channel-' . $id);
    }

    $channels = array_unique($channels);

    $CI = &get_instance();

    $CI->load->library('app_pusher');

    $CI->app_pusher->trigger($channels, 'notification', []);
}


/**
 * Generate md5 hash
 * @return string
 */
function app_generate_hash()
{
    return md5(rand() . microtime() . time() . uniqid());
}

/**
 * @since  2.3.2
 * Get CSRF formatter for AJAX usage
 * @return array
 */
function get_csrf_for_ajax()
{
    $csrf               = [];
    $csrf['formatted']  = [get_instance()->security->get_csrf_token_name() => get_instance()->security->get_csrf_hash()];
    $csrf['token_name'] = get_instance()->security->get_csrf_token_name();
    $csrf['hash']       = get_instance()->security->get_csrf_hash();

    return $csrf;
}

/**
 * If user have enabled CSRF proctection this function will take care of the ajax requests and append custom header for CSRF
 * @return mixed
 */
function csrf_jquery_token()
{
    ?>
    <script>
        if (typeof(jQuery) === 'undefined' && !window.deferAfterjQueryLoaded) {
            window.deferAfterjQueryLoaded = [];
            Object.defineProperty(window, "$", {
                set: function(value) {
                    window.setTimeout(function() {
                        $.each(window.deferAfterjQueryLoaded, function(index, fn) {
                            fn();
                        });
                    }, 0);
                    Object.defineProperty(window, "$", {
                        value: value
                    });
                },
                configurable: true
            });
        }

        var csrfData = <?php echo json_encode(get_csrf_for_ajax()); ?>;

        if (typeof(jQuery) == 'undefined') {
            window.deferAfterjQueryLoaded.push(function() {
                csrf_jquery_ajax_setup();
            });
            window.addEventListener('load', function() {
                csrf_jquery_ajax_setup();
            }, true);
        } else {
            csrf_jquery_ajax_setup();
        }

        function csrf_jquery_ajax_setup() {
            $.ajaxSetup({
                data: csrfData.formatted
            });

            $(document).ajaxError(function(event, request, settings) {
                if (request.status === 419) {
                    alert_float('warning', 'Page expired, refresh the page make an action.')
                }
            });
        }
    </script>
<?php
}

/**
 * In some places of the script we use app_happy_text function to output some words in orange color
 * @param  string $text the text to check
 * @return string
 */
function app_happy_text($text)
{
    // We won't do this on texts with URL's
    if (strpos($text, 'http') !== false) {
        return $text;
    }

    $regex = hooks()->apply_filters('app_happy_text_regex', '\b(congratulations!?|congrats!?|happy!?|feel happy!?|awesome!?|yay!?)\b');
    $re    = '/' . $regex . '/i';

    $app_happy_color = hooks()->apply_filters('app_happy_text_color', 'rgb(255, 59, 0)');

    preg_match_all($re, $text, $matches, PREG_SET_ORDER, 0);
    foreach ($matches as $match) {
        $text = preg_replace(
            '/' . $match[0] . '/i',
            '<span style="color:' . $app_happy_color . ';font-weight:bold;">' . $match[0] . '</span>',
            $text
        );
    }

    return $text;
}

/**
 * Return server temporary directory
 * @return string
 */
function get_temp_dir()
{
    if (function_exists('sys_get_temp_dir')) {
        $temp = sys_get_temp_dir();
        if (@is_dir($temp) && is_writable($temp)) {
            return rtrim($temp, '/\\') . '/';
        }
    }

    $temp = ini_get('upload_tmp_dir');
    if (@is_dir($temp) && is_writable($temp)) {
        return rtrim($temp, '/\\') . '/';
    }

    $temp = app_temp_dir();

    if (is_dir($temp) && is_writable($temp)) {
        return $temp;
    }

    return '/tmp/';
}

/**
 * Creates instance of phpass
 * @since  2.3.1
 * @return object PasswordHash class
 */
function app_hasher()
{
    global $app_hasher;

    if (empty($app_hasher)) {
        require_once(APPPATH . 'third_party/phpass.php');
        // By default, use the portable hash from phpass
        $app_hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
    }

    return $app_hasher;
}

/**
 * Hashes password for user
 * @since  2.3.1
 * @param  string $password plain password
 * @return string
 */
function app_hash_password($password)
{
    return app_hasher()->HashPassword($password);
}

/**
 * @since  2.3.2
 * Get last upgrade copy data if exists
 * @return mixed
 */
function get_last_upgrade_copy_data()
{
    $lastUpgradeCopyData = get_option('last_upgrade_copy_data');
    if ($lastUpgradeCopyData !== '') {
        $lastUpgradeCopyData = json_decode($lastUpgradeCopyData);

        return is_object($lastUpgradeCopyData) ? $lastUpgradeCopyData : false;
    }

    return false;
}

if (!function_exists('collect')) {
    /**
     * Collect items in a Collection instance
     * @since  2.9.2
     * @param  array $items
     * @return \Illuminate\Support\Collection
     */
    function collect($items)
    {
        return new Illuminate\Support\Collection($items);
    }
}


if (!function_exists('vincheck_premium_plus')) {
 function vincheck_premium_plus($vin){


    $vin = $vin;
    //echo $vin; exit;
    //exit;
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.vehicledatabases.com/advanced-vin-decode/'.$vin,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'x-Authkey: 	'.VEHICLE_DBES_API_KEY_PRD
    ),
    ));

    $json = curl_exec($curl);

    //echo 'response====='.$response; exit;
    $err = curl_error($curl);

    curl_close($curl);
    //$json = '{"status":"success","data":{"3.0t Premium 4dr All-Wheel Drive quattro Sedan Automatic":{"intro":{"vin":"WAUB4AF4XLA041356"},"basic":{"vehicle_name":"Audi S4","make":"Audi","model":"S4","model_group":"S4","year":"2020","trims":["3.0t Premium 4dr All-Wheel Drive quattro Sedan Automatic"],"trim":{"Style":"4dr All-Wheel Drive quattro Sedan Automatic","Trim":"3.0t Premium","MSRP / Invoice":"$49,900.00 / $46,907.00"},"body_type":"sedan","vehicle_type":"","doors":"4","vehicle_size":"Compact Cars","vehicle_segment":""},"engine":{"engine_order_code":"","alternator_capacity":"","engine_number_of_cylinders":"V-6","engine_displacement_units":"3","displacement_(l_ci)":"3000","engine_block_type":"","engine_model":"Intercooled Turbo Premium Unleaded V-6","engine_valves":"24","engine_camshaft":"","emission_standard":"","net_torque":"369 @ 1370","sae_net_torque_rpm":"369 @ 1370","horsepower":"349 @ 5400","sae_net_horsepower_rpm":"349 @ 5400","compression":"11.2"},"manufacturer":{"manufacturer":"Audi NSU Auto Union AG","country":"GERMANY"},"transmission":{"transmission_style":"8 speed automatic","transmission_type":"automatic","transmission_order_code":"","first_gear_ratio":"4.71","second_gear_ratio":"3.14","third_gear_ratio":"2.11","fourth_gear_ratio":"1.67","fifth_gear_ratio":"1.28","sixth_gear_ratio":"1","seventh_gear_ratio":"0.84","eighth_gear_ratio":"0.67","reverse_ratio":"3.32","transfer_case_power_takeoff":""},"dimensions":{"dead_weight_hitch_max_trailer_wt":"","dead_weight_hitch_max_tongue_wt":"","trunk_volume":"","width":"72.72 in","length":"187.52 in","height":"56.18 in","track_width_front":"61.9 in","track_width_rear":"61.2 in","min_ground_clearance":"","wheelbase":"110.98 in","rear_hip_room":"","front_hip_room":"","rear_shoulder_room":"54.5 in","front_shoulder_room":"55.9 in","turning_diameter":"38.1 ft","rear_legroom":"35.7 in","front_legroom":"41.3 in","rear_headroom":"37.4 in","front_headroom":"37.3 in","passenger_volume":"","liftover_height":""},"drivetrain":{"drive_type":"AWD","final_drive_axle_ratio":"2.85"},"braking":{"rear_brake_type":"4-Wheel Disc","front_brake_type":"4-Wheel Disc","disc_front":"Yes","disc_rear":"Yes","front_brake_rotor_diam_and_thickness":"13.8","rear_brake_rotor_diam_and_thickness":"13"},"suspension":{"steering_type":"Rack-Pinion","steering_ratio_overall":"","lock_to_lock_turns_steering":"","rear_suspension":"Multi-Link","front_suspension":"Multi-Link","suspension_type_rear_cont":"Multi-Link","suspension_type_front_cont":"Multi-Link","stabilizer_bar_diameter_rear":"","stabilizer_bar_diameter_front":""},"colors":{"interior":[{"Hex":"#252324","Generic Name":"darkslategray","Code":"EI","Color":"Black w/Leather/Alcantara Seat Trim or Leather Seating Surfaces or Fine Nappa Leather Seat Trim"},{"Hex":"#949590","Generic Name":"lightslategray","Code":"OQ","Color":"Rotor Gray w/Leather/Alcantara Seat Trim or Fine Nappa Leather Seat Trim"},{"Hex":"#ac213e","Generic Name":"brown","Code":"AU","Color":"Magma Red w/Fine Nappa Leather Seat Trim"}],"exterior":[{"Hex":"#eaeae8","Generic Name":"linen","Code":"T9T9","Color":"Ibis White"},{"Hex":"#444544","Generic Name":"darkslategray","Code":"5J5J","Color":"Quantum Gray"},{"Hex":"#2385ca","Generic Name":"steelblue","Code":"N6N6","Color":"Turbo Blue"},{"Hex":"#464844","Generic Name":"darkslategray","Code":"6Y6Y","Color":"Daytona Gray Pearl Effect"},{"Hex":"#d7d7d6","Generic Name":"lightgray","Code":"2Y2Y","Color":"Glacier White Metallic"},{"Hex":"#0b0d0c","Generic Name":"black","Code":"0E0E","Color":"Mythos Black Metallic"},{"Hex":"#0b1b40","Generic Name":"midnightblue","Code":"2D2D","Color":"Navarra Blue Metallic"},{"Hex":"#760216","Generic Name":"maroon","Code":"Y1Y1","Color":"Tango Red Metallic"}]},"seating":{"standard_seating":"5"},"weight":{"curb_weight":"3847 lbs"},"wheels_and_tires":{"front_tire_size":"P245/40YR18","rear_tire_size":"P245/40YR18","spare_tire_size":"Compact","rear_tire_order_code":"","front_tire_order_code":"","wheel_size_front_(inches)":"18 X 8 in","wheel_size_rear_(inches)":"18 X 8  in","spare_wheel_size":"Compact ","front_wheel_material":"Aluminum","rear_wheel_material":"Aluminum","spare_wheel_material":"Steel","steering_type":"Rack-Pinion","anti_lock_brakes":"4-Wheel"},"market_value":{"msrp":"$49,900.00","destination_charge":"$995.00","invoice_price":"$46,907.00"},"fuel":{"fuel_economy":"20 City / 27 Highway MPG","highway_mileage":"27 MPG","city_mileage":"20 MPG","fuel_economy_est_combined":"23 MPG","epa_greenhouse_gas_score":"","fuel_type":"Premium Unleaded","fuel_capacity":"15.3 gal","fuel_injection_type":""},"feature":{"mechanical_and_powertrain":["Dual Stainless Steel Exhaust w/Chrome Tailpipe Finisher","Electric Power-Assist Speed-Sensing Steering","Automatic w/Driver Control Ride Control Sport Tuned Suspension","15.3gal. Fuel Tank","Multi-Link Front Suspension w/Coil Springs","Front And Rear Anti-Roll Bars","Transmission: 8-Speed Automatic Tiptronic","Battery w/Run Down Protection","Multi-Link Rear Suspension w/Coil Springs","Quattro All-Wheel","Regenerative Alternator","Engine: 3.0L TFSI Twin-Scroll Turbo DOHC V6"],"safety":["Electronic Stability Control (ESC)","ABS And Driveline Traction Control","Dual Stage Driver And Passenger Seat-Mounted Side Airbags","Audi connect CARE Emergency Sos","Audi pre sense basic","Low Tire Pressure Warning","Dual Stage Driver And Passenger Front Airbags","SIDEGUARD Curtain 1st And 2nd Row Airbags","Airbag Occupancy Sensor","Driver And Passenger Knee Airbag","Power Rear Child Safety Locks","Outboard Front Lap And Shoulder Safety Belts -inc: Rear Center 3 Point, Height Adjusters and Pretensioners","Back-Up Camera"],"interior":["40-20-40 Folding Bench Front Facing Fold Forward Seatback Rear Seat","Heated Front S Sport Seats -inc: 8-way power front seats, w/4-way power lumbar adjustment, power side bolsters and massage function","Leather/Alcantara Seat Trim -inc: diamond stitching","Fixed Front Head Restraints and Manual Adjustable Rear Head Restraints","HVAC -inc: Underseat Ducts and Console Ducts","Manual Tilt/Telescoping Steering Column","Sport Leather Steering Wheel","Interior Trim -inc: Aluminum Instrument Panel Insert, Aluminum Door Panel Insert, Piano Black/Aluminum Console Insert and Piano Black/Metal-Look Interior Accents","Gauges -inc: Speedometer, Odometer, Tachometer, Trip Odometer and Trip Computer","Compass","Outside Temp Gauge","Full Floor Console w/Covered Storage, Mini Overhead Console and 2 12V DC Power Outlets","Driver / Passenger And Rear Door Bins","Sliding Front Center Armrest and Rear Center Armrest w/Storage","2 Seatback Storage Pockets","Carpet Floor Trim, Carpet Trunk Lid/Rear Cargo Door Trim and Vinyl/Rubber Mat","Full Carpet Floor Covering -inc: Carpet Front And Rear Floor Mats","FOB Controls -inc: Cargo Access, Windows and Sunroof/Convertible Roof","Cargo Space Lights","Leatherette Door Trim Insert","Driver And Passenger Visor Vanity Mirrors w/Driver And Passenger Illumination","Driver Foot Rest","Leather/Aluminum Gear Shifter Material","Illuminated Locking Glove Box","Day-Night Auto-Dimming Rearview Mirror","Front Cupholder","Rear Cupholder","Full Cloth Headliner","Power Rear Windows","Power 1st Row Windows w/Front And Rear 1-Touch Up/Down","Fade-To-Off Interior Lighting","Front And Rear Map Lights","HomeLink Garage Door Transmitter","Power Door Locks w/Autolock Feature","Power Fuel Flap Locking Type","Cruise Control","2 12V DC Power Outlets","Audi connect CARE Tracker System","Remote Keyless Entry w/Integrated Key Transmitter, Illuminated Entry, Illuminated Ignition Switch and Panic Button","Valet Function","Engine Immobilizer","Dual Zone Front Automatic Air Conditioning","Rear HVAC w/Separate Controls","Redundant Digital Speedometer","Trip Computer"],"exterior":["Wheels: 18\" 5-Y-Spoke Design","Light Tinted Glass","Express Open/Close Sliding And Tilting Glass 1st Row Sunroof w/Sunshade","LED Brakelights","Speed Sensitive Rain Detecting Variable Intermittent Wipers w/Heated Jets","Front License Plate Bracket","Front Windshield -inc: Sun Visor Strip","Aluminum Side Windows Trim and Black Front Windshield Trim","Lip Spoiler","Fixed Rear Window w/Defroster","Steel Spare Wheel","Front And Rear Fog Lamps","Compact Spare Tire Mounted Inside Under Cargo","Chrome Grille","Body-Colored Rear Bumper w/Black Rub Strip/Fascia Accent and Metal-Look Bumper Insert","Perimeter/Approach Lights","Body-Colored Door Handles","Metal-Look Bodyside Insert","Programmable Projector Beam Led Low/High Beam Daytime Running Auto-Leveling Auto High-Beam Headlamps w/Delay-Off","Galvanized Steel/Aluminum Panels","Heated Front S Sport Seats","Metal-Look Power Heated Side Mirrors w/Turn Signal Indicator","Trunk Rear Cargo Access","Body-Colored Front Bumper w/Metal-Look Bumper Insert","255/35YR19.0"]},"comfort":{"total_cooling_system_capacity":""}}},"execution time":3.046530521005392}';

    //$err = false;
    //$err =false;
    if ($err) {
        return "cURL Error #:" . $err;
    } else {
        
        $decode = json_decode($json,true);
        //echo json_encode(json_decode($json,true));
        //exit;
        $equipments = array();
        $singlearray = array();
        $colors = array();
        //$colors['colors']= array();
        if(count($decode)>0){
            $i=0;
            $exterior= '';
            $interior='';
            
            
            if(isset($decode['status']) && $decode['status']=="success"){
            
                if(count($decode['data'])>0){
                    //echo "<pre>"; print_r($decode['data']); exit;
                    $vdrinc=1;
                    $associativeArray = array();
                    foreach($decode['data'] as $vd){
                        //echo "<pre>"; print_r($vd); exit;
                        foreach($vd as $vdr=>$vindtskey){
                            //echo "<pre>"; print_r($vdr); exit;
                            //array_push($equipments[$vdr], $vindtskey);
                            $equipments[$vdr]=$vindtskey;
                            
                            //Single array with keys and values
                            /*foreach($vindtskey as $fnvd=>$fnvdkey){
                                //echo "<pre>"; print_r($fnvd); exit;
                                
                                $singlearray[$fnvd]=$fnvdkey;
                            }*/
                            //echo 'Count of indexes:'.$vdr. '### '.count($vindtskey)."<br>";
                        }
                        $vdrinc++;
                        
                    }

                    //echo "<pre>"; print_r($equipments); exit;





                        /*foreach($decode['spec']['equipments'] as $key=>$row){
                            $equipments[$row['group']][$i]=$row;	
                            $i++;
                        }*/
                        /*$ul = '<ul>';
                        foreach($decode['spec']['equipments'] as $key=>$row){
                            $i=0;
                            $val='';
                            if($row['value']!=''){
                                    $val = $row['name'].' : '. $row['value'];
                            }else{
                                $val = $row['name'];
                            }
                            if(array_key_exists($row['group'],$equipments)){
                                array_push($equipments[$row['group']], $row);
                                $equipments[$row['group']][$row['group']] .= '<li>'.$val.'</li>';
                            }else{
                                $equipments[$row['group']][$i]=$row;
                                
                                $equipments[$row['group']][$row['group']] = '<li>'.$val.'</li>';
                            }
                            
                            $i++;
                        }
                        $ul = '</ul>';*/
                    
                    
                    
                    
                    
                    //mehcanical section
                    //echo "<pre>"; print_r($equipments['Towings']); exit;
                    
                    if(isset($equipments['feature']['mechanical_and_powertrain']) && count($equipments['feature']['mechanical_and_powertrain'])>0){

                        $decode['spec']['attributes']['Fuel Type'] = isset($equipments['fuel']['fuel_type']) ? $equipments['fuel']['fuel_type']:''; 
                        $decode['spec']['attributes']['Fuel Capacity'] = isset($equipments['fuel']['fuel_capacity']) ? $equipments['fuel']['fuel_capacity']:''; 
                        $decode['spec']['attributes']['City Mileage'] = isset($equipments['fuel']['city_mileage']) ? $equipments['fuel']['city_mileage']:''; 
                        $decode['spec']['attributes']['Highway Mileage'] = isset($equipments['fuel']['highway_mileage']) ? $equipments['fuel']['highway_mileage']:''; 
                        $decode['spec']['attributes']['Engine'] = isset($equipments['engine']['engine_model']) ? $equipments['engine']['engine_model']:''; 
                        $decode['spec']['attributes']['Engine Size'] = isset($equipments['engine']['displacement_(l_ci)']) ? $equipments['engine']['displacement_(l_ci)']:''; 
                        $decode['spec']['attributes']['Engine Cylinders'] = isset($equipments['engine']['engine_number_of_cylinders']) ? $equipments['engine']['engine_number_of_cylinders']:''; 
                        $decode['spec']['attributes']['Transmission Type'] = isset($equipments['transmission']['transmission_type']) ? ucwords(strtolower($equipments['transmission']['transmission_type'])):''; 
                        $decode['spec']['attributes']['Transmission Gears'] = isset($equipments['transmission']['transmission_style']) ? ucwords(strtolower($equipments['transmission']['transmission_style'])):''; 
                        $decode['spec']['attributes']['Anti-Brake System'] = isset($equipments['braking']['rear_brake_type']) ? $equipments['braking']['rear_brake_type']:''; 
                        $decode['spec']['attributes']['Steering Type'] = isset($equipments['suspension']['steering_type']) ? $equipments['suspension']['steering_type']:''; 
                        $decode['spec']['attributes']['Driven Wheels'] = isset($equipments['drivetrain']['drive_type']) ? $equipments['drivetrain']['drive_type']:''; 


                        $decode['spec']['attributes']['Make'] = isset($equipments['basic']['make']) ? $equipments['basic']['make']:'';
                        $decode['spec']['attributes']['Model'] = isset($equipments['basic']['model']) ? $equipments['basic']['model']:'';
                        $decode['spec']['attributes']['Year'] = isset($equipments['basic']['year']) ? $equipments['basic']['year']:'';

                        $decode['spec']['attributes']['Vehicle Category'] = isset($equipments['basic']['vehicle_size']) ? ucwords(strtolower($equipments['basic']['vehicle_size'])):'';
                        $decode['spec']['attributes']['Vehicle Type'] = isset($equipments['basic']['body_type']) ? ucwords(strtolower($equipments['basic']['body_type'])):'';
                        $decode['spec']['attributes']['Standard Seating'] = isset($equipments['seating']['standard_seating']) ? $equipments['seating']['standard_seating']:'';
                        $decode['spec']['attributes']['Doors'] = isset($equipments['basic']['doors']) ? $equipments['basic']['doors']:'';
                        $decode['spec']['attributes']['Trim'] = isset($equipments['basic']['trim']['Trim']) ? $equipments['basic']['trim']['Trim']:'';
                        $decode['spec']['attributes']['HorsePower'] = isset($equipments['engine']['horsepower']) ? $equipments['engine']['horsepower']:'';

                        
                        
                        $decode['spec']['mehcanical'] = "<ul><li>Fuel Type: ".$decode['spec']['attributes']['Fuel Type']."</li>"."<li>Fuel Capacity: ".$decode['spec']['attributes']['Fuel Capacity']."</li>". 
                        "<li>City Mileage : ".$decode['spec']['attributes']['City Mileage']."</li>". 
                        "<li>Highway Mileage : ".$decode['spec']['attributes']['Highway Mileage']."</li>". 
                        "<li>Engine : ".$decode['spec']['attributes']['Engine']."</li>". 
                        "<li>Engine Size : ".$decode['spec']['attributes']['Engine Size']."</li>". 
                        "<li>Engine Cylinders : ".$decode['spec']['attributes']['Engine Cylinders']."</li>". 
                        "<li>Transmission Type : ". $decode['spec']['attributes']['Transmission Type']."</li>". 
                        "<li>Transmission Gears : ".$decode['spec']['attributes']['Transmission Gears']."</li>". 
                        "<li>Driven Wheels : ".$decode['spec']['attributes']['Driven Wheels']."</li>".
                        "<li>Transmission Gears : ".$decode['spec']['attributes']['Transmission Gears']."</li>".
                        "<li>Anti-Braking System : ".$decode['spec']['attributes']['Anti-Brake System']."</li>".
                        "<li>Steering Type : ".$decode['spec']['attributes']['Steering Type']."</li></ul>";
                        
                        //echo "<pre>"; print_r($decode['spec']['mehcanical']); exit;
                        //braking & traction
                        /*if(isset($equipments['Braking & Traction']) && count($equipments['Braking & Traction'])>0){
                            $decode['spec']['mehcanical'] .= '<p style="text-decoration: underline;">Braking & Traction</p><ul>'.$equipments['Braking & Traction']['Braking & Traction'].'</ul>';
                        }
                        //chasis
                        if(isset($equipments['Chassis']) && count($equipments['Chassis'])>0){
                            $decode['spec']['mehcanical'] .= '<p style="text-decoration: underline;">Chasis</p><ul>'.$equipments['Chassis']['Chassis'].'</ul>';
                        }
                        //towings
                        if(isset($equipments['Towings']) && count($equipments['Towings'])>0){
                            $decode['spec']['mehcanical'] .= '<p style="text-decoration: underline;">Towings</p><ul>'.$equipments['Towings']['Towings'].'</ul>';
                        }
                        //capacities
                        if(isset($equipments['Capacities']) && count($equipments['Capacities'])>0){
                            $decode['spec']['mehcanical'] .= '<p style="text-decoration: underline;">Capacities</p><ul>'.$equipments['Capacities']['Capacities'].'</ul>';
                        }*/
                        //end mechanical
                        
                        //exteriors
                        $decode['spec']['vexterior'] = '';
                        /*if(isset($equipments['Exterior Lighting']) && count($equipments['Exterior Lighting'])>0){
                            $decode['spec']['vexterior'] .= '<p style="text-decoration: underline;">Exterior Lighting</p><ul>'.$equipments['Exterior Lighting']['Exterior Lighting'].'</ul>';
                        }*/


                                        
                        if(isset($equipments['feature']['exterior']) && count($equipments['feature']['exterior'])>0){

                            $equipments['Exterior Features']['Exterior Features'] = '';															
                            foreach($equipments['feature']['exterior'] as $extrk){							
                                $equipments['Exterior Features']['Exterior Features'] .= 	'<li>'.$extrk.'</li>';
                            }
                            $decode['spec']['vexterior'] .= '<p style="text-decoration: underline;">Exterior Features</p><ul>'.$equipments['Exterior Features']['Exterior Features'].'</ul>';
                        }
                        //echo "<pre>"; print_r($equipments['Exterior Features']['Exterior Features']); exit;
                        if(isset($equipments['wheels_and_tires']) && count($equipments['wheels_and_tires'])>0){

                            $equipments['Tires & Wheels']['Tires & Wheels'] = '';
                                                            
                            foreach($equipments['wheels_and_tires'] as $wt=>$wtkey){
                                $tri = ucwords(str_replace("_", " ", strtolower($wt)));										
                                $equipments['Tires & Wheels']['Tires & Wheels'] .= 	'<li>'.$tri.' : '.$wtkey.'</li>';
                            }
                            
                            $decode['spec']['vexterior'] .= '<p style="text-decoration: underline;">Tires & Wheels</p><ul>'.$equipments['Tires & Wheels']['Tires & Wheels'].'</ul>';
                        }
                        
                        
                        if(isset($equipments['dimensions']) && count($equipments['dimensions'])>0){
                            $equipments['Exterior Dimensions & Weight']['Exterior Dimensions & Weight'] = '';
                                                            
                            foreach($equipments['dimensions'] as $wt=>$wtkey){
                                $tri = ucwords(str_replace("_", " ", strtolower($wt)));										
                                $equipments['Exterior Dimensions & Weight']['Exterior Dimensions & Weight'] .= 	'<li>'.$tri.' : '.$wtkey.'</li>';
                            }
                            $decode['spec']['vexterior'] .= '<p style="text-decoration: underline;">Exterior Dimensions & Weight</p><ul>'.$equipments['Exterior Dimensions & Weight']['Exterior Dimensions & Weight'].'</ul>';
                        }
                        //echo "<pre>"; print_r($decode['spec']['vexterior']); exit;
                        
                        /*if(isset($equipments['Cargo Bed Dimensions']) && count($equipments['Cargo Bed Dimensions'])>0){
                            $decode['spec']['vexterior'] .= '<p style="text-decoration: underline;">Cargo Bed Dimensions</p><ul>'.$equipments['Cargo Bed Dimensions']['Cargo Bed Dimensions'].'</ul>';
                        }*/
                        
                        /*if(isset($equipments['Mirrors & Windows & Wipers']) && count($equipments['Mirrors & Windows & Wipers'])>0){
                            $decode['spec']['vexterior'] .= '<p style="text-decoration: underline;">Mirrors & Windows & Wipers</p><ul>'.$equipments['Mirrors & Windows & Wipers']['Mirrors & Windows & Wipers'].'</ul>';
                        }*/
                        //end of vehicle extriors
                        
                        //entertainment
                        $decode['spec']['ventertainment']='';
                        /*$decode['spec']['ventertainment']='';
                        if(isset($equipments['Entertainment, Communication & Navigation']) && count($equipments['Entertainment, Communication & Navigation'])>0){
                            $decode['spec']['ventertainment'] .= '<p style="text-decoration: underline;">Entertainment, Communication & Navigation</p><ul>'.$equipments['Entertainment, Communication & Navigation']['Entertainment, Communication & Navigation'].'</ul>';
                        }*/
                        //end of entertainment
                        
                        //vehicle interiors
                        $decode['spec']['vinteriors'] ='';
                        if(isset($equipments['feature']['interior']) && count($equipments['feature']['interior'])>0){
                            $equipments['Interior Features']['Interior Features'] = '';
                            foreach($equipments['feature']['interior'] as $in=>$intket){
                                $tri = ucwords(str_replace("_", " ", strtolower($in)));										
                                $equipments['Interior Features']['Interior Features'] .= 	'<li>'.$intket.'</li>';
                            }
                            $decode['spec']['vinteriors'] .= '<p style="text-decoration: underline;">Interior Features</p><ul>'.$equipments['Interior Features']['Interior Features'].'</ul>';
                        }
                        //echo "<pre>"; print_r($decode['spec']['vinteriors']); exit;
                        /*if(isset($equipments['Interior Dimensions']) && count($equipments['Interior Dimensions'])>0){
                            $decode['spec']['vinteriors'] .= '<p style="text-decoration: underline;">Interior Dimensions</p><ul>'.$equipments['Interior Dimensions']['Interior Dimensions'].'</ul>';
                        }*/
                        
                        if(isset($equipments['seating']) && count($equipments['seating'])>0){
                            $equipments['Seat']['Seat'] = '';
                            foreach($equipments['seating'] as $ss=>$sskey){
                                $tri = ucwords(str_replace("_", " ", strtolower($ss)));										
                                $equipments['Seat']['Seat'] .= 	'<li>'.$tri.' : '.$sskey.'</li>';
                            }
                            $decode['spec']['vinteriors'] .= '<p style="text-decoration: underline;">Seat</p><ul>'.$equipments['Seat']['Seat'].'</ul>';
                        }
                        //echo "<pre>"; print_r($decode['spec']['vinteriors']); exit;
                        /*if(isset($equipments['Storage']) && count($equipments['Storage'])>0){
                            $decode['spec']['vinteriors'] .= '<p style="text-decoration: underline;">Storage</p><ul>'.$equipments['Storage']['Storage'].'</ul>';
                        }*/
                        
                        /*if(isset($equipments['Climate Control']) && count($equipments['Climate Control'])>0){
                            $decode['spec']['vinteriors'] .= '<p style="text-decoration: underline;">Climate Control</p><ul>'.$equipments['Climate Control']['Climate Control'].'</ul>';
                        }
                        
                        if(isset($equipments['Roof']) && count($equipments['Roof'])>0){
                            $decode['spec']['vinteriors'] .= '<p style="text-decoration: underline;">Roof</p><ul>'.$equipments['Roof']['Roof'].'</ul>';
                        }*/					
                        //end of vehicle interiors
                        
                        //safety
                        $decode['spec']['vsafety'] ='';
                        if(isset($equipments['feature']['safety']) && count($equipments['feature']['safety'])>0){
                            $equipments['Safety']['Safety']='';
                            foreach($equipments['feature']['safety'] as $sfty=>$sftykey){
                                $tri = ucwords(str_replace("_", " ", strtolower($sfty)));										
                                $equipments['Safety']['Safety'] .= 	'<li>'.$sftykey.'</li>';
                            }
                            $decode['spec']['vsafety'] .= '<p style="text-decoration: underline;">Safety</p><ul>'.$equipments['Safety']['Safety'].'</ul>';
                        }
                        //echo "<pre>"; print_r($decode['spec']['vsafety']); exit;
                        /*if(isset($equipments['Remote Controls & Release']) && count($equipments['Remote Controls & Release'])>0){
                            $decode['spec']['vsafety'] .= '<p style="text-decoration: underline;">Remote Controls & Release</p><ul>'.$equipments['Remote Controls & Release']['Remote Controls & Release'].'</ul>';
                        }
                        if(isset($equipments['Anti-Theft & Locks']) && count($equipments['Anti-Theft & Locks'])>0){
                            $decode['spec']['vsafety'] .= '<p style="text-decoration: underline;">Anti-Theft & Locks</p><ul>'.$equipments['Anti-Theft & Locks']['Anti-Theft & Locks'].'</ul>';
                        }
                        if(isset($equipments['Convenience & Comfort']) && count($equipments['Convenience & Comfort'])>0){
                            $decode['spec']['vsafety'] .= '<p style="text-decoration: underline;">Convenience & Comfort</p><ul>'.$equipments['Convenience & Comfort']['Convenience & Comfort'].'</ul>';
                        }*/

                        
                        
                        
                        
                        
                        
                        
                        /*$decode['spec']['mehcanical'] = "<ul><li>Fuel Type: ".$decode['spec']['attributes']['Fuel Type']."\n"."Fuel Capacity: ".$decode['spec']['attributes']['Fuel Capacity']."\n". 
                        "City Mileage : ".$decode['spec']['attributes']['City Mileage']."\n". 
                        "Highway Mileage : ".$decode['spec']['attributes']['Highway Mileage']."\n". 
                        "Engine : ".$decode['spec']['attributes']['Engine']."\n". 
                        "Engine Size : ".$decode['spec']['attributes']['Engine Size']."\n". 
                        "Engine Cylinders : ".$decode['spec']['attributes']['Engine Cylinders']."\n". 
                        "Transmission Type : ". $decode['spec']['attributes']['Transmission Type']."\n". 
                        "Transmission Gears : ".$decode['spec']['attributes']['Transmission Gears']."\n". 
                        "Driven Wheels : ".$decode['spec']['attributes']['Fuel Type']."\n".
                        "Transmission Gears : ".$decode['spec']['attributes']['Transmission Gears']."\n".
                        "Anti-Braking System : ".$decode['spec']['attributes']['Anti-Brake System']."\n".
                        "Steering Type : ".$decode['spec']['attributes']['Steering Type']."</ul>";*/
                    }
                    //end of mechanical section
                    $c=0;
                    if(isset($equipments['colors']) && count($equipments['colors'])>0){
                        /*foreach($decode['colors']['interior'] as $row){
                            $colors[$row['category']][$c] = $row;
                            $c++;
                        }*/

                    //echo "<pre>"; print_r(count($colors['Interior']));
                    $colInt1 = '';
                    $colExt1 = '';
                    
                    $j=0;
                    if(count($equipments['colors']['interior'])>0){
                        foreach ($equipments['colors']['interior'] as $item) {
                            //echo "<pre>"; print_r($item);
                            $colInt1 .= '('.$item['Code'].') - '.$item['Color'].", ";
                            $j++;
                        }

                        //$interior = implode(',', $colInt);
                    }


                    $interior = $colInt1;

                    
                    if(count($equipments['colors']['exterior'])>0){
                            foreach ($equipments['colors']['exterior'] as $item) {
                                //echo "<pre>"; print_r($item);
                                $colExt1 .= '('.$item['Code'].') - '.$item['Color'].", ";
                                $j++;
                            }
                            //$exterior = implode(',', $colExt);
                        }
                    }
                    $exterior = $colExt1;
                    //echo "<pre>"; print_r($exterior); exit;

                    $warrantyH = '';
                    /*if(isset($decode['spec']['warranties']) && count($decode['spec']['warranties'])>0){
                        foreach ($decode['spec']['warranties'] as $item) {
                            //echo "<pre>"; print_r($item);
                            $warrantyH .= $item['type'].":".$item['months'].": ".$item['miles']."\n";
                            //$j++;
                        }
                        //$exterior = implode(',', $colExt);
                    }*/

                    //echo $warrantyH; exit;
                    $decode['spec']['interiorcolor'] = $interior;
                    $decode['spec']['exteriorcolor'] = $exterior;
                    $decode['spec']['warranty'] = $warrantyH;
                    $decode['spec']['success']=true;
                    //echo "<pre>"; print_r($decode); exit;
                    return json_encode($decode,true);
                }
            
            }else{
                $decode['spec']['success']=false;
                return json_encode($decode);
            }
            
            
            
            
            
        }else{
            return '0';
        }
        
        
        //echo json_encode(json_decode($response,true));
    }
    //print_r(json_encode($_GET));
    exit;
}
}


if (!function_exists('delete_item_from_ecommerce_by_id')) {
    function delete_item_from_ecommerce_by_id($id){
        
        $CI = &get_instance();
        $geteComId = 'select car_id from tbl_car where dms_id='.$id;
        $geteComIdExe = $CI->rental->query($geteComId);
        $result = $geteComIdExe->result_array();
        //echo "<pre>"; print_r($result); exit;
        if(is_array($result) && count($result)>0){
            $car_id= $result[0]['car_id'];
            if($car_id!=''){
                
                $cPhotos = "SELECT * FROM tbl_car_photo WHERE car_id=$car_id";
                $ciPhotosExe = $CI->rental->query($cPhotos);
                $check = $ciPhotosExe->result_array();
                //echo "<pre>"; print_r($check); exit;
                $queryfphoto = "SELECT featured_photo FROM tbl_car where car_id=$car_id";
                $queryfphotoExe = $CI->rental->query($queryfphoto);
                $queryfphotocheck = $queryfphotoExe->result_array();
                //echo "<pre>"; print_r($queryfphotocheck); exit;
                if(count($queryfphotocheck)>0){
                    if(isset($queryfphotocheck[0]['featured_photo']) && $queryfphotocheck[0]['featured_photo']!='' && file_exists(EXPLORE_DROOT_FEATURED_CARS_PATH.$queryfphotocheck[0]['featured_photo'])){
                        unlink(EXPLORE_DROOT_FEATURED_CARS_PATH.$queryfphotocheck[0]['featured_photo']);
                    }
                }
                if(count($check)>0){
                    foreach($check as $row){                       
                        if (file_exists(EXPLORE_DROOT_CARS_OTHERS_PATH.$row['photo'])) {                            
                              unlink(EXPLORE_DROOT_CARS_OTHERS_PATH.$row['photo']);
                        }
                    }
                }

               
                $delQry = "DELETE FROM tbl_car where car_id =".$car_id;                
                $CI->rental->query($delQry);
                if($CI->db->affected_rows() >=0){
                    $delPhotosQry = "DELETE FROM tbl_car_photo where car_id =".$car_id;                
                    $CI->rental->query($delPhotosQry);
                }

            }
        }
        return true;
       
   }
}

if (!function_exists('update_item_available_status')) {
    function update_item_available_status($id,$type){
       // echo $type; exit;
        $CI = &get_instance();
        $updateQuery = "UPDATE ".db_prefix()."customfieldsvalues SET `value`='".$type."' WHERE relid=".$id." and fieldto = 'items_pr' and fieldid=".INV_AVAILABLE_STATUS_FIELD_ID;
        $CI->db->query($updateQuery);
        if($CI->db->affected_rows() >=0){
            if($type=='Sold'){
                delete_item_from_ecommerce_by_id($id);
            }
            return  'success'; 
        }else{
            return  'fail'; 
        }        
   }
}

if(!function_exists('get_quote_details_by_id')){
    function get_quote_details_by_id($quoteId){
    $url = base_url().'admin/apiint/rve/'.$quoteId;
		// echo $url;exit;
		$ch = curl_init();
		$curlConfig = array(
			CURLOPT_URL            => $url,
            CURLOPT_HEADER         => 0,
            CURLOPT_SSL_VERIFYPEER  => false,
            CURLOPT_SSL_VERIFYHOST  => false,
			//CURLOPT_POST           => true,
			CURLOPT_RETURNTRANSFER => true,
			
		);
		curl_setopt_array($ch, $curlConfig);
		$result = curl_exec($ch);
        //  echo $result;exit;
		$quotedata['quotedata'] = json_decode($result,true);
		curl_close($ch);
        return json_encode($quotedata['quotedata']);
        //echo "<pre>"; print_r($quotedata['quotedata']); exit;
    }
}

if(!function_exists('get_commission_calculation')){
    function get_commission_calculation($type,$sale_price,$purchase_price,$margin,$assignedto,$monthsfilter){

       
       if(count($monthsfilter)>0){
        $totalSalesQuery = 'SELECT count(assigned) as "count" FROM '.db_prefix().'proposals WHERE DATE_FORMAT(datecreated,"%Y%m") IN  (' . implode(', ', $monthsfilter) . ') AND assigned ='.$assignedto;

       }else{
        $totalSalesQuery = 'SELECT count(assigned) as "count" FROM '.db_prefix().'proposals WHERE assigned='.$assignedto;
       }
       $CI = &get_instance();
       $res = $CI->db->query($totalSalesQuery)->row_array();
    
        
        //echo "<pre>"; print_r($res); exit;
        //echo $totalSalesQuery; EXIT;

        $commissionval=0;
        if(is_array($res) && isset($res['count']) && $res['count']<=8){
            //echo 'if';
            $commissionval = $margin * LESS_THAN_OR_EQUAL_EIGHT;


        }else{
            //echo 'else';
            //1680
            //echo $margin;
            $cmbase = $purchase_price * MORE_THAN_EIGHT_BASE_COMMIMSSION;
            //echo $cmbase.'base</br>';
            //235
            $cmpartoneval = $cmbase * MORE_THAN_EIGHT_BASE_COMMIMSSION_PART_ONE;
            //echo $cmpartoneval.'</br>';
            //2320
            $cmbasetwoval = $margin - $cmbase;
            //echo $cmbasetwoval.'</br>';
            //696
            $cmbasethreeval = $cmbasetwoval * MORE_THAN_EIGHT_BASE_COMMIMSSION_PART_TWO;
           // echo $cmbasethreeval.'</br>';
            $commissionval = $cmpartoneval+$cmbasethreeval;
        }
       // echo $commissionval; exit;
        return $commissionval;
    }
}

if(!function_exists('get_batter_guard_cost')){
    function get_batter_guard_cost($pid){ 
        $totalSalesQuery = 'SELECT `value` FROM '.db_prefix().'customfieldsvalues WHERE relid='.$pid.' AND fieldid=127 AND fieldto="proposal"';
          $CI = &get_instance();
        $res = $CI->db->query($totalSalesQuery)->result_array();
        if(is_array($res) && count($res)>0){
            return $res[0]['value'];
        }else{
            return 0;
        }    
    }
   
}


if(!function_exists('get_custom_fields_by_item_id')){
    function get_custom_fields_by_item_id($itemid){ 
        
        $customfields = 'select * from tblcustomfields where fieldto="items" AND ACTIVE=1';
          $CI = &get_instance();
        $data = $CI->db->query($customfields)->result_array();
        if(is_array($data) && count($data)>0){
           
            $customfieldvalue = array();				
		if (count($data) > 0) {
			
			foreach($data as $row) {
				$customdata = 
				$CI->db->query("select * from tblcustomfieldsvalues where relid=".$itemid." and fieldid=".$row['id']." and fieldto='items_pr'")
								->result_array();
				
				if (count($customdata) > 0 ) {
					$customfieldvalue[$row['slug']] = $customdata[0]['value'];
				} else {
					$customfieldvalue[$row['slug']] ='' ;
				}
			}
		}
		return $customfieldvalue;


        }else{
            return array();
        }    
    }
   
}