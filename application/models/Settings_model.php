<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
    
        private $file;

        public function __construct() {
            parent::__construct();
            $this->file = 'params.txt';
        }

        public function save_params($history_server, $log_directory)
        {
            $array = array('history_server'=>$history_server,'log_directory'=>$log_directory);
            $serializedData = serialize($array);
            file_put_contents($this->file, $serializedData);
        }
    
        public function get_params()
        {
            $recoveredData = file_get_contents($this->file);
            $recoveredArray = unserialize($recoveredData);
            return $recoveredArray;
        }
}

?>