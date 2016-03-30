<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET REMINDERS
	$remindersmst = new Table;
	$remindersmst->setSQLType($fms_db->getSQLType());
	$remindersmst->setInstance($fms_db->getInstance());
	$remindersmst->setView("v_remindermaster");
	$remindersmst->setParam("WHERE status = '0' ORDER BY reminderID");
	$remindersmst->doQuery("query");
	$row_remindersmst = $remindersmst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>