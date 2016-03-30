<p><a href="reminder.php"><span class="fa fa-arrow-left"> BACK TO REMINDERS LIST</span></a></p>
<div class="row">

    <div class="panel">
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="Post" id="reminder-form">
                <div class="form-group">
                    <label class="col-sm-2" for="inputStandard">Reminder ID</label>
                    <div class="col-lg-4">
                        <input type="text" placeholder="<?=$row_reminders[0]['reminderID'];?>" disabled class="form-control gui-input input-sm" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtTitle">Title</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_reminders[0]['title'];?>" name="txtTitle" id="txtTitle" class="form-control gui-input input-sm" placeholder="Enter Title Here..." />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-lg-2" for="txtDescription">Description</label>
                    <div class="col-lg-6">
                        <textarea class="form-control textarea-grow" style="width: 335px;" placeholder="Enter Description here..." id="txtDescription" name="txtDescription" rows="4"><?=$row_reminders[0]['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtLocation">Location</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_reminders[0]['location'];?>" name="txtLocation" id="txtLocation" class="form-control gui-input input-sm" placeholder="Enter Location Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtCategory">Category</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=$row_reminders[0]['category'];?>" name="txtCategory" id="txtCategory" class="form-control gui-input input-sm" placeholder="Enter Category Here..." />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtStartDate">Start Date</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=dateFormat($row_reminders[0]['startDate'],"Y-m-d");?>" name="txtStartDate" id="txtStartDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-2" for="txtDueDate">Due Date</label>
                    <div class="col-lg-4">
                        <input type="text" value="<?=dateFormat($row_reminders[0]['dueDate'],"Y-m-d");?>" name="txtDueDate" id="txtDueDate" class="form-control gui-input input-sm" placeholder="YYYY-MM-DD" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2" for="txtFromDt">Reminder Date</label>
                    <div class="col-lg-2">
                        <input type="text" value="<?=dateFormat($row_reminders[0]['reminderFromDt'],"Y-m-d");?>" name="txtFromDt" id="txtFromDt" class="form-control gui-input input-sm" placeholder="FROM" />
                    </div>
                    <label class="col-lg-1 text-center" for="txtToDt"> - </label>
                    <div class="col-lg-2">
                        <input type="text" value="<?=dateFormat($row_reminders[0]['reminderToDt'],"Y-m-d");?>" name="txtToDt" id="txtToDt" class="form-control gui-input input-sm" placeholder="TO" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2" for="txtStatus">Status</label>
                    <div class="col-sm-4">
                        <select name="txtStatus" id="txtStatus">
                            <option value="0" <? if($status == 0){ echo 'selected'; } ?>>OPEN</option>
                            <option value="1" <? if($status == 1){ echo 'selected'; } ?>>CLOSED</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2">&nbsp;</label>
                    <div class="col-lg-1">
                        <button class="btn btn-sm btn-dark btn-block btn-gradient" type="submit"> UPDATE </button>
                    </div>
                </div>
                <input type="hidden" name="update" id="update" value="1" />
            </form>
        </div>
    </div>

</div>