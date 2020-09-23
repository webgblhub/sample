<?php
defined('BASEPATH') or exit('No direct script access allowed');
	class Embed extends CI_Controller
	{
		 public function __construct()
		{

			parent::__construct();

			$this->load->model('Supplier_Model');
		}	
	
    public function event($url_param=null)
    {
    	
			$base_64 = $url_param . str_repeat('=', strlen($url_param) % 4);
			$data = base64_decode($base_64);
			// echo $data1;die;
			echo "<a href='http://eventsdragon.com/' target='_blank'><img src='../../$data' ></a>";


	}
	function privacy_policy(){
		if($this->session->userdata('supplier_id')){
			$data['title'] = 'Privacy policy';
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/includes/mainmenu', $data);
			$this->load->view('admin/privacy_policy');
			$this->load->view('admin/includes/footer');

		}
		else{
			$this->load->view('admin/includes/login_header');
			//$this->load->view('admin/includes/mainmenu', $data);
			$this->load->view('admin/privacy_policy');
			$this->load->view('admin/includes/login_footer');
		}
	}
	function terms_conditions(){
		if($this->session->userdata('supplier_id')){
			$data['title'] = 'Terms and Conditions';
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/includes/mainmenu', $data);
			$this->load->view('admin/terms_conditions');
			$this->load->view('admin/includes/footer');

		}
		else{
			$this->load->view('admin/includes/login_header');
			//$this->load->view('admin/includes/mainmenu', $data);
			$this->load->view('admin/terms_conditions');
			$this->load->view('admin/includes/login_footer');
		}

	}

		   

}