<div class="section">
    <div class="container">
        <h4 class="orange-text title">Yarn applications</h4>

        <div class="main-container">
            <table class="striped table-apps">
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
                if($coupure > $nb_apps){
                    $coupure = $nb_apps;
                }
        for($i=$position ; $i < $coupure ; $i++)
        {
    
        /* Time calculation */
        $start = new DateTime('@'.substr($apps[$i]["startTime"],0,-3));	
        $start->setTimezone(new DateTimeZone('Europe/Paris'));
        $end = new DateTime('@'.substr($apps[$i]["finishTime"],0,-3));
        $end->setTimezone(new DateTimeZone('Europe/Paris'));
        $duration = $start->diff($end);
        ?><a href="#">
                        <tr onclick="document.location = '/centralized_logging/job/index/<?php echo $apps[$i]["id"]?>';">
                            <td>
                                <?php echo substr($apps[$i]["id"],4); ?>
                            </td>
                            <td>
                                <?php echo $apps[$i]["user"]; ?>
                            </td>
                            <td>
                                <?php echo $apps[$i]["name"]; ?>
                            </td>
                            <td>
                                <?php echo $apps[$i]["queue"]; ?>
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
                            <?php if($apps[$i]["state"]=="SUCCEEDED"){
            ?>
                                <td><span class="label green"><?php echo $apps[$i]["state"]; ?></span></td>
                                <?php
            }else{
            ?>
                                    <td><span class="label red"><?php echo $apps[$i]["state"]; ?></span></td>
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
        <div class="showing right-align">Showing <?php echo $position+1;?> to <?php echo $coupure;?> of <?php echo $nb_apps;?> entries</div>
    </div>
</div>