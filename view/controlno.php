<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE CONTROL NO</h2>
<p><a href="controlno_add.php"><span class="fa fa-plus-square"> ADD NEW CONTROL NO</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Description</th>
                    <th>Control Type</th>
                    <th>Control Code</th>
                    <th>No of Digit</th>
                    <th>Last Digit</th>
                    <th>Modify<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?> / Delete<? } ?></th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_ctrlno);$i++){ 
                        if($row_ctrlno[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_ctrlno[$i]['description'];?></td>
                    <td><?=$row_ctrlno[$i]['type'];?></td>
                    <td><?=$row_ctrlno[$i]['code'];?></td>
                    <td align="center"><?=$row_ctrlno[$i]['noOfDigit'];?></td>
                    <td align="center"><?=$row_ctrlno[$i]['lastDigit'];?></td>
                    <td align="center"><a href="controlno_edit.php?edit=1&id=<?=$row_ctrlno[$i]['id'];?>">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?> &nbsp;&nbsp; 
                    <a href="controlno.php?delete=1&id=<?=$row_ctrlno[$i]['id'];?>">
                        <span class="fa fa-trash"></span>
                    </a>
                    <? } ?></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>