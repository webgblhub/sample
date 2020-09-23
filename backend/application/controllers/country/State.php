<?php
defined('BASEPATH') or exit('No direct script access allowed');
	class State extends CI_Controller
	{
		
	 public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			
			$this->load->model('State_Model');

			
		}

		public function index()
		{
			$data['title'] = 'List of State';


			$data['state'] = $this->State_Model->listsofState();

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('country/stateList', $data);
			$this->load->view('administrator/footer');
		}

		public function addState()
		{
			$data['title'] = 'Add New State';

			if(isset($_POST['submit']))
			{
				$d=date('Y-m-d H:m:i');

				$data=array(

							'iso2'  	=> $this->input->post('code'),
							'name'			=> $this->input->post('state'),
							'country_id'	=>'233',
							'country_code'	=>'US',
							'created_at'	=>$d,
							'updated_at'	=>$d,
							'flag'=>'1',
							);
				$result = $this->State_Model->addState($data);

				if($result){
					$this->session->set_flashdata('success', 'State has been created.');
					redirect('country/state/', 'refresh');

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					redirect('country/state/addState', 'refresh');

					
				}
			}

			

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('country/addNewState', $data);
			$this->load->view('administrator/footer');
		}


	 public function check_available()
	 {
			 if($this->State_Model->is_code_available($_POST["code"]))  
	                {  
	                     echo '<label class="arf-inverse-danger" style="font-size:14px;font-weight:700" ><i class="ti-close"></i> State Code You entered is Available.</label>';  
	                     echo '<label id="tt" style="display:none">Yes</label';
	                }  
	                else  
	                {  
	                     echo '<label class="arf-inverse-primary" style="font-size:14px;font-weight:700" ><i class="ti-check-box"></i> State Code You entered is Not Available.</label>'; 
	                     echo '<label id="tt" style="display:none">No</label'; 
	                }  
	            }

	 public function editState($id="null")
	 {
	 	$data['title'] = 'Edit State';

	 	$data['state'] = $this->State_Model->selectStatebtId($id);

	 	if(isset($_POST['submit']))
			{
				$d=date('Y-m-d H:m:i');
				$data=array(
							'id'			=>$id,
							'iso2'  		=> $this->input->post('code'),
							'name'			=> $this->input->post('state'),
							'country_id'	=>'233',
							'country_code'	=>'US',
							'updated_at'	=>$d,
							'flag'			=>'1',
							);
				$result = $this->State_Model->updateState($data);

				if($result){
					$this->session->set_flashdata('success', 'State has been Update.');
					redirect('country/state/', 'refresh');

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					redirect('country/state/addState', 'refresh');

					
				}
			}


	 		$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('country/editState', $data);
			$this->load->view('administrator/footer');

	 }    

	 public function deleteState($scode="null")
	 {
	 	$result = $this->State_Model->deleteStatebtId($scode);
	 	if($result){
					$this->session->set_flashdata('success', 'State has been Deleted.');
					redirect('country/state/', 'refresh');

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					redirect('country/state/', 'refresh');

					
				}
	 }   

	 public function listofCity($state_id=null)
	 {
	 	$data['title'] = 'List of City';


			$data['city'] = $this->State_Model->listsofCity($state_id);

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('country/cityList', $data);
			$this->load->view('administrator/footer');
	 }  

	 public function addCity($state_id=null)
	 {
	 	$data['title'] = 'Add New City';
	 	$data['state'] = $this->State_Model->selectStatebtId($state_id);
	 	$data['other']=$this->State_Model->listsofState();

			if(isset($_POST['submit']))
			{
				$sid=$this->input->post('state');
				$data['sdetail'] = $this->State_Model->selectStatebtId($sid);
				$d=date('Y-m-d H:m:i');

				$data=array(

							
							'name'			=> $this->input->post('city'),
							'state_id'		=> $data['sdetail'][0]->id,
							'state_code'	=> $data['sdetail'][0]->iso2,
							'country_id'	=>'233',
							'country_code'	=>'US',
							'created_at'	=>$d,
							'updated_on'	=>$d,
							'flag'=>'1',
							);
				$result = $this->State_Model->addCity($data);

				if($result){
					$this->session->set_flashdata('success', 'City has been created.');
					redirect('country/state/listofCity/'.$sid, 'refresh');

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					redirect('country/state/addCity/'.$sid, 'refresh');

					
				}
			}

			

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('country/addNewCity', $data);
			$this->load->view('administrator/footer');
	 }  

	 public function editCity($id=null)
	 {
	 	$data['title'] = 'Edit City';
	 	// $data['state'] = $this->State_Model->selectStatebtId($state_id);
	 	// $data['other']=$this->State_Model->listsofState();

	 	$data['city'] = $this->State_Model->selectCityId($id);

	 	$data['other']=$this->State_Model->listsofotherState($data['city'][0]->stateid);

	 	if(isset($_POST['submit']))
			{
				$sid=$this->input->post('state');
				$data['sdetail'] = $this->State_Model->selectStatebtId($sid);
				$d=date('Y-m-d H:m:i');
				$data=array(
							'id'			=>$id,
							'name'			=> $this->input->post('city'),
							'state_id'		=> $data['sdetail'][0]->id,
							'state_code'	=> $data['sdetail'][0]->iso2,
							'updated_on'	=>$d,
							
							);
				$result = $this->State_Model->updateCity($data);

				if($result){
					$this->session->set_flashdata('success', 'City has been Update.');
					redirect('country/state/listofCity/'.$sid, 'refresh');

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					redirect('country/state/editCity/'.$id, 'refresh');

					
				}
			}


	 		$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('country/editCity', $data);
			$this->load->view('administrator/footer');
	 }

	 public function deletecity($id="null")
	 {

	 	$data['city'] = $this->State_Model->selectCityId($id);

	 	$result = $this->State_Model->deleteCitybtId($id);
	 	if($result){
					$this->session->set_flashdata('success', 'City has been Deleted.');
					redirect('country/state/listofCity/'.$data['city'][0]->state_id, 'refresh');

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					redirect('country/state/listofCity/'.$data['city'][0]->state_id, 'refresh');

					
				}
	 }   

	}