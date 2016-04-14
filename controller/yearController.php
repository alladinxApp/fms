<?
	// -- START SAVE NEW YEAR --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$description = strtoupper($_POST['txtDescription']);
		$newNum = getNewCtrlNo("year");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW YEAR
		$ins_year = new Table;
		$ins_year->setSQLType($fms_db->getSQLType());
		$ins_year->setInstance($fms_db->getInstance());
		$ins_year->setTable("yearmaster");
		$ins_year->setField("yearID,description,createdBy,createdDate");
		$ins_year->setValues("'$newNum','$description','$sys_UserID','$today'");
		$ins_year->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO YEAR
		UpdateCtrlNo("year");

		$url = BASE_URL . V_YEAR;
		$msg = "New Year successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW YEAR --

	// -- START DELETE YEAR --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// DELETE YEAR
		$del_year = new Table;
		$del_year->setSQLType($fms_db->getSQLType());
		$del_year->setInstance($fms_db->getInstance());
		$del_year->setTable("yearmaster");
		$del_year->setParam("WHERE yearID = '$id'");
		$del_year->doQuery("delete");
		$res_year = $del_year->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_year > 0){
			$msg .= "Sorry! There has been an error in deleting your Year. Please contact the Web Administrator.";
		}else{
			$msg .= "Year successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_YEAR);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE YEAR --

	// -- START EDIT YEAR --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET YEAR
		$year = new Table;
		$year->setSQLType($fms_db->getSQLType());
		$year->setInstance($fms_db->getInstance());
		$year->setView("v_yearmaster");
		$year->setParam("WHERE yearID = '$id'");
		$year->doQuery("query");
		$row_year = $year->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_year[0]['status'];
	}
	// -- END EDIT YEAR --

	// -- START UPDATE YEAR --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$description = $_POST['txtDescription'];
		$status = $_POST['txtStatus'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET YEAR
		$year = new Table;
		$year->setSQLType($fms_db->getSQLType());
		$year->setInstance($fms_db->getInstance());
		$year->setTable("yearmaster");
		$year->setValues("description = '$description', modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$year->setParam("WHERE yearID = '$id'");
		$year->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_YEAR;
		$msg = "Year successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE YEAR --
?>