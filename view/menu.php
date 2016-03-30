<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE MENUS</h2>
<p><a href="menu_add.php"><span class="fa fa-plus-square"> ADD NEW MENU</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Menu name</th>
                    <th>Controller</th>
                    <th>is Maintenance?</th>
                    <th>is Transaction?</th>
                    <th>is Report?</th>
                    <th>Sort No</th>
                    <th>Modify<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?> / Delete<? } ?></th>
                </tr>

                <? 
                    $cnt=1; for($i=0;$i<count($row_menumst);$i++){
                        if($row_menumst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        } 
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_menumst[$i]['menuName'];?></td>
                    <td><?=$row_menumst[$i]['menuController'];?></td>
                    <td align="center"><?=$row_menumst[$i]['isMenuMaintenanceDesc'];?></td>
                    <td align="center"><?=$row_menumst[$i]['isMenuTransactionsDesc'];?></td>
                    <td align="center"><?=$row_menumst[$i]['isMenuReportDesc'];?></td>
                    <td align="center"><?=$row_menumst[$i]['sortNo'];?></td>
                    <td align="center"><a href="menu_edit.php?edit=1&id=<?=$row_menumst[$i]['menuID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                     &nbsp;&nbsp; 
                    <a href="menu.php?delete=1&id=<?=$row_menumst[$i]['menuID'];?>">
                        <span class="fa fa-trash"></span>
                    </a>
                    <? } ?></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>