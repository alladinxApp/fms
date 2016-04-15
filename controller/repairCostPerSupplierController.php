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

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET WOMST
		$womst = new Table;
		$womst->setSQLType($fms_db->getSQLType());
		$womst->setInstance($fms_db->getInstance());
		$womst->setView("v_workordermaster");
		$womst->setParam("WHERE status = '6' AND (invoiceDate BETWEEN '$fromdt' AND '$todt') ORDER BY departmentName");
		$womst->doQuery("query");
		$row_womst = $womst->getLists();

		// SET SUPPLIER
		$suppliermst = new Table;
		$suppliermst->setSQLType($fms_db->getSQLType());
		$suppliermst->setInstance($fms_db->getInstance());
		$suppliermst->setView("v_suppliermaster");
		$suppliermst->setParam("WHERE status = '1' ORDER BY supplierName");
		$suppliermst->doQuery("query");
		$row_suppliermst = $suppliermst->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$t_total = 0;
		$t_average = 0;
		$t_totalParts = 0;
		$t_totalMisc = 0;
		$t_totalOth = 0;

		// LOOP SUPPLIER
		for($b=0;$b<count($row_suppliermst);$b++){
			$supplierID = $row_suppliermst[$b]['supplierID'];
			$supplierName = $row_suppliermst[$b]['supplierName'];
			$eCnt = 0;

			$total = 0;
			$totalParts = 0;
			$totalMisc = 0;
			$totalLabor = 0;
			$totalPMS = 0;
			$totalAC = 0;
			$totalElec = 0;
			$totalMech = 0;
			$totalBody = 0;
			$totalDetailing = 0;
			$totalRP = 0;
			$totalOth = 0;

			// LOOP WORK ORDER MASTER
			for($z=0;$z<count($row_womst);$z++){
				$woRefNoMst = $row_womst[$z]['woReferenceNo'];
				$woSupplierID = $row_womst[$z]['supplierID'];
				$totalCost = $row_womst[$z]['totalCost'];
				$parts = $row_womst[$z]['parts'];
				$miscellaneous = $row_womst[$z]['miscellaneous'];
				$labor = $row_womst[$z]['labor'];
				$tax = $row_womst[$z]['tax'];
				$discount = $row_womst[$z]['discount'];
				$serviceTypeID = $row_womst[$z]['serviceTypeID'];

				// IF YEAR,MAKE,MODEL EXISTS ON WOMST
				if($supplierID == $woSupplierID){
					$eCnt++;
					$total += $totalCost;
					$totalParts += $parts;
					$totalMisc += $miscellaneous;
					$totalLabor += (($labor + $tax) - $discount);

					// COUNT TOTAL OF EACH SERVICE TYPE
					switch($serviceTypeID){
						case "ST002": $totalPMS += $totalCost; break;
						case "ST003": $totalAC += $totalCost; break;
						case "ST004": $totalElec += $totalCost; break;
						case "ST005": $totalMech += $totalCost; break;
						case "ST006": $totalBody += $totalCost; break;
						case "ST007": $totalDetailing += $totalCost; break;
						case "ST008": $totalRP += $totalCost; break;
						case "ST009": $totalOth += $totalCost; break;
					}
				}
			}
			// END WORK ORDER MST

			if($eCnt > 0){
				$average = ($total / $eCnt);
				$t_total += $total;
				$t_average += $average;
				$t_totalParts += $totalParts;
				$t_totalMisc += $totalMisc;
				$t_totalLabor += $totalLabor;
				$t_totalPMS += $totalPMS;
				$t_totalAC += $totalAC;
				$t_totalElec += $totalElec;
				$t_totalMech += $totalMech;
				$t_totalBody += $totalBody;
				$t_totalDetailing += $totalDetailing;
				$t_totalRP += $totalRP;
				$t_totalOth += $totalOth;

				$rowData1[] = array("supplierID" => $supplierID
								,"supplierName" => $supplierName
								,"total" => $t_total
								,"average" => $t_average
								,"parts" => $t_totalParts
								,"miscellaneous" => $t_totalMisc
								,"labor" => $t_totalLabor
								,"PMS" => $t_totalPMS
								,"AC" => $t_totalAC
								,"elec" => $t_totalElec
								,"mech" => $t_totalMech
								,"body" => $t_totalBody
								,"detailing" => $t_totalDetailing
								,"RP" => $t_totalRP
								,"others" => $t_totalOth);
			}
			
			// OVERALL TOTAL
			$gTotal += $t_total;
		}
		// END SUPPLIER
		
		$rowData = $rowData1;
	}
	// END SEARCH REPAIR COST PER SUPPLIER
?>