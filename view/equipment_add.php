<p><a href="equipment.php"><span class="fa fa-arrow-left"> BACK TO EQUIPMENT LIST</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="equipment-form" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3" for="inputStandard">Equipment ID</label>
                    <div class="col-md-4">
                        <input type="text" placeholder="[SYSTEM GENERATED]" disabled class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtEquipmentPhoto">Equipment Photo</label>
                    <div class="col-md-4">
                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail mb15">
                                <img data-src="holder.js/100%x147" alt="holder">
                            </div>
                            <span class="button btn-system btn-file btn-block ph5">
                                <span class="fileupload-new">Select</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="txtEquipmentPhoto" id="txtEquipmentPhoto" />
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtAssignee">Assignee</label>
                    <div class="col-md-4">
                        <select class="required" name="txtAssignee" id="txtAssignee">
                            <!-- <option value="">Select Assignee</option> -->
                            <? for($i=0;$i<count($row_assigneemst);$i++){ ?>
                            <option value="<?=$row_assigneemst[$i]['assigneeID'];?>"><?=$row_assigneemst[$i]['assigneeName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label class="col-md-3" for="txtCustomer">Customer</label>
                    <div class="col-md-4">
                        <select class="required" name="txtCustomer" id="txtCustomer">
                            <option value="">Select Customer</option>
                            <? for($i=0;$i<count($row_customermst);$i++){ ?>
                            <option value="<?=$row_customermst[$i]['customerID'];?>"><?=$row_customermst[$i]['customerName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div> -->
                <div class="form-group">
                    <label class="col-md-3" for="txtCompany">Company</label>
                    <div class="col-md-4">
                        <select class="required" name="txtCompany" id="txtCompany">
                            <!-- <option value="">Select Company</option> -->
                            <? for($i=0;$i<count($row_companymst);$i++){ ?>
                            <option value="<?=$row_companymst[$i]['companyID'];?>"><?=$row_companymst[$i]['companyName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtCategory">Category</label>
                    <div class="col-md-4">
                        <select class="required" name="txtCategory" id="txtCategory">
                            <!-- <option value="">Select Category</option> -->
                            <? for($i=0;$i<count($row_categorymst);$i++){ ?>
                            <option value="<?=$row_categorymst[$i]['categoryID'];?>"><?=$row_categorymst[$i]['categoryName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtYear">Year</label>
                    <div class="col-md-4">
                        <select class="required" name="txtYear" id="txtYear">
                            <!-- <option value="">Select Make</option> -->
                            <? for($i=0;$i<count($row_yearmst);$i++){ ?>
                            <option value="<?=$row_yearmst[$i]['yearID'];?>"><?=$row_yearmst[$i]['description'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtMake">Make</label>
                    <div class="col-md-4">
                        <select class="required" name="txtMake" id="txtMake">
                            <!-- <option value="">Select Make</option> -->
                            <? for($i=0;$i<count($row_makemst);$i++){ ?>
                            <option value="<?=$row_makemst[$i]['makeID'];?>"><?=$row_makemst[$i]['makeName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtModel">Model</label>
                    <div class="col-md-4">
                        <select class="required" name="txtModel" id="txtModel">
                            <!-- <option value="">Select Model</option> -->
                            <? for($i=0;$i<count($row_modelmst);$i++){ ?>
                            <option value="<?=$row_modelmst[$i]['modelID'];?>"><?=$row_modelmst[$i]['description'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtLocation">Location</label>
                    <div class="col-md-4">
                        <select class="required" name="txtLocation" id="txtLocation">
                            <!-- <option value="">Select Location</option> -->
                            <? for($i=0;$i<count($row_locationmst);$i++){ ?>
                            <option value="<?=$row_locationmst[$i]['locationID'];?>"><?=$row_locationmst[$i]['locationName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtColor">Color</label>
                    <div class="col-md-4">
                        <input type="text" name="txtColor" id="txtColor" class="form-control gui-input input-sm" placeholder="Enter Color Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtMileageStart">Mileage Start</label>
                    <div class="col-md-4">
                        <input type="text" name="txtMileageStart" id="txtMileageStart" class="form-control gui-input input-sm" placeholder="0" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtMileageEnd">Mileage End</label>
                    <div class="col-md-4">
                        <input type="text" name="txtMileageEnd" id="txtMileageEnd" class="form-control gui-input input-sm" placeholder="0" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtGasolineAllocationInLiters">Gasoline Allocation(Liters)</label>
                    <div class="col-md-4">
                        <input type="text" name="txtGasolineAllocationInLiters" id="txtGasolineAllocationInLiters" class="form-control gui-input input-sm" placeholder="0" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtGasolineAllocationInCash">Gasoline Allocation(Cash)</label>
                    <div class="col-md-4">
                        <input type="text" name="txtGasolineAllocationInCash" id="txtGasolineAllocationInCash" class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtInsuranceAppliedDate">Insurance Applied Date</label>
                    <div class="col-md-4">
                        <input type="text" name="txtInsuranceAppliedDate" id="txtInsuranceAppliedDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtInsuranceExpirationDate">Insurance Expiration Date</label>
                    <div class="col-md-4">
                        <input type="text" name="txtInsuranceExpirationDate" id="txtInsuranceExpirationDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtInsuranceReminderInDays">Insurance Reminder In Days</label>
                    <div class="col-md-4">
                        <input type="text" name="txtInsuranceReminderInDays" id="txtInsuranceReminderInDays" class="form-control gui-input input-sm" placeholder="0" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtInsuranceCost">Insurance Cost</label>
                    <div class="col-md-4">
                        <input type="text" name="txtInsuranceCost" id="txtInsuranceCost" class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtRegistrationDate">Registration Date</label>
                    <div class="col-md-4">
                        <input type="text" name="txtRegistrationDate" id="txtRegistrationDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtRegistrationExpiryDate">Registration Expiry Date</label>
                    <div class="col-md-4">
                        <input type="text" name="txtRegistrationExpiryDate" id="txtRegistrationExpiryDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtPurchaseDate">Purchase Date</label>
                    <div class="col-md-4">
                        <input type="text" name="txtPurchaseDate" id="txtPurchaseDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtConductionSticker">Conduction Sticker</label>
                    <div class="col-md-4">
                        <input type="text" name="txtConductionSticker" id="txtConductionSticker" class="form-control gui-input input-sm" placeholder="Enter Conduction Sticker Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtPlateNo">Plate No</label>
                    <div class="col-md-4">
                        <input type="text" name="txtPlateNo" id="txtPlateNo" class="form-control gui-input input-sm" placeholder="Enter Plate No Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtEngineNo">Engine No</label>
                    <div class="col-md-4">
                        <input type="text" name="txtEngineNo" id="txtEngineNo" class="form-control gui-input input-sm" placeholder="Enter Engine No Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtChassisNo">Chassis No</label>
                    <div class="col-md-4">
                        <input type="text" name="txtChassisNo" id="txtChassisNo" class="form-control gui-input input-sm" placeholder="Enter Chassis No Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtSerialNo">Serial No</label>
                    <div class="col-md-4">
                        <input type="text" name="txtSerialNo" id="txtSerialNo" class="form-control gui-input input-sm" placeholder="Enter Serial No Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtAquisitionCost">Aquisition Cost</label>
                    <div class="col-md-4">
                        <input type="text" name="txtAquisitionCost" id="txtAquisitionCost" class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtRegistrationCost">Registration Cost</label>
                    <div class="col-md-4">
                        <input type="text" name="txtRegistrationCost" id="txtRegistrationCost" class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtDepresitionValue">Depresition Value</label>
                    <div class="col-md-4">
                        <input type="text" name="txtDepresitionValue" id="txtDepresitionValue" class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3">&nbsp;</label>
                    <div class="col-xs-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> SAVE </button>
                    </div>
                </div>
                <input type="hidden" name="save" id="save" value="1" />
            </form>
        </div>
    </div>

</div>