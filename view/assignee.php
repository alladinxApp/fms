<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE ASSIGNEE</h2>
<p><a href="assignee_add.php"><span class="fa fa-plus-square"> ADD NEW ASSIGNEE</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Assignee Name</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Address</th>
                    <th>Equipments</th>
                    <th>Modify</th>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                    <th>Company Access</th>
                    <th>Delete</th>
                    <? } ?>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_assigneemst);$i++){ 
                        if($row_assigneemst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_assigneemst[$i]['assigneeName'];?></td>
                    <td><?=$row_assigneemst[$i]['companyName'];?></td>
                    <td><?=$row_assigneemst[$i]['locationName'];?></td>
                    <td><?=$row_assigneemst[$i]['address'];?></td>
                    <td align="center"><a href="assigneeequipment.php?type=a&id=<?=$row_assigneemst[$i]['assigneeID'];?>">
                        <span class="fa fa-car"></span>
                    </a></td>
                    <td align="center"><a href="assignee_edit.php?edit=1&id=<?=$row_assigneemst[$i]['assigneeID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a></td>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                    <td align="center"><a href="assignee_company.php?id=<?=$row_assigneemst[$i]['assigneeID'];?>">
                        <span class="fa fa-list"></span>
                    </a></td>
                    <td align="center"><a href="assignee.php?delete=1&id=<?=$row_assigneemst[$i]['assigneeID'];?>">
                        <span class="fa fa-trash"></span>
                    </a></td>
                    <? } ?>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>