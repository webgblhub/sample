<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Article extends CI_Controller
	{
        public function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$this->load->model('Article_model');
	
			
		}
		public function lists(){
;

			$data['title'] = 'List Of Articles';
           

			$data['article'] = $this->Article_model->lists();

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('article/list', $data);
			$this->load->view('administrator/footer');
        }
        public function enable($id)
		{
			$table = base64_decode($this->input->get('table'));

            
			$this->Article_model->enable($id,$table);       
			$this->session->set_flashdata('success', 'Disabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desable($id)
		{
			$table = base64_decode($this->input->get('table'));
            //$table = $this->input->post('table');
      
            
			$this->Article_model->desable($id,$table);   
			//echo $this->db->last_query();exit;    
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        function update($id){
            
			$data['article'] = $this->Article_model->get($id);
			
			$data['get_category'] = $this->Article_model->get_category();
			 $this->form_validation->set_rules('question', 'Question', 'required');
			 $this->form_validation->set_rules('answer', 'Answer', 'required');
            // $this->form_validation->set_rules('category', 'Category', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('article/edit', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
					'Question' => $this->input->post('question'), 
					'Answer' => $this->input->post('answer')  ,
					'cat_id' => $this->input->post('category')  ,

                    );

				$this->Article_model->update($data,$id);
			    //Set Message
			    $this->session->set_flashdata('success', 'Updated Successfully.');
			    redirect('article/article/lists');
			}
        }
        public function delete($id)
		{
			$table = base64_decode($this->input->get('table'));
			//$table = $this->input->post('table');
			$this->Administrator_Model->delete($id,$table);       
			$this->session->set_flashdata('success', 'Data has been deleted Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			
        }
        public function add(){
			$data['title'] = 'Add Category';
			$data['get_category'] = $this->Article_model->get_category();
			 $this->form_validation->set_rules('question', 'Question', 'required');
			 $this->form_validation->set_rules('answer', 'Answer', 'required');
             $this->form_validation->set_rules('category', 'Category', 'required');
			 
			 
            if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('article/add', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'Question' => $this->input->post('question'), 
					'Answer' => $this->input->post('answer')  ,
					'cat_id' => $this->input->post('category')  ,

					

                    );

				$this->Article_model->add($data);
			    //Set Message
			    $this->session->set_flashdata('success', 'Data Added Successfully.');
                redirect('article/article/lists');
            }
        }
       
      
		}
