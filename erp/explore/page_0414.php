<?php require_once('header.php'); ?>

<?php
// Preventing the direct access of this page.
if(!isset($_REQUEST['slug']))
{
	header('location: index.php');
	exit;
}
else
{
	// Check the page slug is valid or not.
	$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_slug=? AND status=?");
	$statement->execute(array($_REQUEST['slug'],'Active'));
	$total = $statement->rowCount();
	if( $total == 0 )
	{
		header('location: index.php');
		exit;
	}
}

// Getting the detailed data of a page from page slug
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_slug=?");
$statement->execute(array($_REQUEST['slug']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
//echo "<pre>"; print_r($result); exit;						
foreach ($result as $row) 
{
	$page_name    = $row['page_name'];
	$page_slug    = $row['page_slug'];
	$page_content = $row['page_content'];
	$page_layout  = $row['page_layout'];
	$banner       = $row['banner'];
	$status       = $row['status'];
}

// If a page is not active, redirect the user while direct URL press
if($status == 'Inactive')
{
	header('location: index.php');
	exit;
}
?>

<!--Banner Start-->
<div class="banner-slider" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $banner; ?>)">
	<div class="bg"></div>
	<div class="bannder-table">
		<div class="banner-text">
			<h1><?php echo $page_name; ?></h1>
		</div>
	</div>
</div>
<!--Banner End-->


<?php if($page_layout == 'Full Width Page Layout'): ?>
	<div class="about-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="about-text">
						<?php echo $page_content; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if($page_layout == 'FAQ Page Layout'): ?>
	<div class="faq-area bg-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">


					<?php
					$i=0;
					$j=0;
					$statement = $pdo->prepare("SELECT * FROM tbl_faq_category ORDER BY faq_category_id ASC");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {
						$i++;
						?>
						<div class="accordion-item">
							<h3><?php echo $row['faq_category_name']; ?></h3>
							<dl class="faq-accordion">

								<?php
								$statement1 = $pdo->prepare("SELECT * FROM tbl_faq WHERE faq_category_id=?");
								$statement1->execute(array($row['faq_category_id']));
								$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);		
								foreach ($result1 as $row1) {
									$j++;
									?>
									<dt class="<?php if($j==1){echo 'open';} ?>"><?php echo $row1['faq_title']; ?></dt>
									<dd>
										<?php echo $row1['faq_content']; ?>
									</dd>
									<?php
								}
								?>
							</dl>
						</div>
						<?php
					}
					?>

				</div>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php if($page_layout == 'Contact Us Page Layout'): ?>
	<?php
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$contact_address = $row['contact_address'];
		$contact_email = $row['contact_email'];
		$contact_phone = $row['contact_phone'];
		$contact_fax = $row['contact_fax'];
		$contact_map_iframe = $row['contact_map_iframe'];
	}
	?>
	<div class="contact-area bg-area">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="contact-item mt-0">
								<div class="contact-text">
									<i class="fas fa-map-marker-alt"></i>
									<h3>Address</h3>
									<p><?php echo $contact_address; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="contact-item mt-0">
								<div class="contact-text">
									<i class="fas fa-at"></i>
									<h3>Email</h3>
									<p><?php echo $contact_email; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="contact-item">
								<div class="contact-text">
									<i class="fas fa-phone-alt"></i>
									<h3>Phone</h3>
									<p><?php echo $contact_phone; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="contact-item">
								<div class="contact-text">
									<i class="fas fa-fax"></i>
									<h3>Fax</h3>
									<p><?php echo $contact_fax; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="card">
						<div class="row">
							<div class="col-md-12">

								<?php
// After form submit checking everything for email sending
								if(isset($_POST['form_contact']))
								{
									$error_message = '';
									$success_message = '';
									$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
									foreach ($result as $row) 
									{
										$receive_email = $row['receive_email'];
										$receive_email_subject = $row['receive_email_subject'];
										$receive_email_thank_you_message = $row['receive_email_thank_you_message'];
									}

									$valid = 1;

									if(empty($_POST['visitor_name']))
									{
										$valid = 0;
										$error_message .= 'Please enter your name.\n';
									}

									if(empty($_POST['visitor_phone']))
									{
										$valid = 0;
										$error_message .= 'Please enter your phone number.\n';
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

									if(empty($_POST['visitor_comment']))
									{
										$valid = 0;
										$error_message .= 'Please enter your comment.\n';
									}

									if($valid == 1)
									{

										$visitor_name = strip_tags($_POST['visitor_name']);
										$visitor_email = strip_tags($_POST['visitor_email']);
										$visitor_phone = strip_tags($_POST['visitor_phone']);
										$visitor_comment = strip_tags($_POST['visitor_comment']);

        // sending email
										$to_admin = $receive_email;
										$subject = $receive_email_subject;
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
										<td>Comment</td>
										<td>'.nl2br($visitor_comment).'</td>
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
										mail($to_admin, $subject, $message, $headers); 

										$success_message = $receive_email_thank_you_message;

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



								<div class="contact-form mt-0 p-4">
									<form accept="<?php echo BASE_URL.URL_PAGE.$_REQUEST['slug']; ?>" method="post">
										<div class="">

											<div class="form-group">
												<label for="">Full Name</label>
												<input type="text" class="form-control" name="visitor_name" placeholder="Full Name">
											</div>

											<div class="form-group">
												<label for="">Phone Number</label>
												<input type="text" class="form-control" name="visitor_phone" placeholder="Phone Number">
											</div>

											<div class="form-group">
												<label for="">Email</label>
												<input type="text" class="form-control" name="visitor_email" placeholder="Email">
											</div>


											<div class="form-group">
												<label for="">Massege</label>
												<textarea class="form-control" name="visitor_comment"></textarea>
											</div>

											<button type="submit" class="btn btn-primary" name="form_contact">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="map-area">
								<?php echo $contact_map_iframe; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>






<!-- Latest ui code -->
<?php if($page_layout == 'Financing Layout'): ?>
	<?php
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$contact_address = $row['contact_address'];
		$contact_email = $row['contact_email'];
		$contact_phone = $row['contact_phone'];
		$contact_fax = $row['contact_fax'];
		$contact_map_iframe = $row['contact_map_iframe'];
	}
	?>
	<div class="contact-area bg-area">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<div class="row">
						<div class="col-md-12">
							<div class="contact-item mt-0 card">
								<div class="contact-text">
									<i class="fas fa-map-marker-alt"></i>
									<h3>Address</h3>
									<p><?php echo $contact_address; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-at"></i>
									<h3>Email</h3>
									<p><?php echo $contact_email; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-phone-alt"></i>
									<h3>Phone</h3>
									<p><?php echo $contact_phone; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-fax"></i>
									<h3>Fax</h3>
									<p><?php echo $contact_fax; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-12">
					<div class="card">
						<div class="row">
							<div class="col-md-12">

								<iframe class="col-md-12" height="850" src="http://localhost/crm/forms/wtl/48d0940af2d3875326cc54a817354702" frameborder="0" allowfullscreen></iframe>

								<div class="contact-form mt-0 p-4">
									<form accept="<?php echo BASE_URL.URL_PAGE.$_REQUEST['slug']; ?>" method="post" name="FinancingForm">
										<div class=" row">
											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-user"></i> &nbsp; Personal Information</h4>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for=""> Name</label>
												<input required type="text" class="form-control" name="FinName" placeholder="Name">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Surname</label>
												<input type="text" class="form-control" name="FinSurname" placeholder="Surname">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Telephone</label>
												<input type="text" class="form-control" name="FinTelephone" placeholder="Telephone">
											</div>

											<div class="form-group col-md-6 col-sm-12">
												<label for="">E-mail</label>
												<input type="text" class="form-control" name="Finvisitor_email" placeholder="E-mail">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Date of birth</label>
												<input type="date" class="form-control" name="FinDOB" placeholder="DOB">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Social Security</label>
												<input type="text" class="form-control" name="FinSocialSecurity" placeholder="SocialSecurity">
											</div>

											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-home-alt"></i> &nbsp; Residence Information</h4>
											</div>
											<div class="form-group col-md-12 col-sm-12">
												<label for="">Address</label>
												<input type="text" class="form-control" name="FinAddress" placeholder="Address">
											</div>

											<div class="form-group col-md-6 col-sm-12">
												<label for="">Municipality</label>
												<input type="text" class="form-control" name="FinMunicipality" placeholder="Municipality">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Postal Code</label>
												<input type="text" class="form-control" name="FinPostal Code" placeholder="Postal Code">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Residence Type</label>
												<select class="form-control" name="FinResidenceType">
													<option value="Own">Own</option>
													<option value="Rented">Rented</option>
													<option value="Lives with Relatives">Lives with Relatives</option>
												</select>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Residence Time</label>
												<input type="text" class="form-control" name="FinResidence Time" placeholder="Residence Time">
											</div>
											
											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-sack-dollar"></i> &nbsp; Financial Information</h4>
											</div>
												<div class="form-group col-md-6 col-sm-12">
												<label for="">Job Type</label>
												<select class="form-control" name="FinJobType">
													<option value="Full Time">Full Time</option>
													<option value="Part Time">Part Time</option>
													<option value="Own Account">Own Account</option>
												</select>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Workplace</label>
												<input type="text" class="form-control" name="FinWorkplace" placeholder="Workplace">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Position</label>
												<input type="text" class="form-control" name="FinPosition" placeholder="Position">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Employment time</label>
												<input type="text" class="form-control" name="FinEmployment time" placeholder="Employment time">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Entry</label>
												<input type="text" class="form-control" name="FinEntry" placeholder="Entry">
											</div>
												<div class="form-group col-md-6 col-sm-12">
												<label for="">Frequency</label>
												<select class="form-control">
													<option value="Monthly">Monthly</option>
													<option value="Weekly">Weekly</option>
													<option value="Biweekly">Biweekly</option>
												</select>
											</div>
											<div class="col-md-12">

												<div class="form-check form_check_block my-4">
													<input class="form-check-input" name="FinConsent" type="checkbox" value="" id="flexCheckDefault">
													<label class="form-check-label" for="flexCheckDefault">
														I agree to have read the <a href="#">Privacy Policy</a>
													</label>
												</div>
												<div class="form-check form_check_block my-4">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
													<label class="form-check-label" for="flexCheckDefault1">
														I Accept the <a href="#">terms and Conditions</a>
													</label>
												</div>
											</div>
											<div class="col-md-6 col-sm-12 mt-3">

												<button type="submit" class="btn btn-theme py-3 w-100" name="form_contact">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="map-area">
								<?php //echo $contact_map_iframe; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>

<!-- Latest ui code -->

<!-- Latest ui code -->
<?php if($page_layout == 'Trade-in Layout'): ?>
	<?php
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$contact_address = $row['contact_address'];
		$contact_email = $row['contact_email'];
		$contact_phone = $row['contact_phone'];
		$contact_fax = $row['contact_fax'];
		$contact_map_iframe = $row['contact_map_iframe'];
	}
	?>
	<div class="contact-area bg-area">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<div class="row">
						<div class="col-md-12">
							<div class="contact-item mt-0 card">
								<div class="contact-text">
									<i class="fas fa-map-marker-alt"></i>
									<h3>Address</h3>
									<p><?php echo $contact_address; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-at"></i>
									<h3>Email</h3>
									<p><?php echo $contact_email; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-phone-alt"></i>
									<h3>Phone</h3>
									<p><?php echo $contact_phone; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-fax"></i>
									<h3>Fax</h3>
									<p><?php echo $contact_fax; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-12">
					<div class="card">
						<div class="row">
							<div class="col-md-12">

								<?php
// After form submit checking everything for email sending
								if(isset($_POST['form_contact']))
								{
									$error_message = '';
									$success_message = '';
									$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
									foreach ($result as $row) 
									{
										$receive_email = $row['receive_email'];
										$receive_email_subject = $row['receive_email_subject'];
										$receive_email_thank_you_message = $row['receive_email_thank_you_message'];
									}

									$valid = 1;

									if(empty($_POST['visitor_name']))
									{
										$valid = 0;
										$error_message .= 'Please enter your name.\n';
									}

									if(empty($_POST['visitor_phone']))
									{
										$valid = 0;
										$error_message .= 'Please enter your phone number.\n';
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

									if(empty($_POST['visitor_comment']))
									{
										$valid = 0;
										$error_message .= 'Please enter your comment.\n';
									}

									if($valid == 1)
									{

										$visitor_name = strip_tags($_POST['visitor_name']);
										$visitor_email = strip_tags($_POST['visitor_email']);
										$visitor_phone = strip_tags($_POST['visitor_phone']);
										$visitor_comment = strip_tags($_POST['visitor_comment']);

        // sending email
										$to_admin = $receive_email;
										$subject = $receive_email_subject;
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
										<td>Comment</td>
										<td>'.nl2br($visitor_comment).'</td>
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
										mail($to_admin, $subject, $message, $headers); 

										$success_message = $receive_email_thank_you_message;

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



								<div class="contact-form mt-0 p-4">
									<form accept="<?php echo BASE_URL.URL_PAGE.$_REQUEST['slug']; ?>" method="post">
										<div class=" row">
											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-user"></i> &nbsp; Personal Information</h4>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Full Name</label>
												<input type="text" class="form-control" name="Full Name" placeholder="Full Name">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Surname</label>
												<input type="text" class="form-control" name="Surname" placeholder="Surname">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Telephone</label>
												<input type="text" class="form-control" name="Telephone" placeholder="Telephone">
											</div>

											<div class="form-group col-md-6 col-sm-12">
												<label for="">E-mail</label>
												<input type="text" class="form-control" name="visitor_email" placeholder="E-mail">
											</div>

											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-taxi"></i> &nbsp; Vehicle Information</h4>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Brand</label>
												<input type="text" class="form-control" name="Brand" placeholder="Brand">
											</div>

											<div class="form-group col-md-6 col-sm-12">
												<label for="">Model</label>
												<input type="text" class="form-control" name="Model" placeholder="Model">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Year</label>
												<input type="text" class="form-control" name="Year" placeholder="Year">
											</div>

											<div class="form-group col-md-6 col-sm-12">
												<label for="">Mileage</label>
												<input type="text" class="form-control" name="Mileage" placeholder="Mileage">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">VIN</label>
												<input type="text" class="form-control" name="VIN" placeholder="VIN">
											</div>

											<div class="form-group col-md-6 col-sm-12">
												<label for="">Engine</label>
												<input type="text" class="form-control" name="Engine" placeholder="Engine">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Transmission</label>
												<select class="form-control">
													<option>Select Transmission</option>
												</select>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Condition</label>
												<select class="form-control">
													<option>Condition</option>
												</select>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Accident</label>
												<select class="form-control">
													<option>Accident</option>
												</select>
											</div>

											<div class="form-group col-md-6 col-sm-12">
												<label for="">Fix cost</label>
												<input type="text" class="form-control" name="fixcost" placeholder="fixcost">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Balance</label>
												<select class="form-control">
													<option>Balance</option>
												</select>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Debt</label>
												<input type="text" class="form-control" name="Debt" placeholder="Debt">
											</div>
											<div class="form-group col-md-12">
												<label class="btn btn-outline-primary btn-lg py-3">
													<i class="fad fa-upload"></i> Browse <input type="file" hidden>
												</label>

											</div>
											<div class="col-md-12">

												<div class="form-check form_check_block my-4">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
													<label class="form-check-label" for="flexCheckDefault">
														I agree to have read the <a href="#">Privacy Policy</a>
													</label>
												</div>
												<div class="form-check form_check_block my-4">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
													<label class="form-check-label" for="flexCheckDefault1">
														I Accept the <a href="#">terms and Conditions</a>
													</label>
												</div>
											</div>
											<div class="col-md-6 col-sm-12 mt-3">

												<button type="submit" class="btn btn-theme py-3 w-100" name="form_contact">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="map-area">
								<?php echo $contact_map_iframe; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>

<!-- Latest ui code -->
<?php if($page_layout == 'Request Service'): ?>
	<?php
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$contact_address = $row['contact_address'];
		$contact_email = $row['contact_email'];
		$contact_phone = $row['contact_phone'];
		$contact_fax = $row['contact_fax'];
		$contact_map_iframe = $row['contact_map_iframe'];
	}
	?>
	<div class="contact-area bg-area">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<div class="row">
						<div class="col-md-12">
							<div class="contact-item mt-0 card">
								<div class="contact-text">
									<i class="fas fa-map-marker-alt"></i>
									<h3>Address</h3>
									<p><?php echo $contact_address; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-at"></i>
									<h3>Email</h3>
									<p><?php echo $contact_email; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-phone-alt"></i>
									<h3>Phone</h3>
									<p><?php echo $contact_phone; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-fax"></i>
									<h3>Fax</h3>
									<p><?php echo $contact_fax; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-12">
					<div class="card">
						<div class="row">
							<div class="col-md-12">

								<?php
// After form submit checking everything for email sending
								if(isset($_POST['form_contact']))
								{
									$error_message = '';
									$success_message = '';
									$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
									foreach ($result as $row) 
									{
										$receive_email = $row['receive_email'];
										$receive_email_subject = $row['receive_email_subject'];
										$receive_email_thank_you_message = $row['receive_email_thank_you_message'];
									}

									$valid = 1;

									if(empty($_POST['visitor_name']))
									{
										$valid = 0;
										$error_message .= 'Please enter your name.\n';
									}

									if(empty($_POST['visitor_phone']))
									{
										$valid = 0;
										$error_message .= 'Please enter your phone number.\n';
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

									if(empty($_POST['visitor_comment']))
									{
										$valid = 0;
										$error_message .= 'Please enter your comment.\n';
									}

									if($valid == 1)
									{

										$visitor_name = strip_tags($_POST['visitor_name']);
										$visitor_email = strip_tags($_POST['visitor_email']);
										$visitor_phone = strip_tags($_POST['visitor_phone']);
										$visitor_comment = strip_tags($_POST['visitor_comment']);

        // sending email
										$to_admin = $receive_email;
										$subject = $receive_email_subject;
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
										<td>Comment</td>
										<td>'.nl2br($visitor_comment).'</td>
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
										mail($to_admin, $subject, $message, $headers); 

										$success_message = $receive_email_thank_you_message;

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



								<div class="contact-form mt-0 p-4">
									<form accept="<?php echo BASE_URL.URL_PAGE.$_REQUEST['slug']; ?>" method="post">
										<div class=" row">
											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-user"></i> &nbsp; Personal Information</h4>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Full Name</label>
												<input type="text" class="form-control" name="Full Name" placeholder="Full Name">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Surname</label>
												<input type="text" class="form-control" name="Surname" placeholder="Surname">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Telephone</label>
												<input type="text" class="form-control" name="Telephone" placeholder="Telephone">
											</div>

											<div class="form-group col-md-6 col-sm-12">
												<label for="">E-mail</label>
												<input type="text" class="form-control" name="visitor_email" placeholder="E-mail">
											</div>

											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-calendar-alt"></i> &nbsp; Appointment Information</h4>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Select Date</label>
												<input type="date" class="form-control" name="Brand" placeholder="Brand">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Hour</label>
												<select class="form-control">
													<option>Hour</option>
												</select>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Type of service</label>
												<select class="form-control">
													<option>Type of service</option>
												</select>
											</div>
											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-taxi"></i> &nbsp; Vehicle Information</h4>
											</div>										

											<div class="form-group col-md-6 col-sm-12">
												<label for="">Brand</label>
												<input type="text" class="form-control" name="brand" placeholder="Brand">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Model</label>
												<input type="text" class="form-control" name="Model" placeholder="Model">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Year</label>
												<input type="text" class="form-control" name="Year" placeholder="Year">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">VIN</label>
												<input type="text" class="form-control" name="VIN" placeholder="VIN">
											</div>
											<div class="col-md-12">

												<div class="form-check form_check_block my-4">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
													<label class="form-check-label" for="flexCheckDefault">
														I agree to have read the <a href="#">Privacy Policy</a>
													</label>
												</div>
												<div class="form-check form_check_block my-4">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
													<label class="form-check-label" for="flexCheckDefault1">
														I Accept the <a href="#">terms and Conditions</a>
													</label>
												</div>
											</div>
											<div class="col-md-6 col-sm-12 mt-3">

												<button type="submit" class="btn btn-theme py-3 w-100" name="form_contact">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="map-area">
								<?php echo $contact_map_iframe; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>
<!-- Latest ui code -->

<!-- Latest ui code -->
<?php if($page_layout == 'Test Drive Layout'): ?>
	<?php
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$contact_address = $row['contact_address'];
		$contact_email = $row['contact_email'];
		$contact_phone = $row['contact_phone'];
		$contact_fax = $row['contact_fax'];
		$contact_map_iframe = $row['contact_map_iframe'];
	}
	?>
	<div class="contact-area bg-area">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<div class="row">
						<div class="col-md-12">
							<div class="contact-item mt-0 card">
								<div class="contact-text">
									<i class="fas fa-map-marker-alt"></i>
									<h3>Address</h3>
									<p><?php echo $contact_address; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-at"></i>
									<h3>Email</h3>
									<p><?php echo $contact_email; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-phone-alt"></i>
									<h3>Phone</h3>
									<p><?php echo $contact_phone; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-fax"></i>
									<h3>Fax</h3>
									<p><?php echo $contact_fax; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-12">
					<div class="card">
						<div class="row">
							<div class="col-md-12">

								<?php
// After form submit checking everything for email sending
								if(isset($_POST['form_contact']))
								{
									$error_message = '';
									$success_message = '';
									$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
									foreach ($result as $row) 
									{
										$receive_email = $row['receive_email'];
										$receive_email_subject = $row['receive_email_subject'];
										$receive_email_thank_you_message = $row['receive_email_thank_you_message'];
									}

									$valid = 1;

									if(empty($_POST['visitor_name']))
									{
										$valid = 0;
										$error_message .= 'Please enter your name.\n';
									}

									if(empty($_POST['visitor_phone']))
									{
										$valid = 0;
										$error_message .= 'Please enter your phone number.\n';
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

									if(empty($_POST['visitor_comment']))
									{
										$valid = 0;
										$error_message .= 'Please enter your comment.\n';
									}

									if($valid == 1)
									{

										$visitor_name = strip_tags($_POST['visitor_name']);
										$visitor_email = strip_tags($_POST['visitor_email']);
										$visitor_phone = strip_tags($_POST['visitor_phone']);
										$visitor_comment = strip_tags($_POST['visitor_comment']);

        // sending email
										$to_admin = $receive_email;
										$subject = $receive_email_subject;
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
										<td>Comment</td>
										<td>'.nl2br($visitor_comment).'</td>
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
										mail($to_admin, $subject, $message, $headers); 

										$success_message = $receive_email_thank_you_message;

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



								<div class="contact-form mt-0 p-4">
									<form accept="<?php echo BASE_URL.URL_PAGE.$_REQUEST['slug']; ?>" method="post">
										<div class=" row">
											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-user"></i> &nbsp; Personal Information</h4>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Full Name</label>
												<input type="text" class="form-control" name="Full Name" placeholder="Full Name">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Surname</label>
												<input type="text" class="form-control" name="Surname" placeholder="Surname">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Telephone</label>
												<input type="text" class="form-control" name="Telephone" placeholder="Telephone">
											</div>

											<div class="form-group col-md-6 col-sm-12">
												<label for="">E-mail</label>
												<input type="text" class="form-control" name="visitor_email" placeholder="E-mail">
											</div>

											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-calendar-alt"></i> &nbsp; Appointment Information</h4>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Select Date</label>
												<input type="date" class="form-control" name="Brand" placeholder="Brand">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Hour</label>
												<select class="form-control">
													<option>Hour</option>
												</select>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Test Place</label>
												<select class="form-control">
													<option>Test Place</option>
												</select>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Vehicle of Interest</label>
												<input type="text" class="form-control" name="Vehicle of Interest" placeholder="Vehicle of Interest">
											</div>
											
											<div class="col-md-12">

												<div class="form-check form_check_block my-4">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
													<label class="form-check-label" for="flexCheckDefault">
														I agree to have read the <a href="#">Privacy Policy</a>
													</label>
												</div>
												<div class="form-check form_check_block my-4">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
													<label class="form-check-label" for="flexCheckDefault1">
														I Accept the <a href="#">terms and Conditions</a>
													</label>
												</div>
											</div>
											<div class="col-md-6 col-sm-12 mt-3">

												<button type="submit" class="btn btn-theme py-3 w-100" name="form_contact">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="map-area">
								<?php echo $contact_map_iframe; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>
<!-- Latest ui code -->
<?php if($page_layout == 'Request Part'): ?>
	<?php
	$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		$contact_address = $row['contact_address'];
		$contact_email = $row['contact_email'];
		$contact_phone = $row['contact_phone'];
		$contact_fax = $row['contact_fax'];
		$contact_map_iframe = $row['contact_map_iframe'];
	}
	?>
	<div class="contact-area bg-area">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<div class="row">
						<div class="col-md-12">
							<div class="contact-item mt-0 card">
								<div class="contact-text">
									<i class="fas fa-map-marker-alt"></i>
									<h3>Address</h3>
									<p><?php echo $contact_address; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-at"></i>
									<h3>Email</h3>
									<p><?php echo $contact_email; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-phone-alt"></i>
									<h3>Phone</h3>
									<p><?php echo $contact_phone; ?></p>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="contact-item card">
								<div class="contact-text">
									<i class="fas fa-fax"></i>
									<h3>Fax</h3>
									<p><?php echo $contact_fax; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-12">
					<div class="card">
						<div class="row">
							<div class="col-md-12">

								<?php
// After form submit checking everything for email sending
								if(isset($_POST['form_contact']))
								{
									$error_message = '';
									$success_message = '';
									$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
									foreach ($result as $row) 
									{
										$receive_email = $row['receive_email'];
										$receive_email_subject = $row['receive_email_subject'];
										$receive_email_thank_you_message = $row['receive_email_thank_you_message'];
									}

									$valid = 1;

									if(empty($_POST['visitor_name']))
									{
										$valid = 0;
										$error_message .= 'Please enter your name.\n';
									}

									if(empty($_POST['visitor_phone']))
									{
										$valid = 0;
										$error_message .= 'Please enter your phone number.\n';
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

									if(empty($_POST['visitor_comment']))
									{
										$valid = 0;
										$error_message .= 'Please enter your comment.\n';
									}

									if($valid == 1)
									{

										$visitor_name = strip_tags($_POST['visitor_name']);
										$visitor_email = strip_tags($_POST['visitor_email']);
										$visitor_phone = strip_tags($_POST['visitor_phone']);
										$visitor_comment = strip_tags($_POST['visitor_comment']);

        // sending email
										$to_admin = $receive_email;
										$subject = $receive_email_subject;
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
										<td>Comment</td>
										<td>'.nl2br($visitor_comment).'</td>
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
										mail($to_admin, $subject, $message, $headers); 

										$success_message = $receive_email_thank_you_message;

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



								<div class="contact-form mt-0 p-4">
									<form accept="<?php echo BASE_URL.URL_PAGE.$_REQUEST['slug']; ?>" method="post">
										<div class=" row">
											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-user"></i> &nbsp; Personal Information</h4>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Full Name</label>
												<input type="text" class="form-control" name="Full Name" placeholder="Full Name">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Surname</label>
												<input type="text" class="form-control" name="Surname" placeholder="Surname">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Telephone</label>
												<input type="text" class="form-control" name="Telephone" placeholder="Telephone">
											</div>

											<div class="form-group col-md-6 col-sm-12">
												<label for="">E-mail</label>
												<input type="text" class="form-control" name="visitor_email" placeholder="E-mail">
											</div>

											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-taxi"></i> &nbsp; Vehicle Information</h4>
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Brand</label>
												<input type="text" class="form-control" name="Brand" placeholder="Brand">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Model</label>
												<input type="text" class="form-control" name="Model" placeholder="Model">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Year</label>
												<input type="text" class="form-control" name="Year" placeholder="Year">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">VIN</label>
												<input type="text" class="form-control" name="VIN" placeholder="VIN">
											</div>
											<div class="col-md-12">
												<h4 class="border-bottom  pb-4"><i class="fad fa-flux-capacitor"></i> &nbsp; Part Information</h4>
											</div>										

											<div class="form-group col-md-6 col-sm-12">
												<label for="">Part</label>
												<input type="text" class="form-control" name="Part" placeholder="Part">
											</div>
											<div class="form-group col-md-6 col-sm-12">
												<label for="">Urgency</label>
												<select class="form-control">
													<option>Urgency</option>
												</select>
											</div>
											<div class="form-group col-md-12 col-sm-12">
												<label for="">Comments</label>
												<textarea class="form-control" rows="4" placeholder="Comments"></textarea>
											</div>
											<div class="col-md-12">

												<div class="form-check form_check_block my-4">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
													<label class="form-check-label" for="flexCheckDefault">
														I agree to have read the <a href="#">Privacy Policy</a>
													</label>
												</div>
												<div class="form-check form_check_block my-4">
													<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
													<label class="form-check-label" for="flexCheckDefault1">
														I Accept the <a href="#">terms and Conditions</a>
													</label>
												</div>
											</div>
											<div class="col-md-6 col-sm-12 mt-3">

												<button type="submit" class="btn btn-theme py-3 w-100" name="form_contact">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="map-area">
								<?php echo $contact_map_iframe; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>
<!-- Latest ui code -->


<?php if($page_layout == 'Blog Page Layout'): ?>
	<div class="blog-page-area">
		<div class="container">
			<div class="row">

				<?php
				$statement = $pdo->prepare("SELECT * FROM tbl_news ORDER BY news_id DESC");
				$statement->execute();
				$total = $statement->rowCount();
				?>

				<?php if(!$total): ?>
					<p style="color:red;">Sorry! No News is found.</p>
				<?php else: ?>

					<?php
					/* ===================== Pagination Code Starts ================== */
					$adjacents = 10;	

					$statement = $pdo->prepare("SELECT * FROM tbl_news ORDER BY news_id DESC");
					$statement->execute();
					$total_pages = $statement->rowCount();

					$targetpage = $_SERVER['PHP_SELF'];
					$limit = 6;                                 
					$page = @$_GET['page'];
					if($page) 
						$start = ($page - 1) * $limit;          
					else
						$start = 0;	


					$statement = $pdo->prepare("SELECT
						t1.news_title,
						t1.news_slug,
						t1.news_content,
						t1.news_date,
						t1.photo,
						t1.category_id,

						t2.category_id,
						t2.category_name,
						t2.category_slug
						FROM tbl_news t1
						JOIN tbl_category t2
						ON t1.category_id = t2.category_id 		                           
						ORDER BY t1.news_id 
						LIMIT $start, $limit");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);


					$s1 = $_REQUEST['slug'];

					if ($page == 0) $page = 1;                  
					$prev = $page - 1;                          
					$next = $page + 1;                          
					$lastpage = ceil($total_pages/$limit);      
					$lpm1 = $lastpage - 1;   
					$pagination = "";
					if($lastpage > 1)
					{   
						$pagination .= "<div class=\"pagination\">";
						if ($page > 1) 
							$pagination.= "<a href=\"$targetpage?slug=$s1&page=$prev\">&#171; previous</a>";
						else
							$pagination.= "<span class=\"disabled\">&#171; previous</span>";    
				if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
				{   
					for ($counter = 1; $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<span class=\"current\">$counter</span>";
						else
							$pagination.= "<a href=\"$targetpage?slug=$s1&page=$counter\">$counter</a>";                 
					}
				}
				elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
				{
					if($page < 1 + ($adjacents * 2))        
					{
						for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
						{
							if ($counter == $page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"$targetpage?slug=$s1&page=$counter\">$counter</a>";                 
						}
						$pagination.= "...";
						$pagination.= "<a href=\"$targetpage?slug=$s1&page=$lpm1\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage?slug=$s1&page=$lastpage\">$lastpage</a>";       
					}
					elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
					{
						$pagination.= "<a href=\"$targetpage?slug=$s1&page=1\">1</a>";
						$pagination.= "<a href=\"$targetpage?slug=$s1&page=2\">2</a>";
						$pagination.= "...";
						for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"$targetpage?slug=$s1&page=$counter\">$counter</a>";                 
						}
						$pagination.= "...";
						$pagination.= "<a href=\"$targetpage?slug=$s1&page=$lpm1\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage?slug=$s1&page=$lastpage\">$lastpage</a>";       
					}
					else
					{
						$pagination.= "<a href=\"$targetpage?slug=$s1&page=1\">1</a>";
						$pagination.= "<a href=\"$targetpage?slug=$s1&page=2\">2</a>";
						$pagination.= "...";
						for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<span class=\"current\">$counter</span>";
							else
								$pagination.= "<a href=\"$targetpage?slug=$s1&page=$counter\">$counter</a>";                 
						}
					}
				}
				if ($page < $counter - 1) 
					$pagination.= "<a href=\"$targetpage?slug=$s1&page=$next\">next &#187;</a>";
				else
					$pagination.= "<span class=\"disabled\">next &#187;</span>";
				$pagination.= "</div>\n";       
			}
			/* ===================== Pagination Code Ends ================== */
			?>
			
			<?php
			foreach ($result as $row) {
				?>
				<div class="col-md-4 col-sm-6 col-xs-12 blog-item">
					<div class="latest-item">
						<div class="latest-photo" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>)"></div>
						<div class="latest-text">
							<h2><a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>"><?php echo $row['news_title']; ?></a></h2>
							<ul>
								<li>Category: <a href="<?php echo BASE_URL.URL_CATEGORY.$row['category_slug']; ?>"><?php echo $row['category_name']; ?></a></li>
								<li>Date: <?php echo $row['news_date']; ?></li>
							</ul>
							<div class="latest-pra">
								<p>
									<?php echo substr($row['news_content'],0,200).' ...'; ?>
								</p>
								<a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>">Read more</a>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>							
		<?php endif; ?>

		<div class="col-md-12">
			<?php if($total): ?>
				<?php echo $pagination; ?>
			<?php endif; ?>
		</div>

	</div>
</div>
</div>
<?php endif; ?>


<?php if($page_layout == 'Testimonial Page Layout'): ?>
	<div class="testimonial-area testimonial-page">
		<div class="container">
			<div class="row">
				<div class="testimonial-gallery owl-carousel">
					<?php
					$statement = $pdo->prepare("SELECT * FROM tbl_testimonial");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
					foreach ($result as $row) {
						?>
						<div class="testimonial-item row justify-content-center">
							<div class="testimonial-photo col-md-2">
								<img src="<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>">
							</div>
							<div class="testimonial-text col-md-7">
								<h2><?php echo $row['name']; ?></h2>
								<h3><?php echo $row['designation'].'('.$row['company'].')'; ?></h3>
								<div class="testimonial-pra">
									<p>
										<?php echo $row['comment']; ?>
									</p>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php if($page_layout == 'Pricing Page Layout'): ?>
	<div class="packages-area bg-area">
		<div class="container">
			<div class="row">

				<?php
				$statement = $pdo->prepare("SELECT * FROM tbl_pricing_plan");
				$statement->execute();
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);					
				foreach ($result as $row) {
					?>
					<div class="col-md-4 col-sm-6">
						<div class="packages-item">
							<div class="pack-head">
								<h3><?php echo $row['pricing_plan_name']; ?></h3>
								<h2>$<?php echo $row['pricing_plan_price']; ?></h2>
								<h4 class="first">Active Days: <?php echo $row['pricing_plan_day']; ?></h4>
								<h4>Number of Items Allowed: <?php echo $row['pricing_plan_item_allow']; ?></h4>
							</div>
							<div class="pack-body">
								<?php echo $row['pricing_plan_description']; ?>
							</div>
							<div class="pack-footer">
								<a href="<?php echo BASE_URL; ?>login.php">Buy Now</a>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
<?php endif; ?>



<?php if($page_layout == 'New Car Page Layout'): ?>
	<div class="lesting-area bg-area">
		<div class="container">
			<div class="text-right">
				<div class="buttons btn-group text-right">
					<button class="grid btn btn-theme">Grid View</button>
					<button class="list btn btn-outline-dark">List View</button>
				</div>
			</div>
			<div class="row" id="view_change">


				<?php 
				$adjacents = 10;

				$statement = $pdo->prepare("SELECT * FROM tbl_car WHERE status=1 AND car_condition=?");
				$statement->execute(array('New Car'));
				$total_pages = $statement->rowCount();

				$targetpage = $_SERVER['PHP_SELF'];
				$limit = 6;                                 
				$page = @$_GET['page'];
				if($page) 
					$start = ($page - 1) * $limit;          
				else
					$start = 0;

				$statement = $pdo->prepare("SELECT * FROM tbl_car WHERE status=1 AND car_condition=? ORDER BY car_id DESC LIMIT $start, $limit");
				$statement->execute(array('New Car'));
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);


				if($page == 0) $page = 1;                  
				$prev = $page - 1;                          
				$next = $page + 1;                          
				$lastpage = ceil($total_pages/$limit);      
				$lpm1 = $lastpage - 1;   
				$pagination = "";
				if($lastpage > 1)
				{   
					$pagination .= "<div class=\"pagination\">";
					if ($page > 1) 
						$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$prev\">&#171; previous</a>";
					else
						$pagination.= "<span class=\"disabled\">&#171; previous</span>";    
        if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
        {   
        	for ($counter = 1; $counter <= $lastpage; $counter++)
        	{
        		if ($counter == $page)
        			$pagination.= "<span class=\"current\">$counter</span>";
        		else
        			$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$counter\">$counter</a>";                 
        	}
        }
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
        {
        	if($page < 1 + ($adjacents * 2))        
        	{
        		for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
        		{
        			if ($counter == $page)
        				$pagination.= "<span class=\"current\">$counter</span>";
        			else
        				$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$counter\">$counter</a>";                 
        		}
        		$pagination.= "...";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$lpm1\">$lpm1</a>";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$lastpage\">$lastpage</a>";       
        	}
        	elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        	{
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."1\">1</a>";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."2\">2</a>";
        		$pagination.= "...";
        		for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        		{
        			if ($counter == $page)
        				$pagination.= "<span class=\"current\">$counter</span>";
        			else
        				$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$counter\">$counter</a>";                 
        		}
        		$pagination.= "...";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$lpm1\">$lpm1</a>";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$lastpage\">$lastpage</a>";       
        	}
        	else
        	{
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."1\">1</a>";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."2\">2</a>";
        		$pagination.= "...";
        		for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        		{
        			if ($counter == $page)
        				$pagination.= "<span class=\"current\">$counter</span>";
        			else
        				$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$counter\">$counter</a>";                 
        		}
        	}
        }
        if ($page < $counter - 1) 
        	$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$next\">next &#187;</a>";
        else
        	$pagination.= "<span class=\"disabled\">next &#187;</span>";
        $pagination.= "</div>\n";       
    }
    ?>




    <?php
    if($total_pages==''):
    	echo '<div class="error" style="font-size:24px;margin-top:20px;">Sorry! No Car is Found.</div>';
    else:
    	foreach ($result as $row) {

    		$seller_id = $row['seller_id'];
    		$today = date('Y-m-d');

    		$valid = 0;
    		$statement1 = $pdo->prepare("SELECT * FROM tbl_payment WHERE seller_id=? AND payment_status=?");
    		$statement1->execute(array($seller_id,'Completed'));
    		$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);							
    		foreach ($result1 as $row1) {
    			if(($today>=$row1['payment_date'])&&($today<=$row1['expire_date'])) {
    				$valid = 1;
    				break;
    			}
    		}
    		if($valid == 1):
    			$statement1 = $pdo->prepare("SELECT * FROM tbl_car_category WHERE car_category_id=?");
    			$statement1->execute(array($row['car_category_id']));
    			$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
    			$tot = $statement1->rowCount();
    			foreach ($result1 as $row1) {
    				$car_category_name = $row1['car_category_name'];
    			}
    			?>
    			<div class="col-md-6 col-sm-12 listing-item-car-condition">
    				<div class=" listing-item">
    					<div class="row ">
    						<div class="col-md-6 col-sm-12 col-xs-12 listing-photo">
    							<img src="<?php echo BASE_URL.'assets/uploads/cars/'.$row['featured_photo']; ?>">
    							<h2>
    								<?php if($row['regular_price']!=$row['sale_price']): ?>
    									<del>$<?php echo $row['regular_price']; ?></del>
    									$<?php echo number_format($row['sale_price']); ?>
    								<?php else: ?>
    									$<?php echo number_format($row['sale_price']); ?>
    								<?php endif; ?>
    							</h2>
    						</div>

    						<div class="col-md-6 col-sm-4 col-xs-6 listing-text">
    							<h2><?php echo $row['title']; ?></h2>
    							<ul>
    								<li>Type: <span><?php if($tot!=''){echo $car_category_name;} else{echo 'Not Specified';} ?></span></li>
    								<li>Mileage: <span><?php if($row['mileage']!=''){echo $row['mileage'];} else{echo 'Not Specified';} ?></span></li>
    								<li>Year: <span><?php if($row['year']!=0){echo $row['year'];} else{echo 'Not Specified';} ?></span></li>
    							</ul>
    						</div>
    					<!-- <div class="col-md-4 col-sm-4 col-xs-6 listing-price">

    					</div>	 -->								
    				</div>
    				<a href="<?php echo BASE_URL.URL_CAR.$row['car_id']; ?>"class="view_icon" title="View Details"><span class="far fa-eye"></span></a>
    			</div>
    		</div>
    		<?php
    	endif;
    }
endif;									
?>
<div class="row w-100">
	<div class="col-md-12">
		<?php echo $pagination; ?>
	</div>
</div>
</div>
</div>
</div>
<?php endif; ?>



<?php if($page_layout == 'Rentals'): ?>
	<div class="lesting-area bg-area">
		<div class="container-fluid">
			<div class="text-right">
				<div class="buttons btn-group text-right">
					<button class="grid btn btn-theme">Grid View</button>
					<button class="list btn btn-dark">List View</button>
				</div>
			</div>
			<div class="row" id="view_change"> 

				<?php 
				$adjacents = 10;

				$statement = $pdo->prepare("SELECT * FROM tbl_car WHERE status=1 AND car_condition=?");
				$statement->execute(array('Rentals'));
				$total_pages = $statement->rowCount();

				$targetpage = $_SERVER['PHP_SELF'];
				$limit = 6;                                 
				$page = @$_GET['page'];
				if($page) 
					$start = ($page - 1) * $limit;          
				else
					$start = 0;

				$statement = $pdo->prepare("SELECT * FROM tbl_car WHERE status=1 AND car_condition=? ORDER BY car_id DESC LIMIT $start, $limit");
				$statement->execute(array('Rentals'));
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);


				if($page == 0) $page = 1;                  
				$prev = $page - 1;                          
				$next = $page + 1;                          
				$lastpage = ceil($total_pages/$limit);      
				$lpm1 = $lastpage - 1;   
				$pagination = "";
				if($lastpage > 1)
				{   
					$pagination .= "<div class=\"pagination\">";
					if ($page > 1) 
						$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$prev\">&#171; previous</a>";
					else
						$pagination.= "<span class=\"disabled\">&#171; previous</span>";    
        if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
        {   
        	for ($counter = 1; $counter <= $lastpage; $counter++)
        	{
        		if ($counter == $page)
        			$pagination.= "<span class=\"current\">$counter</span>";
        		else
        			$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$counter\">$counter</a>";                 
        	}
        }
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
        {
        	if($page < 1 + ($adjacents * 2))        
        	{
        		for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
        		{
        			if ($counter == $page)
        				$pagination.= "<span class=\"current\">$counter</span>";
        			else
        				$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$counter\">$counter</a>";                 
        		}
        		$pagination.= "...";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$lpm1\">$lpm1</a>";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$lastpage\">$lastpage</a>";       
        	}
        	elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        	{
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."1\">1</a>";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."2\">2</a>";
        		$pagination.= "...";
        		for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        		{
        			if ($counter == $page)
        				$pagination.= "<span class=\"current\">$counter</span>";
        			else
        				$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$counter\">$counter</a>";                 
        		}
        		$pagination.= "...";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$lpm1\">$lpm1</a>";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$lastpage\">$lastpage</a>";       
        	}
        	else
        	{
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."1\">1</a>";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."2\">2</a>";
        		$pagination.= "...";
        		for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        		{
        			if ($counter == $page)
        				$pagination.= "<span class=\"current\">$counter</span>";
        			else
        				$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$counter\">$counter</a>";                 
        		}
        	}
        }
        if ($page < $counter - 1) 
        	$pagination.= "<a href=\"".BASE_URL."page.php?slug=new-car&page="."$next\">next &#187;</a>";
        else
        	$pagination.= "<span class=\"disabled\">next &#187;</span>";
        $pagination.= "</div>\n";       
    }
    ?>




    <?php
    if($total_pages==''):
    	echo '<div class="error" style="font-size:24px;margin-top:20px;">Sorry! No Car is Found.</div>';
    else:
    	foreach ($result as $row) {

    		$seller_id = $row['seller_id'];
    		$today = date('Y-m-d');

    		$valid = 0;
    		$statement1 = $pdo->prepare("SELECT * FROM tbl_payment WHERE seller_id=? AND payment_status=?");
    		$statement1->execute(array($seller_id,'Completed'));
    		$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);							
    		foreach ($result1 as $row1) {
    			if(($today>=$row1['payment_date'])&&($today<=$row1['expire_date'])) {
    				$valid = 1;
    				break;
    			}
    		}
    		if($valid == 1):
    			$statement1 = $pdo->prepare("SELECT * FROM tbl_car_category WHERE car_category_id=?");
    			$statement1->execute(array($row['car_category_id']));
    			$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
    			$tot = $statement1->rowCount();
    			foreach ($result1 as $row1) {
    				$car_category_name = $row1['car_category_name'];
    			}
    			?>
    			<div class="col-md-4 col-sm-12 listing-item-car-condition">
    				<div class=" listing-item">
    					<div class="row ">
    						<div class="col-md-6 col-sm-6 col-xs-12 listing-photo">
    							<img src="<?php echo BASE_URL.'assets/uploads/cars/'.$row['featured_photo']; ?>">
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
    							<ul>
    								<!--<li>Type: <span><?php if($tot!=''){echo $car_category_name;} else{echo 'Not Specified';} ?></span></li>
    								<li>Mileage: <span><?php if($row['mileage']!=''){echo $row['mileage'];} else{echo 'Not Specified';} ?></span></li>
    								<li>Year: <span><?php if($row['year']!=0){echo $row['year'];} else{echo 'Not Specified';} ?></span></li>-->
									<li><span class="far fa-tags"></span>&nbsp; <span><?php if($tot!=''){echo $car_category_name;} else{echo 'Not Specified';} ?></span></li>
													 <li><span class="far fa-tachometer"></span>&nbsp; <span><?php if($row['mileage']!=''){echo $row['mileage'];} else{echo 'Not Specified';} ?></span></li> 
													<li><span class="far fa-calendar-alt"></span>&nbsp;  <span><?php if($row['year']!=0){echo $row['year'];} else{echo 'Not Specified';} ?></span></li>
    							</ul>
    						</div>
    					<!-- <div class="col-md-4 col-sm-4 col-xs-6 listing-price">  
    					</div>			 -->
    				</div>
    				<!-- <a href="<?php echo BASE_URL.URL_CAR.$row['car_id']; ?>">View Detail</a>	 -->
    				<a href="<?php echo BASE_URL.URL_CAR.$row['car_id']; ?>" class="view_icon" title="View Details"><span class="far fa-eye"></span></a>
    			</div>					
    		</div>
    		<?php
    	endif;
    }
endif;									
?>
<div class="row w-100">
	<div class="col-md-12">
		<?php echo $pagination; ?>
	</div>
</div>
</div>
</div>
</div>
<?php endif; ?>





<?php if($page_layout == 'Old Car Page Layout'): ?>
	<div class="lesting-area bg-area">
		<div class="container-fluid">
			<div class="text-right">
				<div class="buttons btn-group text-right">
					<button class="grid btn btn-theme">Grid View</button>
					<button class="list btn btn-dark">List View</button>
				</div>
			</div>
			<div class="row grid_view" id="view_change">
				<?php 
				$adjacents = 10;

				$statement = $pdo->prepare("SELECT * FROM tbl_car WHERE status=1 AND car_condition=?");
				$statement->execute(array('Used Car'));
				$total_pages = $statement->rowCount();

				$targetpage = $_SERVER['PHP_SELF'];
				$limit = 6;                                 
				$page = @$_GET['page'];
				if($page) 
					$start = ($page - 1) * $limit;          
				else
					$start = 0;

				$statement = $pdo->prepare("SELECT * FROM tbl_car WHERE status=1 AND car_condition=? ORDER BY car_id DESC LIMIT $start, $limit");
				$statement->execute(array('Used Car'));
				$result = $statement->fetchAll(PDO::FETCH_ASSOC);


				if($page == 0) $page = 1;                  
				$prev = $page - 1;                          
				$next = $page + 1;                          
				$lastpage = ceil($total_pages/$limit);      
				$lpm1 = $lastpage - 1;   
				$pagination = "";
				if($lastpage > 1)
				{   
					$pagination .= "<div class=\"pagination\">";
					if ($page > 1) 
						$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."$prev\">&#171; previous</a>";
					else
						$pagination.= "<span class=\"disabled\">&#171; previous</span>";    
        if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
        {   
        	for ($counter = 1; $counter <= $lastpage; $counter++)
        	{
        		if ($counter == $page)
        			$pagination.= "<span class=\"current\">$counter</span>";
        		else
        			$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."$counter\">$counter</a>";                 
        	}
        }
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
        {
        	if($page < 1 + ($adjacents * 2))        
        	{
        		for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
        		{
        			if ($counter == $page)
        				$pagination.= "<span class=\"current\">$counter</span>";
        			else
        				$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."$counter\">$counter</a>";                 
        		}
        		$pagination.= "...";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."$lpm1\">$lpm1</a>";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."$lastpage\">$lastpage</a>";       
        	}
        	elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
        	{
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."1\">1</a>";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."2\">2</a>";
        		$pagination.= "...";
        		for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        		{
        			if ($counter == $page)
        				$pagination.= "<span class=\"current\">$counter</span>";
        			else
        				$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."$counter\">$counter</a>";                 
        		}
        		$pagination.= "...";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."$lpm1\">$lpm1</a>";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."$lastpage\">$lastpage</a>";       
        	}
        	else
        	{
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."1\">1</a>";
        		$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."2\">2</a>";
        		$pagination.= "...";
        		for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        		{
        			if ($counter == $page)
        				$pagination.= "<span class=\"current\">$counter</span>";
        			else
        				$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."$counter\">$counter</a>";                 
        		}
        	}
        }
        if ($page < $counter - 1) 
        	$pagination.= "<a href=\"".BASE_URL."page.php?slug=old-car&page="."$next\">next &#187;</a>";
        else
        	$pagination.= "<span class=\"disabled\">next &#187;</span>";
        $pagination.= "</div>\n";       
    }
    ?>




    <?php
    if($total_pages==''):
    	echo '<div class="error" style="font-size:24px;margin-top:20px;">Sorry! No Car is Found.</div>';
    else:
    	foreach ($result as $row) {

    		$seller_id = $row['seller_id'];
    		$today = date('Y-m-d');

    		$valid = 0;
    		$statement1 = $pdo->prepare("SELECT * FROM tbl_payment WHERE seller_id=? AND payment_status=?");
    		$statement1->execute(array($seller_id,'Completed'));
    		$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);							
    		foreach ($result1 as $row1) {
    			if(($today>=$row1['payment_date'])&&($today<=$row1['expire_date'])) {
    				$valid = 1;
    				break;
    			}
    		}
    		if($valid == 1):
    			$statement1 = $pdo->prepare("SELECT * FROM tbl_car_category WHERE car_category_id=?");
    			$statement1->execute(array($row['car_category_id']));
    			$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
    			$tot = $statement1->rowCount();
    			foreach ($result1 as $row1) {
    				$car_category_name = $row1['car_category_name'];
    			}
    			?>
				<?php
				//echo $row['featured_photo'];
				//echo D_ROOT.$row['featured_photo']; exit;
								//echo D_ROOT.$row['featured_photo']; exit;
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
    			<div class="col-md-6 col-lg-4 col-sm-12 listing-item-car-condition">
    				<div class=" listing-item">
    					<div class="row">
								
    						<div class="col-md-6 col-sm-12 col-xs-12 listing-photo" style="background-image: url()">
    							<img src="<?php echo $fileL; ?>">
    							<h2>
    								<?php if($row['regular_price']!=$row['sale_price']): ?>
    									<del>$<?php echo $row['regular_p$rice']; ?></del>
    									$<?php echo number_format($row['sale_price']); ?>
    								<?php else: ?>
    									$<?php echo number_format($row['sale_price']); ?>
    								<?php endif; ?>
    							</h2>
    						</div>

    						<div class="col-md-6 col-sm-4 col-xs-12 listing-text">
    							<h2><?php echo $row['title']; ?></h2>
    							<ul>
    								<!--<li>Type: <span><?php if($tot!=''){echo $car_category_name;} else{echo 'Not Specified';} ?></span></li>
    								<li>Mileage: <span><?php if($row['mileage']!=''){echo $row['mileage'];} else{echo 'Not Specified';} ?></span></li>
    								<li>Year: <span><?php if($row['year']!=0){echo $row['year'];} else{echo 'Not Specified';} ?></span></li>-->
									
									
									<!--<li><span class="far fa-tags"></span>&nbsp;<span><?php if($tot!=''){echo $car_category_name;} else{echo 'Not Specified';} ?></span></li>
    								<li><span class="far fa-tachometer"></span>&nbsp;<span><?php if($row['mileage']!=''){echo $row['mileage'];} else{echo 'Not Specified';} ?></span></li>
    								<li><span class="far fa-calendar-alt"></span>&nbsp;<span><?php if($row['year']!=0){echo $row['year'];} else{echo 'Not Specified';} ?></span></li>-->
									
									<li><span class="far fa-tags"></span>&nbsp; <span><?php if($tot!=''){echo $car_category_name;} else{echo 'Not Specified';} ?></span></li>
													 <li><span class="far fa-tachometer"></span>&nbsp; <span><?php if($row['mileage']!=''){echo $row['mileage'];} else{echo 'Not Specified';} ?></span></li> 
													<li><span class="far fa-calendar-alt"></span>&nbsp;  <span><?php if($row['year']!=0){echo $row['year'];} else{echo 'Not Specified';} ?></span></li>	
    							</ul>
    						</div>
    						<!-- <div class="col-md-4 col-sm-4 col-xs-6 listing-price"> -->

    							<!-- <a href="<?php echo BASE_URL.URL_CAR.$row['car_id']; ?>">View Detail</a> -->
    						</div>
    						<a href="<?php echo BASE_URL.URL_CAR.$row['car_id']; ?>"class="view_icon" title="View Details"><span class="far fa-eye"></span></a>
    					</div>

    				</div>
    				<?php
    			endif;
    		}
    	endif;									
    	?>
    	<div class="row w-100">
    		<div class="col-md-12">
    			<?php echo $pagination; ?>
    		</div>
    	</div>
    </div>
</div>
</div>
<?php endif; ?>

<?php require_once('footer.php'); ?>
