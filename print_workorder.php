<?
	require_once("inc/global.php"); 
	require_once(MODEL_PATH . FPDF_MODEL);
	require_once(MODEL_PATH . PRINTWO_MODEL);

	$id = $_SESSION['worefno'];

	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET WORK ORDER
	$workordermst = new Table;
	$workordermst->setSQLType($fms_db->getSQLType());
	$workordermst->setInstance($fms_db->getInstance());
	$workordermst->setView("v_workordermaster");
	$workordermst->setParam("WHERE woReferenceNo = '$id'");
	$workordermst->doQuery("query");
	$row_workordermst = $workordermst->getLists();

	$equipmentID = $row_workordermst[0]['equipmentID'];

	// SET EQUIPMENT
	$equipmentmst = new Table;
	$equipmentmst->setSQLType($fms_db->getSQLType());
	$equipmentmst->setInstance($fms_db->getInstance());
	$equipmentmst->setView("v_equipmentmaster");
	$equipmentmst->setParam("WHERE equipmentID = '$equipmentID'");
	$equipmentmst->doQuery("query");
	$row_equipmentmst = $equipmentmst->getLists();

	$companyID = $row_equipmentmst[0]['companyID'];
	$assigneeID = $row_equipmentmst[0]['assigneeID'];

	// SET COMPANY
	$companymst = new Table;
	$companymst->setSQLType($fms_db->getSQLType());
	$companymst->setInstance($fms_db->getInstance());
	$companymst->setView("v_companymaster");
	$companymst->setParam("WHERE companyID = '$companyID'");
	$companymst->doQuery("query");
	$row_companymst = $companymst->getLists();

	// SET ASSIGNEE
	$assigneemst = new Table;
	$assigneemst->setSQLType($fms_db->getSQLType());
	$assigneemst->setInstance($fms_db->getInstance());
	$assigneemst->setView("v_assigneemaster");
	$assigneemst->setParam("WHERE assigneeID = '$assigneeID'");
	$assigneemst->doQuery("query");
	$row_assigneemst = $assigneemst->getLists();

	// CLOSING FMS DB
	$fms_db->DBClose();
	
	$company = array("compaddr" => 'Alabang, Muntinlupa City'
					,"comptelno" => '784-3278');

	$pdf = new printWorkOrder;
	$pdf->setHeaderInfo($company);
	$pdf->setWorkOrder($row_workordermst[0]);
	$pdf->setEquipment($row_equipmentmst[0]);
	$pdf->setCompany($row_companymst[0]);
	$pdf->setAssignee($row_assigneemst[0]);

	$pdf->AddPage();
	$pdf->ImprovedTable();

	// I = WEB VIEW, D = DOWNLOAD PDF FILE
	$pdf->Output($id . date("Ymdhis") . '.pdf','I');
	// $_SESSION['worefno'] = null;
?>