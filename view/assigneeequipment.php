<style>
    table th{ text-align: center; }
</style>
<h2>ASSIGNEE's EQUIPMENTS HISTORY</h2>
<p><a href="assignee.php"><span class="fa fa-arrow-left"> BACK TO ASSIGNEE LIST</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Plate No</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Location</th>
                    <th>Current</th>
                    <th>Assigned Start</th>
                    <th>Assigned End</th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_assigneeequipment);$i++){ 
                        $start = null;
                        $end = null;
                        $current = null;

                        if($row_assigneeequipment[$i]['estatus'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }

                        $start = dateFormat($row_assigneeequipment[$i]['assignedStart'],"M d, Y");
                        $end = dateFormat($row_assigneeequipment[$i]['assignedEnd'],"M d, Y");
                        $current = $row_assigneeequipment[$i]['isCurrentDesc'];
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_assigneeequipment[$i]['plateNo'];?></td>
                    <td><?=$row_assigneeequipment[$i]['makeName'];?></td>
                    <td><?=$row_assigneeequipment[$i]['modelName'];?></td>
                    <td><?=$row_assigneeequipment[$i]['elocationName'];?></td>
                    <td align="center"><?=$current;?></td>
                    <td align="center"><?=$start;?></td>
                    <td align="center"><?=$end;?></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>
<div class="form-group">
    <form role="form" class="form-horizontal" method="Post" action="export.php" target="_blank"> 
        <div class="form-group">
            <div class="col-xs-1">
                <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> EXPORT </button>
            </div>
        </div>
        <input type="hidden" name="exportReport" id="exportReport" value="equipmenthistory" />
        <input type="hidden" name="txtAssignee" id="txtAssignee" value="<?=$_GET['id'];?>" />
    </form>
</div>