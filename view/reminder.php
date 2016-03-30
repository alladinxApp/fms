<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE REMINDERS</h2>
<p><a href="reminder_add.php"><span class="fa fa-plus-square"> ADD NEW REMINDERS</span></a> | 
    <a href="reminder_search.php"><span class="fa fa-search"> SEARCH REMINDER</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>Due Date</th>
                    <th>Modify</th>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                    <th>Delete</th>
                    <? } ?>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_remindersmst);$i++){ 
                        if($row_remindersmst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_remindersmst[$i]['title'];?></td>
                    <td><?=dateFormat($row_remindersmst[$i]['startDate'],"M d, Y");?></td>
                    <td><?=dateFormat($row_remindersmst[$i]['dueDate'],"M d, Y");?></td>
                    <td align="center"><a href="reminder_edit.php?edit=1&id=<?=$row_remindersmst[$i]['reminderID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a></td>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                    <td align="center">
                        <a href="reminder.php?delete=1&id=<?=$row_remindersmst[$i]['reminderID'];?>">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                    <? } ?>
                </tr>
                <? $cnt++; } ?>

                <?
                    if(isset($_POST['search']) && count($row_searchrem) > 0){ 
                        $cnt=1; 
                        for($i=0;$i<count($row_searchrem);$i++){ 
                ?>
                <tr>
                    <td><?=$cnt;?></td>
                    <td><?=$row_searchrem[$i]['title'];?></td>
                    <td><?=dateFormat($row_searchrem[$i]['startDate'],"M d, Y");?></td>
                    <td><?=dateFormat($row_searchrem[$i]['dueDate'],"M d, Y");?></td>
                    <td align="center"><a href="reminder_edit.php?edit=1&id=<?=$row_searchrem[$i]['reminderID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a></td>
                </tr>
                <?      $cnt++; }
                    } 
                ?>

        </table>
    </div>
</div>