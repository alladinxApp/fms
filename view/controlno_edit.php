<p>
    <a href="controlno.php"><span class="fa fa-arrow-left"> BACK TO CONTROL NO LIST</span></a> | 
    <a href="controlno_add.php"><span class="fa fa-plus-square"> ADD NEW CONTROL NO</span></a>
</p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="controlno-form">
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">ID</label>
                    <div class="col-sm-4">
                        <input type="text" placeholder="<?=$row_ctrlno[0]['id'];?>" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtDescription">Description</label>
                    <div class="col-sm-4">
                        <input type="text" name="txtDescription" value="<?=$row_ctrlno[0]['description'];?>" id="txtDescription" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtControlType">Control Type</label>
                    <div class="col-sm-4">
                        <input type="text" name="txtControlType" value="<?=$row_ctrlno[0]['type'];?>" id="txtControlType" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtControlCode">Control Code</label>
                    <div class="col-sm-4">
                        <input type="text" name="txtControlCode" value="<?=$row_ctrlno[0]['code'];?>" id="txtControlCode" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtNoOfDigit">No of Digit</label>
                    <div class="col-sm-4">
                        <input type="text" name="txtNoOfDigit" value="<?=$row_ctrlno[0]['noOfDigit'];?>" id="txtNoOfDigit" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtLastDigit">Last Digit</label>
                    <div class="col-sm-4">
                        <input type="text" name="txtLastDigit" value="<?=$row_ctrlno[0]['lastDigit'];?>" id="txtLastDigit" class="form-control gui-input input-sm" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2" for="txtStatus">Status</label>
                    <div class="col-sm-4">
                        <select name="txtStatus" id="txtStatus">
                            <option value="0" <? if($status == 0){ echo 'selected'; } ?>>Inactive</option>
                            <option value="1" <? if($status == 1){ echo 'selected'; } ?>>Active</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2">&nbsp;</label>
                    <div class="col-sm-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> UPDATE </button>
                    </div>
                </div>
                <input type="hidden" name="update" id="update" value="1" />
            </form>
        </div>
    </div>

</div>
<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
<p><a href="controlno.php?delete=1&id=<?=$row_ctrlno[0]['id'];?>"><span class="fa fa-trash"> DELETE CONTROL NO</span></a></p>
<? } ?>