<?
	// -- START SAVE NEW CATEGORY --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$catName = strtoupper($_POST['txtCategoryName']);
		$newNum = getNewCtrlNo("category");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW CATEGORY
		$ins_category = new Table;
		$ins_category->setSQLType($fms_db->getSQLType());
		$ins_category->setInstance($fms_db->getInstance());
		$ins_category->setTable("categorymaster");
		$ins_category->setField("categoryID,categoryName,createdBy,createdDate");
		$ins_category->setValues("'$newNum','$catName','$sys_UserID','$today'");
		$ins_category->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO CATEGORY
		UpdateCtrlNo("category");

		$url = BASE_URL . V_CATEGORY;
		$msg = "New Category successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW CATEGORY --

	// -- START DELETE CATEGORY --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// DELETE CATEGORY
		$del_category = new Table;
		$del_category->setSQLType($fms_db->getSQLType());
		$del_category->setInstance($fms_db->getInstance());
		$del_category->setTable("categorymaster");
		$del_category->setParam("WHERE categoryID = '$id'");
		$del_category->doQuery("delete");
		$res_category = $del_category->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_category > 0){
			$msg .= "Sorry! There has been an error in deleting your Category. Please contact the Web Administrator.";
		}else{
			$msg .= "Category successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_CATEGORY);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE CATEGORY --

	// -- START EDIT CATEGORY --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET CATEGORY
		$category = new Table;
		$category->setSQLType($fms_db->getSQLType());
		$category->setInstance($fms_db->getInstance());
		$category->setView("v_categorymaster");
		$category->setParam("WHERE categoryID = '$id'");
		$category->doQuery("query");
		$row_category = $category->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_category[0]['status'];
	}
	// -- END EDIT CATEGORY --

	// -- START UPDATE CATEGORY --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$catName = strtoupper($_POST['txtCategoryName']);
		$status = $_POST['txtStatus'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET CATEGORY
		$category = new Table;
		$category->setSQLType($fms_db->getSQLType());
		$category->setInstance($fms_db->getInstance());
		$category->setTable("categorymaster");
		$category->setValues("categoryName = '$catName', modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$category->setParam("WHERE categoryID = '$id'");
		$category->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_CATEGORY;
		$msg = "Category successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE CATEGORY --
?>