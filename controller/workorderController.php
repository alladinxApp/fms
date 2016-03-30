<?
	$search = null;
	if(isset($_POST['search']) && !empty($_POST['search']) && $_POST['search'] == 1){

		
		if(!empty($_POST['txtFromDt']) && empty($_POST['txtToDt'])){
			$dt = date("Y-m-d");
			$frmDt = dateFormat($_POST['txtFromDt'],"Y-m-d");
			$search .= "AND (transactionDate between '$frmDt 00:00' AND '$dt 23:59') ";
		}
		if(!empty($_POST['txtFromDt']) && empty($_POST['txtToDt'])){
			$dt = date("Y-m-d");
			$toDt = dateFormat($_POST['txtToDt'],"Y-m-d");
			$search .= "AND (transactionDate between '$dt 00:00' AND '$toDt 23:59') ";
		}
		if(!empty($_POST['txtServiceType'])){
			$serviceType = $_POST['txtServiceType'];
			$search .= "AND serviceType LIKE '%$serviceType%' ";
		}
		if(!empty($_POST['txtAssignee'])){
			$assignee = $_POST['txtAssignee'];
			$search .= "AND assignee LIKE '%$assignee%' ";
		}
		if(!empty($_POST['txtPlateNo'])){
			$plateNo = $_POST['txtPlateNo'];
			$search .= "AND plateNo LIKE '%$plateNo%' ";
		}
		if(!empty($_POST['txtIsWarranty'])){
			$isWarranty = $_POST['txtIsWarranty'];
			$search .= "AND isWarranty = '$isWarranty' ";
		}
		if(!empty($_POST['txtIsBackJob'])){
			$isBackJob = $_POST['txtIsBackJob'];
			$search .= "AND isBackJob = '$isBackJob' ";
		}
		if(!empty($_POST['txtStatus'])){
			$status = $_POST['txtStatus'];
			$search .= "AND status = '$status' ";
		}
		// }else{
		// 	$search .= "AND status IN('5','6','7','8') ";
		// }
		if($search == null){
			$dt = date("Y-m-d");
			$search .= "AND (transactionDate between '$dt 00:00' AND '$dt 23:59') ";
		}

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
	// -- START SAVE NEW WORK ORDER --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$serviceType = $_POST['txtServiceType'];
		$equipment = $_POST['txtEquipment'];
		$meter = $_POST['txtMeter'];
		$labor = str_replace(",","",$_POST['txtLabor']);
		$misc = str_replace(",","",$_POST['txtMiscellaneous']);
		$parts = str_replace(",","",$_POST['txtParts']);
		$disc = str_replace(",","",$_POST['txtDiscount']);
		$tax = str_replace(",","",$_POST['txtTax']);
		$subTotal = str_replace(",","",($labor + $misc + $parts) - $disc);
		$totalCost = str_replace(",","",$_POST['txtTotalCost']);
		$isWarranty = $_POST['txtIsWarranty'];
		$isBackJob = $_POST['txtIsBackJob'];
		$remarks = addslashes($_POST['txtRemarks']);
		$newNum = getNewCtrlNo("work_order");

		$arrParts = $_POST['txtPartsArray'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW WORK ORDER MST
		$ins_womst = new Table;
		$ins_womst->setSQLType($fms_db->getSQLType());
		$ins_womst->setInstance($fms_db->getInstance());
		$ins_womst->setTable("workordermaster");
		$ins_womst->setField("woReferenceNo,woTransactionDate,serviceTypeID,equipmentID,meter,remarks,isWarranty,isBackJob
							,createdBy,createdDate
							,labor,miscellaneous,parts,discount,tax,subTotal,totalCost");
		$ins_womst->setValues("'$newNum','$today','$serviceType','$equipment','$meter','$remarks','$isWarranty','$isBackJob'
							,'$sys_UserID','$today'
							,'$labor','$misc','$parts','$disc','$tax','$subTotal','$totalCost'");
		$ins_womst->doQuery("save");

		// SAVE NEW WORK ORDER DTL
		if(!empty($arrParts)){
			$partsItem = explode("|",$arrParts);
			$cnt = 1;
			for($i=0;$i<count($partsItem);$i++){
				$pItem = explode(":",$partsItem[$i]);
				$ins_wodtl = new Table;
				$ins_wodtl->setSQLType($fms_db->getSQLType());
				$ins_wodtl->setInstance($fms_db->getInstance());
				$ins_wodtl->setTable("workorderdetail");
				$ins_wodtl->setField("woReferenceNo,partsID,partsPrice,qty,seqNo");
				$ins_wodtl->setValues("'$newNum','$pItem[0]','$pItem[2]','$pItem[3]','$cnt'");
				$ins_wodtl->doQuery("save");
				$cnt++;
			}
		}

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO WORK ORDER
		UpdateCtrlNo("work_order");

		$url = BASE_URL . V_WORKORDER;
		$msg = "New Work Order successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW WORK ORDER --

	// -- START DELETE WORK ORDER --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// GET WORK ORDER INFO
		$getwo = new Table;
		$getwo->setSQLType($fms_db->getSQLType());
		$getwo->setInstance($fms_db->getInstance());
		$getwo->setView("v_workordermaster");
		$getwo->setParam("WHERE woReferenceNo = '$id'");
		$getwo->doQuery("query");
		$row_getwo = $getwo->getLists();

		// DELETE WORKORDER MST
		$del_womst = new Table;
		$del_womst->setSQLType($fms_db->getSQLType());
		$del_womst->setInstance($fms_db->getInstance());
		$del_womst->setTable("workordermaster");
		$del_womst->setParam("WHERE woReferenceNo = '$id'");
		$del_womst->doQuery("delete");
		$res_wo = $del_womst->getError();

		// DELETE WORKORDER DTL
		$del_wodtl = new Table;
		$del_wodtl->setSQLType($fms_db->getSQLType());
		$del_wodtl->setInstance($fms_db->getInstance());
		$del_wodtl->setTable("workorderdetail");
		$del_wodtl->setParam("WHERE woReferenceNo = '$id'");
		$del_wodtl->doQuery("delete");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_wo > 0){
			$msg .= "Sorry! There has been an error in deleting your Work Order. Please contact the Web Administrator.";
		}else{
			$msg .= "Work Order successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_WORKORDER);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE WORK ORDER --

	// -- START EDIT WORK ORDER --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET WORK ORDER MST
		$workorder = new Table;
		$workorder->setSQLType($fms_db->getSQLType());
		$workorder->setInstance($fms_db->getInstance());
		$workorder->setView("v_workordermaster");
		$workorder->setParam("WHERE woReferenceNo = '$id'");
		$workorder->doQuery("query");
		$row_workorder = $workorder->getLists();

		// SET WORK ORDER DTL
		$workorderdtl = new Table;
		$workorderdtl->setSQLType($fms_db->getSQLType());
		$workorderdtl->setInstance($fms_db->getInstance());
		$workorderdtl->setView("v_workorderdetail");
		$workorderdtl->setParam("WHERE woReferenceNo = '$id' ORDER BY seqNo");
		$workorderdtl->doQuery("query");
		$row_workorderdtl = $workorderdtl->getLists();

		// SET PURCHASE ORDER
		$poreceiving = new Table;
		$poreceiving->setSQLType($fms_db->getSQLType());
		$poreceiving->setInstance($fms_db->getInstance());
		$poreceiving->setView("v_poreceiving");
		$poreceiving->setParam("WHERE woReferenceNo = '$id' ORDER BY status ASC, poReferenceNo DESC, poTransactionDate DESC");
		$poreceiving->doQuery("query");
		$row_poreceiving = $poreceiving->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_workorder[0]['status'];
		$isWarranty = $row_workorder[0]['isWarranty'];
		$isBackJob = $row_workorder[0]['isBackJob'];
		$statusDesc = $row_workorder[0]['statusDesc'];
		$isSent = $row_workorder[0]['isSent'];
		$immediateHead = $row_workorder[0]['immediateHead'];
		$immediateEmailAddr = $row_workorder[0]['immediateEmailAddr'];

		if($isSent == 0 && $status == 1){
			$statusDesc = 'UNNOTIFIED FOR APPROVAL';
		}

		if($status > 0){
			$readonly = 'readonly';
			$disabled = 'disabled';
		}

		if(!empty($row_workorder[0]['approvedDate'])){
			$approvedDate = dateFormat($row_workorder[0]['approvedDate'],"Y-m-d");
		}else{
			$approvedDate = null;
		}

		if(!empty($row_workorder[0]['startDate'])){
			$startDate = dateFormat($row_workorder[0]['startDate'],"Y-m-d");
		}else{
			$startDate = null;
		}

		if(!empty($row_workorder[0]['completionDate'])){
			$completionDate = dateFormat($row_workorder[0]['completionDate'],"Y-m-d");
		}else{
			$completionDate = null;
		}

		if(!empty($row_workorder[0]['billedDate'])){
			$billedDate = dateFormat($row_workorder[0]['billedDate'],"Y-m-d");
		}else{
			$billedDate = null;
		}
	}
	// -- END EDIT WORK ORDER --

	// -- START UPDATE WORK ORDER --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$serviceType = $_POST['txtServiceType'];
		$equipment = $_POST['txtEquipment'];
		$meter = $_POST['txtMeter'];
		$labor = str_replace(",","",$_POST['txtLabor']);
		$misc = str_replace(",","",$_POST['txtMiscellaneous']);
		$parts = str_replace(",","",$_POST['txtParts']);
		$disc = str_replace(",","",$_POST['txtDiscount']);
		$tax = str_replace(",","",$_POST['txtTax']);
		$subTotal = str_replace(",","",($labor + $misc + $parts) - $disc);
		$totalCost = str_replace(",","",number_format($subTotal + $tax,2));
		$isWarranty = $_POST['txtIsWarranty'];
		$isBackJob = $_POST['txtIsBackJob'];
		$remarks = addslashes($_POST['txtRemarks']);
		$status = $_POST['txtStatus'];
		$arrParts = $_POST['txtPartsArray'];
		$invRefNo = $_POST['txtInvRefNo'];

		$values = null;
		$statusmsg = 'updated';

		switch($status){
			// OPEN
			case "0": 
					$values .= "serviceTypeID = '$serviceType',equipmentID = '$equipment',meter = '$meter'
						,labor = '$labor',miscellaneous = '$misc',parts = '$parts',discount = '$disc',subTotal = '$subTotal',tax = '$tax',totalCost = '$totalCost'
						,isWarranty = '$isWarranty',isBackJob = '$isBackJob',remarks = '$remarks' ";
					$statusmsg = 'updated';
				break;
			// APPROVED
			case "1": 
					if($isSent == 0){
						$sesid = genRandomString(10);
						$sesid = ",url = '$sesid'";
						$supplier = $_POST['txtSupplier'];
					
						$values .= "serviceTypeID = '$serviceType',equipmentID = '$equipment',meter = '$meter'
							,labor = '$labor',miscellaneous = '$misc',parts = '$parts',discount = '$disc',subTotal = '$subTotal',tax = '$tax',totalCost = '$totalCost'
							,isWarranty = '$isWarranty',isBackJob = '$isBackJob',remarks = '$remarks'
							$sesid 
							,status = '$status',remarks = '$remarks',supplierID = '$supplier' ";
						$statusmsg = 'updated and is waiting for approval';
					}
				break;
			// FOR APPROVAL
			case "2": 
					$values .= "labor = '$labor',miscellaneous = '$misc',parts = '$parts',discount = '$disc',tax = '$tax',totalCost = '$totalCost' 
						";
					$statusmsg = 'updated and is waiting for repair';
				break;
			// ON REPAIR
			case "3": 
					if(!empty($_POST['txtStartDate'])){
						$startDate = $_POST['txtStartDate'];
						$startDateVal = ",startDate = '$startDate'";
					}else{
						$startDateVal = null;
					}

					$values .= "status = '3', labor = '$labor',miscellaneous = '$misc',parts = '$parts',discount = '$disc',tax = '$tax',totalCost = '$totalCost'
						$startDateVal ";
					$statusmsg = 'updated and is on repair process';
				break;
			// FOR BILLING
			case "4":
					$POisOpen = 0; 
					for($i=0;$i<count($row_poreceiving);$i++){
						if($row_poreceiving[$i]['status'] == '0'){
							$POisOpen++;
						}
					}

					if($POisOpen > 0){
						$url = BASE_URL . V_WORKORDEREDIT . "?edit=1&id=" . $id;
						$msg = "There are still OPEN in PO Receiving! Please close them to continue the work order process.";

						$alert = new MessageAlert();
						$alert->setURL($url);
						$alert->setMessage($msg);
						$alert->Alert();
					}

					if(empty($completionDate)){
						if(empty($_POST['txtCompletionDate'])){
							$url = BASE_URL . V_WORKORDEREDIT . "?edit=1&id=" . $id;
							$msg = "Please enter completion date!";

							$alert = new MessageAlert();
							$alert->setURL($url);
							$alert->setMessage($msg);
							$alert->Alert();
						}else{
							$completionDate = $_POST['txtCompletionDate'];
						}
					}

					$values .= "labor = '$labor',miscellaneous = '$misc',parts = '$parts',discount = '$disc',tax = '$tax',totalCost = '$totalCost'
								,completionDate = '$completionDate',status = '$status' ";
					$statusmsg = 'updated and is ready for billing';
				break;
			case "5":
					$statusmsg = 'update.';
					if(empty($invRefNo) || $invRefNo == null){
						$invoiceAmount = $_POST['txtInvoiceAmount'];
						$varianceAmount = $_POST['txtVarianceAmount'];
						$variance = $_POST['txtVariance'];
						$newNum = getNewCtrlNo("invoicing");
						
						$values .= "invoiceReferenceNo = '$newNum', invoiceDate = '$today', invoiceAmount = '$invoiceAmount'
									,varianceAmount = '$varianceAmount', variance = '$variance', status = '$status'
									,billedDate = '$today'";
						$statusmsg = 'billed.';

						// UPDATE CONTROL NO WORK ORDER
						UpdateCtrlNo("invoicing");
					}
				break;
			// CANCEL
			case "8": 
					$values .= "status = '$status' ";
					$statusmsg = 'canceled';
				break;
			// SEND NOTIFICATION
			case "9":
					$mailFrom = array("name" => "no-reply", 
						"email" => "noelsr0102@gmail.com");
					$mailTo = array("name" => $immediateHead, 
								"email" => $immediateEmailAddr);

					$mail = new MailHandler;
					$mail->setMailFrom($mailFrom);
					$mail->setMailTo($mailTo);
					$mail->setWO($row_getWorkOrder[0]);
					$mail->setWONotification($row_getWorkOrder[0]);

					if($mail->sendMail()){
						// SET WORK ORDER
						$workorder = new Table;
						$workorder->setSQLType($fms_db->getSQLType());
						$workorder->setInstance($fms_db->getInstance());
						$workorder->setTable("workordermaster");
						$workorder->setValues("isSent = '1'");
						$workorder->setParam("WHERE woReferenceNo = '$id'");
						$workorder->doQuery("update");

						$statusmsg = 'updated and notification was sent for approval.';
					}else{
						$url = BASE_URL . V_WORKORDEREDIT . "?edit=1&id=" . $id;
						$msg = "Work Order was unsuccessful due to sending of notification error! \n
							Please check assignee immediate info if correct and try re-sending. \n
							If this message re-occurs, please contact the web administrator.";

						$alert = new MessageAlert();
						$alert->setURL($url);
						$alert->setMessage($msg);
						$alert->Alert();
					}
				break;
			default: break;
		}

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET WORK ORDER
		$workorder = new Table;
		$workorder->setSQLType($fms_db->getSQLType());
		$workorder->setInstance($fms_db->getInstance());
		$workorder->setTable("workordermaster");
		$workorder->setValues("$values
						, modifiedBy = '$sys_UserID', modifiedDate = '$today'");
		$workorder->setParam("WHERE woReferenceNo = '$id'");
		$workorder->doQuery("update");

		// DELETE WORK ORDER DTL
		$del_wodtl = new Table;
		$del_wodtl->setSQLType($fms_db->getSQLType());
		$del_wodtl->setInstance($fms_db->getInstance());
		$del_wodtl->setTable("workorderdetail");
		$del_wodtl->setParam("WHERE woReferenceNo = '$id'");
		$del_wodtl->doQuery("delete");

		// SAVE NEW WORK ORDER DTL
		if(!empty($arrParts)){
			$partsItem = explode("|",$arrParts);
			$cnt = 1;
			for($i=0;$i<count($partsItem);$i++){
				$pItem = explode(":",$partsItem[$i]);
				$ins_wodtl = new Table;
				$ins_wodtl->setSQLType($fms_db->getSQLType());
				$ins_wodtl->setInstance($fms_db->getInstance());
				$ins_wodtl->setTable("workorderdetail");
				$ins_wodtl->setField("woReferenceNo,partsID,partsPrice,qty,seqNo");
				$ins_wodtl->setValues("'$id','$pItem[0]','$pItem[2]','$pItem[3]','$cnt'");
				$ins_wodtl->doQuery("save");
				$cnt++;
			}
		}

		// SET WORK ORDER
		$getWorkOrder = new Table;
		$getWorkOrder->setSQLType($fms_db->getSQLType());
		$getWorkOrder->setInstance($fms_db->getInstance());
		$getWorkOrder->setView("v_workordermaster");
		$getWorkOrder->setParam("WHERE woReferenceNo = '$id'");
		$getWorkOrder->doQuery("query");
		$row_getWorkOrder = $getWorkOrder->getLists();

		if($status == 1 && $isSent == 0){
			$mailFrom = array("name" => "no-reply", 
						"email" => "noelsr0102@gmail.com");
			$mailTo = array("name" => $immediateHead, 
						"email" => $immediateEmailAddr);

			$mail = new MailHandler;
			$mail->setMailFrom($mailFrom);
			$mail->setMailTo($mailTo);
			$mail->setWO($row_getWorkOrder[0]);
			$mail->setWONotification($row_getWorkOrder[0]);

			if($mail->sendMail()){
				// SET WORK ORDER
				$workorder = new Table;
				$workorder->setSQLType($fms_db->getSQLType());
				$workorder->setInstance($fms_db->getInstance());
				$workorder->setTable("workordermaster");
				$workorder->setValues("isSent = '1'");
				$workorder->setParam("WHERE woReferenceNo = '$id'");
				$workorder->doQuery("update");
			}
		}

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_WORKORDEREDIT . "?edit=1&id=" . $id;
		$msg = "Work Order successfully " . $statusmsg . ".";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE WORK ORDER --

	// WORK ORDER FOR APPROVAL
	if(isset($_GET['q']) && !empty($_GET['q'])){
		$q = explode("|",$_GET['q']);
		$sesid = $q[0];
		$worefno = $q[1];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// CHECK WORK ORDER
		$chkwo = new Table;
		$chkwo->setSQLType($fms_db->getSQLType());
		$chkwo->setInstance($fms_db->getInstance());
		$chkwo->setView("v_workordermaster");
		$chkwo->setParam("WHERE woReferenceNo = '$worefno'");
		$chkwo->doQuery("query");
		$num_chkwo = $chkwo->getNumRows();
		$row_chkwo = $chkwo->getLists();

		$wo_status = $row_chkwo[0]['status'];
		$statusDesc = $row_chkwo[0]['statusDesc'];

		// CHECK WORK ORDER
		$chkwourl = new Table;
		$chkwourl->setSQLType($fms_db->getSQLType());
		$chkwourl->setInstance($fms_db->getInstance());
		$chkwourl->setView("v_workordermaster");
		$chkwourl->setParam("WHERE url = '$sesid'");
		$chkwourl->doQuery("query");
		$num_chkurl = $chkwourl->getNumRows();
		$row_chkurl = $chkwourl->getLists();

		$wourl_status = $row_chkurl[0]['status'];

		// CHECK WORK ORDER
		$wo_dtl = new Table;
		$wo_dtl->setSQLType($fms_db->getSQLType());
		$wo_dtl->setInstance($fms_db->getInstance());
		$wo_dtl->setView("v_workorderdetail");
		$wo_dtl->setParam("WHERE woReferenceNo = '$worefno'");
		$wo_dtl->doQuery("query");
		$num_wo_dtl = $wo_dtl->getNumRows();
		$row_wo_dtl = $wo_dtl->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		if($num_chkwo == 0 || $num_chkurl == 0 || $wo_status != 1 || $wourl_status != 1){
			$url = BASE_URL;
			$msg = "Invalid URL!";

			$alert = new MessageAlert();
			$alert->setURL($url);
			$alert->setMessage($msg);
			$alert->Alert();
		}
	}
	// -- END WORK ORDER FOR APPROVAL

	// APPROVED WORK ORDER
	if(isset($_POST['approved']) && !empty($_POST['approved']) && $_POST['approved'] == 1){
		$apprRemarks = $_POST['txtApproverRemarks'];
		$status = $_POST['txtStatus'];
		$id = $worefno;

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET WORK ORDER
		$workorder = new Table;
		$workorder->setSQLType($fms_db->getSQLType());
		$workorder->setInstance($fms_db->getInstance());
		$workorder->setTable("workordermaster");
		$workorder->setValues("approverRemarks = '$apprRemarks', status = '$status', approvedDate = '$today'");
		$workorder->setParam("WHERE woReferenceNo = '$id'");
		$workorder->doQuery("update");
		
		// CLOSING FMS DB
		$fms_db->DBClose();

		switch($status){
			case 2: $statusDesc = 'approved'; break;
			case 7: $statusDesc = 'disapproved'; break;
			default: break;
		}

		$url = BASE_URL;
		$msg = "Work Order successfully " . $statusDesc . ".";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END APPROVED WORK ORDER	
?>