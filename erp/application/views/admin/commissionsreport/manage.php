<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="panel-table-full">
                <?php $this->load->view('admin/commissionsreport/list_template'); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/includes/modals/sales_attach_file'); ?>
<script>
//var hidden_columns = [4, 5, 6, 7, 8];
var hidden_columns = [6];
</script>
<?php init_tail(); ?>
<div id="convert_helper"></div>
<script>
var proposal_id;
$(function() {

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
		
       table_quotes.DataTable().ajax.reload();
      });
    });
	//console.log('Params: '+Proposals_ServerParams);
    var ti = initDataTable(table_quotes, admin_url + 'commissionsreport/table', ['undefined'], ['undefined'],
        Proposals_ServerParams, [0, 'desc']);

        ti.on('draw', function(){
            var margintotal = 0;
            var salestotal = 0;
            var procurementcost = 0;
            var commissiontotal = 0;
            var footerRow = $('table.table-proposals tfoot tr');

            var ninthcolumn = footerRow.find('th:eq(9)');
            var eighthColumn = footerRow.find('th:eq(8)');
            var sixthColumn = footerRow.find('th:eq(6)');
            var seventhColumn = footerRow.find('th:eq(7)');
           
            ti.rows().data().each(function(value, index){
                console.log(value);
                margintotal += parseCurrency(value[8]);//parseFloat(value[8]) || 0;
                //salestotal += parseFloat(value[6]) || 0;
                salestotal += parseCurrency(value[6]);//parseFloat(value[6]) || 0;
                procurementcost += parseCurrency(value[7]);//parseFloat(value[7]) || 0;
                commissiontotal += parseCurrency(value[9]);//parseFloat(value[7]) || 0;

            })

            var format9 = commissiontotal.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD'
            });

            
            var format8 = margintotal.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD'
            });

            var format7 = procurementcost.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD'
            });

            var format6 = salestotal.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD'
            });

            ninthcolumn.text(format9);
            eighthColumn.text(format8);

            sixthColumn.text(format6);
            seventhColumn.text(format7);
            console.log(margintotal.toFixed(2));
        })


        function parseCurrency(currencyString) {
            // Remove non-numeric characters (except for the decimal point)
            var numericString = currencyString.replace(/[^0-9.]/g, '');
            // Convert to a floating-point number
            return parseFloat(numericString);
        }
    var customreportsummary = $("table.table-commissionreportsummary");
    initDataTable(customreportsummary, admin_url + 'commissionsreport/csummarytable', ['undefined'], ['undefined'],
        Proposals_ServerParams, [0, 'desc']);
		
		
    
	
	
});


</script>
</body>

</html>