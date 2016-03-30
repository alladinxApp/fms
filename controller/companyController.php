<?
	// -- START SAVE NEW COMPANY --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$companyName = strtoupper($_POST['txtCompanyName']);
		$companyAddress = $_POST['txtCompanyAddress'];
		$companyContactNo = $_POST['txtCompanyContactNo'];
		$companyLogo = $_FILES['txtCompanyLogo']['name'];

		if($_FILES['txtCompanySignature']['size'] > 0){
			$companySignature = $_FILES['txtCompanySignature']['name'];
		}else{
			$companySignature = null;
		}

		$daysOfNotification = str_replace(",","",$_POST['txtDaysOfNotification']);
		$insuranceAppliedDate = empty($_POST['txtInsuranceAppliedDate']) ? null : $_POST['txtInsuranceAppliedDate'];
		$insuranceExpirationDate = empty($_POST['txtInsuranceExpirationDate']) ? null : $_POST['txtInsuranceExpirationDate'];
		$insuranceReminderInDays = str_replace(",","",$_POST['txtInsuranceReminderInDays']);
		$newNum = getNewCtrlNo("company");
		
		$dirLogo = COMPANYLOGOS . $newNum;
		$dirSignature = COMPANYSIGNATURES . $newNum;
		
		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW COMPANY
		$ins_company = new Table;
		$ins_company->setSQLType($fms_db->getSQLType());
		$ins_company->setInstance($fms_db->getInstance());
		$ins_company->setTable("companymaster");
		$ins_company->setField("companyID,companyName,companyAddress,companyContactNo,companyLogo,signature,daysOfNotification
							,insuranceAppliedDate,insuranceExpirationDate,insuranceReminderInDays,createdBy,createdDate");
		$ins_company->setValues("'$newNum','$companyName','$companyAddress','$companyContactNo','$companyLogo','$companySignature'
							,'$daysOfNotification','$insuranceAppliedDate','$insuranceExpirationDate','$insuranceReminderInDays'
							,'$sys_UserID','$today'");
		$ins_company->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO COMPANY
		UpdateCtrlNo("company");

		if($_FILES['txtCompanyLogo']['size'] > 0){
			if (!file_exists($dirLogo . "/" . $companyLogo)) {
				mkdir($dirLogo, 0777, true);
			}
			move_uploaded_file($_FILES['txtCompanyLogo']['tmp_name'], $dirLogo . '/' . $companyLogo);
		}
		if($_FILES['txtCompanySignature']['size'] > 0){
			if (!file_exists($dirSignature . "/" . $companySignature)) {
				mkdir($dirSignature, 0777, true);
			}
			move_uploaded_file($_FILES['txtCompanySignature']['tmp_name'], $dirSignature . '/' . $companySignature);
		}

		$url = BASE_URL . V_COMPANY;
		$msg = "New Company successfully saved.";
		
		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW COMPANY --

	// -- START DELETE COMPANY --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// GET COMPANY INFO
		$getcompany = new Table;
		$getcompany->setSQLType($fms_db->getSQLType());
		$getcompany->setInstance($fms_db->getInstance());
		$getcompany->setView("v_companymaster");
		$getcompany->setParam("WHERE companyID = '$id'");
		$getcompany->doQuery("query");
		$row_getcompany = $getcompany->getLists();

		// DELETE COMPANY
		$del_company = new Table;
		$del_company->setSQLType($fms_db->getSQLType());
		$del_company->setInstance($fms_db->getInstance());
		$del_company->setTable("companymaster");
		$del_company->setParam("WHERE companyID = '$id'");
		$del_company->doQuery("delete");
		$res_company = $del_company->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_company > 0){
			$msg .= "Sorry! There has been an error in deleting your Company. Please contact the Web Administrator.";
		}else{
			$dirLogo = COMPANYLOGOS . $row_getcompany[0]['companyID'];
			$dirSignature = COMPANYSIGNATURES . $row_getcompany[0]['companyID'];

			if(file_exists($dirLogo . "/" . $row_getcompany[0]['companyLogo'])){
				unlink($dirLogo . "/" . $row_getcompany[0]['companyLogo']);
				rmdir($dirLogo);
			}

			if(file_exists($dirSignature . "/" . $row_getcompany[0]['signature'])){
				unlink($dirSignature . "/" . $row_getcompany[0]['signature']);
				rmdir($dirSignature);
			}

			$msg .= "Company successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_COMPANY);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE COMPANY --

	// -- START EDIT COMPANY --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET COMPANY
		$company = new Table;
		$company->setSQLType($fms_db->getSQLType());
		$company->setInstance($fms_db->getInstance());
		$company->setView("v_companymaster");
		$company->setParam("WHERE companyID = '$id'");
		$company->doQuery("query");
		$row_company = $company->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_company[0]['status'];
	}
	// -- END EDIT COMPANY --

	// -- START UPDATE COMPANY --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$companyName = strtoupper($_POST['txtCompanyName']);
		$companyAddress = $_POST['txtCompanyAddress'];
		$companyContactNo = $_POST['txtCompanyContactNo'];
		$companyLogo = $_FILES['txtCompanyLogo']['name'];
		$oldCompanyLogo = $_POST['txtOldCompanyLogo'];
		$companySignature = $_FILES['txtCompanySignature']['name'];
		$oldCompanySignature = $_POST['txtOldCompanySignature'];
		$daysOfNotification = str_replace(",","",$_POST['txtDaysOfNotification']);
		$insuranceAppliedDate = $_POST['txtInsuranceAppliedDate'];
		$insuranceExpirationDate = $_POST['txtInsuranceExpirationDate'];
		$insuranceReminderInDays = str_replace(",","",$_POST['txtInsuranceReminderInDays']);

		$dirLogo = COMPANYLOGOS . $id;
		$dirSignature = COMPANYSIGNATURES . $id;

		if(!empty($_FILES['txtCompanyLogo']['name'])){
			$cLogo = "companyLogo = '$companyLogo',";
		}
		if(!empty($_FILES['txtCompanySignature']['name'])){
			$cSignature = "signature = '$companySignature',";
		}

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET COMPANY
		$company = new Table;
		$company->setSQLType($fms_db->getSQLType());
		$company->setInstance($fms_db->getInstance());
		$company->setTable("companymaster");
		$company->setValues("$cLogo $cSignature companyName = '$companyName', companyAddress = '$companyAddress'
						,companyContactNo = '$companyContactNo', daysOfNotification = '$daysOfNotification'
						,insuranceAppliedDate = '$insuranceAppliedDate', insuranceExpirationDate = '$insuranceExpirationDate'
						,insuranceReminderInDays = '$insuranceReminderInDays', modifiedBy = '$sys_UserID', modifiedDate = '$today'
						, status = '$status'");
		$company->setParam("WHERE companyID = '$id'");
		$company->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		if($_FILES['txtCompanyLogo']['size'] > 0){
			if (!is_dir($dirLogo)) {
				mkdir($dirLogo, 0777, true);
			}
			if(file_exists($dirLogo . "/" . $oldCompanyLogo)){
				unlink($dirLogo . "/" . $oldCompanyLogo);
			}
			move_uploaded_file($_FILES['txtCompanyLogo']['tmp_name'], $dirLogo . '/' . $companyLogo);
		}
		if($_FILES['txtCompanySignature']['size'] > 0){
			if (!is_dir($dirSignature)) {
				mkdir($dirSignature, 0777, true);
			}
			if(file_exists($dirSignature . "/" . $oldCompanySignature)){
				unlink($dirSignature . "/" . $oldCompanySignature);
			}
			move_uploaded_file($_FILES['txtCompanySignature']['tmp_name'], $dirSignature . '/' . $companySignature);
		}

		$url = BASE_URL . V_COMPANY;
		$msg = "Company successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE COMPANY --
?>