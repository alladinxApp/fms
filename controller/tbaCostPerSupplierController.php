<?
	$search = null;
	$rowData = "";
	$fromdt = null;
	$todt = null;

	if(isset($_POST['search']) && !empty($_POST['search']) && $_POST['search'] == 1){
		$fromdt = date("Y-m-d 00:00");
		$todt = date("Y-m-d 23:59");
		
		if(!empty($_POST['txtFromDt'])){
			$fromdt = dateFormat($_POST['txtFromDt'], "Y-m-d 00:00");
		}

		if(!empty($_POST['txtToDt'])){
			$todt = dateFormat($_POST['txtToDt'], "Y-m-d 23:59");
		}

		$total = 0;
		$totalPercentage = 0;

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET SUPPLIER
		$suppliermst = new Table;
		$suppliermst->setSQLType($fms_db->getSQLType());
		$suppliermst->setInstance($fms_db->getInstance());
		$suppliermst->setView("v_suppliermaster");
		$suppliermst->setParam("WHERE status = '1' ORDER BY supplierName");
		$suppliermst->doQuery("query");
		$row_suppliermst = $suppliermst->getLists();

		for($i=0;$i<count($row_suppliermst);$i++){
			$supplierID = $row_suppliermst[$i]['supplierID'];
			$supplierName = $row_suppliermst[$i]['supplierName'];

			$getTotalWO = new Table;
			$getTotalWO->setSQLType($fms_db->getSQLType());
			$getTotalWO->setInstance($fms_db->getInstance());
			$getTotalWO->setCol("SUM(parts) as totalCost");
			$getTotalWO->setView("v_workordermaster");
			$getTotalWO->setParam("WHERE supplierID = '$supplierID' AND status = '6' AND (invoiceDate between '$fromdt' AND '$todt')");
			$getTotalWO->doQuery("query");
			$row_getTotalWO = $getTotalWO->getLists();
			$totalCost = $row_getTotalWO[0]['totalCost'];

			$rowData1[] = array("supplierID" => $supplierID
								,"supplierName" => $supplierName
								,"totalCost" => $totalCost);

			$total += $totalCost;
		}

		for($i=0;$i<count($rowData1);$i++){
			$supplierID = $rowData1[$i]['supplierID'];
			$supplierName = $rowData1[$i]['supplierName'];
			$totalAmount = $rowData1[$i]['totalCost'];
			$percentage = (($totalAmount / $total) * 100);
			$totalPercentage += $percentage;

			// TOTAL TIRES
			$getTotalWOD = new Table;
			$getTotalWOD->setSQLType($fms_db->getSQLType());
			$getTotalWOD->setInstance($fms_db->getInstance());
			$getTotalWOD->setView("v_workordermaster 
				JOIN v_workorderdetail ON v_workorderdetail.woReferenceNo = v_workordermaster.woReferenceNo");
			$getTotalWOD->setParam("WHERE v_workordermaster.supplierID = '$supplierID' 
				AND v_workordermaster.status = '6' 
				AND (v_workordermaster.invoiceDate between '$fromdt' AND '$todt')");
			$getTotalWOD->doQuery("query");
			$row_getTotalWOD = $getTotalWOD->getLists();

			$totalTires = 0;
			$totalBatteries = 0;
			$totalWipers = 0;
			$totalMats = 0;
			$totalTints = 0;
			for($a=0;$a<count($row_getTotalWOD);$a++){
				switch($row_getTotalWOD[$a]['partsID']){
					case "PAR00000001": $totalTires += $row_getTotalWOD[$a]['total']; break; // TIRES
					case "PAR00000002": $totalBatteries += $row_getTotalWOD[$a]['total']; break; // BATTERIES
					case "PAR00000003": $totalWipers += $row_getTotalWOD[$a]['total']; break; // WIPERS
					case "PAR00000004": $totalMats += $row_getTotalWOD[$a]['total']; break; // MATS
					case "PAR00000005": $totalTints += $row_getTotalWOD[$a]['total']; break; // TINT
					default: break;
				}
			}

			$rowData2[] = array("supplierID" => $supplierID
								,"supplierName" => $supplierName
								,"totalAmount" => $totalAmount
								,"percentage" => $percentage
								,"totalTires" => $totalTires
								,"totalBatteries" => $totalBatteries
								,"totalWipers" => $totalWipers
								,"totalMats" => $totalMats
								,"totalTints" => $totalTints
								);
		}

		$rowData = $rowData2;

		// CLOSING FMS DB
		$fms_db->DBClose();
	}
?>