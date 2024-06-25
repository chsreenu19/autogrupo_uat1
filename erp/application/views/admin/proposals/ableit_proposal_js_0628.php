<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
/**
 * Included in application/views/admin/proposals/proposal.php
 */
?>
<script>

$(function() {
//alert(1);

	$("<div class='row tohideifnottradein'><div class='col-md-12 text-center'><hr class=''/><h4>Trade In Details </h4></div></div>").insertAfter( $('form select[name="custom_fields[proposal][89]" ').closest(".col-md-4") );

	$("<div class='row tohideifnottradein'><div class='col-md-12 text-center'><hr class='tohideifnottradein'/><h4>VAP & Insurance</h4></div></div>").insertAfter( $('form input[name="custom_fields[proposal][81]" ').closest(".col-md-4") );
	
	
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