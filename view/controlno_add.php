<p><a href="controlno.php"><span class="fa fa-arrow-left"> BACK TO CONTROL NO LIST</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="controlno-form">
                <div class="form-group">
                    <label class="col-lg-2" for="inputStandard">ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="[SYSTEM GENERATED]" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtDescription">Description</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtDescription" placeholder="Enter Description Here..." id="txtDescription" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtControlType">Control Type</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtControlType" placeholder="Enter Control Type Here..." id="txtControlType" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtControlCode">Control Code</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtControlCode" placeholder="Enter Control Code Here..." id="txtControlCode" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtNoOfDigit">No of Digit</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtNoOfDigit" value="1" id="txtNoOfDigit" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtLastDigit">Last Digit</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtLastDigit" value="0" id="txtLastDigit" class="form-control gui-input input-sm" />
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