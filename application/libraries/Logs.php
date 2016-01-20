<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs {

        public function get_log_content($job_id, $user, $node_id)
        {
            //$cmd = 'C:\"Program Files (x86)"\Gow\bin\cat.exe D:\test\logs\\'.$user.'\logs\\'.str_replace("job", "application", $job_id).'\\'.$node_id.'*';
            
            $cmd = 'cat /mapr/tmp/logs/'.$user.'/logs/'.str_replace("job", "application", $job_id).'/'.$node_id.'*';
            $content = shell_exec("sudo bash -c '".$cmd."'");
            return html_entity_decode($content);
        }
    
        public function get_attempt_logs($job_id, $user, $node_id, $cont_id){
            $logs=array();
            
            $content = $this->get_log_content($job_id, $user, $node_id);
            $attempt_logs = strstr($content, '&'.$cont_id);
            $attempt_logs = preg_replace('/\&'.$cont_id.'/', '', $attempt_logs, 1);
            $attempt_logs = $this->colorize($attempt_logs);
            
            $next_cont_pos = strpos($attempt_logs, '&container');
            $stderr_pos = strpos($attempt_logs, "stderr");
            $stdout_pos = strpos($attempt_logs, "stdout");
            $syslog_pos = strpos($attempt_logs, "syslog");

            $logs["stderr"] = substr($attempt_logs, ($stderr_pos + 6), ($stdout_pos - $stderr_pos - 6));
            $logs["stdout"] = substr($attempt_logs, ($stdout_pos + 6), ($syslog_pos - $stdout_pos - 6));
            $logs["syslog"] = substr($attempt_logs, ($syslog_pos + 6), ($next_cont_pos - $syslog_pos - 8));
            
            
            return $logs;
        }
    
        public function colorize($content){

            $pattern = "/([A-Z][a-z]{2}.*[0-9]{1,2}:[0-9]{2}:[0-9]{2} [A|P]M)/";
            $replacement = "<span style=\"color:#03a9f4;font-weight:600;\">$1</span>";
            $content = preg_replace($pattern, $replacement, $content);
            
            $pattern = "/([0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2})/";
            $replacement = "<span style=\"color:#03a9f4;font-weight:600;\">$1</span>";
            $content = preg_replace($pattern, $replacement, $content);
            
            $pattern = "/(INFO)/";
            $replacement = "<span style=\"color:#4caf50;font-weight:600;\">$1</span>";
            $content = preg_replace($pattern, $replacement, $content);
            
            $pattern = "/(WARNI?N?G?)/";
            $replacement = "<span style=\"color:#f9a825;font-weight:600;\">$1</span>";
            $content = preg_replace($pattern, $replacement, $content);
            
            $pattern = "/([ERRO?R?|FATAL])/";
            $replacement = "<span style=\"color:#d50000;font-weight:600;\">$1</span>";
            $content = preg_replace($pattern, $replacement, $content);
            
            return($content);
        }
}

?>
