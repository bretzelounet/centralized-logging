<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spark_app extends CI_Controller {

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
        $this->load->library('spark_rest');
        $this->load->library('logs');
        $this->load->model('settings_model');
        date_default_timezone_set('Europe/Paris');
    }
    
	public function index($app_id=NULL, $node_id=NULL, $cont_id=NULL)
	{   
        if($app_id == NULL){
            show_error("Rest API is not responding for this url", "2", $heading = 'An Error Was Encountered');
        }
        else{
            $this->load->view('header');

            $params = $this->settings_model->get_params();
            $data["app_executors"] = $this->spark_rest->get_app_executors($params['spark_server'], $app_id);
            $data["app_infos"] = $this->spark_rest->get_app_infos($params['spark_server'], $app_id);
            
            if($node_id == NULL || $cont_id == NULL){


                $this->load->view('spark_app', $data);
            }else{
                $data["app_logs"] = $this->logs->get_spark_logs($params["log_directory"], $app_id, $data["app_infos"]["attempts"][0]["sparkUser"], $node_id, $cont_id);
                $this->load->view('spark_app_logs', $data);
            }
            
            $this->load->view('footer');  
        }
	}
}
