<style>
    table th{ text-align: center; }
</style>
<h2>MANAGE MODEL</h2>
<p><a href="model_add.php"><span class="fa fa-plus-square"> ADD NEW MODEL</span></a></p>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Model ID</th>
                    <th>Description</th>
                    <th>Variant</th>
                    <th>Variant Description</th>
                    <th>Modify<? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?> / Delete<? } ?></th>
                </tr>

                <? 
                    $cnt=1; 
                    for($i=0;$i<count($row_modelmst);$i++){ 
                        if($row_modelmst[$i]['status'] == 0){
                            $danger = 'class="danger"';
                        }else{
                            $danger = null;
                        }
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_modelmst[$i]['modelID'];?></td>
                    <td><?=$row_modelmst[$i]['description'];?></td>
                    <td><?=$row_modelmst[$i]['variant'];?></td>
                    <td><?=$row_modelmst[$i]['variantDescription'];?></td>
                    <td align="center"><a href="model_edit.php?edit=1&id=<?=$row_modelmst[$i]['modelID'];?>">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <? if($_SESSION['SYS_USERTYPE'] == 1 || $_SESSION['SYS_USERLVL'] == 1){ ?>
                     &nbsp;&nbsp; 
                    <a href="model.php?delete=1&id=<?=$row_modelmst[$i]['modelID'];?>">
                        <span class="fa fa-trash"></span>
                    </a>
                    <? } ?></td>
                </tr>
                <? $cnt++; } ?>

        </table>
    </div>
</div>