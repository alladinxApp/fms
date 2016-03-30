<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE LOCATION</h2>
<p><a href="location_add.php"><span class="fa fa-plus-square"> ADD NEW LOCATION</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Location ID</th>
                    <th>Location Name</th>
                    <th>Modify<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?> / Delete<? } ?></th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_locationmst);$i++){ 
                        if($row_locationmst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_locationmst[$i]['locationID'];?></td>
                    <td><?=$row_locationmst[$i]['locationName'];?></td>
                    <td align="center"><a href="location_edit.php?edit=1&id=<?=$row_locationmst[$i]['locationID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                     &nbsp;&nbsp; 
                    <a href="location.php?delete=1&id=<?=$row_locationmst[$i]['locationID'];?>">
                        <span class="fa fa-trash"></span>
                    </a>
                    <? } ?></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>