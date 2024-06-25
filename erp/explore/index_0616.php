<?php require_once('header.php'); ?>

<?php

/*$img1 = $_SERVER['DOCUMENT_ROOT'].'/demo/auto1crm/assets/uploads/cars/actual.jpg';
$location = $_SERVER['DOCUMENT_ROOT'].'/demo/auto1crm/assets/uploads/cars/';

//echo $img; exit;
//$img = imagecreatefromjpeg($img1);   // load the image-to-be-saved

// 50 is quality; change from 0 (worst quality,smaller file) - 100 (best quality)
//imagejpeg($img,$location."myimage_new.jpg",50);

//unlink("myimage.jpg");   // remove the old image

function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}

$img = resize_image($img1, 200, 200);
//echo "<pre>";print_r($img); exit;
exit;

*/










//exit;
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$total_recent_news_home_page = $row['total_recent_news_home_page'];
	$search_title = $row['search_title'];
	$search_photo = $row['search_photo'];
	$testimonial_photo = $row['testimonial_photo'];
}
?>

<!--Slider-Area Start-->
<div class="slider-area">
	<div class="slider-item" style="background-image: url(<?php echo BASE_URL.'assets/uploads/'.$search_photo; ?>)">
		<div class="bg-3"></div>
		<div class="container">
			<div class="row">
				
				<div class="searchbox">

					<div class="slider-text">
						<!--<h1><?php echo $search_title; ?></h1>-->
						<p style="text-align: left;">Busca tu auto Semi - Nuevo</p>
						<h1>Único dealer abierto 24 horas 7 dias a la semana</h1>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!--Slider-Area End-->

<div style="text-align:center; padding-top: 10px;">
	<!--<a href="https://www.700dealer.com/QuickQualify/6a244a745cec4724a2bf0efb43966587-2022214" target="_blank">
		<img src="assets/images/Banner-in-Spanish1.png"/>
	</a>-->
	<div tru-cms="srp-banner"> </div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<a href="#">
				<div class="card cat_card">
					<div class="cat_img">
						<img src="<?php echo BASE_URL ?>assets/images/finance.jpg ">
						<div class="cat_icon_type">
							<img src="<?php echo BASE_URL ?>assets/images/finance.svg">
						</div>
					</div>
					<div class="cat_text">
						<h4>Financing</h4>
						<p>Find the best finacing options here</p>
						<a  href="<?php echo BASE_URL; ?>page.php?slug=financing" target="_blank" class="cat_see_more">See More <span class="far fa-angle-right"></span></a>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-3">
			<a href="#">
				<div class="card cat_card">
					<div class="cat_img">
						<img src="<?php echo BASE_URL ?>assets/images/trade-in.jpg ">
						<div class="cat_icon_type">
							<img src="<?php echo BASE_URL ?>assets/images/car.svg">
						</div>
					</div>
					<div class="cat_text">
						<h4>Trade in</h4>
						<p>Find the best finacing options here</p>
						<a  href="<?php echo BASE_URL; ?>page.php?slug=trade-in" target="_blank" class="cat_see_more">See More <span class="far fa-angle-right"></span></a>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-3">
			<a href="#">
				<div class="card cat_card">
					<div class="cat_img">
						<img src="<?php echo BASE_URL ?>assets/images/service.jpg ">
						<div class="cat_icon_type">
							<img src="<?php echo BASE_URL ?>assets/images/service.svg">
						</div>
					</div>
					<div class="cat_text">
						<h4>Services</h4>
						<p>Find the best finacing options here</p>
						<a  href="<?php echo BASE_URL; ?>page.php?slug=request-service" target="_blank" class="cat_see_more">See More <span class="far fa-angle-right"></span></a>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md-3">
			<a href="#">
				<div class="card cat_card">
					<div class="cat_img">
						<img src="<?php echo BASE_URL ?>assets/images/test-drive.jpg ">
						<div class="cat_icon_type">
							<img src="<?php echo BASE_URL ?>assets/images/hands.svg">
						</div>
					</div>
					<div class="cat_text">
						<h4>Test Drive</h4>
						<p>Find the best finacing options here</p>
						<a  href="<?php echo BASE_URL; ?>page.php?slug=test-drive" target="_blank" class="cat_see_more">See More <span class="far fa-angle-right"></span></a>
					</div>
				</div>
			</a>
		</div>
	</div>
</div>
<!--Featured Old Car Start-->
<div class="featured-area">
	<div class="container-fluid">
		<div class="row">
			<div class="headline col-md-12" >
				<h2 class="side_strip"><span>New </span> Arrivals</h2>
				
			</div>
			<div class="col-md-3 searchbox">
				
				<form action="<?php echo BASE_URL.'check-get.php'; ?>" method="get">

					<div class="row">
						
						<div class="col-md-12 col-sm-12 option-item">
							<select data-placeholder="Choose Brand" class="form-control brand" name="brand_id">
								<?php
								$statement = $pdo->prepare("SELECT * FROM tbl_brand ORDER BY brand_name ASC");
								$statement->execute();
								$result = $statement->fetchAll(PDO::FETCH_ASSOC);
								foreach ($result as $row) {
									?>
									<option></option>
									<option value="<?php echo $row['brand_id']; ?>"><?php echo strtoupper($row['brand_name']); ?></option>
									<?php
								}
								?>
							</select>
						</div>

						<div class="col-md-12 col-sm-12 option-item">
							<select data-placeholder="Choose Model" class="form-control model" name="model_id" style="height: 38px;">
								<option value="">Choose Model</option>
							</select>
						</div>

						<div class="col-md-12 col-sm-12 option-item">
							<select data-placeholder="Inventory" class="form-control chosen-select" name="car_condition">
								<option></option>
								<option value="Rentals">Rentals</option>
								<option value="Used Car">Used Cars</option>
							</select>
						</div>

							<!--<div class="col-md-3 col-sm-6 option-item">
								<select data-placeholder="Choose Year" class="form-control chosen-select year_id" name="year_id">
									<option></option>
									<?php
									$statement = $pdo->prepare("SELECT DISTINCT (year) FROM `tbl_car` ORDER BY year DESC");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);
									//echo "<pre>"; print_r($result);// exit;
									foreach ($result as $row) {
										?>
										
										<option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>
										<?php
									}
									?>
								</select>
							</div>-->
							
							
							<div class="col-md-6 col-sm-6 option-item input_icon cal">
								<input autocomplete="off" class="form-control" placeholder= "From Year" type="text" name="year_id" id="year_id"/>
								

							</div>
							
							<div class="col-md-6 col-sm-6 option-item input_icon cal">
								<input autocomplete="off" class="form-control" placeholder= "To Year" type="text" name="to_year_id" id="to_year_id"/>
								

							</div>
							
							<!--<div class="col-md-3 col-sm-6 option-item">
								<input type="text" name="vinnumber" class="form-control" placeholder="VIN Number"/>
							</div>-->
							
							
							
							<div class="col-md-12 col-sm-12 option-item">
								<select data-placeholder="Choose Price Range (in USD)" class="form-control chosen-select" name="price_range">
									<option></option>
									<option value="1">1-4999</option>
									<option value="2">5000-9999</option>
									<option value="3">10000-14999</option>
									<option value="4">15000-19999</option>
									<option value="5">20000-24999</option>
									<option value="6">25000-29999</option>
									<option value="7">30000-50000</option>
									<option value="8">50000+</option>
								</select>
							</div>
							<!--<div class="col-md-12 col-sm-12 option-item">
								<select data-placeholder="Choose Brand" class="form-control brand" name="brand_id">
									<?php
									$statement = $pdo->prepare("SELECT * FROM tbl_brand ORDER BY brand_name ASC");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
										?>
										<option>Car Category</option>
										<!-- <option value="<?php echo $row['brand_id']; ?>"><?php echo strtoupper($row['brand_name']); ?></option>
										<?php
									}
									?>
								</select>
							</div>-->
							<!--<div class="col-md-12 col-sm-12 option-item">
								<select data-placeholder="Choose Brand" class="form-control brand" name="brand_id">
									<?php
									$statement = $pdo->prepare("SELECT * FROM tbl_brand ORDER BY brand_name ASC");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
										?>
										<option>Body Type</option>
										<!-- <option value="<?php echo $row['brand_id']; ?>"><?php echo strtoupper($row['brand_name']); ?></option> 
										<?php
									}
									?>
								</select>
							</div>
							<div class="col-md-12 col-sm-12 option-item">
								<select data-placeholder="Choose Brand" class="form-control brand" name="brand_id">
									<?php
									$statement = $pdo->prepare("SELECT * FROM tbl_brand ORDER BY brand_name ASC");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
										?>
										<option>Fuel Type</option>
										<!-- <option value="<?php echo $row['brand_id']; ?>"><?php echo strtoupper($row['brand_name']); ?></option>
										<?php
									}
									?>
								</select>
							</div>
							<div class="col-md-12 col-sm-12 option-item">
								<select data-placeholder="Choose Brand" class="form-control brand" name="brand_id">
									<?php
									$statement = $pdo->prepare("SELECT * FROM tbl_brand ORDER BY brand_name ASC");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
										?>
										<option>Transmission Type</option>
										<!-- <option value="<?php echo $row['brand_id']; ?>"><?php echo strtoupper($row['brand_name']); ?></option> 
										<?php
									}
									?>
								</select>
							</div>-->
						<!-- 	<div class="col-md-12 col-sm-12 option-item " >
								<h4>Show Inventory with Photos</h4>

							</div> -->
							<!--<div class="col-md-12 col-sm-12 option-item">

								<input style="width: 10% !important;" value="productphotos" type="checkbox" name="productphotos" class="form-control" placeholder="With Photos"/>
							</div>-->


							<!-- <div class="col-md-12 col-sm-12">&nbsp;</div> -->

							<div class="col-md-12 col-sm-12 text-center">
								<input type="submit" value="Search" name="form_search" class="btn btn-theme"></div>



							<!--<div class="col-md-2 col-sm-6">
								<input type="submit" value="Search" name="form_search">
							</div>-->
							<div class="col-md-5 col-sm-6"></div>
						</div>
					</form>
				</div>
				<div class="col-md-9 ">
					<div class="featured-gallery owl-carousel m-3">

						<?php
						$statement = $pdo->prepare("SELECT * 
							FROM tbl_car
							WHERE car_condition=? and status=?
							ORDER BY car_id DESC LIMIT 10");
						$statement->execute(array('Used Car',1));
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
						foreach ($result as $row) {

							$seller_id = $row['seller_id'];

						// Check if this seller is active or inactive
							$statement1 = $pdo->prepare("SELECT * FROM tbl_seller WHERE seller_id=? AND seller_access=?");
							$statement1->execute(array($seller_id,1));
							$seller_status = $statement1->rowCount();
							if(!$seller_status) {continue;}

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
								?>
								<div class="featured-item">
									<?php
									$fileL = '';		
									if($row['featured_photo']!=''){
										$fileL = $row['featured_photo'];
									}else{
										$fileL = BASE_URL.'assets/uploads/cars/noimage.jpg';	
										//echo $fileL; exit;
									}
									
									?>
									<div class="featured-photo" style="background-image: url(<?php echo $fileL; ?>)">
										<div class="budget budget-sale">
											<div class="budget-mask"><span>Sale</span></div>
										</div>
									</div>
									
									<div class="featured-car-name">
										<h2><?php echo ucwords(strtolower($row['title'])); ?></h2>
									</div>
									
									<div class="featured-price">
										
									</div>
									<div class="car-type pl-3">
										<ul class="text-left">
											<?php
											$statement1 = $pdo->prepare("SELECT * FROM tbl_car_category WHERE car_category_id=?");
											$statement1->execute(array($row['car_category_id']));
											$tot = $statement1->rowCount();
											$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);			
											foreach ($result1 as $row1) {
												$car_category_name = $row1['car_category_name'];
											}
											?>
											<li title="Category"><i class="far fa-tags"></i>&nbsp; <span><?php if($tot){echo $car_category_name;} else{echo 'Not Specified';} ?></span></li>
											<li title="mileage"><i class="far fa-tachometer"></i>&nbsp; <span><?php if($row['mileage']!=''){echo $row['mileage'];} else{echo 'Not Specified';} ?></span></li>
											<li title="Year"><i class="far fa-calendar-alt"></i>&nbsp; <span><?php if($row['year']!=0){echo $row['year'];} else{echo 'Not Specified';} ?></span></li>
										</ul>
									</div>
									<div class="featured-link">
										<h4>
											<?php if($row['regular_price']!=$row['sale_price']): ?>
												<del>$<?php echo number_format($row['regular_price']); ?></del>
												$<?php echo number_format($row['sale_price']); ?>
											<?php else: ?>
												$<?php echo number_format($row['sale_price']); ?>
											<?php endif; ?>
										</h4>
										<a href="<?php echo BASE_URL.URL_CAR.$row['car_id']; ?>">View Details <i class="far fa-long-arrow-right"></i></a>
									</div>
								</div>
							<?php endif; ?>
							<?php
						}
						?>

					</div>

				</div>
			</div>
		</div>
	</div>
	<section class="section section-body  section-spaces">
		<div class=" container-fluid">
			<div class="headline py-3 col-md-12" >
				<h2>Inventory by Brands</h2>				
			</div>
			
			<div class="row">
			<?php 
			
						
						
						
			$bstatement = $pdo->prepare("SELECT COUNT( a.brand_id) AS 'count',a.brand_id, LOWER(b.brand_name) AS 'brand_name' FROM tbl_car a JOIN tbl_brand b ON b.brand_id=a.brand_id WHERE a.status=1 GROUP BY a.brand_id ORDER BY b.brand_name ASC");
									$bstatement->execute();
									$bresult = $bstatement->fetchAll(PDO::FETCH_ASSOC);		
			if(is_array($bresult) && count($bresult)>0){
				foreach($bresult as $brow){	
				
				

			?>
			
			
			
			
			
			
				<div class="col-md-2">
					<div class="card  text-center brands_card">
						<h2 class="mb-0"><a href="<?php echo BASE_URL.'check-get.php'; ?>?brand_id=<?php echo $brow['brand_id']; ?>" target="blank"><?php echo ucwords($brow['brand_name']); ?></a></h2>
						<div class="cardbody_brands_card">
						<h5>Instock - <?php echo $brow['count']; ?></h5>
						
						<ul>
						<?php 
						$mstatement1 = $pdo->prepare("SELECT COUNT(a.model_id) AS 'count', a.model_id, LOWER(b.model_name) AS 'model_name' 
														FROM tbl_car a JOIN tbl_model b ON b.model_id=a.model_id 
														WHERE a.status=? AND a.brand_id=? GROUP BY a.model_id ORDER BY b.model_name ASC");
						$mstatement1->execute(array(1, $brow['brand_id']));
						//$tot = $mstatement1->rowCount();
						$mresult1 = $mstatement1->fetchAll(PDO::FETCH_ASSOC);
						//echo "<pre>"; print_r($mresult1); exit;	
						if(count($mresult1)>0){
							foreach($mresult1 as $mrow){
						?>
						
						
						
							<li><a href="<?php echo BASE_URL.'check-get.php'; ?>?brand_id=<?php echo $brow['brand_id']; ?>&model_id=<?php echo $mrow['model_id']; ?>" target="blank"><?php echo ' ('. $mrow['count'].') '. ucwords($mrow['model_name']); ?></a></li>
							
						<?php 
							} 
						}
						?>
							
							
						</ul>
						</div>	
					</div>	
				</div>
				
			<?php 
			
				}
			}
				?>
				<!--<div class="col-md-2">
					<div class="card text-center brands_card">
						<h2>MG</h2>
						<h5>Available -55</h5>
						<p>BMW 2 Series Gran Coupé</p>
						<ul>
							<li> 1.5 Petrol Turbo MT</li>
							<li> 1.5 Petrol Turbo MT</li>
							<li> 2.0 Diesel Turbo MT</li>
							<li> 1.5 Petrol Turbo MT</li>
							<li> 1.5 Petrol Turbo MT</li>
							<li> 2.0 Diesel Turbo MT</li>
							
						</ul>
					</div>
				</div>
				<div class="col-md-2">
					<div class="card text-center brands_card">
						<h2>KIA</h2>
						<h5>Available -55</h5>
						<p>Selitos</p>
						<ul>
							<li>220i M Sport (2)</li>
							<li>220i Sport (7)</li>
							<li>220d M Sport(3)</li>
							<li>220i M Sport (2)</li>
							<li>220i Sport (7)</li>
							<li>220d M Sport(3)</li>
						</ul>
					</div>
				</div>
				<div class="col-md-2">
					<div class="card text-center brands_card">
						<h2>AUDI</h2>
						<h5>Available -55</h5>
						<p>A5</p>
						<ul>
							<li>220i M Sport (2)</li>
							<li>220i Sport (7)</li>
							<li>220d M Sport(3)</li>
							<li>220i M Sport (2)</li>
							<li>220i Sport (7)</li>
							<li>220d M Sport(3)</li>
						</ul>
					</div>
				</div>
				<div class="col-md-2">
					<div class="card text-center brands_card">
						<h2>TATA</h2>
						<h5>Available -55</h5>
						<p>Nexon</p>
						<ul>
							<li>xza+ (2)</li>
							<li>xz Sport  (7)</li>
							<li>xm(3)</li>
							<li>xza+ (2)</li>
							<li>xz Sport  (7)</li>
							<li>xm(3)</li>
						</ul>
					</div>
				</div>
				<div class="col-md-2">
					<div class="card text-center brands_card">
						<h2>TESLA</h2>
						<h5>Available -55</h5>
						<p>Tesla</p>
						<ul>
							<li>xza+ (2)</li>
							<li>xz Sport  (7)</li>
							<li>xm(3)</li>
						</ul>
					</div>
				</div>-->
			</div>

		</div>
	</div>
</section>



<!--Featured New Car Start-->
	<!--<div class="featured-area featured-new bg-area">
		<div class="container">
			<div class="row">
				<div class="headline">
					<h2><span>Latest</span> New Cars</h2>
				</div>
				<div class="featured-gallery owl-carousel">
					
					<?php
					$statement = $pdo->prepare("SELECT * 
											FROM tbl_car
											WHERE car_condition=? and status=?
											ORDER BY car_id DESC");
					$statement->execute(array('New Car',1));
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
					foreach ($result as $row) {

						$seller_id = $row['seller_id'];

						// Check if this seller is active or inactive
						$statement1 = $pdo->prepare("SELECT * FROM tbl_seller WHERE seller_id=? AND seller_access=?");
						$statement1->execute(array($seller_id,1));
						$seller_status = $statement1->rowCount();
						if(!$seller_status) {continue;}

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
						?>
						<div class="featured-item">
							<div class="featured-car-name">
								<h2><?php echo $row['title']; ?></h2>
							</div>
							<div class="featured-photo" style="background-image: url(<?php echo BASE_URL.'assets/uploads/cars/'.$row['featured_photo']; ?>)"></div>
							<div class="featured-price">
								<h2>
									<?php if($row['regular_price']!=$row['sale_price']): ?>
										<del>$<?php echo $row['regular_price']; ?></del>
										$<?php echo $row['sale_price']; ?>
									<?php else: ?>
										$<?php echo $row['sale_price']; ?>
									<?php endif; ?>
								</h2>
							</div>
							<div class="car-type">
								<ul>
									<?php
									$statement1 = $pdo->prepare("SELECT * FROM tbl_car_category WHERE car_category_id=?");
									$statement1->execute(array($row['car_category_id']));
									$tot = $statement1->rowCount();
									$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);			
									foreach ($result1 as $row1) {
										$car_category_name = $row1['car_category_name'];
									}
									?>
									<li>Category: <span><?php if($tot){echo $car_category_name;} else{echo 'Not Specified';} ?></span></li>
									<li>Mileage: <span><?php if($row['mileage']!=''){echo $row['mileage'];} else{echo 'Not Specified';} ?></span></li>
									<li>Year: <span><?php if($row['year']!=0){echo $row['year'];} else{echo 'Not Specified';} ?></span></li>
								</ul>
							</div>
							<div class="featured-link">
								<a href="<?php echo BASE_URL.URL_CAR.$row['car_id']; ?>">View Details</a>
							</div>
						</div>
						<?php endif; ?>
						<?php
					}
					?>
					
				</div>
			</div>
		</div>
	</div>-->


	<!--Testimonial Area Start-->
	<div class="testimonial-area">
		<div class="bg-2"></div>
		<div class="container">
			<div class="row">
				<div class="headline headline-white col-md-12 text-center">
					<h2>Happy Customers</h2>
				</div>
				<div class="testimonial-gallery owl-carousel">
					<?php
					$statement = $pdo->prepare("SELECT * FROM tbl_testimonial");
					$statement->execute();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
					foreach ($result as $row) {
						?>
						<div class="testimonial-item row justify-content-center">
							<div class="testimonial-photo col-md-2 col-sm-12" >
								<img src="<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>">
							</div>
							<div class="testimonial-text col-md-7 col-sm-12">
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
	<!--Testimonial Area End-->

	<!--Latest News Start-->
	<div class="latest-news">
		<div class="container-fluid">
			<div class="row">
				<div class="headline">
					<h2><span>Ofertas de la Semana</h2>
					</div>
					<div class="latest-gallery owl-carousel">
						<?php
						$i=0;
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
							ORDER BY t1.news_id DESC");
						$statement->execute();
						$result = $statement->fetchAll(PDO::FETCH_ASSOC);					
						foreach ($result as $row) {
							$i++;
							if($i>$total_recent_news_home_page) {break;}
							?>
							<div class="latest-item">
								<div class="latest-photo" style="background-image: url(<?php echo BASE_URL; ?>assets/uploads/<?php echo $row['photo']; ?>)"></div>
								<div class="latest-text">
									<h2><?php echo $row['news_title']; ?></h2>
									<ul>
										<li>Category: <a href="<?php echo BASE_URL.URL_CATEGORY.$row['category_slug']; ?>"><?php echo $row['category_name']; ?></a></li>
										<li>Date: <?php echo $row['news_date']; ?></li>
									</ul>
									<div class="latest-pra">
										<p>
											<?php echo substr($row['news_content'],0,120).' ...'; ?>
										</p>
										<a href="<?php echo BASE_URL.URL_NEWS.$row['news_slug']; ?>">Read more</a>
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

		<?php require_once('footer.php'); ?>	
		
		
		
		
		

		<script type="text/javascript">
			$(document).ready(function(){
// set default dates
				var start = new Date();
// set end date to max one year period:
				var end = new Date(new Date().setYear(start.getFullYear()+1));
				$('#year_id').datepicker({
    //startDate : start,
					endDate   : end,
					todayHighlight:'TRUE',
					autoclose: true,
					format: "yyyy",
					viewMode: "years", 
					minViewMode: "years"
// update "toDate" defaults whenever "fromDate" changes
				}).on('changeDate', function(){
    // set the "toDate" start to not be later than "fromDate" ends:
					$('#to_year_id').datepicker('setStartDate', new Date($(this).val()));
	//totalfare();
				}); 
				$('#to_year_id').datepicker({
    //startDate : start,
					endDate   : end,
					todayHighlight:'TRUE',
					autoclose: true,
					format: "yyyy",
					viewMode: "years", 
					minViewMode: "years"
// update "fromDate" defaults whenever "toDate" changes
				}).on('changeDate', function(){
    // set the "fromDate" end to not be later than "toDate" starts:
					$('#year_id').datepicker('setEndDate', new Date($(this).val()));
	//totalfare();
				});
			});

		</script>