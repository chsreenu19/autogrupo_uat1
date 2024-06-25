<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="panel-table-full">
                <?php $this->load->view('admin/proposals/list_template'); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/includes/modals/sales_attach_file'); ?>
<script>
var hidden_columns = [6];
</script>
<?php init_tail(); ?>
<div id="convert_helper"></div>
<!--<script>
var proposal_id;
$(function() {
    var Proposals_ServerParams = {};
    $.each($('._hidden_inputs._filters input'), function() {
        Proposals_ServerParams[$(this).attr('name')] = '[name="' + $(this).attr('name') + '"]';
    });
    initDataTable('.table-proposals', admin_url + 'proposals/table', ['undefined'], ['undefined'],
        Proposals_ServerParams, [7, 'desc']);
    init_proposal();
});
</script>-->
<script>
var proposal_id;
$(function() {
   /* var Proposals_ServerParams = {};
    $.each($('._hidden_inputs._filters input'), function() {
        Proposals_ServerParams[$(this).attr('name')] = '[name="' + $(this).attr('name') + '"]';
    });
    initDataTable('.table-proposals', admin_url + 'proposals/table', ['undefined'], ['undefined'],
        Proposals_ServerParams, [7, 'desc']);*/
       
		
	var table_quotes = $("table.table-proposals");

	var Proposals_ServerParams = {
		psearchstartdate: "[name='psearchstartdate']",
		psearchtodate: "[name='psearchtodate']",
	};
    $.each($('._hidden_inputs._filters input'), function() {
        Proposals_ServerParams[$(this).attr('name')] = '[name="' + $(this).attr('name') + '"]';
    });
	
	$.each(Proposals_ServerParams, function (i,obj) {
       $("input" + obj).on("blur", function () {
        console.log('Console log: '+ $(this).val());
		//init_proposal();
       table_quotes.DataTable().ajax.reload();
      });
    });
	console.log('Params: '+Proposals_ServerParams);
    initDataTable(table_quotes, admin_url + 'proposals/table', ['undefined'], ['undefined'],
        Proposals_ServerParams, [7, 'desc']);
		
		
		
    init_proposal();
	


    




	/*$("input[name='psearchstartdate']").datepicker({
        todayBtn:  1,
        autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $("input[name='psearchtodate']").datepicker('setStartDate', minDate);
    });

    $("input[name='psearchtodate']").datepicker()
        .on('changeDate', function (selected) {
            var maxDate = new Date(selected.date.valueOf());
            $("input[name='psearchstartdate']").datepicker('setEndDate', maxDate);
        });*/
	
});
</script>
</body>

</html>