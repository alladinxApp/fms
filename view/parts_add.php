<p><a href="parts.php"><span class="fa fa-arrow-left"> BACK TO PARTS LIST</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="parts-form">
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">Parts ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="[SYSTEM GENERATED]" disabled class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtStockCode">Stock Code</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtStockCode" id="txtStockCode" class="form-control gui-input input-sm" placeholder="Enter Stock Code Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtBrand">Brand</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtBrand" id="txtBrand" class="form-control gui-input input-sm" placeholder="Enter Brand Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtModel">Model</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtModel" id="txtModel" class="form-control gui-input input-sm" placeholder="Enter Model Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtDescription">Description</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtDescription" id="txtDescription" class="form-control gui-input input-sm" placeholder="Enter Description Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtStockOnHand">Stock On Hand</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtStockOnHand" id="txtStockOnHand" class="form-control gui-input input-sm" value="0" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtLowStockQty">Low Stock Qty</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtLowStockQty" id="txtLowStockQty" class="form-control gui-input input-sm" value="1" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtPrice">Price</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtPrice" id="txtPrice" class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtRetailPrice">Retail Price</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtRetailPrice" id="txtRetailPrice" class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">&nbsp;</label>
                    <div class="col-xs-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> SAVE </button>
                    </div>
                </div>
                <input type="hidden" name="save" id="save" value="1" />
            </form>
        </div>
    </div>

</div>