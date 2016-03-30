<?
	// SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET USER
	$usermst = new Table;
	$usermst->setSQLType($fms_db->getSQLType());
	$usermst->setInstance($fms_db->getInstance());
	$usermst->setView("v_usermaster");
	$usermst->setParam("ORDER BY userID");
	$usermst->doQuery("query");
	$row_usermst = $usermst->getLists();

	// GET USER
	$getuser = new Table;
	$getuser->setSQLType($fms_db->getSQLType());
	$getuser->setInstance($fms_db->getInstance());
	$getuser->setView("v_usermaster");
	$getuser->setParam("WHERE userID = '$sys_UserID'");
	$getuser->doQuery("query");
	$row_getuser = $getuser->getLists();

	$userPass = $row_getuser[0]['userPass'];

	// CLOSING FMS DB
	$fms_db->DBClose();

	function generatePassword($password){
		$salt = 'FleetManagementSystem';
		$newpass = md5(sha1($salt.$password));
		return $newpass;
	}
?>