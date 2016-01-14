<?php
$jobs = json_decode(file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs'),true);
var_dump(end($jobs["jobs"]["job"]));
?>
