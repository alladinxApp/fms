<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET EQUIPMENT
	$equipmentmst = new Table;
	$equipmentmst->setSQLType($fms_db->getSQLType());
	$equipmentmst->setInstance($fms_db->getInstance());
	$equipmentmst->setView("v_equipmentmaster");
	$equipmentmst->setParam("ORDER BY equipmentID");
	$equipmentmst->doQuery("query");
	$row_equipmentmst = $equipmentmst->getLists();

	// SET ASSIGNEE
	$assigneemst = new Table;
	$assigneemst->setSQLType($fms_db->getSQLType());
	$assigneemst->setInstance($fms_db->getInstance());
	$assigneemst->setView("v_assigneemaster");
	$assigneemst->setParam("WHERE status = '1' ORDER BY assigneeName");
	$assigneemst->doQuery("query");
	$row_assigneemst = $assigneemst->getLists();

	// SET COMPANY
	$companymst = new Table;
	$companymst->setSQLType($fms_db->getSQLType());
	$companymst->setInstance($fms_db->getInstance());
	$companymst->setView("v_companymaster");
	$companymst->setParam("WHERE status = '1' ORDER BY companyName");
	$companymst->doQuery("query");
	$row_companymst = $companymst->getLists();

	// SET CATEGORY
	$categorymst = new Table;
	$categorymst->setSQLType($fms_db->getSQLType());
	$categorymst->setInstance($fms_db->getInstance());
	$categorymst->setView("v_categorymaster");
	$categorymst->setParam("WHERE status = '1' ORDER BY categoryName");
	$categorymst->doQuery("query");
	$row_categorymst = $categorymst->getLists();

	// SET MAKE
	$makemst = new Table;
	$makemst->setSQLType($fms_db->getSQLType());
	$makemst->setInstance($fms_db->getInstance());
	$makemst->setView("v_makemaster");
	$makemst->setParam("WHERE status = '1' ORDER BY makeName");
	$makemst->doQuery("query");
	$row_makemst = $makemst->getLists();

	// SET LOCATION
	$locationmst = new Table;
	$locationmst->setSQLType($fms_db->getSQLType());
	$locationmst->setInstance($fms_db->getInstance());
	$locationmst->setView("v_locationmaster");
	$locationmst->setParam("WHERE status = '1' ORDER BY locationName");
	$locationmst->doQuery("query");
	$row_locationmst = $locationmst->getLists();

	// SET MAKE
	$modelmst = new Table;
	$modelmst->setSQLType($fms_db->getSQLType());
	$modelmst->setInstance($fms_db->getInstance());
	$modelmst->setView("v_modelmaster");
	$modelmst->setParam("WHERE status = '1' ORDER BY modelID");
	$modelmst->doQuery("query");
	$row_modelmst = $modelmst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>