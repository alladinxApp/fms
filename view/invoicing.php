<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE INVOICING</h2>
<!--<p>
    <a href="invoicing_search.php"><span class="fa fa-search"> SEARCH INVOICING</span></a>
</p>-->
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Work Order Ref #</th>
                    <th>Invoice Ref #</th>
                    <th>Invoice Date</th>
                    <th>Service Type</th>
                    <th>Plate No</th>
                    <th>Total Cost</th>
                    <th>Posting</th>
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
                    <td><?=$row_workordermst[$i]['invoiceReferenceNo'];?></td>
                    <td align="center"><?=dateFormat($row_workordermst[$i]['invoiceDate'],"M d, Y");?></td>
                    <td><?=$row_workordermst[$i]['serviceType'];?></td>
                    <td><?=$row_workordermst[$i]['plateNo'];?></td>
                    <td align="right"><?=number_format($row_workordermst[$i]['totalCost'],2);?></td>
                    <td align="center"><a href="invoice_posting.php?edit=1&id=<?=$row_workordermst[$i]['invoiceReferenceNo'];?>">
                        <span class="fa fa-edit"></span> PROCEED 
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
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_searchwo[$i]['woReferenceNo'];?></td>
                    <td><?=$row_searchwo[$i]['invoiceReferenceNo'];?></td>
                    <td align="center"><?=dateFormat($row_searchwo[$i]['invoiceDate'],"M d, Y");?></td>
                    <td><?=$row_searchwo[$i]['serviceType'];?></td>
                    <td><?=$row_searchwo[$i]['plateNo'];?></td>
                    <td align="right"><?=number_format($row_searchwo[$i]['totalCost'],2);?></td>
                    <td align="center"><?=$row_searchwo[$i]['statusDesc'];?></td>
                    <td align="center"><a href="workorder_edit.php?edit=1&id=<?=$row_searchwo[$i]['woReferenceNo'];?>">
                        <span class="fa fa-pencil"></span>
                    </a></td>
                    
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                    <td align="center">
                        <a href="workorder.php?delete=1&id=<?=$row_searchwo[$i]['woReferenceNo'];?>">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                    <? } ?>
                    
                    <td align="center"><a href="#" onClick="printWO('<?=$row_searchwo[$i]['woReferenceNo'];?>');">
                        <span class="fa fa-print"></span>
                    </a></td>
                </tr>
                <? $cnt++; }} ?>

        </table>
    </div>
</div>