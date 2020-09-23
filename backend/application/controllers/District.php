<?php
	class District extends CI_Controller
	{
		
		public function lists($offset = 0){
			// Pagination Config
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$config['base_url'] = base_url(). 'district/lists';
			$config['total_rows'] = $this->db->count_all('districts');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List of Districts';

			$data['testimonials'] = $this->District_Model->lists(FALSE, FALSE, FALSE);

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/district/list', $data);
			$this->load->view('administrator/footer');
		}
		
        public function add($page = 'add')
		{
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Add District';

			$this->form_validation->set_rules('title', 'Title', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/district/'.$page, $data);
			   	$this->load->view('administrator/footer');	
			}else{
				$this->District_Model->create();

				//Set Message
				$this->session->set_flashdata('success', 'District has been created.');
				redirect('district/lists');
			}
			
		}

		public function update($id){
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Edit District';

			$data['testimonial'] = $this->District_Model->get($id);

			$this->form_validation->set_rules('title', 'Title', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/district/edit', $data);
			   	$this->load->view('administrator/footer');	
			}else{

				$this->District_Model->update();
			    //Set Message
			    $this->session->set_flashdata('success', 'District Updated Successfully.');
			    redirect('district/lists');
			}
		}
		}
