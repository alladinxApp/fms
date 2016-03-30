<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE MAKE</h2>
<p><a href="make_add.php"><span class="fa fa-plus-square"> ADD NEW MAKE</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Make ID</th>
                    <th>Make Name</th>
                    <th>Modify<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?> / Delete<? } ?></th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_makemst);$i++){ 
                        if($row_makemst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_makemst[$i]['makeID'];?></td>
                    <td><?=$row_makemst[$i]['makeName'];?></td>
                    <td align="center"><a href="make_edit.php?edit=1&id=<?=$row_makemst[$i]['makeID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                     &nbsp;&nbsp; 
                    <a href="make.php?delete=1&id=<?=$row_makemst[$i]['makeID'];?>">
                        <span class="fa fa-trash"></span>
                    </a>
                    <? } ?></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>