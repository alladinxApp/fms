<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE EQUIPMENT</h2>
<p><a href="equipment_add.php"><span class="fa fa-plus-square"> ADD NEW EQUIPMENT</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Equipment ID</th>
                    <th>Assignee</th>
                    <th>Category</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Color</th>
                    <th>Plate No</th>
                    <th>Assignees</th>
                    <th>Modify</th>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                    <th>Delete</th>
                    <? } ?>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_equipmentmst);$i++){ 
                        if($row_equipmentmst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_equipmentmst[$i]['equipmentID'];?></td>
                    <td><?=$row_equipmentmst[$i]['assigneeName'];?></td>
                    <td><?=$row_equipmentmst[$i]['categoryName'];?></td>
                    <td><?=$row_equipmentmst[$i]['makeName'];?></td>
                    <td><?=$row_equipmentmst[$i]['modelName'];?></td>
                    <td align="center"><?=$row_equipmentmst[$i]['color'];?></td>
                    <td><?=$row_equipmentmst[$i]['plateNo'];?></td>
                    <td align="center"><a href="equipmentassignee.php?type=e&id=<?=$row_equipmentmst[$i]['equipmentID'];?>">
                        <span class="fa fa-car"></span>
                    </a></td>
                    <td align="center"><a href="equipment_edit.php?edit=1&id=<?=$row_equipmentmst[$i]['equipmentID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a></td>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                    <td align="center">
                        <a href="equipment.php?delete=1&id=<?=$row_equipmentmst[$i]['equipmentID'];?>">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                    <? } ?>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>