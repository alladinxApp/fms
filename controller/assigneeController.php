<?
	// -- START SAVE NEW ASSIGNEE --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$company = $_POST['txtCompany'];
		$location = $_POST['txtLocation'];
		$fName = strtoupper($_POST['txtFName']);
		$lName = strtoupper($_POST['txtLName']);
		$gender = $_POST['txtGender'];
		$age = $_POST['txtAge'];
		$contactNo1 = $_POST['txtContactNo1'];
		$contactNo2 = $_POST['txtContactNo2'];
		$address = $_POST['txtAddress'];
		$costCenter = $_POST['txtCostCenter'];
		$immediateHead = $_POST['txtImmediateHead'];
		$immediateEmailAddress = $_POST['txtImmediateEmailAddress'];
		$department = $_POST['txtDepartment'];
		$attachment = $_FILES['txtAttachment']['name'];
		$licenseNo = $_POST['txtLicenseNo'];
		$licenseRegistrationDate = $_POST['txtLicenseRegistrationDate'];
		$licenseExpirationDate = $_POST['txtLicenseExpirationDate'];
		$licenseAddress = $_POST['txtLicenseAddress'];
		$newNum = getNewCtrlNo("assignee");

		$dir = ASSIGNEEATTACHMENTS . $newNum;

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW ASSIGNEE
		$ins_assignee = new Table;
		$ins_assignee->setSQLType($fms_db->getSQLType());
		$ins_assignee->setInstance($fms_db->getInstance());
		$ins_assignee->setTable("assigneemaster");
		$ins_assignee->setField("assigneeID,companyID,locationID,firstname,lastname,gender,age,contactNo1,contactNo2,address
							,costCenter,immediateHead,emailAddress,attachment,licenseNo,expirationDate,licenseAddress
							,licenseRegistrationDate,department
							,createdBy,createdDate");
		$ins_assignee->setValues("'$newNum','$company','$location','$fName','$lName','$gender','$age','$contactNo1','$contactNo2'
							,'$address','$costCenter','$immediateHead','$immediateEmailAddress','$attachment','$licenseNo'
							,'$licenseExpirationDate','$licenseAddress'
							,'$licenseRegistrationDate','$department'
							,'$sys_UserID','$today'");
		$ins_assignee->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO ASSIGNEE
		UpdateCtrlNo("assignee");

		if($_FILES['txtAttachment']['size'] > 0){
			if (!file_exists($dir . "/" . $attachment)) {
				mkdir($dir, 0777, true);
			}
			move_uploaded_file($_FILES['txtAttachment']['tmp_name'], $dir . '/' . $attachment);
		}

		$url = BASE_URL . V_ASSIGNEE;
		$msg = "New Assignee successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW ASSIGNEE --

	// -- START DELETE ASSIGNEE --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET ASSIGNEE
		$assignee = new Table;
		$assignee->setSQLType($fms_db->getSQLType());
		$assignee->setInstance($fms_db->getInstance());
		$assignee->setView("v_assigneemaster");
		$assignee->setParam("WHERE assigneeID = '$id'");
		$assignee->doQuery("query");
		$row_assignee = $assignee->getLists();

		// DELETE ASSIGNEE
		$del_assignee = new Table;
		$del_assignee->setSQLType($fms_db->getSQLType());
		$del_assignee->setInstance($fms_db->getInstance());
		$del_assignee->setTable("assigneemaster");
		$del_assignee->setParam("WHERE assigneeID = '$id'");
		$del_assignee->doQuery("delete");
		$res_assignee = $del_assignee->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$dir = ASSIGNEEATTACHMENTS . $id;

		if(file_exists($dir . "/" . $row_assignee[0]['attachment'])){
			unlink($dir . "/" . $row_assignee[0]['attachment']);
			rmdir($dir);
		}

		$msg = null;
		if($res_assignee > 0){
			$msg .= "Sorry! There has been an error in deleting your Assignee. Please contact the Web Administrator.";
		}else{
			$msg .= "Assignee successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_ASSIGNEE);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE ASSIGNEE --

	// -- START EDIT ASSIGNEE --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET ASSIGNEE
		$assignee = new Table;
		$assignee->setSQLType($fms_db->getSQLType());
		$assignee->setInstance($fms_db->getInstance());
		$assignee->setView("v_assigneemaster");
		$assignee->setParam("WHERE assigneeID = '$id'");
		$assignee->doQuery("query");
		$row_assignee = $assignee->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_assignee[0]['status'];
	}
	// -- END EDIT ASSIGNEE --

	// -- START UPDATE ASSIGNEE --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$company = $_POST['txtCompany'];
		$location = $_POST['txtLocation'];
		$fName = strtoupper($_POST['txtFName']);
		$lName = strtoupper($_POST['txtLName']);
		$gender = $_POST['txtGender'];
		$age = $_POST['txtAge'];
		$contactNo1 = $_POST['txtContactNo1'];
		$contactNo2 = $_POST['txtContactNo2'];
		$address = $_POST['txtAddress'];
		$costCenter = $_POST['txtCostCenter'];
		$immediateHead = $_POST['txtImmediateHead'];
		$immediateEmailAddress = $_POST['txtImmediateEmailAddress'];
		$department = $_POST['txtDepartment'];
		$attachment = $_FILES['txtAttachment']['name'];
		$oldAttachment = $_POST['txtOldAttachment'];
		$licenseNo = $_POST['txtLicenseNo'];
		$licenseRegistrationDate = $_POST['txtLicenseRegistrationDate'];
		$licenseExpirationDate = $_POST['txtLicenseExpirationDate'];
		$licenseAddress = $_POST['txtLicenseAddress'];
		$status = $_POST['txtStatus'];

		$dir = ASSIGNEEATTACHMENTS . $id;

		if($_FILES['txtAttachment']['size'] > 0){
			$fAttachment = "attachment = '$attachment',";
		}

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET ASSIGNEE
		$assignee = new Table;
		$assignee->setSQLType($fms_db->getSQLType());
		$assignee->setInstance($fms_db->getInstance());
		$assignee->setTable("assigneemaster");
		$assignee->setValues("companyID = '$company',locationID = '$location',firstname = '$fName'
						,lastname = '$lName',gender = '$gender',age = '$age',contactNo1 = '$contactNo1',contactNo2 = '$contactNo2'
						,address = '$address',costCenter = '$costCenter',immediateHead = '$immediateHead'
						,emailAddress = '$immediateEmailAddress', $fAttachment licenseNo = '$licenseNo'
						,expirationDate = '$licenseExpirationDate',licenseAddress = '$licenseAddress'
						,licenseRegistrationDate = '$licenseRegistrationDate'
						,department = '$department'
						,modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$assignee->setParam("WHERE assigneeID = '$id'");
		$assignee->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		if($_FILES['txtAttachment']['size'] > 0){
			if (!is_dir($dir)) {
				mkdir($dir, 0777, true);
			}
			if(file_exists($dir . "/" . $oldAttachment)){
				unlink($dir . "/" . $oldAttachment);
			}
			move_uploaded_file($_FILES['txtAttachment']['tmp_name'], $dir . '/' . $attachment);
		}

		$url = BASE_URL . V_ASSIGNEE;
		$msg = "Assignee successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE ASSIGNEE --
?>