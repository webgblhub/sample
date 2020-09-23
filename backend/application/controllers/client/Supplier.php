<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'client/profile_model',
			'client/supplier_model'
		));
		
		if ($this->session->userdata('customer_logged') == false 
		) 
		redirect('client/customer/login'); 


		
	}

	public function customerDetails()
	{
		$email=$this->session->userdata('customer_email');
		$result=$this->profile_model->select_customer_details($email);
		return $result;
	}

	public function index()
	{
		$data['title']="Customer - Supplier";
		$data['customer']=$this->customerDetails();
		$data['category']=$this->supplier_model->selectAllClientSelectedCategory($data['customer'][0]->customer_id);
		$this->load->view('client/theme/header', $data);
	    $this->load->view('client/list_client_supplier_category', $data);
	    $this->load->view('client/theme/footer');
	

	}


	public function addcategory()
	{
		$data['title']="Customer - Supplier";
		$data['customer']=$this->customerDetails();
		$data['category']=$this->supplier_model->selectAllSupplierCategory();
		$this->load->view('client/theme/header', $data);
	    $this->load->view('client/client_supplier_category', $data);
	    $this->load->view('client/theme/footer');
	}

	public function add_supplier_category()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		for($i=1;$i<=10;$i++)
		{
			
			if(!empty($this->input->post('category'.$i)))
			{
				$data=array(

						'customer_id'			=>	$this->input->post('id'),
						'select_category_id'	=>	$this->input->post('category'.$i),
						'category_budget'		=>	$this->input->post('budget'.$i),
						'catagory_development'	=>	$this->input->post('development'.$i),
						'created_on'			=>	$date,
						);
				
				$result=$this->supplier_model->insert_supplier_category($data);
			}	
			else
			{
				if($result=="TRUE")
					{
						$this->session->set_flashdata('err','Sucessfully Save.');
						redirect('client/profile', 'refresh');
					}
					else
					{
						$this->session->set_flashdata('err','Please try one more time.');
						redirect('client/supplier/index', 'refresh');

					}	

			}
		}
	}

	public function editClientSelectCategory($t=null)
	{
		$data['title']="Customer - Supplier";
		$data['customer']=$this->customerDetails();
		$data['select_category']=$this->supplier_model->selectSupplierCategorybyId($t);
		$data['category']=$this->supplier_model->selectSupplierCategoryExpect($data['select_category'][0]->cat_id);
		$this->load->view('client/theme/header', $data);
	    $this->load->view('client/edit_client_supplier_category', $data);
	    $this->load->view('client/theme/footer');

	}

	public function edit_supplier_category($sup=null)
	{
		$data=array(

						'id'					=> $sup,
						'select_category_id'	=>	$this->input->post('category'),
						'category_budget'		=>	$this->input->post('budget'),
						'catagory_development'	=>	$this->input->post('development'),
						
						);
		$result=$this->supplier_model->update_supplier_category($data);
		if($result=="TRUE")
					{
						$this->session->set_flashdata('err','Sucessfully Save.');
						redirect('client/supplier/index', 'refresh');
					}
					else
					{
						$this->session->set_flashdata('err','Please try one more time.');
						redirect('client/supplier/index', 'refresh');

					}	
				
	}

	public function deleteClientSelectCategory($t=null)
	{
		$result=$this->supplier_model->deleteClientSelectCategory($t);
		if($result=="TRUE")
		{
			$this->session->set_flashdata('err','Sucessfully Delete.');
			redirect('client/supplier/index', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('err','Please try one more time.');
			redirect('client/supplier/index', 'refresh');

		}	
	}

}