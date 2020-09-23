<?php
	class Business_info extends CI_Controller
	{
		
		public function add_business($business_info_id){
			// Pagination Config
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
            }
            $this->load->view('administrator/header-script');
            $this->load->view('administrator/header');
            $this->load->view('administrator/header-bottom');
            $this->load->view('supplier/business/add_business');
            $this->load->view('administrator/footer');	
			
        }
        
      
		}
