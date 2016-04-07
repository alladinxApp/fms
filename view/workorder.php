<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE WORK ORDER</h2>
<p>
    <a href="workorder_add.php"><span class="fa fa-plus-square"> ADD NEW WORK ORDER</span></a> | 
    <a href="workorder_search.php"><span class="fa fa-search"> SEARCH WORK ORDER</span></a>
</p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Work Order Ref #</th>
                    <th>Transaction Date</th>
                    <th>Service Type</th>
                    <th>Plate No</th>
                    <th>Total Cost</th>
                    <th>Status</th>
                    <th>Modify</th>
                    <th><? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>Delete<? } ?></th>
                    <th>Print</th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_workordermst);$i++){ 
                        if($row_workordermst[$i]['status'] == 0){
                            $danger = 'class="primary"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_workordermst[$i]['woReferenceNo'];?></td>
                    <td align="center"><?=dateFormat($row_workordermst[$i]['woTransactionDate'],"M d, Y");?></td>
                    <td><?=$row_workordermst[$i]['serviceType'];?></td>
                    <td><?=$row_workordermst[$i]['plateNo'];?></td>
                    <td align="right"><?=number_format($row_workordermst[$i]['totalCost'],2);?></td>
                    <td align="center"><?=$row_workordermst[$i]['statusDesc'];?></td>
                    <td align="center"><a href="workorder_edit.php?edit=1&id=<?=$row_workordermst[$i]['woReferenceNo'];?>">
                        <span class="fa fa-pencil"></span>
                    </a></td>
                    
                    <td align="center">
                    <? if(($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1) && $row_workordermst[$i]['status'] == 0){ ?>
                        <a href="workorder.php?delete=1&id=<?=$row_workordermst[$i]['woReferenceNo'];?>">
                            <span class="fa fa-trash"></span>
                        </a>
                    <? } ?>
                    </td>
                    
                    <td align="center">
                        <a href="#" onClick="printWO('<?=$row_workordermst[$i]['woReferenceNo'];?>');">
                            <span class="fa fa-print"></span>
                        </a>
                    </td>
                </tr>
                <? $cnt++; } ?>

                <? 
                    if($num_searchwo > 0){
                    for($i=0;$i<count($row_searchwo);$i++){ 
                        switch($row_searchwo[$i]['status']){
                            // case "0": $danger = 'class="primary"'; break;
                            case "6": $danger = 'class="success"'; break;
                            case "7": $danger = 'class="danger"'; break;
                            case "8": $danger = 'class="danger"'; break;
                            default: $danger = null;
                        }
                ?>
                <tr class="success">
                    <td><?=$cnt;?></td>
                    <td><?=$row_searchwo[$i]['woReferenceNo'];?></td>
                    <td align="center"><?=dateFormat($row_searchwo[$i]['woTransactionDate'],"M d, Y");?></td>
                    <td><?=$row_searchwo[$i]['serviceType'];?></td>
                    <td><?=$row_searchwo[$i]['plateNo'];?></td>
                    <td align="right"><?=number_format($row_searchwo[$i]['totalCost'],2);?></td>
                    <td align="center"><?=$row_searchwo[$i]['statusDesc'];?></td>
                    <td align="center"><a href="workorder_edit.php?edit=1&id=<?=$row_searchwo[$i]['woReferenceNo'];?>">
                        <span class="fa fa-pencil"></span>
                    </a></td>
                    
                    <td align="center">
                    <? if(($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1) && $row_workordermst[$i]['status'] == 0){ ?>
                        <a href="workorder.php?delete=1&id=<?=$row_searchwo[$i]['woReferenceNo'];?>">
                            <span class="fa fa-trash"></span>
                        </a>
                    <? } ?>
                    </td>
                    
                    <td align="center"><a href="#" onClick="printWO('<?=$row_searchwo[$i]['woReferenceNo'];?>');">
                        <span class="fa fa-print"></span>
                    </a></td>
                </tr>
                <? $cnt++; }} ?>

        </table>
    </div>
</div>