<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'client/profile_model'
		));
		
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

	}

	public function index()
	{
		$data['title']="Customer - Dashboard";
		$data['customer']=$this->customerDetails();
		$this->load->view('client/theme/header', $data);
	    $this->load->view('client/customer_home');
	    $this->load->view('client/theme/footer');
	}
	
	public function lists()
	{
		$data['title']="Customer - List";
		$data['customers']=$this->profile_model->lists();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('client/lists', $data);
			$this->load->view('administrator/footer');
	}

	public function home()
	{
		//echo "ok";die;
		$data['title']="Customer - Dashboard";
		$data['customer']=$this->customerDetails();
		
		$this->load->view('client/theme/header', $data);
	    $this->load->view('client/customer_dashboard');
	    $this->load->view('client/theme/footer');
	  
	}

	public function customerDetails()
	{
		$id=$this->input->get('cusid');
		$result=$this->profile_model->select_customer_details($id);
		return $result;
	}


	public function profileinfo()
	{
		//echo "ok";die;
		$data['title']="Customer - Profile";
		$data['customer']=$this->customerDetails();
		$data['states']=$this->State_Model->listsofState();

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('client/edit', $data);
			$this->load->view('administrator/footer');
	}
	public function update_profileinfo()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$data = array(
				'customer_id' => $this->input->post('id'),
				'customer_type' => $this->input->post('name_prefix'),
				'firstname' => $this->input->post('first_name'),
				'lastname' => $this->input->post('last_name'),
				'email' => $this->input->post('email_address'),
				'mobile' => $this->input->post('mobile_number'),
				'landline' => $this->input->post('landline_number'),
				'fax' => $this->input->post('fax_number'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'city' => $this->input->post('city_id'),
				'state' => $this->input->post('State_id'),
				'sex' => $this->input->post('sex'),
				'age' => $this->input->post('age'),
				'zipcode' => $this->input->post('zipcode'),
				'accept' => '1',
				'created_on' => $date,
				'status' =>'1'
			);
		$result=$this->profile_model->update_customer_details($data);

		if($result=="TRUE")
		{
			    $this->session->set_flashdata('success', 'Updated Successfully.');
			//redirect('client/profile/businessinfo', 'refresh');
			redirect('client/profile/lists', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('danger','Please try one more time.');
			redirect('client/profile/profileinfo?cusid='.$this->input->post('id'), 'refresh');

		}		

	}

	public function businessinfo()
	{
		$data['title']="Customer - Profile";
		$data['cust']=$this->customerDetails();
		$data['customer']=$this->profile_model->customerBusinessDetails($this->input->get('cusid'));
		$data['states']=$this->State_Model->listsofState();
		if(empty($data['customer']))
		{
			$data['customer'][0]['cid']=$data['cust'][0]->customer_id;
		}
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('client/edit-business', $data);
			$this->load->view('administrator/footer');
	}

	public function update_businessinfo()
	{


		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$data = array(
				'customer_id' => $this->input->post('id'),
				'company_name'=>$this->input->post('company'),
				'customer_type' => $this->input->post('name_prefix'),
				'firstname' => $this->input->post('first_name'),
				'lastname' => $this->input->post('last_name'),
				'email' => $this->input->post('email_address'),
				'mobile' => $this->input->post('mobile_number'),
				'landline' => $this->input->post('landline_number'),
				'fax' => $this->input->post('fax_number'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'city' => $this->input->post('city_id'),
				'state' => $this->input->post('State_id'),
				'zipcode' => $this->input->post('zipcode'),
				'accept' => '1',
				'created_on' => $date,
				'status' =>'1'
			);
		$result=$this->profile_model->update_customer_bisness_details($data);

		if($result=="TRUE")
		{
			$this->session->set_flashdata('success','Sucessfully Update.');
			redirect('client/profile/lists', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('danger','Please try one more time.');
			redirect('client/profile/businessinfo?cusid='.$this->input->post('id'), 'refresh');

		}		

	}

	public function customer_event_selection()
	{
		$data=array(
						'customer_id' =>  $this->input->post('id'),
						'event_type'  =>  $this->input->post('event_type'),
					);
		$this->db->insert('customer_events',$data);
		if($this->input->post('event_type')=='consumer')
		{
			redirect('client/profile/profileinfo', 'refresh');
		}
		else
		{
			redirect('client/profile/businessinfo', 'refresh');
		}
	}



}