<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET ASSIGNEE
	$assigneemst = new Table;
	$assigneemst->setSQLType($fms_db->getSQLType());
	$assigneemst->setInstance($fms_db->getInstance());
	$assigneemst->setView("v_assigneemaster");
	$assigneemst->setParam("ORDER BY assigneeID");
	$assigneemst->doQuery("query");
	$row_assigneemst = $assigneemst->getLists();

	// SET LOCATION
	$locationmst = new Table;
	$locationmst->setSQLType($fms_db->getSQLType());
	$locationmst->setInstance($fms_db->getInstance());
	$locationmst->setView("v_locationmaster");
	$locationmst->setParam("WHERE status = '1' ORDER BY locationID");
	$locationmst->doQuery("query");
	$row_locationmst = $locationmst->getLists();

	// SET COMPANY
	$companymst = new Table;
	$companymst->setSQLType($fms_db->getSQLType());
	$companymst->setInstance($fms_db->getInstance());
	$companymst->setView("v_companymaster");
	$companymst->setParam("WHERE status = '1' ORDER BY companyID");
	$companymst->doQuery("query");
	$row_companymst = $companymst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>