<style>
    table th{ text-align: center; }
</style>
<h2>SEARCH PURCHASE ORDER</h2>
<p><a href="reminder.php"><span class="fa fa-arrow-left"> BACK TO REMINDERS LIST</span></a></p>
<div>
    <form role="form" class="form-horizontal" method="Post" id="reminder-search" action="reminder.php">
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
            <label class="col-lg-2" for="txtTitle">Title</label>
            <div class="col-lg-2">
                <input type="text" name="txtTitle" id="txtTitle" class="form-control gui-input input-sm" placeholder="Enter Title here.." />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2" for="txtLocation">Location</label>
            <div class="col-lg-2">
                <input type="text" name="txtLocation" id="txtLocation" class="form-control gui-input input-sm" placeholder="Enter Location here.." />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2" for="txtCategory">Category</label>
            <div class="col-lg-2">
                <input type="text" name="txtCategory" id="txtCategory" class="form-control gui-input input-sm" placeholder="Enter Category here.." />
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