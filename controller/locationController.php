<?
	// -- START SAVE NEW LOCATION --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$locName = strtoupper($_POST['txtLocationName']);
		$newNum = getNewCtrlNo("location");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW LOCATION
		$ins_location = new Table;
		$ins_location->setSQLType($fms_db->getSQLType());
		$ins_location->setInstance($fms_db->getInstance());
		$ins_location->setTable("locationmaster");
		$ins_location->setField("locationID,locationName,createdBy,createdDate");
		$ins_location->setValues("'$newNum','$locName','$sys_UserID','$today'");
		$ins_location->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO LOCATION
		UpdateCtrlNo("location");

		$url = BASE_URL . V_LOCATION;
		$msg = "New Location successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW LOCATION --

	// -- START DELETE LOCATION --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// DELETE LOCATION
		$del_location = new Table;
		$del_location->setSQLType($fms_db->getSQLType());
		$del_location->setInstance($fms_db->getInstance());
		$del_location->setTable("locationmaster");
		$del_location->setParam("WHERE locationID = '$id'");
		$del_location->doQuery("delete");
		$res_location = $del_location->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_location > 0){
			$msg .= "Sorry! There has been an error in deleting your Location. Please contact the Web Administrator.";
		}else{
			$msg .= "Location successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_LOCATION);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE LOCATION --

	// -- START EDIT LOCATION --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET LOCATION
		$location = new Table;
		$location->setSQLType($fms_db->getSQLType());
		$location->setInstance($fms_db->getInstance());
		$location->setView("v_locationmaster");
		$location->setParam("WHERE locationID = '$id'");
		$location->doQuery("query");
		$row_location = $location->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_location[0]['status'];
	}
	// -- END EDIT LOCATION --

	// -- START UPDATE LOCATION --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$locName = strtoupper($_POST['txtLocationName']);
		$status = $_POST['txtStatus'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET LOCATION
		$location = new Table;
		$location->setSQLType($fms_db->getSQLType());
		$location->setInstance($fms_db->getInstance());
		$location->setTable("locationmaster");
		$location->setValues("locationName = '$locName', modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$location->setParam("WHERE locationID = '$id'");
		$location->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_LOCATION;
		$msg = "Location successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE LOCATION --
?>