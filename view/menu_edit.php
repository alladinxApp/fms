<p>
    <a href="menu.php"><span class="fa fa-arrow-left"> BACK TO MENU LIST</span></a> | 
    <a href="menu_add.php"><span class="fa fa-plus-square"> ADD NEW MENU</span></a>
</p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="menu-form">
                <div class="form-group">
                    <label class="col-sm-3" for="inputStandard">ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="<?=$row_menu[0]['menuID'];?>" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtMenuName">Menu Name</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_menu[0]['menuName'];?>" name="txtMenuName" id="txtMenuName" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtMenuController">Menu Controller</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_menu[0]['menuController'];?>" name="txtMenuController" id="txtMenuController" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtGlyphicon">CSS Glyphicon</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_menu[0]['glyphicon'];?>" name="txtGlyphicon" id="txtGlyphicon" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtIsMenuMaintenance">is Menu Maintenance?</label>
                    <div class="col-sm-4">
                        <select name="txtIsMenuMaintenance" id="txtIsMenuMaintenance">
                            <option value="0" <? if($isMenuMaintenance == 0){ echo 'selected'; } ?>>No</option>
                            <option value="1" <? if($isMenuMaintenance == 1){ echo 'selected'; } ?>>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtIsMenuTransaction">is Menu Transaction?</label>
                    <div class="col-sm-4">
                        <select name="txtIsMenuTransaction" id="txtIsMenuTransaction">
                            <option value="0" <? if($isMenuTransaction == 0){ echo 'selected'; } ?>>No</option>
                            <option value="1" <? if($isMenuTransaction == 1){ echo 'selected'; } ?>>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtIsMenuReport">is Menu Report?</label>
                    <div class="col-sm-4">
                        <select name="txtIsMenuReport" id="txtIsMenuReport">
                            <option value="0" <? if($isMenuReport == 0){ echo 'selected'; } ?>>No</option>
                            <option value="1" <? if($isMenuReport == 1){ echo 'selected'; } ?>>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtSortNo">Sort No</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_menu[0]['sortNo'];?>" name="txtSortNo" id="txtSortNo" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3" for="txtStatus">Status</label>
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
<p><a href="menu.php?delete=1&id=<?=$row_menu[0]['menuID'];?>"><span class="fa fa-trash"> DELETE MENU</span></a></p>
<? } ?>