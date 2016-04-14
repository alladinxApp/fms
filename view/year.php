<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE YEAR</h2>
<p><a href="year_add.php"><span class="fa fa-plus-square"> ADD NEW YEAR</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Year ID</th>
                    <th>Description</th>
                    <th>Modify<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?> / Delete<? } ?></th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_yearmst);$i++){ 
                        if($row_yearmst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_yearmst[$i]['yearID'];?></td>
                    <td><?=$row_yearmst[$i]['description'];?></td>
                    <td align="center"><a href="year_edit.php?edit=1&id=<?=$row_yearmst[$i]['yearID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                     &nbsp;&nbsp; 
                    <a href="year.php?delete=1&id=<?=$row_yearmst[$i]['yearID'];?>">
                        <span class="fa fa-trash"></span>
                    </a>
                    <? } ?></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>