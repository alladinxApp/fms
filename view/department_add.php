<p><a href="department.php"><span class="fa fa-arrow-left"> BACK TO DEPARTMENT LIST</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="department-form">
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">Department ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="[SYSTEM GENERATED]" disabled class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtDepartmentName">Department Name</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtDepartmentName" id="txtDepartmentName" class="form-control gui-input input-sm" placeholder="Enter Department Name Here..." />
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