<?
	// -- START SAVE NEW DEPARTMENT --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$deptName = strtoupper($_POST['txtDepartmentName']);
		$newNum = getNewCtrlNo("department");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW DEPARTMENT
		$ins_department = new Table;
		$ins_department->setSQLType($fms_db->getSQLType());
		$ins_department->setInstance($fms_db->getInstance());
		$ins_department->setTable("departmentmaster");
		$ins_department->setField("departmentID,departmentName,createdBy,createdDate");
		$ins_department->setValues("'$newNum','$deptName','$sys_UserID','$today'");
		$ins_department->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO DEPARTMENT
		UpdateCtrlNo("department");

		$url = BASE_URL . V_DEPARTMENT;
		$msg = "New Department successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW DEPARTMENT --

	// -- START DELETE DEPARTMENT --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// DELETE DEPARTMENT
		$del_department = new Table;
		$del_department->setSQLType($fms_db->getSQLType());
		$del_department->setInstance($fms_db->getInstance());
		$del_department->setTable("departmentmaster");
		$del_department->setParam("WHERE departmentID = '$id'");
		$del_department->doQuery("delete");
		$res_department = $del_department->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_department > 0){
			$msg .= "Sorry! There has been an error in deleting your Department. Please contact the Web Administrator.";
		}else{
			$msg .= "Department successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_DEPARTMENT);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE DEPARTMENT --

	// -- START EDIT DEPARTMENT --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET DEPARTMENT
		$department = new Table;
		$department->setSQLType($fms_db->getSQLType());
		$department->setInstance($fms_db->getInstance());
		$department->setView("v_departmentmaster");
		$department->setParam("WHERE departmentID = '$id'");
		$department->doQuery("query");
		$row_department = $department->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_department[0]['status'];
	}
	// -- END EDIT DEPARTMENT --

	// -- START UPDATE DEPARTMENT --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$deptName = strtoupper($_POST['txtDepartmentName']);
		$status = $_POST['txtStatus'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET DEPARTMENT
		$department = new Table;
		$department->setSQLType($fms_db->getSQLType());
		$department->setInstance($fms_db->getInstance());
		$department->setTable("departmentmaster");
		$department->setValues("departmentName = '$deptName', modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$department->setParam("WHERE departmentID = '$id'");
		$department->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_DEPARTMENT;
		$msg = "Department successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE DEPARTMENT --
?>