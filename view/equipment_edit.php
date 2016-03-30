<p>
    <a href="equipment.php"><span class="fa fa-arrow-left"> BACK TO EQUIPMENT LIST</span></a> | 
    <a href="equipment_add.php"><span class="fa fa-plus-square"> ADD NEW EQUIPMENT</span></a>
</p>
<div class="row">
    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="equipment-form" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-sm-3" for="inputStandard">Equipment ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="<?=$row_equipment[0]['equipmentID'];?> ( <?=$row_equipment[0]['statusDesc'];?> )" disabled class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtEquipmentPhoto">Equipment Photo</label>
                    <div class="col-md-4">
                        <div class="fileupload fileupload-new admin-form" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail mb15">
                                <? if(!empty($row_equipment[0]['photo'])){ ?>
                                <img src="<?=EQUIPMENTPICS . $row_equipment[0]['equipmentID'] . "/" . $row_equipment[0]['photo'];?>" alt="<?=$row_equipment[0]['photo'];?>">
                                <? }else{ ?>
                                <img data-src="holder.js/100%x147" alt="holder">
                                <? } ?>
                            </div>
                            <span class="button btn-system btn-file btn-block ph5">
                                <span class="fileupload-new">Select</span>
                                <span class="fileupload-exists">Change</span>
                                <input type="file" name="txtEquipmentPhoto" id="txtEquipmentPhoto" />
                            </span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="txtOldPhoto" id="txtOldPhoto" value="<?=$row_equipment[0]['photo'];?>" />
                <div class="form-group">
                    <label class="col-sm-3" for="txtAssignee">Assignee</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtAssignee" id="txtAssignee">
                            <!-- <option value="">Select Assignee</option> -->
                            <? 
                                $selected = null;
                                for($i=0;$i<count($row_assigneemst);$i++){ 
                                    if($row_assigneemst[$i]['assigneeID'] == $row_equipment[0]['assigneeID']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = null;
                                    }
                            ?>
                            <option value="<?=$row_assigneemst[$i]['assigneeID'];?>" <?=$selected;?>><?=$row_assigneemst[$i]['assigneeName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtCompany">Company</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtCompany" id="txtCompany">
                            <!-- <option value="">Select Company</option> -->
                            <? 
                                $selected = null;
                                for($i=0;$i<count($row_companymst);$i++){ 
                                    if($row_companymst[$i]['companyID'] == $row_equipment[0]['companyID']){
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
                    <label class="col-sm-3" for="txtCategory">Category</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtCategory" id="txtCategory">
                            <!-- <option value="">Select Category</option> -->
                            <? 
                                $selected = null;
                                for($i=0;$i<count($row_categorymst);$i++){ 
                                    if($row_categorymst[$i]['categoryID'] == $row_equipment[0]['categoryID']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = null;
                                    }
                            ?>
                            <option value="<?=$row_categorymst[$i]['categoryID'];?>" <?=$selected;?>><?=$row_categorymst[$i]['categoryName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtMake">Make</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtMake" id="txtMake">
                            <!-- <option value="">Select Make</option> -->
                            <? 
                                $selected = null;
                                for($i=0;$i<count($row_makemst);$i++){ 
                                    if($row_makemst[$i]['makeID'] == $row_equipment[0]['makeID']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = null;
                                    }
                            ?>
                            <option value="<?=$row_makemst[$i]['makeID'];?>" <?=$selected;?>><?=$row_makemst[$i]['makeName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtLocation">Location</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtLocation" id="txtLocation">
                            <!-- <option value="">Select Location</option> -->
                            <? 
                                $selected = null;
                                for($i=0;$i<count($row_locationmst);$i++){ 
                                    if($row_locationmst[$i]['locationID'] == $row_equipment[0]['locationID']){
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
                    <label class="col-sm-3" for="txtModel">Model</label>
                    <div class="col-sm-4">
                        <select class="required" name="txtModel" id="txtModel">
                            <!-- <option value="">Select Model</option> -->
                            <? 
                                $selected = null;
                                for($i=0;$i<count($row_modelmst);$i++){ 
                                    if($row_modelmst[$i]['modelID'] == $row_equipment[0]['modelID']){
                                        $selected = 'selected';
                                    }else{
                                        $selected = null;
                                    }
                            ?>
                            <option value="<?=$row_modelmst[$i]['modelID'];?>" <?=$selected;?>><?=$row_modelmst[$i]['description'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtColor">Color</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['color'];?>" name="txtColor" id="txtColor" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtMileageStart">Mileage Start</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['mileageStart'];?>" name="txtMileageStart" id="txtMileageStart" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtMileageEnd">Mileage End</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['mileageEnd'];?>" name="txtMileageEnd" id="txtMileageEnd" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtGasolineAllocationInLiters">Gasoline Allocation(Liters)</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['gasolineAllocationInLiters'];?>" name="txtGasolineAllocationInLiters" id="txtGasolineAllocationInLiters" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtGasolineAllocationInCash">Gasoline Allocation(Cash)</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['gasolineAllocationInCash'];?>" name="txtGasolineAllocationInCash" id="txtGasolineAllocationInCash" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtInsuranceAppliedDate">Insurance Applied Date</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=dateFormat($row_equipment[0]['insuranceAppliedDate'],'Y-m-d');?>" name="txtInsuranceAppliedDate" id="txtInsuranceAppliedDate" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtInsuranceExpirationDate">Insurance Expiration Date</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=dateFormat($row_equipment[0]['insuranceExpirationDate'],'Y-m-d');?>" name="txtInsuranceExpirationDate" id="txtInsuranceExpirationDate" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtInsuranceReminderInDays">Insurance Reminder In Days</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['insuranceReminderInDays'];?>" name="txtInsuranceReminderInDays" id="txtInsuranceReminderInDays" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtInsuranceCost">Insurance Cost</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['insuranceCost'];?>" name="txtInsuranceCost" id="txtInsuranceCost" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtRegistrationDate">Registration Date</label>
                    <div class="col-md-4">
                        <input type="text" value="<?=dateFormat($row_equipment[0]['registrationDate'],"Y-m-d");?>" name="txtRegistrationDate" id="txtRegistrationDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3" for="txtRegistrationExpiryDate">Registration Expiry Date</label>
                    <div class="col-md-4">
                        <input type="text" value="<?=dateFormat($row_equipment[0]['registrationExpiryDate'],"Y-m-d");?>" name="txtRegistrationExpiryDate" id="txtRegistrationExpiryDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtPurchaseDate">Purchase Date</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=dateFormat($row_equipment[0]['purchaseDate'],'Y-m-d');?>" name="txtPurchaseDate" id="txtPurchaseDate" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtConductionSticker">Conduction Sticker</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['conductionSticker'];?>" name="txtConductionSticker" id="txtConductionSticker" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtPlateNo">Plate No</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['plateNo'];?>" name="txtPlateNo" id="txtPlateNo" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtYear">Year</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['year'];?>" name="txtYear" id="txtYear" maxlength="4" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtEngineNo">Engine No</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['engineNo'];?>" name="txtEngineNo" id="txtEngineNo" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtChassisNo">Chassis No</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['chassisNo'];?>" name="txtChassisNo" id="txtChassisNo" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtSerialNo">Serial No</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['serialNo'];?>" name="txtSerialNo" id="txtSerialNo" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtAcquisitionCost">Acquisition Cost</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['acquisitionCost'];?>" name="txtAcquisitionCost" id="txtAcquisitionCost" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtRegistrationCost">Registration Cost</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['registrationCost'];?>" name="txtRegistrationCost" id="txtRegistrationCost" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtDepresitionValue">Depresition Value</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_equipment[0]['depresitionValue'];?>" name="txtDepresitionValue" id="txtDepresitionValue" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <? if($status == 1){ ?>
                <div class="form-group">
                    <label class="col-sm-3" for="txtStatus">Status</label>
                    <div class="col-sm-4">
                        <select name="txtStatus" id="txtStatus">
                            <option value="0" <? if($status == 0){ echo 'selected'; } ?>>Scrap</option>
                            <option value="1" <? if($status == 1){ echo 'selected'; } ?>>Active</option>
                            <option value="2" <? if($status == 2){ echo 'selected'; } ?>>Sold</option>
                            <option value="3" <? if($status == 3){ echo 'selected'; } ?>>Motorpool</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3">&nbsp;</label>
                    <div class="col-xs-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> UPDATE </button>
                    </div>
                </div>
                <? } ?>
                <input type="hidden" name="update" id="update" value="1" />
            </form>
        </div>
    </div>

</div>
<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
<p><a href="equipment.php?delete=1&id=<?=$row_equipment[0]['equipmentID'];?>"><span class="fa fa-trash"> DELETE EQUIPMENT</span></a></p>
<? } ?>