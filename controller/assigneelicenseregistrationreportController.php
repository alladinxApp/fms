<?
	if(isset($_POST['queryReport']) && !empty($_POST['queryReport']) && $_POST['queryReport'] == 1){
		$from = dateFormat($_POST['txtFromDt'],"Y-m-d");
		$to = dateFormat($_POST['txtToDt'],"Y-m-d");
		$assignee = strtoupper($_POST['txtAssignee']);

		if(!empty($from) && !empty($to)){
			$dateRange = " AND licenseRegistrationDate between '$from 00:00' AND '$to 23:59'";
		}

		if(!empty($assignee)){
			$ass = " AND assigneeName LIKE '%$assignee%'";
		}

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET ASSIGNEE
		$assigneemst = new Table;
		$assigneemst->setSQLType($fms_db->getSQLType());
		$assigneemst->setInstance($fms_db->getInstance());
		$assigneemst->setView("v_assigneemaster");
		$assigneemst->setParam("WHERE 1 $dateRange $ass ORDER BY assigneeID");
		$assigneemst->doQuery("query");
		$row_assigneemst = $assigneemst->getLists();
		$num_assigneemst = $assigneemst->getNumRows();
		
		// CLOSING FMS DB
		$fms_db->DBClose();
	}
?>