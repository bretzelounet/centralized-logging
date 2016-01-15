  <nav role="navigation">
    <div class="nav-wrapper container">
        <a href="#" class="brand-logo right">Centralized <span style="color:#e67e22;">logging</span></a>
      <ul id="nav-links" class="hide-on-med-and-down">
        <li><a href="#"><i class="material-icons">settings</i></a></li>
        <li><a class="active" href="#">YARN</a></li>
        <li><a href="#">OOZIE</a></li>
        <li><a href="#">IMPALA</a></li>
      </ul>
    </div>
  </nav>

  <div class="section">
    <div class="container">
      <h4 class="orange-text title">Yarn applications</h4>
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
        for($i=$position ; $i < ($position+$per_page) ; $i++)
        {
    
        /* Time calculation */
        $start = new DateTime('@'.substr($apps[$i]["startTime"],0,-3));	
        $start->setTimezone(new DateTimeZone('Europe/Paris'));
        $end = new DateTime('@'.substr($apps[$i]["finishTime"],0,-3));
        $end->setTimezone(new DateTimeZone('Europe/Paris'));
        $duration = $start->diff($end);
        ?>
          <tr>
            <td><?php echo substr($apps[$i]["id"],4); ?></td>
            <td><?php echo $apps[$i]["user"]; ?></td>
            <td><?php echo $apps[$i]["name"]; ?></td>
            <td><?php echo $apps[$i]["queue"]; ?></td>
            <td><?php echo $start->format('D H:i:s'); ?></td>
            <td><?php echo $end->format('D H:i:s'); ?></td>
            <td><?php echo $duration->format('%H:%M:%S'); ?></td>
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
        </tbody
      </table>
    </div>
  </div>


  <footer class="page-footer orange">
  </footer>

