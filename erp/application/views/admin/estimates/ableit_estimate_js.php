<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
/**
 * Included in application/views/admin/proposals/proposal.php
 */
$userroleid = get_staff_role_id_value();
//echo "<pre>kirticoa"; print_r(json_encode($able_coa_list));
$coa = json_encode($able_coa_list);
$estimateid = ($estimate->id) ? $estimate->id : 0;
?>


<script>

$(function() {

	var optionsData = <?php echo $coa; ?>;
	var estimateid = <?php echo $estimateid; ?>;

	//alert(3);

	if(estimateid>0){
		$('input[name="custom_fields[estimate][136]').val(<?php echo $estimate->id; ?>);
		

		$('#journalentriesdiv select').each(function() {
			var selectName = $(this).attr('name');
			
			$.each(optionsData, function(index, option) {
			$("select[name='"+selectName+"']").append($('<option>', {
					value: option.id,
					text: option.name
				}));
			});
			$("select[name='"+selectName+"']").selectpicker('refresh');
			
		});

	}
	

	


	$("body").on("click",".jnlsubmitbtn",function(event){
		//event.preventDefault();
		//alert(2);
		console.log('formdata:'+$("#jnlpostingform").serialize());
		var formData = $('#jnlpostingform').serialize();
		$.ajax({
			url: '<?php echo admin_url()?>estimates/ableitjnlpostings',
			type:'POST',
			data: formData,
			success:function(data){

				setTimeout(function() {
					alert_float("success", 'Journal Entries added/updated successfully');
					location.reload();
				}, 1500);
				
			},
			error: function(xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                    }
		});

	})


	$("body").on("change","select[name='control_types[]']",function(){
		var val = $(this).val();
		val = val.replace(/\s+/g, '');

		//alert(val);
		$(this).closest('div.row').find(".hidecontrolelements").hide();
		$(this).closest('div.row').find("#Vendedores,#VINdeCarro,#CustomerNumber,#inputforvtoe").hide();
		//$(".hidecontrolelements").hide();
		if(val =='VendorType' || val=='OpenEntry'){
			$(this).closest('div.row').find("div#inputforvtoe").show();
		}else{
			$(this).closest('div.row').find("div#"+val).show();
		}
		
		//$("#"+val).show();
	})
	
    // Loop through the data array and add options dynamically
    /*$.each(optionsData, function(index, option) {
        $("select[name='custom_fields[estimate][134]'],select[name='custom_fields[estimate][135]']").append($('<option>', {
            value: option.id,
            text: option.name
        }));
    });
    
    // Refresh the SelectPicker after adding options
    $("select[name='custom_fields[estimate][134]'],select[name='custom_fields[estimate][135]']").selectpicker('refresh');*/
	
    
});
function dealcalculator(estimateid){

	
	$.ajax({
		type: 'get',
		url:'<?php echo admin_url()?>estimates/dealcalculator/'+estimateid,
		success:function(data){			
			$('#dealcalculatormodal_body').html(data);
			$('#dealcalculatormodal').modal("show");
		}
	})
}

</script>