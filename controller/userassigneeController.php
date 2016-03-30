<?
	if(isset($_GET['user_assignee_add']) && !empty($_GET['user_assignee_add']) && $_GET['user_assignee_add'] == '1'){
		$assigneeid = $_GET['assigneeid'];
		$userid = $_GET['userid'];
		$newNum = getNewCtrlNo("user_assignee");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW USER MENU
		$ins_userassignee = new Table;
		$ins_userassignee->setSQLType($fms_db->getSQLType());
		$ins_userassignee->setInstance($fms_db->getInstance());
		$ins_userassignee->setTable("assigneemapper");
		$ins_userassignee->setField("id,userID,assigneeID,type,createdBy,createdDate");
		$ins_userassignee->setValues("'$newNum','$userid','$assigneeid','user_assignee','$sys_UserID','$today'");
		$ins_userassignee->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO USER ASSIGNEE
		UpdateCtrlNo("user_assignee");

		$url = BASE_URL . V_USERASSIGNEE . "?id=" . $userid;
		$msg = "User Assignee was successfully tagged.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	if(isset($_GET['user_assignee_remove']) && !empty($_GET['user_assignee_remove']) && $_GET['user_assignee_remove'] == '1'){
		$assigneeid = $_GET['assigneeid'];
		$userid = $_GET['userid'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW USER MENU
		$ins_assignee = new Table;
		$ins_assignee->setSQLType($fms_db->getSQLType());
		$ins_assignee->setInstance($fms_db->getInstance());
		$ins_assignee->setTable("assigneemapper");
		$ins_assignee->setParam("WHERE userID = '$userid' AND assigneeID = '$assigneeid' AND type = 'user_assignee'");
		$ins_assignee->doQuery("delete");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_USERASSIGNEE . "?id=" . $userid;
		$msg = "User Assignee was successfully untagged.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
?>