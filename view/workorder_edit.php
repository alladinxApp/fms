<style>
    table th{ text-align: center; }
</style>
<p>
    <a href="workorder.php"><span class="fa fa-arrow-left"> BACK TO WORK ORDER LIST</span></a>
     | <a href="#" onClick="workorderPrint('<?=$row_workorder[0]['woReferenceNo'];?>')"><span class="fa fa-print"> PRINT</span></a>
</p>
<div class="row">
    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="workorder-form">
                <div class="form-group">
                    <label class="col-lg-2" for="inputStandard">WORK ORDER #</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_workorder[0]['woReferenceNo'];?> (<?=$statusDesc;?>)" disabled class="form-control gui-input input-sm" id="disabledInput">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6"> 
                        <div class="form-group">
                            <label class="col-lg-4" for="inputStandard">Transaction Date</label>
                            <div class="col-lg-4">
                                <input type="text" value="<?=dateFormat($row_workorder[0]['woTransactionDate'],'Y-m-d');?>" disabled class="form-control gui-input input-sm" id="disabledInput">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtServiceType">Service Type</label>
                            <div class="col-lg-8">
                                <select class="required" <?=$disabled;?> name="txtServiceType" id="txtServiceType">
                                    <option value="">Select Service Type</option>
                                    <? 
                                        for($i=0;$i<count($row_servicetypemst);$i++){ 
                                            if($row_servicetypemst[$i]['serviceTypeID'] == $row_workorder[0]['serviceTypeID']){
                                                $selected = 'selected';
                                            }else{
                                                $selected = null;
                                            }  
                                    ?>
                                    <option <?=$selected;?> value="<?=$row_servicetypemst[$i]['serviceTypeID'];?>"><?=$row_servicetypemst[$i]['description'];?></option>
                                    <? } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtEquipment">Equipment</label>
                            <div class="col-lg-8">
                                <select class="required" <?=$disabled;?> name="txtEquipment" id="txtEquipment" onChange="return getAssignee(this.value);">
                                    <option value="">Select Equipment</option>
                                    <? 
                                        for($i=0;$i<count($row_equipmentmst);$i++){ 
                                            if($row_equipmentmst[$i]['equipmentID'] == $row_workorder[0]['equipmentID']){
                                                $selected = 'selected';
                                            }else{
                                                $selected = null;
                                            }
                                    ?>
                                    <option <?=$selected;?> value="<?=$row_equipmentmst[$i]['equipmentID'];?>"><?=$row_equipmentmst[$i]['plateNo'];?></option>
                                    <? } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtParts">Assignee</label>
                            <div class="col-lg-8">
                                <span id="assignee"><input value="<?=$row_workorder[0]['assignee'];?>" readonly type="text" class="form-control gui-input input-sm" placeholder="Please select equipment above.." /></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtMeter">Meter</label>
                            <div class="col-lg-8">
                                <input type="text" <?=$readonly;?> value="<?=$row_workorder[0]['meter'];?>" name="txtMeter" id="txtMeter" class="form-control gui-input input-sm" placeholder="0" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtIsWarranty">Is Warranty?</label>
                            <div class="col-lg-8">
                                 <select class="required" <?=$disabled;?> name="txtIsWarranty" id="txtIsWarranty">
                                    <option value="0" <? if($isWarranty == 0){ echo 'selected'; } ?>>NO</option>
                                    <option value="1" <? if($isWarranty == 1){ echo 'selected'; } ?>>YES</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtIsBackJob">Is Back Job?</label>
                            <div class="col-lg-8">
                                 <select class="required" <?=$disabled;?> name="txtIsBackJob" id="txtIsBackJob">
                                    <option value="0" <? if($isBackJob == 0){ echo 'selected'; } ?>>NO</option>
                                    <option value="1" <? if($isBackJob == 1){ echo 'selected'; } ?>>YES</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtRemarks">Justification</label>
                            <div class="col-lg-8">
                                <textarea <?=$readonly;?> class="form-control textarea-grow" id="txtRemarks" name="txtRemarks" rows="4"><?=stripslashes($row_workorder[0]['remarks']);?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <? if($status == 0){ ?>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <select class="required" <?=$disabled;?> name="txtNewParts" id="txtNewParts">
                                    <option value="">Select Parts</option>
                                    <? for($i=0;$i<count($row_partsmst);$i++){?>
                                    <option value="<?=$row_partsmst[$i]['partsID'];?>"><?=$row_partsmst[$i]['description'] . ' - ' . $row_partsmst[$i]['brand'];?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="txtPrice" id="txtPrice" class="text-center form-control gui-input input-md" placeholder="Price (0.00)" />
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="txtPartsQty" id="txtPartsQty" class="text-center form-control gui-input input-md" placeholder="Qty (0)" />
                            </div>
                            <div class="col-sm-2">
                                <a href="#" onClick="addNewParts();"><? $img = new Image('imgs/btnAdd.png'); ?></a>
                            </div>
                        </div>
                        <? } ?>
                        <span id="divCost">
                            <? if(count($row_workorderdtl) > 0){ ?>
                            <div class="form-group">
                                <table class="table table-hover table-condensed table-striped table-responsive table-bordered">
                                    <tr>
                                        <th>#</th>
                                        <th>Desc</th>
                                        <th>Price(Qty)</th>
                                        <th>Total</th>
                                        <? if($status == 0){ ?>
                                        <th>Remove</th>
                                        <? } ?>
                                    </tr>
                                    <? 
                                        $cnt = 1; 
                                        $newArrParts = null;
                                        $partsCost = 0;
                                        $total = 0;
                                        for($i=0;$i<count($row_workorderdtl);$i++){ 
                                            $desc = $row_workorderdtl[$i]['partsName']; // description 
                                            $partsID = $row_workorderdtl[$i]['woReferenceNo'];
                                            $seqNo = $row_workorderdtl[$i]['seqNo'];
                                            $priceQty = $row_workorderdtl[$i]['partsPrice'] . ' (' . $row_workorderdtl[$i]['qty'] . ')'; // price(qty)
                                            $total = ($row_workorderdtl[$i]['partsPrice'] * $row_workorderdtl[$i]['qty']);
                                            $partsCost += $total;

                                            $nArrParts .= $row_workorderdtl[$i]['partsID']
                                                        . ':' . $row_workorderdtl[$i]['partsName']
                                                        . ':' . $row_workorderdtl[$i]['partsPrice']
                                                        . ':' . $row_workorderdtl[$i]['qty'] . '|';

                                            $partsCost += $total;
                                            $totalqty += $row_workorderdtl[$i]['qty'];
                                    ?>
                                    <tr>
                                        <td><?=$cnt;?></td>
                                        <td><?=$desc;?></td>
                                        <td align="right"><?=$priceQty;?></td>
                                        <td align="right"><?=number_format($total,2);?></td>
                                        <? if($status == 0){ ?>
                                        <td align="center">
                                            <a href="#" onClick="removeParts(<?=$row_workorderdtl[$i]['partsID'];?>);">
                                                <span class="fa fa-trash"></span>
                                            </a>
                                        </td>
                                        <? } ?>
                                    </tr>
                                    <? $cnt++; } $nArrParts = rtrim($nArrParts,"|"); ?>
                                    <tr>
                                        <td colspan="2" align="right"><b>TOTAL >>>></b></td>
                                        <td align="center"><b><?=$totalqty;?></b></td>
                                        <td align="right"><b><?=number_format($partsCost,2);?></b></td>
                                        <? if($status == 0){ ?>
                                        <td align="center">&nbsp;</td>
                                        <? } ?>
                                    </tr>
                                </table>
                            </div>
                            <? } ?>
                            <input type="hidden" name="txtPartsArray" id="txtPartsArray" value="<?=$nArrParts;?>" />
                            <div class="form-group">
                                <label class="col-lg-3" for="txtLabor">Labor</label>
                                <div class="col-lg-4">
                                    <input type="text" <? if($status > 0){ echo $readonly; } ?> value="<?=$row_workorder[0]['labor'];?>" name="txtLabor" id="txtLabor" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtMiscellaneous">Miscellaneous</label>
                                <div class="col-lg-4">
                                    <input type="text" <? if($status > 0){ echo $readonly; } ?> value="<?=$row_workorder[0]['miscellaneous'];?>" name="txtMiscellaneous" id="txtMiscellaneous" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtParts">Parts</label>
                                <div class="col-lg-4">
                                    <input type="text" readonly value="<?=$row_workorder[0]['parts'];?>" name="txtParts" id="txtParts" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtDiscount">Discount</label>
                                <div class="col-lg-4">
                                    <input type="text" <? if($status > 0){ echo $readonly; } ?> value="<?=$row_workorder[0]['discount'];?>" name="txtDiscount" id="txtDiscount" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtSubTotal">Sub-Total</label>
                                <div class="col-lg-4">
                                    <input type="text" value="<?=$row_workorder[0]['subTotal'];?>" name="txtSubTotal" id="txtSubTotal" readonly class="form-control gui-input input-sm" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtTax">Tax</label>
                                <div class="col-lg-4">
                                    <input type="text" value="<?=$row_workorder[0]['tax'];?>" name="txtTax" id="txtTax" readonly class="form-control gui-input input-sm" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtTotalCost">TotalCost</label>
                                <div class="col-lg-4">
                                    <input type="text" value="<?=$row_workorder[0]['totalCost'];?>" name="txtTotalCost" id="txtTotalCost" disabled class="form-control gui-input input-sm" placeholder="0.00" />
                                </div>
                            </div>
                            <? if($status == 5){ ?>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtInvoiceReferenceNo">Invoice No</label>
                                <div class="col-lg-4">
                                    <input type="text" value="<?=$row_workorder[0]['invoiceReferenceNo'];?>" disabled class="form-control gui-input input-sm" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtInvoiceDate">Invoice Date</label>
                                <div class="col-lg-4">
                                    <input type="text" value="<?=dateFormat($row_workorder[0]['invoiceDate'],"Y-m-d");?>" disabled class="form-control gui-input input-sm" />
                                </div>
                            </div>
                            <? 
                                }
                                
                                if($status == 4 || $status == 5){
                                    $disabled_invoice = null;
                                    if($status == 5){
                                        $disable_invoice = 'disabled';
                                    }
                            ?>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtInvoiceAmount">Invoice Amount</label>
                                <div class="col-lg-4">
                                    <input type="text" <?=$disable_invoice;?> value="<?=$row_workorder[0]['invoiceAmount'];?>" name="txtInvoiceAmount" id="txtInvoiceAmount" class="form-control gui-input input-sm" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtVarianceAmount">Variance Amount</label>
                                <div class="col-lg-4">
                                    <input type="text" <?=$disable_invoice;?> value="<?=$row_workorder[0]['varianceAmount'];?>" name="txtVarianceAmount" id="txtVarianceAmount" class="form-control gui-input input-sm" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3" for="txtVariance">Variance %</label>
                                <div class="col-lg-4">
                                    <input type="text" <?=$disable_invoice;?> value="<?=$row_workorder[0]['variance'];?>" name="txtVariance" id="txtVariance" class="form-control gui-input input-sm" placeholder="0.00" />
                                </div>
                            </div>
                            <? } ?>
                        </span>
                    </div>
                </div>
                <? if($status > 1 && $status != 7 && $status != 8){ ?>
                <hr />
                <div class="form-group">
                    <label class="col-lg-2" for="txtApprovedDate">Approved Date</label>
                    <div class="col-lg-3">
                        <input type="text" <?=$disabled;?> value="<?=$approvedDate;?>" name="txtApprovedDate" id="txtApprovedDate" class="form-control gui-input input-sm" />
                    </div>
                </div>
                <? } ?>
                <? if($status >= 2 && $status != 7 && $status != 8){ ?>
                <div class="form-group">
                    <? 
                        switch($status){
                            case "0": case "1": 
                    ?>
                    <label class="col-lg-2" for="txtStartDate"></label>
                    <div class="col-lg-3"></div>
                    <?          
                                break; 
                            case "2":
                    ?>
                    <label class="col-lg-2" for="txtStartDate">Start Date</label>
                    <div class="col-lg-3">
                        <input type="text" value="<?=$startDate;?>" name="txtStartDate" id="txtStartDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                    <? 
                                break;
                            default:
                    ?>
                    <label class="col-lg-2" for="txtStartDate">Start Date</label>
                    <div class="col-lg-3">
                        <input type="text" <?=$disabled;?> value="<?=$startDate;?>" name="txtStartDate" id="txtStartDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                    <?  
                                break;
                        } 
                    ?>

                    <? 
                        switch($status){
                            case "0": case "1": case "2": case "7": case "8":
                    ?>
                    <label class="col-lg-2" for="txtCompletionDate"></label>
                    <div class="col-lg-3"></div>
                    <?          
                                break; 
                            case "3":
                    ?>
                    <label class="col-lg-2" for="txtCompletionDate">Completion Date</label>
                    <div class="col-lg-3">
                        <input type="text" value="<?=$completionDate;?>" name="txtCompletionDate" id="txtCompletionDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                    <? 
                                break;
                            default:
                    ?>
                    <label class="col-lg-2" for="txtCompletionDate">Completion Date</label>
                    <div class="col-lg-3">
                        <input type="text" <?=$disabled;?> value="<?=$completionDate;?>" name="txtCompletionDate" id="txtCompletionDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                    <?  
                                break;
                        } 
                    ?>
                </div>
                <? } ?>
                <div class="form-group">
                    <label class="col-lg-2" for="txtSupplier">Supplier</label>
                    <div class="col-lg-3">
                        <select class="required" <?=$disabled;?> name="txtSupplier" id="txtSupplier">
                            <option value="">Select Supplier</option>
                            <? 
                                for($i=0;$i<count($row_suppliermst);$i++){
                                    $selected = null;
                                    if($row_suppliermst[$i]['supplierID'] == $row_workorder[0]['supplierID']){
                                        $selected = 'selected';
                                    }
                            ?>
                            <option value="<?=$row_suppliermst[$i]['supplierID'];?>" <?=$selected;?>><?=$row_suppliermst[$i]['supplierName'];?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <? if($status >= 5 && $status != 7 && $status != 8){ ?>
                <div class="form-group">
                    <label class="col-lg-2" for="txtBilledDate">Billed Date</label>
                    <div class="col-lg-3">
                        <input type="text" <?=$disabled;?> value="<?=$billedDate;?>" name="txtBilledDate" id="txtBilledDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <? } ?>
                <? if($status != 7 && $status != 8 && $status != 5){ ?>
                <div class="form-group">
                    <label class="col-lg-2" for="txtStatus">Status</label>
                    <div class="col-lg-2">
                        <select class="required" name="txtStatus" id="txtStatus">
                            <? if($status == 0){ ?><option value="0" <? if($status == 0){ echo 'selected'; } ?>>OPEN</option><? } ?>
                            <? if($status == 0 || $status == 1 && $isSent > 0){ ?><option value="1" <? if($status == 1){ echo 'selected'; } ?>>FOR APPROVAL</option><? } ?>
                            <? if($status == 0 || $status == 1){ ?><option value="8" <? if($status == 8){ echo 'selected'; } ?>>CANCEL</option><? } ?>
                            <? if($status == 2){ ?><option value="2" <? if($status == 2){ echo 'selected'; } ?>>APPROVED</option><? } ?>
                            <? if($status == 2 || $status == 3){ ?><option value="3" <? if($status == 3){ echo 'selected'; } ?>>ON REPAIR</option><? } ?>
                            <? if($status == 3 || $status == 4){ ?><option value="4" <? if($status == 4){ echo 'selected'; } ?>>FOR BILLING</option><? } ?>
                            <? if($status == 4){ ?><option value="5" <? if($status == 5){ echo 'selected'; } ?>>BILLED</option><? } ?>
                            <? if($status == 6){ ?><option value="6" <? if($status == 6){ echo 'selected'; } ?>>CLOSED</option><? } ?>
                            <? if($status == 1 && $isSent == 0){ ?><option value="9" <? if($status == 1){ echo 'selected'; } ?>>SEND NOTIFICATION</option><? } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-2">&nbsp;</label>
                    <div class="col-xs-2">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> UPDATE </button>
                    </div>
                </div>
                <input type="hidden" name="update" id="update" value="1" />
                <input type="hidden" name="txtWORefNo" id="txtWORefNo" value="<?=$row_workorder[0]['woReferenceNo']?>" />
                <input type="hidden" name="txtInvRefNo" id="txtInvRefNo" value="<?=$row_workorder[0]['invoiceReferenceNo']?>" />
                <? } ?>
            </form>
        </div>
        <? if(count($row_poreceiving) > 0){ ?>
		<table class="table table-hover table-condensed table-striped table-responsive table-bordered">

			<tr class="dark">
                <th>#</th>
                <th>Purchase Order Ref #</th>
                <th>Transaction Date</th>
                <th>Attachment</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Running Total</th>
            </tr>

            <? 
                $cnt=1;
                $total = 0;
                for($i=0;$i<count($row_poreceiving);$i++){ 
                    if($row_poreceiving[$i]['status'] == 0){
                        $danger = 'class="primary"';
                    }else{
                        $danger = null;
                    }
                    $total += $row_poreceiving[$i]['Amount'];
            ?>
            <tr <?=$danger;?>>
                <td><?=$cnt;?></td>
                <td><a href="poreceiving_edit.php?edit=1&id=<?=$row_poreceiving[$i]['poReferenceNo'];?>"><?=$row_poreceiving[$i]['poReferenceNo'];?></a></td>
                <td align="center"><?=dateFormat($row_poreceiving[$i]['poTransactionDate'],"M d, Y h:i");?></td>
                <td>
                    <? if(!empty($row_poreceiving[0]['attachment'])){ ?>
                    <a target="_blank" href="<?=POATTACHMENTS . $row_poreceiving[0]['poReferenceNo'] . '/' . $row_poreceiving[0]['attachment'];?>"><?=$row_poreceiving[0]['attachment'];?></a>
                    <? }else{ ?>
                    Attachment is required!
                    <? } ?>
                </td>
                <td align="right"><?=number_format($row_poreceiving[$i]['Amount'],2);?></td>
                <td align="center"><?=$row_poreceiving[$i]['statusDesc'];?></td>
                <td align="right"><?=number_format($total,2);?></td>
            </tr>
            <? $cnt++; } ?>

		</table>
        <? } ?>
    </div>

</div>