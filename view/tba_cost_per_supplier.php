<style>
    table th{ text-align: center; }
</style>
<h2>SEARCH TBA COST PER SUPPLIER</h2>
<div class="row">
    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="workorder-search" action="tba_cost_per_supplier.php">
                <div class="form-group">
                    <label class="col-lg-2" for="txtFromDt">From</label>
                    <div class="col-lg-2">
                        <input type="text" name="txtFromDt" value="<?=dateFormat($fromdt,"Y-m-d");?>" id="txtFromDt" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                    <label class="col-lg-1" for="txtToDt">To</label>
                    <div class="col-lg-2">
                        <input type="text" name="txtToDt" value="<?=dateFormat($todt,"Y-m-d");?>" id="txtToDt" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
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
    <input type="hidden" name="export" id="export" value="tba_cost_per_supplier" />
    <input type="hidden" name="txtFromDt" id="txtFromDt" value="<?=$fromdt;?>" />
    <input type="hidden" name="txtToDt" id="txtToDt" value="<?=$todt;?>" />
</div>
</form>
<div class="row">
    <div id="spy8" class="panel">
        <div class="panel-body pn">
            <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                    <tr class="dark">
                        <th>#</th>
                        <th>Supplier</th>
                        <th>Total (%)</th>
                        <th>Tires</th>
                        <th>Batteries</th>
                        <th>Wipers</th>
                        <th>Mats</th>
                        <th>Tint</th>
                    </tr>

                    <? 
                        $cnt=1; 
                        for($i=0;$i<count($rowData);$i++){ 
                            $style = "";
                            $bg = "background: #fff;";

                            if($cnt % 2){
                                $bg = "background: #eee;";
                            }

                            $style = $bg;

                            $totalAmount = $rowData[$i]['totalAmount'];
                            $totalTires = $rowData[$i]['totalTires'];
                            $totalBatteries = $rowData[$i]['totalBatteries'];
                            $totalWipers = $rowData[$i]['totalWipers'];
                            $totalMats = $rowData[$i]['totalMats'];
                            $totalTints = $rowData[$i]['totalTints'];

                            $t_totalAmount += $totalAmount;
                            $t_totalTires += $totalTires;
                            $t_totalBatteries += $totalBatteries;
                            $t_totalWipers += $totalWipers;
                            $t_totalMats += $totalMats;
                            $t_totalTints += $totalTints;
                    ?>
                    <tr>
                        <td style="<?=$style;?>"><?=$cnt;?></td>
                        <td style="<?=$style;?>"><?=$rowData[$i]['supplierName'];?></td>
                        <td align="right" style="<?=$style;?>"><?=number_format($totalAmount,2) . ' (' . $rowData[$i]['percentage'] . '%)';?></td>
                        <td align="right" style="<?=$style;?>"><?=number_format($totalTires,2);?></td>
                        <td align="right" style="<?=$style;?>"><?=number_format($totalBatteries,2);?></td>
                        <td align="right" style="<?=$style;?>"><?=number_format($totalWipers,2);?></td>
                        <td align="right" style="<?=$style;?>"><?=number_format($totalMats,2);?></td>
                        <td align="right" style="<?=$style;?>"><?=number_format($totalTints,2);?></td>
                    </tr>
                    <? 
                            $cnt++; 
                        } 
                        $noOfSuppliers = ($cnt - 1);

                        $perTires = (($t_totalTires / $t_totalAmount) * 100);
                        $perBatteries = (($t_totalBatteries / $t_totalAmount) * 100);
                        $perWipers = (($t_totalWipers / $t_totalAmount) * 100);
                        $perMats = (($t_totalMats / $t_totalAmount) * 100);
                        $perTints = (($t_totalTints / $t_totalAmount) * 100);
                    ?>
                    <tr class="primary">
                        <td colspan="2">No of Suppliers: <b><?=$noOfSuppliers;?></b></td>
                        <td align="right"><?=number_format($t_totalAmount,2);?></td>
                        <td align="right"><?=number_format($t_totalTires,2);?></td>
                        <td align="right"><?=number_format($t_totalBatteries,2);?></td>
                        <td align="right"><?=number_format($t_totalWipers,2);?></td>
                        <td align="right"><?=number_format($t_totalMats,2);?></td>
                        <td align="right"><?=number_format($t_totalTints,2);?></td>
                    </tr>
                    <tr class="success">
                        <td colspan="3">&nbsp;</td>
                        <td align="right"><?=number_format($perTires,2);?>%</td>
                        <td align="right"><?=number_format($perBatteries,2);?>%</td>
                        <td align="right"><?=number_format($peripers,2);?>%</td>
                        <td align="right"><?=number_format($perMats,2);?>%</td>
                        <td align="right"><?=number_format($perTints,2);?>%</td>
                    </tr>
            </table>
        </div>
    </div>
</div>
<? } ?>