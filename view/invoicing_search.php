<style>
    table th{ text-align: center; }
</style>
<h2>SEARCH INVOICE</h2>
<p><a href="invoicing.php"><span class="fa fa-arrow-left"> BACK TO INVOICING LIST</span></a></p>
<div>
    <form role="form" class="form-horizontal" method="Post" id="workorder-search" action="workorder.php">
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
            <label class="col-lg-2" for="txtWORefNo">Work Order #</label>
            <div class="col-lg-2">
                <input type="text" name="txtWORefNo" id="txtWORefNo" class="form-control gui-input input-sm" placeholder="Enter Work Order Ref # here.." />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2" for="txtInvoiceNo">Invoice #</label>
            <div class="col-lg-2">
                <input type="text" name="txtInvoiceNo" id="txtInvoiceNo" class="form-control gui-input input-sm" placeholder="Enter Invoice # here.." />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2" for="txtServiceType">Service Type</label>
            <div class="col-lg-2">
                <input type="text" name="txtServiceType" id="txtServiceType" class="form-control gui-input input-sm" placeholder="Enter Service Type here.." />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2" for="txtAssignee">Assignee</label>
            <div class="col-lg-2">
                <input type="text" name="txtAssignee" id="txtAssignee" class="form-control gui-input input-sm" placeholder="Enter Assignee here.." />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2" for="txtPlateNo">Plate #</label>
            <div class="col-lg-2">
                <input type="text" name="txtPlateNo" id="txtPlateNo" class="form-control gui-input input-sm" placeholder="Enter Plate # here.." />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2" for="txtStatus">Status</label>
            <div class="col-lg-2">
                <select class="required" name="txtStatus" id="txtStatus">
                    <option value="">Select Status</option>
                    <option value="1">FOR APPROVAL</option>
                    <option value="2">APPROVED</option>
                    <option value="3">ON REPAIR</option>
                    <option value="4">REPAIRED</option>
                    <option value="5">BILLED</option>
                    <option value="6">CLOSED</option>
                </select>
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