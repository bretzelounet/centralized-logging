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
                            </div>
                        </nav>
                        <div class="row" style="padding:20px 20px;">
                            <div class="col s12 m12 l12">
                            <h5 class="orange-text" style="font-weight:300;">EXECUTORS</h5>
                                <div style="height:58vh; overflow-y:scroll; margin-top:20px;">
                                    <table class="bordered">
                                        <thead>
                                            <tr>
                                                <th data-field="attempt_id">Executor ID</th>
                                                <th data-field="container_id">Address</th>
                                                <th data-field="rdd_blocks">RDD blocks</th>
                                                <th data-field="memory_used">Storage memory</th>
                                                <th data-field="disk_used">Disk used</th>
                                                <th data-field="active_tasks">Active tasks</th>
                                                <th data-field="failed_tasks">Failed tasks</th>
                                                <th data-field="complete_tasks">Complete tasks</th>
                                                <th data-field="totalTasks">Total tasks</th>
                                                <th data-field="task_time">Task time</th>
                                                <th data-field="input">input</th>
                                                <th data-field="shuffle_read">Shuffle read</th>
                                                <th data-field="shuffle_write">Shuffle write</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            
                                    foreach($app_executors as $ae){
                                        if($ae["executorLogs"] != null){
                                            $node = explode('/',$ae["executorLogs"]["stdout"]);
                                            $cont = explode('/',$ae["executorLogs"]["stdout"]);
                                        
                                    ?>
                                                <tr onclick="document.location = '<?php echo base_url('spark_app/index/'.$app_infos["id"]);?>/<?php echo substr($node[2],0,-5);?>/<?php echo $cont[5];?>';">
                                                    <td>
                                                        <?php echo $ae["id"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["hostPort"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["rddBlocks"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo round(intval($ae["memoryUsed"])/1024/1024,2);?>/
                                                        <?php echo round(intval($ae["maxMemory"])/1024/1024,2);?>
                                                        MB
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["diskUsed"];?>
                                                        B
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["activeTasks"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["failedTasks"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["completedTasks"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["totalTasks"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["totalDuration"];?>
                                                        ms
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["totalInputBytes"];?>
                                                        B
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["totalShuffleRead"];?>
                                                        B
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["totalShuffleWrite"];?>
                                                        B
                                                    </td>
                                                </tr>
                                                <?php }
                                        else{
                                            ?>
                                                    <tr onclick="Materialize.toast('Logs cannot be shown for local jobs or spark-shell drivers', 4000)">
                                                    <td>
                                                        <?php echo $ae["id"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["hostPort"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["rddBlocks"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo round(intval($ae["memoryUsed"])/1024/1024,2);?>/
                                                        <?php echo round(intval($ae["maxMemory"])/1024/1024,2);?>
                                                        MB
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["diskUsed"];?>
                                                        B
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["activeTasks"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["failedTasks"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["completedTasks"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["totalTasks"];?>
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["totalDuration"];?>
                                                        ms
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["totalInputBytes"];?>
                                                        B
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["totalShuffleRead"];?>
                                                        B
                                                    </td>
                                                    <td>
                                                        <?php echo $ae["totalShuffleWrite"];?>
                                                        B
                                                    </td>
                                                </tr>
                                            <?php
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
