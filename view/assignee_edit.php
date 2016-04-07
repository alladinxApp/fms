<p>
    <a href="assignee.php"><span class="fa fa-arrow-left"> BACK TO ASSIGNEE LIST</span></a> | 
    <a href="assignee_add.php"><span class="fa fa-plus-square"> ADD NEW ASSIGNEE</span></a>
</p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" enctype="multipart/form-data" id="assignee-form">
                <div class="form-group">
                    <label class="col-sm-3" for="inputStandard">ASSIGNEE ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="<?=$row_assignee[0]['assigneeID'];?>" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompany">Company</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtCompany" id="txtCompany">
                            <option value="">Select Company</option>
                            <? 
                                $selected = null;
                                for($i=0;$i<count($row_companymst);$i++){ 
                                    if($row_companymst[$i]['companyID'] == $row_assignee[0]['companyID']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = null;
                                    }
                            ?>
                            <option value="<?=$row_companymst[$i]['companyID'];?>" <?=$selected;?>><?=$row_companymst[$i]['companyName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLocation">Location</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtLocation" id="txtLocation">
                            <option value="">Select Location</option>
                            <? 
                                $selected = null;
                                for($i=0;$i<count($row_locationmst);$i++){ 
                                    if($row_locationmst[$i]['locationID'] == $row_assignee[0]['locationID']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = null;
                                    }
                            ?>
                            <option value="<?=$row_locationmst[$i]['locationID'];?>" <?=$selected;?>><?=$row_locationmst[$i]['locationName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtFName">First Name</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_assignee[0]['firstname'];?>" name="txtFName" id="txtFName" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLName">Last Name</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_assignee[0]['lastname'];?>" name="txtLName" id="txtLName" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtAge">Age</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_assignee[0]['age'];?>" name="txtAge" id="txtAge" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtGender">Gender</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtGender" id="txtGender">
                            <option value="">Select Gender</option>
                            <option value="M" <? if($row_assignee[0]['gender'] == "M"){ echo 'selected'; } ?>>Male</option>
                            <option value="F" <? if($row_assignee[0]['gender'] == "F"){ echo 'selected'; } ?>>Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtContactNo1">Contact No 1</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_assignee[0]['contactNo1'];?>" name="txtContactNo1" id="txtContactNo1" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtContactNo2">Contact No 2</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_assignee[0]['contactNo2'];?>" name="txtContactNo2" id="txtContactNo2" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtAddress">Address</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_assignee[0]['address'];?>" name="txtAddress" id="txtAddress" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCostCenter">Cost Center</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_assignee[0]['costCenter'];?>" name="txtCostCenter" id="txtCostCenter" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtImmediateHead">Immediate Head</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_assignee[0]['immediateHead'];?>" name="txtImmediateHead" id="txtImmediateHead" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtImmediateEmailAddress">Immediate Email Address</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_assignee[0]['emailAddress'];?>" name="txtImmediateEmailAddress" id="txtImmediateEmailAddress" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtDepartment">Department</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtDepartment" id="txtDepartment">
                            <option value="">Select Department</option>
                            <? 
                                $selected = null;
                                for($i=0;$i<count($row_departmentmst);$i++){ 
                                    if($row_departmentmst[$i]['departmentID'] == $row_assignee[0]['department']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = null;
                                    }
                            ?>
                            <option value="<?=$row_departmentmst[$i]['departmentID'];?>" <?=$selected;?>><?=$row_departmentmst[$i]['departmentName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtAttachment">Attachment</label>
                    <div class="col-md-4">
                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail mb15">
                                <? if(!empty($row_assignee[0]['attachment'])){ ?>
                                <img src="<?=ASSIGNEEATTACHMENTS . strtoupper($row_assignee[0]['assigneeID']) . "/" . $row_assignee[0]['attachment'];?>" alt="<?=$row_assignee[0]['attachment'];?>">
                                <? }else{ ?>
                                <img data-src="holder.js/100%x147" alt="holder">
                                <? } ?>
                            </div>
                            <span class="button btn-system btn-file btn-block ph5">
                                <span class="fileupload-new">Select</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="txtAttachment" id="txtAttachment" class="form-control gui-input input-sm" />
                            </span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="txtOldAttachment" id="txtOldAttachment" value="<?=$row_assignee[0]['attachment'];?>" />
                <div class="form-group">
                    <label class="col-sm-3" for="txtLicenseNo">License No</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_assignee[0]['licenseNo'];?>" name="txtLicenseNo" id="txtLicenseNo" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLicenseRegistrationDate">License Registration Date</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=dateFormat($row_assignee[0]['licenseRegistrationDate'],'Y-m-d');?>" name="txtLicenseRegistrationDate" id="txtLicenseRegistrationDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLicenseExpirationDate">License No Expiration Date</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=dateFormat($row_assignee[0]['expirationDate'],'Y-m-d');?>" name="txtLicenseExpirationDate" id="txtLicenseExpirationDate" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLicenseAddress">License Address</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_assignee[0]['licenseAddress'];?>" name="txtLicenseAddress" id="txtLicenseAddress" class="form-control gui-input input-sm" />
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
<p><a href="assignee.php?delete=1&id=<?=$row_assignee[0]['assigneeID'];?>"><span class="fa fa-trash"> DELETE ASSIGNEE</span></a></p>
<? } ?>