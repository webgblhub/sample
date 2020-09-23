<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Language_spoken extends CI_Controller
	{
        public function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$this->load->model('Language_spoken_Model');
	
			
		}
		public function lists(){
;

			$data['title'] = 'List Of language Spoken';
           

			$data['language_spoken'] = $this->Language_spoken_Model->lists();

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('language_spoken/list', $data);
			$this->load->view('administrator/footer');
        }
        public function enable($id)
		{
			$table = base64_decode($this->input->get('table'));

            
			$this->Language_spoken_Model->enable($id,$table);       
			$this->session->set_flashdata('success', 'Disabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desable($id)
		{
			$table = base64_decode($this->input->get('table'));
            //$table = $this->input->post('table');
      
            
			$this->Language_spoken_Model->desable($id,$table);   
			//echo $this->db->last_query();exit;    
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        function update($id){
            
			
			$data['language_spoken'] = $this->Language_spoken_Model->get($id);

			$this->form_validation->set_rules('language_spoken', 'Cultural speciality', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('language_spoken/edit', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'language_spoken' => $this->input->post('language_spoken'), 
                    //'display' => $this->input->post('display'),

                    );

				$this->Language_spoken_Model->update($data,$id);
			    //Set Message
			    $this->session->set_flashdata('success', 'Updated Successfully.');
			    redirect('language_spoken/language_spoken/lists');
			}
        }
        public function delete($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Language_spoken_Model->delete($id,$table);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			
        }
        public function add(){
            $data['title'] = 'Add Category';
             $this->form_validation->set_rules('language', 'Language Spoken Field', 'required');
            if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('language_spoken/add', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'language_spoken' => $this->input->post('language'), 
                    'status' => $this->input->post('status')  ,

                    );

				$this->Language_spoken_Model->add($data);
			    //Set Message
			    $this->session->set_flashdata('success', 'Data Added Successfully.');
                redirect('language_spoken/language_spoken/lists');
            }
        }
       
      
		}
