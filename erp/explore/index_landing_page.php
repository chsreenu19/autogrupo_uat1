<?php require_once('header.php'); ?>

<?php


//exit;
//$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
//$statement->execute();
//$result = $statement->fetchAll(PDO::FETCH_ASSOC);
//foreach ($result as $row) {
//	$total_recent_news_home_page = $row['total_recent_news_home_page'];
//	$search_title = $row['search_title'];
//	$search_photo = $row['search_photo'];
//	$testimonial_photo = $row['testimonial_photo'];
//}
?>

<!--Slider-Area Start-->
<div class="slider-area">
	<div class="slider-item" style="background-image: url(<?php echo BASE_URL.'assets/uploads/'.$search_photo; ?>)">
		<div class="bg-3"></div>
		<div class="container">
			<div class="row" style="display:block;">
				
				<div class="searchbox">

					<div class="slider-text">
						<h1>Volant Current Entities</h1>
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
	<!--<div tru-cms="srp-banner"> </div>-->
</div>




<div class="wrapper">
  <div class="container">
  <h1 style="text-align:center; color: #fff;">What's your Preference?</h1>
    <div class="row">
	
      <div class="col-md-6 col-lg-6">
        <div class="card mx-30">
         
          <div class="card-body">
            <h5 class="card-title"> Volant Caguas</h5>
            <h6> eCommerce</h6>
            <p class="card-text"> <a class="btn btn-theme" href="https://volantcaguas.com/inventory.php">Visit Caguas</a></p>
          
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="card mx-30">
         
          <div class="card-body">
            <h5 class="card-title"> Volant Dorado</h5>
            <h6> eCommerce</h6>
            <p class="card-text"> <a class="btn btn-theme" href="https://volantdorado.com/inventory.php">Visit Dorado</a></p>
            
          </div>
        </div>
      </div>
     
    </div>
  </div>
</div>











<!--Featured Old Car Start-->
<div class="featured-area">
	<div class="container-fluid">
		
		</div>
	</div>
	



<!--Featured New Car Start-->



	<!--Testimonial Area Start-->

	<!--Testimonial Area End-->

	<!--Latest News Start-->
	

		<?php require_once('footer.php'); ?>

<style>



body {
 font-family: 'Lato', sans-serif;
 background-color: #f4b927;
}
.wrapper {
padding-top: 40px;
}
.card-img-top {
box-shadow: 0 5px 10px rgba(0,0,0,0.5);
}
.card-body{
    text-align: center;
    box-shadow: 0px 15px 15px -8px rgba(0,0,0,0.5)
}
.card-body h6 {
font-size: 14px;
text-transform: uppercase;
color: deeppink;
}
.card-title {
text-transform: uppercase;
font-weight: bold;
font-size: 24px;
}

.socials a {
width: 40px;
height: 40px;
display: inline-block;
border-radius: 50%;
margin: 0 5px;
}
.socials a i {
color: #fff;
padding: 12px 0;
}    

.socials a:nth-child(1) {
background: #3b5998;
}.socials a:nth-child(2) {
background: #ff0000;
}.socials a:nth-child(3) {
background: #007bb5;
}.socials a:nth-child(4) {
background: #ea4c89;
}

@media (max-width: 800px){
    .mx-30{
        margin-bottom: 30px;
    }
}
</style>		
		
