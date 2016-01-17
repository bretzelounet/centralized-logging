<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs {

        public function get_log_content($job_id, $user, $node_id)
        {
            $cmd = 'C:\"Program Files (x86)"\Gow\bin\cat.exe D:\test\logs\\'.$user.'\logs\\'.str_replace("job", "application", $job_id).'\\'.$node_id;
            $content = shell_exec($cmd);
            return $content;
        }
}

?>