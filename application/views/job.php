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
                                    <div><span class="main-content">ID</span><span class="secondary-content"><?php echo $job_infos["id"];?>
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
                                }else if($job_infos["state"]=="KILLED"){
                                ?>
                                        <li class="collection-item">
                                            <div><span class="main-content">STATUS</span><span class="secondary-content orange-text"><?php echo $job_infos["state"];?></span></div>
                                        </li>
                                <?php
                                }else if($job_infos["state"]=="RUNNING"){
                                ?>
                                        <li class="collection-item">
                                            <div><span class="main-content">STATUS</span><span class="secondary-content blue-text"><?php echo $job_infos["state"];?></span></div>
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
                                                <div><span class="main-content">DURATION</span><span class="secondary-content"><?php echo $duration->format('%H:%I:%S');?></span></div>
                                            </li>
                                            <li class="collection-item">
                                                <div><span class="main-content">MAPS</span> <span class="grey-text">Complete/Total</span><span class="secondary-content"><?php echo$job_infos["mapsCompleted"];?> / <?php echo$job_infos["mapsTotal"];?></span></div>
                                            </li>
                                            <li class="collection-item">
                                                <div><span class="main-content">REDUCES</span> <span class="grey-text">Complete/Total</span><span class="secondary-content"><?php echo$job_infos["reducesCompleted"];?> / <?php echo$job_infos["reducesTotal"];?></span></div>
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
                                <a href="<?php echo base_url("job/index"); echo '/'.$job_infos["id"];?>" class="breadcrumb"><?php echo $job_infos["name"];?></a>
                            </div>
                        </nav>
                        <div class="row">
                            <div class="col s12 m12">
                                <ul class="tabs">
                                    <li class="tab col s3"><a class="active" href="#test1">Job attempts</a></li>
                                    <li class="tab col s3"><a href="#test2">Tasks attempts</a></li>
                                </ul>
                            </div>
                            <div class="tabs-content">
                                <div style="height:58vh; overflow-y:scroll;" id="test1" class="col s12">
                                    <table class="bordered">
                                        <thead>
                                            <tr>
                                                <th data-field="attempt_id">Job attempt ID</th>
                                                <th data-field="container_id">Container ID</th>
                                                <th data-field="node_id">Node ID (Job master)</th>
                                                <th data-field="start">Start time</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                    foreach($job_attempts as $ja){
                                        $start_attempt = new DateTime('@'.substr($ja["startTime"],0,-3));
                                        $start_attempt->setTimezone(new DateTimeZone('Europe/Paris'));
                                    ?>
                                                <tr onclick="document.location = '<?php echo base_url('job/index/'.$job_infos["id"]);?>/<?php echo strstr($ja["nodeId"],":", TRUE);?>/<?php echo $ja["containerId"]; ?>';">
                                                    <td>
                                                        <?php echo $ja["id"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ja["containerId"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ja["nodeId"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $start_attempt->format('d/m/y H:i:s');?>
                                                    </td>
                                                </tr>
                                                <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="height:58vh; overflow-y:scroll;" id="test2" class="col s12">
                                    <table class="bordered">
                                        <thead>
                                            <tr>
                                                <th data-field="tasks_attempts_id">Tasks attempts ID</th>
                                                <th data-field="type">Type</th>
                                                <th data-field="progress">Progress</th>
                                                <th data-field="status">Status</th>
                                                <th data-field="node">Node</th>
                                                <th data-field="start_time">Start time</th>
                                                <th data-field="end_time">End time</th>
                                                <th data-field="duration">Duration</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                    foreach($tasks_attempts as $tasks){
					                   if($tasks["taskAttempts"]!=NULL){	
                                        foreach($tasks["taskAttempts"]["taskAttempt"] as $ta){
                                            
                                            /* Time calculation */
                                            if($ta["finishTime"]==-1){
                                                $ta["finishTime"]=$ta["startTime"];
                                            }
                                            $start_task_attempt = new DateTime('@'.substr($ta["startTime"],0,-3));
						                  $start_task_attempt->setTimezone(new DateTimeZone('Europe/Paris')); 	
                                            $end_task_attempt = new DateTime('@'.substr($ta["finishTime"],0,-3));
						                  $end_task_attempt->setTimezone(new DateTimeZone('Europe/Paris'));
                                            $duration_task_attempt = $start_task_attempt->diff($end_task_attempt);
                                            ?>
                                                <tr onclick="document.location = '<?php echo base_url('job/index/'.$job_infos["id"]);?>/<?php echo strstr($ta["nodeHttpAddress"],":", TRUE);?>/<?php echo $ta["assignedContainerId"]; ?>';">
                                                    <td>
                                                        <?php echo $ta["id"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ta["type"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ta["progress"];?>%
                                                    </td>
                                                    <?php if($ta["state"]=="SUCCEEDED"){
                                                ?>
                                                        <td class="green-text">
                                                            <?php echo $ta["state"];?>
                                                        </td>
                                                        <?php
                                                }
                                                else
                                                {
                                                ?>
                                                            <td class="red-text">
                                                                <?php echo $ta["state"];?>
                                                            </td>
                                                            <?php
                                                }
                                                ?>
                                                                <td>
                                                                    <?php echo $ta["nodeHttpAddress"];?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $start_task_attempt->format('d/m/y H:i:s');?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $end_task_attempt->format('d/m/y H:i:s');?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $duration_task_attempt->format('%H:%I:%S');?>
                                                                </td>
                                                </tr>
                                                <?php
                                        	}
					}
                                    }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
