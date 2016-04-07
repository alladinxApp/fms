<p><a href="assignee.php"><span class="fa fa-arrow-left"> BACK TO ASSIGNEE LIST</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" enctype="multipart/form-data" id="assignee-form">
                <div class="form-group">
                    <label class="col-sm-3" for="inputStandard">ASSIGNEE ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="[SYSTEM GENERATED]" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompany">Company</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtCompany" id="txtCompany">
                            <option value="">Select Company</option>
                            <? for($i=0;$i<count($row_companymst);$i++){ ?>
                            <option value="<?=$row_companymst[$i]['companyID'];?>"><?=$row_companymst[$i]['companyName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLocation">Location</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtLocation" id="txtLocation">
                            <option value="">Select Location</option>
                            <? for($i=0;$i<count($row_locationmst);$i++){ ?>
                            <option value="<?=$row_locationmst[$i]['locationID'];?>"><?=$row_locationmst[$i]['locationName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtFName">First Name</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtFName" id="txtFName" class="form-control gui-input input-sm" placeholder="Enter Assignee First Name Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLName">Last Name</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtLName" id="txtLName" class="form-control gui-input input-sm" placeholder="Enter Assignee Last Name Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtAge">Age</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtAge" id="txtAge" class="form-control gui-input input-sm" placeholder="0" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtGender">Gender</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtGender" id="txtGender">
                            <option value="">Select Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtContactNo1">Contact No 1</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtContactNo1" id="txtContactNo1" class="form-control gui-input input-sm" placeholder="Enter Contact No 1 Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtContactNo2">Contact No 2</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtContactNo2" id="txtContactNo2" class="form-control gui-input input-sm" placeholder="Enter Contact No 2 Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtAddress">Address</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtAddress" id="txtAddress" class="form-control gui-input input-sm" placeholder="Enter Address Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCostCenter">Cost Center</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtCostCenter" id="txtCostCenter" class="form-control gui-input input-sm" placeholder="Enter Cost Center Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtImmediateHead">Immediate Head</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtImmediateHead" id="txtImmediateHead" class="form-control gui-input input-sm" placeholder="Enter Immediate Head Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtImmediateEmailAddress">Immediate Email Address</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtImmediateEmailAddress" id="txtImmediateEmailAddress" class="form-control gui-input input-sm" placeholder="Enter Immediate Email Address Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtDepartment">Department</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtDepartment" id="txtDepartment">
                            <option value="">Select Department</option>
                            <? for($i=0;$i<count($row_departmentmst);$i++){ ?>
                            <option value="<?=$row_departmentmst[$i]['departmentID'];?>"><?=$row_departmentmst[$i]['departmentName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtAttachment">Attachment</label>
                    <div class="col-md-4">
                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail mb15">
                                <img data-src="holder.js/100%x147" alt="holder">
                            </div>
                            <span class="button btn-system btn-file btn-block ph5">
                                <span class="fileupload-new">Select</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="txtAttachment" id="txtAttachment" class="form-control gui-input input-sm" />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLicenseNo">License No</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtLicenseNo" id="txtLicenseNo" class="form-control gui-input input-sm" placeholder="Enter License No Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLicenseRegistrationDate">License Registration Date</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtLicenseRegistrationDate" id="txtLicenseRegistrationDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLicenseExpirationDate">License No Expiration Date</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtLicenseExpirationDate" id="txtLicenseExpirationDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLicenseAddress">License Address</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtLicenseAddress" id="txtLicenseAddress" class="form-control gui-input input-sm" placeholder="Enter License Address Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">&nbsp;</label>
                    <div class="col-xs-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit" name="btnSave" id="btnSave"> SAVE </button>
                    </div>
                </div>
                <input type="hidden" name="save" id="save" value="1" />
            </form>
        </div>
    </div>

</div>