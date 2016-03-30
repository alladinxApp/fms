<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET WORK ORDER
	$workordermst = new Table;
	$workordermst->setSQLType($fms_db->getSQLType());
	$workordermst->setInstance($fms_db->getInstance());
	$workordermst->setView("v_workordermaster");
	$workordermst->setParam("WHERE status = '5' ORDER BY status ASC, woReferenceNo DESC, woTransactionDate DESC");
	$workordermst->doQuery("query");
	$row_workordermst = $workordermst->getLists();

	if(isset($_GET['id']) && !empty($_GET['id'])){
		$invoiceID = $_GET['id'];

		// SET WORK ORDER
		$workordermst = new Table;
		$workordermst->setSQLType($fms_db->getSQLType());
		$workordermst->setInstance($fms_db->getInstance());
		$workordermst->setView("v_workordermaster");
		$workordermst->setParam("WHERE status = '5' AND invoiceReferenceNo = '$invoiceID' ORDER BY status ASC, woReferenceNo DESC, woTransactionDate DESC");
		$workordermst->doQuery("query");
		$row_workorder = $workordermst->getLists();
		$num_workorder = $workordermst->getNumRows();

		if($num_workorder == 0){
			$alert = new MessageAlert();
			$alert->setURL("invoicing.php");
			$alert->setMessage(null);
			$alert->Alert();
		}

		$woRefNo = $row_workorder[0]['woReferenceNo'];

		// SET WORK ORDER DTL
		$workorderdtl = new Table;
		$workorderdtl->setSQLType($fms_db->getSQLType());
		$workorderdtl->setInstance($fms_db->getInstance());
		$workorderdtl->setView("v_workorderdetail");
		$workorderdtl->setParam("WHERE woReferenceNo = '$woRefNo' ORDER BY seqNo");
		$workorderdtl->doQuery("query");
		$row_workorderdtl = $workorderdtl->getLists();
		$num_workorderdtl = $workorderdtl->getNumRows();

		// SET PURCHASE ORDER
		$poreceiving = new Table;
		$poreceiving->setSQLType($fms_db->getSQLType());
		$poreceiving->setInstance($fms_db->getInstance());
		$poreceiving->setView("v_poreceiving");
		$poreceiving->setParam("WHERE woReferenceNo = '$woRefNo' ORDER BY status ASC, poReferenceNo DESC, poTransactionDate DESC");
		$poreceiving->doQuery("query");
		$row_poreceiving = $poreceiving->getLists();
		$num_poreceiving = $poreceiving->getNumRows();
	}
	
	// CLOSING FMS DB 
	$fms_db->DBClose();
?>