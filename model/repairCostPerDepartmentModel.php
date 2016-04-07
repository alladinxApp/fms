<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET DEPARTMENT
	$departmentmst = new Table;
	$departmentmst->setSQLType($fms_db->getSQLType());
	$departmentmst->setInstance($fms_db->getInstance());
	$departmentmst->setView("v_departmentmaster");
	$departmentmst->setParam("ORDER BY departmentID");
	$departmentmst->doQuery("query");
	$row_departmentmst = $departmentmst->getLists();
	
	// CLOSING FMS DB 
	$fms_db->DBClose();
?>