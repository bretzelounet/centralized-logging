<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spark_rest {

        public function get_apps($rest_url)
        {
            $tmp = @file_get_contents($rest_url.'/api/v1/applications');
            
            if($tmp === FALSE){
                show_error("Rest API is not responding (check the settings)", "2", $heading = 'An Error Was Encountered');
            }else{
                $apps = json_decode($tmp, true);
                return $apps;
            }
        }
    
        public function get_app_infos($rest_url, $app_id)
        {   
            $tmp = @file_get_contents($rest_url.'/api/v1/applications/'.$app_id);
            
            if($tmp === FALSE){
                show_error("Rest API is not responding", "2", $heading = 'An Error Was Encountered');
            }else{
                $app_infos = json_decode($tmp, true);
                return $app_infos;
            }
        }
    
        public function get_app_executors($rest_url, $app_id)
        {   
            $tmp = @file_get_contents($rest_url.'/api/v1/applications/'.$app_id.'/1/executors');
            
            if($tmp === FALSE){
                show_error("Rest API is not responding", "2", $heading = 'An Error Was Encountered');
            }else{
                $executors = json_decode($tmp, true);
                return $executors;
            }
        }
    /*
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
*/
}

?>