<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('auth_model');
	}

	public function view($page = '', $data = NULL)
	{
    if($this->session->userdata('admin_logged'))
    {
      if($page == '')
      {
        $page = 'dashboard';
      }

      $data['title'] = ucfirst($page);
      //$this->load->view('admin/theme/header', $data);
      $this->load->view('admin/'.$page, $data);
      //$this->load->view('admin/theme/footer');
    }
    else{

      if($page == '')
      {
        $page = 'login';
      }

		  $data['title'] = ucfirst($page);
			//$this->load->view('admin/theme/top',$data);
			$this->load->view('admin/'.$page,$data);
		}

	}

	public function admin_login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[6]');
    	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$emailverify = $this->auth_model->verifyUserEmail($this->input->post('email'));
		if(count($emailverify)>0)
		{
	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('admin/login');
	    }
	    else
	    {
	    	$data = array(
	    		'email' => $this->input->post('email'),
	    		'password' => $this->input->post('password')
	    	 );

	        $is_login = $this->auth_model->admin_login($data);

	        if($is_login)
	        {
	        	redirect('Supplier/OVDashboard/', 'refresh');
	        }
	        else{
	        	$this->session->set_flashdata('success','Wrong password for this email.');
	        	$this->load->view('admin/login');
	        }
	    }
		}
		else
		{
				$this->session->set_flashdata('success','The email does not exists.');
	        	$this->load->view('admin/login');
		}
	}

	// public function register()
	// {
	// 	// print_r("hello");exit();
	// 	$this->form_validation->set_rules('username', 'Username', 'trim');
 //    	// $this->form_validation->set_rules('email', 'Email', 'trim|required|');
 //    	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[12]');
 //    	$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|matches[password]');

 //    	if ($this->form_validation->run() === FALSE)
	//     {
	//         $this->load->view('admin/register');
	//     }
	//     else{
	//     	$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
	//     	$data = array(
	//     		'username' => $this->input->post('username'),
	//     		'email' => $this->input->post('email'),
	//     		'password' => $password
	//     	 );
	// 			 // print_r($data);exit();

	//     	$is_reg = $this->auth_model->register($data);

	//         if($is_reg)
	//         {
	//         	$this->load->view('admin/login');
	//         }
	//         else{
	//         	$this->session->set_flashdata('reg-err','Registration Failed!');
	//         	$this->load->view('admin/register');
	//         }

	//     }

	// }
	// public function forgot_password(){
	// 	$this->view('forgot_password');
	// }

	public function logout()
	{
		$array_items = array('admin_id','admin_name','admin_email','admin_logged');
		$this->session->unset_userdata($array_items);
		$this->view();
	}

	//Jisha Edited

	public function register()
	{
		// print_r("hello");exit();
		//$this->form_validation->set_rules('username', 'Username', 'trim');
    	// $this->form_validation->set_rules('email', 'Email', 'trim|required|');
    	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[20]');
    	//$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|matches[password]');

    	if ($this->form_validation->run() === FALSE)
	    {
		  
			$this->load->view('admin/register');
	
	    }
	    else{
	    	$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
	    	$verify = $this->auth_model->verifyUserEmail($this->input->post('email'));
		if ($verify) {

				$this->session->set_flashdata('success','Already registered with this email id. Please Login!');
	        	redirect('Supplier/', 'refresh');
		}
		else
		{

	    	$data = array(
	    		'username' => $this->input->post('username'),
	    		'email' => $this->input->post('email'),
	    		'password' => $password
	    	 );
				 // print_r($data);exit();

	    	$is_reg = $this->auth_model->register($data);
$actid=base64_encode($is_reg);
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$this->load->helper('events_helper');
			$subject = "REGISTRATION";

			$get_template = $this->auth_model->get_template();


			$body=$get_template->body;
			//$body ='hi'; 
			//print_r($message);die(); 
			$body2 = str_replace(array("<firstname>","<notification title>","<actid>"),array($username,$subject,$actid),$body);
			//$body = str_replace("<notification title>",$subject,$body);
			//$body = str_replace("<actid>",$actid,$body);

			if($is_reg)
	        {
	        
			if (send_email($email, $subject, $body2) == true) {

	        
	        	$this->load->view('admin/login');
			}
			else{
	        	$this->session->set_flashdata('success','Email verification is Failed!');
	        	$this->load->view('admin/register');
			}


		}
	
	        else{
	        	$this->session->set_flashdata('success','Registration Failed!');
	        	$this->load->view('admin/register');
			}
			}
		

	    }

	    

	}
	public function forgot_password(){
		$this->view('forgot_password');
	}
	public function supplier_forgot(){
		$email = $this->input->post('email');
		$verify = $this->auth_model->verifyUserEmail($email);
		if ($verify) {
			$length = 8;
			$random = "";
  			srand((double) microtime() * 1000000);
			$data = "123456123456789071234567890890";
			for ($i = 0; $i < $length; $i++) {
         	 	$random .= substr($data, (rand() % (strlen($data))), 1);
			  }
			
			$password = password_hash($random,PASSWORD_DEFAULT);
			$data = array(

	    		'password' => $password
			 );
			 $update_password = $this->auth_model->update_password($data,$email);
			 $this->load->helper('events_helper');
			 $subject = "Forgot Password";
			 $get_template = $this->auth_model->get_forgot_template();


			$body=$get_template->body;
			//$body ='hi'; 
			//print_r($get_template);die(); 
			$body = str_replace("<firstname>",$email,$body);
			$body = str_replace("<password>",$random,$body);
			$body = str_replace("<notification title>",$subject,$body);


			
			if (send_email($email, $subject, $body) == true) {

	        	if($update_password)
	        	{
	        	$this->load->view('admin/login');
				}else{

				$this->session->set_flashdata('reg-err','Registration Failed!');
	        	$this->load->view('admin/register');
			


				}
		}
	}
		else{
			$this->session->set_flashdata('reg-err','These email id doesnot exists.Please Signup!');
	        	$this->view('register');

		}
	
}

	public function activate()
	{
		$id=base64_decode($this->input->get('id'));
		$this->auth_model->activate($id);
		$this->load->view('admin/login',array('stat'=>'success'));
	}


}
