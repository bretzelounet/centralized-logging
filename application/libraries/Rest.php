<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest {

        public function get_jobs()
        {
            $tmp = @file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs');
            
            if($tmp === FALSE){
                show_error("Rest API is not responding for this url", "2", $heading = 'An Error Was Encountered');
            }else{
                $jobs = array_reverse(json_decode($tmp, true)["jobs"]["job"]);
                return $jobs;
            }
        }
    
        public function get_job_info($job_id)
        {   
            $tmp = @file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs/'.$job_id);
            
            if($tmp === FALSE){
                show_error("Rest API is not responding for this url", "2", $heading = 'An Error Was Encountered');
            }else{
                $job_info = array_reverse(json_decode($tmp, true)["job"]);
                return $job_info;
            }
        }
    
        public function get_job_attemps($job_id)
        {   
            $tmp = @file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs/'.$job_id.'/jobattempts');
            
            if($tmp === FALSE){
                show_error("Rest API is not responding for this url", "2", $heading = 'An Error Was Encountered');
            }else{
                $attemps = array_reverse(json_decode($tmp, true)["jobAttempts"]["jobAttempt"]);
                return $attemps;
            }
        }
    
        public function get_tasks_attempts($job_id)
        {
            $tmp = @file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs/'.$job_id.'/tasks');
            
            if($tmp === FALSE){
                show_error("Rest API is not responding for this url", "2", $heading = 'An Error Was Encountered');
            }else{
                $tasks = array_reverse(json_decode($tmp, true)["tasks"]["task"]);
            }
            
            $i = 0;
            foreach($tasks as $t){
                $tasks_attempts[$i] = json_decode(file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs/'.$job_id.'/tasks/'.$t["id"].'/attempts'), true);
                $i++;
            }
            return $tasks_attempts;
        }

}

?>