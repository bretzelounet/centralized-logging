<?php
$jobs = file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs');
echo $jobs;
?>
