<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper" class="customer_profile">
    <div class="content">
        <div class="row">
            
            <div class="clearfix"></div>


            <div class="">
                <div class="panel_s">
                    <div class="panel-body">
                      
                        <div>
                            <div class="tab-content">
                                <?php $this->load->view('admin/creditapplication/groups/profile'); ?>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>

    </div>
</div>
<?php init_tail(); ?>
<?php if (isset($client)) { ?>
<script>
$(function() {
    init_rel_tasks_table(<?php echo $client->userid; ?>, 'customer');
});
</script>
<?php } ?>
<?php $this->load->view('admin/creditapplication/client_js'); ?>
</body>

</html>