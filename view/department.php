<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE DEPARTMENT</h2>
<p><a href="department_add.php"><span class="fa fa-plus-square"> ADD NEW DEPARTMENT</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Department ID</th>
                    <th>Department Name</th>
                    <th>Modify<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?> / Delete<? } ?></th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_departmentmst);$i++){ 
                        if($row_departmentmst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_departmentmst[$i]['departmentID'];?></td>
                    <td><?=$row_departmentmst[$i]['departmentName'];?></td>
                    <td align="center"><a href="department_edit.php?edit=1&id=<?=$row_departmentmst[$i]['departmentID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                     &nbsp;&nbsp; 
                    <a href="department.php?delete=1&id=<?=$row_departmentmst[$i]['departmentID'];?>">
                        <span class="fa fa-trash"></span>
                    </a>
                    <? } ?></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>