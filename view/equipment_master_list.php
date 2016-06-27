<style>
    table th{ text-align: center; }
</style>
<h2>SEARCH EQUIPMENT MASTER LIST</h2>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="workorder-search" action="equipment_master_list.php">
                <div class="form-group">
                    <label class="col-lg-3" for="txtAssignee">Assignee</label>
                    <div class="col-lg-3">
                         <input type="text" class="form-control gui-input input-sm" placeholder="Enter Assignee here..." name="txtAssignee" id="txtAssignee" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3" for="txtEquipment">Equipment(conduction / plate#)</label>
                    <div class="col-lg-3">
                         <input type="text" class="form-control gui-input input-sm" placeholder="Enter Conduction / Plate# here..." name="txtEquipment" id="txtEquipment" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3" for="txtDepartment">Department</label>
                    <div class="col-lg-3">
                         <input type="text" class="form-control gui-input input-sm" placeholder="Enter Department here..." name="txtDepartment" id="txtDepartment" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3">&nbsp;</label>
                    <div class="col-lg-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> SEARCH </button>
                    </div>
                </div>
                <input type="hidden" name="search" id="search" value="1" />
            </form>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body pn">
            <table class="table table-hover table-condensed table-striped table-responsive table-bordered">
                    <?
                        if(isset($_POST['search']) && !empty($_POST['search']) && $_POST['search'] == 1){
                            if($num_searchequip == 0){
                                $danger = 'class="danger"';
                            }else{
                                $danger = 'class="success"';
                            }
                    ?>
                        <tr <?=$danger;?>>
                            <td colspan="8" >Equipment Found ( <b><?=$num_searchequip;?></b> ) Display Result</td>
                        </tr>
                    <? } ?>
                    <tr class="dark">
                        <th>#</th>
                        <th>Assignee</th>
                        <th>Company</th>
                        <th>Department</th>
                        <th>Conduction / Plate#</th>
                        <th>Make | Model | Year</th>
                        <th>Location</th>
                    </tr>

                    <? 
                        $cnt=1; 
                        for($i=0;$i<count($row_searchequip);$i++){ 
                            if($row_searchequip[$i]['status'] == 0){
                                $danger = 'class="danger"';
                            }else{
                                $danger = null;
                            }
                    ?>
                    <tr <?=$danger;?>>
                        <td><?=$cnt;?></td>
                        <td><?=$row_searchequip[$i]['assigneeName'];?></td>
                        <td><?=$row_searchequip[$i]['companyName'];?></td>
                        <td><?=$row_searchequip[$i]['departmentName'];?></td>
                        <td><?=$row_searchequip[$i]['plateNo'] != "" ? $row_searchequip[$i]['plateNo'] : $row_searchequip[$i]['conductionSticker'];?></td>
                        <td><?=$row_searchequip[$i]['makeName'] . " " . $row_searchequip[$i]['modelName'] . " " . $row_searchequip[$i]['yearDesc'];?></td>
                        <td><?=$row_searchequip[$i]['locationName'];?></td>
                    </tr>
                    <? $cnt++; } ?>
                    
            </table>
        </div>
    </div>
    <? if(isset($_POST['search']) && !empty($_POST['search']) && $_POST['search'] == 1 && $num_searchequip > 0){ ?>
    <form role="form" class="form-horizontal" method="Post" action="export.php" target="_blank"> 
        <div class="form-group">
            <div class="col-xs-1">
                <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> EXPORT </button>
            </div>
        </div>
        <input type="hidden" name="exportReport" id="exportReport" value="equipmentmasterlist" />
        <input type="hidden" name="txtAssignee" id="txtAssignee" value="<?=$sassignee;?>" />
        <input type="hidden" name="txtPlateNo" id="txtPlateNo" value="<?=$sequipment;?>" />
        <input type="hidden" name="txtDepartment" id="txtDepartment" value="<?=$sdepartment;?>" />
    </form>
    <? } ?>
</div>