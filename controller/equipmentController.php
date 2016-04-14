<?
	// -- START SAVE NEW EQUIPMENT --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$equipmentPhoto = $_FILES['txtEquipmentPhoto']['name'];
		$assignee = $_POST['txtAssignee'];
		$company = $_POST['txtCompany'];
		$category = $_POST['txtCategory'];
		$year = $_POST['txtDescription'];
		$make = $_POST['txtMake'];
		$location = $_POST['txtLocation'];
		$model = $_POST['txtModel'];
		$color = strtoupper($_POST['txtColor']);
		$mileageStart = str_replace(",","",$_POST['txtMileageStart']);
		$mileageEnd = str_replace(",","",$_POST['txtMileageEnd']);
		$gasolineAllocationInLiters = $_POST['txtGasolineAllocationInLiters'];
		$gasolineAllocationInCash = str_replace(",","",$_POST['txtGasolineAllocationInCash']);
		$insuranceAppliedDate = $_POST['txtInsuranceAppliedDate'];
		$insuranceExpirationDate = $_POST['txtInsuranceExpirationDate'];
		$insuranceReminderInDays = $_POST['txtInsuranceReminderInDays'];
		$registrationDate = $_POST['txtRegistrationDate'];
		$registrationExpiryDate = $_POST['txtRegistrationExpiryDate'];
		$purchaseDate = $_POST['txtPurchaseDate'];
		$conductionSticker = $_POST['txtConductionSticker'];
		$plateNo = strtoupper($_POST['txtPlateNo']);
		$engineNo = $_POST['txtEngineNo'];
		$chassisNo = $_POST['txtChassisNo'];
		$serialNo = $_POST['txtSerialNo'];
		$acquisitionCost = str_replace(",","",$_POST['txtAcquisitionCost']);
		$insuranceCost = str_replace(",","",$_POST['txtInsuranceCost']);
		$registrationCost = str_replace(",","",$_POST['txtRegistrationCost']);
		$depresitionValue = str_replace(",","",$_POST['txtDepresitionValue']);
		$newNum = getNewCtrlNo("equipment");
		$newNum1 = getnewCtrlNo("assignee_equipment");

		$dir = EQUIPMENTPICS . $newNum;

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW EQUIPMENT
		$ins_equipment = new Table;
		$ins_equipment->setSQLType($fms_db->getSQLType());
		$ins_equipment->setInstance($fms_db->getInstance());
		$ins_equipment->setTable("equipmentmaster");
		$ins_equipment->setField("equipmentID,photo,assigneeID,companyID,categoryID,makeID,locationID,modelID,color
								,mileageStart,mileageEnd,gasolineAllocationInLiters,gasolineAllocationInCash
								,insuranceAppliedDate,insuranceExpirationDate,insuranceReminderInDays,insuranceCost
								,purchaseDate,conductionSticker,year,plateNo,engineNo,chassisNo,serialNo
								,acquisitionCost,registrationCost,depresitionValue
								,registrationDate,registrationExpiryDate
								,createdBy,createdDate");
		$ins_equipment->setValues("'$newNum','$equipmentPhoto','$assignee','$company','$category','$make','$location','$model'
								,'$color','$mileageStart','$mileageEnd','$gasolineAllocationInLiters','$gasolineAllocationInCash'
								,'$insuranceAppliedDate','$insuranceExpirationDate','$insuranceReminderInDays','$insuranceCost'
								,'$purchaseDate','$conductionSticker','$year','$plateNo','$engineNo','$chassisNo','$serialNo'
								,'$aquisitionCost','$registrationCost','$depresitionValue'
								,'$registrationDate','$registrationExpiryDate'
								,'$sys_UserID','$today'");
		$ins_equipment->doQuery("save");

		// SAVE ASSIGNEE EQUIPMENT
		$ins_ass_equip = new Table;
		$ins_ass_equip->setSQLType($fms_db->getSQLType());
		$ins_ass_equip->setInstance($fms_db->getInstance());
		$ins_ass_equip->setTable("assigneeequipment");
		$ins_ass_equip->setField("id,assigneeID,equipmentID,assignedStart");
		$ins_ass_equip->setValues("'$newNum1','$assignee','$newNum','$today'");
		$ins_ass_equip->doQuery("save");
		
		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO EQUIPMENT
		UpdateCtrlNo("equipment");
		UpdateCtrlNo("assignee_equipment");

		if($_FILES['txtEquipmentPhoto']['size'] > 0){
			if (!file_exists($dir . "/" . $equipmentPhoto)) {
				mkdir($dir, 0777, true);
			}
			move_uploaded_file($_FILES['txtEquipmentPhoto']['tmp_name'], $dir . '/' . $equipmentPhoto);
		}

		$url = BASE_URL . V_EQUIPMENT;
		$msg = "New Equipment successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW EQUIPMENT --

	// -- START DELETE EQUIPMENT --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET EQUIPMENT
		$equipmentmst = new Table;
		$equipmentmst->setSQLType($fms_db->getSQLType());
		$equipmentmst->setInstance($fms_db->getInstance());
		$equipmentmst->setView("v_equipmentmaster");
		$equipmentmst->setParam("WHERE equipmentID = '$id'");
		$equipmentmst->doQuery("query");
		$row_equipmentmst = $equipmentmst->getLists();

		// DELETE EQUIPMENT
		$del_equipment = new Table;
		$del_equipment->setSQLType($fms_db->getSQLType());
		$del_equipment->setInstance($fms_db->getInstance());
		$del_equipment->setTable("equipmentmaster");
		$del_equipment->setParam("WHERE equipmentID = '$id'");
		$del_equipment->doQuery("delete");
		$res_equipment = $del_equipment->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$dir = EQUIPMENTPICS . $id;

		if(file_exists($dir . "/" . $row_equipmentmst[0]['photo'])){
			unlink($dir . "/" . $row_equipmentmst[0]['photo']);
			rmdir($dir);
		}

		$msg = null;
		if($res_equipment > 0){
			$msg .= "Sorry! There has been an error in deleting your Equipment. Please contact the Web Administrator.";
		}else{
			$msg .= "Equipment successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_EQUIPMENT);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE EQUIPMENT --

	// -- START EDIT EQUIPMENT --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET EQUIPMENT
		$equipment = new Table;
		$equipment->setSQLType($fms_db->getSQLType());
		$equipment->setInstance($fms_db->getInstance());
		$equipment->setView("v_equipmentmaster");
		$equipment->setParam("WHERE equipmentID = '$id'");
		$equipment->doQuery("query");
		$row_equipment = $equipment->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_equipment[0]['status'];
		$curAssignee = $row_equipment[0]['assigneeID'];
	}
	// -- END EDIT EQUIPMENT --

	// -- START UPDATE EQUIPMENT --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];

		if($_FILES['txtEquipmentPhoto']['size'] > 0){
			$equipmentPhoto = $_FILES['txtEquipmentPhoto']['name'];
			$ePhoto = "photo = '$equipmentPhoto',";
		}else{
			$equipmentPhoto = null;
			$ePhoto = null;
		}

		$oldPhoto = $_POST['txtOldPhoto'];
		$assignee = $_POST['txtAssignee'];
		$company = $_POST['txtCompany'];
		$category = $_POST['txtCategory'];
		$make = $_POST['txtMake'];
		$location = $_POST['txtLocation'];
		$model = $_POST['txtModel'];
		$color = strtoupper($_POST['txtColor']);
		$mileageStart = str_replace(",","",$_POST['txtMileageStart']);
		$mileageEnd = str_replace(",","",$_POST['txtMileageEnd']);
		$gasolineAllocationInLiters = $_POST['txtGasolineAllocationInLiters'];
		$gasolineAllocationInCash = str_replace(",","",$_POST['txtGasolineAllocationInCash']);
		$insuranceAppliedDate = $_POST['txtInsuranceAppliedDate'];
		$insuranceExpirationDate = $_POST['txtInsuranceExpirationDate'];
		$insuranceReminderInDays = $_POST['txtInsuranceReminderInDays'];
		$registrationDate = $_POST['txtRegistrationDate'];
		$registrationExpiryDate = $_POST['txtRegistrationExpiryDate'];
		$purchaseDate = $_POST['txtPurchaseDate'];
		$conductionSticker = $_POST['txtConductionSticker'];
		$year = $_POST['txtYear'];
		$plateNo = strtoupper($_POST['txtPlateNo']);
		$engineNo = $_POST['txtEngineNo'];
		$chassisNo = $_POST['txtChassisNo'];
		$serialNo = $_POST['txtSerialNo'];
		$acquisitionCost = str_replace(",","",$_POST['txtAcquisitionCost']);
		$insuranceCost = str_replace(",","",$_POST['txtInsuranceCost']);
		$registrationCost = str_replace(",","",$_POST['txtRegistrationCost']);
		$depresitionValue = str_replace(",","",$_POST['txtDepresitionValue']);
		$status = $_POST['txtStatus'];

		$dir = EQUIPMENTPICS . $id;
		// NEW NO FOR ASSIGNEE EQUIPMENT
		$newNum = getnewCtrlNo("assignee_equipment");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET EQUIPMENT
		$equipment = new Table;
		$equipment->setSQLType($fms_db->getSQLType());
		$equipment->setInstance($fms_db->getInstance());
		$equipment->setTable("equipmentmaster");
		$equipment->setValues("$ePhoto assigneeID = '$assignee',companyID = '$company',categoryID = '$category',makeID = '$make'
						,locationID = '$location',modelID = '$model',color = '$color'
						,mileageStart = '$mileageStart',mileageEnd = '$mileageEnd'
						,gasolineAllocationInLiters = '$gasolineAllocationInLiters',gasolineAllocationInCash = '$gasolineAllocationInCash'
						,insuranceAppliedDate = '$insuranceAppliedDate',insuranceExpirationDate = '$insuranceExpirationDate'
						,insuranceReminderInDays = '$insuranceReminderInDays',purchaseDate = '$purchaseDate'
						,conductionSticker = '$conductionSticker',year = '$year',plateNo = '$plateNo',engineNo = '$engineNo'
						,chassisNo = '$chassisNo',serialNo = '$serialNo',acquisitionCost = '$acquisitionCost'
						,insuranceCost = '$insuranceCost',registrationCost = '$registrationCost',depresitionValue = '$depresitionValue'
						,registrationDate = '$registrationDate',registrationExpiryDate = '$registrationExpiryDate'
						,modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$equipment->setParam("WHERE equipmentID = '$id'");
		$equipment->doQuery("update");

		if($curAssignee != $assignee){
			// SAVE ASSIGNEE EQUIPMENT
			$ins_ass_equip = new Table;
			$ins_ass_equip->setSQLType($fms_db->getSQLType());
			$ins_ass_equip->setInstance($fms_db->getInstance());
			$ins_ass_equip->setTable("assigneeequipment");
			$ins_ass_equip->setField("id,assigneeID,equipmentID,assignedStart");
			$ins_ass_equip->setValues("'$newNum','$assignee','$id','$today'");
			$ins_ass_equip->doQuery("save");

			// UPDATE ASSIGNEE EQUIPMENT
			$upd_ass_equip = new Table;
			$upd_ass_equip->setSQLType($fms_db->getSQLType());
			$upd_ass_equip->setInstance($fms_db->getInstance());
			$upd_ass_equip->setTable("assigneeequipment");
			$upd_ass_equip->setValues("assignedEnd = '$today', isCurrent = '0'");
			$upd_ass_equip->setParam("WHERE assigneeID = '$curAssignee' AND equipmentID = '$id'");
			$upd_ass_equip->doQuery("update");
		}

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO
		UpdateCtrlNo("assignee_equipment");

		if($_FILES['txtEquipmentPhoto']['size'] > 0){
			if (!is_dir($dir)) {
				mkdir($dir, 0777, true);
			}
			if(file_exists($dir . "/" . $oldPhoto)){
				unlink($dir . "/" . $oldPhoto);
			}
			move_uploaded_file($_FILES['txtEquipmentPhoto']['tmp_name'], $dir . '/' . $equipmentPhoto);
		}

		$url = BASE_URL . V_EQUIPMENT;
		$msg = "Equipment successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE EQUIPMENT --
?>