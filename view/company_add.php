<p><a href="company.php"><span class="fa fa-arrow-left"> BACK TO COMPANY LIST</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" enctype="multipart/form-data" id="company-form">
                <div class="form-group">
                    <label class="col-sm-3" for="inputStandard">Company ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="[SYSTEM GENERATED]" disabled class="form-control input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompanyName">Company Name</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtCompanyName" id="txtCompanyName" class="form-control gui-input input-sm" placeholder="Enter Company Name Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompanyAddress">Company Address</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtCompanyAddress" id="txtCompanyAddress" class="form-control gui-input input-sm" placeholder="Enter Company Address Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompanyContactNo">Company Contact No</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtCompanyContactNo" id="txtCompanyContactNo" class="form-control gui-input input-sm" placeholder="Enter Company Contact No Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompanyLogo">Company Logo</label>
                    <div class="col-md-4">
                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail mb15">
                                <img data-src="holder.js/100%x147" alt="holder">
                            </div>
                            <span class="button btn-system btn-file btn-block ph5">
                                <span class="fileupload-new">Select</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="txtCompanyLogo" id="txtCompanyLogo" class="form-control gui-input input-sm" />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompanySignature">Company Signature</label>
                    <div class="col-md-4">
                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail mb15">
                                <img data-src="holder.js/100%x147" alt="holder">
                            </div>
                            <span class="button btn-system btn-file btn-block ph5">
                                <span class="fileupload-new">Select</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="txtCompanySignature" id="txtCompanySignature" />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtDaysOfNotification">Days of Notification</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtDaysOfNotification" id="txtDaysOfNotification" class="form-control gui-input input-sm" placeholder="0">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtInsuranceAppliedDate">Insurance Applied Date</label>
                    <div class="col-lg-4">
                        <input type="text" id="txtInsuranceAppliedDate" name="txtInsuranceAppliedDate" class="form-control input-sm gui-input" placeholder="YYYY-MM-DD">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtInsuranceExpirationDate">Insurance Expiration Date</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtInsuranceExpirationDate" id="txtInsuranceExpirationDate" class="form-control input-sm gui-input" placeholder="YYYY-MM-DD">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtInsuranceReminderInDays">Insurance Reminder in Days</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtInsuranceReminderInDays" id="txtInsuranceReminderInDays" class="form-control gui-input input-sm" placeholder="0" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">&nbsp;</label>
                    <div class="col-xs-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> SAVE </button>
                    </div>
                </div>
                <input type="hidden" name="save" id="save" value="1" />
            </form>
        </div>
    </div>

</div>