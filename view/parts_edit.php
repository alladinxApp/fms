<p>
    <a href="parts.php"><span class="fa fa-arrow-left"> BACK TO PARTS LIST</span></a> | 
    <a href="parts_add.php"><span class="fa fa-plus-square"> ADD NEW PARTS</span></a>
</p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="parts-form">
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">Parts ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="<?=$row_parts[0]['partsID'];?>" disabled class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtStockCode">Stock Code</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_parts[0]['stockCode'];?>" name="txtStockCode" id="txtStockCode" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtBrand">Brand</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_parts[0]['brand'];?>" name="txtBrand" id="txtBrand" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtModel">Model</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_parts[0]['model'];?>" name="txtModel" id="txtModel" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtDescription">Description</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_parts[0]['description'];?>" name="txtDescription" id="txtDescription" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtStockOnHand">Stock On Hand</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_parts[0]['stockOnHand'];?>" name="txtStockOnHand" id="txtStockOnHand" class="form-control gui-input input-sm" value="0" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtLowStockQty">Low Stock Qty</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_parts[0]['lowStockQty'];?>" name="txtLowStockQty" id="txtLowStockQty" class="form-control gui-input input-sm" value="1" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtPrice">Price</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_parts[0]['price'];?>" name="txtPrice" id="txtPrice" class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtRetailPrice">Retail Price</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_parts[0]['retailPrice'];?>" name="txtRetailPrice" id="txtRetailPrice" class="form-control gui-input input-sm" placeholder="0.00" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">Status</label>
                    <div class="col-sm-4">
                        <select name="txtStatus" id="txtStatus">
                            <option value="0" <? if($status == 0){ echo 'selected'; } ?>>Inactive</option>
                            <option value="1" <? if($status == 1){ echo 'selected'; } ?>>Active</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">&nbsp;</label>
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
<p><a href="parts.php?delete=1&id=<?=$row_parts[0]['partsID'];?>"><span class="fa fa-trash"> DELETE PARTS</span></a></p>
<? } ?>