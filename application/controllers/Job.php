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
    }
    
	public function index($job_id=1)
	{   
        $data["job_infos"] = $this->rest_model->get_job_info($job_id);
        $data["job_attempts"] = $this->rest_model->get_job_attemps($job_id);
        $data["tasks_attempts"] = $this->rest_model->get_tasks_attempts($job_id);
        $this->load->view('header');
        $this->load->view('job', $data);
		$this->load->view('footer');
	}
}
