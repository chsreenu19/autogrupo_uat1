<?php

//echo 'Madina config file'; exit;
define('MSELF', pathinfo(__FILE__, PATHINFO_BASENAME));

define('MFCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

define('CLIENT_MAIN_URL', "https://".$_SERVER['HTTP_HOST'].str_replace( str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT']), '', str_replace("\\", "/", str_replace(MSELF, '', MFCPATH))));

//echo MFCPATH; exit;
//echo 'url:'.CLIENT_MAIN_URL; exit;

define('DMS_FOLDER_NAME','crm');

define('PORTAL_NAME', 'portal');





//crm base url
define('DMS_URL', CLIENT_MAIN_URL);


$host = $_SERVER['HTTP_HOST'];
if($host=='auto1pr.com'){
	
	define('EXPLORE_URL', "https://".$host."/");
	
}else{


//ecommerce url
define('EXPLORE_URL', CLIENT_MAIN_URL.'explore/');

}
//echo EXPLORE_URL; EXIT;

define('DOCUMENTROOT',MFCPATH);



//echo PORTAL_DROOT; exit;

define('EXPLORE_DROOT_FEATURED_CARS_PATH',MFCPATH.'explore'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'cars'.DIRECTORY_SEPARATOR);
//echo EXPLORE_DROOT_FEATURED_CARS_PATH; exit;

define('EXPLORE_DROOT_CARS_OTHERS_PATH',MFCPATH.'explore'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'other-cars'.DIRECTORY_SEPARATOR);

//echo 'othere:'. EXPLORE_DROOT_CARS_OTHERS_PATH; exit;


define('MODULES_ROOT_PATH', DOCUMENTROOT.DIRECTORY_SEPARATOR.'modules'. DIRECTORY_SEPARATOR);


//files transfer path



define('CRM_WAREHOUSE_PRODUCT_IMAGE_PATH', MODULES_ROOT_PATH . 'warehouse'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'item_img'.DIRECTORY_SEPARATOR);

//echo CRM_WAREHOUSE_PRODUCT_IMAGE_PATH; exit;
//end of files transfer paths

//CRM
define('CRM_DB', 'rapid1y6_upgraded_crm_jchp_uat');
define('CRM_DB_HOST', 'localhost');
define('CRM_DB_USERNAME', 'rapid1y6_dealerpadpr_prd');
define('CRM_DB_PASSWORD', '5SW4&TVX9~%~');


//ecommerce DB details
define('EXPLORE_DB', 'rapid1y6_upgraded_rentals_jchp_uat');
define('EXPLORE_DB_HOST', 'localhost');
define('EXPLORE_DB_USERNAME', 'rapid1y6_dealerpadpr_prd');
define('EXPLORE_DB_PASSWORD', '5SW4&TVX9~%~');

?>