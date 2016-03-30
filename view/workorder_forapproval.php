<div class="row">
    <? $img = new Image('imgs/fms_logo.png',300); ?>
</div>

<div class="row">
    <div class="panel">

        <div class="panel-body">
            <div class="form-group">
                <h2>WORK ORDER FOR APPROVAL</h2>
            </div><hr noshade>
            <form role="form" class="form-horizontal" method="Post" id="workorder-form">
                <div class="form-group">
                    <label class="col-lg-2" for="inputStandard">WORK ORDER #</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_chkwo[0]['woReferenceNo'];?> (<?=$statusDesc;?>)" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                    <label class="col-lg-2" for="inputStandard">Transaction Date</label>
                    <div class="col-lg-3">
                        <input type="text" value="<?=dateFormat($row_chkwo[0]['woTransactionDate'],'M d, Y');?>" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="col-lg-4" for="txtServiceType">Service Type</label>
                            <div class="col-lg-8">: <?=$row_chkwo[0]['serviceType'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtEquipment">Equipment</label>
                            <div class="col-lg-8">: <?=$row_chkwo[0]['plateNo'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtParts">Assignee</label>
                            <div class="col-lg-8">: <?=$row_chkwo[0]['assignee'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtMeter">Meter</label>
                            <div class="col-lg-8">: <?=$row_chkwo[0]['meter'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtIsWarranty">Is Warranty?</label>
                            <div class="col-lg-8">: <?=$row_chkwo[0]['isWarrantyDesc'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtIsBackJob">Is Back Job?</label>
                            <div class="col-lg-8">: <?=$row_chkwo[0]['isBackJobDesc'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtRemarks">Justification</label>
                            <div class="col-lg-6">: <?=$row_chkwo[0]['remarks'];?></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <? if($num_wo_dtl > 0){ ?>
                            <div class="form-group col-lg-12">
                                <table class="table table-hover table-condensed table-striped table-responsive table-bordered">
                                    <tr>
                                        <th>#</th>
                                        <th>Desc</th>
                                        <th>Price(Qty)</th>
                                        <th>Total</th>
                                    </tr>
                                    <? 
                                        $cnt = 1; 
                                        $newArrParts = null;
                                        for($i=0;$i<count($row_wo_dtl);$i++){ 
                                            $desc = $row_wo_dtl[$i]['description']; // description 
                                            $partsID = $row_wo_dtl[$i]['partsID'];
                                            $priceQty = number_format($row_wo_dtl[$i]['partsPrice'],2) . ' (' . $row_wo_dtl[$i]['qty'] . ')'; // price(qty)
                                            $total = ($row_wo_dtl[$i]['partsPrice'] * $row_wo_dtl[$i]['qty']);
                                            $partsCost += $total;
                                            $totalqty += $row_wo_dtl[$i]['qty'];
                                    ?>
                                    <tr>
                                        <td><?=$cnt;?></td>
                                        <td><?=$desc;?></td>
                                        <td align="right"><?=$priceQty;?></td>
                                        <td align="right"><?=number_format($total,2);?></td>
                                    </tr>
                                    <? $cnt++; } ?>
                                    <tr>
                                        <td colspan="2" align="right"><b>TOTAL >>>></b></td>
                                        <td align="center"><b><?=$totalqty;?></b></td>
                                        <td align="right"><b><?=number_format($partsCost,2);?></b></td>
                                    </tr>
                                </table>
                            </div>
                        <? } ?>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtLabor">Labor</label>
                            <div class="col-lg-4">: <?=$row_chkwo[0]['labor'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtMiscellaneous">Miscellaneous</label>
                            <div class="col-lg-4">: <?=$row_chkwo[0]['miscellaneous'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtParts">Parts</label>
                            <div class="col-lg-4">: <?=$partsCost;?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtDiscount">Discount</label>
                            <div class="col-lg-4">: <?=$row_chkwo[0]['discount'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtTax">Tax</label>
                            <div class="col-lg-4">: <?=$row_chkwo[0]['tax'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtTotalCost"><b>TotalCost</b></label>
                            <div class="col-lg-4"><b>: <?=$row_chkwo[0]['totalCost'];?></b></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtRemarks">Remarks</label>
                    <div class="col-lg-4"><textarea class="form-control textarea-grow" id="txtApproverRemarks" name="txtApproverRemarks" rows="4"></textarea></div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtStatus">Status</label>
                    <div class="col-lg-4">
                        <select class="required" name="txtStatus" id="txtStatus">
                            <option value="2">Approve</option>
                            <option value="7">Dispprove</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2">&nbsp;</label>
                    <div class="col-xs-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> SUBMIT </button>
                    </div>
                </div>
                <input type="hidden" name="approved" id="approved" value="1" />
            </form>
        </div>
    </div>

</div>