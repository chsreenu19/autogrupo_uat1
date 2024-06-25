<?php
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');


try {
	$pdo = new PDO("mysql:host=localhost;dbname=rapid1y6_auto1_rentals_upgraded", 'rapid1y6_dealerpadpr_prd', '5SW4&TVX9~%~');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
	echo "Connection error :" . $exception->getMessage();
}

$statement = $pdo->prepare("SELECT
	
	'AUTO1PR' AS 'DealerID',
	
	a.vin AS 'VIN',
	
	floor(a.sale_price) AS 'SellingPrice'
	
	
	
 FROM 
 tbl_car a
 #LEFT JOIN tbl_car_photo d ON a.car_id=d.car_id
 #LEFT JOIN tbl_brand b ON a.brand_id=b.brand_id
 #LEFT JOIN tbl_body_type z ON a.body_type_id=z.body_type_id
 #LEFT JOIN tbl_transmission_type `Y` ON a.transmission_type_id=y.transmission_type_id
 #LEFT JOIN tbl_model c ON a.model_id=c.model_id 
 #WHERE d.photo is not null
 #GROUP BY a.car_id");
 

$statement->execute();

$row = $statement->fetchAll(PDO::FETCH_ASSOC);
//echo "<pre>"; print_r($result); exit;
$fname = "esteps_cfxiicr_".date("mdY").".txt";
$myfile = fopen($fname, "w") or die("Unable to open file!");
//$txt = "John Doe\n";
//$hText = 'Dealer ID | vin | Price'."\n";
//fwrite($myfile, $hText);
foreach ($row as $key=>$val) {
	
	
	$txt = $val['VIN'].'|'.$val['DealerID'].'|'.$val['SellingPrice']."\n";
    fwrite($myfile, $txt);
}


fwrite($myfile, $txt);
fclose($myfile);

$dealerfname = "esteps_dealerlist_".date("mdY").".txt";
$dealer_remote_file = "esteps_dealerlist_".date("mdY").".txt";
$dfile = fopen($dealerfname, "w") or die("Unable to open file!");


$dtxt = file_get_contents("dealers_data.txt");
fwrite($dfile, $dtxt);
fclose($dfile);





$ftp_user_name='esteps';
$ftp_user_pass='stir-vowel-rapidly-specifically';
$ftp_server='data.carfax.com';
 
$file = $fname;
$remote_file = $fname;
 //exit;
// set up basic connection
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

if ($conn_id) {
	// passive must be turn on
	ftp_pasv ($conn_id, true );
	
	if ($login_result){ 
    	// upload a file
    	if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) {
      		echo "VIN Data successfully uploaded $file: ".ftp_size ( $conn_id, $remote_file )." bytes\n";
			echo "</br>";
			if (ftp_put($conn_id, $dealer_remote_file, $dealerfname, FTP_ASCII)) {
				echo "Dealer file successfully uploaded $dealerfname: ".ftp_size ( $conn_id, $dealer_remote_file )." bytes\n";
				
			}else{
				
				echo "There was a problem while uploading $dealerfname\n";
			}

			
			
    	} else {
      		echo "There was a problem while uploading $file\n";
    	}
  	} else {
    	echo "BAD LOGIN";
  	}
  	// close the connection
  	ftp_close($conn_id);
} else {
  echo "NO CONNECTION";
}







/*
$ftp_server="data.carfax.com";
$ftp_user_name="esteps";
$ftp_user_pass="stir-vowel-rapidly-specifically";
$file = $fname;//tobe uploaded
$remote_file = $fname;

// set up basic connection
$conn_id = ftp_connect($ftp_server,21);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
//ftp_pasv($conn_id, true) or die("Unable switch to passive mode");
// upload a file
if (ftp_put($conn_id, $remote_file, $file)) {
echo "successfully uploaded $file\n";
exit;
} else {
echo "There was a problem while uploading $file\n";
exit;
}*/



?>

