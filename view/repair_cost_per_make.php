<style>
    table th{ text-align: center; }
</style>
<h2>SEARCH REPAIR COST PER MAKE</h2>
<div class="row">
    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="workorder-search" action="repair_cost_per_make.php">
                <div class="form-group">
                    <label class="col-lg-2" for="txtFromDt">From</label>
                    <div class="col-lg-2">
                        <input type="text" name="txtFromDt" id="txtFromDt" value="<?=dateFormat($fromdt,"Y-m-d");?>" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                    <label class="col-lg-1" for="txtToDt">To</label>
                    <div class="col-lg-2">
                        <input type="text" name="txtToDt" id="txtToDt" value="<?=dateFormat($todt,"Y-m-d");?>" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2">&nbsp;</label>
                    <div class="col-lg-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> SEARCH </button>
                    </div>
                </div>
                <input type="hidden" name="search" id="search" value="1" />
            </form>
        </div>
    </div>
</div>
<? if(!empty($rowData)){ ?>
<form role="form" class="form-horizontal" method="Post" id="workorder-search" target="_blank" action="export.php">
<div class="row">
    <div class="form-group">
        <div class="col-lg-1">
            <button class="btn btn-sm btn-primary btn-block btn-gradient" type="submit"> EXPORT </button>
        </div>
    </div>
    <input type="hidden" name="exportReport" id="exportReport" value="repaircostpermake" />
    <input type="hidden" name="txtFromDt" id="txtFromDt" value="<?=$fromdt;?>" />
    <input type="hidden" name="txtToDt" id="txtToDt" value="<?=$todt;?>" />
</div>
</form>
<div class="row">
    <div id="spy8" class="panel">
        <div class="panel-body pn">
            <table class="table table-hover table-condensed table-striped table-responsive table-bordered" style="font-size: 10px;">

                    <tr class="dark">
                        <th colspan="2">Year | Make | Model</th>
                        <th>Total (Average)</th>
                        <th>Parts</th>
                        <th>Oil/Lubs</th>
                        <th>Others</th>
                        <th colspan="8">Service Type</th>
                    </tr>
                    <tr class="dark">
                        <th colspan="6">&nbsp;</th>
                        <th>PMS</th>
                        <th>A/C</th>
                        <th>Elec</th>
                        <th>Mech</th>
                        <th>Body</th>
                        <th>Detailing</th>
                        <th>RP</th>
                        <th>Others</th>
                    </tr>
                    <? $cnt = 1; for($i=0;$i<count($rowData);$i++){ ?>
                    <tr>
                        <td colspan="14" class="primary">-- <?=$rowData[$i]['makeName'];?> --</td>
                        <?
                            $equipments = $rowData[$i]['equipments'];
                            for($a=0;$a<count($equipments);$a++){
                                $bg = null;
                                
                                if($cnt % 2){
                                    $bg = 'background: #eee;';
                                }

                                $style = $bg;
                        ?>
                        <tr>
                            <td <?=$style;?>><?=$cnt;?>.) <?=$equipments[$a]['eYearDesc'];?> <?=$equipments[$a]['eMakeName'];?> <?=$equipments[$a]['eModelDesc'];?></td>
                            <td align="center"><?=$equipments[$a]['eVehicles'];?></td>
                            <td <?=$style;?> align="right"><?=number_format($equipments[$a]['total'],2);?> ( <?=number_format($equipments[$a]['average'],2);?> )</td>
                            <td <?=$style;?> align="right"><?=number_format($equipments[$a]['parts'],2);?></td>
                            <td <?=$style;?> align="right"><?=number_format($equipments[$a]['miscellaneous'],2);?></td>
                            <td <?=$style;?> align="right"><?=number_format($equipments[$a]['labor'],2);?></td>
                            <td <?=$style;?> align="right"><?=number_format($equipments[$a]['PMS'],2);?></td>
                            <td <?=$style;?> align="right"><?=number_format($equipments[$a]['AC'],2);?></td>
                            <td <?=$style;?> align="right"><?=number_format($equipments[$a]['elec'],2);?></td>
                            <td <?=$style;?> align="right"><?=number_format($equipments[$a]['mech'],2);?></td>
                            <td <?=$style;?> align="right"><?=number_format($equipments[$a]['body'],2);?></td>
                            <td <?=$style;?> align="right"><?=number_format($equipments[$a]['detailing'],2);?></td>
                            <td <?=$style;?> align="right"><?=number_format($equipments[$a]['RP'],2);?></td>
                            <td <?=$style;?> align="right"><?=number_format($equipments[$a]['others'],2);?></td>
                        </tr>
                        <? $cnt++; } ?>
                        <tr>
                            <td align="right"><b>Total >>>>></b></td>
                            <td align="center"><b><?=$rowData[$i]['noOfVehicles'];?></b></td>
                            <td align="right"><b><?=number_format($rowData[$i]['total'],2);?> ( <?=number_format($rowData[$i]['average'],2);?> )</b></td>
                            <td align="right"><b><?=number_format($rowData[$i]['parts'],2);?></b></td>
                            <td align="right"><b><?=number_format($rowData[$i]['miscellaneous'],2);?></b></td>
                            <td align="right"><b><?=number_format($rowData[$i]['labor'],2);?></b></td>
                            <td align="right"><b><?=number_format($rowData[$i]['PMS'],2);?></b></td>
                            <td align="right"><b><?=number_format($rowData[$i]['AC'],2);?></b></td>
                            <td align="right"><b><?=number_format($rowData[$i]['elec'],2);?></b></td>
                            <td align="right"><b><?=number_format($rowData[$i]['mech'],2);?></b></td>
                            <td align="right"><b><?=number_format($rowData[$i]['body'],2);?></b></td>
                            <td align="right"><b><?=number_format($rowData[$i]['detailing'],2);?></b></td>
                            <td align="right"><b><?=number_format($rowData[$i]['RP'],2);?></b></td>
                            <td align="right"><b><?=number_format($rowData[$i]['others'],2);?></b></td>
                        </tr>
                    </tr>
                    <? } ?>

            </table>
        </div>
    </div>
</div>
<? } ?>