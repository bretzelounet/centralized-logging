<div class="section">
    <div class="container">
        <!-- <h4 class="orange-text title">Yarn applications</h4> -->

        <div class="main-container">
            <table class="bordered table-apps">
                <thead>
                    <tr>
                        <th data-field="id">Workflow ID</th>
                        <th data-field="user">User</th>
                        <th data-field="name">Name</th>
                        <th data-field="started">Started</th>
                        <th data-field="finished">Finished</th>
                        <th data-field="duration">Duration</th>
                        <th data-field="status">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                $coupure = $position + $per_page;
                if($coupure > $nb_wkf){
                    $coupure = $nb_wkf;
                }
        for($i=$position ; $i < $coupure ; $i++)
        {
    
        /* Time calculation */
        $start = new DateTime($wkfs[$i]["startTime"]);
        $start->setTimezone(new DateTimeZone('Europe/Paris'));	
        $end = new DateTime($wkfs[$i]["endTime"]);
        $end->setTimezone(new DateTimeZone('Europe/Paris'));
        $duration = $start->diff($end);
        
        ?><a href="#">
                        <tr onclick="document.location = '<?php echo base_url("job/index"); ?>';">
                            <td>
                                <?php echo $wkfs[$i]["id"]; ?>
                            </td>
                            <td>
                                <?php echo $wkfs[$i]["user"]; ?>
                            </td>
                            <td>
                                <?php echo $wkfs[$i]["appName"]; ?>
                            </td>
                           
                            <td>
                                <?php echo $start->format('D H:i:s'); ?>
                            </td>
                            <td>
                                <?php echo $end->format('D H:i:s'); ?>
                            </td>
                            <td>
                                <?php echo $duration->format('%H:%I:%S'); ?>
                            </td>
                            <?php if($wkfs[$i]["status"]=="SUCCEEDED"){
            ?>
                                <td><span class="label green"><?php echo $wkfs[$i]["status"]; ?></span></td>
                                <?php
            }else if($wkfs[$i]["status"]=="RUNNING"){
            ?>
                                    <td><span class="label blue"><?php echo $wkfs[$i]["status"]; ?></span></td>
                                    <?php
             }else if($wkfs[$i]["status"]=="KILLED"){
            ?>
                                    <td><span class="label orange"><?php echo $wkfs[$i]["status"]; ?></span></td>
                                    <?php
             }else{
            ?>
                                    <td><span class="label red"><?php echo $wkfs[$i]["status"]; ?></span></td>
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
        <div class="showing right-align">Showing <?php echo $position+1;?> to <?php echo $coupure;?> of <?php echo $nb_wkf;?> entries</div>
    </div>
</div>