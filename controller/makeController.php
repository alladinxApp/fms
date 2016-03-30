<?
	// -- START SAVE NEW MAKE --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$makeName = strtoupper($_POST['txtMakeName']);
		$newNum = getNewCtrlNo("make");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW MAKE
		$ins_make = new Table;
		$ins_make->setSQLType($fms_db->getSQLType());
		$ins_make->setInstance($fms_db->getInstance());
		$ins_make->setTable("makemaster");
		$ins_make->setField("makeID,makeName,createdBy,createdDate");
		$ins_make->setValues("'$newNum','$makeName','$sys_UserID','$today'");
		$ins_make->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO MAKE
		UpdateCtrlNo("make");

		$url = BASE_URL . V_MAKE;
		$msg = "New Make successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW MAKE --

	// -- START DELETE MAKE --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// DELETE MAKE
		$del_make = new Table;
		$del_make->setSQLType($fms_db->getSQLType());
		$del_make->setInstance($fms_db->getInstance());
		$del_make->setTable("makemaster");
		$del_make->setParam("WHERE makeID = '$id'");
		$del_make->doQuery("delete");
		$res_make = $del_make->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_make > 0){
			$msg .= "Sorry! There has been an error in deleting your Make. Please contact the Web Administrator.";
		}else{
			$msg .= "Make successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_MAKE);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE MAKE --

	// -- START EDIT MAKE --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET MAKE
		$make = new Table;
		$make->setSQLType($fms_db->getSQLType());
		$make->setInstance($fms_db->getInstance());
		$make->setView("v_makemaster");
		$make->setParam("WHERE makeID = '$id'");
		$make->doQuery("query");
		$row_make = $make->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_make[0]['status'];
	}
	// -- END EDIT CATEGORY --

	// -- START UPDATE MAKE --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$makeName = $_POST['txtMakeName'];
		$status = $_POST['txtStatus'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET MAKE
		$make = new Table;
		$make->setSQLType($fms_db->getSQLType());
		$make->setInstance($fms_db->getInstance());
		$make->setTable("makemaster");
		$make->setValues("makeName = '$makeName', modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$make->setParam("WHERE makeID = '$id'");
		$make->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_MAKE;
		$msg = "Make successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE MAKE --
?>