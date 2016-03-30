<p><a href="menu.php"><span class="fa fa-arrow-left"> BACK TO MENU LIST</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="menu-form">
                <div class="form-group">
                    <label class="col-sm-3" for="inputStandard">ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="[SYSTEM GENERATED]" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtMenuName">Menu Name</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtMenuName" id="txtMenuName" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtMenuController">Menu Controller</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtMenuController" id="txtMenuController" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtGlyphicon">CSS Glyphicon</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtGlyphicon" id="txtGlyphicon" class="form-control gui-input input-sm" />
                    </div>
                    <label class="col-sm-3" for="txtGlyphicon"><a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">[Reference Here]</a></label>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtIsMenuMaintenance">is Menu Maintenance?</label>
                    <div class="col-sm-4">
                        <select name="txtIsMenuMaintenance" id="txtIsMenuMaintenance">
                            <option value="0">No</option>
                            <option value="1" selected>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtIsMenuTransaction">is Menu Transaction?</label>
                    <div class="col-sm-4">
                        <select name="txtIsMenuTransaction" id="txtIsMenuTransaction">
                            <option value="0">No</option>
                            <option value="1" selected>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtIsMenuReport">is Menu Report?</label>
                    <div class="col-sm-4">
                        <select name="txtIsMenuReport" id="txtIsMenuReport">
                            <option value="0">No</option>
                            <option value="1" selected>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtSortNo">Sort No</label>
                    <div class="col-lg-4">
                        <input type="text" name="txtSortNo" id="txtSortNo" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">&nbsp;</label>
                    <div class="col-xs-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> SAVE </button>
                    </div>
                </div>
                <input type="hidden" name="save" id="save" value="1" />
            </form>
        </div>
    </div>

</div>