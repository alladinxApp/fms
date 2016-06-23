<style>
    table th{ text-align: center; }
</style>
<h2>SEARCH REPAIR COST PER SUPPLIER</h2>
<div class="row">
    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="workorder-search" action="repair_cost_per_supplier.php">
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
    <input type="hidden" name="exportReport" id="exportReport" value="repaircostpersupplier" />
    <input type="hidden" name="txtFromDt" id="txtFromDt" value="<?=$fromdt;?>" />
    <input type="hidden" name="txtToDt" id="txtToDt" value="<?=$todt;?>" />
</div>
</form>
<div class="row">
    <div id="spy8" class="panel">
        <div class="panel-body pn">
            <table class="table table-hover table-condensed table-striped table-responsive table-bordered" style="font-size: 10px;">

                    <tr class="dark">
                        <th>Supplier</th>
                        <th>Total ( Average )</th>
                        <th>Parts</th>
                        <th>Oil/Lubs</th>
                        <th>Others</th>
                        <th colspan="8">Service Type</th>
                    </tr>
                    <tr class="dark">
                        <th colspan="5">&nbsp;</th>
                        <th>PMS</th>
                        <th>A/C</th>
                        <th>Elec</th>
                        <th>Mech</th>
                        <th>Body</th>
                        <th>Detailing</th>
                        <th>RP</th>
                        <th>Others</th>
                    </tr>
                    <? 
                        $cnt = 1; 
                        $grandTotal = 0;
                        $t_services = 0;
                        $t_parts = 0;
                        $t_misc = 0;
                        $t_labor = 0;
                        $t_pms = 0;
                        $t_ac = 0;
                        $t_elec = 0;
                        $t_mech = 0;
                        $t_body = 0;
                        $t_detailing = 0;
                        $t_rp = 0;
                        $t_others = 0;
                        for($i=0;$i<count($rowData);$i++){
                            $grandTotal += $rowData[$i]['total'];
                            $t_parts += $rowData[$i]['parts'];
                            $t_misc += $rowData[$i]['miscellaneous'];
                            $t_labor += $rowData[$i]['labor'];
                            $t_pms += $rowData[$i]['PMS'];
                            $t_ac += $rowData[$i]['AC'];
                            $t_elec += $rowData[$i]['elec'];
                            $t_mech += $rowData[$i]['mech'];
                            $t_body += $rowData[$i]['body'];
                            $t_detailing += $rowData[$i]['detailing'];
                            $t_rp += $rowData[$i]['RP'];
                            $t_others += $rowData[$i]['others'];

                            $bg = null;
                            
                            if($cnt % 2){
                                $bg = 'background: #eee;';
                            }

                            $style = $bg;
                    ?>
                    <tr>
                        <td <?=$style;?>><?=$cnt;?>.) <?=$rowData[$i]['supplierName'];?></td>
                        <td <?=$style;?> align="right"><?=number_format($rowData[$i]['total'],2);?> ( <?=number_format($rowData[$i]['average'],2);?> )</td>
                        <td <?=$style;?> align="right"><?=number_format($rowData[$i]['parts'],2);?></td>
                        <td <?=$style;?> align="right"><?=number_format($rowData[$i]['miscellaneous'],2);?></td>
                        <td <?=$style;?> align="right"><?=number_format($rowData[$i]['labor'],2);?></td>
                        <td <?=$style;?> align="right"><?=number_format($rowData[$i]['PMS'],2);?></td>
                        <td <?=$style;?> align="right"><?=number_format($rowData[$i]['AC'],2);?></td>
                        <td <?=$style;?> align="right"><?=number_format($rowData[$i]['elec'],2);?></td>
                        <td <?=$style;?> align="right"><?=number_format($rowData[$i]['mech'],2);?></td>
                        <td <?=$style;?> align="right"><?=number_format($rowData[$i]['body'],2);?></td>
                        <td <?=$style;?> align="right"><?=number_format($rowData[$i]['detailing'],2);?></td>
                        <td <?=$style;?> align="right"><?=number_format($rowData[$i]['RP'],2);?></td>
                        <td <?=$style;?> align="right"><?=number_format($rowData[$i]['others'],2);?></td>
                    </tr>
                    <? $cnt++; } $noOfSuppliers = ($cnt - 1); ?>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-lg-2">GRAND TOTAL</div>
            <div class="col-lg-2">: <b><?=number_format($grandTotal,2);?></b></div>
            <div class="col-lg-6 text-center"><b>SERVICES</b></div>
            <div class="col-lg-2">&nbsp;</div>
        </div>
        <div class="form-group">
            <div class="col-lg-2">No Of Suppliers</div>
            <div class="col-lg-2">: <b><?=$noOfSuppliers;?></b></div>
            <div class="col-lg-1">PMS</div>
            <div class="col-lg-2">: <b><?=number_format($t_pms,2);?></b></div>
            <div class="col-lg-1">Body</div>
            <div class="col-lg-2">: <b><?=number_format($t_body,2);?></b></div>
            <div class="col-lg-2">&nbsp;</div>
        </div>
        <div class="form-group">
            <div class="col-lg-2">Services</div>
            <div class="col-lg-2">: <b><? ?></b></div>
            <div class="col-lg-1">A/C</div>
            <div class="col-lg-2">: <b><?=number_format($t_ac,2);?></b></div>
            <div class="col-lg-1">Detailing</div>
            <div class="col-lg-2">: <b><?=number_format($t_detailing,2);?></b></div>
            <div class="col-lg-2">&nbsp;</div>
        </div>
        <div class="form-group">
            <div class="col-lg-2">Parts</div>
            <div class="col-lg-2">: <b><?=number_format($t_parts,2);?></b></div>
            <div class="col-lg-1">Elec</div>
            <div class="col-lg-2">: <b><?=number_format($t_elec,2);?></b></div>
            <div class="col-lg-1">RP</div>
            <div class="col-lg-2">: <b><?=number_format($t_rp,2);?></b></div>
            <div class="col-lg-2">&nbsp;</div>
        </div>
        <div class="form-group">
            <div class="col-lg-2">Oil/Lubs</div>
            <div class="col-lg-2">: <b><?=number_format($t_misc,2);?></b></div>
            <div class="col-lg-1">Mech</div>
            <div class="col-lg-2">: <b><?=number_format($t_mech,2);?></b></div>
            <div class="col-lg-1">Others</div>
            <div class="col-lg-2">: <b><?=number_format($t_others,2);?></b></div>
            <div class="col-lg-2">&nbsp;</div>
        </div>
        <div class="form-group">
            <div class="col-lg-2">Misc/Others</div>
            <div class="col-lg-2">: <b><?=number_format($t_labor,2);?></b></div>
            <div class="col-lg-8">&nbsp;</div>
        </div>
    </div>
</div>
<? } ?>