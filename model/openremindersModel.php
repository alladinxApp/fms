<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET REMINDERS
	$openremindersmst = new Table;
	$openremindersmst->setSQLType($fms_db->getSQLType());
	$openremindersmst->setInstance($fms_db->getInstance());
	$openremindersmst->setView("v_remindermaster");
	$openremindersmst->setParam("WHERE status > '0' ORDER BY reminderID LIMIT 0,10");
	$openremindersmst->doQuery("query");
	$row_openremindersmst = $openremindersmst->getLists();
	$num_openremindersmst = $openremindersmst->getNumRows();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>