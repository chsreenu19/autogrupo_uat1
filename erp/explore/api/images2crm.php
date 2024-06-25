<?php
$pdo = new PDO("mysql:host=localhost;dbname=rapid1y6_auto1_rentals_upgraded", 'rapid1y6_dealerpadpr_prd', '5SW4&TVX9~%~');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare("SELECT featured_photo, dms_id,car_id FROM tbl_car");
$statement->execute();
$total = $statement->rowCount();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

$dmsdb = new PDO("mysql:host=localhost;dbname=rapid1y6_auto1_rentals_upgraded", 'rapid1y6_dealerpadpr_prd', '5SW4&TVX9~%~');
$dmsdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//echo "<pre>"; print_r($result); exit;	

if(count($result)>0){
	
	foreach($result as $row){
		//echo "<pre>"; print_r($row); exit;		
		if($row['dms_id'] !='' && $row['featured_photo']!=''){
			$dmsid = $row['dms_id'];
			$carid = $row['car_id'];
			//echo $carid."\n";
			$getDetailsFromDms = $dmsdb->prepare("SELECT id FROM tblitems where id =".$dmsid);
			$getDetailsFromDms->execute();
			$itemquerytotal = $getDetailsFromDms->rowCount();
			$resultitems = $getDetailsFromDms->fetchAll(PDO::FETCH_ASSOC);
			if(count($resultitems)>0){
				$getItemImg = $dmsdb->prepare("SELECT * FROM tblfiles where rel_type='commodity_item_file' and rel_id =".$dmsid);
				$getItemImg->execute();
				$itemimgtotal = $getItemImg->rowCount();
				$resultitemsimg = $getItemImg->fetchAll(PDO::FETCH_ASSOC);
				if($itemimgtotal==0){
					
				
					
					$car_photo = $pdo->prepare("SELECT photo FROM tbl_car_photo where car_id=".$carid);
					$car_photo->execute();
					$car_photo_total = $car_photo->rowCount();
					$car_photo_result = $car_photo->fetchAll(PDO::FETCH_ASSOC);
					//array_push($car_photo_result,array($row['featured_photo']));
					
					//echo "<pre>"; print_r($car_photo_result); exit;
					foreach($car_photo_result as $img){
						if($img['photo']!=''){
							$attachment_key = md5(rand() . microtime() . time() . uniqid());
							$imginsert = $dmsdb->prepare("INSERT INTO tblfiles (rel_id,rel_type,file_name,attachment_key,staffid,dateadded) VALUES (?,?,?,?,?,?)");
							$imginsert->execute(array($dmsid,'commodity_item_file',$img['photo'],$attachment_key,1,date("Y-m-d h:is") ));
							$id = $dmsdb->lastInsertId();
							echo 'Inventory id-: '.$dmsid. "  images updated to crm<br/>";//exit;
							
						}
						//echo "<pre>"; print_r($img); exit;
					}
					
					//exit;
					
					//echo "<pre>"; print_r($car_photo_result); exit;
					
					
					
					
				}
				
			}		
			
			
			
		}
	}
	
}


?>

