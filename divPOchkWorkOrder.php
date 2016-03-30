<? 
    require_once("inc/global.php"); 
    require_once(MODEL_PATH . SESSION_MODEL);
    require_once(MODEL_PATH . USERMENU_MODEL);
    require_once(MODEL_PATH . OPENREMINDERS_MODEL);

    $wo = $_GET['wo'];
    $exist = 0;
    
    // SET FMS DB
    $fms_db = new DBConfig;
    $fms_db->setFleetDB();

    if(!empty($wo)){    
        // SET WORK ORDER
        $workordermst = new Table;
        $workordermst->setSQLType($fms_db->getSQLType());
        $workordermst->setInstance($fms_db->getInstance());
        $workordermst->setView("v_workordermaster");
        $workordermst->setParam("WHERE woReferenceNo = '$wo' AND status NOT IN('5','6','7','8') ");
        $workordermst->doQuery("query");
        $num_workordermst = $workordermst->getNumRows();

        if($num_workordermst == 0){
            $placeholder = "Work Order Reference # not existed!";
            $wo = null;
        }
    }else{
        $placeholder = "Enter Work Order here...";
    }

    // CLOSING FMS DB
    $fms_db->DBClose();
?>
<span id="divTxtWorkOrder">
	<input type="text" name="txtWorkOrderNo" id="txtWorkOrderNo" value="<?=$wo;?>" onBlur="chkWorkOrder(this.value);" placeholder="<?=$placeholder;?>" class="form-control gui-input input-sm" id="disabledInput">
</span>