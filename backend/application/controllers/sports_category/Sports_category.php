<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class sports_category extends CI_Controller
	{
        public function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$this->load->model('Sports_category_model');
	
			
		}
		public function lists(){
;

			$data['title'] = 'List Of Cultural Specialities';
           

			$data['sports_category'] = $this->Sports_category_model->lists();

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('sports_category/list', $data);
			$this->load->view('administrator/footer');
        }
        public function enable($id)
		{
			$table = base64_decode($this->input->get('table'));

            
			$this->Sports_category_model->enable($id,$table);       
			$this->session->set_flashdata('success', 'Disabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desable($id)
		{
			$table = base64_decode($this->input->get('table'));
            //$table = $this->input->post('table');
      
            
			$this->Sports_category_model->desable($id,$table);   
			//echo $this->db->last_query();exit;    
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        function update($id){
            
			
			$data['sports_category'] = $this->Sports_category_model->get($id);

			$this->form_validation->set_rules('sports_category', 'Sports Category', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('sports_category/edit', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'name' => $this->input->post('sports_category'), 
                    //'display' => $this->input->post('display'),

                    );

				$this->Sports_category_model->update($data,$id);
			    //Set Message
			    $this->session->set_flashdata('success', 'Updated Successfully.');
			    redirect('sports_category/sports_category/lists');
			}
        }
        public function delete($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Sports_category_model->delete($id,$table);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			
        }
        public function add(){
            $data['title'] = 'Add Category';
             $this->form_validation->set_rules('sports', 'Sports Category Field', 'required');
            if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('sports_category/add', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'name' => $this->input->post('sports'), 
                    'status' => $this->input->post('status')  ,

                    );

				$this->Sports_category_model->add($data);
			    //Set Message
			    $this->session->set_flashdata('success', 'Data Added Successfully.');
                redirect('sports_category/sports_category/lists');
            }
        }
       
      
		}
