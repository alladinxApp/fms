<?
	// -- START SAVE NEW USER --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$userID = $_POST['txtUserID'];
		$fName = strtoupper($_POST['txtFName']);
		$lName = strtoupper($_POST['txtLName']);
		$userType = $_POST['txtUserType'];
		$accessLvl = $_POST['txtAccessLvl'];
		$fileName = $_FILES['txtUserPic']['name'];
		$password = generatePassword(strtoupper($userID));

		$dir = USERPICS . strtoupper($userID);

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		$chk_user = new Table;
		$chk_user->setSQLType($fms_db->getSQLType());
		$chk_user->setInstance($fms_db->getInstance());
		$chk_user->setView("v_usermaster");
		$chk_user->setParam("WHERE userID = '$userID'");
		$chk_user->doQuery("query");
		$num_chkuser = $chk_user->getNumRows();

		if($num_chkuser == 0){
			// SAVE NEW USER
			$ins_user = new Table;
			$ins_user->setSQLType($fms_db->getSQLType());
			$ins_user->setInstance($fms_db->getInstance());
			$ins_user->setTable("usermaster");
			$ins_user->setField("userID,userPass,firstname,lastname,userType,accessLevel,userPic,createdBy,createdDate");
			$ins_user->setValues("'$userID','$password','$fName','$lName','$userType','$accessLvl','$fileName','$sys_UserID','$today'");
			$ins_user->doQuery("save");

			if($_FILES['txtUserPic']['size'] > 0){
				if (!file_exists($dir . "/" . $fileName)) {
					mkdir($dir, 0777, true);
				}
				move_uploaded_file($_FILES['txtUserPic']['tmp_name'], $dir . '/' . $fileName);
			}

			$url = BASE_URL . V_USER;
			$msg = "New User successfully saved.";
		}else{
			$url = BASE_URL . V_USERADD;
			$msg = "Sorry! User ID is already existed. Please enter an unexisted user ID.";
		}

		// CLOSING FMS DB
		$fms_db->DBClose();
		
		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW USER --

	// -- START DELETE USER --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// GET USER INFO
		$getuser = new Table;
		$getuser->setSQLType($fms_db->getSQLType());
		$getuser->setInstance($fms_db->getInstance());
		$getuser->setView("v_usermaster");
		$getuser->setParam("WHERE userID = '$id'");
		$getuser->doQuery("query");
		$row_getuser = $getuser->getLists();

		// DELETE USER
		$del_user = new Table;
		$del_user->setSQLType($fms_db->getSQLType());
		$del_user->setInstance($fms_db->getInstance());
		$del_user->setTable("usermaster");
		$del_user->setParam("WHERE userID = '$id'");
		$del_user->doQuery("delete");
		$res_user = $del_user->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_user > 0){
			$msg .= "Sorry! There has been an error in deleting your User. Please contact the Web Administrator.";
		}else{
			$dir = USERPICS . strtoupper($id);
			
			unlink($dir . "/" . $row_getuser[0]['userPic']);
			rmdir($dir);
			$msg .= "User successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_USER);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE USER --

	// -- START EDIT USER --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET CONTROL NO
		$user = new Table;
		$user->setSQLType($fms_db->getSQLType());
		$user->setInstance($fms_db->getInstance());
		$user->setView("v_usermaster");
		$user->setParam("WHERE userID = '$id'");
		$user->doQuery("query");
		$row_user = $user->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_user[0]['status'];
		$userType = $row_user[0]['userType'];
		$accessLvl = $row_user[0]['accessLevel'];
	}
	// -- END EDIT USER --

	// -- START UPDATE USER --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$userID = $_POST['txtUserID'];
		$fName = strtoupper($_POST['txtFName']);
		$lName = strtoupper($_POST['txtLName']);
		$userType = $_POST['txtUserType'];
		$accessLvl = $_POST['txtAccessLvl'];
		$status = $_POST['txtStatus'];
		$fileName = $_FILES['txtUserPic']['name'];
		$oldPic = $_POST['txtOldUserPic'];
		
		$userPass = null;
		$file = null;

		if(!empty($_POST['txtUserPass'])){
			$password = generatePassword(strtoupper($_POST['txtUserPass']));
			$userPass = "userPass = '$password',";
		}
		if(!empty($_FILES['txtUserPic']['name'])){
			$file = "userPic = '$fileName',";
		}

		$dir = USERPICS . strtoupper($id);
		
		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET USER
		$user = new Table;
		$user->setSQLType($fms_db->getSQLType());
		$user->setInstance($fms_db->getInstance());
		$user->setTable("usermaster");
		$user->setValues("$userPass $file firstname = '$fName', lastname = '$lName', userType = '$userType'
							,accessLevel = '$accessLvl', modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$user->setParam("WHERE userID = '$id'");
		$user->doQuery("update");

		if($_FILES['txtUserPic']['size'] > 0){
			if (!is_dir($dir)) {
				mkdir($dir, 0777, true);
			}
			unlink($dir . "/" . $oldPic);
			move_uploaded_file($_FILES['txtUserPic']['tmp_name'], $dir . '/' . $fileName);
		}

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_USER;
		$msg = "User successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE USER --

	// USER CHANGE PASSWORD
	if(isset($_POST['changepass']) && !empty($_POST['changepass']) && $_POST['changepass'] == 1){
		$id = $sys_UserID;

		$old = $_POST['txtOldUserPass'];
		$new = $_POST['txtNewUserPass'];
		$con = $_POST['txtConUserPass'];

		// GENERATE OLD PASSWORD ENTERED
		$oldpass = generatePassword(strtoupper($old));

		if($oldpass != $userPass){
			$url = BASE_URL . V_USERCHANGEPASSWORD;
			$msg = "Old password do not matched! Please enter corrent old password.";

			$alert = new MessageAlert();
			$alert->setURL($url);
			$alert->setMessage($msg);
			$alert->Alert();
		}

		if($new != $con){
			$url = BASE_URL . V_USERCHANGEPASSWORD;
			$msg = "Password do not matched!";

			$alert = new MessageAlert();
			$alert->setURL($url);
			$alert->setMessage($msg);
			$alert->Alert();
		}

		// GENERATE NEW PASSWORD ENTERED
		$newpass = generatePassword(strtoupper($new));

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET USER
		$user = new Table;
		$user->setSQLType($fms_db->getSQLType());
		$user->setInstance($fms_db->getInstance());
		$user->setTable("usermaster");
		$user->setValues("userPass = '$newpass'");
		$user->setParam("WHERE userID = '$id'");
		$user->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_USERCHANGEPASSWORD;
		$msg = "Password successfully changed.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// --END USER CHANGE PASSWORD --
?>