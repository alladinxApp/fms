<p>
    <a href="user.php"><span class="fa fa-arrow-left"> BACK TO USER LIST</span></a> |
    <a href="user_access.php"><span class="fa fa-list-alt"> USER MENU ACCESS</span></a> | 
    <a href="user_add.php"><span class="fa fa-plus-square"> ADD NEW USER</span></a>
</p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" enctype="multipart/form-data" id="user-form">
                <div class="form-group">
                    <label class="col-sm-3" for="inputStandard">User ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="<?=$row_user[0]['userID'];?>" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtUserPass">Password</label>
                    <div class="col-lg-4">
                        <input type="password" name="txtUserPass" id="txtUserPass" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtFName">First Name</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_user[0]['firstname'];?>" name="txtFName" id="txtFName" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLName">Last Name</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_user[0]['lastname'];?>" name="txtLName" id="txtLName" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtUserPic">User Picture</label>
                    <div class="col-md-3">
                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail mb15">
                                <? if(!empty($row_user[0]['userPic'])){ ?>
                                <img src="<?=USERPICS . strtoupper($row_user[0]['userID']) . "/" . $row_user[0]['userPic'];?>" alt="<?=$row_user[0]['userPic'];?>">
                                <? }else{ ?>
                                <img data-src="holder.js/100%x147" alt="holder">
                                <? } ?>
                            </div>
                            <span class="button btn-system btn-file btn-block ph5">
                                <span class="fileupload-new">Select</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="txtUserPic" id="txtUserPic" />
                            </span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="txtOldUserPic" id="txtOldUserPic" value="<?=$row_user[0]['userPic'];?>" />
                <div class="form-group">
                    <label class="col-sm-3" for="txtUserType">User Type</label>
                    <div class="col-sm-4">
                        <select name="txtUserType" id="txtUserType">
                            <option value="1" <? if($userType == 1){ echo 'selected'; } ?>>Admin</option>
                            <option value="2" <? if($userType == 2){ echo 'selected'; } ?>>User</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtAccessLvl">Access Level</label>
                    <div class="col-sm-4">
                        <select name="txtAccessLvl" id="txtAccessLvl">
                            <option value="1" <? if($accessLvl == 1){ echo 'selected'; } ?>>Super Admin</option>
                            <option value="2" <? if($accessLvl == 2){ echo 'selected'; } ?>>Admin User</option>
                            <option value="3" <? if($accessLvl == 3){ echo 'selected'; } ?>>Staff</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtStatus">Status</label>
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
<p><a href="user.php?delete=1&id=<?=$row_user[0]['userID'];?>"><span class="fa fa-trash"> DELETE USER</span></a></p>
<? } ?>