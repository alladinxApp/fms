<div id="mix-container">
    <? 
        if($num_assigneecompany > 0){
            $cnt = 1;
            for($i=0;$i<count($row_assigneecompany);$i++){
                $checked = null;
                $act = "add";
                if($row_assigneecompany[$i]['isShow'] > 0){
                    $checked = 'checked';
                    $act = "del";
                }
                $divID = 'ac_' . $row_assigneecompany[$i]['companyID'];
    ?>
        <div class="mix label<?=$cnt;?> folder<?=$cnt;?> col-lg-3">
            <div class="panel p6 pbn" id="<?=$divID;?>">
                <div class="of-h text-center">
                    <img src="<?=COMPANYLOGOS . $row_assigneecompany[$i]['companyID'] . '/' . $row_assigneecompany[$i]['companyLogo'];?>" class="h-200" title="<?=$row_assigneecompany[$i]['companyLogo'];?>">
                    <div class="row table-layout">
                        <input type="checkbox" <?=$checked;?> onClick="return updateAssCompanyAccess(this.value,'<?=$act;?>','<?=$divID;?>');" name="chkCompanyID[]" id="chkCompanyID" value="<?=$row_assigneecompany[$i]['assigneeID'] . '_' . $row_assigneecompany[$i]['companyID'];?>">
                        <div class="col-xs-8 va-m pln">
                            <h6><?=$row_assigneecompany[$i]['companyName'];?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <? 
                $cnt++;
                if($cnt > 3){
                    $cnt = 1;
                }
            }
        }else{ 
    ?>
        <div class="fail-message">
            <h2 class="text-center"><span>Please contact the web administrator for your company access!</span></h2>
        </div>
    <? } ?>
</div>