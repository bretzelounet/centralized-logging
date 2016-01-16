<?php

class Rest_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_file_content()
        {
            $output = shell_exec('C:\"Program Files (x86)"\Gow\bin\cat.exe D:\test\cedric\app_2\blabla.log');
            $content = xss_clean(html_escape($output));
            return $content;
        }
    
        public function get_jobs()
        {
            $tmp = json_decode(file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs'),true);
            $jobs = array_reverse($tmp["jobs"]["job"]);
            return $jobs;
        }
    
        public function get_job_info($job_id)
        {
            $tmp = json_decode(file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs/'.$job_id),true);
            $job_info = array_reverse($tmp["job"]);
            return $job_info;
        }
    
        public function get_job_attemps($job_id)
        {
            $tmp = json_decode(file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs/'.$job_id.'/jobattempts'), true);
            $attemps = $tmp["jobAttempts"]["jobAttempt"];
            return $attemps;
        }
    
        public function get_tasks_attempts($job_id)
        {
            $tmp = json_decode(file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs/'.$job_id.'/tasks'), true);
            $tasks = $tmp["tasks"]["task"];
            $i = 0;
            foreach($tasks as $t){
                $tasks_attempts[$i] = json_decode(file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs/'.$job_id.'/tasks/'.$t["id"].'/attempts'), true);
                $i++;
            }
            return $tasks_attempts;
        }

}

?>