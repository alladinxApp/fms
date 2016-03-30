<style>
    table th{ text-align: center; }
</style>
<p><a href="user.php"><span class="fa fa-arrow-left"> BACK TO USER LIST</span></a></p>
<h2>AVAILABLE ASSIGNEE</h2>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Assignee ID</th>
                    <th>Assignee Name</th>
                    <th>Add</th>
                </tr>

                <?
                    if(count($row_assigneemst) > 0){ 
                    $cnt=1; 
                    for($i=0;$i<count($row_assigneemst);$i++){ 
                ?>
                <tr>
                    <td><?=$cnt;?></td>
                    <td><?=$row_assigneemst[$i]['assigneeID'];?></td>
                    <td><?=$row_assigneemst[$i]['assigneeName'];?></td>
                    <td align="center">
                        <? if($num_userassignee == 0){ ?>
                        <a href="user_assignee.php?user_assignee_add=1&userid=<?=$_GET['id'];?>&assigneeid=<?=$row_assigneemst[$i]['assigneeID'];?>">
                            <span class="fa fa-plus"></span>
                        </a>
                        <? } ?>
                    </td>
                </tr>
                <? $cnt++; }}else{ ?>
                <tr class="danger">
                    <td align="center" colspan="4">No available assignee!</td>
                </tr>
                <? } ?>

                <? if($num_userassignee > 0){ ?>
                <tr class="danger">
                    <td align="center" colspan="4">You can only tagged the user to one(1) assignee!</td>
                </tr>
                <? } ?>

        </table>
    </div>
</div>
<h2>MANAGE USER ASSIGNEE</h2>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Assignee ID</th>
                    <th>Assignee Name</th>
                    <th>Remove</th>
                </tr>

                <? 
                    if(count($row_userassignee) > 0){
                    $cnt=1; 
                    for($i=0;$i<count($row_userassignee);$i++){ 
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_userassignee[$i]['userID'];?></td>
                    <td><?=$row_userassignee[$i]['userName'];?></td>
                    <td><?=$row_userassignee[$i]['assigneeID'];?></td>
                    <td><?=$row_userassignee[$i]['assigneeName'];?></td>
                    <td align="center"><a href="user_assignee.php?user_assignee_remove=1&userid=<?=$_GET['id'];?>&assigneeid=<?=$row_userassignee[$i]['assigneeID'];?>">
                        <span class="fa fa-trash"></span>
                    </a></td>
                </tr>
                <? $cnt++; }}else{ ?>
                <tr class="danger">
                    <td align="center" colspan="6">Please select one(1) assignee listed above!</td>
                </tr>
                <? } ?>

        </table>
    </div>
</div>