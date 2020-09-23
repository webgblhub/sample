<?php
defined('BASEPATH') or exit('No direct script access allowed');
	class Supplier extends CI_Controller
	{
		
	 public function __construct()
		{
			parent::__construct();
			
			if($this->session->userdata('admin_logged')==false) {
				redirect('admin');
			}
			$this->load->model('Supplier_Model');
			
		}
		public function lists($offset = null)
		{
			
			$data['title'] = 'List of Roles';
			$data['cat'] = $this->Supplier_Model->selectCategory();

			if($offset==null)
			{
				$data['s']="no";
				$data['supplier'] = $this->Supplier_Model->lists();
			}
			else
			{
				$data['s']=$offset;
				$data['supplier'] = $this->Supplier_Model->listsbyCategoryId($offset);
			}

			

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('supplier/list', $data);
			$this->load->view('administrator/footer');
        }

        public function supplierDetails($id=null)
        {
        	$data['title'] = 'Supplier Details';


        	$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('supplier/supplierDetails', $data);
			$this->load->view('administrator/footer');
        }






        public function update($id){
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Edit Supplier';
            $this->load->model('Supplier_Model');

			$data['testimonial'] = $this->Supplier_Model->get($id);

			$this->form_validation->set_rules('title', 'Title', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('supplier/edit', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'username' => $this->input->post('title'), 
                    'status' => $this->input->post('status'),
					'password'=>$this->input->post('password'),
					'email' => $this->input->post('email'),
                    );
                   
                $this->load->model('Supplier_Model');
                
				$this->Supplier_Model->update($data,$id);
			    //Set Message
			    $this->session->set_flashdata('success', 'Updated Successfully.');
			    redirect('supplier/supplier/lists');
			}
        }
        public function add($page = 'add')
		{
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Add Supplier';

			$this->form_validation->set_rules('title', 'Title', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('supplier/'.$page, $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
					'email' =>$this->input->post('email'),
                    'username' => $this->input->post('title'),
                    'password' => $this->input->post('password'), 
                    'status' => $this->input->post('status')
                    );
               // print_r($data);
                $this->load->model('Supplier_Model');

				$this->Supplier_Model->create($data);

				//Set Message
				$this->session->set_flashdata('success', 'Supplier has been created.');
				redirect('supplier/supplier/lists');
			}
			
		}
		public function category($user_id){
            if(!$this->session->userdata('login')) {
				redirect('administrator/index');
            }
            $this->load->model('Supplier_Model');
            $data['get_category'] = $this->Supplier_Model->get_category();
            $data['get_user'] = $this->Supplier_Model->get_user($user_id);
            $this->load->view('administrator/header-script');
            $this->load->view('administrator/header');
            $this->load->view('administrator/header-bottom');
            $this->load->view('supplier/add_storefront',$data);
            $this->load->view('administrator/footer');	
        }
        public function add_storefront($user_id){
            if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$this->load->model('Supplier_Model');

			$data['get_category'] = $this->Supplier_Model->get_category();
            $data['get_user'] = $this->Supplier_Model->get_user($user_id);
			$this->form_validation->set_rules('supplier_category', 'Select Category', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('supplier/add_storefront', $data);
			   	$this->load->view('administrator/footer');	
			}else{
				$supplier_category = $this->input->post('supplier_category');
				
				$data = array(
					'supplier_category_id' => $supplier_category,
					'users_id' => $user_id,
					'status' => '1'

				);
				$save_category = $this->Supplier_Model->save_category($data);
				if($save_category){
					$this->session->set_flashdata('success', 'Supplier has been created.');
					redirect('supplier/business_info/add_business/'.$save_category, 'refresh');

				}
				else{
					$this->session->set_flashdata('error', 'Something went wrong.');
					redirect('supplier/supplier/category/'.$user_id, 'refresh');

					
				}
			}
        }
        public function list_storefront($user_id){
            if(!$this->session->userdata('login')) {
				redirect('administrator/index');
            }
           
            $data['get_user'] = $this->Supplier_Model->get_user($user_id);

            $data['business_info'] = $this->Supplier_Model->get_business($user_id);
            $this->load->view('administrator/header-script');
            $this->load->view('administrator/header');
            $this->load->view('administrator/header-bottom');
            $this->load->view('supplier/list_storefront',$data);
            $this->load->view('administrator/footer');	

        }

           public function deleteStoreFront($id=null)
      {

      		$businessid=$this->Supplier_Model->Select_businessid($id);
      		
      		$businesscount=$this->Supplier_Model->Select_businesscount($businessid[0]->business_id);

      		
      		
      		if($businesscount>1)
      		{
      			$c=0;
      		}
      		else
      		{
      			$c=1;
      		}
      		$result= $this->Supplier_Model->deleteStoreFront($id,$c,$businessid);

      		if($result){
					$this->session->set_flashdata('success', 'Store Front  has been Deleted.');
					redirect('supplier/create/listOfStorefront', 'refresh');

				}
				else{
					$this->session->set_flashdata('error', 'Something went wrong.');
					redirect('supplier/create/listOfStorefront', 'refresh');

					
				}
      }

      

      public function badge()
      {
      	$data['title'] = 'Add Supplier';


        $data['budge'] = $this->Supplier_Model->selectBadge();
        $this->load->view('admin/theme/header',$data);
        $this->load->view('admin/viewBadge',$data );
        $this->load->view('admin/theme/footer');;

      }
      
      
		}
