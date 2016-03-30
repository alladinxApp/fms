<p>
    <a href="supplier.php"><span class="fa fa-arrow-left"> BACK TO SUPPLIER LIST</span></a> | 
    <a href="supplier_add.php"><span class="fa fa-plus-square"> ADD NEW SUPPLIER</span></a>
</p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="supplier-form">
                <div class="form-group">
                    <label class="col-sm-3" for="inputStandard">Category ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="<?=$row_supplier[0]['supplierID'];?>" disabled class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtSupplierName">Category Name</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_supplier[0]['supplierName'];?>" name="txtSupplierName" id="txtSupplierName" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtSupplierAddress">Supplier Address</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_supplier[0]['supplierAddress'];?>" name="txtSupplierAddress" id="txtSupplierAddress" class="form-control gui-input input-sm" placeholder="Enter Supplier Address Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtSupplierContactNo">Supplier Contact No</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_supplier[0]['supplierContactNo'];?>" name="txtSupplierContactNo" id="txtSupplierContactNo" class="form-control gui-input input-sm" placeholder="Enter Supplier Contact No Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtSupplierEmailAddress">Supplier Email Address</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_supplier[0]['supplierEmailAddress'];?>" name="txtSupplierEmailAddress" id="txtSupplierEmailAddress" class="form-control gui-input input-sm" placeholder="Enter Supplier Email Address Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtSupplierContactPerson">Supplier Contact Person</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_supplier[0]['contactPerson'];?>" name="txtSupplierContactPerson" id="txtSupplierContactPerson" class="form-control gui-input input-sm" placeholder="Enter Supplier Contact Person Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtSupplierTIN">Supplier TIN</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_supplier[0]['TIN'];?>" name="txtSupplierTIN" id="txtSupplierTIN" class="form-control gui-input input-sm" placeholder="Enter Supplier TIN Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="inputStandard">Status</label>
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
<p><a href="supplier.php?delete=1&id=<?=$row_supplier[0]['supplierID'];?>"><span class="fa fa-trash"> DELETE SUPPLIER</span></a></p>
<? } ?>