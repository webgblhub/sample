<?php
defined('BASEPATH') or exit('No direct script access allowed');
	class DiscountType extends CI_Controller
	{
		
	 public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			
			$this->load->model('DiscountType_Model');

			
		}

		public function index()
		{
			$data['title'] = 'List of Discount Type';


			$data['disc'] = $this->DiscountType_Model->listsofDiscont();

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('discount/listofDiscont', $data);
			$this->load->view('administrator/footer');
		}

		public function addDiscount()
		{
			$data['title'] = 'Add Discount';

			if(isset($_POST['submit']))
			{
				if(empty($this->input->post('status')))
				{
					$s=0;
				}
				else
				{
					$s=1;
				}
				$data=array(

							'discount_name' => $this->input->post('discount'),
							'status' 		=> $s,
							
							
							);
				$result = $this->DiscountType_Model->addDiscount($data);
				if($result){
					$this->session->set_flashdata('success', 'Discount has been Added.');
					redirect('discount/discountType/', 'refresh');

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					redirect('discount/discountType/', 'refresh');

					
				}

				
			}

			

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('discount/addNewDiscount', $data);
			$this->load->view('administrator/footer');
		}

		public function editDiscount($id=null)
		{
			$data['title'] = 'Edit Discount';

			$data['dis'] = $this->DiscountType_Model->selectDiscountbtId($id);

	 		if(isset($_POST['submit']))
				{
					if(empty($this->input->post('status')))
				{
					$s=0;
				}
				else
				{
					$s=1;
				}
					$data=array(
							'discount_id'	=>	$id,
							'discount_name' => $this->input->post('discount'),
							'status' 		=> $s,
							
						);
				$result = $this->DiscountType_Model->updateDiscount($data);

				if($result){
					$this->session->set_flashdata('success', 'Discount has been Update.');
					redirect('discount/discountType/', 'refresh');

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					redirect('discount/discountType/', 'refresh');

					
				}
			}


	 		$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('discount/editDiscount', $data);
			$this->load->view('administrator/footer');
		}

		public function deleteDiscount($id=null)
		{

			$result = $this->DiscountType_Model->deleteDiscountbtId($id);
	 		if($result){
					$this->session->set_flashdata('success', 'Discount has been Deleted.');
					redirect('discount/discountType/', 'refresh');

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					redirect('discount/discountType/', 'refresh');

					
				}
	}

 public function enable($id=null)
 {

			
			$result=$this->DiscountType_Model->enable($id); 
			if($result){
					$this->session->set_flashdata('success', 'Enable Successfully.');
					header('Location: ' . $_SERVER['HTTP_REFERER']);

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					header('Location: ' . $_SERVER['HTTP_REFERER']);

					
				}      
			
 }
 public function disable($id=null)
 {
 	
			
			$result=$this->DiscountType_Model->disable($id);   
			if($result){
					$this->session->set_flashdata('success', 'Disabled Successfully.');
					header('Location: ' . $_SERVER['HTTP_REFERER']);

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					header('Location: ' . $_SERVER['HTTP_REFERER']);

					
				}       
			
 }


	}