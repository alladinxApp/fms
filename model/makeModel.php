<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET MAKE
	$makemst = new Table;
	$makemst->setSQLType($fms_db->getSQLType());
	$makemst->setInstance($fms_db->getInstance());
	$makemst->setView("v_makemaster");
	$makemst->setParam("ORDER BY makeID");
	$makemst->doQuery("query");
	$row_makemst = $makemst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>