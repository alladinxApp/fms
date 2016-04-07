<style type="text/css">
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>
<h2>UPLOAD MILEAGE</h2>
<p><a href="files/equipment_template.csv"><span class="fa fa-download"> DOWNLOAD TEMPLATE</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" enctype="multipart/form-data">
                <div class="form-group">
                    <input id="uplFile" type="file" style="display: none;">

                    <div class="input-group" style="width: 300px;">
                        <div  id="btnBrowse"  class="btn btn-md btn-dark btn-block btn-gradient input-group-addon">Choose a file...</div>
                        <span id="photoCover" class="form-control"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-1">
                        <button class="btn btn-md btn-dark btn-block btn-gradient" type="submit"> UPLOAD </button>
                    </div>
                </div>
                <input type="hidden" name="uploadMileage" id="uploadMileage" value="1" />
            </form>
        </div>
    </div>

</div>