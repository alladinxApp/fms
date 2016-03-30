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
			default: break;
		}

		if(!empty($data) && !empty($filename)){
			exportRowData($data,"excel",$filename);
		}
	}
	exit();
?>