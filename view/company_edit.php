<p>
    <a href="company.php"><span class="fa fa-arrow-left"> BACK TO COMPANY LIST</span></a> | 
    <a href="company_add.php"><span class="fa fa-plus-square"> ADD NEW COMPANY</span></a>
</p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" enctype="multipart/form-data" id="company-form">
                <div class="form-group">
                    <label class="col-sm-3" for="inputStandard">Company ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="<?=$row_company[0]['companyID'];?>" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompanyName">Company Name</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_company[0]['companyName'];?>" name="txtCompanyName" id="txtCompanyName" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompanyAddress">Company Address</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_company[0]['companyAddress'];?>" name="txtCompanyAddress" id="txtCompanyAddress" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompanyContactNo">Company Contact No</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_company[0]['companyContactNo'];?>" name="txtCompanyContactNo" id="txtCompanyContactNo" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompanyLogo">Company Logo</label>
                    <div class="col-md-4">
                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail mb15">
                                <? if(!empty($row_company[0]['companyLogo'])){ ?>
                                <img src="<?=COMPANYLOGOS . strtoupper($row_company[0]['companyID']) . "/" . $row_company[0]['companyLogo'];?>" alt="<?=$row_company[0]['companyLogo'];?>">
                                <? }else{ ?>
                                <img data-src="holder.js/100%x147" alt="holder">
                                <? } ?>
                            </div>
                            <span class="button btn-system btn-file btn-block ph5">
                                <span class="fileupload-new">Select</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="txtCompanyLogo" id="txtCompanyLogo" />
                            </span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="txtOldCompanyLogo" id="txtOldCompanyLogo" value="<?=$row_company[0]['companyLogo'];?>">
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompanySignature">Company Signature</label>
                    <div class="col-md-4">
                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail mb15">
                                <? if(!empty($row_company[0]['signature'])){ ?>
                                <img src="<?=COMPANYSIGNATURES . strtoupper($row_company[0]['companyID']) . "/" . $row_company[0]['signature'];?>" alt="<?=$row_company[0]['signature'];?>">
                                <? }else{ ?>
                                <img data-src="holder.js/100%x147" alt="holder">
                                <? } ?>
                            </div>
                            <span class="button btn-system btn-file btn-block ph5">
                                <span class="fileupload-new">Select</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="txtCompanySignature" id="txtCompanySignature" />
                            </span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="txtOldCompanySignature" id="txtOldCompanySignature" value="<?=$row_company[0]['signature'];?>">
                <div class="form-group">
                    <label class="col-sm-3" for="txtDaysOfNotification">Days of Notification</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_company[0]['daysOfNotification'];?>" name="txtDaysOfNotification" id="txtDaysOfNotification" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtInsuranceAppliedDate">Insurance Applied Date</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=dateFormat($row_company[0]['insuranceAppliedDate'],'Y-m-d');?>" name="txtInsuranceAppliedDate" id="txtInsuranceAppliedDate" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtInsuranceExpirationDate">Insurance Expiration Date</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=dateFormat($row_company[0]['insuranceExpirationDate'],'Y-m-d');?>" name="txtInsuranceExpirationDate" id="txtInsuranceExpirationDate" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtInsuranceReminderInDays">Insurance Reminder in Days</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_company[0]['insuranceReminderInDays'];?>" name="txtInsuranceReminderInDays" id="txtInsuranceReminderInDays" class="form-control gui-input input-sm" />
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
<p><a href="company.php?delete=1&id=<?=$row_company[0]['companyID'];?>"><span class="fa fa-trash"> DELETE COMPANY</span></a></p>
<? } ?>