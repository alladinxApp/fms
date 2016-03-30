<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE COMPANY</h2>
<p><a href="company_add.php"><span class="fa fa-plus-square"> ADD NEW COMPANY</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Company ID</th>
                    <th>Company Name</th>
                    <th>Company Address</th>
                    <th>Insurance Applied Date</th>
                    <th>Insurance Expiration Date</th>
                    <th>Modify<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?> / Delete<? } ?></th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_companymst);$i++){ 
                        if($row_companymst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_companymst[$i]['companyID'];?></td>
                    <td><?=$row_companymst[$i]['companyName'];?></td>
                    <td><?=$row_companymst[$i]['companyAddress'];?></td>
                    <td align="center"><?=dateFormat($row_companymst[$i]['insuranceAppliedDate'],"M d, Y");?></td>
                    <td align="center"><?=dateFormat($row_companymst[$i]['insuranceExpirationDate'],"M d, Y");?></td>
                    <td align="center"><a href="company_edit.php?edit=1&id=<?=$row_companymst[$i]['companyID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                     &nbsp;&nbsp; 
                    <a href="company.php?delete=1&id=<?=$row_companymst[$i]['companyID'];?>">
                        <span class="fa fa-trash"></span>
                    </a>
                    <? } ?></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>