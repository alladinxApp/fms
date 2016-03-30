<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE SUPPLIER</h2>
<p><a href="supplier_add.php"><span class="fa fa-plus-square"> ADD NEW SUPPLIER</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Supplier ID</th>
                    <th>Supplier Name</th>
                    <th>Supplier Address</th>
                    <th>Contact No</th>
                    <th>Contact Person</th>
                    <th>Modify<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?> / Delete<? } ?></th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_suppliermst);$i++){ 
                        if($row_suppliermst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_suppliermst[$i]['supplierID'];?></td>
                    <td><?=$row_suppliermst[$i]['supplierName'];?></td>
                    <td><?=$row_suppliermst[$i]['supplierAddress'];?></td>
                    <td><?=$row_suppliermst[$i]['supplierContactNo'];?></td>
                    <td><?=$row_suppliermst[$i]['supplierContactPerson'];?></td>
                    <td align="center"><a href="supplier_edit.php?edit=1&id=<?=$row_suppliermst[$i]['supplierID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                     &nbsp;&nbsp; 
                    <a href="supplier.php?delete=1&id=<?=$row_suppliermst[$i]['supplierID'];?>">
                        <span class="fa fa-trash"></span>
                    </a>
                    <? } ?></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>