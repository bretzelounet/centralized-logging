<div class="section">
    <div class="container">
        <div class="row">
            <div class="col s6 m3 l2">
                <div class="card">
                    <div class="card-header"><span class="card-title">Application overview</span></div>
                    <div class="card-content">
                        <?php
                        /* Time calculation */
                        $start = new DateTime($app_infos["attempts"][0]["startTime"]);
                        $start->setTimezone(new DateTimeZone('Europe/Paris'));	
                        $end = new DateTime($app_infos["attempts"][0]["endTime"]);
                        $end->setTimezone(new DateTimeZone('Europe/Paris'));
                        $duration = $start->diff($end);
                        ?>
                            <ul class="collection">
                                <li class="collection-item">
                                    <div><span class="main-content">ID</span><span class="secondary-content"><?php echo substr($app_infos["id"],12);?>
                            </span>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div><span class="main-content">USER</span><span class="secondary-content"><?php echo $app_infos["attempts"][0]["sparkUser"];?></span></div>
                                </li>
                                <?php if($app_infos["attempts"][0]["completed"]){
                                ?>
                                    <li class="collection-item">
                                        <div><span class="main-content">STATUS</span><span class="secondary-content green-text">SUCCEDEED</span></div>
                                    </li>
                                    <?php
                                }else{
                                ?>
                                        <li class="collection-item">
                                            <div><span class="main-content">STATUS</span><span class="secondary-content red-text">FAILED</span></div>
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
                                                <div><span class="main-content">DURATION</span><span class="secondary-content"><?php echo $duration->format('%H:%I:%S');?></span></div>
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
                                <a href="<?php echo base_url("spark"); ?>" class="breadcrumb">All jobs</a>
                                <a href="<?php echo base_url("spark_app/index"); echo '/'.$app_infos["id"];?>" class="breadcrumb"><?php echo $app_infos["name"];?></a>
                                <a href="#!" class="breadcrumb">logs</a>
                            </div>
                        </nav>
                        <div class="row">
                            <div class="col s12">
                                <ul class="tabs">
                                    <li class="tab col s3"><a class="active" href="#test1">syslog</a></li>
                                    <li class="tab col s3"><a href="#test2">stderr</a></li>
                                    <li class="tab col s3"><a href="#test3">stdout</a></li>
                                </ul>
                            </div>
                            <div class="tabs-content logs">
                                <div style="height:58vh; overflow-y:scroll;" id="test1" class="col s12">
                                    <?php echo nl2br($app_logs["syslog"]);?>
                                </div>
                                <div style="height:58vh; overflow-y:scroll;" id="test2" class="col s12">
                                    <?php echo nl2br($app_logs["stderr"]);?>
                                </div>
                                <div style="height:58vh; overflow-y:scroll;" id="test3" class="col s12">
                                    <?php echo nl2br($app_logs["stdout"]);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
