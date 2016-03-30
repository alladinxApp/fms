<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET CATEGORY
	$categorymst = new Table;
	$categorymst->setSQLType($fms_db->getSQLType());
	$categorymst->setInstance($fms_db->getInstance());
	$categorymst->setView("v_categorymaster");
	$categorymst->setParam("ORDER BY categoryID");
	$categorymst->doQuery("query");
	$row_categorymst = $categorymst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>