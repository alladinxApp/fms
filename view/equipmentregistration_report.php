<style>
    table th{ text-align: center; }
</style>
<h2>EQUIPMENT REGISTRATION REPORT</h2>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" enctype="multipart/form-data" id="equipment-form">
                <div class="form-group">
                    <label class="col-md-1" for="txtFromDt">Created</label>
                    <div class="col-md-2">
                        <input type="text" name="txtFromDt" id="txtFromDt" class="form-control gui-input input-sm" placeholder="FROM" />
                    </div>
                    <label style="float: left;">-</label>
                    <div class="col-md-2">
                        <input type="text" name="txtToDt" id="txtToDt" class="form-control gui-input input-sm" placeholder="TO" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1" for="txtPlateNo">Plate No</label>
                    <div class="col-md-2">
                        <input type="text" name="txtPlateNo" id="txtPlateNo" class="form-control gui-input input-sm" placeholder="Enter Plate No here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1" for="txtAssignee">Assignee</label>
                    <div class="col-md-2">
                        <input type="text" name="txtAssignee" id="txtAssignee" class="form-control gui-input input-sm" placeholder="Enter Assignee here..." />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-1">&nbsp;</label>
                    <div class="col-lg-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> SUBMIT </button>
                    </div>
                </div>
                <input type="hidden" name="queryReport" id="queryReport" value="1" />
            </form>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body pn">
            <table class="table table-hover table-condensed table-striped table-responsive table-bordered">
                    <?
                        if(isset($_POST['queryReport']) && !empty($_POST['queryReport']) && $_POST['queryReport'] == 1){
                            if($num_equipmentmst == 0){
                                $danger = 'class="danger"';
                            }else{
                                $danger = 'class="success"';
                            }
                    ?>
                        <tr <?=$danger;?>>
                            <td colspan="8" >Equipments Found ( <b><?=$num_equipmentmst;?></b> ) Display Result</td>
                        </tr>
                    <? } ?>
                    <tr class="dark">
                        <th>#</th>
                        <th>Plate No</th>
                        <th>Make / Model / Year</th>
                        <th>Assignee</th>
                        <th>Department</th>
                        <th>Purchased Date</th>
                        <th>Registration Date</th>
                        <th>Registration Expiry Date</th>
                    </tr>

                    <? 
                        $cnt=1; 
                        for($i=0;$i<count($row_equipmentmst);$i++){ 
                            if($row_equipmentmst[$i]['status'] == 0){
                                $danger = 'class="danger"';
                            }else{
                                $danger = null;
                            }
                    ?>
                    <tr <?=$danger;?>>
                        <td><?=$cnt;?></td>
                        <td><?=$row_equipmentmst[$i]['plateNo'];?></td>
                        <td><?=$row_equipmentmst[$i]['makeName'] . ' / ' . $row_equipmentmst[$i]['modelName'] . ' / ' . $row_equipmentmst[$i]['year'];?></td>
                        <td><?=$row_equipmentmst[$i]['assigneeName'];?></td>
                        <td><?=$row_equipmentmst[$i]['department'];?></td>
                        <td align="center"><?=dateFormat($row_equipmentmst[$i]['purchaseDate'],"M d, Y");?></td>
                        <td align="center"><?=dateFormat($row_equipmentmst[$i]['registrationDate'],"M d, Y");?></td>
                        <td align="center"><?=dateFormat($row_equipmentmst[$i]['registrationExpiryDate'],"M d, Y");?></td>
                    </tr>
                    <? $cnt++; } ?>
                    
            </table>
        </div>
    </div>
    <? if(isset($_POST['queryReport']) && !empty($_POST['queryReport']) && $_POST['queryReport'] == 1 && $num_equipmentmst > 0){ ?>
    <form role="form" class="form-horizontal" method="Post" action="export.php" target="_blank"> 
        <div class="form-group">
            <div class="col-xs-1">
                <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> EXPORT </button>
            </div>
        </div>
        <input type="hidden" name="exportReport" id="exportReport" value="equipmentregistration" />
        <input type="hidden" name="txtFromDt" id="txtFromDt" value="<?=$from;?>" />
        <input type="hidden" name="txtToDt" id="txtToDt" value="<?=$to;?>" />
        <input type="hidden" name="txtPlateNo" id="txtPlateNo" value="<?=$plateNo;?>" />
        <input type="hidden" name="txtAssignee" id="txtAssignee" value="<?=$assignee;?>" />
    </form>
    <? } ?>
</div>