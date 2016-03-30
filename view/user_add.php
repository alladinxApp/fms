<p><a href="user.php"><span class="fa fa-arrow-left"> BACK TO USER LIST</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" enctype="multipart/form-data" id="user-form">
                <div class="form-group">
                    <label class="col-sm-2" for="txtUserID">User ID</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtUserID" id="txtUserID" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtFName">First Name</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtFName" id="txtFName" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtLName">Last Name</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtLName" id="txtLName" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtUserPic">User Picture</label>
                    <div class="col-md-4">
                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail mb15">
                                <img data-src="holder.js/100%x147" alt="holder">
                            </div>
                            <span class="button btn-system btn-file btn-block ph5">
                                <span class="fileupload-new">Select</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="txtUserPic" id="txtUserPic" />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtUserType">User Type</label>
                    <div class="col-sm-4">
                        <select name="txtUserType" id="txtUserType">
                            <option value="1">Admin</option>
                            <option value="2" selected>User</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtAccessLvl">Access Level</label>
                    <div class="col-sm-4">
                        <select name="txtAccessLvl" id="txtAccessLvl">
                            <option value="1">Super Admin</option>
                            <option value="2" selected>Admin User</option>
                            <option value="3">Staff</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">&nbsp;</label>
                    <div class="col-xs-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> SAVE </button>
                    </div>
                </div>
                <input type="hidden" name="save" id="save" value="1" />
            </form>
        </div>
    </div>

</div>