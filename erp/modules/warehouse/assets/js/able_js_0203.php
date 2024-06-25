<script>
(function($) {
    "use strict";
	

    //$('#custom_fields_items').find('.col-md-3,.col-md-6').hide();
	//$("#custom_fields_items").find('.col-md-3:first').show();
	
	$("body").on("blur",'input[name="custom_fields[items][1]"]',function(){
		var vinvalue = $(this).val();
		//alert(vinvalue.length);
		//return false;
		alert_float('info', 'Fetching '+vinvalue+ ' information');
		//$(this).focus()
		//alert($('#options_vvinnumber').val());
		
			//alert($(this).val());
			/*$("#options_vmodel").val('');
			$("#options_bodytype").val('');
			$("#options_transmission").val('');
			$("#options_fueltype").val('');
			$("#options_engine").val('');
			$("#options_vehicleyear").val('');
			$("#options_enginesize").val('');
			$("#options_seats").val('');
			$("#options_mileage").val('');
			$('#options_vcatetory').val('');
			$('#options_exteriorcolor').val('');
			$('#options_interiorcolor').val('');
			$('#options_warranty').html('');
			$('#options_mechanical').html('');
			CKEDITOR.instances['options_mechanical'].setData('');
			CKEDITOR.instances['options_vexterior'].setData('');;
			CKEDITOR.instances['options_vinterior'].setData('');;
			CKEDITOR.instances['options_ventertainment'].setData('');;
			CKEDITOR.instances['options_vsecurity'].setData('');*/
		
		if($(this).val()!='' && vinvalue.length==17){
        $.ajax({
            url: '<?php echo base_url() ?>/admin/warehouse/vincheck_premium_plus?vin='+$(this).val(),
            type: "GET",
            dataType: "json",
            success: function(result)
            {

				//debugger;
				//console.log(result)
				if(result.spec.success==true){
				
					alert_float('success', 'Please wait, updating fields');
				
				$('input[name="custom_fields[items][2]"]').val(result.spec.attributes.Make);
				
				$('input[name="custom_fields[items][3]"]').val(result.spec.attributes.Model);
				//
				$('input[name="custom_fields[items][11]"]').val(result.spec.attributes['Vehicle Type']);
				$('input[name="custom_fields[items][9]"]').val(result.spec.attributes['Transmission Type']);
				$('input[name="custom_fields[items][10]"]').val(result.spec.attributes['Fuel Type']);
				$('input[name="custom_fields[items][6]"]').val(result.spec.attributes.Engine);
				$('input[name="custom_fields[items][5]"]').val(result.spec.attributes.Year);
				$('input[name="custom_fields[items][7]"]').val(result.spec.attributes['Engine Size']);
				$('input[name="custom_fields[items][15]"]').val(result.spec.attributes['Standard Seating']);
				$('input[name="custom_fields[items][8]"]').val(result.spec.attributes['City Mileage']);
				$('input[name="custom_fields[items][4]"]').val(result.spec.attributes['Vehicle Category']);
				$('input[name="custom_fields[items][14]"]').val(result.spec.interiorcolor);
				$('input[name="custom_fields[items][13]"]').val(result.spec.exteriorcolor);
				$('input[name="custom_fields[items][18]"]').html(result.spec.warranty);
				$('input[name="custom_fields[items][16]"]').val(result.spec.attributes.Doors);
				//added from vehicle database api
				$('input[name="custom_fields[items][98]"]').val(result.spec.attributes.Trim);
				$('input[name="custom_fields[items][107]"]').val(result.spec.attributes.HorsePower);
				
				//added cylinders
				$('input[name="custom_fields[items][106]"]').val(result.spec.attributes['Engine Cylinders']);		
				//added cylinders 02072023
				
				$('custom_fields[items][24]').html(result.spec['vexterior']);
				
				tinymce.get('custom_fields[items][24]').setContent(result.spec['vexterior']);
				tinymce.get('custom_fields[items][25]').setContent(result.spec['vinteriors']);
				tinymce.get('custom_fields[items][26]').setContent(result.spec['vsafety']);
				tinymce.get('custom_fields[items][27]').setContent(result.spec['mehcanical']);
				tinymce.get('custom_fields[items][28]').setContent(result.spec['ventertainment']);
				
				
				//general info
				$('input[name="commodity_code"]').val(vinvalue +'  '+ result.spec.attributes.Make + ' ' +result.spec.attributes.Model);
				$('input[name="description"]').val(result.spec.attributes.Make + ' ' +result.spec.attributes.Model);
				$('input[name="commodity_barcode"]').val(vinvalue);
				$('input[name="sku_code"]').val(vinvalue);
				$('input[name="sku_name"]').val(result.spec.attributes.Make + ' ' +result.spec.attributes.Model);
				
				var vechicle_description = 'VIN : ' + vinvalue + '<br/>';
					vechicle_description += 'Brand : ' + result.spec.attributes.Make + '<br/>';
					vechicle_description += 'Model : ' + result.spec.attributes.Model + '<br/>';
					vechicle_description += 'Year : ' + result.spec.attributes.Year + '<br/>';
					vechicle_description += 'Transmission : ' + result.spec.attributes['Transmission Type'] + '<br/>';
					vechicle_description += 'Engine : ' + result.spec.attributes.Engine + '<br/>';
					vechicle_description += 'Fuel : ' + result.spec.attributes['Fuel Type'] + '<br/>';
					vechicle_description += 'Mileage : ' + result.spec.attributes['City Mileage'] + '<br/>';
					//vechicle_description += 'Color : ' + + '<br>';
					//alert(vechicle_description);
				tinymce.get('long_description').setContent(vechicle_description);
				
				//console.log(vechicle_description);
				
				$('#custom_fields_items').find('.col-md-3,.col-md-6').fadeIn();
				
				$("#warehouse_id").val('1').attr("selected", "selected").trigger('change');
				$("#unit_id").val('1').attr("selected", "selected").trigger('change');	
				$("#commodity_type").val('1').attr("selected", "selected").trigger('change');		
				tinymce.DOM.bind(document, 'click', function(e) {
 console.debug(e.target);
});
				$("iframe").each(function () {
					//Using closures to capture each one
					var iframe = $(this);
					iframe.on("load", function () { //Make sure it is fully loaded
						iframe.contents().click(function (event) {
							//console.log('click');
							iframe.trigger("click");
						});
					});

					iframe.click(function () {
						//Handle what you need it to do
					});
				});
				
				}else{
					//alert('No results found for the VIN number '+ $(this).val())
					alert_float('danger', 'VIN :'+ $(this).val() + ' not found');
					$('#custom_fields_items').find('.col-md-3,.col-md-6').fadeIn();
				}
				
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
		
	}else if(vinvalue.length <17){
		alert_float('danger', $(this).val() + 'is not a valid VIN');
	}
    });


	//update inventory status
	var isUpdated=false;
	$("body").on("change","select[name='custom_fields[items][35]']",function(){

		var selVal = $(this).val();
		var itemId = $("input[name='id']").val();
		var type = $("select#commodity_type").val();
		var group = $("select#group_id").val();
		
		if(( itemId!='' && group=='<?php echo ITEM_VEHICLE_GROUP_ID; ?>') && (selVal!='' || selVal =='Sold' || selVal =='For Sale')){
			
		
			//isUpdated=true;
			if(selVal=='Sold'){
				alert_float('danger', 'Deleting item from ecommerce');
			}else if(selVal =='For Sale'){
				alert_float('danger', 'Please wait, Adding item to eCommerce');
			}
			$.ajax({
				type:'post',
				url: '<?php echo base_url()?>admin/warehouse/update_item_avaibale_status',
				data: {'id': itemId, 'type':selVal},
				success:function(result){
					if(result=='success'){
						alert_float('success', 'Inventory updated on CRM and eCommerce');	
					}else{
						alert_float('danger', 'Error! updating inventory');	
					}
				}
			});
			
		}
	})
	
	$("body").on("blur",'input[name="purchase_price"]',function(){
		var val = parseInt($(this).val().split(",").join(""));
		//alert(val);
		var commision_pack = <?php echo COMMISSION_PACK_PRICE; ?>;
		var total = val+commision_pack;
		if(val > 0){
			$('input[name="commission_pack"]').val(total);
		}
	});
	
	
   
})(jQuery);

function syncall(url){
	$.ajax({
		type:'get',
		url:url,
		success:function(data){
			console.log(data);
		}
	})
}

</script>