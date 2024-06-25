<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="panel-table-full">
                <?php $this->load->view('admin/salesreport/list_template'); ?>
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
   /* var Proposals_ServerParams = {};
    $.each($('._hidden_inputs._filters input'), function() {
        Proposals_ServerParams[$(this).attr('name')] = '[name="' + $(this).attr('name') + '"]';
    });
    initDataTable('.table-proposals', admin_url + 'proposals/table', ['undefined'], ['undefined'],
        Proposals_ServerParams, [7, 'desc']);
    init_proposal();
	
	*/
	
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
	//console.log('Params: '+Proposals_ServerParams);
    var ti = initDataTable(table_quotes, admin_url + 'salesreport/table', ['undefined'], ['undefined'],
        Proposals_ServerParams, [0, 'desc']);
	
        



     
        
        ti.on('draw', function(){
            var vaptotal = 0;            
            var procurementcost = 0;
            var commissiontotal = 0;
            var footerRow = $('table.table-proposals tfoot tr');

            var fifthColumn = footerRow.find('th:eq(5)');
            var thirdColumn = footerRow.find('th:eq(3)');
            var fourthColumn = footerRow.find('th:eq(4)');
           
            ti.rows().data().each(function(value, index){
                console.log(value);
                vaptotal += parseCurrency(value[3]);
                console.log(vaptotal);
                
                procurementcost += parseCurrency(value[4]);//parseFloat(value[7]) || 0;
                commissiontotal += parseCurrency(value[5]);//parseFloat(value[7]) || 0;

            })

            var format3 = vaptotal.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD'
            });

            
            var format4 = procurementcost.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD'
            });

            var format5 = commissiontotal.toLocaleString('en-US', {
                style: 'currency',
                currency: 'USD'
            });

            

           
            

            thirdColumn.text(format3);
            fourthColumn.text(format4);
            fifthColumn.text(format5);
            //console.log(margintotal.toFixed(2));
        })


        function parseCurrency(currencyString) {
            
            // Remove non-numeric characters (except for the decimal point)
            var numericString = currencyString.replace(/[^0-9.]/g, '');
            console.log('Currency: '+numericString);
            // Convert to a floating-point number
            return parseFloat(numericString);
        }
		
		
		
    //init_proposal();
	
	
});
</script>
</body>

</html>