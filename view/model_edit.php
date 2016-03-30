<p>
    <a href="model.php"><span class="fa fa-arrow-left"> BACK TO MODEL LIST</span></a> | 
    <a href="model_add.php"><span class="fa fa-plus-square"> ADD NEW MODEL</span></a>
</p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post">
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">Model ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="<?=$row_model[0]['modelID'];?>" disabled class="form-control input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">Description</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_model[0]['description'];?>" name="txtDescription" id="txtDescription" class="form-control input-sm" id="inputStandard">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">Variant</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_model[0]['variant'];?>" name="txtVariant" id="txtVariant" class="form-control input-sm" id="inputStandard">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">Variant Description</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_model[0]['variantDescription'];?>" name="txtVariantDesc" id="txtVariantDesc" class="form-control input-sm" id="inputStandard">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">Status</label>
                    <div class="col-sm-4">
                        <select name="txtStatus" id="txtStatus">
                            <option value="0" <? if($status == 0){ echo 'selected'; } ?>>Inactive</option>
                            <option value="1" <? if($status == 1){ echo 'selected'; } ?>>Active</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">&nbsp;</label>
                    <div class="col-xs-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> UPDATE </button>
                    </div>
                </div>
                <input type="hidden" name="update" id="update" value="1" />
            </form>
        </div>
    </div>

</div>
<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
<p><a href="model.php?delete=1&id=<?=$row_model[0]['modelID'];?>"><span class="fa fa-trash"> DELETE MODEL</span></a></p>
<? } ?>