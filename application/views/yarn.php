<div class="section">
    <div class="container">
        <h4 class="orange-text title">Yarn applications</h4>

        <div class="main-container">
            <table class="bordered table-apps">
                <thead>
                    <tr>
                        <th data-field="id">Job ID</th>
                        <th data-field="user">User</th>
                        <th data-field="name">Name</th>
                        <th data-field="queue">Queue</th>
                        <th data-field="started">Started</th>
                        <th data-field="finished">Finished</th>
                        <th data-field="duration">Duration</th>
                        <th data-field="status">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                $coupure = $position + $per_page;
                if($coupure > $nb_jobs){
                    $coupure = $nb_jobs;
                }
        for($i=$position ; $i < $coupure ; $i++)
        {
    
        /* Time calculation */
        $start = new DateTime('@'.substr($jobs[$i]["startTime"],0,-3));	
        $start->setTimezone(new DateTimeZone('Europe/Paris'));
        $end = new DateTime('@'.substr($jobs[$i]["finishTime"],0,-3));
        $end->setTimezone(new DateTimeZone('Europe/Paris'));
        $duration = $start->diff($end);
        ?><a href="#">
                        <tr onclick="document.location = '/centralized_logging/job/index/<?php echo $jobs[$i]["id"]?>';">
                            <td>
                                <?php echo substr($jobs[$i]["id"],4); ?>
                            </td>
                            <td>
                                <?php echo $jobs[$i]["user"]; ?>
                            </td>
                            <td>
                                <?php echo $jobs[$i]["name"]; ?>
                            </td>
                            <td>
                                <?php echo $jobs[$i]["queue"]; ?>
                            </td>
                            <td>
                                <?php echo $start->format('D H:i:s'); ?>
                            </td>
                            <td>
                                <?php echo $end->format('D H:i:s'); ?>
                            </td>
                            <td>
                                <?php echo $duration->format('%H:%M:%S'); ?>
                            </td>
                            <?php if($jobs[$i]["state"]=="SUCCEEDED"){
            ?>
                                <td><span class="label green"><?php echo $jobs[$i]["state"]; ?></span></td>
                                <?php
            }else{
            ?>
                                    <td><span class="label red"><?php echo $jobs[$i]["state"]; ?></span></td>
                                    <?php
            }
            ?>
                        </tr>
                        <?php } 
        ?>
                </tbody>
            </table>
        </div>
        <div style="float:left;">
        <ul class="pagination">
            <?php echo $pagination;?>
        </ul>
        </div>
        <div class="showing right-align">Showing <?php echo $position+1;?> to <?php echo $coupure;?> of <?php echo $nb_jobs;?> entries</div>
    </div>
</div>