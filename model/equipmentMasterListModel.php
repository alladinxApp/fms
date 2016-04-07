<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET ASSIGNEE
	$assigneemst = new Table;
	$assigneemst->setSQLType($fms_db->getSQLType());
	$assigneemst->setInstance($fms_db->getInstance());
	$assigneemst->setView("v_assigneemaster");
	$assigneemst->setParam("WHERE status = '1' ORDER BY assigneeID");
	$assigneemst->doQuery("query");
	$row_assigneemst = $assigneemst->getLists();

	// SET EQUIPMENT
	$equipmentmst = new Table;
	$equipmentmst->setSQLType($fms_db->getSQLType());
	$equipmentmst->setInstance($fms_db->getInstance());
	$equipmentmst->setView("v_equipmentmaster");
	$equipmentmst->setParam("WHERE status = '1' ORDER BY equipmentID");
	$equipmentmst->doQuery("query");
	$row_equipmentmst = $equipmentmst->getLists();

	// SET DEPARTMENT
	$departmentmst = new Table;
	$departmentmst->setSQLType($fms_db->getSQLType());
	$departmentmst->setInstance($fms_db->getInstance());
	$departmentmst->setView("v_departmentmaster");
	$departmentmst->setParam("WHERE status = '1' ORDER BY departmentID");
	$departmentmst->doQuery("query");
	$row_departmentmst = $departmentmst->getLists();
	
	// CLOSING FMS DB 
	$fms_db->DBClose();
?>