<style>
    table th{ text-align: center; }
</style>
<h2>SEARCH REPAIR COST PER DEPARTMENT</h2>
<div class="row">
    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="workorder-search" action="repair_cost_per_department.php">
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
                    <label class="col-lg-2" for="txtDepartment">Department</label>
                    <div class="col-lg-2">
                         <select class="required" name="txtDepartment" id="txtDepartment">
                            <option value="">Select Supplier</option>
                            <? for($i=0;$i<count($row_departmentmst);$i++){ ?>
                            <option value="<?=$row_departmentmst[$i]['departmentID'];?>"><?=$row_departmentmst[$i]['departmentName'];?></option>
                            <? } ?>
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
    </div>
</div>