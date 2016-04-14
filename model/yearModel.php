<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET YEAR
	$yearmst = new Table;
	$yearmst->setSQLType($fms_db->getSQLType());
	$yearmst->setInstance($fms_db->getInstance());
	$yearmst->setView("v_yearmaster");
	$yearmst->setParam("ORDER BY yearID");
	$yearmst->doQuery("query");
	$row_yearmst = $yearmst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>