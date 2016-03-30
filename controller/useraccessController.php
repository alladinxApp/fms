<?
	if(isset($_GET['user_access_add']) && !empty($_GET['user_access_add']) && $_GET['user_access_add'] == '1'){
		$menuid = $_GET['menuid'];
		$userid = $_GET['userid'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW USER MENU
		$ins_assignee = new Table;
		$ins_assignee->setSQLType($fms_db->getSQLType());
		$ins_assignee->setInstance($fms_db->getInstance());
		$ins_assignee->setTable("usermenu");
		$ins_assignee->setField("userID,menuID,createdBy,createdDate");
		$ins_assignee->setValues("'$userid','$menuid','$sys_UserID','$today'");
		$ins_assignee->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_USERACCESS . "?id=" . $userid;
		$msg = "Menu was successfully added.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	if(isset($_GET['user_access_remove']) && !empty($_GET['user_access_remove']) && $_GET['user_access_remove'] == '1'){
		$menuid = $_GET['menuid'];
		$userid = $_GET['userid'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW USER MENU
		$del_assignee = new Table;
		$del_assignee->setSQLType($fms_db->getSQLType());
		$del_assignee->setInstance($fms_db->getInstance());
		$del_assignee->setTable("usermenu");
		$del_assignee->setParam("WHERE userID = '$userid' AND menuID = '$menuid'");
		$del_assignee->doQuery("delete");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_USERACCESS . "?id=" . $userid;
		$msg = "Menu was successfully removed.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
?>