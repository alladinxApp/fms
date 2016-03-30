<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET CONTROL NO
	$usermenu_access = new Table;
	$usermenu_access->setSQLType($fms_db->getSQLType());
	$usermenu_access->setInstance($fms_db->getInstance());
	$usermenu_access->setView("v_usermenu");
	$usermenu_access->setParam("WHERE userID = '$sys_UserID'");
	$usermenu_access->doQuery("query");
	$row_usermenu_access = $usermenu_access->getLists();

	// CLOSING FMS DB
	$fms_db->DBClose();
?>