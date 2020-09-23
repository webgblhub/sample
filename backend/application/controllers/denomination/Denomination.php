<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Denomination extends CI_Controller
	{
        public function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$this->load->model('Denomination_model');
	
			
		}
		public function lists(){
;

			$data['title'] = 'List Of Cultural Specialities';
           

			$data['denomination'] = $this->Denomination_model->lists();

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('denomination/list', $data);
			$this->load->view('administrator/footer');
        }
        public function enable($id)
		{
			$table = base64_decode($this->input->get('table'));

            
			$this->Denomination_model->enable($id,$table);       
			$this->session->set_flashdata('success', 'Disabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desable($id)
		{
			$table = base64_decode($this->input->get('table'));
            //$table = $this->input->post('table');
      
            
			$this->Denomination_model->desable($id,$table);   
			//echo $this->db->last_query();exit;    
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        function update($id){
            
			
			$data['denomination'] = $this->Denomination_model->get($id);

			$this->form_validation->set_rules('denomination', 'Denomination', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('denomination/edit', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'denomination' => $this->input->post('denomination'), 
                    //'display' => $this->input->post('display'),

                    );

				$this->Denomination_model->update($data,$id);
			    //Set Message
			    $this->session->set_flashdata('success', 'Updated Successfully.');
			    redirect('denomination/denomination/lists');
			}
        }
        public function delete($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Denomination_model->delete($id,$table);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			
        }
        public function add(){
            $data['title'] = 'Add Category';
             $this->form_validation->set_rules('denomination', 'Denomination Field', 'required');
            if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('denomination/add', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'denomination' => $this->input->post('denomination'), 
                    'status' => $this->input->post('status')  ,

                    );

				$this->Denomination_model->add($data);
			    //Set Message
			    $this->session->set_flashdata('success', 'Data Added Successfully.');
                redirect('denomination/denomination/lists');
            }
        }
       
      
		}
