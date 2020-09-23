<?php
	class Role extends CI_Controller
	{
		
		public function lists($offset = 0){
			// Pagination Config
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$config['base_url'] = base_url(). 'role/lists';
			$config['total_rows'] = $this->db->count_all('roles');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List of Roles';

			$data['testimonials'] = $this->Role_Model->lists(FALSE, FALSE, FALSE);

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/role/list', $data);
			$this->load->view('administrator/footer');
		}
		
        public function add($page = 'add')
		{
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Add Role';

			$this->form_validation->set_rules('title', 'Title', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/role/'.$page, $data);
			   	$this->load->view('administrator/footer');	
			}else{
				$this->Role_Model->create();

				//Set Message
				$this->session->set_flashdata('success', 'Role has been created.');
				redirect('role/lists');
			}
			
		}

		public function update($id){
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Edit Role';

			$data['testimonial'] = $this->Role_Model->get($id);

			$this->form_validation->set_rules('title', 'Title', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/role/edit', $data);
			   	$this->load->view('administrator/footer');	
			}else{

				$this->Role_Model->update();
			    //Set Message
			    $this->session->set_flashdata('success', 'Role Updated Successfully.');
			    redirect('role/lists');
			}
		}
		}
