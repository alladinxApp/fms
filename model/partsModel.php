<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET PARTS
	$partsmst = new Table;
	$partsmst->setSQLType($fms_db->getSQLType());
	$partsmst->setInstance($fms_db->getInstance());
	$partsmst->setView("v_partsmaster");
	$partsmst->setParam("ORDER BY partsID");
	$partsmst->doQuery("query");
	$row_partsmst = $partsmst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>