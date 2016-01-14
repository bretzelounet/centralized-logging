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
            $output = shell_exec('C:\"Program Files (x86)"\Gow\bin\ls.exe D:/test');
            $users = explode("\n", $output);
            array_pop($users);
            
            $apps=[];
            foreach($users as $u){
                $cmd = 'C:\"Program Files (x86)"\Gow\bin\ls.exe D:/test/'.$u;
                array_push($apps,str_replace("\n","",shell_exec($cmd)));
            }
            var_dump($apps);
            
        }

}

?>