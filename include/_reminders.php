
<li class="dropdown dropdown-item-slide">
    <a class="dropdown-toggle pl10 pr10" data-toggle="dropdown" href="#">
        <span class="octicon octicon-radio-tower fs18"></span>
        <? if($num_openremindersmst > 0){ ?>
        <span class="badge badge-hero badge-danger"><?=$num_openremindersmst;?></span>
        <? } ?>
    </a>
    <ul class="dropdown-menu dropdown-hover dropdown-persist pn w350 bg-white animated animated-shorter fadeIn" role="menu">
        <li class="bg-light p8">
            <span class="fw600 pl5 lh30"> Reminders</span>
            <span class="label label-warning label-sm pull-right lh20 h-20 mt5 mr5"><?=$num_openremindersmst;?></span>
        </li>
        <? for($i=0;$i<count($row_openremindersmst);$i++){ ?>
        <li class="p10 br-t item-1">
            <div class="media">
                <a class="media-left" href="#"> <img src="<?=USERPICS . $row_openremindersmst[$i]['createdBy'] . '/' . $row_openremindersmst[$i]['userPic'];?>" class="mw40" alt="holder-img"> </a>
                <div class="media-body va-m">
                    <h5 class="media-heading mv5"><?=$row_openremindersmst[$i]['title'];?> <small class="text-muted">- <?=dateFormat($row_openremindersmst[$i]['createdDate'],"m/d/Y");?></small> </h5> Last Updated 36 days ago by
                    <a class="text-system" href="#"> <?=$row_openremindersmst[$i]['createdBy'];?> </a>
                </div>
            </div>
        </li>
        <? } ?>
        <li class="p10 br-t item-1">
            <div class="media text-center">
                <a href="reminder.php">See All Reminders</a>
            </div>
        </li>
    </ul>
</li>