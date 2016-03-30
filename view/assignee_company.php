<style>
    table th{ text-align: center; }
</style>
<p><a href="assignee.php"><span class="fa fa-arrow-left"> BACK TO ASSIGNEE LIST</span></a></p>
<h2>AVAILABLE COMPANY</h2>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Company ID</th>
                    <th>Company Name</th>
                    <th>Add</th>
                </tr>

                <?
                    if(count($row_companymst) > 0){ 
                        $cnt=1; 
                        for($i=0;$i<count($row_companymst);$i++){ 
                ?>
                <tr>
                    <td><?=$cnt;?></td>
                    <td><?=$row_companymst[$i]['companyID'];?></td>
                    <td><?=$row_companymst[$i]['companyName'];?></td>
                    <td align="center">
                        <a href="assignee_company.php?assignee_company_add=1&id=<?=$_GET['id'];?>&companyid=<?=$row_companymst[$i]['companyID'];?>">
                            ADD <span class="fa fa-plus"></span>
                        </a>
                    </td>
                </tr>
                <?          $cnt++; 
                        }
                    }else{ 
                ?>
                <tr class="danger">
                    <td align="center" colspan="4">No available company!</td>
                </tr>
                <? } ?>

        </table>
    </div>
</div>
<h2>MANAGE ASSIGNEE COMPANY</h2>
<div id="spy8" class="panel">
    <div class="panel-body pn">
        <table class="table table-hover table-condensed table-striped table-responsive table-bordered">

                <tr class="dark">
                    <th>#</th>
                    <th>Assignee ID</th>
                    <th>Assignee Name</th>
                    <th>Company ID</th>
                    <th>Company Name</th>
                    <th>Remove</th>
                </tr>

                <? 
                    if(count($row_assigneecompany) > 0){
                    $cnt=1; 
                    for($i=0;$i<count($row_assigneecompany);$i++){ 
                ?>
                <tr <?=$danger;?>>
                    <td><?=$cnt;?></td>
                    <td><?=$row_assigneecompany[$i]['assigneeID'];?></td>
                    <td><?=$row_assigneecompany[$i]['assigneeName'];?></td>
                    <td><?=$row_assigneecompany[$i]['companyID'];?></td>
                    <td><?=$row_assigneecompany[$i]['companyName'];?></td>
                    <td align="center"><a href="assignee_company.php?assignee_company_remove=1&id=<?=$_GET['id'];?>&companyid=<?=$row_assigneecompany[$i]['id'];?>">
                        REMOVE <span class="fa fa-trash"></span>
                    </a></td>
                </tr>
                <? $cnt++; }}else{ ?>
                <tr class="danger">
                    <td align="center" colspan="6">Please select company listed above!</td>
                </tr>
                <? } ?>

        </table>
    </div>
</div>