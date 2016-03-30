<li class="dropdown dropdown-item-slide">
    <a class="dropdown-toggle pl10 pr10" data-toggle="dropdown" href="#">
        <span class="fa fa-bell"></span>
        <? if($num_notificationmst > 0){ ?>
        <span class="badge badge-hero badge-danger"><?=$num_notificationmst;?></span>
        <? } ?>
    </a>
    <ul class="dropdown-menu dropdown-hover dropdown-persist pn w350 bg-white animated animated-shorter fadeIn" role="menu">
        <li class="bg-light p8">
            <span class="fw600 pl5 lh30"> Notifications</span>
            <span class="label label-warning label-sm pull-right lh20 h-20 mt5 mr5"><?=$num_notificationmst;?></span>
        </li>
        <? for($i=0;$i<count($row_notificationmst);$i++){ ?>
        <li class="p10 br-t item-1">
            <a href="<?=$row_notificationmst[$i]['url'];?>">
            <div class="media">
                <!-- <a class="media-left" href="#"> <img src="<?=USERPICS . $row_notificationmst[$i]['createdBy'] . '/' . $row_notificationmst[$i]['userPic'];?>" class="mw40" alt="holder-img"> </a> -->
                
                <div class="media-body va-m">
                    <h5 class="media-heading mv5"><?=$row_notificationmst[$i]['NAME'];?> <small class="text-muted"> - expired last <?=dateFormat($row_notificationmst[$i]['expirationDate'],"m/d/Y");?></small> 
                    </h5>
                    <!-- <a class="text-system" href="#"> <?=$row_notificationmst[$i]['createdBy'];?> </a> -->
                </div>
                
            </div>
            </a>
        </li>
        <? } ?>
    </ul>
</li>