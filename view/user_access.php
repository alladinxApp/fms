<style>
    table th{ text-align: center; }
</style>
<p><a href="user.php"><span class="fa fa-arrow-left"> BACK TO USER LIST</span></a></p>
<h2>AVAILABLE MENUS</h2>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Menu name</th>
                    <th>Add</th>
                </tr>

                <? $cnt=1; for($i=0;$i<count($row_menumst);$i++){ ?>
                <tr>
                    <td><?=$cnt;?></td>
                    <td><?=$row_menumst[$i]['menuName'];?></td>
                    <td align="center"><a href="user_access.php?user_access_add=1&userid=<?=$_GET['id'];?>&menuid=<?=$row_menumst[$i]['menuID'];?>">
                        ADD <span class="fa fa-plus"></span>
                    </a></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>
<h2>MANAGE USER ACCESS</h2>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Menu Name</th>
                    <th>Delete</th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_usermenu);$i++){ 
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_usermenu[$i]['menuName'];?></td>
                    <td align="center"><a href="user_access.php?user_access_remove=1&userid=<?=$_GET['id'];?>&menuid=<?=$row_usermenu[$i]['menuID'];?>">
                        REMOVE <span class="fa fa-trash"></span>
                    </a></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>