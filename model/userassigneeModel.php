<?
	$id = $_GET['id'];

	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET USER ACCESS
	$userassignee = new Table;
	$userassignee->setSQLType($fms_db->getSQLType());
	$userassignee->setInstance($fms_db->getInstance());
	$userassignee->setView("v_userassigneemapper");
	$userassignee->setParam("WHERE userID = '$id'");
	$userassignee->doQuery("query");
	$row_userassignee = $userassignee->getLists();
	$num_userassignee = $userassignee->getNumRows();

	// SET USER ACCESS
	$assigneemst = new Table;
	$assigneemst->setSQLType($fms_db->getSQLType());
	$assigneemst->setInstance($fms_db->getInstance());
	$assigneemst->setView("v_assigneemaster");
	$assigneemst->setParam("WHERE assigneeID NOT IN(SELECT assigneeID FROM v_userassigneemapper)");
	$assigneemst->doQuery("query");
	$row_assigneemst = $assigneemst->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>