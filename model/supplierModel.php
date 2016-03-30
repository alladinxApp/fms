<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET SUPPLIER
	$suppliermst = new Table;
	$suppliermst->setSQLType($fms_db->getSQLType());
	$suppliermst->setInstance($fms_db->getInstance());
	$suppliermst->setView("v_suppliermaster");
	$suppliermst->setParam("ORDER BY supplierID");
	$suppliermst->doQuery("query");
	$row_suppliermst = $suppliermst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>