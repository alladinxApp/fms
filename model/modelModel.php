<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET MODEL
	$modelmst = new Table;
	$modelmst->setSQLType($fms_db->getSQLType());
	$modelmst->setInstance($fms_db->getInstance());
	$modelmst->setView("v_modelmaster");
	$modelmst->setParam("ORDER BY modelID");
	$modelmst->doQuery("query");
	$row_modelmst = $modelmst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>