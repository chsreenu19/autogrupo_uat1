<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ob_start();
session_start();
//require_once '../main-config.php';
include("admin/config.php");
include("admin/functions.php");
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=?");
$statement->execute(array(1));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$mod_rewrite = $row['mod_rewrite'];
}
if($mod_rewrite == 'Off') {
	define("URL_CATEGORY", "category.php?slug=");
	define("URL_PAGE", "page.php?slug=");
	define("URL_NEWS", "news.php?slug=");
	define("URL_SERVICE", "service.php?slug=");
	define("URL_TEAM", "team-member.php?slug=");
	define("URL_CAR", "car.php?id=");
	define("URL_SEARCH", "search.php");
} else {
	define("URL_CATEGORY", "category/");
	define("URL_PAGE", "page/");
	define("URL_NEWS", "news/");
	define("URL_SERVICE", "service/");
	define("URL_TEAM", "team-member/");
	define("URL_CAR", "car/");
	define("URL_SEARCH", "search");
}
// Getting the basic data for the website from database
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
	$logo = $row['logo'];
	$favicon = $row['favicon'];
	$contact_email = $row['contact_email'];
	$contact_phone = $row['contact_phone'];
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

	<?php
	
	// Getting the current page URL
	$cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
		//echo $cur_page; exit;

	if($cur_page == 'car.php')
	{
		$get = $_GET;
		if(isset($get) && isset($get['id']) && $get['id'] !=''){
			//echo "<pre>"; print_r($get); exit;
			$statement = $pdo->prepare('SELECT CONCAT(title, " - $" , regular_price) as pTitle FROM tbl_car WHERE car_id=?');
			$statement->execute(array($get['id']));
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
			//echo "<pre>"; print_r($result); exit;			
			if(is_array($result) && count($result)>0){
				echo '<title>'.$result[0]['pTitle'].'</title>';
			}else{
				
				echo '<title>'.$result[0]['pTitle'].' Used Cars</title>';
			}
		}
	}		





	if($cur_page == 'news.php')
	{
		$statement = $pdo->prepare("SELECT * FROM tbl_news WHERE news_slug=?");
		$statement->execute(array($_REQUEST['slug']));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row) 
		{
			$og_photo = $row['photo'];
			$og_title = $row['news_title'];
			$og_slug = $row['news_slug'];
			$og_description = substr(strip_tags($row['news_content']),0,200).'...';
			echo '<meta name="description" content="'.$row['meta_description'].'">';
			echo '<meta name="keywords" content="'.$row['meta_keyword'].'">';
			echo '<title>'.$row['meta_title'].'</title>';
		}
	}

	if($cur_page == 'page.php')
	{
		$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE page_slug=?");
		$statement->execute(array($_REQUEST['slug']));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);	
		if(count($result)>0){
			foreach ($result as $row) 
			{
				echo '<meta name="description" content="'.$row['meta_description'].'">';
				echo '<meta name="keywords" content="'.$row['meta_keyword'].'">';
				if($row['meta_title']!=''){
					echo '<title>'.$row['meta_title'].'</title>';
				}else{
					echo '<title>Inventory List</title>';
				}
			}
		}
	}

	if($cur_page == 'category.php')
	{
		$statement = $pdo->prepare("SELECT * FROM tbl_category WHERE category_slug=?");
		$statement->execute(array($_REQUEST['slug']));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row)
		{
			echo '<meta name="description" content="'.$row['meta_description'].'">';
			echo '<meta name="keywords" content="'.$row['meta_keyword'].'">';
			echo '<title>'.$row['meta_title'].'</title>';
		}
	}

	if($cur_page == 'index.php')
	{
		$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result as $row) 
		{
			echo '<meta name="description" content="'.$row['meta_description_home'].'">';
			echo '<meta name="keywords" content="'.$row['meta_keyword_home'].'">';
			echo '<title>'.$row['meta_title_home'].'</title>';
		}
	}
	?>

	<!-- Favicon -->
	<link href="<?php echo BASE_URL; ?>assets/uploads/<?php echo $favicon; ?>" rel="shortcut icon" type="image/png">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/all.min.css">
	
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/lightbox.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/normalize.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/slicknav.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/responsive.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/chosen.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/datatable.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/datepicker.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/showLoading.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/animate.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>css/bootstrap.min.css">
	 <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/magnific-popup.css">
	<?php if($cur_page == 'news.php'): ?>
		<meta property="og:title" content="<?php echo $og_title; ?>">
		<meta property="og:type" content="website">
		<meta property="og:url" content="<?php echo BASE_URL.URL_NEWS.$og_slug; ?>">
		<meta property="og:description" content="<?php echo $og_description; ?>">
		<meta property="og:image" content="<?php echo BASE_URL; ?>assets/uploads/<?php echo $og_photo; ?>">
	<?php endif; ?>

	

</head>

<body>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
/*var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/647a1e65ad80445890f0b396/1h1ugdfjr';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();*/
<!--Start of Tawk.to Script-->

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/649d36d694cf5d49dc6076e2/1h431sdqb';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

<!--End of Tawk.to Script-->
</script>
<!--End of Tawk.to Script-->

	<?php
// Getting Facebook comment code from the database
	$statement = $pdo->prepare("SELECT * FROM tbl_comment WHERE id=1");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) 
	{
		echo $row['code_body'];
	}
	?>

	<!--Preloader Start-->
	<!-- <div id="preloader">
		<div id="status" style="background-image: url(<?php echo BASE_URL; ?>img/preloader/loader.svg)"></div>
	</div> -->
	<!--Preloader End-->

	<!--Top-Header Start-->
	<div class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="top-header-left">
						
					</div>
				</div>
				<!--<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="top-header-right">
						
						<?php if(!isset($_SESSION['seller'])): ?>
							<a href="registration.php"><i class="fa fa-sign-in"></i>Sign Up</a>
							<a href="login.php"><i class="fa fa-sign-in"></i>Sign In</a>
						<?php else: ?>
							Logged in as: <?php echo $_SESSION['seller']['seller_name']; ?>
							|
							<a href="dashboard.php">Dashboard</a>
						<?php endif; ?>
					</div>
				</div>-->
			</div>
		</div>
	</div>

	<!--Menu Start-->
	<div class="menu-area animate__animated " id="sticky">
		<div class="container-fluid px-5" style="background: #fff;">
			<div class="row">
			<div class="col-md-4 col-sm-12 col-xs-12 logo_block">&nbsp;</div>
				<div class="col-md-4 col-sm-12 col-xs-12 logo_block">
					<div class="" style="text-align:center; padding: 25px;">
						<div class="logo">
							<a href="<?php echo BASE_URL.'inventory.php'; ?>"><img style="height:80px !important;" src="<?php echo BASE_URL; ?>assets/uploads/<?php echo $logo; ?>" alt=""></a>

						</div>
						
					</div>
				</div>
				
			<div class="col-md-4 col-sm-12 col-xs-12 logo_block">&nbsp;</div>	
				
			</div>
		</div>
	</div>
