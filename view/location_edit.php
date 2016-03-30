<p>
    <a href="location.php"><span class="fa fa-arrow-left"> BACK TO LOCATION LIST</span></a> | 
    <a href="location_add.php"><span class="fa fa-plus-square"> ADD NEW LOCATION</span></a>
</p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="location-form">
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">Location ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="<?=$row_location[0]['locationID'];?>" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtLocationName">Location Name</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_location[0]['locationName'];?>" name="txtLocationName" id="txtLocationName" class="form-control gui-input input-sm" />
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
<p><a href="location.php?delete=1&id=<?=$row_location[0]['locationID'];?>"><span class="fa fa-trash"> DELETE LOCATION</span></a></p>
<? } ?>