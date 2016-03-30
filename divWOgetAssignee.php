<?
	require_once("inc/global.php"); 
	require_once(MODEL_PATH . SESSION_MODEL);
    require_once(MODEL_PATH . USERMENU_MODEL);
    require_once(MODEL_PATH . OPENREMINDERS_MODEL);
    
    $id = $_GET['id'];
    
    // SET FMS DB
	$fms_db = new DBConfig;
	$fms_db->setFleetDB();

	// SET EQUIPMENT
	$equipmentmst = new Table;
	$equipmentmst->setSQLType($fms_db->getSQLType());
	$equipmentmst->setInstance($fms_db->getInstance());
	$equipmentmst->setView("v_equipmentmaster");
	$equipmentmst->setParam("WHERE equipmentID = '$id'");
	$equipmentmst->doQuery("query");
	$row_equipmentmst = $equipmentmst->getLists();

	// CLOSING FMS DB
	$fms_db->DBClose();
?>
<span id="assignee"><input type="text" value="<?=$row_equipmentmst[0]['assigneeName'];?>" class="form-control gui-input input-sm" placeholder="Please select equipment above.." /></span>