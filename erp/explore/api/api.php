
<?php
ob_start();
session_start();
require_once __DIR__ . '/parsecsv-for-php/vendor/autoload.php';


$local_file = 'esteps.csv';
$server_file = 'esteps.csv';
$ftp_server="inventory.dealerimagepro.com";
$ftp_user_name="esteps";
$ftp_user_pass="BRSQr34Z9x2!JE)z";

$conn_id = ftp_connect($ftp_server);

// login with username and password
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

$ftpstatus = 'fail';

// try to download $server_file and save to $local_file
if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
    echo "Successfully uploaded and processed $local_file\n";
	$ftpstatus = 'success';
}
else {
    echo "There was a problem\n";
}
// close the connection
ftp_close($conn_id);




if($ftpstatus=='success'){

	try {
		$pdo = new PDO("mysql:host=localhost;dbname=rapid1y6_auto1_rentals_upgraded", 'rapid1y6_dealerpadpr_prd', '5SW4&TVX9~%~');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch( PDOException $exception ) {
		echo "Connection error :" . $exception->getMessage();
	}


	$csv = new \ParseCsv\Csv();
	$csv->auto($server_file);
	//echo "<pre>";
	$s = $csv->data;
	//print_r($s); exit;
	$i=1;

	foreach($s as $r)
	{
		
		//echo "<pre>"; print_r($r); exit;
		$vin = $r['vin'];
		$statement = $pdo->prepare("SELECT car_id FROM tbl_car WHERE vin=?");
		$statement->execute(array($vin));
		$total = $statement->rowCount();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		//echo "<pre>"; print_r($result); exit;
		if(count($result)>0){
			$car_id = $result[0]['car_id'];
			$explode = explode(",",$r['photo_urls']);
			//echo "<pre>"; print_r($car_id); exit;
			$k=0;
			foreach($explode as $row){
				echo $k.'------'.$car_id.'------'.$vin."<br/>";
				
				if($k==0){
					
					$statement = $pdo->prepare("UPDATE tbl_car SET featured_photo=? WHERE car_id=?");
					$statement->execute(array($row,$car_id));
					
					$statement = $pdo->prepare("DELETE FROM tbl_car_photo WHERE car_id=?");
					$statement->execute(array($car_id));
					
				}else{
					//echo $i."<br/>";
					$statement = $pdo->prepare("INSERT INTO tbl_car_photo (photo,car_id) VALUES (?,?)");
					$statement->execute(array($row,$car_id));
				}
				$k++;
			}
		}
		
		//echo $i."<pre>"; print_r($r); //exit;
		
		$i++;
	}

}
/*include("../admin/config.php");
include("../admin/functions.php");

if(!isset($_REQUEST['id'])) {
	
	exit('Not Authourized');
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
}*/

?>

