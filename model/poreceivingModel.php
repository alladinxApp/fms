<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET PURCHASE ORDER
	$poreceivingmst = new Table;
	$poreceivingmst->setSQLType($fms_db->getSQLType());
	$poreceivingmst->setInstance($fms_db->getInstance());
	$poreceivingmst->setView("v_poreceiving");
	$poreceivingmst->setParam("WHERE status = '0' ORDER BY status ASC, poReferenceNo DESC, poTransactionDate DESC");
	$poreceivingmst->doQuery("query");
	$row_poreceivingmst = $poreceivingmst->getLists();
	
	// SET WORK ORDER
	$workordermst = new Table;
	$workordermst->setSQLType($fms_db->getSQLType());
	$workordermst->setInstance($fms_db->getInstance());
	$workordermst->setView("v_workordermaster");
	$workordermst->setParam("WHERE status NOT IN('5','6','7','8') ORDER BY status ASC, woReferenceNo DESC, woTransactionDate DESC");
	$workordermst->doQuery("query");
	$row_workordermst = $workordermst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>