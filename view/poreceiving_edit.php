<p><a href="poreceiving.php"><span class="fa fa-arrow-left"> BACK TO PURCHASE ORDER LIST</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <div class="form-group">
                <div class="col-lg-5">
                    <form role="form" class="form-horizontal" method="Post" id="poreceiving-form" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-lg-6" for="inputStandard">PURCHASE ORDER #</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="<?=$row_purchaseorder[0]['poReferenceNo'];?> (<?=$row_purchaseorder[0]['statusDesc'];?>)" disabled class="form-control gui-input input-sm" id="disabledInput">
                            </div>
        				</div>
        				<div class="form-group">
                            <label class="col-lg-6" for="inputStandard">WORK ORDER #</label>
                            <div class="col-lg-6">
                                <span id="divTxtWorkOrder"><input type="text" <?=$disabled;?> value="<?=$row_purchaseorder[0]['woReferenceNo'];?>" name="txtWorkOrderNo" id="txtWorkOrderNo" onBlur="chkWorkOrder(this.value);" placeholder="Enter Work Order here..." class="form-control gui-input input-sm"></span>
                            </div>
        				</div>
                        <div class="form-group">
                            <label class="col-lg-6" for="txtLabor">Labor</label>
                            <div class="col-lg-6">
                                <input type="text" <?=$disabled;?> value="<?=$row_purchaseorder[0]['labor'];?>" name="txtLabor" id="txtLabor" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-6" for="txtMiscellaneous">Miscellaneous</label>
                            <div class="col-lg-6">
                                <input type="text" <?=$disabled;?> value="<?=$row_purchaseorder[0]['miscellaneous'];?>" name="txtMiscellaneous" id="txtMiscellaneous" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-6" for="txtParts">Parts</label>
                            <div class="col-lg-6">
                                <input type="text" <?=$disabled;?> value="<?=$row_purchaseorder[0]['parts'];?>" name="txtParts" id="txtParts" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-6" for="txtDiscount">Discount</label>
                            <div class="col-lg-6">
                                <input type="text" <?=$disabled;?> value="<?=$row_purchaseorder[0]['discount'];?>" name="txtDiscount" id="txtDiscount" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-6" for="txtTax">Tax</label>
                            <div class="col-lg-6">
                                <input type="text" <?=$disabled;?> value="<?=$row_purchaseorder[0]['tax'];?>" name="txtTax" id="txtTax" class="form-control gui-input input-sm" onBlur="getTotalCost();" placeholder="0.00" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-6" for="txtTotalCost">TotalCost</label>
                            <div class="col-lg-6">
                                <input type="text" <?=$disabled;?> value="<?=$row_purchaseorder[0]['Amount'];?>" name="txtTotalCost" id="txtTotalCost" class="form-control gui-input input-sm" placeholder="0.00" />
                            </div>
                        </div>
        				<div class="form-group">
                            <label class="col-lg-6" for="txtTotalCost">Attachment</label>
                            <div class="col-lg-6">
                                <input type="file" <?=$disabled;?> name="txtAttachment" id="txtAttachment" class="form-control gui-input input-sm" placeholder="0.00" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-6"></label>
                            <div class="col-lg-6">
                                <table class="table table-hover table-condensed table-striped table-responsive table-bordered">
                                    <tr>
                                        <td>
                                            <? if(!empty($row_purchaseorder[0]['attachment'])){ ?>
                                            <a target="_blank" href="<?=POATTACHMENTS . $row_purchaseorder[0]['poReferenceNo'] . '/' . $row_purchaseorder[0]['attachment'];?>"><?=$row_purchaseorder[0]['attachment'];?></a>
                                            <? }else{ ?>
                                            Attachment is required!
                                            <? } ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6" for="txtStatus">Status</label>
                            <div class="col-sm-6">
                                <select name="txtStatus" <?=$disabled;?> id="txtStatus">
                                    <option value="0" <? if($status == 0){ echo 'selected'; } ?>>OPEN</option>
                                    <option value="1" <? if($status == 1){ echo 'selected'; } ?>>CLOSED</option>
                                </select>
                            </div>
                        </div>
                        <? if($status == 0){ ?>
                        <div class="form-group">
                            <label class="col-lg-6">&nbsp;</label>
                            <div class="col-xs-4">
                                <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> UPDATE </button>
                            </div>
                        </div>
                        <input type="hidden" name="update" id="update" value="1" />
                        <? } ?>
                    </form>
                </div>
                <div class="col-lg-7">
                    <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                        <tr class="dark">
                            <th>#</th>
                            <th>Work Order Ref #</th>
                            <th>Transaction Date</th>
                            <th>Service Type</th>
                            <th>Plate No</th>
                            <th>Total Cost</th>
                            <th>Status</th>
                        </tr>

                        <? 
                            $cnt=1; 
                            for($i=0;$i<count($row_workorder);$i++){ 
                                if($row_workorder[$i]['status'] == 0){
                                    $danger = 'class="primary"';
                                }else{
                                    $danger = null;
                                }
                        ?>
                        <tr <?=$danger;?>>
                            <td><?=$cnt;?></td>
                            <td><a href="workorder_edit.php?edit=1&id=<?=$row_workorder[$i]['woReferenceNo'];?>"><?=$row_workorder[$i]['woReferenceNo'];?></td>
                            <td align="center"><?=dateFormat($row_workorder[$i]['woTransactionDate'],"M d, Y");?></td>
                            <td><?=$row_workorder[$i]['serviceType'];?></td>
                            <td><?=$row_workorder[$i]['plateNo'];?></td>
                            <td align="right"><?=number_format($row_workorder[$i]['totalCost'],2);?></td>
                            <td align="center"><?=$row_workorder[$i]['statusDesc'];?></td>
                        </tr>
                        <? $cnt++; } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>