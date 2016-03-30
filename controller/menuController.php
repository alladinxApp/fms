<?
	// -- START SAVE NEW MENU --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$menuName = $_POST['txtMenuName'];
		$menuController = $_POST['txtMenuController'];
		$isMaintenance = $_POST['txtIsMenuMaintenance'];
		$isTransaction = $_POST['txtIsMenuTransaction'];
		$isReport = $_POST['txtIsMenuReport'];
		$sortNo = $_POST['txtSortNo'];
		if(!empty($_POST['txtGlyphicon'])){
			$glyphicon = $_POST['txtGlyphicon'];
		}else{
			$glyphicon = "glyphicons glyphicons-book";
		}
		$newNum = getNewCtrlNo("menu");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW MENU
		$ins_menu = new Table;
		$ins_menu->setSQLType($fms_db->getSQLType());
		$ins_menu->setInstance($fms_db->getInstance());
		$ins_menu->setTable("menumaster");
		$ins_menu->setField("menuID,menuName,menuController,glyphicon,isMenuMaintenance,isMenuTransactions,isMenuReport,SortNo
						,createdBy,createdDate");
		$ins_menu->setValues("'$newNum','$menuName','$menuController','$glyphicon','$isMaintenance','$isTransaction','$isReport','$sortNo'
						,'$sys_UserID','$today'");
		$ins_menu->doQuery("save");

		// UPDATE CONTROL NO MENU
		$upd_ctrlno = new Table;
		$upd_ctrlno->setSQLType($fms_db->getSQLType());
		$upd_ctrlno->setInstance($fms_db->getInstance());
		$upd_ctrlno->setTable("controlnomaster");
		$upd_ctrlno->setValues("lastDigit = (lastDigit + 1)");
		$upd_ctrlno->setParam("WHERE type = 'menu'");
		$upd_ctrlno->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_MENU;
		$msg = "New Menu successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW MENU --

	// -- START DELETE MENU --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// DELETE MENU
		$del_menu = new Table;
		$del_menu->setSQLType($fms_db->getSQLType());
		$del_menu->setInstance($fms_db->getInstance());
		$del_menu->setTable("menumaster");
		$del_menu->setParam("WHERE menuID = '$id'");
		$del_menu->doQuery("delete");
		$res_menu = $del_menu->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_menu > 0){
			$msg .= "Sorry! There has been an error in deleting your Menu. Please contact the Web Administrator.";
		}else{
			$msg .= "Menu successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_MENU);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE MENU --

	// -- START EDIT CONTROL NO --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET CONTROL NO
		$menu = new Table;
		$menu->setSQLType($fms_db->getSQLType());
		$menu->setInstance($fms_db->getInstance());
		$menu->setView("v_menumaster");
		$menu->setParam("WHERE menuID = '$id'");
		$menu->doQuery("query");
		$row_menu = $menu->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_menu[0]['status'];
		$isMenuMaintenance = $row_menu[0]['isMenuMaintenance'];
		$isMenuTransaction = $row_menu[0]['isMenuTransactions'];
		$isMenuReport = $row_menu[0]['isMenuReport'];
	}
	// -- END EDIT CONTROL NO --

	// -- START UPDATE CONTROL NO --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$menuName = $_POST['txtMenuName'];
		$menuController = $_POST['txtMenuController'];
		$isMaintenance = $_POST['txtIsMenuMaintenance'];
		$isTransaction = $_POST['txtIsMenuTransaction'];
		$isReport = $_POST['txtIsMenuReport'];
		$sortNo = $_POST['txtSortNo'];
		$status = $_POST['txtStatus'];
		if(!empty($_POST['txtGlyphicon'])){
			$glyphicon = $_POST['txtGlyphicon'];
		}else{
			$glyphicon = "glyphicons glyphicons-book";
		}

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET CONTROL NO
		$menu = new Table;
		$menu->setSQLType($fms_db->getSQLType());
		$menu->setInstance($fms_db->getInstance());
		$menu->setTable("menumaster");
		$menu->setValues("menuName = '$menuName', menuController = '$menuController', glyphicon = '$glyphicon', isMenuMaintenance = '$isMaintenance', 
							isMenuTransactions = '$isTransaction', isMenuReport = '$isReport', sortNo = '$sortNo',
							modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$menu->setParam("WHERE menuID = '$id'");
		$menu->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_MENU;
		$msg = "Control No successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE CONTROL NO --
?>