<?
	$id = $_GET['id'];

	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET USER ACCESS
	$usermenu = new Table;
	$usermenu->setSQLType($fms_db->getSQLType());
	$usermenu->setInstance($fms_db->getInstance());
	$usermenu->setView("v_usermenu");
	$usermenu->setParam("WHERE userID = '$id'");
	$usermenu->doQuery("query");
	$row_usermenu = $usermenu->getLists();

	// SET USER ACCESS
	$menumst = new Table;
	$menumst->setSQLType($fms_db->getSQLType());
	$menumst->setInstance($fms_db->getInstance());
	$menumst->setView("v_menumaster");
	$menumst->setParam("WHERE status = '1' AND menuID NOT IN(SELECT menuID FROM v_usermenu WHERE userID = '$id')");
	$menumst->doQuery("query");
	$row_menumst = $menumst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>