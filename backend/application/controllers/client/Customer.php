<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('client/customer_model');

		
	}


	public function register()
	{
		$data['title']="Customer - Registration";
		$this->form_validation->set_rules('email', 'Email', 'trim');
    	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[12]');
    	$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|matches[password]');

    	if ($this->form_validation->run() === FALSE)
	    {
	    	$this->load->view('client/theme/top',$data);
	        $this->load->view('client/register');
	       // $this->load->view('client/theme/footer');
	    }
	    else{
	    	$data = array(
	    		'email' => $this->input->post('email'),
	    		'password' => md5($this->input->post('password')),
	    		'status'	=> 0,
	    	 );
				 // print_r($data);exit();

	    	$is_reg = $this->customer_model->register($data);

	        if($is_reg=="TRUE")
	        {
	        	$this->load->view('client/theme/top', $data);
	        	$this->load->view('client/login');
	        }
	        else if($is_reg=="FALSE"){
	        	$this->session->set_flashdata('reg-err','Registration Failed!');
	        	$this->load->view('client/theme/top',$data);
	        	$this->load->view('client/register');
	     
	        }
	        else if($is_reg=="available"){
	        	$this->session->set_flashdata('reg-err','This mail id already Registered!');
	        	$this->load->view('client/theme/top',$data);
	        	$this->load->view('client/register');
	     
	        }

	    }

	}

	  public function login()
	    {
	    	$data['title']="Customer - Login";
		    $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[6]');
	    	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

		    if ($this->form_validation->run() === FALSE)
		    {
		        $this->load->view('client/theme/top',$data);
		        $this->load->view('client/login'); 
		    }
		    else
		    {
		    	$data = array(
		    		'email' => $this->input->post('email'),
		    		'password' => md5($this->input->post('password'))
		    	 );

		        $is_login = $this->customer_model->customer_login($data);

		        if($is_login)
		        {
		        	redirect('client/profile/', 'refresh');
		        }
		        else{
		        	$this->session->set_flashdata('log-err','Wrong email, password combination.');
		        	$this->load->view('client/theme/top',$data);
		        	$this->load->view('client/login');  
		        }
		    }
	    	 
	    }


	public function forgot_password()
	 {
	 	$data['title']="Customer - Forgot Password";
	 	 $this->load->view('client/theme/top',$data);
		$this->load->view('client/forgot_password');
	}

	public function logout()
	{
		$data['title']="Customer - Login";
		$array_items = array('customer_id','customer_email','customer_logged');
		$this->session->unset_userdata($array_items);
		 $this->load->view('client/theme/top',$data);
		 $this->load->view('client/login'); 
	}

	
}
