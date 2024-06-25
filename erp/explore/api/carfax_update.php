<?php
ob_start();

$ftp_user_name='esteps_get';
$ftp_user_pass='stir-vowel-rapidly-specifically';
$ftp_server='data.carfax.com';
 
$local_file = "esteps_cfx_".date("mdY")."_return_file.txt";
$server_file = "esteps_cfx_".date("mdY")."_return_file.txt";
 
// set up basic connection
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

if ($conn_id) {
	// passive must be turn on
	ftp_pasv ($conn_id, true );
	
	if ($login_result){ 
    	// upload a file
    	if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
			echo "Successfully downloaded and processed $local_file\n";
			$ftpstatus = 'success';
		} else {
      		echo "There was a problem while downloading $file\n";
    	}
  	} else {
    	echo "BAD LOGIN";
  	}
  	// close the connection
  	ftp_close($conn_id);
} else {
  echo "NO CONNECTION";
}



$ftpstatus = 'success';
//exit;

if($ftpstatus=='success'){

	try {
		$pdo = new PDO("mysql:host=localhost;dbname=rapid1y6_auto1_rentals_upgraded", 'rapid1y6_dealerpadpr_prd', '5SW4&TVX9~%~');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch( PDOException $exception ) {
		echo "Connection error :" . $exception->getMessage();
	}


	$server_file = $local_file;
	
	$filename = $server_file;
	if ($file = fopen($filename, "r")) {
		$i=0;
		while(!feof($file)) {
			$line = fgets($file);
			if($i!=0){
				
				$lineArr = explode("|",$line);
				//echo "<pre>"; print_r($lineArr); exit;
				
				if(count($lineArr)>0){
					$vin = $lineArr[1];
					$carfax_url = $lineArr[2];
					$carfax_icon_url = $lineArr[3];
					$carfax_is_one_owner = $lineArr[4];
					$carfax_value_badge = $lineArr[5];
					$statement = $pdo->prepare("SELECT car_id FROM tbl_car WHERE vin=?");
					$statement->execute(array($vin));
					$total = $statement->rowCount();
					$result = $statement->fetchAll(PDO::FETCH_ASSOC);
					//echo "<pre>"; print_r($result); exit;
					if(count($result)>0){
						$car_id = $result[0]['car_id'];
						$statement = $pdo->prepare("UPDATE tbl_car SET carfax_url=?,carfax_icon_url=?,carfax_is_one_owner=?,carfax_value_badge=? WHERE car_id=?");
						$statement->execute(array($carfax_url,$carfax_icon_url,$carfax_is_one_owner,$carfax_value_badge,$car_id));	
					}
				}
				//exit;
				
			}
				# do same stuff with the $line
			$i++;	
		}
		fclose($file);
	}
	exit;
}

?>

