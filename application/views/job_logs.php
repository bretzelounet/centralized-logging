<div class="section">
    <div class="container">
        <div class="row">
            <div class="col s6 m3 l2">
                <div class="card">
                    <div class="card-header"><span class="card-title">Job overview</span></div>
                    <div class="card-content">
                        <?php
                        /* Time calculation */
                        $start = new DateTime('@'.substr($job_infos["startTime"],0,-3));	
                        $start->setTimezone(new DateTimeZone('Europe/Paris'));
                        $end = new DateTime('@'.substr($job_infos["finishTime"],0,-3));
                        $end->setTimezone(new DateTimeZone('Europe/Paris'));
                        $duration = $start->diff($end);
                        ?>
                            <ul class="collection">
                                <li class="collection-item">
                                    <div><span class="main-content">NAME</span><span class="secondary-content"><?php echo substr($job_infos["name"],0,20);?>
                            </span>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div><span class="main-content">USER</span><span class="secondary-content"><?php echo $job_infos["user"];?></span></div>
                                </li>
                                <?php if($job_infos["state"]=="SUCCEEDED"){
                                ?>
                                    <li class="collection-item">
                                        <div><span class="main-content">STATUS</span><span class="secondary-content green-text"><?php echo $job_infos["state"];?></span></div>
                                    </li>
                                    <?php
                                }else{
                                ?>
                                        <li class="collection-item">
                                            <div><span class="main-content">STATUS</span><span class="secondary-content red-text"><?php echo $job_infos["state"];?></span></div>
                                        </li>
                                        <?php
                                }
                                ?>
                                            <li class="collection-item">
                                                <div><span class="main-content">STARTED</span><span class="secondary-content"><?php echo $start->format('d/m/y H:i:s');?></span></div>
                                            </li>
                                            <li class="collection-item">
                                                <div><span class="main-content">FINISHED</span><span class="secondary-content"><?php echo $end->format('d/m/y H:i:s');?></span></div>
                                            </li>
                                            <li class="collection-item">
                                                <div><span class="main-content">DURATION</span><span class="secondary-content"><?php echo $duration->format('%H:%M:%S');?></span></div>
                                            </li>
                                            <li class="collection-item">
                                                <div><span class="main-content">MAPS</span> <span class="grey-text">Complete/Total</span><span class="secondary-content"><?php echo $job_infos["mapsCompleted"];?> / <?php echo$job_infos["mapsTotal"];?></span></div>
                                            </li>
                                            <li class="collection-item">
                                                <div><span class="main-content">REDUCES</span> <span class="grey-text">Complete/Total</span><span class="secondary-content"><?php echo $job_infos["reducesCompleted"];?> / <?php echo$job_infos["reducesTotal"];?></span></div>
                                            </li>
                            </ul>
                    </div>
                </div>
            </div>
            <div class="col s6 m9 l10">
                <div class="card">
                    <div class="card-content">
                         <nav id="breadcumb">
                            <div class="nav-wrapper">
                                <a href="<?php echo base_url("yarn"); ?>" class="breadcrumb">All jobs</a>
                                <a href="<?php echo base_url("job/index"); echo '/'.$job_infos["id"];?>" class="breadcrumb"><?php echo $job_infos["id"];?></a>
                                <a href="#!" class="breadcrumb">job attempt logs</a>
                            </div>
                        </nav>
                        <div class="row">
                            <div class="col s12">
                                <ul class="tabs">
                                    <li class="tab col s3"><a class="active" href="#test1">stdout</a></li>
                                    <li class="tab col s3"><a href="#test2">stderr</a></li>
                                    <li class="tab col s3"><a href="#test3">syslog</a></li>
                                </ul>
                            </div>
                            <div class="tabs-content">
                                <div style="height:58vh; overflow-y:scroll;" id="test1" class="col s12">
                                    <?php echo nl2br($job_attempt_logs["stdout"]);?>
                                </div>
                                <div style="height:58vh; overflow-y:scroll;" id="test2" class="col s12">
                                    <?php echo nl2br($job_attempt_logs["stderr"]);?>
                                </div>
                                <div style="height:58vh; overflow-y:scroll;" id="test3" class="col s12">
                                    <?php echo nl2br($job_attempt_logs["syslog"]);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>