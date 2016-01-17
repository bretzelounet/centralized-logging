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
        $this->load->model('file_model');
    }
    
	public function index($job_id=NULL, $node_id=NULL)
	{   
        $jobs_ids = $this->rest_model->get_jobs_ids();
        if($job_id == NULL || !in_array($job_id, $jobs_ids)){
            show_404($page = '', $log_error = TRUE);
        }
        else{
            $this->load->view('header');
            
            $data["job_infos"] = $this->rest_model->get_job_info($job_id);
            
            if($node_id == NULL){
                $data["job_attempts"] = $this->rest_model->get_job_attemps($job_id);
                $data["tasks_attempts"] = $this->rest_model->get_tasks_attempts($job_id);

                $this->load->view('job', $data);
            }else{
                $node_id = str_replace(":","_",$node_id);
                $data["file_content"] = $this->file_model->get_file_content($data["job_infos"]["user"], $node_id);
                $this->load->view('job_logs', $data);
            }
            
            $this->load->view('footer');  
        }
	}
}
