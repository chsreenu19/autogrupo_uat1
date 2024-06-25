<?php
ob_start();
session_start();
error_reporting(E_ALL);
//echo "<pre>"; print_r($_SERVER); exit();
ini_set('display_errors', '1');
$ftp_server="inventory.dealerimagepro.com";
$ftp_user_name="esteps";
$ftp_user_pass="BRSQr34Z9x2!JE)z";
$file = "Auto1Pr.csv";//tobe uploaded
$remote_file = "Auto1Pr.csv";

try {
	$pdo = new PDO("mysql:host=localhost;dbname=rapid1y6_auto1_rentals_upgraded", 'rapid1y6_dealerpadpr_prd', '5SW4&TVX9~%~');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
	echo "Connection error :" . $exception->getMessage();
}

$statement = $pdo->prepare("SELECT 
	a.car_id,
	'AUTO1PR' AS 'DealerID',
	z.body_type_name AS 'Type',
	a.vin AS 'Stock No',
	a.vin AS 'VIN',
	a.year AS 'Year',
	b.brand_name AS 'Make',
	c.model_name AS 'Model',
	z.body_type_name AS 'Body',
	'' AS 'Trim',
	'' AS 'ModelNumber',
	a.door AS 'Doors',
	a.exterior_color AS 'Vehicle Exterior Color',
	a.interior_color AS 'Vehicle Interior Color',
	a.engine_size AS 'EngineCylinders',
	a.engine AS 'EngineDisplacement',
	y.transmission_type_name AS 'Transmission',
	a.mileage AS 'Mileage',
	a.sale_price AS 'SellingPrice',
	'Used Car' AS 'Vehicle Type', 
	'' AS 'MSRP',
	created_on AS 'DateInStock',
	'' AS 'Drivetrain',
	a.mileage AS 'CityMPG',
	'' AS 'HighwayMPG',
	GROUP_CONCAT(d.photo,',',a.featured_photo) AS 'ImageList',
	'' AS 'ImageLastUpdated',
	CONCAT('https://auto1pr.com/car.php?id=',a.car_id) AS 'WebsiteVDPURL'
	
 FROM 
 tbl_car a
 LEFT JOIN tbl_car_photo d ON a.car_id=d.car_id
 LEFT JOIN tbl_brand b ON a.brand_id=b.brand_id
 LEFT JOIN tbl_body_type z ON a.body_type_id=z.body_type_id
 LEFT JOIN tbl_transmission_type y ON a.transmission_type_id=y.transmission_type_id
 LEFT JOIN tbl_model c ON a.model_id=c.model_id 
 #WHERE d.photo is not null
 GROUP BY a.car_id");
$statement->execute();

$row = $statement->fetchAll(PDO::FETCH_ASSOC);
//echo "<pre>"; print_r($result); exit;
$fp = fopen('Auto1Pr.csv', 'w');

fputcsv($fp, array('CarID','DealerID','Type','Stock No','VIN','Year','Make','Model','Body','Trim','ModelNumber','Doors','Vehicle Exterior Color','Vehicle Interior Color','EngineCylinders','EngineDisplacement','Transmission','Mileage','SellingPrice','Vehicle Type','MSRP','DateInStock','Drivetrain','CityMPG','HighwayMPG','ImageList','ImageLastUpdated','WebsiteVDPURL'));

foreach ($row as $val) {
    fputcsv($fp, $val);
}

fclose($fp);


// set up basic connection
$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// upload a file
if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) {
echo "successfully uploaded $file\n";
exit;
} else {
echo "There was a problem while uploading $file\n";
exit;
}
// close the connection
ftp_close($conn_id);
?>

