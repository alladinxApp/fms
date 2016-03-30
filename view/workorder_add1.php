<p><a href="workorder.php"><span class="fa fa-arrow-left"> BACK TO WORK ORDER LIST</span></a></p>
<div class="row">
    <? print_r($row_partsmst); ?>
    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="workorder-form">
                <div class="form-group">
                    <label class="col-lg-2" for="inputStandard">WORK ORDER #</label>
                    <div class="col-lg-3">
                        <input type="text" placeholder="[SYSTEM GENERATED]" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>

                    <label class="col-lg-2" for="txtLabor">Labor</label>
                    <div class="col-lg-2">
                        <input type="text" name="txtLabor" id="txtLabor" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtServiceType">Service Type</label>
                    <div class="col-lg-3">
                        <select class="required" name="txtServiceType" id="txtServiceType">
                            <option value="">Select Service Type</option>
                            <? for($i=0;$i<count($row_servicetypemst);$i++){ ?>
                            <option value="<?=$row_servicetypemst[$i]['serviceTypeID'];?>"><?=$row_servicetypemst[$i]['description'];?></option>
                            <? } ?>
                        </select>
                    </div>

                    <label class="col-lg-2" for="txtMiscellaneous">Miscellaneous</label>
                    <div class="col-lg-2">
                        <input type="text" name="txtMiscellaneous" id="txtMiscellaneous" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtEquipment">Equipment</label>
                    <div class="col-lg-3">
                        <select class="required" name="txtEquipment" id="txtEquipment" onChange="return getAssignee(this.value);">
                            <option value="">Select Equipment</option>
                            <? for($i=0;$i<count($row_equipmentmst);$i++){ ?>
                            <option value="<?=$row_equipmentmst[$i]['equipmentID'];?>"><?=$row_equipmentmst[$i]['plateNo'];?></option>
                            <? } ?>
                        </select>
                    </div>

                    <label class="col-lg-2" for="txtParts">Parts</label>
                    <div class="col-lg-2">
                        <input type="text" name="txtParts" id="txtParts" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtParts">Assignee</label>
                    <div class="col-lg-3">
                        <span id="assignee"><input value="<?=$assignee;?>" readonly type="text" class="form-control gui-input input-sm" placeholder="Please select equipment above.." /></span>
                    </div>

                    <label class="col-lg-2" for="txtDiscount">Discount</label>
                    <div class="col-lg-2">
                        <input type="text" name="txtDiscount" id="txtDiscount" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtMeter">Meter</label>
                    <div class="col-lg-3">
                        <input type="text" name="txtMeter" id="txtMeter" class="form-control gui-input input-sm" placeholder="0" />
                    </div>

                    <label class="col-lg-2" for="txtSubTotal">Sub-Total</label>
                    <div class="col-lg-2">
                        <input type="text" name="txtSubTotal" id="txtSubTotal" readonly class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtStartDate"></label>
                    <div class="col-lg-3"></div>

                    <label class="col-lg-2" for="txtTax">Tax</label>
                    <div class="col-lg-2">
                        <input type="text" name="txtTax" id="txtTax" readonly class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtStartDate"></label>
                    <div class="col-lg-3"></div>

                    <label class="col-lg-2" for="txtTotalCost">Total</label>
                    <div class="col-lg-2">
                        <input type="text" name="txtTotalCost" id="txtTotalCost" readonly class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtIsWarranty">Is Warranty?</label>
                    <div class="col-lg-3">
                         <select class="required" name="txtIsWarranty" id="txtIsWarranty">
                            <option value="0" selected>NO</option>
                            <option value="1">YES</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtIsBackJob">Is Back Job?</label>
                    <div class="col-lg-3">
                         <select class="required" name="txtIsBackJob" id="txtIsBackJob">
                            <option value="0" selected>NO</option>
                            <option value="1">YES</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtRemarks">Remarks</label>
                    <div class="col-lg-6">
                        <textarea class="form-control textarea-grow" id="txtRemarks" name="txtRemarks" rows="4"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2">&nbsp;</label>
                    <div class="col-xs-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> SAVE </button>
                    </div>
                </div>
                <input type="hidden" name="save" id="save" value="1" />
            </form>
        </div>
    </div>

</div>