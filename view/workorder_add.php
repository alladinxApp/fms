<style>
    table th{ text-align: center; }
</style>

<p><a href="workorder.php"><span class="fa fa-arrow-left"> BACK TO WORK ORDER LIST</span></a></p>
<div class="row">
    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="workorder-form">
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-lg-4" for="inputStandard">WORK ORDER #</label>
                            <div class="col-lg-8">
                                <input type="text" placeholder="[SYSTEM GENERATED]" disabled class="form-control gui-input input-sm" id="disabledInput">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtServiceType">Service Type</label>
                            <div class="col-lg-8">
                                <select class="required" name="txtServiceType" id="txtServiceType">
                                    <option value="">Select Service Type</option>
                                    <? for($i=0;$i<count($row_servicetypemst);$i++){ ?>
                                    <option value="<?=$row_servicetypemst[$i]['serviceTypeID'];?>"><?=$row_servicetypemst[$i]['description'];?></option>
                                    <? } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtEquipment">Equipment</label>
                            <div class="col-lg-8">
                                <select class="required" name="txtEquipment" id="txtEquipment" onChange="return getAssignee(this.value);">
                                    <option value="">Select Equipment</option>
                                    <? for($i=0;$i<count($row_equipmentmst);$i++){ ?>
                                    <option value="<?=$row_equipmentmst[$i]['equipmentID'];?>"><?=$row_equipmentmst[$i]['plateNo'];?></option>
                                    <? } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtParts">Assignee</label>
                            <div class="col-lg-8">
                                <span id="assignee"><input value="<?=$assignee;?>" readonly type="text" class="form-control gui-input input-sm" placeholder="Please select equipment above.." /></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtMeter">Meter</label>
                            <div class="col-lg-8">
                                <input type="text" name="txtMeter" id="txtMeter" class="form-control gui-input input-sm" placeholder="0" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtIsWarranty">Is Warranty?</label>
                            <div class="col-lg-8">
                                 <select class="required" name="txtIsWarranty" id="txtIsWarranty">
                                    <option value="0" selected>NO</option>
                                    <option value="1">YES</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtIsBackJob">Is Back Job?</label>
                            <div class="col-lg-8">
                                 <select class="required" name="txtIsBackJob" id="txtIsBackJob">
                                    <option value="0" selected>NO</option>
                                    <option value="1">YES</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtRemarks">Justification</label>
                            <div class="col-lg-8">
                                <textarea class="form-control textarea-grow" id="txtRemarks" name="txtRemarks" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <select class="required" name="txtNewParts" id="txtNewParts">
                                    <option value="">Select Parts</option>
                                    <? 
                                        for($i=0;$i<count($row_partsmst);$i++){
                                            $val = $row_partsmst[$i]['partsID'];
                                    ?>
                                    <option value="<?=$val;?>"><?=$row_partsmst[$i]['description'] . ' - ' . $row_partsmst[$i]['brand'];?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="txtPrice" id="txtPrice" class="text-center form-control gui-input input-md" placeholder="Price (0.00)" />
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="txtPartsQty" id="txtPartsQty" class="text-center form-control gui-input input-md" placeholder="Qty (0)" />
                            </div>
                            <div class="col-sm-2">
                                <a href="#" onClick="addNewParts();"><? $img = new Image('imgs/btnAdd.png'); ?></a>
                            </div>
                        </div>
                        <span id="divCost">
                            <input type="hidden" name="txtPartsArray" id="txtPartsArray" value="" />
                            <div class="form-group">
                                <label class="col-lg-3" for="txtLabor">Labor</label>
                                <div class="col-lg-4">
                                    <input type="text" name="txtLabor" id="txtLabor" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtMiscellaneous">Miscellaneous</label>
                                <div class="col-lg-4">
                                    <input type="text" name="txtMiscellaneous" id="txtMiscellaneous" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtParts">Parts</label>
                                <div class="col-lg-4">
                                    <input type="text" readonly name="txtParts" id="txtParts" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtDiscount">Discount</label>
                                <div class="col-lg-4">
                                    <input type="text" name="txtDiscount" id="txtDiscount" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtSubTotal">Sub-Total</label>
                                <div class="col-lg-4">
                                    <input type="text" name="txtSubTotal" id="txtSubTotal" readonly class="form-control gui-input input-sm" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtTax">Tax</label>
                                <div class="col-lg-4">
                                    <input type="text" name="txtTax" id="txtTax" readonly class="form-control gui-input input-sm" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtTotalCost">TotalCost</label>
                                <div class="col-lg-4">
                                    <input type="text" name="txtTotalCost" id="txtTotalCost" disabled class="form-control gui-input input-sm" placeholder="0.00" />
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2">&nbsp;</label>
                    <div class="col-lg-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit" name="btnSave" id="btnSave"> SAVE </button>
                    </div>
                </div>
                <input type="hidden" name="save" id="save" value="1" />
            </form>
        </div>
    </div>

</div>