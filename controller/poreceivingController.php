<?
	$search = null;
	if(isset($_POST['search']) && !empty($_POST['search']) && $_POST['search'] == 1){

		if(empty($_POST['txtFromDt']) && empty($_POST['txtToDt'])){
			$dt = date("Y-m-d");
			$search .= "AND (poTransactionDate between '$dt 00:00' AND '$dt 23:59') ";
		}
		if(!empty($_POST['txtFromDt']) && empty($_POST['txtToDt'])){
			$dt = date("Y-m-d");
			$frmDt = dateFormat($_POST['txtFromDt'],"Y-m-d");
			$search .= "AND (poTransactionDate between '$frmDt 00:00' AND '$dt 23:59') ";
		}
		if(!empty($_POST['txtFromDt']) && empty($_POST['txtToDt'])){
			$dt = date("Y-m-d");
			$toDt = dateFormat($_POST['txtToDt'],"Y-m-d");
			$search .= "AND (poTransactionDate between '$dt 00:00' AND '$toDt 23:59') ";
		}
		if(!empty($_POST['txtPOReferenceNo'])){
			$po = $_POST['txtPOReferenceNo'];
			$search .= "AND poReferenceNo LIKE '%$po%' ";
		}
		if(!empty($_POST['txtWOReferenceNo'])){
			$wo = $_POST['txtWOReferenceNo'];
			$search .= "AND woReferenceNo LIKE '%$wo%' ";
		}

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET PURCHASE ORDER
		$searchpo = new Table;
		$searchpo->setSQLType($fms_db->getSQLType());
		$searchpo->setInstance($fms_db->getInstance());
		$searchpo->setView("v_poreceiving");
		$searchpo->setParam("WHERE status > 0 $search ORDER BY poReferenceNo DESC,poTransactionDate DESC");
		$searchpo->doQuery("query");
		$row_searchpo = $searchpo->getLists();
		$num_searchpo = $searchpo->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();
	}
	// -- START SAVE NEW PURCHASE ORDER --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$wo = $_POST['txtWorkOrderNo'];
		$labor = str_replace(",","",$_POST['txtLabor']);
		$misc = str_replace(",","",$_POST['txtMiscellaneous']);
		$parts = str_replace(",","",$_POST['txtParts']);
		$disc = str_replace(",","",$_POST['txtDiscount']);
		$tax = str_replace(",","",$_POST['txtTax']);
		$totalCost = str_replace(",","",$_POST['txtTotalCost']);
		$attachment = $_FILES['txtAttachment']['name'];
		$newNum = getNewCtrlNo("po_receiving");

		$dirPOAttachment = POATTACHMENTS . $newNum;

		if(!empty($attachment)){
			$attachmentfld = ",attachment";
			$attachmentval = ",'$attachment'";
		}else{
			$attachmentfld = null;
			$attachmentval = null;
		}

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW PURCHSE ORDER
		$ins_po = new Table;
		$ins_po->setSQLType($fms_db->getSQLType());
		$ins_po->setInstance($fms_db->getInstance());
		$ins_po->setTable("poreceiving");
		$ins_po->setField("poReferenceNo,woReferenceNo,poTransactionDate
							,labor,miscellaneous,parts,discount,tax,Amount
							$attachmentfld
							,createdBy,createdDate");
		$ins_po->setValues("'$newNum','$wo','$today'
							,'$labor','$misc','$parts','$disc','$tax','$totalCost'
							$attachmentval
							,'$sys_UserID','$today'");
		$ins_po->doQuery("save");

		// CLOSING PURCHSE DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO PURCHSE ORDER
		UpdateCtrlNo("po_receiving");

		if($_FILES['txtAttachment']['size'] > 0){
			if (!file_exists($dirPOAttachment . "/" . $attachment)) {
				mkdir($dirPOAttachment, 0777, true);
			}
			move_uploaded_file($_FILES['txtAttachment']['tmp_name'], $dirPOAttachment . '/' . $attachment);
		}

		$url = BASE_URL . V_PORECEIVING;
		$msg = "New Purchase Order successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW PURCHASE ORDER --

	// -- START DELETE PURCHASE ORDER --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// GET PURCHASE ORDER INFO
		$getpo = new Table;
		$getpo->setSQLType($fms_db->getSQLType());
		$getpo->setInstance($fms_db->getInstance());
		$getpo->setView("v_poreceiving");
		$getpo->setParam("WHERE poReferenceNo = '$id'");
		$getpo->doQuery("query");
		$row_getpo = $getpo->getLists();
		
		// DELETE WORKORDER
		$del_po = new Table;
		$del_po->setSQLType($fms_db->getSQLType());
		$del_po->setInstance($fms_db->getInstance());
		$del_po->setTable("poreceiving");
		$del_po->setParam("WHERE poReferenceNo = '$id'");
		$del_po->doQuery("delete");
		$res_po = $del_po->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		if(count($row_getpo) == 0){
			$alert = new MessageAlert();
			$alert->setURL(BASE_URL . V_PORECEIVING);
			$alert->setMessage("Invalid URL!");
			$alert->Alert();
		}

		$dirPOAttachment = POATTACHMENTS . $id;

		if(file_exists($dirPOAttachment . "/" . $row_getpo[0]['attachment'])){
			unlink($dirPOAttachment . "/" . $row_getpo[0]['attachment']);
			rmdir($dirPOAttachment);
		}

		$msg = null;
		if($res_po > 0){
			$msg .= "Sorry! There has been an error in deleting your Purchase Order. Please contact the Web Administrator.";
		}else{
			$msg .= "Purchase Order successfully deleted.";
		}
		
		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_PORECEIVING);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE PURCHASE ORDER --

	// -- START EDIT PURCHASE ORDER --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET PURCHASE ORDER
		$purchaseorder = new Table;
		$purchaseorder->setSQLType($fms_db->getSQLType());
		$purchaseorder->setInstance($fms_db->getInstance());
		$purchaseorder->setView("v_poreceiving");
		$purchaseorder->setParam("WHERE poReferenceNo = '$id'");
		$purchaseorder->doQuery("query");
		$row_purchaseorder = $purchaseorder->getLists();

		$wo = $row_purchaseorder[0]['woReferenceNo'];

		// SET WORK ORDER
		$workorder = new Table;
		$workorder->setSQLType($fms_db->getSQLType());
		$workorder->setInstance($fms_db->getInstance());
		$workorder->setView("v_workordermaster");
		$workorder->setParam("WHERE woReferenceNo = '$wo' AND status NOT IN('6','7','8')");
		$workorder->doQuery("query");
		$row_workorder = $workorder->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		if(count($row_purchaseorder) == 0){
			$alert = new MessageAlert();
			$alert->setURL(BASE_URL . V_PORECEIVING);
			$alert->setMessage("Invalid URL!");
			$alert->Alert();
		}

		$status = $row_purchaseorder[0]['status'];

		if($status > 0){
			$disabled = 'disabled';
			$readonly = 'readonly';
		}
	}
	// -- END EDIT PURCHASE ORDER --

	// -- START UPDATE PURCHASE ORDER --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$wo = $_POST['txtWorkOrderNo'];
		$labor = str_replace(",","",$_POST['txtLabor']);
		$misc = str_replace(",","",$_POST['txtMiscellaneous']);
		$parts = str_replace(",","",$_POST['txtParts']);
		$disc = str_replace(",","",$_POST['txtDiscount']);
		$tax = str_replace(",","",$_POST['txtTax']);
		$attachment = $_FILES['txtAttachment']['name'];
		$subTotal = ($labor + $misc + $parts) - $disc;
		$totalCost = str_replace(",","",number_format($subTotal + $tax,2));
		$status = $_POST['txtStatus'];

		if(!empty($attachment)){
			$attachmentval = ",attachment = '$attachment'";
		}

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET PURCHASE ORDER
		$poreceiving = new Table;
		$poreceiving->setSQLType($fms_db->getSQLType());
		$poreceiving->setInstance($fms_db->getInstance());
		$poreceiving->setTable("poreceiving");
		$poreceiving->setValues("woReferenceNo = '$wo',labor = '$labor',miscellaneous = '$misc',parts = '$parts'
						,discount = '$disc',tax = '$tax',Amount = '$totalCost' $attachment
						,status = '$status'
						, modifiedBy = '$sys_UserID', modifiedDate = '$today'");
		$poreceiving->setParam("WHERE poReferenceNo = '$id'");
		$poreceiving->doQuery("update");
		
		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_PORECEIVINGEDIT . "?edit=1&id=" . $id;
		$msg = "Purchase Order successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE PURCHASE ORDER --
?>