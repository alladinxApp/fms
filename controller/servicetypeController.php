<?
	// -- START SAVE NEW SERVICE TYPE --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$desc = strtoupper($_POST['txtDescription']);
		$newNum = getNewCtrlNo("service_type");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW SERVICE TYPE
		$ins_servicetype = new Table;
		$ins_servicetype->setSQLType($fms_db->getSQLType());
		$ins_servicetype->setInstance($fms_db->getInstance());
		$ins_servicetype->setTable("servicetypemaster");
		$ins_servicetype->setField("serviceTypeID,description,createdBy,createdDate");
		$ins_servicetype->setValues("'$newNum','$desc','$sys_UserID','$today'");
		$ins_servicetype->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO SERVICE TYPE
		UpdateCtrlNo("service_type");

		$url = BASE_URL . V_SERVICETYPE;
		$msg = "New Service Type successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW SERVICE TYPE --

	// -- START DELETE SERVICE TYPE --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// DELETE SERVICE TYPE
		$del_servicetype = new Table;
		$del_servicetype->setSQLType($fms_db->getSQLType());
		$del_servicetype->setInstance($fms_db->getInstance());
		$del_servicetype->setTable("servicetypemaster");
		$del_servicetype->setParam("WHERE serviceTypeID = '$id'");
		$del_servicetype->doQuery("delete");
		$res_servicetype = $del_servicetype->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_servicetype > 0){
			$msg .= "Sorry! There has been an error in deleting your Service Type. Please contact the Web Administrator.";
		}else{
			$msg .= "Service Type successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_SERVICETYPE);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE SERVICE TYPE --

	// -- START EDIT SERVICE TYPE --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET SERVICE TYPE
		$servicetype = new Table;
		$servicetype->setSQLType($fms_db->getSQLType());
		$servicetype->setInstance($fms_db->getInstance());
		$servicetype->setView("v_servicetypemaster");
		$servicetype->setParam("WHERE serviceTypeID = '$id'");
		$servicetype->doQuery("query");
		$row_servicetype = $servicetype->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_servicetype[0]['status'];
	}
	// -- END EDIT SERVICE TYPE --

	// -- START UPDATE SERVICE TYPE --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$desc = strtoupper($_POST['txtDescription']);
		$status = $_POST['txtStatus'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET SERVICE TYPE
		$servicetype = new Table;
		$servicetype->setSQLType($fms_db->getSQLType());
		$servicetype->setInstance($fms_db->getInstance());
		$servicetype->setTable("servicetypemaster");
		$servicetype->setValues("description = '$desc', modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$servicetype->setParam("WHERE serviceTypeID = '$id'");
		$servicetype->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_SERVICETYPE;
		$msg = "Service Type successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE SERVICE TYPE --
?>