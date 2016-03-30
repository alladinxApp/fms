<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET LOCATION
	$locationmst = new Table;
	$locationmst->setSQLType($fms_db->getSQLType());
	$locationmst->setInstance($fms_db->getInstance());
	$locationmst->setView("v_locationmaster");
	$locationmst->setParam("ORDER BY locationID");
	$locationmst->doQuery("query");
	$row_locationmst = $locationmst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>