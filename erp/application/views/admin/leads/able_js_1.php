<script type="text/javascript">
$(document).ready(function(){
	
	$('input[name="name"], textarea[name="address"], input[name="city"], input[name="state"], input[name="email"], input[name="zip"], input[name="phonenumber"],input[name="custom_fields[leads][29]"]').blur(function(){
	//$('input[name="name"]').blur(function(){	
		//alert($(this).val());
		if($('form#lead_form').find('input[name="custom_fields[leads][30]"]').val()==''){
			get_creditscore();
		}
	});

})


function get_creditscore(){
	var name 	= $('form#lead_form').find('input[name="name"]').val();
	var address = $('textarea[name="address"]').val();
	var city 	= $('input[name="city"]').val();
	var state 	= $('input[name="state"]').val();
	var email 	= $('input[name="email"]').val();
	var phone 	= $('input[name="phonenumber"]').val();
	var zip 	= $('input[name="zip"]').val();
	var ssn 	= $('input[name="custom_fields[leads][29]"]').val();
	
	var formarray = {
		//alert(name + $('#name').val())
		cname : name,
		caddress: address,
		ccity: city,
		cstate : state,
		cemail : email,
		czip : zip,
		cssn: ssn
	};
	console.log(formarray);
	//alert(ssn);
	if(name !='' && address !='' && city !='' && state !='' && email !='' && phone !='' && zip != '' && ssn !=''){
	$.ajax({
			type: 'get',
			url: '<?php echo base_url() ?>/admin/leads/ableittcredditcheckapi',
			data : formarray,
			success:function(data){
				var emp = jQuery.parseJSON(data);  
				console.log(emp.Result.XML_Report);
				if(typeof emp.Result.XML_Report !== 'undefined'){
				//if(data.Result['XML_Report'] != null){	
					if (typeof emp.Result.XML_Report.Prescreen_Report.ResultCode !== 'undefined') {
						//console.log('RESULT CODE = '+data.Result['XML_Report']['Prescreen_Report']['ResultCode']);
						if(emp.Result.XML_Report.Prescreen_Report.ResultCode=='A'){
							//alert(data.Result['XML_Report']['Prescreen_Report']['Score']);
							$('form#lead_form').find('input[name="custom_fields[leads][30]"]').val(emp.Result.XML_Report.Prescreen_Report.Score);
						}else if(emp.Result.XML_Report.Prescreen_Report.ResultCode=='X'){
							//alert(data.Result['XML_Report']['Prescreen_Report']['ResultDescription']);
							alert_float('danger', emp.Result.XML_Report.Prescreen_Report.ResultDescription);
						}
					}
				}else if(typeof emp.Result.Creditsystem_Error !== 'undefined'){					
					
						//alert(data.Result['Creditsystem_Error']['@attributes']['message']);
						alert_float('danger', emp.Result['Creditsystem_Error']['@attributes']['message']);
					
				}
				
			}
	})
	}
	
}
</script>