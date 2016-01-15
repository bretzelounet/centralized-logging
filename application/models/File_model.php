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
           $jobs = json_decode(file_get_contents('http://109.232.232.41:19888/ws/v1/history/mapreduce/jobs'),true);
           var_dump(end($jobs["jobs"]["job"]));
            
        }

}

?>