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
        <?php foreach($apps as $a){
    
        /* Time calculation */
        $start = new DateTime('@'.substr($a["startTime"],0,-3));	
        $start->setTimezone(new DateTimeZone('Europe/Paris'));
        $end = new DateTime('@'.substr($a["finishTime"],0,-3));
        $end->setTimezone(new DateTimeZone('Europe/Paris'));
        $duration = $start->diff($end);
        ?>
          <tr>
            <td><?php echo substr($a["id"],4); ?></td>
            <td><?php echo $a["user"]; ?></td>
            <td><?php echo $a["name"]; ?></td>
            <td><?php echo $a["queue"]; ?></td>
            <td><?php echo $start->format('D H:i:s'); ?></td>
            <td><?php echo $end->format('D H:i:s'); ?></td>
            <td><?php echo $duration->format('%H:%M:%S'); ?></td>
            <td><span class="label green"><?php echo $a["state"]; ?></span></td>
          </tr>
        <?php } ?>
        </tbody
      </table>
    </div>
  </div>


  <footer class="page-footer orange">
  </footer>

