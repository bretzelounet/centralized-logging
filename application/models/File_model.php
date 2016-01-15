<?php

class File_model extends CI_Model {

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
    
        public function get_applications()
        {
            $tmp = json_decode(file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs'),true);
            $apps = array_reverse($tmp["jobs"]["job"]);
            return $apps;
        }
    
        public function get_job_attemps($job_id)
        {
            $tmp = json_decode(file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs/'.$job_id.'/jobattempts'), true);
            $attemps = $tmp["jobAttempts"]["jobAttempt"];
            return $attemps;
        }

}

?>