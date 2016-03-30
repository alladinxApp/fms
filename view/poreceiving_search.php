<style>
    table th{ text-align: center; }
</style>
<h2>SEARCH PURCHASE ORDER</h2>
<p><a href="poreceiving.php"><span class="fa fa-arrow-left"> BACK TO PURCHASE ORDER LIST</span></a></p>
<div>
    <form role="form" class="form-horizontal" method="Post" id="poreceiving-search" action="poreceiving.php">
        <div class="form-group">
            <label class="col-lg-2" for="txtFromDt">From</label>
            <div class="col-lg-2">
                <input type="text" name="txtFromDt" id="txtFromDt" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
            </div>
            <label class="col-lg-1" for="txtToDt">To</label>
            <div class="col-lg-2">
                <input type="text" name="txtToDt" id="txtToDt" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2" for="txtPOReferenceNo">Purchase Order Ref#</label>
            <div class="col-lg-2">
                <input type="text" name="txtPOReferenceNo" id="txtPOReferenceNo" class="form-control gui-input input-sm" placeholder="Enter PO Ref# here.." />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2" for="txtWOReferenceNo">Work Order Ref#</label>
            <div class="col-lg-2">
                <input type="text" name="txtWOReferenceNo" id="txtWOReferenceNo" class="form-control gui-input input-sm" placeholder="Enter WO Ref# here.." />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2">&nbsp;</label>
            <div class="col-lg-1">
                <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> SEARCH </button>
            </div>
        </div>
        <input type="hidden" name="search" id="search" value="1" />
    </form>
</div>