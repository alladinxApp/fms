<?
	$search = null;
	if(isset($_POST['search']) && !empty($_POST['search']) && $_POST['search'] == 1){

		if(empty($_POST['txtFromDt']) && empty($_POST['txtToDt'])){
			$dt = date("Y-m-d");
			$search .= "AND (createdDate between '$dt 00:00' AND '$dt 23:59') ";
		}
		if(!empty($_POST['txtFromDt']) && empty($_POST['txtToDt'])){
			$dt = date("Y-m-d");
			$frmDt = dateFormat($_POST['txtFromDt'],"Y-m-d");
			$search .= "AND (createdDate between '$frmDt 00:00' AND '$dt 23:59') ";
		}
		if(!empty($_POST['txtFromDt']) && empty($_POST['txtToDt'])){
			$dt = date("Y-m-d");
			$toDt = dateFormat($_POST['txtToDt'],"Y-m-d");
			$search .= "AND (createdDate between '$dt 00:00' AND '$toDt 23:59') ";
		}
		if(!empty($_POST['txtTitle'])){
			$title = $_POST['txtTitle'];
			$search .= "AND title LIKE '%$title%' ";
		}
		if(!empty($_POST['txtLocation'])){
			$location = $_POST['txtLocation'];
			$search .= "AND location LIKE '%$location%' ";
		}
		if(!empty($_POST['txtCategory'])){
			$category = $_POST['txtCategory'];
			$search .= "AND category LIKE '%$category%' ";
		}

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET REMINDER
		$searchrem = new Table;
		$searchrem->setSQLType($fms_db->getSQLType());
		$searchrem->setInstance($fms_db->getInstance());
		$searchrem->setView("v_remindermaster");
		$searchrem->setParam("WHERE status > 0 $search ORDER BY createdDate DESC");
		$searchrem->doQuery("query");
		$row_searchrem = $searchrem->getLists();
		$num_searchrem = $searchrem->getNumRows();

		// CLOSING FMS DB
		$fms_db->DBClose();
	}

	// -- START SAVE NEW REMINDER --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$title = strtoupper($_POST['txtTitle']);
		$location = $_POST['txtLocation'];
		$category = $_POST['txtCategory'];
		$desc = $_POST['txtDescription'];
		$startDate = $_POST['txtStartDate'] . ' ' . date("h:i:s");
		$dueDate = $_POST['txtDueDate']  . ' ' . date("h:i:s");
		$fromDt = $_POST['txtFromDt'];
		$toDt = $_POST['txtToDt'];
		$newNum = getNewCtrlNo("reminder");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW REMINDER
		$ins_reminder = new Table;
		$ins_reminder->setSQLType($fms_db->getSQLType());
		$ins_reminder->setInstance($fms_db->getInstance());
		$ins_reminder->setTable("remindermaster");
		$ins_reminder->setField("reminderID,title,description,location,category,startDate,dueDate
							,reminderFromDt,reminderToDt
							,createdBy,createdDate");
		$ins_reminder->setValues("'$newNum','$title','$desc','$location','$category','$startDate','$dueDate'
							,'$fromDt','$toDt'
							,'$sys_UserID','$today'");
		$ins_reminder->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO REMINDER
		UpdateCtrlNo("reminder");

		$url = BASE_URL . V_REMINDERS;
		$msg = "New Reminder successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW REMINDER --

	// -- START DELETE REMINDER --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// DELETE REMINDER
		$del_rem = new Table;
		$del_rem->setSQLType($fms_db->getSQLType());
		$del_rem->setInstance($fms_db->getInstance());
		$del_rem->setTable("remindermaster");
		$del_rem->setParam("WHERE reminderID = '$id'");
		$del_rem->doQuery("delete");
		$res_del_rem = $del_rem->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_parts > 0){
			$msg .= "Sorry! There has been an error in deleting your Reminder. Please contact the Web Administrator.";
		}else{
			$msg .= "Reminder successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_REMINDERS);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE REMINDER --

	// -- START EDIT REMINDER --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET REMINDER
		$reminders = new Table;
		$reminders->setSQLType($fms_db->getSQLType());
		$reminders->setInstance($fms_db->getInstance());
		$reminders->setView("v_remindermaster");
		$reminders->setParam("WHERE reminderID = '$id'");
		$reminders->doQuery("query");
		$row_reminders = $reminders->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_reminders[0]['status'];
	}
	// -- END EDIT REMINDER --

	// -- START UPDATE REMINDER --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$title = strtoupper($_POST['txtTitle']);
		$location = $_POST['txtLocation'];
		$category = $_POST['txtCategory'];
		$desc = $_POST['txtDescription'];
		$startDate = $_POST['txtStartDate'] . ' ' . date("h:i:s");
		$dueDate = $_POST['txtDueDate']  . ' ' . date("h:i:s");
		$status = $_POST['txtStatus'];
		$fromDt = $_POST['txtFromDt'];
		$toDt = $_POST['txtToDt'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET REMINDER
		$parts = new Table;
		$parts->setSQLType($fms_db->getSQLType());
		$parts->setInstance($fms_db->getInstance());
		$parts->setTable("remindermaster");
		$parts->setValues("title = '$title', description = '$desc', location = '$location', category = '$category'
						, startDate = '$startDate', dueDate = '$dueDate'
						, reminderFromDt = '$fromDt', reminderToDt = '$toDt'
						, modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$parts->setParam("WHERE reminderID = '$id'");
		$parts->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_REMINDERS;
		$msg = "Reminder successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE REMINDER --
?>