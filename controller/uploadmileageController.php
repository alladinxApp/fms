<?
	if(isset($_GET['uploadMileage']) && !empty($_GET['uploadMileage']) && $_GET['uploadMileage'] == '1'){
		$file = $_FILES['uploadMileage']['name'];
		$getFile = fopen($file, "r");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		while($row = fgetcsv($getFile,1000,",")){
			$num = count($row);
		}
		
		// CLOSING FMS DB
		$fms_db->DBClose();


		$url = BASE_URL . V_UPLOADMILEAGE;
		$msg = "Vehicles was successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	
?>