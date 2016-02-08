<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yarn_rest {

        public function get_jobs($rest_url)
        {
            $tmp = @file_get_contents($rest_url.'/ws/v1/history/mapreduce/jobs');
            
            if($tmp === FALSE){
                show_error("Rest API is not responding", "2", $heading = 'An Error Was Encountered');
            }else{
                $jobs_array = json_decode($tmp, true);
                $jobs = array_reverse($jobs_array["jobs"]["job"]);
                return $jobs;
            }
        }
    
        public function get_job_info($rest_url, $job_id)
        {   
            $tmp = @file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs/'.$job_id);
            
            if($tmp === FALSE){
                show_error("Rest API is not responding", "2", $heading = 'An Error Was Encountered');
            }else{
                $jobs_array = json_decode($tmp, true);
                $job_info = array_reverse($jobs_array["job"]);
                return $job_info;
            }
        }
    
        public function get_job_attemps($rest_url, $job_id)
        {   
            $tmp = @file_get_contents($rest_url.'/ws/v1/history/mapreduce/jobs/'.$job_id.'/jobattempts');
            
            if($tmp === FALSE){
                show_error("Rest API is not responding", "2", $heading = 'An Error Was Encountered');
            }else{
                $attempts_array = json_decode($tmp, true);
                $attemps = array_reverse($attempts_array["jobAttempts"]["jobAttempt"]);
                return $attemps;
            }
        }
    
        public function get_tasks_attempts($rest_url, $job_id)
        {
            $tmp = @file_get_contents($rest_url.'/ws/v1/history/mapreduce/jobs/'.$job_id.'/tasks');
            
            if($tmp === FALSE){
                show_error("Rest API is not responding", "2", $heading = 'An Error Was Encountered');
            }else{
                $tasks_array = json_decode($tmp, true);
                $tasks = array_reverse($tasks_array["tasks"]["task"]);
            }
            
            $i = 0;
            foreach($tasks as $t){
                $tasks_attempts[$i] = json_decode(file_get_contents($rest_url.'/ws/v1/history/mapreduce/jobs/'.$job_id.'/tasks/'.$t["id"].'/attempts'), true);
                $i++;
            }
            return $tasks_attempts;
        }

}

?>