<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Business_category extends CI_Controller
	{
        public function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$this->load->model('Business_category_Model');
	
			
		}
		public function lists(){
;

			$data['title'] = 'List of Business Categories';
           

			$data['business_category'] = $this->Business_category_Model->lists();

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('supplier/business_category/list', $data);
			$this->load->view('administrator/footer');
        }
        public function enable($id)
		{
			$table = base64_decode($this->input->get('table'));

            
			$this->Business_category_Model->enable($id,$table);       
			$this->session->set_flashdata('success', 'Disabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desable($id)
		{
			$table = base64_decode($this->input->get('table'));
            //$table = $this->input->post('table');
      
            
			$this->Business_category_Model->desable($id,$table);   
			//echo $this->db->last_query();exit;    
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        function update($id){
            
			$data['title'] = 'Edit Business Category';
            
			$data['bus_categories'] = $this->Business_category_Model->get($id);

			$this->form_validation->set_rules('category', 'Category', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('supplier/business_category/edit', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'event_categories' => $this->input->post('category'), 
                    //'display' => $this->input->post('display'),

                    );

				$this->Business_category_Model->update($data,$id);
			    //Set Message
			    $this->session->set_flashdata('success', 'Updated Successfully.');
			    redirect('supplier/business_category/lists');
			}
        }
        public function delete($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Edit_Model->delete($id,$table);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
            // $this->Business_category_Model->delete(array('display' => 2), $id);
            // $this->session->set_flashdata('message', 'Successfully deleted.');
            // redirect('supplier/business_category/lists', 'refresh');
			
        }
        public function add(){
            $data['title'] = 'Add Category';
             $this->form_validation->set_rules('category', 'Category', 'required');
            if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('supplier/business_category/add', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'event_categories' => $this->input->post('category'), 
                    'display' => $this->input->post('display')  ,

                    );

				$this->Business_category_Model->add($data);
			    //Set Message
			    $this->session->set_flashdata('success', ' Category Added Successfully.');
                redirect('supplier/business_category/lists');
            }
        }
       
      
		}
