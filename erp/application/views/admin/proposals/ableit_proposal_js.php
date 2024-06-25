<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
/**
 * Included in application/views/admin/proposals/proposal.php
 */
$userroleid = get_staff_role_id_value();
?>
<style>
label.control-label[for="custom_fields[proposal][63]"] {
    margin-bottom: 0.25rem !important;
}
</style>

<script>

$(function() {
//alert(1);
var userroleid = <?php echo $userroleid; ?>;


	$("<div class='row tohideifnottradein paymentsectiondiv'><div class='col-md-12 text-center'><hr class=''/><h4>Payment Details </h4></div></div>").insertAfter( $('form input[name="custom_fields[proposal][88]" ').closest(".col-md-3") );
	
	
	$("<div class='row tohideifnottradein tradeinhr tradeinsectiondiv'><div class='col-md-12 text-center'><hr class=''/><h4>Trade In Details </h4></div></div>").insertAfter( $('form select[name="custom_fields[proposal][89]" ').closest(".col-md-2") );

	$("<div class='row tohideifnottradein vapdiv'><div class='col-md-12 text-center'><hr class='tohideifnottradein'/><h4>Value Added Products</h4><span id='vaptotal'> </span></div></div>").insertAfter( $('form input[name="custom_fields[proposal][81]" ').closest(".col-md-3") );
	
	$("<div class='row tohideifnottradein insurancediv'><div class='col-md-12 text-center'><hr class=''/><h4>Insurance Details </h4></div></div>").insertAfter( $('form select[name="custom_fields[proposal][108]" ').closest(".col-md-4") );
	
	
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







	
	//purchasing inventory fields
	var purchaseinventoryarr = [
		'input[name="custom_fields[proposal][45]"]',
		'input[name="custom_fields[proposal][44]"]',
		'input[name="custom_fields[proposal][47]"]',
		'input[name="custom_fields[proposal][48]"]',
		'input[name="custom_fields[proposal][49]"]',
		'input[name="custom_fields[proposal][50]"]',
		'input[name="custom_fields[proposal][97]"]',
		'input[name="custom_fields[proposal][99]"]',
		'input[name="custom_fields[proposal][51]"]',
		'input[name="custom_fields[proposal][79]"]',
		'input[name="custom_fields[proposal][88]"]',
		'input[name="custom_fields[proposal][83]"]',
		'input[name="custom_fields[proposal][36][]"]',
	];

	var quotetradeinarr = [
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
		'input[name="custom_fields[proposal][125]"]',
		'input[name="custom_fields[proposal][126]"]',
		'input[name="custom_fields[proposal][61]"]',
		'input[name="custom_fields[proposal][77]"]',
		'select[name="custom_fields[proposal][78]"]',
		'input[name="custom_fields[proposal][80]"]',
		'input[name="custom_fields[proposal][81]"]',
		
	];

	var quotepaymentdetailsarr = [
		'input[name="custom_fields[proposal][100]"]',
		'input[name="custom_fields[proposal][101]"]',
		'input[name="custom_fields[proposal][102]"]',
		'input[name="custom_fields[proposal][103]"]',
		'input[name="custom_fields[proposal][104]"]',
		'input[name="custom_fields[proposal][105]"]',
		'input[name="custom_fields[proposal][40]"]',
		'input[name="custom_fields[proposal][42]"]',
		'input[name="custom_fields[proposal][43]"]',		
	];

	var vaparr = [
		'input[name="custom_fields[proposal][112]"]',
		'input[name="custom_fields[proposal][114]"]',
		'input[name="custom_fields[proposal][85]"]',
		'input[name="custom_fields[proposal][65]"]',
		'input[name="custom_fields[proposal][127]"]',
		'input[name="custom_fields[proposal][66]"]',
		'input[name="custom_fields[proposal][86]"]',
		'input[name="custom_fields[proposal][128]"]',
		'input[name="custom_fields[proposal][67]"]',
		'input[name="custom_fields[proposal][71]"]',		
	];

	

	var insurancearr = [
		'input[name="custom_fields[proposal][87]"]'		
	];

	//fi role	
	 if(userroleid==<?php echo FI_ROLE_ID; ?>){
		$.each(purchaseinventoryarr , function(index, val) { 
			$('select[name="custom_fields[proposal][78]"],select[name="custom_fields[proposal][78]"]').attr('disabled',true).selectpicker('refresh');
			$(val).attr("readonly",true);
		});	

		$.each(quotetradeinarr , function(index, val) { 
			
			$(val).attr("readonly",true);
		});	
	 }			
		
	
	 //sales manager
	 if(userroleid==<?php echo SALES_MANAGER_ROLE_ID; ?>){
		$('select[name="custom_fields[proposal][89]"],select[name="custom_fields[proposal][111]"],select[name="custom_fields[proposal][113]"],select[name="custom_fields[proposal][63]"],select[name="custom_fields[proposal][108]"],select[name="custom_fields[proposal][64]"],select[name="custom_fields[proposal][90]"]').attr("disabled", true).selectpicker('refresh');
		//$('select[name="custom_fields[proposal][89]"],select[name="custom_fields[proposal][111]"]').selectpicker('refresh');
		$('input[name="custom_fields[proposal][109][]"]').attr('disabled',true);
		$.each(quotepaymentdetailsarr , function(index, val) { 			
			$(val).attr("readonly",true);
		});	
		$.each(vaparr , function(index, val) { 			
			$(val).attr("readonly",true);
		});	
		$.each(insurancearr , function(index, val) { 			
			$(val).attr("readonly",true);
		});
	 }	
	 //sales manager

	 var srhiddenitems = [
		'input[name="custom_fields[proposal][126]"]',	
	 ];
	 //Sales representative
	 if(userroleid==<?php echo SALES_REPRESENTATIVE_ROLE_ID; ?>){
		$('input[name="custom_fields[proposal][38][]"],input[name="custom_fields[proposal][36][]"]').attr('disabled',true);
		$.each(purchaseinventoryarr , function(index, val) { 
			//$('select[name="custom_fields[proposal][78]"],select[name="custom_fields[proposal][78]"]').attr('disabled',true).selectpicker('refresh');
			$(val).attr("readonly",true);
		});	

		
		//$('input[name="custom_fields[proposal][126]"]').closest('.col-md-2').hide();
		$('input[name="custom_fields[proposal][45]"]').attr('readonly',false);
	 }
	
	//purchasing inventory fields
	
	













































	
	
	
	
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//$("select[name='custom_fields[proposal][63]']").closest('.col-md-4').css("margin-botton","-5px !important");
	

	var powerpack=0;
	var protectionPlan =0;
	var gapType=0;
	var autoSecure = 0;
	var dimondCBX = 0;
	var curVas = '';
	if($("input[name='vaptotal']").val()!=''){
		curVas = parseFloat($("input[name='vaptotal']").val());
	}
	
	


	$("body").on("change","select[name='custom_fields[proposal][63]']",function(){
		$("input[name='custom_fields[proposal][85]']").val(0);
		gapType = 0;
		var val = $(this).val();
		//alert(val);
		if(val=='GAP - 72 MONTHS OR LESS'){
			$("input[name='custom_fields[proposal][85]']").val(<?php echo GAP_SEVENTYTWO_OR_LESS_SALE_PRICE; ?>);
			gapType = 599;
		}else if(val=='GAP - 78 MONTHS OR MORE'){
			$("input[name='custom_fields[proposal][85]']").val(<?php echo GAP_EIGHTYFOUR_SALE_PRICE; ?>);
			gapType = 699;
		}else if(val=='LEASING'){
			$("input[name='custom_fields[proposal][85]']").val(<?php echo GAP_LEASING_SALE_PRICE; ?>);
			gapType = 799;
		}else{
			$("input[name='custom_fields[proposal][85]']").val('0');
			gapType = 0;
		}

		
		var tt = parseFloat(powerpack + protectionPlan + gapType + autoSecure + dimondCBX + curVas);
		tt = tt.toFixed(2);
		//tt.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2})
	
		//$('span#vaptotal').text('$'+tt);
		
	});
	
	
	$("body").on("change","select[name='custom_fields[proposal][116]']",function(){
		$("input[name='custom_fields[proposal][117]']").val('');
		autoSecure = 0;
		var val = $(this).val();
		//alert(val);
		if(val=='3 años'){
			$("input[name='custom_fields[proposal][117]']").val('749');
			autoSecure = 749;
		}else if(val=='5 años'){
			$("input[name='custom_fields[proposal][117]']").val('999');
			autoSecure = 999;
		}else if(val=='6 años'){
			$("input[name='custom_fields[proposal][117]']").val('1299');
			autoSecure = 1299;

		}else{
			$("input[name='custom_fields[proposal][117]']").val('0');
			autoSecure = 0;
		}
		var tt = parseFloat(powerpack + protectionPlan + gapType + autoSecure + dimondCBX + curVas);
		tt = tt.toFixed(2);
		//tt.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2})
	
		//$('span#vaptotal').text('$'+tt);
		
	});
	
	$("body").on("change","select[name='custom_fields[proposal][111]']",function(){
		$("input[name='custom_fields[proposal][112]']").val(0);
		powerpack = 0;
		var val = $(this).val();
		//alert(val);
		if(val=='Basic'){
			$("input[name='custom_fields[proposal][112]']").val(<?php echo POWER_PACK_SALE_PRICE ?>);
			powerpack =895;
		}else if(val=='Premium'){
			$("input[name='custom_fields[proposal][112]']").val('995');
			powerpack =995;
		}else{
			$("input[name='custom_fields[proposal][112]']").val('0');
			powerpack =0;
		}

		var tt = parseFloat(powerpack + protectionPlan + gapType + autoSecure + dimondCBX + curVas);
		tt = tt.toFixed(2);
		
		//tt.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2})
	
		//$('span#vaptotal').text('$'+tt);
		
	});
	
	$("body").on("change","select[name='custom_fields[proposal][113]']",function(){
		$("input[name='custom_fields[proposal][114]']").val(0);
		var val = $(this).val();
		protectionPlan =0;
		//alert(val);
		if(val=='Plan 1'){
			$("input[name='custom_fields[proposal][114]']").val(<?php echo PAYMENT_PROTECTION_PLAN_ONE_SALE_PRICE; ?>);
			protectionPlan = 799;
		}else if(val=='Plan 2'){
			$("input[name='custom_fields[proposal][114]']").val(<?php echo PAYMENT_PROTECTION_PLAN_TWO_SALE_PRICE; ?>);
			protectionPlan = 549;
		}else{
			$("input[name='custom_fields[proposal][114]']").val(0);
			protectionPlan = 0;
		}

		var tt = parseFloat(powerpack + protectionPlan + gapType + autoSecure + dimondCBX + curVas);
		tt = tt.toFixed(2);
		//tt.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2})
		//$('span#vaptotal').text('$'+tt);
		
	});


	
	
	
	
	
	 $('input[name="custom_fields[proposal][109][]"]').change(function()
      {
        if ($(this).is(':checked')) {
           var val = $(this).val();
		  
		   //console.log(val);
		   if(val=='Dimond Ceramic'){
			   
			   $("input[name='custom_fields[proposal][71]']").val(<?php echo DIMOND_CERAMIC_SALE_PRICE?>);
			   dimondCBX += 995;
		   }else if(val=='Asistencia a la carretera/Road Assistance'){
			   $("input[name='custom_fields[proposal][66]']").val(<?php echo ROAD_ASSISTANCE_SALE_PRICE?>);
			   dimondCBX += 379;
		   }
        }else{
			var val = $(this).val();
			
		   if(val=='Dimond Ceramic'){
			if($("input[name='custom_fields[proposal][71]']").val()<1){
				$("input[name='custom_fields[proposal][71]']").val(0);
			   dimondCBX = 0;
			}else if($("input[name='custom_fields[proposal][71]']").val()>0){
				$("input[name='custom_fields[proposal][71]']").val(0);
				dimondCBX = 0;
			}else{
				dimondCBX -=995;
			}
			  
		   }else if(val=='Asistencia a la carretera/Road Assistance'){
			if($("input[name='custom_fields[proposal][66]']").val()<1){
				$("input[name='custom_fields[proposal][66]']").val(0);
			    dimondCBX = 0;
			}else if($("input[name='custom_fields[proposal][66]']").val()>0){
				$("input[name='custom_fields[proposal][66]']").val(0);
			}else{
				dimondCBX -=379;
			}
			   
		   }
		}

		var tt = parseFloat(powerpack + protectionPlan + gapType + autoSecure + dimondCBX + curVas);
		tt = tt.toFixed(2);
		//tt.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2})
		//$('span#vaptotal').text('$'+tt);


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
					'input[name="custom_fields[proposal][126]"]',
					'input[name="custom_fields[proposal][125]"]',
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
		if(userroleid==<?php echo SALES_REPRESENTATIVE_ROLE_ID ?>){
			$('input[name="custom_fields[proposal][126]"]').closest(".col-md-2,.col-md-3").hide();
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
			alert_float('info', 'Fetching '+vinvalue+ ' information');
        $.ajax({
			url: '<?php echo base_url() ?>/admin/warehouse/vincheck_premium_plus?vin='+$(this).val(),
            type: "GET",
            dataType: "json",
            success: function(result)
            {
				//debugger;
				console.log(result)
				if(result.spec.success==true){	
					
					alert_float('success', 'Please wait, updating fields');
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
					alert_float('danger', 'VIN :'+ $(this).val() + ' not found');
					
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
	
	if(userroleid==<?php echo SALES_REPRESENTATIVE_ROLE_ID ?>){
		$.each(srhiddenitems , function(index, val) { 
			$(val).closest(".col-md-2,.col-md-3").hide();
		});
		$.each(quotepaymentdetailsarr , function(index, val) { 
			$(val).closest(".col-md-2,.col-md-3").hide();
		});
		$.each( vaparr, function(index, val) { 
			$(val).closest(".col-md-2,.col-md-3").hide();
		});
		$.each( insurancearr, function(index, val) { 
			$(val).closest(".col-md-2,.col-md-3").hide();
		});
		$('input[name="custom_fields[proposal][109][]"]').closest(".col-md-12").hide();
		$('select[name="custom_fields[proposal][89]"],select[name="custom_fields[proposal][111]"],select[name="custom_fields[proposal][113]"],select[name="custom_fields[proposal][63]"],select[name="custom_fields[proposal][108]"],select[name="custom_fields[proposal][64]"],select[name="custom_fields[proposal][90]"]').closest(".col-md-2,.col-md-3,.col-md-4").hide();
		$(".paymentsectiondiv,.vapdiv,.insurancediv").hide();
		
	}
	
		
//editing inventory price from quote screen
$("body").on("blur",'form input[name="rate"]',function(){
	var newPrice = $(this).val();
	
	
	//alert(newPrice);
	var checkIfVin = $(this).closest('td').prev('td').prev('td').prev('td').find('textarea').val();
	var str2Check = '-vin-';
	if(checkIfVin.indexOf(str2Check) != -1){
		//var vinId = $(this).closest('tr').find('#invvin').val();
		var vinId = $('input[name="invvin"]').val();
		//alert(newPrice+' ID:-'+vinId + ' VIN '+checkIfVin);
		alert_float("info", 'Please wait, while we update Inventory');

		$.ajax({
            url: '<?php echo base_url() ?>admin/warehouse/ableit_view_commodity_detail_by_id/'+vinId+'/'+newPrice,
            type: "GET",
            success: function(result)
            {
				var str3check = 'Success,';
				if(result.indexOf(str3check) != -1){
					//$(this).closest('tr').find('button').click();
					$('form input[name="rate"]').closest('tr').find('td:last').find('button').click();
					$('input[name="selvehicleprice"]').val(newPrice);
					$('input[name="custom_fields[proposal][44]"]').val(newPrice);
					$('input[name="custom_fields[proposal][45]"]').click().blur();
					alert_float("success", result);
				}else{
					alert_float("danger", result);
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
	
	
//12232023
	//payment details, for Banco Popular 1st and last payment
	$("body").on("change","select[name='custom_fields[proposal][89]']",function(){
		
		$('input[name="custom_fields[proposal][101]"]').val('');
		$('input[name="custom_fields[proposal][104]"]').val('');
		var bank = $(this).val();
		
		var apr = $('input[name="custom_fields[proposal][40]"]').val();
		var term = $('input[name="custom_fields[proposal][42]"]').val();
		
		
		//emi_calculator();
		if(bank=='Banco Popular' || bank=='First Bank'){
			if(apr==''){
				alert_float("danger", "Please enter valid APR");
				return false;
			}
			if(term==''){
				alert_float("danger", "Please enter valid payment term");
				return false;
			}
			//emi_calculator();
		}
		
	});
	//12232023	
	

	$("body").on("change","input[name='custom_fields[proposal][40]'],input[name='custom_fields[proposal][42]']",function(){

		if($(this).val()!=''){
			financialinstitution();
		}
	})	
	
	//0402
	$("body").find('input[name="custom_fields[proposal][131][]"]').closest(".col-md-12").addClass("text-center");
    
});
function emi_calculator(){
	   //balance
	   
	   var isedit =  $('input[name="isedit"]').val();
	   
	   var bankpayoff = $('input[name="custom_fields[proposal][61]"]').val() || 0;
	   
	   var tradein_allowance1 = $('input[name="custom_fields[proposal][46]"]').val() || 0;
	   var tradein_allowance = 0;
	   
	   tradein_allowance = tradein_allowance1 - bankpayoff;
	   //alert('diff'+tradein_allowance);
	   
	   var insuranceoptions = $("select[name='custom_fields[proposal][131]']").val();
	   if (insuranceoptions === 'Sold by Mobility Coverage') {
			// Get the insurance amount from the input field
			if($('input[name="custom_fields[proposal][87]"]').val()!=''){
			var insuranceamount = parseInt($('input[name="custom_fields[proposal][87]"]').val(),10) || 0;
			}else{
				var insuranceamount = 0;
			}
			
			// Debug statement to check the value of insuranceamount
			console.log('insuranceamount:', insuranceamount);
		} else {
			// Set insuranceamount to 0 if insuranceoptions is not 'Sold by Mobility Coverage'
			var insuranceamount = 0;
		}
	   
	   var vaparr = [
			'input[name="custom_fields[proposal][112]"]',
			'input[name="custom_fields[proposal][114]"]',
			'input[name="custom_fields[proposal][85]"]',
			'input[name="custom_fields[proposal][65]"]',
			'input[name="custom_fields[proposal][66]"]',
			'input[name="custom_fields[proposal][86]"]',
			'input[name="custom_fields[proposal][67]"]',
			'input[name="custom_fields[proposal][71]"]',		
		];
		var vaptotals = 0;

		$.each(vaparr , function(index, val) { 	
			var value = parseInt($(val).val(), 10); // Parse value as integer
			if (!isNaN(value)) { // Check if value is a valid number
				vaptotals += value; // Add value to total
				
			}
		});
		console.log('Vaptotals:'+vaptotals+'==insurance:'+insuranceamount);
	   if(isedit!='' && isedit > 0){
		   //var balance = $('input[name="custom_fields[proposal][44]"]').val();
		   if(tradein_allowance<0){
			   var balance = getvehiclesalepricefromquote() -( tradein_allowance);
		   }else{
				var balance = getvehiclesalepricefromquote();
		   }
		   //alert(balance);
	   }else{
		   if(tradein_allowance<0){
			
			var balance = $('input[name="selvehicleprice"]').val()  - (tradein_allowance);
			   
			   
		   }else{
			
			var balance = $('input[name="selvehicleprice"]').val();
		   }
		  // alert(balance);
		//var balance = $('input[name="selvehicleprice"]').val();
	   }
	
	   //down payment
	   var downpayment = $('input[name="custom_fields[proposal][45]"]').val() || 0;
	   //alert("downpayment : "+downpayment)
	   
	   var paymentterm = $('input[name="custom_fields[proposal][42]"]').val();
	   var apr = $('input[name="custom_fields[proposal][40]"]').val();
	   //alert(downpayment);
		if(balance==''){
			alert_float("danger", "Please select a valid inventory");
			return false;
		}
		console.log('Balance:'+balance);
		balance =  parseInt(balance) + vaptotals + insuranceamount;
		console.log('AfterBalance:'+balance);
		//alert(balance);
		//alert(9);
		var p;
		if(balance!=''){
			p = balance - downpayment;
			//alert(p);
		}else{
			p = downpayment;
		}
		//alert(p);
		//alert('balance'+balance);
		if(tradein_allowance !=''){
			if(tradein_allowance>0){
				p = p-(tradein_allowance);
			}
			
			
			//alert(p);
		}
		//alert(p);
		var emi;
		//alert(2);
		var r = apr / (12 * 100);
		//var t = t * 12;
		
		emi = (p * r * Math.pow(1 + r, paymentterm)) / (Math.pow(1 + r, paymentterm) - 1);
		//emi = Math.round(emi);
		var firstpaymentserviceharge = 15;
		var firstpayment = (balance * 0.005) + firstpaymentserviceharge + emi;
		firstpayment = Math.ceil(firstpayment); 

		var secondpayment = emi;
		$('input[name="custom_fields[proposal][101]"]').val(firstpayment.toFixed(2));
		$('input[name="custom_fields[proposal][104]"]').val(emi.toFixed(2));
		
		
	}
	
	function getvehiclesalepricefromquote(){
		var vinprice = 0;
		$('.estimate-items-table').find('tbody').find('tr').each(function(index, tr){
            //console.log(index);

            if(index >0){			
                var td = $(this).find("td:eq(1)").text();
				var checkIfVin = $(this).find("td:eq(1)").text();
                var str2Check = '-vin-';	
                if(checkIfVin.indexOf(str2Check) != -1){
                    
                    vinprice = parseFloat($(this).find("td:eq(4)").find('input').val()).toFixed(2);
                    
                }	
            }			
        });
		
		return vinprice;
	}

	function financialinstitution(){
   
		$("select[name='custom_fields[proposal][89]']").trigger('change');
	}

</script>