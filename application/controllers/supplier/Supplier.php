<?php
defined('BASEPATH') or exit('No direct script access allowed');
	class Supplier extends CI_Controller
	{
		
	 public function __construct()
		{
			parent::__construct();
			
			if($this->session->userdata('admin_logged')==false) {
				redirect('Supplier');
			}
			$this->load->model('Supplier_Model');
			
		}
		public function lists($offset = null)
		{
			
			$data['title'] = 'List of Roles';
			$data['cat'] = $this->Supplier_Model->selectCategory();

			if($offset==null)
			{
				$data['s']="no";
				$data['supplier'] = $this->Supplier_Model->lists();
			}
			else
			{
				$data['s']=$offset;
				$data['supplier'] = $this->Supplier_Model->listsbyCategoryId($offset);
			}

			

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('supplier/list', $data);
			$this->load->view('administrator/footer');
        }

     

        //Manuja Edited =====================

           public function deleteStoreFront($id=null)
      {
      	if(!empty($id))
      	{
      		$id=base64_decode($id);
      	}

      		$businessid=$this->Supplier_Model->Select_businessid($id);
      		
      		$businesscount=$this->Supplier_Model->Select_businesscount($businessid[0]->business_id);

      		
      		
      		if($businesscount>1)
      		{
      			$c=0;
      		}
      		else
      		{
      			$c=1;
      		}
      		$result= $this->Supplier_Model->deleteStoreFront($id,$c,$businessid);

      		if($result){
					$this->session->set_flashdata('success', 'Store Front  has been deleted.');
					redirect('supplier/create/listOfStorefront', 'refresh');

				}
				else{
					$this->session->set_flashdata('error', 'Something went wrong.');
					redirect('supplier/create/listOfStorefront', 'refresh');

					
				}
      }

      

       public function badge($switchid=null)
      {
      	if(!empty($switchid))
      	{
      		$switchid=base64_decode($switchid);
      	}
      	$data['title'] = 'Badge';

      	$data['switchid']=$switchid;
        $data['budge'] = $this->Supplier_Model->selectBadge();
         $this->load->view('admin/includes/header', $data);
		$this->load->view('admin/includes/mainmenu', $data);
        $this->load->view('admin/viewBadge',$data );
        $this->load->view('admin/includes/footer');;

      }

      // Jisha Edited===============

      function change_password(){
	  //print_r($_SESSION);
      	$data['title'] = 'Change Password';
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/includes/mainmenu', $data);
		$this->load->view('admin/change_password');
		$this->load->view('admin/includes/footer');


	}
	
	function new_password(){
		$supplier_id = $this->session->userdata('supplier_id');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		$oldpassword=$this->input->post('oldpassword');
		
		$old_password = $this->Supplier_Model->old_password($oldpassword,$supplier_id);
		if($old_password==true)
		{
		if ($this->form_validation->run() === FALSE)
	    {
	        redirect('supplier/supplier/change_password', 'refresh');
		}
		else{
			
			$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
			$data = array(

	    		'password' => $password
				
			 );
			 
			 $change_password = $this->Supplier_Model->change_password($data,$supplier_id);
			 if($change_password)
			 {
	        	$this->session->set_flashdata('success','<div class="row success_div" id="success" ><span class="input-error successfn" style="">Password sucessfully changed</span></div></br><br/>');

	        	redirect('supplier/supplier/change_password', 'refresh');
	        }
	        else{
	        	$this->session->set_flashdata('success','<div class="row success_div" id="success" ><span class="input-error successfn" style="">Something went wrong...</span></div></br><br/>');
	        	redirect('supplier/supplier/change_password', 'refresh');
	        }

		}
		}
		else
		{
	        	$this->session->set_flashdata('success','<div class="row success_div" id="success" ><span class="input-error successfn" style="">Old password not matching</span></div></br><br/>');

	        	redirect('supplier/supplier/change_password', 'refresh');
		}

	}

	//Manuja edited

	//For gallery reordering

	public function change_order($orders=null)
     {
     	
     		$order  = explode(",",$orders);
     		$j=1;
			for($i=0; $i < count($order); $i++) {

					

					$data[$i]['id'] =$order[$i];
					$data[$i]['display_order'] =$j;

			
			    $j=$j+1;
			
     		}
     		

 				$res = $this->Supplier_Model->change_order($data);
    	 
     } 
	
      
      
		}
