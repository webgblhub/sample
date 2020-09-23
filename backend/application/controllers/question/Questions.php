<?php
defined('BASEPATH') or exit('No direct script access allowed');
	class Questions extends CI_Controller
	{
		
	 public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			
			$this->load->model('Question_Model');

			
		}

		public function index($s=null)
		{
			$data['title'] = 'List of Question';
			$data['cat']=$this->Question_Model->selectCategory();
			if($s==null)
			{
				$data['s']="no";
				$data['ques'] = $this->Question_Model->listsofQuestion();
			}
			else
			{
				$data['s']=$s;
				$data['ques'] = $this->Question_Model->listsofQuestionbyCategory($s);
			}
			
			//$data['ques'] = $this->Question_Model->listsofQuestion();

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('question/listofQuestion', $data);
			$this->load->view('administrator/footer');
		}

		public function addQuestion()
		{
			$data['title'] = 'Add New Question';
			$data['cat'] = $this->Question_Model->selectCategory();

			if(isset($_POST['submit']))
			{
				if(!empty($this->input->post('answer')))
				{
					$answer=$this->input->post('answer');
				}
				else
				{
					$answer="";
				}
				$data=array(

							'cat_id'  	=> $this->input->post('category'),
							'question'			=> $this->input->post('question'),
							'status'			=> 'Active',
							'question_created_date'			=> date('Y-m-d'),
							'ques_type'			=> $this->input->post('ques_type'),
							'answer'				=>$answer,
							'must_required'			=>$this->input->post('reqi'),

							
							);
				$result = $this->Question_Model->addQuestion($data);
				if($result){
					$this->session->set_flashdata('success', 'Question has been Added.');
					redirect('question/questions', 'refresh');

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					redirect('question/questions/addQuestion', 'refresh');

					
				}

				
			}

			

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('question/addNewQuestion', $data);
			$this->load->view('administrator/footer');
		}

		public function editQuestion($id)
		{
			$data['title'] = 'Edit Question';

			$data['cat'] = $this->Question_Model->selectCategory();

	 		$data['ques'] = $this->Question_Model->selectQuestionbtId($id);

	 		if(isset($_POST['submit']))
				{
						if(!empty($this->input->post('answer')))
					{
						$answer=$this->input->post('answer');
					}
					else
					{
						$answer="";
					}

					$data=array(
							'id'					=>	$id,
							'cat_id'  				=> $this->input->post('category'),
							'question'				=> $this->input->post('question'),
							'status'				=> 'Active',
							'question_created_date'	=> date('Y-m-d'),
							'ques_type'				=> $this->input->post('ques_type'),
							'answer'				=>$answer,
							'must_required'			=>$this->input->post('reqi'),

						);
				$result = $this->Question_Model->updateQuestion($data);

				if($result){
					$this->session->set_flashdata('success', 'Question has been Update.');
					redirect('question/questions/', 'refresh');

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					redirect('question/questions/', 'refresh');

					
				}
			}


	 		$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('question/editQuestion', $data);
			$this->load->view('administrator/footer');
		}

		public function deleteQuestion($id=null)
		{

			$result = $this->Question_Model->deleteQuestionbtId($id);
	 		if($result){
					$this->session->set_flashdata('success', 'Question has been Deleted.');
					redirect('question/questions/', 'refresh');

				}
				else
				{
					$this->session->set_flashdata('success', 'Something went wrong.');
					redirect('question/questions/', 'refresh');

					
				}
	}



	}