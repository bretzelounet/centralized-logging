<div class="section">
    <div class="container">
        <!-- <h4 class="orange-text title">Yarn applications</h4> -->

        <div class="main-container">
            <table class="bordered table-apps">
                <thead>
                    <tr>
                        <th data-field="id">Job ID</th>
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
                if($coupure > $nb_apps){
                    $coupure = $nb_apps;
                }
        for($i=$position ; $i < $coupure ; $i++)
        {

        /* Time calculation */
        $start = new DateTime($apps[$i]["attempts"][0]["startTime"]);
        $start->setTimezone(new DateTimeZone('Europe/Paris'));	
        $end = new DateTime($apps[$i]["attempts"][0]["endTime"]);
        $end->setTimezone(new DateTimeZone('Europe/Paris'));
        $duration = $start->diff($end);
        ?><a href="#">
                        <tr onclick="document.location = '<?php echo base_url('spark_app/index/'.$apps[$i]["id"]);?>';">
                            <td>
                                <?php echo $apps[$i]["id"]; ?>
                            </td>
                            <td>
                                <?php echo $apps[$i]["attempts"][0]["sparkUser"]; ?>
                            </td>
                            <td>
                                <?php echo $apps[$i]["name"]; ?>
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
                            <?php if($apps[$i]["attempts"][0]["completed"]){
            ?>
                                <td><span class="label green">SUCCEEDED</span></td>
                                <?php
             }else{
            ?>
                                    <td><span class="label red">FAILED</span></td>
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