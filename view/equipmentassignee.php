<style>
    table th{ text-align: center; }
</style>
<h2>EQUIPMENT ASSIGNEES HISTORY</h2>
<p><a href="equipment.php"><span class="fa fa-arrow-left"> BACK TO EQUIPMENT LIST</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Assignee Name</th>
                    <th>Company</th>
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
                    <td><?=$row_assigneeequipment[$i]['assigneeName'];?></td>
                    <td><?=$row_assigneeequipment[$i]['companyName'];?></td>
                    <td><?=$row_assigneeequipment[$i]['alocationName'];?></td>
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
        <input type="hidden" name="exportReport" id="exportReport" value="assigneehistory" />
        <input type="hidden" name="txtEquipment" id="txtEquipment" value="<?=$_GET['id'];?>" />
    </form>
</div>