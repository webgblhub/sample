<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Cultural_speciality extends CI_Controller
	{
        public function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$this->load->model('Cultural_speciality_Model');
	
			
		}
		public function lists(){
;

			$data['title'] = 'List Of Cultural Specialities';
           

			$data['cultural_speciality'] = $this->Cultural_speciality_Model->lists();

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('cultural_speciality/list', $data);
			$this->load->view('administrator/footer');
        }
        public function enable($id)
		{
			$table = base64_decode($this->input->get('table'));

            
			$this->Cultural_speciality_Model->enable($id,$table);       
			$this->session->set_flashdata('success', 'Disabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desable($id)
		{
			$table = base64_decode($this->input->get('table'));
            //$table = $this->input->post('table');
      
            
			$this->Cultural_speciality_Model->desable($id,$table);   
			//echo $this->db->last_query();exit;    
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        function update($id){
            
			
			$data['cultural_speciality'] = $this->Cultural_speciality_Model->get($id);

			$this->form_validation->set_rules('cultural_speciality', 'Cultural speciality', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('cultural_speciality/edit', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'cultural_speciality' => $this->input->post('cultural_speciality'), 
                    //'display' => $this->input->post('display'),

                    );

				$this->Cultural_speciality_Model->update($data,$id);
			    //Set Message
			    $this->session->set_flashdata('success', 'Updated Successfully.');
			    redirect('cultural_speciality/cultural_speciality/lists');
			}
        }
        public function delete($id)
		{
			$table = base64_decode($this->input->get('table'));
                                    //$table = $this->input->post('table');
                                    $this->Cultural_speciality_Model->delete($id,$table);       
                                    $this->session->set_flashdata('success', 'Data has been deleted Successfully.');
                                    header('Location: ' . $_SERVER['HTTP_REFERER']);
            
			
        }
        public function add(){
            $data['title'] = 'Add Category';
             $this->form_validation->set_rules('cultural', 'Cultural Speciality Field', 'required');
            if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('cultural_speciality/add', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'cultural_speciality' => $this->input->post('cultural'), 
                    'status' => $this->input->post('status')  ,

                    );

				$this->Cultural_speciality_Model->add($data);
			    //Set Message
			    $this->session->set_flashdata('success', 'Data Added Successfully.');
                redirect('cultural_speciality/cultural_speciality/lists');
            }
        }
       
      
		}
