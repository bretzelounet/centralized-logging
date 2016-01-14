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
    }
    
	public function index()
	{
        $data = array('file_content' => $this->file_model->get_file_content());
        $data = array('apps' => $this->file_model->get_applications());
        
        $this->load->view('header');
        $this->load->view('yarn', $data);
		$this->load->view('footer');
	}
}
