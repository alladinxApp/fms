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
			default: break;
		}

		if(!empty($data) && !empty($filename)){
			exportRowData($data,"excel",$filename);
		}
	}
	exit();
?>