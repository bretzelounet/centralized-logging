<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs {

        public function get_log_content($job_id, $user, $node_id)
        {
            $cmd = 'C:\"Program Files (x86)"\Gow\bin\cat.exe D:\test\logs\\'.$user.'\logs\\'.str_replace("job", "application", $job_id).'\\'.$node_id;
            $content = shell_exec($cmd);
            echo $content;
            return $content;
        }
    
        public function get_job_attempt_logs($job_id, $user, $node_id, $cont_id){
            $logs=[];
            
            $content = $this->get_log_content($job_id, $user, $node_id);
            $position = strpos($content, $cont_id);
            
            $attempt_logs = substr($content, $position);
            
            $stderr_pos = strpos($attempt_logs, "stderr");
            $stdout_pos = strpos($attempt_logs, "stdout");
            $syslog_pos = strpos($attempt_logs, "syslog");
            
            $logs["stderr"] = substr($attempt_logs, ($stderr_pos + 6), ($stdout_pos - $stderr_pos - 6));
            $logs["stdout"] = substr($attempt_logs, ($stdout_pos + 6), ($syslog_pos - $stdout_pos - 6));
            $logs["syslog"] = substr($attempt_logs, ($syslog_pos + 6));
            
            return $logs;
        }
}

?>