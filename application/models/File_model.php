<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File {

        public function get_file_content($user, $node_id)
        {
            $content = shell_exec('C:\"Program Files (x86)"\Gow\bin\cat.exe D:\test\logs\\'.$user.'\logs\\'.$node_id);
            return $content;
        }
}

?>