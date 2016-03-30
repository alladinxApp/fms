<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE PARTS</h2>
<p><a href="parts_add.php"><span class="fa fa-plus-square"> ADD NEW PARTS</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Stock Code</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Description</th>
                    <th>Stock On Hand</th>
                    <th>Price</th>
                    <th>Modify<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?> / Delete<? } ?></th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_partsmst);$i++){ 
                        if($row_partsmst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_partsmst[$i]['stockCode'];?></td>
                    <td><?=$row_partsmst[$i]['brand'];?></td>
                    <td><?=$row_partsmst[$i]['model'];?></td>
                    <td><?=$row_partsmst[$i]['description'];?></td>
                    <td align="center"><?=$row_partsmst[$i]['stockOnHand'];?></td>
                    <td align="right"><?=number_format($row_partsmst[$i]['price'],2);?></td>
                    <td align="center"><a href="parts_edit.php?edit=1&id=<?=$row_partsmst[$i]['partsID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                     &nbsp;&nbsp; 
                    <a href="parts.php?delete=1&id=<?=$row_partsmst[$i]['partsID'];?>">
                        <span class="fa fa-trash"></span>
                    </a>
                    <? } ?></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>