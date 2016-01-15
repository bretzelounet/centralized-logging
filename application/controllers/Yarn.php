<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yarn extends CI_Controller {

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
        $this->load->library('pagination');
    }
    
	public function index($position=0)
	{
        /* number of jobs per page */
        $per_page = 10;
        
        $data["file_content"] = $this->file_model->get_file_content();
        $data["apps"] = $this->file_model->get_applications();
        $data["nb_apps"] = count($this->file_model->get_applications());
        $data["position"] = $position;
        $data["per_page"] = $per_page;
        
        $config['base_url'] = base_url("/yarn/index");;
        $config['total_rows'] = count($this->file_model->get_applications());
        $config['per_page'] = $per_page;

        $this->pagination->initialize($config);

        echo $this->pagination->create_links();
        
        $this->load->view('header');
        $this->load->view('yarn', $data);
		$this->load->view('footer');
	}
}
