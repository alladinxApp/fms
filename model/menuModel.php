<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET CONTROL NO
	$menumst = new Table;
	$menumst->setSQLType($fms_db->getSQLType());
	$menumst->setInstance($fms_db->getInstance());
	$menumst->setView("v_menumaster");
	$menumst->setParam("ORDER BY menuID");
	$menumst->doQuery("query");
	$row_menumst = $menumst->getLists();

	// CLOSING FMS DB
	$fms_db->DBClose();
?>