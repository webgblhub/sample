<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model('dashboard_model');
        $this->load->model('web_model');

        // if($this->session->userdata('lang') == 'ml'){
        // 	$this->lang->load('ml', 'malayalam');
        // } else {
        // 	$this->lang->load('en', 'english');
        // }       
	}

	public function view($page = '', $data = NULL)
	{		
		if($page == '')
		{
			$page = 'index';
		}

		if($page == 'index'){
			$data['title'] = 'TravelMate';
		}
		else{
			$data['title'] = ucwords(str_replace('-', ' ', $page)).' - TravelMate';
		}
		$data['page_name']      = str_replace('-', ' ', $this->uri->segment(1));
		$data['lang']           = $this->session->userdata('lang');
		$data['web_model']      = $this->web_model;
		
		if(file_exists(APPPATH."views/web/".$page.".php"))
		{    
    
      $this->load->view('web/section/header', $data);
      $this->load->view('web/'.$page, $data);
      $this->load->view('web/section/footer');
    }
    else 
    {
     
      $this->load->view('web/section/header', $data);
      // $this->load->view('web/404', $data);
      $this->load->view('web/section/footer');
		}
	}



  
	
}
