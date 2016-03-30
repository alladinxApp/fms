<?
	// -- START SAVE NEW MODEL --
	if(isset($_POST['save']) && !empty($_POST['save']) && $_POST['save'] == 1){
		$desc = strtoupper($_POST['txtDescription']);
		$variant = strtoupper($_POST['txtVariant']);
		$variantDesc = strtoupper($_POST['txtVariantDesc']);
		$newNum = getNewCtrlNo("model");

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SAVE NEW MODEL
		$ins_make = new Table;
		$ins_make->setSQLType($fms_db->getSQLType());
		$ins_make->setInstance($fms_db->getInstance());
		$ins_make->setTable("modelmaster");
		$ins_make->setField("modelID,description,variant,variantDescription,createdBy,createdDate");
		$ins_make->setValues("'$newNum','$desc','$variant','$variantDesc','$sys_UserID','$today'");
		$ins_make->doQuery("save");

		// CLOSING FMS DB
		$fms_db->DBClose();

		// UPDATE CONTROL NO MODEL
		UpdateCtrlNo("model");

		$url = BASE_URL . V_MODEL;
		$msg = "New Model successfully saved.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END SAVE NEW MODEL --

	// -- START DELETE MODEL --
	if(isset($_GET['delete']) && !empty($_GET['delete']) && $_GET['delete'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// DELETE MODEL
		$del_model = new Table;
		$del_model->setSQLType($fms_db->getSQLType());
		$del_model->setInstance($fms_db->getInstance());
		$del_model->setTable("modelmaster");
		$del_model->setParam("WHERE modelID = '$id'");
		$del_model->doQuery("delete");
		$res_model = $del_model->getError();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$msg = null;
		if($res_model > 0){
			$msg .= "Sorry! There has been an error in deleting your Model. Please contact the Web Administrator.";
		}else{
			$msg .= "Model successfully deleted.";
		}

		$alert = new MessageAlert();
		$alert->setURL(BASE_URL . V_MODEL);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END DELETE MODEL --

	// -- START EDIT MODEL --
	if(isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 1 && !empty($_GET['id'])){
		$id = $_GET['id'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET MODEL
		$model = new Table;
		$model->setSQLType($fms_db->getSQLType());
		$model->setInstance($fms_db->getInstance());
		$model->setView("v_modelmaster");
		$model->setParam("WHERE modelID = '$id'");
		$model->doQuery("query");
		$row_model = $model->getLists();

		// CLOSING FMS DB
		$fms_db->DBClose();

		$status = $row_model[0]['status'];
	}
	// -- END EDIT MODEL --

	// -- START UPDATE MODEL --
	if(isset($_POST['update']) && !empty($_POST['update']) && $_POST['update'] == 1){
		$id = $_GET['id'];
		$desc = strtoupper($_POST['txtDescription']);
		$variant = strtoupper($_POST['txtVariant']);
		$variantDesc = strtoupper($_POST['txtVariantDesc']);
		$status = $_POST['txtStatus'];

		// SET FMS DB
		$fms_db = new DBConfig;
		$fms_db->setFleetDB();

		// SET MODEL
		$model = new Table;
		$model->setSQLType($fms_db->getSQLType());
		$model->setInstance($fms_db->getInstance());
		$model->setTable("modelmaster");
		$model->setValues("description = '$desc', variant = '$variant', variantDescription = '$variantDesc'
					, modifiedBy = '$sys_UserID', modifiedDate = '$today', status = '$status'");
		$model->setParam("WHERE modelID = '$id'");
		$model->doQuery("update");

		// CLOSING FMS DB
		$fms_db->DBClose();

		$url = BASE_URL . V_MODEL;
		$msg = "Model successfully updated.";

		$alert = new MessageAlert();
		$alert->setURL($url);
		$alert->setMessage($msg);
		$alert->Alert();
	}
	// -- END UPDATE MODEL --
?>