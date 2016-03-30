<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET COMPANY
	$companymst = new Table;
	$companymst->setSQLType($fms_db->getSQLType());
	$companymst->setInstance($fms_db->getInstance());
	$companymst->setView("v_companymaster");
	$companymst->setParam("ORDER BY companyID");
	$companymst->doQuery("query");
	$row_companymst = $companymst->getLists();

	// CLOSING FMS DB
	$fms_db->DBClose();
?>