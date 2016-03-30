<?
	// -- START SAVE NEW CONTROL NO --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$desc = strtoupper($_POST['txtDescription']);
		$type = $_POST['txtControlType'];
		$code = $_POST['txtControlCode'];
		$noofdigit = $_POST['txtNoOfDigit'];
		$lastdigit = $_POST['txtLastDigit'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW CONTROL NO
		$ins_ctrlno = new Table;
		$ins_ctrlno->setSQLType($fms_db->getSQLType());
		$ins_ctrlno->setInstance($fms_db->getInstance());
		$ins_ctrlno->setTable("controlnomaster");
		$ins_ctrlno->setField("description,type,code,lastDigit,noOfDigit,createdBy,createdDate");
		$ins_ctrlno->setValues("'$desc','$type','$code','$lastdigit','$noofdigit','$sys_UserID','$today'");
		$ins_ctrlno->doQuery("save");
		$res_ctrlno = $ins_ctrlno->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_ctrlno > 0){
			$url = BASE_URL . V_CONTROLNOADD;
			$msg .= "Sorry! There has been an error in saving your control no. Please check the data and save it again.";
		}else{
			$url = BASE_URL . V_CONTROLNO;
			$msg .= "New Control No successfully saved.";
		}

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW CONTROL NO --

	// -- START DELETE CONTROL NO --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// DELETE CONTROL NO
		$del_ctrlno = new Table;
		$del_ctrlno->setSQLType($fms_db->getSQLType());
		$del_ctrlno->setInstance($fms_db->getInstance());
		$del_ctrlno->setTable("controlnomaster");
		$del_ctrlno->setParam("WHERE id = '$id'");
		$del_ctrlno->doQuery("delete");
		$res_ctrlno = $del_ctrlno->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_ctrlno > 0){
			$msg .= "Sorry! There has been an error in deleting your Control No. Please contact the Web Administrator.";
		}else{
			$msg .= "Control No successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_CONTROLNO);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE CONTROL NO --

	// -- START EDIT CONTROL NO --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET CONTROL NO
		$ctrlno = new Table;
		$ctrlno->setSQLType($fms_db->getSQLType());
		$ctrlno->setInstance($fms_db->getInstance());
		$ctrlno->setView("controlnomaster");
		$ctrlno->setParam("WHERE id = '$id'");
		$ctrlno->doQuery("query");
		$row_ctrlno = $ctrlno->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_ctrlno[0]['status'];
	}
	// -- END EDIT CONTROL NO --

	// -- START UPDATE CONTROL NO --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$desc = strtoupper($_POST['txtDescription']);
		$type = $_POST['txtControlType'];
		$code = $_POST['txtControlCode'];
		$noofdigit = $_POST['txtNoOfDigit'];
		$lastdigit = $_POST['txtLastDigit'];
		$status = $_POST['txtStatus'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET CONTROL NO
		$ctrlno = new Table;
		$ctrlno->setSQLType($fms_db->getSQLType());
		$ctrlno->setInstance($fms_db->getInstance());
		$ctrlno->setTable("controlnomaster");
		$ctrlno->setValues("description = '$desc', type = '$type', code = '$code', noOfDigit = '$noofdigit'
							, lastDigit = '$lastdigit', modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$ctrlno->setParam("WHERE id = '$id'");
		$ctrlno->doQuery("update");
		$row_ctrlno = $ctrlno->getLists();
		$res_ctrlno = $ctrlno->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_ctrlno > 0){
			$url = BASE_URL . V_CONTROLNOEDIT . "edit=1&id=" . $id;
			$msg .= "Sorry! There has been an error in updating your control no. Please check the data and update it again.";
		}else{
			$url = BASE_URL . V_CONTROLNO;
			$msg .= "Control No successfully updated.";
		}

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE CONTROL NO --
?>