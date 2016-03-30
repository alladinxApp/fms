<p><a href="poreceiving.php"><span class="fa fa-arrow-left"> BACK TO PURCHASE ORDER LIST</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="poreceiving-form" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-lg-2" for="inputStandard">PURCHASE ORDER #</label>
                    <div class="col-lg-3">
                        <input type="text" placeholder="[SYSTEM GENERATED]" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
				</div>
				<div class="form-group">
                    <label class="col-lg-2" for="inputStandard">WORK ORDER #</label>
                    <div class="col-lg-3">
                        <span id="divTxtWorkOrder"><input type="text" name="txtWorkOrderNo" id="txtWorkOrderNo" onBlur="chkWorkOrder(this.value);" placeholder="Enter Work Order here..." class="form-control gui-input input-sm"></span>
                    </div>
				</div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtLabor">Labor</label>
                    <div class="col-lg-3">
                        <input type="text" name="txtLabor" id="txtLabor" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtMiscellaneous">Miscellaneous</label>
                    <div class="col-lg-3">
                        <input type="text" name="txtMiscellaneous" id="txtMiscellaneous" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtParts">Parts</label>
                    <div class="col-lg-3">
                        <input type="text" name="txtParts" id="txtParts" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtDiscount">Discount</label>
                    <div class="col-lg-3">
                        <input type="text" name="txtDiscount" id="txtDiscount" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtTax">Tax</label>
                    <div class="col-lg-3">
                        <input type="text" name="txtTax" id="txtTax" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtTotalCost">TotalCost</label>
                    <div class="col-lg-3">
                        <input type="text" name="txtTotalCost" id="txtTotalCost" readonly class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-lg-2" for="txtTotalCost">Attachment</label>
                    <div class="col-lg-3">
                        <input type="file" name="txtAttachment" id="txtAttachment" class="form-control gui-input input-sm" placeholder="0.00" />
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