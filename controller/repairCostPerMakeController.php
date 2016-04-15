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

		// SET YEAR
		$yearmst = new Table;
		$yearmst->setSQLType($fms_db->getSQLType());
		$yearmst->setInstance($fms_db->getInstance());
		$yearmst->setView("v_yearmaster");
		$yearmst->setParam("WHERE status = '1' ORDER BY description");
		$yearmst->doQuery("query");
		$row_yearmst = $yearmst->getLists();

		// SET MAKE
		$makemst = new Table;
		$makemst->setSQLType($fms_db->getSQLType());
		$makemst->setInstance($fms_db->getInstance());
		$makemst->setView("v_makemaster");
		$makemst->setParam("WHERE status = '1' ORDER BY makeName");
		$makemst->doQuery("query");
		$row_makemst = $makemst->getLists();

		// SET MODEL
		$modelmst = new Table;
		$modelmst->setSQLType($fms_db->getSQLType());
		$modelmst->setInstance($fms_db->getInstance());
		$modelmst->setView("v_modelmaster");
		$modelmst->setParam("WHERE status = '1' ORDER BY description");
		$modelmst->doQuery("query");
		$row_modelmst = $modelmst->getLists();

		// SET EQUIPMENT
		$equipmentmst = new Table;
		$equipmentmst->setSQLType($fms_db->getSQLType());
		$equipmentmst->setInstance($fms_db->getInstance());
		$equipmentmst->setView("v_equipmentmaster");
		$equipmentmst->setParam("WHERE status = '1' ORDER BY equipmentID");
		$equipmentmst->doQuery("query");
		$row_equipmentmst = $equipmentmst->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		// LOOP MAKE
		for($b=0;$b<count($row_makemst);$b++){
			$makeID = $row_makemst[$b]['makeID'];
			$makeName = $row_makemst[$b]['makeName'];
			$equipments = array();
			$t_total = 0;
			$t_average = 0;
			$t_totalParts = 0;
			$t_totalMisc = 0;
			$t_totalOth = 0;
			$noOfVehicles = 0;

			// LOOP YEAR
			for($a=0;$a<count($row_yearmst);$a++){
				$yearID = $row_yearmst[$a]['yearID'];
				$yearDesc = $row_yearmst[$a]['description'];			

				// LOOP MODEL
				for($c=0;$c<count($row_modelmst);$c++){
					$modelID = $row_modelmst[$c]['modelID'];
					$modelDesc = $row_modelmst[$c]['description'];
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
						$woYearID = $row_womst[$z]['yearID'];
						$woMakeID = $row_womst[$z]['makeID'];
						$woModelID = $row_womst[$z]['modelID'];
						$totalCost = $row_womst[$z]['totalCost'];
						$parts = $row_womst[$z]['parts'];
						$miscellaneous = $row_womst[$z]['miscellaneous'];
						$labor = $row_womst[$z]['labor'];
						$tax = $row_womst[$z]['tax'];
						$discount = $row_womst[$z]['discount'];
						$serviceTypeID = $row_womst[$z]['serviceTypeID'];

						// IF YEAR,MAKE,MODEL EXISTS ON WOMST
						if($yearID == $woYearID && $makeID == $woMakeID && $modelID == $woModelID){
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

						$equipments[] = array("eYearID" => $yearID
											,"eYearDesc" => $yearDesc
											,"eMakeID" => $makeID
											,"eMakeName" => $makeName
											,"eModelID" => $modelID
											,"eModelDesc" => $modelDesc
											,"eVehicles" => $eCnt
											,"total" => $total
											,"average" => $average
											,"parts" => $totalParts
											,"miscellaneous" => $totalMisc
											,"labor" => $totalLabor
											,"PMS" => $totalPMS
											,"AC" => $totalAC
											,"elec" => $totalElec
											,"mech" => $totalMech
											,"body" => $totalBody
											,"detailing" => $totalDetailing
											,"RP" => $totalRP
											,"others" => $totalOth);

						// COUNT NO OF VEHICLES
						$noOfVehicles += $eCnt;
					}
				}
				// END MODEL
			}
			// END YEAR

			if(count($equipments) > 0){
				$rowData1[] = array("makeID" => $makeID
								,"makeName" => $makeName
								,"equipments" => $equipments
								,"noOfVehicles" => $noOfVehicles
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
		}
		// END MAKE
		
		$rowData = $rowData1;
	}
	// END SEARCH REPAIR COST PER MAKE
?>