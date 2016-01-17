<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('rest');
        $this->load->library('logs');
    }
    
	public function index($job_id=NULL, $node_id=NULL, $cont_id=NULL)
	{   
        if($job_id == NULL){
            show_error("Rest API is not responding for this url", "2", $heading = 'An Error Was Encountered');
        }
        else{
            $this->load->view('header');

            $data["job_infos"] = $this->rest->get_job_info($job_id);
            
            if($node_id == NULL || $cont_id == NULL){
                $data["job_attempts"] = $this->rest->get_job_attemps($job_id);
                $data["tasks_attempts"] = $this->rest->get_tasks_attempts($job_id);

                $this->load->view('job', $data);
            }else{
                
                $node_id = str_replace(":","_",$node_id);
                $data["job_attempt_logs"] = $this->logs->get_job_attempt_logs($job_id, $data["job_infos"]["user"], $node_id, $cont_id, "stdout");
                $this->load->view('job_logs', $data);
            }
            
            $this->load->view('footer');  
        }
	}
}
