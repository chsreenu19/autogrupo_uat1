<?php require_once('header.php'); ?>


<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) 
{
	$banner_car = $row['banner_car'];
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: index.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM tbl_car WHERE car_id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	//echo "<pre>"; print_r($result); //exit;
	if( $total == 0 ) {
		header('location: index.php');
		exit;
	}
}
?>
<?php							
foreach ($result as $row) {
	$title = $row['title'];
	$description = $row['description'];
	$address = $row['address'];
	$city = $row['city'];
	$state = $row['state'];
	$zip_code = $row['zip_code'];
	$country = $row['country'];
	$map = $row['map'];
	$car_category_id = $row['car_category_id'];
	$brand_id = $row['brand_id'];
	$model_id = $row['model_id'];
	$body_type_id = $row['body_type_id'];
	$fuel_type_id = $row['fuel_type_id'];
	$transmission_type_id = $row['transmission_type_id'];
	$vin = $row['vin'];
	$car_condition = $row['car_condition'];
	$engine = $row['engine'];
	$engine_size = $row['engine_size'];
	$exterior_color = $row['exterior_color'];
	$interior_color = $row['interior_color'];
	$seat = $row['seat'];
	$door = $row['door'];
	$top_speed = $row['top_speed'];
	$kilometer = $row['kilometer'];
	$mileage = $row['mileage'];
	$year = $row['year'];
	$warranty = $row['warranty'];
	$featured_photo = $row['featured_photo'];
	$regular_price = $row['regular_price'];
	$sale_price = $row['sale_price'];
	$seller_id = $row['seller_id'];
	$mechanical = $row['specs_machinical'];
	$vExteriors = $row['specs_exteriors'];
	$vInteriors = $row['specs_interiors'];
	$vEntertainment = $row['specs_entertainment'];
	$vSecurity = $row['specs_security'];
}

$statement = $pdo->prepare("SELECT * FROM tbl_car_category WHERE car_category_id=?");
$statement->execute(array($car_category_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
if($total) {
	foreach ($result as $row) {
		$car_category_name = $row['car_category_name'];
	}
} else {
	$car_category_name = 'Not Specified';
}						


$statement = $pdo->prepare("SELECT * FROM tbl_brand WHERE brand_id=?");
$statement->execute(array($brand_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
$total = $statement->rowCount();
if($total) {
	foreach ($result as $row) {
		$brand_name = $row['brand_name'];
	}
} else {
	$brand_name = 'Not Specified';
}

$statement = $pdo->prepare("SELECT * FROM tbl_model WHERE model_id=?");
$statement->execute(array($model_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
$total = $statement->rowCount();
if($total) {
	foreach ($result as $row) {
		$model_name = $row['model_name'];
	}
} else {
	$model_name = 'Not Specified';
}

$statement = $pdo->prepare("SELECT * FROM tbl_body_type WHERE body_type_id=?");
$statement->execute(array($body_type_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
$total = $statement->rowCount();
if($total) {
	foreach ($result as $row) {
		$body_type_name = $row['body_type_name'];
	}
} else {
	$body_type_name = 'Not Specified';
}

$statement = $pdo->prepare("SELECT * FROM tbl_fuel_type WHERE fuel_type_id=?");
$statement->execute(array($fuel_type_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
$total = $statement->rowCount();
if($total) {
	foreach ($result as $row) {
		$fuel_type_name = $row['fuel_type_name'];
	}
} else {
	$fuel_type_name = 'Not Specified';
}

$statement = $pdo->prepare("SELECT * FROM tbl_transmission_type WHERE transmission_type_id=?");
$statement->execute(array($transmission_type_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
$total = $statement->rowCount();
if($total) {
	foreach ($result as $row) {
		$transmission_type_name = $row['transmission_type_name'];
	}
} else {
	$transmission_type_name = 'Not Specified';
}

$statement = $pdo->prepare("SELECT * FROM tbl_seller WHERE seller_id=?");
$statement->execute(array($seller_id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$seller_name = $row['seller_name'];
	$seller_email = $row['seller_email'];
	$seller_phone = $row['seller_phone'];
	$seller_address = $row['seller_address'];
	$seller_city = $row['seller_city'];
	$seller_state = $row['seller_state'];
	$seller_country = $row['seller_country'];
	$seller_password = $row['seller_password'];
}
?>

<!--<div class="banner-slider" style="background-image: url(<?php echo BASE_URL.'assets/uploads/'.$banner_car; ?>);">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1>Car Detail</h1>
		</div>
	</div>
</div>-->

<!--Car Detail Start-->
<div class="car-detail bg-area">
	<div class="container-fluid" style="width: 100% !important;">
		<div class="row">
			<div class="col-md-12 text-center pt-3">
				<a href="https://www.700dealer.com/QuickQualify/6a244a745cec4724a2bf0efb43966587-2022214" target="_blank">
					<img src="assets/images/Banner-in-Spanish1.png"/>
				</a>
			</div>
			<div class="col-md-3 col-sm-12">
				<div class="car-detail-sidebar">
					<ul class="car-main-tab">
						<li class=""><a href="#Contact" data-toggle="tab" aria-expanded="true">Contact</a></li>
						<li class="active"><a href="#Car_Details" data-toggle="tab" aria-expanded="true">Car Details</a></li>
					</ul>
					<div class="detail-item car-detail-form">
						<div class="tab-content car-content">

							<div class="tab-pane " id="Contact">
								<h3>Reservar Unidad</h3>

								<?php
// After form submit checking everything for email sending
								if(isset($_POST['form1']))
								{

									$error_message = '';
									$success_message = '';
									$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
									foreach ($result as $row) 
									{
										$seller_email_subject = $row['seller_email_subject'];
										$seller_email_thank_you_message = $row['seller_email_thank_you_message'];
									}

									$valid = 1;

									if(empty($_POST['visitor_name']))
									{
										$valid = 0;
										$error_message .= 'Please enter your name.\n';
									}

									if(empty($_POST['visitor_email']))
									{
										$valid = 0;
										$error_message .= 'Please enter your email address.\n';
									}
									else
									{
    	// Email validation check
										if(!filter_var($_POST['visitor_email'], FILTER_VALIDATE_EMAIL))
										{
											$valid = 0;
											$error_message .= 'Please enter a valid email address.\n';
										}
									}

									if(empty($_POST['visitor_message']))
									{
										$valid = 0;
										$error_message .= 'Please enter your message.\n';
									}

									if(empty($_POST['from_date']))
									{
										$valid = 0;
										$error_message .= 'Please enter start date.\n';
									}

									if(empty($_POST['to_date']))
									{
										$valid = 0;
										$error_message .= 'Please enter end date.\n';
									}

									if($valid == 1)
									{

										$visitor_name = strip_tags($_POST['visitor_name']);
										$visitor_email = strip_tags($_POST['visitor_email']);
										$visitor_phone = strip_tags($_POST['visitor_phone']);
										$visitor_message = strip_tags($_POST['visitor_message']);
										$productURL = $_POST['producturl'];

										$desc = $car_condition.' Enquiry for '. 'Product-'.$productURL. 'For '. $car_condition. " for ". $_POST['totaldays']. "from ". $_POST['start_date']. "to ". $_POST['to_date']. " Per day fare $".$_POST['tprice']. 'Total Trip Fare $'.$_POST['totalprice'];  


										function createLead(){
											$type = $car_condition;

											$status = 1;
			$source = ($car_condition=='Old Car') ? 5 : 4;//$_GET['source'];
			$assigned = 1;
			$name =$visitor_name;		
			$email = strtolower($visitor_email);
			$phonenumber =  $visitor_phone;
			$lead_value = $_GET['lead_value'];
			$lastcontact = date("Y-m-d H:i:s");
			$dateadded = date("Y-m-d H:i:s");
			$description = $desc;
			
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "http://localhost/apis/node/services/call/createlead?status=$status&source=$source&assigned=$assigned&name=$name&email=$email&phonenumber=$phonenumber&lead_value=$lead_value&description=$description",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'GET',
				 // CURLOPT_POSTFIELDS => array('name' => 'rentals1','assigned' => '1','status' => '2','source' => '4','addedfrom' => '1','email' => 'rentals@mail.com','leadorder' => '1','lead_value' => '123456'),
				CURLOPT_HTTPHEADER => array(
					'Cookie: ci_session=3gedovaevr9jqp60s1j0c7026bi4vc8n; csrf_cookie_name=2fd3d0c0662d778d5dda6222f7404f17; sp_session=r39chkj6pavtj8jr78o2p16jbha7r763'
				),
			));

			$response = curl_exec($curl);


		}
		
		exit;	
		
		
		
		
		
		

        // sending email
        $to = 'podakkals@gmail.com';//$seller_email;
        $subject = $seller_email_subject;
        $message = '
        <html><body>
        <table>
        <tr>
        <td>Name</td>
        <td>'.$visitor_name.'</td>
        </tr>
        <tr>
        <td>Email</td>
        <td>'.$visitor_email.'</td>
        </tr>
        <tr>
        <td>Phone</td>
        <td>'.$visitor_phone.'</td>
        </tr>
        <tr>
        <td>Message</td>
        <td>'.nl2br($visitor_message).'</td>
        </tr>
        </table>
        </body></html>
        ';
        $headers = 'From: ' . $visitor_email . "\r\n" .
        'Reply-To: ' . $visitor_email . "\r\n" .
        'X-Mailer: PHP/' . phpversion() . "\r\n" . 
        "MIME-Version: 1.0\r\n" . 
        "Content-Type: text/html; charset=ISO-8859-1\r\n";

		// Sending email to admin				   
        mail($to, $subject, $message, $headers); 
        
        $success_message .= $seller_email_thank_you_message;

    }
}
?>

<?php
if($error_message != '') {
	echo "<script>alert('".$error_message."')</script>";
}
if($success_message != '') {
	echo "<script>alert('".$success_message."')</script>";
}
?>
<form action="" class="myform" method="post">
	<input type="hidden" value="<?php echo $actual_link; ?>" name="producturl"/>
	<input type="hidden" value="<?php echo $car_condition; ?>" name="categorytype"/>
	<div class="form-item">
		<input autocomplete="off" type="text" placeholder="Name (required)" id="visitor_name" name="visitor_name">
	</div>

	<div class="form-item">
		<input autocomplete="off" type="text" placeholder="Email Address (required)" id="visitor_email" name="visitor_email">
	</div>

	<div class="form-item">
		<input autocomplete="off" type="text" placeholder="Phone Number" id="visitor_phone" name="visitor_phone">
		Sale Price
		<input type="text" readonly value="<?php echo $sale_price ?>" name="tprice" id="tprice"/>
	</div>
	
	<?php 
	if($car_condition=='Rentals'){
		
		?>
		Rental Price Per Day
		
		
		<div class="form-item">
			From
			<input required autocomplete="off" type="text" placeholder="From Date" id="from_date" name="from_date" min="<?php echo date('Y-m-d')?>">
			
		</div>
		<div class="form-item">
			
			To
			<input required autocomplete="off" type="text" placeholder="To Date" id="to_date" name="to_date" min="<?php echo date('Y-m-d')?>">
		</div>
		Total Fare
		<input type="text" value="" readonly name="totalprice" id="totalprice"/>
		<input type="hidden" value="" readonly id="totaldays" name="totaldays"/>
		
		
	<?php } ?>
	<div class="form-item">
		<textarea placeholder="Message (required)" style="height: 180px;" name="visitor_message"
		></textarea>
	</div>

	<div class="form-item">
		<input type="submit" value="Send Message" id="submitbtn" name="form1">
	</div>
</form>
</div>

<div class="tab-pane active" id="Car_Details">
	<div class="detail-item car-detail-list  border-0 p-0">
		<h3>Car Details</h3>
		<table>
			<tbody>
				<tr>
					<td><span>Category</span></td>
					<td><?php echo $car_category_name; ?></td>
				</tr>
				<tr>
					<td><span>Brand</span></td>
					<td><?php echo ucfirst($brand_name); ?></td>
				</tr>
				<tr>
					<td><span>Model</span></td>
					<td><?php echo ucfirst($model_name); ?></td>
				</tr>								 
				<tr>
					<td><span>Body Type</span></td>
					<td><?php echo ucfirst($body_type_name); ?></td>
				</tr>
				<tr>
					<td><span>Fuel Type</span></td>
					<td><?php echo ucfirst($fuel_type_name); ?></td>
				</tr>
				<tr>
					<td><span>Transmission Type</span></td>
					<td><?php echo ucfirst($transmission_type_name); ?></td>
				</tr>
				<tr>
					<td><span>VIN</span></td>
					<td>
						<?php if($vin!=''): ?>

							<a href="http://www.carfax.com/cfm/ccc_DisplayHistoryRpt.cfm?partner=WDB_O&vin=<?php echo $vin; ?>" target="_blank">
								<?php echo $vin; ?>
							</a>

						<?php else: ?>
							Not Specified
						<?php endif; ?>
					</td>
				</tr>
				<tr>
					<td><span>Condition</span></td>
					<td><?php 
					echo ($car_condition) =='Old Car' ? 'Used Car' : $car_condition;
											//echo $car_condition; 
				?></td>
			</tr>
			<tr>
				<td><span>Engine</span></td>
				<td>
					<?php if($engine!=''): ?>
						<?php echo $engine; ?>
					<?php else: ?>
						Not Specified
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td><span>Engine Size</span></td>
				<td>
					<?php if($engine_size!=''): ?>
						<?php echo $engine_size; ?>
					<?php else: ?>
						Not Specified
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td><span>Exterior Color</span></td>
				<td>
					<?php if($exterior_color!=''): ?>
						<?php echo ucfirst($exterior_color); ?>
					<?php else: ?>
						Not Specified
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td><span>Interior Color</span></td>
				<td>
					<?php if($interior_color!=''): ?>
						<?php echo $interior_color; ?>
					<?php else: ?>
						Not Specified
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td><span>Number of Seats</span></td>
				<td>
					<?php if($seat!=''): ?>
						<?php echo $seat; ?>
					<?php else: ?>
						Not Specified
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td><span>Number of Doors</span></td>
				<td>
					<?php if($door!=''): ?>
						<?php echo $door; ?>
					<?php else: ?>
						Not Specified
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td><span>Top Speed</span></td>
				<td>
					<?php if($top_speed!=''): ?>
						<?php echo $top_speed; ?>
					<?php else: ?>
						Not Specified
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td><span>Kilometer</span></td>
				<td>
					<?php if($kilometer!=''): ?>
						<?php echo $kilometer; ?>
					<?php else: ?>
						Not Specified
					<?php endif; ?>
				</td>
			</tr>
		<!-- <tr>
			<td><span>Mileage</span></td>
			<td>
				<?php if($mileage!=''): ?>
					<?php echo $mileage; ?>
				<?php else: ?>
					Not Specified
				<?php endif; ?>
			</td>
		</tr> -->
		<tr>
			<td><span>Year</span></td>
			<td>
				<?php if($year!=0): ?>
					<?php echo $year; ?>
				<?php else: ?>
					Not Specified
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td><span>Warranty</span></td>
			<td>
				<?php if($warranty!=''): ?>
					<?php echo $warranty; ?>
				<?php else: ?>
					Not Specified
				<?php endif; ?>
			</td>
		</tr>
	</tbody>
</table>
</div>
</div>
	</div>				<!--<div class="detail-item car-detail-form">
						<h3>Reservar Unidad</h3>

						<?php
// After form submit checking everything for email sending
if(isset($_POST['form1']))
{
	
	$error_message = '';
	$success_message = '';
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$seller_email_subject = $row['seller_email_subject'];
		$seller_email_thank_you_message = $row['seller_email_thank_you_message'];
	}

    $valid = 1;

    if(empty($_POST['visitor_name']))
    {
        $valid = 0;
        $error_message .= 'Please enter your name.\n';
    }

    if(empty($_POST['visitor_email']))
    {
        $valid = 0;
        $error_message .= 'Please enter your email address.\n';
    }
    else
    {
    	// Email validation check
        if(!filter_var($_POST['visitor_email'], FILTER_VALIDATE_EMAIL))
        {
            $valid = 0;
            $error_message .= 'Please enter a valid email address.\n';
        }
    }

    if(empty($_POST['visitor_message']))
    {
        $valid = 0;
        $error_message .= 'Please enter your message.\n';
    }
	
	if(empty($_POST['from_date']))
    {
        $valid = 0;
        $error_message .= 'Please enter start date.\n';
    }
	
	if(empty($_POST['to_date']))
    {
        $valid = 0;
        $error_message .= 'Please enter end date.\n';
    }

    if($valid == 1)
    {
		
		$visitor_name = strip_tags($_POST['visitor_name']);
		$visitor_email = strip_tags($_POST['visitor_email']);
		$visitor_phone = strip_tags($_POST['visitor_phone']);
		$visitor_message = strip_tags($_POST['visitor_message']);
		$productURL = $_POST['producturl'];
		
		$desc = $car_condition.' Enquiry for '. 'Product-'.$productURL. 'For '. $car_condition. " for ". $_POST['totaldays']. "from ". $_POST['start_date']. "to ". $_POST['to_date']. " Per day fare $".$_POST['tprice']. 'Total Trip Fare $'.$_POST['totalprice'];  
			
		
		function createLead(){
			$type = $car_condition;

			$status = 1;
			$source = ($car_condition=='Old Car') ? 5 : 4;//$_GET['source'];
			$assigned = 1;
			$name =$visitor_name;		
			$email = strtolower($visitor_email);
			$phonenumber =  $visitor_phone;
			$lead_value = $_GET['lead_value'];
			$lastcontact = date("Y-m-d H:i:s");
			$dateadded = date("Y-m-d H:i:s");
			$description = $desc;
			
			$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://localhost/apis/node/services/call/createlead?status=$status&source=$source&assigned=$assigned&name=$name&email=$email&phonenumber=$phonenumber&lead_value=$lead_value&description=$description",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'GET',
				 // CURLOPT_POSTFIELDS => array('name' => 'rentals1','assigned' => '1','status' => '2','source' => '4','addedfrom' => '1','email' => 'rentals@mail.com','leadorder' => '1','lead_value' => '123456'),
				  CURLOPT_HTTPHEADER => array(
					'Cookie: ci_session=3gedovaevr9jqp60s1j0c7026bi4vc8n; csrf_cookie_name=2fd3d0c0662d778d5dda6222f7404f17; sp_session=r39chkj6pavtj8jr78o2p16jbha7r763'
				  ),
				));

				$response = curl_exec($curl);


	}
		
	exit;	
		
		
		
		
		
		

        // sending email
        $to = 'podakkals@gmail.com';//$seller_email;
        $subject = $seller_email_subject;
		$message = '
<html><body>
<table>
<tr>
<td>Name</td>
<td>'.$visitor_name.'</td>
</tr>
<tr>
<td>Email</td>
<td>'.$visitor_email.'</td>
</tr>
<tr>
<td>Phone</td>
<td>'.$visitor_phone.'</td>
</tr>
<tr>
<td>Message</td>
<td>'.nl2br($visitor_message).'</td>
</tr>
</table>
</body></html>
';
		$headers = 'From: ' . $visitor_email . "\r\n" .
				   'Reply-To: ' . $visitor_email . "\r\n" .
				   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
				   "MIME-Version: 1.0\r\n" . 
				   "Content-Type: text/html; charset=ISO-8859-1\r\n";

		// Sending email to admin				   
        mail($to, $subject, $message, $headers); 
		
        $success_message .= $seller_email_thank_you_message;

    }
}
?>
				
						<?php
						if($error_message != '') {
							echo "<script>alert('".$error_message."')</script>";
						}
						if($success_message != '') {
							echo "<script>alert('".$success_message."')</script>";
						}
						?>
						<form action="" class="myform" method="post">
							<input type="hidden" value="<?php echo $actual_link; ?>" name="producturl"/>
							<input type="hidden" value="<?php echo $car_condition; ?>" name="categorytype"/>
							<div class="form-item">
								<input autocomplete="off" type="text" placeholder="Name (required)" id="visitor_name" name="visitor_name">
							</div>

							<div class="form-item">
								<input autocomplete="off" type="text" placeholder="Email Address (required)" id="visitor_email" name="visitor_email">
							</div>

							<div class="form-item">
								<input autocomplete="off" type="text" placeholder="Phone Number" id="visitor_phone" name="visitor_phone">
								Sale Price
								<input type="text" readonly value="<?php echo $sale_price ?>" name="tprice" id="tprice"/>
							</div>
							
							<?php 
							if($car_condition=='Rentals'){
								
							?>
							Rental Price Per Day
							
							
							<div class="form-item">
								From
								<input required autocomplete="off" type="text" placeholder="From Date" id="from_date" name="from_date" min="<?php echo date('Y-m-d')?>">
								
							</div>
							<div class="form-item">
								
								To
								<input required autocomplete="off" type="text" placeholder="To Date" id="to_date" name="to_date" min="<?php echo date('Y-m-d')?>">
							</div>
							Total Fare
							<input type="text" value="" readonly name="totalprice" id="totalprice"/>
							<input type="hidden" value="" readonly id="totaldays" name="totaldays"/>
							
							
							<?php } ?>
							<div class="form-item">
								<textarea placeholder="Message (required)" style="height: 180px;" name="visitor_message"
								></textarea>
							</div>

							<div class="form-item">
								<input type="submit" value="Send Message" id="submitbtn" name="form1">
							</div>
						</form>
					</div>-->
				</div>
			</div>
			<div class="detail-item car-detail-list border-0 br-4 img-rounded mt-4">
				<div class="p-3">
					<h3 class="side_strip border-bottom mt-3 pb-2">Mortgage</h3>
					<div class="row Mortgage_form">
						<div class="col-md-12">
							<input type="text" class=" mb-3" name="custom_fields[proposal][18]" value="<?php echo $sale_price; ?>" placeholder="Vehicle Cost" name="custom_fields[proposal][18]">
						</div>
						<div class="col-md-12">
							<input type="text" class=" mb-3" name="custom_fields[proposal][17]" placeholder="Down Payment">
						</div>
						
						<div class="col-md-12">
							<input type="text" class=" mb-3" name="custom_fields[proposal][19]" placeholder="Trade in">
						</div>
						<div class="col-md-12">
							<input type="text" class=" mb-3" name="custom_fields[proposal][21]" placeholder="Payment Term">
						</div>
						<div class="col-md-12">
							<input type="text" class=" mb-3" name="custom_fields[proposal][23]" placeholder="APR">
						</div>
						<div class="col-md-12">
							<div class="mb-3 Mortgage_vlaues"><span id="monthlypayment"></span>&nbsp;</div>
						</div>
						
						
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9 col-sm-12">
<div class="car-detail-mainbar">
				<div class="car-detail-name">
					<h2><?php echo $title; ?></h2>
					<div class="car-detail-price">
						<p>
							<?php if($regular_price == $sale_price): ?>
								$<?php echo number_format($sale_price); ?>
							<?php else: ?>
								<del>$<?php echo $regular_price; ?></del> $<?php echo $sale_price; ?> 
							<?php endif; ?>								
						</p>
					</div>
				</div>
</div>
			<div class="gallery-slider_wrapper">
				<div class="single-gallery-carousel-content-box owl-carousel owl-theme">
					<?php 
					if($featured_photo!=''){
					?>
					<a class="item car_slider" href="<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $featured_photo; ?>?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
						<img src="<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $featured_photo; ?>?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Awesome Image"/>
					</a>
					<?php } ?>


					<?php
					$statement = $pdo->prepare("SELECT * FROM tbl_car_photo WHERE car_id=?");
					$statement->execute(array($_REQUEST['id']));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {
						?>


						
					<a class="item car_slider" href="<?php echo BASE_URL; ?>assets/uploads/other-cars/<?php echo $row['photo']; ?>?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
						<img src="<?php echo BASE_URL; ?>assets/uploads/other-cars/<?php echo $row['photo']; ?>?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Awesome Image"/>
					</a>

					<?php 
					}
					?>
					
				</div>
				<div style="margin:10px 25px 0 25px;">
					<div class="single-gallery-carousel-thumbnail-box owl-carousel owl-theme">

						<?php 
						if($featured_photo!=''){
						?>
						
						<div class="item" href="<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $featured_photo; ?>?auto=compress&cs=tinysrgb&dpr=2&h=750&w=750">
							<img src="<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $featured_photo; ?>?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Awesome Image"/>
						</div>
						<?php } ?>

						
						<?php
						$statement = $pdo->prepare("SELECT * FROM tbl_car_photo WHERE car_id=?");
						$statement->execute(array($_REQUEST['id']));
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
						foreach ($result as $row) {
						?>

						<div class="item" href="<?php echo BASE_URL; ?>assets/uploads/other-cars/<?php echo $row['photo']; ?>?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
							<img src="<?php echo BASE_URL; ?>assets/uploads/other-cars/<?php echo $row['photo']; ?>?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Awesome Image"/>
						</div>
						<?php 
						}
						?>
					</div>
				</div>
			</div>
			
			<div class="car-detail-mainbar">
				
					<!--<div class="car-detail-gallery owl-carousel">
						<div class="car-detail-photo" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $featured_photo; ?>)">
							<div class="lightbox-item">
								<a href="<?php echo BASE_URL; ?>assets/uploads/cars/<?php echo $featured_photo; ?>" data-lightbox="lightbox-item"><i class="fa fa-search-plus"></i></a>
							</div>
						</div>
						<?php
						$statement = $pdo->prepare("SELECT * FROM tbl_car_photo WHERE car_id=?");
						$statement->execute(array($_REQUEST['id']));
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
						foreach ($result as $row) {
							?>
							<div class="car-detail-photo" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/other-cars/<?php echo $row['photo']; ?>)">
								<div class="lightbox-item">
									<a href="<?php echo BASE_URL; ?>assets/uploads/other-cars/<?php echo $row['photo']; ?>" data-lightbox="lightbox-item"><i class="fa fa-search-plus"></i></a>
								</div>
							</div>
							<?php
						}
						?>
					</div>-->
					<div class="car-info-tab">

						<ul class="car-main-tab">
							<li class="active"><a href="#seller_description" data-toggle="tab" aria-expanded="true">Description</a></li>
							
							<li class=""><a href="#mechanical" data-toggle="tab" aria-expanded="true">Mechanical</a></li>
							<li class=""><a href="#Exterior" data-toggle="tab" aria-expanded="false">Exterior</a></li>
							<li class=""><a href="#interior" data-toggle="tab" aria-expanded="true">Interior</a></li>
							<li class=""><a href="#entertainment" data-toggle="tab" aria-expanded="false">Entertainment</a></li>
							<li class=""><a href="#security" data-toggle="tab" aria-expanded="false">Security</a></li>
							<!--<li class=""><a href="#monroney" data-toggle="tab" aria-expanded="false">Monroney Labels</a></li>-->
							
							
							
						</ul>

						<div class="tab-content car-content card">

							<div class="tab-pane active" id="seller_description">
								<div class="car-tab-text">
								
									<?php 
									if($car_condition!='Rentals' && $vin !=''){
										?>
										<p style="text-align: center;">

											<a href="http://www.carfax.com/cfm/ccc_DisplayHistoryRpt.cfm?partner=WDB_O&vin=<?php echo $vin; ?>" target="_blank">
												
												<img src="assets/images/carfax.png"/>
												<?php //echo $vin; ?>
											</a>
												<span class="monroney-labels" data-year="<?php echo $year; ?>" data-make="<?php echo ucfirst($brand_name); ?>" data-vin="<?php echo $vin; ?>" data-vendor-id="auto1pr"></span>
												
												
												
											  
	
										</p>
												
										<?php } ?>			
										<h2>Description</h2>
										<div class="car-tab-pre">
											<p>
												
												<?php if($description!=''): ?>



													<p><?php echo nl2br($description); ?>	</p>
													

												<?php else: ?>
													No Description Found.
												<?php endif; ?>											
											</p>
										</div>
									</div>
								</div>






								<div class="tab-pane" id="mechanical">
									<div class="car-tab-text">
										<h2>Mehanical Information</h2>
										<div class="car-tab-pre">
											<p class="ulli">
												<?php echo $mechanical; ?>
											</p>
										</div>
									</div>
								</div>

								<div class="tab-pane" id="Exterior">
									<div class="car-tab-text">
										<h2>Exteriors</h2>
										<div class="car-tab-pre">
											<p>
												<?php echo $vExteriors; ?>
											</p>
										</div>
									</div>
								</div>

								<div class="tab-pane" id="interior">
									<div class="car-tab-text">
										<h2>Interiors</h2>
										<div class="car-tab-pre">
											<p>
												<?php echo $vInteriors; ?>
											</p>
										</div>
									</div>
								</div>

								<div class="tab-pane" id="entertainment">
									<div class="car-tab-text">
										<h2>Entertainment</h2>
										<div class="car-tab-pre">
											<p>
												<?php echo $vEntertainment; ?>
											</p>
										</div>
									</div>
								</div>

								<div class="tab-pane" id="security">
									<div class="car-tab-text">
										<h2>Security</h2>
										<div class="car-tab-pre">
											<p>
												<?php echo $vSecurity; ?>
											</p>
										</div>
									</div>
								</div>
								
								<!--<div class="tab-pane" id="monroney">
									<div class="car-tab-text">
										<h2>Monroney Labels</h2>
										<div class="car-tab-pre">
											<p>
												
											</p>
										</div>
									</div>
								</div>
								-->











							</div>
						</div>
					</div>



					<br/>

					






					<!-- Related Cars -->
					<div class="related-ads row">
						<div class="related-ads-headline col-md-12">
							<h2>Related Cars</h2>
						</div>
						<?php
						$statement = $pdo->prepare("SELECT * FROM tbl_car WHERE brand_id=? AND car_id!=?");
						$statement->execute(array($brand_id,$_REQUEST['id']));
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);
						$total = $statement->rowCount();
						if($total):
							foreach ($result as $row) {
								?>
								<?php
				
									$fileL = '';		
									if(file_exists(D_ROOT.$row['featured_photo'])){
										
										$fileL = BASE_URL.'assets/uploads/cars/'.$row['featured_photo'];
									}else{
										$fileL = BASE_URL.'assets/uploads/cars/noimage.jpg';	
										//echo $fileL; exit;
									}
									
									if($row['featured_photo']=='' || $row['featured_photo']==null){
										$fileL = BASE_URL.'assets/uploads/cars/noimage.jpg';	
									}
									//echo $fileL; exit;
									?>
								<div class="col-md-6  ">
									<div class=" listing-item">
										<div class="row ">
											<div class="col-md-6 col-sm-6 col-xs-12 listing-photo">
												<img src="<?php echo $fileL; ?>">
												<h2>
													<?php if($row['regular_price']!=$row['sale_price']): ?>
														<del>$<?php echo number_format($row['regular_price']); ?></del>
														$<?php echo number_format($row['sale_price']); ?>
													<?php else: ?>
														$<?php echo number_format($row['sale_price']); ?>
													<?php endif; ?>
												</h2>
											</div>

											<div class="col-md-6 col-sm-6 col-xs-12 listing-text">
												<h2><?php echo $row['title']; ?></h2>
												<?php
												$statement1 = $pdo->prepare("SELECT * FROM tbl_car_category WHERE car_category_id=?");
												$statement1->execute(array($row['car_category_id']));
												$tot = $statement1->rowCount();
												$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);			
												foreach ($result1 as $row1) {
													$car_category_name = $row1['car_category_name'];
												}
												?>
												<ul>
													<li><span class="far fa-tags"></span>&nbsp; <span><?php if($tot!=''){echo $car_category_name;} else{echo 'Not Specified';} ?></span></li>
													 <li><span class="far fa-tachometer"></span>&nbsp; <span><?php if($row['mileage']!=''){echo $row['mileage'];} else{echo 'Not Specified';} ?></span></li> 
													<li><span class="far fa-calendar-alt"></span>&nbsp;  <span><?php if($row['year']!=0){echo $row['year'];} else{echo 'Not Specified';} ?></span></li>
												</ul>
												
											</div>

										</div>
										<a href="<?php echo BASE_URL.URL_CAR.$row['car_id']; ?>" class="view_icon"><span class="far fa-eye"></span></a>
									</div>
								</div>
								<?php
							}
						else:
							echo '<div class="listing-item">No Result Found</div>';
						endif;
						?>
					</div>
				</div>


			</div>
		</div>
	</div>
	<!--Car Detail End-->
	<style>

		.car-tab-pre ul {
			display: block;
			list-style-type: disc;
			margin-block-start: 1em;
			margin-block-end: 1em;
			margin-inline-start: 0px;
			margin-inline-end: 0px;
			padding-inline-start: 40px;
		}
		.car-detail-form input[type="date"]{
			width: 100%;
			height: 36px;
			text-indent: 10px;
			border: 1px solid #ddd;
			margin-bottom: 10px;
		}
	</style>
	<?php require_once('footer.php'); ?>


	<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>-->
	<script src="<?php echo BASE_URL; ?>assets/js/jquery.showLoading.js"></script>
	<style>


		#sync1 .item{
			/*background: #0c83e7;*/
			/*padding: 80px 0px;*/
			margin: 5px;
			color: #FFF;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			text-align: center;
			background-size: contain;
			background-position: top center;
			background-repeat: no-repeat;
			/*height: 370px;*/
		}
		#sync2 .item{
			background: #C9C9C9;
			padding: 10px 0px;
			margin: 5px;
			color: #FFF;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			text-align: center;
			cursor: pointer;
			height: 100px;
			width: 100px;
		}
		#sync2 .item h1{
			font-size: 18px;
		}
		#sync2 .synced .item{
			background: #0c83e7;
		}
		#sync2 .owl-item {
			max-width: 100px;
			min-width: 100px;
		}#sync2 .owl-stage {    transform: translate3d(0px, 0px, 0px) !important;    transition: 0s !important;	width: 100% !important;}

		.car-detail-gallery {
			margin-top: 0px !important; 
		}
	
	
	/*.monroney-labels > a {
      background: url(//labels-prod.s3.amazonaws.com/big-sticker.png);
      background-size: contain;
      display: block;
      height: 288px;
      margin: 0 auto;
      padding: 0;
      text-indent: -99999px;
      width: 252px;
  }
  .monroney-labels img {
      display: none !important;
  }*/

	</style>
	<script type="text/javascript">
		$(function () {
			var sync1 = $(".slider");
			var sync2 = $(".navigation-thumbs");

			var thumbnailItemClass = '.owl-item';

			var slides = sync1.owlCarousel({
				video: true,
				startPosition: 12,
				items: 1,
				loop: true,
				margin: 10,
				autoplay: true,
				autoplayTimeout: 6000,
				autoplayHoverPause: false,
				nav: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
				dots: true
			}).on('changed.owl.carousel', syncPosition);

			function syncPosition(el) {
				$owl_slider = $(this).data('owl.carousel');
				var loop = $owl_slider.options.loop;

				if (loop) {
					var count = el.item.count - 1;
					var current = Math.round(el.item.index - (el.item.count / 2) - .5);
					if (current < 0) {
						current = count;
					}
					if (current > count) {
						current = 0;
					}
				} else {
					var current = el.item.index;
				}

				var owl_thumbnail = sync2.data('owl.carousel');
				var itemClass = "." + owl_thumbnail.options.itemClass;


				var thumbnailCurrentItem = sync2
				.find(itemClass)
				.removeClass("synced")
				.eq(current);

				thumbnailCurrentItem.addClass('synced');

				if (!thumbnailCurrentItem.hasClass('active')) {
					var duration = 300;
					sync2.trigger('to.owl.carousel', [current, duration, true]);
				}
			}
			var thumbs = sync2.owlCarousel({
				startPosition: 12,
				items: 4,
				loop: false,
				margin: 10,
				autoplay: false,
				nav: false,
				dots: false,
				onInitialized: function(e) {
					var thumbnailCurrentItem = $(e.target).find(thumbnailItemClass).eq(this._current);
					thumbnailCurrentItem.addClass('synced');
				},
			})
			.on('click', thumbnailItemClass, function(e) {
				e.preventDefault();
				var duration = 300;
				var itemIndex = $(e.target).parents(thumbnailItemClass).index();
				sync1.trigger('to.owl.carousel', [itemIndex, duration, true]);
			}).on("changed.owl.carousel", function(el) {
				var number = el.item.index;
				$owl_slider = sync1.data('owl.carousel');
				$owl_slider.to(number, 100, true);
			});


	/*bootbox.alert("Hello world!", function() {
                console.log("Alert Callback");
            });
			
			
function dialog(){
	var dialog = bootbox.dialog({
    title: 'A custom dialog with init',
    message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
});
            
dialog.init(function(){
    setTimeout(function(){
        dialog.find('.bootbox-body').html('I was loaded after the dialog was shown!');
    }, 3000);
});
}			
	dialog();
	*/

			$("body").on("click","#submitbtn",function(e){
				e.preventDefault();
				if($('#from_date').val() !='' && $('#to_date').val()!='' && $("#visitor_name").val() !=='' && $("#visitor_email").val() !=='' && $("#visitor_phone").val() !=='' && $("#visitor_message").val() !==''){

					var str = $( ".myform" ).serialize();
					$(".car-detail-form").showLoading();
					$.ajax({
						type:'get',
						url: 'https://rapidoapps.com/clients/auto1/apis/node/services/call/createlead',
						data:str,
						success:function(data){
							console.log(data);
							if (isNaN(data)) {
					// It isn't a number
							} else {
								alert('Your message has been submitted successfully');
								$(".car-detail-form").hideLoading();
							}
						}
					});

		//$(".myform").submit();
				}
			})	

// set default dates
			var start = new Date();
// set end date to max one year period:
			var end = new Date(new Date().setYear(start.getFullYear()+1));

			$('#from_date').datepicker({
				startDate : start,
				endDate   : end,
				todayHighlight:'TRUE',
				autoclose: true
// update "toDate" defaults whenever "fromDate" changes
			}).on('changeDate', function(){
    // set the "toDate" start to not be later than "fromDate" ends:
				$('#to_date').datepicker('setStartDate', new Date($(this).val()));
				totalfare();
			}); 

			$('#to_date').datepicker({
				startDate : start,
				endDate   : end,
				todayHighlight:'TRUE',
				autoclose: true
// update "fromDate" defaults whenever "toDate" changes
			}).on('changeDate', function(){
    // set the "fromDate" end to not be later than "toDate" starts:
				$('#from_date').datepicker('setEndDate', new Date($(this).val()));
				totalfare();
			});





			$('input[name="custom_fields[proposal][17]"]').blur(function(){
			  emi_calculator();
		   });
		   
		   $('input[name="custom_fields[proposal][18]"]').blur(function(){
			  emi_calculator();
		   });
		   
		   $('input[name="custom_fields[proposal][19]"]').blur(function(){
			  emi_calculator();
		   });
		   
		   $('input[name="custom_fields[proposal][21]"]').blur(function(){
			  emi_calculator();
		   });
		   
			$('input[name="custom_fields[proposal][23]"]').blur(function(){
			  emi_calculator();
		   });




		});
function totalfare(){
	
	var start= $("#from_date").datepicker("getDate");
	var end= $("#to_date").datepicker("getDate");
	if(start !='' && end !=''){
		days = (end- start) / (1000 * 60 * 60 * 24) ;
		$("#totaldays").val(days);
		var tprice = $("#tprice").val();
		//days = days +1;
		if(days>0){
			var total = tprice * days;
		}else{
			var total = tprice;
		}
		
		//alert(total);
		$("#totalprice").val(total);
		
		
	}
}

function emi_calculator(){
	   var vcost = $('input[name="custom_fields[proposal][18]"]').val();
	   var soon = $('input[name="custom_fields[proposal][17]"]').val();
	   var tradein = $('input[name="custom_fields[proposal][19]"]').val();
	   var t = $('input[name="custom_fields[proposal][21]"]').val();
	   var r = $('input[name="custom_fields[proposal][23]"]').val();
	   if(soon!='' && t!='' && r!=''){
		    //alert(9);
		    var p;
			if(vcost!=''){
				p = vcost - soon;
			}else{
				p = soon;
			}
			if(tradein !=''){
				p = p-tradein;
			}
			var emi;
			//alert(2);
			var r = r / (12 * 100);
			//var t = t * 12;
			
			emi = (p * r * Math.pow(1 + r, t)) / (Math.pow(1 + r, t) - 1);
			emi = Math.round(emi);
			$('#monthlypayment').html("Monthly Payment : $"+emi);
			
			//alert(emi);
			//return Math.round(emi);
		}
		
	}

</script>
