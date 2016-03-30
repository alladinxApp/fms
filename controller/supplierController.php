<?
	// -- START SAVE NEW SUPPLIER --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$suppName = strtoupper($_POST['txtSupplierName']);
		$suppAddress = $_POST['txtSupplierAddress'];
		$suppEmailAddress = $_POST['txtSupplierEmailAddress'];
		$suppContactNo = $_POST['txtSupplierContactNo'];
		$suppContactPerson = $_POST['txtSupplierContactPerson'];
		$suppTIN = $_POST['txtSupplierTIN'];
		$newNum = getNewCtrlNo("supplier");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW SUPPLIER
		$ins_category = new Table;
		$ins_category->setSQLType($fms_db->getSQLType());
		$ins_category->setInstance($fms_db->getInstance());
		$ins_category->setTable("suppliermaster");
		$ins_category->setField("supplierID,supplierName,supplierAddress,supplierEmailAddress,supplierContactNo,contactPerson
							,TIN,createdBy,createdDate");
		$ins_category->setValues("'$newNum','$suppName','$suppAddress','$suppEmailAddress','$suppContactNo','$suppContactPerson'
							,'$suppTIN','$sys_UserID','$today'");
		$ins_category->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO SUPPLIER
		UpdateCtrlNo("supplier");

		$url = BASE_URL . V_SUPPLIER;
		$msg = "New Supplier successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW SUPPLIER --

	// -- START DELETE SUPPLIER --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// DELETE SUPPLIER
		$del_supplier = new Table;
		$del_supplier->setSQLType($fms_db->getSQLType());
		$del_supplier->setInstance($fms_db->getInstance());
		$del_supplier->setTable("suppliermaster");
		$del_supplier->setParam("WHERE supplierID = '$id'");
		$del_supplier->doQuery("delete");
		$res_category = $del_supplier->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_category > 0){
			$msg .= "Sorry! There has been an error in deleting your Supplier. Please contact the Web Administrator.";
		}else{
			$msg .= "Supplier successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_SUPPLIER);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE SUPPLIER --

	// -- START EDIT SUPPLIER --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET SUPPLIER
		$supplier = new Table;
		$supplier->setSQLType($fms_db->getSQLType());
		$supplier->setInstance($fms_db->getInstance());
		$supplier->setView("v_suppliermaster");
		$supplier->setParam("WHERE supplierID = '$id'");
		$supplier->doQuery("query");
		$row_supplier = $supplier->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_supplier[0]['status'];
	}
	// -- END EDIT SUPPLIER --

	// -- START UPDATE SUPPLIER --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$suppName = strtoupper($_POST['txtSupplierName']);
		$suppAddress = $_POST['txtSupplierAddress'];
		$suppEmailAddress = $_POST['txtSupplierEmailAddress'];
		$suppContactNo = $_POST['txtSupplierContactNo'];
		$suppContactPerson = $_POST['txtSupplierContactPerson'];
		$suppTIN = $_POST['txtSupplierTIN'];
		$status = $_POST['txtStatus'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET SUPPLIER
		$supplier = new Table;
		$supplier->setSQLType($fms_db->getSQLType());
		$supplier->setInstance($fms_db->getInstance());
		$supplier->setTable("suppliermaster");
		$supplier->setValues("supplierName = '$suppName',supplierAddress = '$suppAddress',supplierEmailAddress = '$suppEmailAddress'
						,supplierContactNo = '$suppContactNo',contactPerson = '$suppContactPerson',TIN = '$suppTIN'
						,modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$supplier->setParam("WHERE supplierID = '$id'");
		$supplier->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_SUPPLIER;
		$msg = "Supplier successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE SUPPLIER --
?>