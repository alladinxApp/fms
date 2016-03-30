<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE PURCHASE ORDER</h2>
<p>
    <a href="poreceiving_add.php"><span class="fa fa-plus-square"> ADD NEW PURCHASE ORDER</span></a> | 
    <a href="poreceiving_search.php"><span class="fa fa-search"> SEARCH PURCHASE ORDER</span></a>
</p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

            <tr class="dark">
                <th>#</th>
				<th>Purchase Order Ref #</th>
                <th>Work Order Ref #</th>
                <th>Transaction Date</th>
				<th>Amount</th>
                <th>Modify</th>
				<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                <th>Delete</th>
				<? } ?>
                <th>Print</th>
            </tr>

            <? 
                $cnt=1; 
                for($i=0;$i<count($row_poreceivingmst);$i++){ 
                    if($row_poreceivingmst[$i]['status'] == 0){
                        $danger = 'class="primary"';
                    }else{
                        $danger = null;
                    }
            ?>
            <tr <?=$danger;?>>
                <td><?=$cnt;?></td>
				<td><?=$row_poreceivingmst[$i]['poReferenceNo'];?></td>
                <td><?=$row_poreceivingmst[$i]['woReferenceNo'];?></td>
                <td align="center"><?=dateFormat($row_poreceivingmst[$i]['poTransactionDate'],"M d, Y");?></td>
				<td align="right"><?=number_format($row_poreceivingmst[$i]['Amount'],2);?></td>
                <td align="center"><a href="poreceiving_edit.php?edit=1&id=<?=$row_poreceivingmst[$i]['poReferenceNo'];?>">
                    <span class="fa fa-pencil"></span>
                </a></td>
                <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                <td align="center"><a href="poreceiving.php?delete=1&id=<?=$row_poreceivingmst[$i]['poReferenceNo'];?>">
                    <span class="fa fa-trash"></span>
                </a></td>
                <? } ?>
                <td align="center">
                    <a href="#" onClick="printWO('<?=$row_poreceivingmst[$i]['poReferenceNo'];?>');">
                        <span class="fa fa-print"></span>
                    </a>
                </td>
            </tr>
            <? $cnt++; } ?>

            <? 
                if($num_searchpo > 0){
                for($i=0;$i<count($num_searchpo);$i++){ 
                    switch($num_searchpo[$i]['status']){
                        // case "0": $danger = 'class="primary"'; break;
                        case "6": $danger = 'class="success"'; break;
                        case "7": $danger = 'class="danger"'; break;
                        case "8": $danger = 'class="danger"'; break;
                        default: $danger = null;
                    }
            ?>
            <tr <?=$danger;?>>
                <td><?=$cnt;?></td>
                <td><?=$num_searchpo[$i]['poReferenceNo'];?></td>
                <td><?=$num_searchpo[$i]['woReferenceNo'];?></td>
                <td align="center"><?=dateFormat($num_searchpo[$i]['poTransactionDate'],"M d, Y");?></td>
                <td align="right"><?=number_format($num_searchpo[$i]['Amount'],2);?></td>
                <td align="center"><a href="poreceiving_edit.php?edit=1&id=<?=$num_searchpo[$i]['poReferenceNo'];?>">
                    <span class="fa fa-pencil"></span>
                </a></td>
                
                <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                <td align="center">
                    <a href="poreceiving.php?delete=1&id=<?=$num_searchpo[$i]['poReferenceNo'];?>">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
                <? } ?>
                
                <td align="center"><a href="#" onClick="printPO('<?=$num_searchpo[$i]['poReferenceNo'];?>');">
                    <span class="fa fa-print"></span>
                </a></td>
            </tr>
            <? $cnt++; }} ?>

        </table>
    </div>
</div>