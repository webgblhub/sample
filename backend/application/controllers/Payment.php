<?php
	class Payment extends CI_Controller
	{
		 public function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$this->load->model('Payment_Model');
			
		}
		public function lists($offset = 0){
			// Pagination Config
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$config['base_url'] = base_url(). 'payment/lists';
			$config['total_rows'] = $this->db->count_all('payment_methods');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'paginate-link');

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'List of Payment Methods';

			$data['testimonials'] = $this->Payment_Model->lists(FALSE, FALSE, FALSE);

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('administrator/payment/list', $data);
			$this->load->view('administrator/footer');
		}
		
        public function add($page = 'add')
		{
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Add Payment Method';

			$this->form_validation->set_rules('title', 'Title', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/payment/'.$page, $data);
			   	$this->load->view('administrator/footer');	
			}else{
				$this->Payment_Model->create();

				//Set Message
				$this->session->set_flashdata('success', 'District has been created.');
				redirect('payment/lists');
			}
			
		}

		public function update($id){
			// Check login
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}

			$data['title'] = 'Edit Payment Method';

			$data['testimonial'] = $this->Payment_Model->get($id);

			$this->form_validation->set_rules('title', 'Title', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('administrator/payment/edit', $data);
			   	$this->load->view('administrator/footer');	
			}else{

				$this->Payment_Model->update();
			    //Set Message
			    $this->session->set_flashdata('success', 'District Updated Successfully.');
			    redirect('payment/lists');
			}
		}
		}
