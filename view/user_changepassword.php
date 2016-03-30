<h2>CHANGE PASSWORD</h2>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="user-form">
                <div class="form-group">
                    <label class="col-sm-3" for="inputStandard">User ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="<?=$sys_UserID;?>" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtOldUserPass">Old Password</label>
                    <div class="col-lg-4">
                        <input type="password" name="txtOldUserPass" id="txtOldUserPass" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtNewUserPass">New Password</label>
                    <div class="col-lg-4">
                        <input type="password" name="txtNewUserPass" id="txtNewUserPass" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtConUserPass">Confirm Password</label>
                    <div class="col-lg-4">
                        <input type="password" name="txtConUserPass" id="txtConUserPass" class="form-control gui-input input-sm" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3">&nbsp;</label>
                    <div class="col-xs-2">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> CHANGE PASSWORD </button>
                    </div>
                </div>
                <input type="hidden" name="changepass" id="changepass" value="1" />
            </form>
        </div>
    </div>

</div>