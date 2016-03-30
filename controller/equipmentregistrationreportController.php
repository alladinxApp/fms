<?
	if(isset($_POST['queryReport']) && !empty($_POST['queryReport']) && $_POST['queryReport'] == 1){
		$from = dateFormat($_POST['txtFromDt'],"Y-m-d");
		$to = dateFormat($_POST['txtToDt'],"Y-m-d");
		$plateNo = strtoupper($_POST['txtPlateNo']);
		$assignee = strtoupper($_POST['txtAssignee']);

		if(!empty($from) && !empty($to)){
			$dateRange = " AND registrationDate between '$from 00:00' AND '$to 23:59'";
		}

		if(!empty($plateNo)){
			$pNo = " AND plateNo LIKE '%$plateNo%'";
		}

		if(!empty($assignee)){
			$ass = " AND assigneeName LIKE '%$assignee%'";
		}

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET EQUIPMENT
		$equipmentmst = new Table;
		$equipmentmst->setSQLType($fms_db->getSQLType());
		$equipmentmst->setInstance($fms_db->getInstance());
		$equipmentmst->setView("v_equipmentmaster");
		$equipmentmst->setParam("WHERE 1 $dateRange $pNo $ass ORDER BY equipmentID");
		$equipmentmst->doQuery("query");
		$row_equipmentmst = $equipmentmst->getLists();
		$num_equipmentmst = $equipmentmst->getNumRows();
		
		// CLOSING FMS DB
		$fms_db->DBClose();
	}
?>