<?
	// SEARCH EQUIPMENT MASTER LIST
	$search = null;
	if(isset($_POST['search']) && !empty($_POST['search']) && $_POST['search'] == 1){
		$fromdt = date("Y-m-d 00:00");
		$todt = date("Y-m-d 23:59");
		$search = "";
		
		if(!empty($_POST['txtFromDt'])){
			$fromdt = dateFormat($_POST['txtFromDt'], "Y-m-d");
		}

		if(!empty($_POST['txtToDt'])){
			$todt = dateFormat($_POST['txtFromDt'], "Y-m-d");
		}
		
		if(!empty($_POST['txtIsWarranty'])){
			$isWarranty = $_POST['txtIsWarranty'];
			$search .= "AND isWarranty = '$isWarranty' ";
		}

		// if($search == null){
		// 	$dt = date("Y-m-d");
		// 	$search .= "AND (woTransactionDate between '$dt 00:00' AND '$dt 23:59') ";
		// }

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET WORK ORDER
		$searchwo = new Table;
		$searchwo->setSQLType($fms_db->getSQLType());
		$searchwo->setInstance($fms_db->getInstance());
		$searchwo->setView("v_workordermaster");
		$searchwo->setParam("WHERE 1 $search ORDER BY woReferenceNo DESC,woTransactionDate DESC");
		$searchwo->doQuery("query");
		$row_searchwo = $searchwo->getLists();
		$num_searchwo = $searchwo->getLists();
		
		// CLOSING FMS DB
		$fms_db->DBClose();
	}
	// END SEARCH EQUIPMENT MASTER LIST
?>