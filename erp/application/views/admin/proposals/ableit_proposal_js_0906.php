<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
/**
 * Included in application/views/admin/proposals/proposal.php
 */
?>
<style>
label.control-label[for="custom_fields[proposal][63]"] {
    margin-bottom: 0.25rem !important;
}
</style>

<script>

$(function() {
//alert(1);

	$("<div class='row tohideifnottradein'><div class='col-md-12 text-center'><hr class=''/><h4>Payment Details </h4></div></div>").insertAfter( $('form input[name="custom_fields[proposal][88]" ').closest(".col-md-3") );
	
	
	$("<div class='row tohideifnottradein tradeinhr'><div class='col-md-12 text-center'><hr class=''/><h4>Trade In Details </h4></div></div>").insertAfter( $('form select[name="custom_fields[proposal][89]" ').closest(".col-md-2") );

	$("<div class='row tohideifnottradein'><div class='col-md-12 text-center'><hr class='tohideifnottradein'/><h4>Value Added Products</h4></div></div>").insertAfter( $('form input[name="custom_fields[proposal][81]" ').closest(".col-md-3") );
	
	$("<div class='row tohideifnottradein'><div class='col-md-12 text-center'><hr class=''/><h4>Insurance Details </h4></div></div>").insertAfter( $('form select[name="custom_fields[proposal][108]" ').closest(".col-md-4") );
	
	
	/*$("body").on("blur",'input[name="custom_fields[proposal][61]"]',function(){		
		var balance = parseInt($(this).val());
		var tradein = parseInt($('input[name="custom_fields[proposal][46]"]').val());		
		if(tradein !=''){
			var diff = parseInt(tradein-balance);			
			$('input[name="custom_fields[proposal][46]"]').val(diff);			
			$('.estimate-items-table').find('tbody').find('tr').each(function(index, tr){
				if(index >0){			
				var td = $(this).find("td:eq(1)").text();
					if(td=='Tradein'){
						$(this).find('td:eq(7)').find('a').click();						
						$('input[name="custom_fields[proposal][46]"]').click().blur();	
					}				
				}			
			});
		}
	});*/
	
	
	
	
	
	
	
	
	$("body").on("blur",'input[name="custom_fields[proposal][61]"]',function(){		
		var balance = parseInt($(this).val());
		var tradein = parseInt($('input[name="custom_fields[proposal][46]"]').val());		
		if(tradein !=''){
			//var diff = parseInt(tradein-balance);	
			var diff =0;
			var bal = parseInt($('input[name="custom_fields[proposal][44]"]').val());
			var upval =0;
			if(tradein > balance){
				diff = (balance - tradein) + bal;
				upval = balance - tradein;
				//alert('if '+diff);
				$('input[name="custom_fields[proposal][44]"]').val(diff);
			}else if(tradein < balance){
				diff = (balance - tradein) + bal;
				upval = balance - tradein;
				//alert('else '+diff);
				$('input[name="custom_fields[proposal][44]"]').val(diff);
			}
			
			
			upval = parseInt(upval);			
			$('.estimate-items-table').find('tbody').find('tr').each(function(index, tr){
				if(index >0){			
				var td = $(this).find("td:eq(1)").text();
					if(td=='Tradein'){
						$(this).find('td:eq(7)').find('a').click();						
						$('input[name="custom_fields[proposal][46]"]').click().blur();
						alert_float("success", 'Added Trade as line item');
						//alert('Diff#'+diff+'##'+$(this).find('td:eq(4)').find('input').val());
						//$(this).find('td:eq(4)').find('input').val(upval).click().blur();			
					}
					if(td=='Bank Pay off'){
						$(this).find('td:eq(7)').find('a').click();	
						$('textarea[name="description"]').val('Bank Pay off');
						$('textarea[name="long_description"]').val('Bank Pay off');
						$('input[name="rate"]').val(balance);				
						setTimeout(function () {	
							$('textarea[name="description"]').closest('tr').find('button').click();
							$('.additemtotable').click();	
							$('input[name="custom_fields[proposal][46]"]').click().blur();	
							
						}, 300);	
						
							
					}
				}			
			});
			
			
			setTimeout(function () {	
				$('textarea[name="description"]').val('Bank Pay off');
			    $('textarea[name="long_description"]').val('Bank Pay off');
			    $('input[name="rate"]').val(balance);				
				setTimeout(function () {	
					$('textarea[name="description"]').closest('tr').find('button').click();
					$('.additemtotable').click();	
					//$('input[name="custom_fields[proposal][46]"]').click().blur();	
					
					alert_float("success", 'Added Bank Pay off as line item');
				}, 300);	
			}, 2000);
			
		}
	});
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$("select[name='custom_fields[proposal][63]']").closest('.col-md-4').css("margin-botton","-5px !important");
	
	$("body").on("change","select[name='custom_fields[proposal][63]']",function(){
		$("input[name='custom_fields[proposal][85]']").val('');
		var val = $(this).val();
		//alert(val);
		if(val=='GAP 3-6 Years (Premiere)'){
			$("input[name='custom_fields[proposal][85]']").val('599');
		}else if(val=='GAP 7 Years (Premiere)'){
			$("input[name='custom_fields[proposal][85]']").val('699');
		}else if(val=='Gap Leasing'){
			$("input[name='custom_fields[proposal][85]']").val('799');
		}else{
			$("input[name='custom_fields[proposal][85]']").val('0');
		}
		
	});
	
	$("body").on("change","select[name='custom_fields[proposal][111]']",function(){
		$("input[name='custom_fields[proposal][112]']").val('');
		var val = $(this).val();
		//alert(val);
		if(val=='Basic'){
			$("input[name='custom_fields[proposal][112]']").val('895');
		}else if(val=='Premium'){
			$("input[name='custom_fields[proposal][112]']").val('995');
		}else{
			$("input[name='custom_fields[proposal][112]']").val('0');
		}
		
	});
	
	$("body").on("change","select[name='custom_fields[proposal][113]']",function(){
		$("input[name='custom_fields[proposal][114]']").val('');
		var val = $(this).val();
		//alert(val);
		if(val=='Plan 1'){
			$("input[name='custom_fields[proposal][114]']").val('799');
		}else if(val=='Plan 2'){
			$("input[name='custom_fields[proposal][114]']").val('549');
		}else{
			$("input[name='custom_fields[proposal][114]']").val('0');
		}
		
	});


	
	
	
	
	
	 $('input[name="custom_fields[proposal][109][]"]').change(function()
      {
		  //$("input[name='custom_fields[proposal][71]']").val('');
		  //$("input[name='custom_fields[proposal][66]']").val('');
        if ($(this).is(':checked')) {
           var val = $(this).val();
		   //console.log(val);
		   if(val=='Dimond Ceramic'){
			   $("input[name='custom_fields[proposal][71]']").val('995');
		   }else if(val=='Asistencia a la carretera/Road Assistance (Service Contract)'){
			   $("input[name='custom_fields[proposal][66]']").val('379');
		   }
        }else{
			var val = $(this).val();
		   if(val=='Dimond Ceramic'){
			   $("input[name='custom_fields[proposal][71]']").val('0');
		   }else if(val=='Asistencia a la carretera/Road Assistance (Service Contract)'){
			   $("input[name='custom_fields[proposal][66]']").val('0');
		   }
		}
      });


	  var arr = [
					'input[name="custom_fields[proposal][46]"]',
					'input[name="custom_fields[proposal][52]"]',
					'input[name="custom_fields[proposal][53]"]',
					'input[name="custom_fields[proposal][54]"]',
					'input[name="custom_fields[proposal][55]"]',
					'input[name="custom_fields[proposal][56]"]',
					'input[name="custom_fields[proposal][57]"]',
					'input[name="custom_fields[proposal][58]"]',
					'input[name="custom_fields[proposal][59]"]',
					'input[name="custom_fields[proposal][60]"]',
					'input[name="custom_fields[proposal][61]"]',
					'input[name="custom_fields[proposal][77]"]',
					'select[name="custom_fields[proposal][78]"]',
					'input[name="custom_fields[proposal][60]"]',
					'input[name="custom_fields[proposal][80]"]',
					'input[name="custom_fields[proposal][81]"]',
				];
		$("div.tradeinhr").hide();	
		$.each(arr , function(index, val) { 
			
			$(val).closest(".col-md-2,.col-md-3").hide();
		});		
		
		var url = $(location).attr('href'),
			parts = url.split("/"),
			last_part = parts[parts.length-1];
			isrelid = parts[parts.length-1];
			
			var intRegex = /^\d+$/;
			var editadd = '';
			if(intRegex.test(last_part)) {
			   //alert('number');
			   editadd = 'number';
				if ($('input[name="custom_fields[proposal][38][]"]').is(':checked')) {
					 $("div.tradeinhr").show();
		   
					$.each(arr , function(index, val) { 
						
						$(val).closest(".col-md-2,.col-md-3,.col-md-4").show();
					});
				}
			}else{
				  editadd = 'notnumber';
			}
		
		

	  $('input[name="custom_fields[proposal][38][]"]').change(function()
      {
		
        if ($(this).is(':checked')) {
           var val = $(this).val();
		   $("div.tradeinhr").show();
		   
			$.each(arr , function(index, val) { 
				
				$(val).closest(".col-md-2,.col-md-3").show();
			});
		  
        }else{
			var val = $(this).val();
			$("div.tradeinhr").hide();
			$.each(arr , function(index, val) { 				
				$(val).val('');
				$(val).closest(".col-md-2,.col-md-3").hide();
			});
		}
      });
	
	
	//tradein vin look up
	$("body").on("blur",'input[name="custom_fields[proposal][52]"]',function(){
		var vinvalue = $(this).val();
		
		$('input[name="custom_fields[proposal][53]"]').val('');				
		$('input[name="custom_fields[proposal][54]"]').val('');
		$('input[name="custom_fields[proposal][55]"]').val('');
		$('input[name="custom_fields[proposal][57]"]').val('');
		//$('input[name="custom_fields[proposal][58]"]').val('');
		
		if($(this).val()!=''){
        $.ajax({
            url: '<?php echo base_url() ?>/admin/warehouse/vincheck?vin='+$(this).val(),
            type: "GET",
            dataType: "json",
            success: function(result)
            {
				//debugger;
				console.log(result)
				if(result.spec.success==true){	
					
					
					$('input[name="custom_fields[proposal][53]"]').val(result.spec.attributes.Make);				
					$('input[name="custom_fields[proposal][54]"]').val(result.spec.attributes.Model);
					$('input[name="custom_fields[proposal][55]"]').val(result.spec.attributes.Year);
					//$('input[name="custom_fields[proposal][58]"]').val(result.spec.exteriorcolor);
					if (typeof result.value['mileage'] === "undefined") {
						$('input[name="custom_fields[proposal][57]"]').val(result.spec.attributes['City Mileage']);
					}else{
						$('input[name="custom_fields[proposal][57]"]').val(result.value['mileage']);
					}
				}else {
					alert('No results found for the VIN number '+ vinvalue)
					
				}
				
            },
            error: function(xhr, ajaxOptions, thrownError)
            {
                console.log(xhr.status);
                console.log(thrownError);
            }
        });
		
	}
    });
    
});

</script>