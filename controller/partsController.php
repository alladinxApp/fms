<?
	// -- START SAVE NEW PARTS --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$stockCode = $_POST['txtStockCode'];
		$brand = strtoupper($_POST['txtBrand']);
		$model = strtoupper($_POST['txtModel']);
		$desc = strtoupper($_POST['txtDescription']);
		$stockOnHand = str_replace(",","",$_POST['txtStockOnHand']);
		$lowStockQty = str_replace(",","",$_POST['txtLowStockQty']);
		$price = str_replace(",","",$_POST['txtPrice']);
		$retailPrice = str_replace(",","",$_POST['txtRetailPrice']);
		$newNum = getNewCtrlNo("parts");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW PARTS
		$ins_parts = new Table;
		$ins_parts->setSQLType($fms_db->getSQLType());
		$ins_parts->setInstance($fms_db->getInstance());
		$ins_parts->setTable("partsmaster");
		$ins_parts->setField("partsID,stockCode,brand,model,description,stockOnHand,lowStockQty,price,retailPrice
							,createdBy,createdDate");
		$ins_parts->setValues("'$newNum','$stockCode','$brand','$model','$desc','$stockOnHand','$lowStockQty','$price','$retailPrice'
							,'$sys_UserID','$today'");
		$ins_parts->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO PARTS
		UpdateCtrlNo("parts");

		$url = BASE_URL . V_PARTS;
		$msg = "New Parts successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW PARTS --

	// -- START DELETE PARTS --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// DELETE PARTS
		$del_parts = new Table;
		$del_parts->setSQLType($fms_db->getSQLType());
		$del_parts->setInstance($fms_db->getInstance());
		$del_parts->setTable("partsmaster");
		$del_parts->setParam("WHERE partsID = '$id'");
		$del_parts->doQuery("delete");
		$res_parts = $del_parts->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_parts > 0){
			$msg .= "Sorry! There has been an error in deleting your Parts. Please contact the Web Administrator.";
		}else{
			$msg .= "Parts successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_PARTS);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE PARTS --

	// -- START EDIT PARTS --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET PARTS
		$parts = new Table;
		$parts->setSQLType($fms_db->getSQLType());
		$parts->setInstance($fms_db->getInstance());
		$parts->setView("v_partsmaster");
		$parts->setParam("WHERE partsID = '$id'");
		$parts->doQuery("query");
		$row_parts = $parts->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_parts[0]['status'];
	}
	// -- END EDIT PARTS --

	// -- START UPDATE PARTS --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$stockCode = $_POST['txtStockCode'];
		$brand = $_POST['txtBrand'];
		$model = $_POST['txtModel'];
		$desc = $_POST['txtDescription'];
		$stockOnHand = str_replace(",","",$_POST['txtStockOnHand']);
		$lowStockQty = str_replace(",","",$_POST['txtLowStockQty']);
		$price = str_replace(",","",$_POST['txtPrice']);
		$retailPrice = str_replace(",","",$_POST['txtRetailPrice']);
		$status = $_POST['txtStatus'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET PARTS
		$parts = new Table;
		$parts->setSQLType($fms_db->getSQLType());
		$parts->setInstance($fms_db->getInstance());
		$parts->setTable("partsmaster");
		$parts->setValues("stockCode = '$stockCode', brand = '$brand', model = '$model', description = '$desc'
						, stockOnHand = '$stockOnHand', lowStockQty = '$lowStockQty', price = '$price', retailPrice = '$retailPrice'
						, modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$parts->setParam("WHERE partsID = '$id'");
		$parts->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_PARTS;
		$msg = "Parts successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE PARTS --
?>