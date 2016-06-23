<?
	require_once("inc/global.php"); 
    require_once(MODEL_PATH . SESSION_MODEL);

	if(isset($_POST['exportReport']) && !empty($_POST['exportReport'])){
		$report = $_POST['exportReport'];
		$from = dateFormat($_POST['txtFromDt'],"Y-m-d");
		$to = dateFormat($_POST['txtToDt'],"Y-m-d");
		$dt = date("Ymdhis");
		$ln = null;
		$where = null;

		switch($report){
			// EQUIPMENT REGISTRATION REPORT
			case "equipmentregistration":
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
					$row = $equipmentmst->getLists();
					
					// CLOSING FMS DB
					$fms_db->DBClose();

					$ln .= "EQUIPMENT REGISTRATION REPORT\r\n\r\n";
					
					if(!empty($from) && !empty($to)){
						$ln .= "Registration Date: \r\n";
						$ln .= "From: ," . $from . "\r\n";
						$ln .= "To: ," . $to . "\r\n";
					}

					if(!empty($plateNo)){
						$ln .= "Plate No: ," . $plateNo . "\r\n";
					}else{
						$ln .= "Plate No: ,ALL\r\n";
					}
					
					if(!empty($assignee)){
						$ln .= "Assignee: ," . $assignee . "\r\n";
					}else{
						$ln .= "Assignee Type: ,ALL\r\n";
					}

					$ln .= "\r\nPlate No,Assignee,Company,Location,Category,Make,Model,Year,Color,Insurance Applied Date,Insurance Expiry Date,Registration Date,Registration Expiry Date,Engine No,Chassis No,Serial No\r\n";

					for($i=0;$i<count($row);$i++){
						$ln .= $row[$i]['plateNo'] . "," . $row[$i]['assigneeName'] . "," . $row[$i]['companyName']
							. "," . $row[$i]['locationName'] . "," . $row[$i]['categoryName'] . "," . $row[$i]['makeName']
							. "," . $row[$i]['modelName'] . "," . $row[$i]['year'] . "," . $row[$i]['color']
							. "," . dateFormat($row[$i]['insuranceAppliedDate'],"F d Y")
							. "," . dateFormat($row[$i]['insuranceExpirationDate'],"F d Y")
							. "," . dateFormat($row[$i]['registrationDate'],"F d Y")
							. "," . dateFormat($row[$i]['registrationExpiryDate'],"F d Y")
							. "," . $row[$i]['engineNo'] . "," . $row[$i]['chassisNo'] . "," . $row[$i]['serialNo'] . "\r\n";
					}

					$data = trim($ln);
					$filename = "equipment_registration_report_" . $dt . ".csv";
				break;
			// ASSIGNEE LICENSE REGISTRATION REPORT
			case "assigneelicenseregistration":
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
					$row = $assigneemst->getLists();
					
					// CLOSING FMS DB
					$fms_db->DBClose();

					$ln .= "ASSIGNEE LICENSE REGISTRATION REPORT\r\n\r\n";
					
					if(!empty($from) && !empty($to)){
						$ln .= "License Registration Date: \r\n";
						$ln .= "From: ," . $from . "\r\n";
						$ln .= "To: ," . $to . "\r\n";
					}
					
					if(!empty($assignee)){
						$ln .= "Assignee: ," . $assignee . "\r\n";
					}else{
						$ln .= "Assignee Type: ,ALL\r\n";
					}

					$ln .= "\r\nAssignee,Department,License Number,Place Issued,Registration Date,Registration Expiry Date\r\n";

					for($i=0;$i<count($row);$i++){
						$ln .= $row[$i]['assigneeName'] . "," . $row[$i]['department'] . "," . $row[$i]['licenseNo'] . "," . $row[$i]['licenseAddress']
						. "," . dateFormat($row[$i]['licenseRegistrationDate'],"F d Y") . "," . dateFormat($row[$i]['expirationDate'],"F d Y") . "\r\n";
					}

					$data = trim($ln);
					$filename = "assignee_license_registration_report_" . $dt . ".csv";
				break;
			case "equipmenthistory":
					$id = $_POST['txtAssignee'];
					$where = "assigneeID = '$id'";

					// SET FMS DB
					$fms_db = new DBConfig;
					$fms_db->setFleetDB();

					// SET ASSIGNEE
					$assigneeequipment = new Table;
					$assigneeequipment->setSQLType($fms_db->getSQLType());
					$assigneeequipment->setInstance($fms_db->getInstance());
					$assigneeequipment->setView("v_assigneeequipment");
					$assigneeequipment->setParam("WHERE $where ORDER BY isCurrent DESC,assignedStart DESC");
					$assigneeequipment->doQuery("query");
					$row = $assigneeequipment->getLists();
					
					// CLOSING FMS DB
					$fms_db->DBClose();

					$assignee = $row[0]['assigneeName'];

					$ln .= "EQUIPMENT HISTORY REPORT\r\n\r\n";

					$ln .= "Assignee: ," . $assignee . "\r\n";

					$ln .= "\r\nPlate No, Make, Model, Year, Location, Current, Assigned Start, Assigned End\r\n";

					for($i=0;$i<count($row);$i++){
						$ln .= $row[$i]['plateNo'] . "," . $row[$i]['makeName'] . "," . $row[$i]['modelName']
						. "," . $row[$i]['year'] . "," . $row[$i]['elocationName']. "," . $row[$i]['isCurrentDesc']
						. "," . dateFormat($row[$i]['assignedStart'],"F d Y") . "," . dateFormat($row[$i]['assignedEnd'],"F d Y") . "\r\n";
					}

					$data = trim($ln);
					$filename = "equipment_history_report(" . $id . ")_" . $dt . ".csv";
				break;
			case "assigneehistory":
					$id = $_POST['txtEquipment'];
					$where = "equipmentID = '$id'";

					// SET FMS DB
					$fms_db = new DBConfig;
					$fms_db->setFleetDB();

					// SET ASSIGNEE
					$assigneeequipment = new Table;
					$assigneeequipment->setSQLType($fms_db->getSQLType());
					$assigneeequipment->setInstance($fms_db->getInstance());
					$assigneeequipment->setView("v_assigneeequipment");
					$assigneeequipment->setParam("WHERE $where ORDER BY isCurrent DESC,assignedStart DESC");
					$assigneeequipment->doQuery("query");
					$row = $assigneeequipment->getLists();
					
					// CLOSING FMS DB
					$fms_db->DBClose();

					$plateNo = $row[0]['plateNo'];

					$ln .= "ASSIGNEE HISTORY REPORT\r\n\r\n";

					$ln .= "Plate No: ," . $plateNo . "\r\n";

					$ln .= "\r\nAssignee,Company,Department,Location,Current,Assigned Start,Assigned End\r\n";

					for($i=0;$i<count($row);$i++){
						$ln .= $row[$i]['assigneeName'] . "," . $row[$i]['companyName'] . "," . $row[$i]['department']
						. "," . $row[$i]['alocationName'] . "," . $row[$i]['isCurrentDesc']
						. "," . dateFormat($row[$i]['assignedStart'],"F d Y") . "," . dateFormat($row[$i]['assignedEnd'],"F d Y") . "\r\n";
					}

					$data = trim($ln);
					$filename = "assignee_history_report(" . $id . ")_" . $dt . ".csv";
				break;
			case "tbacostpersupplier":
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

					$row = $rowData2;

					$ln .= "TBA COST PER SUPPLIER REPORT\r\n\r\n";

					$ln .= "From: ," . $fromdt . "\r\n";
					$ln .= "To: ," . $todt . "\r\n";

					$ln .= "\r\n#,Supplier,Total(%),Tires,Batteries,Wipers,Mapts,Tint\r\n";

					$cnt = 1;
					for($i=0;$i<count($row);$i++){
						$totalAmount = $row[$i]['totalAmount'];
                        $totalTires = $row[$i]['totalTires'];
                        $totalBatteries = $row[$i]['totalBatteries'];
                        $totalWipers = $row[$i]['totalWipers'];
                        $totalMats = $row[$i]['totalMats'];
                        $totalTints = $row[$i]['totalTints'];

                        $t_totalAmount += $totalAmount;
                        $t_totalTires += $totalTires;
                        $t_totalBatteries += $totalBatteries;
                        $t_totalWipers += $totalWipers;
                        $t_totalMats += $totalMats;
                        $t_totalTints += $totalTints;

						$ln .= $cnt 
							. "," . $row[$i]['supplierName']
							. "," . $totalAmount . ' (' . $row[$i]['percentage'] . '%)'
							. "," . $totalTires
							. "," . $totalBatteries
							. "," . $totalWipers
							. "," . $totalMats
							. "," . $totalTints
							. "\r\n";

						$cnt++;
					}

					$noOfSuppliers = ($cnt - 1);

					$perTires = (($t_totalTires / $t_totalAmount) * 100);
                    $perBatteries = (($t_totalBatteries / $t_totalAmount) * 100);
                    $perWipers = (($t_totalWipers / $t_totalAmount) * 100);
                    $perMats = (($t_totalMats / $t_totalAmount) * 100);
                    $perTints = (($t_totalTints / $t_totalAmount) * 100);

                    $ln .= ",No. Of Suppliers: " . $noOfSuppliers
						. "," . $t_totalAmount
						. "," . $t_totalTires
						. "," . $t_totalBatteries
						. "," . $t_totalWipers
						. "," . $t_totalMats
						. "," . $t_totalTints
						. "\r\n";

					$ln .= ",,," . $perTires . "%"
						. "," . $perBatteries . "%"
						. "," . $perWipers . "%"
						. "," . $perMats . "%"
						. "," . $perTints . "%"
						. "\r\n";

					$data = trim($ln);
					$filename = "tba_cost_per_supplier_" . $dt . ".csv";
				break;
			case "repaircostperdepartment":
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

					// SET DEPARTMENT
					$deptmst = new Table;
					$deptmst->setSQLType($fms_db->getSQLType());
					$deptmst->setInstance($fms_db->getInstance());
					$deptmst->setView("v_departmentmaster");
					$deptmst->setParam("WHERE status = '1' ORDER BY departmentName");
					$deptmst->doQuery("query");
					$row_deptmst = $deptmst->getLists();

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

					// LOOP DEPARTMENT
					for($i=0;$i<count($row_deptmst);$i++){
						$deptID = $row_deptmst[$i]['departmentID'];
						$deptName = $row_deptmst[$i]['departmentName'];
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

							// LOOP MAKE
							for($b=0;$b<count($row_makemst);$b++){
								$makeID = $row_makemst[$b]['makeID'];
								$makeName = $row_makemst[$b]['makeName'];

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
										$woDeptID = $row_womst[$z]['department'];
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

										// IF DEPT,YEAR,MAKE,MODEL EXISTS ON WOMST
										if($deptID == $woDeptID && $yearID == $woYearID && $makeID == $woMakeID && $modelID == $woModelID){
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
							// END MAKE
						}
						// END YEAR

						if(count($equipments) > 0){
							$rowData1[] = array("departmentID" => $deptID
											,"departmentName" => $deptName
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
					// END DEPARTMENT
					
					$row = $rowData1;

					$ln .= "REPAIR COST PER DEPARTMENT REPORT\r\n\r\n";

					$ln .= "From: ," . dateFormat($fromdt,"m/d/Y") . "\r\n";
					$ln .= "To: ," . dateFormat($todt,"m/d/Y") . "\r\n";

					$ln .= "\r\nYear | Make | Model,,Total (Average),Parts,Oil/Lubricants,Others,Sevice Type\r\n";
					$ln .= ",,,,,,PMS,A/C,Elec,Mech,Boyd,Detailing,RP,Others\r\n";

					$cnt = 1;
					for($i=0;$i<count($row);$i++){
						$ln .= $row[$i]['departmentName'] . "\r\n";

						$equipments = $row[$i]['equipments'];
						for($a=0;$a<count($equipments);$a++){
							$ln .= $cnt . ".) " . $equipments[$a]['eYearDesc']
								. " " . $equipments[$a]['eMakeName']
								. " " . $equipments[$a]['eModelDesc']
								. "," . $equipments[$a]['eVehicles']
								. "," . $equipments[$a]['total'] . " (" . $equipments[$a]['average'] . ") "
								. "," . $equipments[$a]['parts']
								. "," . $equipments[$a]['miscellaneous']
								. "," . $equipments[$a]['labor']
								. "," . $equipments[$a]['PMS']
								. "," . $equipments[$a]['AC']
								. "," . $equipments[$a]['elec']
								. "," . $equipments[$a]['mech']
								. "," . $equipments[$a]['body']
								. "," . $equipments[$a]['detailing']
								. "," . $equipments[$a]['RP']
								. "," . $equipments[$a]['others']
								. "\r\n";

							$cnt++;
						}

						$ln .= "Total >>>>>"
							. "," . $row[$i]['noOfVehicles']
							. "," . $row[$i]['total'] . " (" . $row[$i]['average'] . ") "
							. "," . $row[$i]['parts']
							. "," . $row[$i]['miscellaneous']
							. "," . $row[$i]['labor']
							. "," . $row[$i]['PMS']
							. "," . $row[$i]['AC']
							. "," . $row[$i]['elec']
							. "," . $row[$i]['mech']
							. "," . $row[$i]['body']
							. "," . $row[$i]['detailing']
							. "," . $row[$i]['RP']
							. "," . $row[$i]['others']
							. "\r\n";
					}

					$data = trim($ln);
					$filename = "repair_cost_per_department_" . $dt . ".csv";
				break;
			case "repaircostpermake":
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
					
					$row = $rowData1;

					$ln .= "REPAIR COST PER MAKE REPORT\r\n\r\n";

					$ln .= "From: ," . dateFormat($fromdt,"m/d/Y") . "\r\n";
					$ln .= "To: ," . dateFormat($todt,"m/d/Y") . "\r\n";

					$ln .= "\r\nYear | Make | Model,,Total (Average),Parts,Oil/Lubricants,Others,Sevice Type\r\n";
					$ln .= ",,,,,,PMS,A/C,Elec,Mech,Boyd,Detailing,RP,Others\r\n";

					$cnt = 1;
					for($i=0;$i<count($row);$i++){
						$ln .= $row[$i]['makeName'] . "\r\n";

						$equipments = $row[$i]['equipments'];
						for($a=0;$a<count($equipments);$a++){
							$ln .= $cnt . ".) " . $equipments[$a]['eYearDesc']
								. " " . $equipments[$a]['eMakeName']
								. " " . $equipments[$a]['eModelDesc']
								. "," . $equipments[$a]['eVehicles']
								. "," . $equipments[$a]['total'] . " (" . $equipments[$a]['average'] . ") "
								. "," . $equipments[$a]['parts']
								. "," . $equipments[$a]['miscellaneous']
								. "," . $equipments[$a]['labor']
								. "," . $equipments[$a]['PMS']
								. "," . $equipments[$a]['AC']
								. "," . $equipments[$a]['elec']
								. "," . $equipments[$a]['mech']
								. "," . $equipments[$a]['body']
								. "," . $equipments[$a]['detailing']
								. "," . $equipments[$a]['RP']
								. "," . $equipments[$a]['others']
								. "\r\n";

							$cnt++;
						}

						$ln .= "Total >>>>>"
							. "," . $row[$i]['noOfVehicles']
							. "," . $row[$i]['total'] . " (" . $row[$i]['average'] . ") "
							. "," . $row[$i]['parts']
							. "," . $row[$i]['miscellaneous']
							. "," . $row[$i]['labor']
							. "," . $row[$i]['PMS']
							. "," . $row[$i]['AC']
							. "," . $row[$i]['elec']
							. "," . $row[$i]['mech']
							. "," . $row[$i]['body']
							. "," . $row[$i]['detailing']
							. "," . $row[$i]['RP']
							. "," . $row[$i]['others']
							. "\r\n";
					}

					$data = trim($ln);
					$filename = "tba_cost_per_make_" . $dt . ".csv";
				break;
			case "repaircostpersupplier":
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
					
					$row = $rowData1;

					$ln .= "REPAIR COST PER SUPPLIER REPORT\r\n\r\n";

					$ln .= "From: ," . dateFormat($fromdt,"m/d/Y") . "\r\n";
					$ln .= "To: ," . dateFormat($todt,"m/d/Y") . "\r\n";

					$ln .= "\r\nSupplier,Total (Average),Parts,Oil/Lubricants,Others,Sevice Type\r\n";
					$ln .= ",,,,,PMS,A/C,Elec,Mech,Body,Detailing,RP,Others\r\n";

					$cnt = 1; 
                    $grandTotal = 0;
                    $t_services = 0;
                    $t_parts = 0;
                    $t_misc = 0;
                    $t_labor = 0;
                    $t_pms = 0;
                    $t_ac = 0;
                    $t_elec = 0;
                    $t_mech = 0;
                    $t_body = 0;
                    $t_detailing = 0;
                    $t_rp = 0;
                    $t_others = 0;
					for($i=0;$i<count($row);$i++){
						$grandTotal += $row[$i]['total'];
                        $t_parts += $row[$i]['parts'];
                        $t_misc += $row[$i]['miscellaneous'];
                        $t_labor += $row[$i]['labor'];
                        $t_pms += $row[$i]['PMS'];
                        $t_ac += $row[$i]['AC'];
                        $t_elec += $row[$i]['elec'];
                        $t_mech += $row[$i]['mech'];
                        $t_body += $row[$i]['body'];
                        $t_detailing += $row[$i]['detailing'];
                        $t_rp += $row[$i]['RP'];
                        $t_others += $row[$i]['others'];

						$ln .= $cnt . ".) " . $row[$i]['supplierName']
							. "," . $row[$i]['total'] . " (" . $row[$i]['average'] . ") "
							. "," . $row[$i]['parts']
							. "," . $row[$i]['miscellaneous']
							. "," . $row[$i]['labor']
							. "," . $row[$i]['PMS']
							. "," . $row[$i]['AC']
							. "," . $row[$i]['elec']
							. "," . $row[$i]['mech']
							. "," . $row[$i]['body']
							. "," . $row[$i]['detailing']
							. "," . $row[$i]['RP']
							. "," . $row[$i]['others']
							. "\r\n";
						$cnt++;
					}

					$noOfSuppliers = ($cnt - 1);

					$ln .= "\r\nGRAND TOTAL: ," . $grandTotal . ",," . "SERVICES \r\n";
					$ln .= "No. Of Suppliers: ," . $noOfSuppliers . ",PMS: ," . $t_pms . ",Body: ," . $t_body . "\r\n";
					$ln .= "services: ,,A/C: ," . $t_ac . ",Detailing: ," . $t_detailing . "\r\n";
					$ln .= "Parts: ," . $t_parts . ",Elec: ," . $t_elec . ",RP: ," . $t_rp . "\r\n";
					$ln .= "Oil/Lubs: ," . $t_misc . ",Mech: ," . $t_mech . ",Others: ," . $t_others . "\r\n";

					$data = trim($ln);
					$filename = "repair_cost_per_supplier_" . $dt . ".csv";
				break;
			default: break;
		}

		if(!empty($data) && !empty($filename)){
			exportRowData($data,"excel",$filename);
		}
	}
	exit();
?>