<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET SERVICE TYPE
	$servicetypemst = new Table;
	$servicetypemst->setSQLType($fms_db->getSQLType());
	$servicetypemst->setInstance($fms_db->getInstance());
	$servicetypemst->setView("v_servicetypemaster");
	$servicetypemst->setParam("ORDER BY serviceTypeID");
	$servicetypemst->doQuery("query");
	$row_servicetypemst = $servicetypemst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>