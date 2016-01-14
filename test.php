<?php
$jobs = file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs');
$array = json_decode($jobs, true);
var_dump($array["jobs"]["job"][0]);
?>
