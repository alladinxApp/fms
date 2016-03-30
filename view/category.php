<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE CATEGORY</h2>
<p><a href="category_add.php"><span class="fa fa-plus-square"> ADD NEW CATEGORY</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Modify<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?> / Delete<? } ?></th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_categorymst);$i++){ 
                        if($row_categorymst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_categorymst[$i]['categoryID'];?></td>
                    <td><?=$row_categorymst[$i]['categoryName'];?></td>
                    <td align="center"><a href="category_edit.php?edit=1&id=<?=$row_categorymst[$i]['categoryID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                     &nbsp;&nbsp; 
                    <a href="category.php?delete=1&id=<?=$row_categorymst[$i]['categoryID'];?>">
                        <span class="fa fa-trash"></span>
                    </a>
                    <? } ?></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>