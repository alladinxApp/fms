<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	if(isset($_GET['type']) && !empty($_GET['type'])){
		$type = $_GET['type'];
		$id = $_GET['id'];
		switch($type){
			case "e": 
					$where = "equipmentID = '$id'";

					// SET ASSIGNEE
					$assigneemst = new Table;
					$assigneemst->setSQLType($fms_db->getSQLType());
					$assigneemst->setInstance($fms_db->getInstance());
					$assigneemst->setView("v_assigneemaster");
					$assigneemst->setParam("ORDER BY assigneeID");
					$assigneemst->doQuery("query");
					$row_assigneemst = $assigneemst->getLists();
				break;
			case "a": 
					$where = "assigneeID = '$id'";

					// SET EQUIPMENT
					$equipmentmst = new Table;
					$equipmentmst->setSQLType($fms_db->getSQLType());
					$equipmentmst->setInstance($fms_db->getInstance());
					$equipmentmst->setView("v_equipmentmaster");
					$equipmentmst->setParam("ORDER BY equipmentID");
					$equipmentmst->doQuery("query");
					$row_equipmentmst = $equipmentmst->getLists();
				break;
			default: break;
		}
	}

	// SET ASSIGNEE
	$assigneeequipment = new Table;
	$assigneeequipment->setSQLType($fms_db->getSQLType());
	$assigneeequipment->setInstance($fms_db->getInstance());
	$assigneeequipment->setView("v_assigneeequipment");
	$assigneeequipment->setParam("WHERE $where ORDER BY isCurrent DESC,assignedStart DESC");
	$assigneeequipment->doQuery("query");
	$row_assigneeequipment = $assigneeequipment->getLists();

	// CLOSING FMS DB 
	$fms_db->DBClose();
?>