<?
	require_once("inc/global.php"); 
    require_once(MODEL_PATH . SESSION_MODEL);

    $id = explode("_",$_GET['id']);
    $assigneeID = $id[0];
    $companyID = $id[1];
    $divid = $_GET['div'];

    switch($_GET['act']){
    	case "add": $act = 1; break;
    	case "del": $act = 0; break;
    	default: break;
    }

    // SET FMS DB
    $fms_db = new DBConfig;
    $fms_db->setFleetDB();

    // UPD ASSIGNEE COMPANY
    $updAssComp = new Table;
    $updAssComp->setSQLType($fms_db->getSQLType());
    $updAssComp->setInstance($fms_db->getInstance());
    $updAssComp->setTable("assigneemapper");
    $updAssComp->setValues("isshow = '$act'");
    $updAssComp->setParam("WHERE assigneeID = '$assigneeID' AND companyID = '$companyID' AND type = 'assignee_company' ");
    $updAssComp->doQuery("update");

    // SET ASSIGNEE COMPANY
    $assComp = new Table;
    $assComp->setSQLType($fms_db->getSQLType());
    $assComp->setInstance($fms_db->getInstance());
    $assComp->setView("v_assigneecompanymapper");
    $assComp->setParam("WHERE assigneeID = '$assigneeID' AND companyID = '$companyID' AND type = 'assignee_company'");
    $assComp->doQuery("query");
    $row_assComp = $assComp->getLists();

    // CLOSING FMS DB
    $fms_db->DBClose();
    // print_r($row_assComp);
    $checked = null;
    $act = "add";
    if($row_assComp[0]['isShow'] > 0){
        $checked = 'checked';
        $act = "del";
    }
?>

<div class="panel p6 pbn" id="<?=$divid;?>">
    <div class="of-h text-center">
        <img src="<?=COMPANYLOGOS . $row_assComp[0]['companyID'] . '/' . $row_assComp[0]['companyLogo'];?>" class="h-200" title="<?=$row_assComp[0]['companyLogo'];?>">
        <div class="row table-layout">
            <input type="checkbox" <?=$checked;?> onClick="return updateAssCompanyAccess(this.value,'<?=$act;?>','<?=$divid;?>');" name="chkCompanyID[]" id="chkCompanyID" value="<?=$row_assComp[0]['assigneeID'] . '_' . $row_assComp[0]['companyID'];?>">
            <div class="col-xs-8 va-m pln">
                <h6><?=$row_assComp[0]['companyName'];?></h6>
            </div>
        </div>
    </div>
</div>