<style>
    table th{ text-align: center; }
</style>
<div class="row">
    <form method="Post">
        <a href="invoicing.php"><span class="fa fa-arrow-left"> BACK TO INVOICE LIST</span></a>
    </form>
</div>
<div class="row">
    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="workorder-form">
                <div class="form-group">
                    <div class="col-lg-6"> 
                        <div class="form-group">
                            <label class="col-lg-4" for="inputStandard">WORK ORDER #</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['woReferenceNo'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="inputStandard">INVOICE #</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['invoiceReferenceNo'];?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4" for="txtInvoiceAmount">Invoice Amount</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['invoiceAmount'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtVariance">Variance %</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['variance'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtServiceType">Service Type</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['serviceType'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtEquipment">Equipment</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['plateNo'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtParts">Assignee</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['assignee'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtMeter">Meter</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['meter'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtIsWarranty">Is Warranty?</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['isWarrantyDesc'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtIsBackJob">Is Back Job?</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['isBackJobDesc'];?></div>
                        </div>
                        
                    </div>
                    <div class="col-lg-6"> 
                        <div class="form-group">
                            <label class="col-lg-4" for="inputStandard">Transaction Date</label>
                            <div class="col-lg-8"><?=dateFormat($row_workorder[0]['woTransactionDate'],"Y-m-d");?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="inputStandard">Invoice Date</label>
                            <div class="col-lg-8"><?=dateFormat($row_workorder[0]['invoiceDate'],"Y-m-d");?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtVarianceAmount">Variance Amount</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['varianceAmount'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtLabor">Labor</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['labor'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtMiscellaneous">Miscellaneous</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['miscellaneous'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtParts">Parts</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['parts'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtDiscount">Discount</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['discount'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtSubTotal">Sub-Total</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['subTotal'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtTax">Tax</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['tax'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtTotalCost">TotalCost</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['totalCost'];?></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtRemarks">Justification</label>
                    <div class="col-lg-10"><?=stripslashes($row_workorder[0]['remarks']);?></div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6"> 
                        <div class="form-group">
                            <label class="col-lg-4" for="txtApprovedDate">Approved Date</label>
                            <div class="col-lg-8"><?=dateFormat($row_workorder[0]['approvedDate'],"Y-m-d");?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtStartDate">Start Date</label>
                            <div class="col-lg-8"><?=dateFormat($row_workorder[0]['startDate'],"Y-m-d");?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtSupplier">Supplier</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['supplierName'];?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtBilledDate">Billed Date</label>
                            <div class="col-lg-8"><?=dateFormat($row_workorder[0]['billedDate'],"Y-m-d");?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtStatus">Status</label>
                            <div class="col-lg-8"><?=$row_workorder[0]['statusDesc'];?></div>
                        </div>
                    </div>
                    <div class="col-lg-6"> 
                        <div class="form-group">&nbsp;</div>
                        <div class="form-group">
                            <label class="col-lg-4" for="txtCompletionDate">Completion Date</label>
                            <div class="col-lg-8"><?=dateFormat($row_workorder[0]['completionDate'],"Y-m-d");?></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-8">
                        <? if($num_workorderdtl > 0){ ?>
                        <div class="form-group">
                            <table class="table table-hover table-condensed table-striped table-responsive table-bordered">
                                <tr class="dark">
                                    <th>#</th>
                                    <th>Desc</th>
                                    <th>Price(Qty)</th>
                                    <th>Total</th>
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
                                ?>
                                <tr>
                                    <td><?=$cnt;?></td>
                                    <td><?=$desc;?></td>
                                    <td align="right"><?=$priceQty;?></td>
                                    <td align="right"><?=number_format($total,2);?></td>
                                </tr>
                                <? $cnt++; } ?>
                            </table>
                        </div>
                        <? } ?>
                        
                        
                    </div>
                </div>
                
            </form>
        </div>
        <? if($num_poreceiving > 0){ ?>
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
    <div class="col-md-2">
        <a href="invoice_posting.php?post=1&id=<?=$row_workorder[0]['invoiceReferenceNo'];?>"><button class="btn btn-sm btn-dark btn-block btn-gradient">POST</button></a>
    </div>
</div>