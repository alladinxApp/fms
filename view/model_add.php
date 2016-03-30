<p><a href="model.php"><span class="fa fa-arrow-left"> BACK TO MODEL LIST</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="model-form">
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">Model ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="[SYSTEM GENERATED]" disabled class="form-control input-sm">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtDescription">Description</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtDescription" id="txtDescription" class="form-control input-sm gui-input" placeholder="Enter Description Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtVariant">Variant</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtVariant" id="txtVariant" class="form-control input-sm gui-input" placeholder="Enter Variant Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtVariantDesc">Variant Description</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtVariantDesc" id="txtVariantDesc" class="form-control input-sm gui-input" placeholder="Enter Variant Description Here..." />
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