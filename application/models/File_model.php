<?php

class File_model extends CI_Model {

        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function get_file_content($user, $node_id)
        {
            $content = shell_exec('C:\"Program Files (x86)"\Gow\bin\cat.exe D:\test\logs\\'.$user.'\logs\\'.$node_id);
            return $content;
        }
}

?>