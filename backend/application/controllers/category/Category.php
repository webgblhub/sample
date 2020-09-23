<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Category extends CI_Controller
	{
        public function __construct()
		{
            parent::__construct();
            if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
            $this->load->model('Supplier_category_Model');
            $this->load->model('Business_category_Model');
			$this->load->model('Consumer_category_Model');
            $this->load->model('Badge_Model');
            $this->load->model('Mail_template_Model');

            
            
	
			
		}
		public function supplier_category_lists(){


			$data['title'] = 'List of Categories';
           

			$data['testimonials'] = $this->Supplier_category_Model->lists();

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('category/supplier_category/list', $data);
			$this->load->view('administrator/footer');
        }
        public function enable_supplier_category($id)
		{
			$table = base64_decode($this->input->get('table'));

            
			$this->Supplier_category_Model->enable($id,$table);       
			$this->session->set_flashdata('success', 'Disabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		public function desable_supplier_category($id)
		{
			$table = base64_decode($this->input->get('table'));
            //$table = $this->input->post('table');
      
            
			$this->Supplier_category_Model->desable($id,$table);   
			//echo $this->db->last_query();exit;    
			$this->session->set_flashdata('success', 'Enabled Successfully.');
			header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        function update_supplier_category($cat_id){
            
			$data['title'] = 'Edit Supplier Category';
            
			$data['categories'] = $this->Supplier_category_Model->get($cat_id);

			$this->form_validation->set_rules('category', 'Category', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('category/supplier_category/edit', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'category' => $this->input->post('category'), 
                    'dyn_status' => $this->input->post('display'),
                    );

				$this->Supplier_category_Model->update($data,$cat_id);
			    //Set Message
			    $this->session->set_flashdata('success', 'Updated Successfully.');
			    redirect('category/category/supplier_category_lists');
			}
        }
        public function delete_supplier_category($id)
		{
            $this->Supplier_category_Model->delete(array('display' => 2), $id);
            $this->session->set_flashdata('message', 'Successfully deleted.');
            redirect('category/category/supplier_category_lists', 'refresh');
			
        }
        public function add_supplier_category(){
            $data['title'] = 'Add Category';
             $this->form_validation->set_rules('category', 'Category', 'required');
            if($this->form_validation->run() === FALSE){
				$this->load->view('administrator/header-script');
			   	$this->load->view('administrator/header');
			   	$this->load->view('administrator/header-bottom');
			   	$this->load->view('category/supplier_category/add', $data);
			   	$this->load->view('administrator/footer');	
			}else{
                $data = array(
                    'category' => $this->input->post('category'), 
                    'dyn_status' => $this->input->post('display')  ,

                    );

				$this->Supplier_category_Model->add($data);
			    //Set Message
			    $this->session->set_flashdata('success', ' Category Added Successfully.');
                redirect('category/category/supplier_category_lists');
            }
        }
        public function business_category_lists(){
            
            
                        $data['title'] = 'List of Business Categories';
                       
            
                        $data['business_category'] = $this->Business_category_Model->lists();
            
                        $this->load->view('administrator/header-script');
                        $this->load->view('administrator/header');
                        $this->load->view('administrator/header-bottom');
                        $this->load->view('category/business_category/list', $data);
                        $this->load->view('administrator/footer');
                    }
                    public function enable_busines_category($id)
                    {
                        $table = base64_decode($this->input->get('table'));
            
                        
                        $this->Business_category_Model->enable($id,$table);       
                        $this->session->set_flashdata('success', 'Disabled Successfully.');
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                    public function desable_business_category($id)
                    {
                        $table = base64_decode($this->input->get('table'));
                        //$table = $this->input->post('table');
                  
                        
                        $this->Business_category_Model->desable($id,$table);   
                        //echo $this->db->last_query();exit;    
                        $this->session->set_flashdata('success', 'Enabled Successfully.');
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }
                    function update_business_category($id){
                        
                        $data['title'] = 'Edit Business Category';
                        
                        $data['bus_categories'] = $this->Business_category_Model->get($id);
            
                        $this->form_validation->set_rules('category', 'Category', 'required');
            
                        if($this->form_validation->run() === FALSE){
                            $this->load->view('administrator/header-script');
                               $this->load->view('administrator/header');
                               $this->load->view('administrator/header-bottom');
                               $this->load->view('category/business_category/edit', $data);
                               $this->load->view('administrator/footer');	
                        }else{
                            $data = array(
                                'event_categories' => $this->input->post('category'), 
                                //'display' => $this->input->post('display'),
            
                                );
            
                            $this->Business_category_Model->update($data,$id);
                            //Set Message
                            $this->session->set_flashdata('success', 'Updated Successfully.');
                            redirect('category/category/business_category_lists');
                        }
                    }
                    public function delete_business_category($id)
                    {
                        $this->Business_category_Model->delete(array('display' => 2), $id);
                        $this->session->set_flashdata('message', 'Successfully deleted.');
                        redirect('category/category/business_category_lists', 'refresh');
                        
                    }
                    public function add_business_category(){
                        $data['title'] = 'Add Category';
                         $this->form_validation->set_rules('category', 'Category', 'required');
                        if($this->form_validation->run() === FALSE){
                            $this->load->view('administrator/header-script');
                               $this->load->view('administrator/header');
                               $this->load->view('administrator/header-bottom');
                               $this->load->view('category/business_category/add', $data);
                               $this->load->view('administrator/footer');	
                        }else{
                            $data = array(
                                'event_categories' => $this->input->post('category'), 
                                'display' => $this->input->post('display')  ,
            
                                );
            
                            $this->Business_category_Model->add($data);
                            //Set Message
                            $this->session->set_flashdata('success', ' Category Added Successfully.');
                            redirect('category/category/business_category_lists');
                        }
                    }
                    public function consumer_category_lists(){
                        ;
                        
                                    $data['title'] = 'List of Consumer Categories';
                                   
                        
                                    $data['consumer_category'] = $this->Consumer_category_Model->lists();
                        
                                    $this->load->view('administrator/header-script');
                                    $this->load->view('administrator/header');
                                    $this->load->view('administrator/header-bottom');
                                    $this->load->view('category/consumer_category/list', $data);
                                    $this->load->view('administrator/footer');
                                }
                                public function enable_consumer_category($id)
                                {
                                    $table = base64_decode($this->input->get('table'));
                        
                                    
                                    $this->Consumer_category_Model->enable($id,$table);       
                                    $this->session->set_flashdata('success', 'Disabled Successfully.');
                                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                                }
                                public function desable_consumer_category($id)
                                {
                                    $table = base64_decode($this->input->get('table'));
                                    //$table = $this->input->post('table');
                              
                                    
                                    $this->Consumer_category_Model->desable($id,$table);   
                                    //echo $this->db->last_query();exit;    
                                    $this->session->set_flashdata('success', 'Enabled Successfully.');
                                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                                }
                                function update_consumer_category($id){
                                    
                                    $data['title'] = 'Edit Consumer Category';
                                    
                                    $data['cons_categories'] = $this->Consumer_category_Model->get($id);
                        
                                    $this->form_validation->set_rules('category', 'Category', 'required');
                        
                                    if($this->form_validation->run() === FALSE){
                                        $this->load->view('administrator/header-script');
                                           $this->load->view('administrator/header');
                                           $this->load->view('administrator/header-bottom');
                                           $this->load->view('category/consumer_category/edit', $data);
                                           $this->load->view('administrator/footer');	
                                    }else{
                                        $data = array(
                                            'event_categories' => $this->input->post('category'), 
                                            //'display' => $this->input->post('display'),
                        
                                            );
                        
                                        $this->Consumer_category_Model->update($data,$id);
                                        //Set Message
                                        $this->session->set_flashdata('success', 'Updated Successfully.');
                                        redirect('category/category/consumer_category_lists');
                                    }
                                }
                                public function delete_consumer_category($id)
                                {
                                    $this->Consumer_category_Model->delete(array('display' => 2), $id);
                                    $this->session->set_flashdata('message', 'Successfully deleted.');
                                    redirect('category/category/consumer_category_lists', 'refresh');
                                    
                                }
                                public function add_consumer_category(){
                                    $data['title'] = 'Add Category';
                                     $this->form_validation->set_rules('category', 'Category', 'required');
                                    if($this->form_validation->run() === FALSE){
                                        $this->load->view('administrator/header-script');
                                           $this->load->view('administrator/header');
                                           $this->load->view('administrator/header-bottom');
                                           $this->load->view('category/consumer_category/add', $data);
                                           $this->load->view('administrator/footer');	
                                    }else{
                                        $data = array(
                                            'event_categories' => $this->input->post('category'), 
                                            'display' => $this->input->post('display')  ,
                        
                                            );
                        
                                        $this->Consumer_category_Model->add($data);
                                        //Set Message
                                        $this->session->set_flashdata('success', ' Category Added Successfully.');
                                        redirect('category/category/consumer_category_lists');
                                    }
                                }

                                function badge_lists(){
                                    $data['title'] = 'Badge';
                               
                    
                                    $data['badge'] = $this->Badge_Model->lists();
                        
                                    $this->load->view('administrator/header-script');
                                    $this->load->view('administrator/header');
                                    $this->load->view('administrator/header-bottom');
                                    $this->load->view('category/badge/list', $data);
                                    $this->load->view('administrator/footer');
                    
                                }
                                function add_badge(){
                                    $badge = $this->input->post('badge');
                                    $data['badge_details'] = $this->Badge_Model->lists();
                                    $badge_id = $data['badge_details']['0']['id'];
                                    $update_data =$this->Badge_Model->update_data(array('badge' => $badge),$badge_id);
                                    $this->session->set_flashdata('success', ' Badge Added Successfully.');
                                    redirect('category/category/badge_lists');
                                }  
                                function delete_badge($id){
                                    $update_data =$this->Badge_Model->update_data(array('badge' => ''),$id);
                                    $this->session->set_flashdata('success', ' Badge Deleted Successfully.');
                                    redirect('category/category/badge_lists');
                    
                    
                                }   
                                //mail templates 
                                function mail_lists(){
                                    $data['title'] = 'List of Mail Templates';
                                                       
                                            
                                    $data['mail_lists'] = $this->Mail_template_Model->lists();
                        
                                    $this->load->view('administrator/header-script');
                                    $this->load->view('administrator/header');
                                    $this->load->view('administrator/header-bottom');
                                    $this->load->view('category/mail_template/list', $data);
                                    $this->load->view('administrator/footer');
                                }
                                function view_mail($id){
                                    $data['get_header'] = $this->Mail_template_Model->get_header();
                                 
                                    $data['get_body'] = $this->Mail_template_Model->get_body($id);
                    
                                   // $this->load->view('administrator/header-script');
                                    //$this->load->view('administrator/header');
                                    //$this->load->view('administrator/header-bottom');
                                    $this->load->view('category/mail_template/view', $data);
                                    //$this->load->view('administrator/footer');
                    
                                }         
                                     function update_mail($id){
                                    $data['get_body'] = $this->Mail_template_Model->get_body($id);
                                     $this->load->view('administrator/header-script');
                                    $this->load->view('administrator/header');
                                    $this->load->view('administrator/header-bottom');
                                    $this->load->view('category/mail_template/edit_mail', $data);
                                    $this->load->view('administrator/footer');
                    
                                }
                                function delete_mail($id){
                                $table = base64_decode($this->input->get('table'));
                                //$table = $this->input->post('table');
                                $this->Mail_template_Model->delete($id,$table);       
                                $this->session->set_flashdata('success', 'Data has been deleted Successfully.');
                                header('Location: ' . $_SERVER['HTTP_REFERER']);
                                }
                                function update_content($id){
                                    $data = array(
                                        'body' => $this->input->post('mail_body'), 
                                        'category' => $this->input->post('category'),
                    
                                        );
                                        //print_r($_POST);exit();
                                    $this->Mail_template_Model->update($data,$id);
                                    //Set Message
                                    $this->session->set_flashdata('success', 'Updated Successfully.');
                                    redirect('category/category/mail_lists');
                                }
                                function add_mail(){
                                    $data['get_body'] = $this->Mail_template_Model->get_header();
                                    $this->load->view('administrator/header-script');
                                    $this->load->view('administrator/header');
                                    $this->load->view('administrator/header-bottom');
                                    $this->load->view('category/mail_template/add_mail', $data);
                                    $this->load->view('administrator/footer');
                                }
                                function save_content(){
                                    $data = array(
                                        'body' => $this->input->post('mail_body'), 
                                        'category' => $this->input->post('category'),
                    
                                        );
                                    $this->Mail_template_Model->save($data);
                                    //Set Message
                                    $this->session->set_flashdata('success', 'Added Successfully.');
                                    redirect('category/category/mail_lists');
                    
                                }
                    
                                //messages
                    
                                function message_lists(){
                                    $data['title'] = 'List of Messages';
                                    $data['message_lists'] = $this->Mail_template_Model->message_lists();
                                    $this->load->view('administrator/header-script');
                                    $this->load->view('administrator/header');
                                    $this->load->view('administrator/header-bottom');
                                    $this->load->view('category/message/list', $data);
                                    $this->load->view('administrator/footer');
                                }
                                function add_message(){
                                    $this->load->view('administrator/header-script');
                                    $this->load->view('administrator/header');
                                    $this->load->view('administrator/header-bottom');
                                    $this->load->view('category/message/add_message');
                                    $this->load->view('administrator/footer');
                                }
                                function save_message(){
                                    $data = array(
                                        'field' => $this->input->post('field'), 
                                        'message' => $this->input->post('message_body'),
                                        'status' => 1
                    
                                        );
                                    $this->Mail_template_Model->save_message($data);
                                    //Set Message
                                    $this->session->set_flashdata('success', 'Added Successfully.');
                                    redirect('category/category/message_lists');
                    
                                }
                                function update_message($id){
                                    $data['get_message'] = $this->Mail_template_Model->get_message($id);
                                     $this->load->view('administrator/header-script');
                                    $this->load->view('administrator/header');
                                    $this->load->view('administrator/header-bottom');
                                    $this->load->view('category/message/edit_message', $data);
                                    $this->load->view('administrator/footer');
                    
                                }
                                function update_message_content($id){
                                    $data = array(
                                        'field' => $this->input->post('field'), 
                                        'message' => $this->input->post('message'),
                    
                                        );
                                        //print_r($_POST);exit();
                                    $this->Mail_template_Model->update_message($data,$id);
                                    //Set Message
                                    $this->session->set_flashdata('success', 'Updated Successfully.');
                                    redirect('category/category/message_lists');
                                }
                                
                                           
                                       
                                                  
                                       
                                      
                               
                   
                  
       
      
		}
