<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE USERS</h2>
<p><a href="user_add.php"><span class="fa fa-plus-square"> ADD NEW USER</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Type</th>
                    <th>Access Level</th>
                    
                    <th>User Menu</th>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                    <th>User Assignee</th>
                    <? } ?>
                    <th>Modify</th>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                    <th>Delete</th>
                    <? } ?>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_usermst);$i++){ 
                        if($row_usermst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_usermst[$i]['userID'];?></td>
                    <td><?=$row_usermst[$i]['userName'];?></td>
                    <td align="center"><?=$row_usermst[$i]['userTypeDesc'];?></td>
                    <td align="center"><?=$row_usermst[$i]['accessLevelDesc'];?></td>
                    
                    <td align="center"><a href="user_access.php?id=<?=$row_usermst[$i]['userID'];?>">
                        <span class="fa fa-list"></span>
                    </a></td>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                    <td align="center"><a href="user_assignee.php?id=<?=$row_usermst[$i]['userID'];?>">
                        <span class="fa fa-user"></span>
                    </a></td>
                    <? } ?>
                    <td align="center"><a href="user_edit.php?edit=1&id=<?=$row_usermst[$i]['userID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a></td>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                    <td align="center"><a href="user.php?delete=1&id=<?=$row_usermst[$i]['userID'];?>">
                        <span class="fa fa-trash"></span>
                    </a></td>
                    <? } ?>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>