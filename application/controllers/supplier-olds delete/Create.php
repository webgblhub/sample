<?php
defined('BASEPATH') or exit('No direct script access allowed');
	class Create extends CI_Controller
	{
		
	 	public function __construct()
		{
			parent::__construct();
			
			if($this->session->userdata('admin_logged')==false) {
				redirect('admin');
			}
			$this->load->model('Supplier_Model');
			$this->load->model('Create_Model');
			$this->load->model(array(
			'State_Model','Consumer_category_Model','Business_category_Model','Edit_Model'));
			
		}
		
		public function index()
		{
			$data['title'] = 'DashBoard';
			//echo $this->input->get['ser'];exit;
			$data['results'] = $this->Create_Model->search();
			//echo $this->db->last_query();exit;
			$data['genders'] = $this->Create_Model->getGender();
			//echo $this->db->last_query();exit;
			$data['ages'] = $this->Create_Model->getAge();
			//echo $this->db->last_query();exit;
			$this->load->view('admin/theme/header', $data);
			$this->load->view('admin/dashboard' , $data);
			$this->load->view('admin/theme/footer');
		}

//Used For Create New Store Front

		public function addStoreFront($switchid=null,$catiid=null)
		{

			$data['title'] = 'Add New Bussiness';
			$data['supplier_id']=$this->session->userdata('supplier_id');
			$id=$data['supplier_id'];
			if(!empty($switchid))
			{
				$data['switchid']=$switchid;
				$data['category_id']=$catiid;
				$categoryies=$this->Edit_Model->selectSupplierid($switchid);

	//Select Already Added Details

				$data['allselect']=$this->Edit_Model->selectBusinessInfo($switchid);
				if(!empty($data['allselect'][0]->cityid))
			{
				$data['city1']=$this->Edit_Model->selectCityName($data['allselect'][0]->cityid);
				
			}
			}
	//Select login user bussiness details

			$data['business']=$this->Create_Model->selectBusinessInfo($id);
			
			if(!empty($data['business']))
			{
			$data['city']=$this->Edit_Model->selectCityName($data['business'][0]->cityid); }
			$data['states']=$this->State_Model->listsofState();					//Select state
			$data['weekdays']=$this->Create_Model->product_weekdays();			//Select Days
			$data['months']=$this->Create_Model->product_months();				//Select Month
			$data['cat'] = $this->Supplier_Model->selectCategory();          //Select all storefronts
			$data['business_cat']=$this->Business_category_Model->lists();	//Select Business Category
			$data['consumer_cat']=$this->Consumer_category_Model->lists();	//Select Consuner Category
			$data['discount_types']=$this->Create_Model->discounts();		//Select Discount Types

			$data['supplier_id']=$id;

	
			if(!empty($data['business']))
			{
				$data['available']="1";

				$this->load->view('admin/includes/header', $data);
				$this->load->view('admin/includes/mainmenu', $data);
				$this->load->view('admin/business_info' , $data);
				$this->load->view('admin/includes/footer', $data);

				
			}
			else
			{
				$data['available']="0";

				$this->load->view('admin/includes/header', $data);
				$this->load->view('admin/includes/mainmenu', $data);
				$this->load->view('admin/business_info' , $data);
				$this->load->view('admin/includes/footer', $data);
			}
		
		}


// Add bussiness details

		public function addBusiness()
		{
			$suppler_id=$this->input->post('supplier_id');
			
			$ssid=$this->input->post('switch');
			$caid=$this->Edit_Model->selectSupplierid($ssid);
	// If we click check box for use same business info,  that details	are save in this if condition	
			if($this->input->post('same')==1)
			{
				
				$cityid=$this->input->post('cityname');
					if(!empty($cityid))
						{
						
							$latitude=$this->input->post('latit');
							$longitude=$this->input->post('longt');
						}
				else
						{
							$latitude="";
							$longitude="";
							
						}


				$name =  $this->input->post('namefirst');
				$certi =  $this->input->post('certi');
				$defult_certi=$this->input->post('defult_certi');
				
				$fr = uniqid($name);
				//Check file is empty or not

				if (!empty($_FILES['certi']['name'])) {
				$config['upload_path'] = 'uploads/business_info';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				
				$config['file_name'] = $fr;

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				//Certificate File upload
				if ($this->upload->do_upload('certi')) 
				{
					$uploadData = $this->upload->data();
					
					$sp_image = $uploadData['file_name'];
				} else 
				{
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					
				}
			} else {
				
				$sp_image = $defult_certi;
			}

				$name =  $this->input->post('namefirst');
				$insurance =  $this->input->post('insurance');
				$defult_insur=$this->input->post('defult_insur');
				$fr = uniqid($name);
				//Check insurance is empty or not

				if (!empty($_FILES['insurance']['name'])) {
				$config['upload_path'] = 'uploads/business_info';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				
				$config['file_name'] = $fr;

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				//Insurance file upload
				if ($this->upload->do_upload('insurance')) {
					$uploadData = $this->upload->data();
					
					$p_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					
				}
			} else {
				$p_image = $defult_insur;
			}


			// get consumer accepected category

						$con['c']=$this->input->post('accept_cons');

						if(!empty($con['c']))
						{
							$co=count($con['c']);
							if($co>0)
							{
								for($i=0;$i<$co;$i++)
								{
									if($i==0)
									{
										$cons=$con['c'][$i];
			
									}
									else
									{
										$cons=$cons.'<>'.$con['c'][$i];
									}
									
								}
							}
						}
						else
						{
							$cons="";
						}

						// get business accepected category

						$bis['b']=$this->input->post('accept_business');
						if(!empty($bis['b']))
						{
						$bi=count($bis['b']);
							if($bi>0)
							{
								for($i=0;$i<$bi;$i++)
								{
									if($i==0)
									{
										$busin=$bis['b'][$i];

									}
									else
									{
										$busin=$busin.'<>'.$bis['b'][$i];
									}
									
								}
							}
						}
						else
						{
							$busin="";
						}


						if($this->input->post('national')==1)
						{
							$nation=1;
						}
						else
						{
							$nation=0;
						}

			
			if(!empty($this->input->post('switch')))
			{
				$switching=$this->input->post('switch');
				$bussi=$this->Edit_Model->selectSupplierid($switching);

				$datas=array(
							'id'				=>		$bussi[0]->business_id,
							'supplier_id' 		=>		$this->input->post('supplier_id'),
							'prefix' 			=>		$this->input->post('prefix'),
							'first_name' 		=>		$this->input->post('namefirst'),
							'last_name' 		=>		$this->input->post('namelast'),
							'company_name' 		=>		$this->input->post('namecompany'),
							'email' 			=>		$this->input->post('mailaddr'),
							'mobile' 			=>		$this->input->post('mob'),
							'telephone' 		=>		$this->input->post('tele'),
							
							'ext' 				=>		$this->input->post('tele_ext'),
							'fax' 				=>		$this->input->post('fax'),
							'address' 			=>		$this->input->post('addr'),
							'address2' 			=>		$this->input->post('addr2'),
							'stateid' 			=>		$this->input->post('state'),
							'cityid' 			=>		$this->input->post('cityname'),
							'latitude'			=>		$latitude,
							'longitude'			=>		$longitude,
							'zipcode' 			=>		$this->input->post('buszip'),
							'consumer_event' 	=>		$cons,
							'business_event' 	=>		$busin,
							'travel_miles' 		=>		$this->input->post('traval'),
							'dynamic_classification' =>	$this->input->post('dymanic'),
							'nationalwide' 			 => $nation,
							'insurance' 			 =>		$p_image,
							'certification' 		 =>		$sp_image,
							'discount_multi_type' =>$this->input->post('multi_type'),
							'multi_discount_amount'=>$this->input->post('multi_amount'),

							'discount_day_type' =>$this->input->post('days_type'),
							'discount_days_amt'=>$this->input->post('days_amount'),
							'days' => $this->input->post('days_peak'),

							'discount_month_type' =>$this->input->post('month_type'),
							'discount_month_amt' =>$this->input->post('month_amount'),
							'month' => $this->input->post('month_peak'),

							
						);

				// Already available update that values

				$update=$this->Edit_Model->editBusinessInfo($datas);
				$result=$bussi[0]->business_id;

			}
			else
			{
				$data=array(
							'supplier_id' 		=>		$this->input->post('supplier_id'),
							'prefix' 			=>		$this->input->post('prefix'),
							'first_name' 		=>		$this->input->post('namefirst'),
							'last_name' 		=>		$this->input->post('namelast'),
							'company_name' 		=>		$this->input->post('namecompany'),
							'email' 			=>		$this->input->post('mailaddr'),
							'mobile' 			=>		$this->input->post('mob'),
							'telephone' 		=>		$this->input->post('tele'),
							
							'ext' 				=>		$this->input->post('tele_ext'),
							'fax' 				=>		$this->input->post('fax'),
							'address' 			=>		$this->input->post('addr'),
							'address2' 			=>		$this->input->post('addr2'),
							'stateid' 			=>		$this->input->post('state'),
							'cityid' 			=>		$this->input->post('cityname'),
							'latitude'			=>		$latitude,
							'longitude'			=>		$longitude,
							'zipcode' 			=>		$this->input->post('buszip'),
							'consumer_event' 	=>		$cons,
							'business_event' 	=>		$busin,
							'travel_miles' 		=>		$this->input->post('traval'),
							'dynamic_classification' =>	$this->input->post('dymanic'),
							'nationalwide' 			 => $nation,
							'insurance' 			 =>		$p_image,
							'certification' 		 =>		$sp_image,
							'discount_multi_type' =>$this->input->post('multi_type'),
							'multi_discount_amount'=>$this->input->post('multi_amount'),

							'discount_day_type' =>$this->input->post('days_type'),
							'discount_days_amt'=>$this->input->post('days_amount'),
							'days' => $this->input->post('days_peak'),

							'discount_month_type' =>$this->input->post('month_type'),
							'discount_month_amt' =>$this->input->post('month_amount'),
							'month' => $this->input->post('month_peak'),

							
						);
				//Add bussiness info

		
				$result=$this->Create_Model->addBusinessInfo($data);
			}

			//Update storefront_bussiness table with business id

			if($result){

				if(!empty($this->input->post('switch')))
				{

							$business=array(

										'id' =>$this->input->post('switch'),

										'business_id' 	=>	$result,
										
									);
				}
				else{

						$business=array(

										'id' =>$this->session->userdata('switch_id'),

										'business_id' 	=>	$result,
										
									);

				}			
							$res=$this->Create_Model->updateBusinessstoreFront($business);

							$store=$this->Create_Model->selectSwitchid($result);

 // Add consumer category for another table for normalization

			$con1['c']=$this->input->post('accept_cons');

			if(!empty($con1['c']))
			{
				$co=count($con1['c']);
					if($co>0)
					{
					$cons=array();
					for($i=0;$i<$co;$i++)
					{
						
							$cons[$i]['switchid'] = $store[0]->id;
							$cons[$i]['eventid'] = $con1['c'][$i];
	
					}
				$rr=$this->Create_Model->addSelectedEvents('selected_consumerevent',$cons);

				}
			}
			
// Add business category for another table for normalization

		$bis1['b']=$this->input->post('accept_business');
		if(!empty($bis1['b']))
		{
			$bi=count($bis1['b']);
				if($bi>0)
				{

				$busin=array();
				for($i=0;$i<$bi;$i++)

					
				{
					$busin[$i]['switchid'] = $store[0]->id;
						$busin[$i]['eventid'] = $bis1['b'][$i];
	
				}
			$rr=$this->Create_Model->addSelectedEvents('selected_bussinessevent',$busin);
			}
		}
		


				$categoryies=$this->Edit_Model->selectSupplierid($res);

						$this->session->set_flashdata('success', 'Supplier  buissness Info has been Added.');
						redirect('supplier/create/addStoreFront/'.$store[0]->id.'/'.$store[0]->category_id, 'refresh');

					}
					else
					{
						$this->session->set_flashdata('success', 'Something went wrong.');
						redirect('supplier/create/addStoreFront/', 'refresh');

						
					}




			}

			// Not check check box for use same business info
			else
			{

				$cityid=$this->input->post('city_id');
				if(!empty($cityid))
				{
				
				$latitude=$this->input->post('latitude');
				$longitude=$this->input->post('longitude');
				}
				else
				{
					$latitude="";
					$longitude="";
					
				}
			 


				$name =  $this->input->post('first_name');
				$certify =  $this->input->post('certify');
			
				$fr = uniqid($name);
				if (!empty($_FILES['certify']['name'])) {
				$config['upload_path'] = 'uploads/business_info';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				
				$config['file_name'] = $fr;

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('certify')) {
					$uploadData = $this->upload->data();
					
					$sp_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					
				}
			} else {
				$sp_image = $certify;
			}

			$name =  $this->input->post('first_name');
			$photo =  $this->input->post('photo');

			$fr = uniqid($name);
			if (!empty($_FILES['photo']['name'])) {
				$config['upload_path'] = 'uploads/business_info';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				
				$config['file_name'] = $fr;

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('photo')) {
					$uploadData = $this->upload->data();
					
					$p_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					
				}
			} else {
				$p_image = $photo;
			}


				$con['c']=$this->input->post('cons_accept');

				if(!empty($con['c']))
				{
				$co=count($con['c']);
					if($co>0)
					{
						for($i=0;$i<$co;$i++)
						{
							if($i==0)
							{
								$cons=$con['c'][$i];

							}
							else
							{
								$cons=$cons.'<>'.$con['c'][$i];
							}
							
						}
					}
				}
				else
				{
					$cons="";
				}


				$bis['b']=$this->input->post('business_accept');
				if(!empty($bis['b']))
				{
				$bi=count($bis['b']);
					if($bi>0)
					{
						for($i=0;$i<$bi;$i++)
						{
							if($i==0)
							{
								$busin=$bis['b'][$i];

							}
							else
							{
								$busin=$busin.'<>'.$bis['b'][$i];
							}
							
						}
					}
				}
				else
				{
					$busin="";
				}



	if($this->input->post('nationalwide')==1)
	{
		$nation=1;
	}
	else
	{
		$nation=0;
	}

if(!empty($this->input->post('switch')))
			{
				$switching=$this->input->post('switch');

				$bussi=$this->Edit_Model->selectSupplierid($switching);

				if(!empty($bussi[0]->business_id))
				{

				$datas=array(
							'id'				=>		$bussi[0]->business_id,
							'supplier_id' 		=>		$this->input->post('supplier_id'),
							'prefix' 			=>		$this->input->post('name_prefix'),
							'first_name' 		=>		$this->input->post('first_name'),
							'last_name' 		=>		$this->input->post('last_name'),
							'company_name' 		=>		$this->input->post('Company_name'),
							'email' 			=>		$this->input->post('mail_address'),
							'mobile' 			=>		$this->input->post('mobile_number'),
							'telephone' 		=>		$this->input->post('landline_number'),
							
							'ext' 				=>		$this->input->post('landline_number_ext'),
							'fax' 				=>		$this->input->post('fax_number'),
							'address' 			=>		$this->input->post('address1'),
							'address2' 			=>		$this->input->post('address2'),
							'stateid' 			=>		$this->input->post('State_id'),
							'cityid' 			=>		$this->input->post('city_id'),
							'latitude'			=>		$latitude,
							'longitude'			=>		$longitude,
							'zipcode' 			=>		$this->input->post('zipcode'),
							'consumer_event' 	=>		$cons,
							'business_event' 	=>		$busin,
							'travel_miles' 		=>		$this->input->post('accepteble_travel_miles'),
							'dynamic_classification' =>	$this->input->post('dynamic_classification'),
							'nationalwide' 			 => $nation,
							'insurance' 			 =>		$p_image,
							'certification' 		 =>		$sp_image,
							'discount_multi_type' =>$this->input->post('dis_multi_type'),
							'multi_discount_amount'=>$this->input->post('amount'),

							'discount_day_type' =>$this->input->post('dis_day_type'),
							'discount_days_amt'=>$this->input->post('discount_days_amt'),
							'days' => $this->input->post('peakdays'),

							'discount_month_type' =>$this->input->post('dis_month_type'),
							'discount_month_amt' =>$this->input->post('discount_month_amt'),
							'month' => $this->input->post('peakmonths'),

							
						);

				$update=$this->Edit_Model->editBusinessInfo($datas);
				$result=$bussi[0]->business_id;

			}
			else
			{

				$data=array(
							'supplier_id' 		=>		$this->input->post('supplier_id'),
							'prefix' 			=>		$this->input->post('name_prefix'),
							'first_name' 		=>		$this->input->post('first_name'),
							'last_name' 		=>		$this->input->post('last_name'),
							'company_name' 		=>		$this->input->post('Company_name'),
							'email' 			=>		$this->input->post('mail_address'),
							'mobile' 			=>		$this->input->post('mobile_number'),
							'telephone' 		=>		$this->input->post('landline_number'),
							
							'ext' 				=>		$this->input->post('landline_number_ext'),
							'fax' 				=>		$this->input->post('fax_number'),
							'address' 			=>		$this->input->post('address1'),
							'address2' 			=>		$this->input->post('address2'),
							'stateid' 			=>		$this->input->post('State_id'),
							'cityid' 			=>		$this->input->post('city_id'),
							'latitude'			=>		$latitude,
							'longitude'			=>		$longitude,
							'zipcode' 			=>		$this->input->post('zipcode'),
							'consumer_event' 	=>		$cons,
							'business_event' 	=>		$busin,
							'travel_miles' 		=>		$this->input->post('accepteble_travel_miles'),
							'dynamic_classification' =>	$this->input->post('dynamic_classification'),
							'nationalwide' 			 => $nation,
							'insurance' 			 =>		$p_image,
							'certification' 		 =>		$sp_image,
							'discount_multi_type' =>$this->input->post('dis_multi_type'),
							'multi_discount_amount'=>$this->input->post('amount'),

							'discount_day_type' =>$this->input->post('dis_day_type'),
							'discount_days_amt'=>$this->input->post('discount_days_amt'),
							'days' => $this->input->post('peakdays'),

							'discount_month_type' =>$this->input->post('dis_month_type'),
							'discount_month_amt' =>$this->input->post('discount_month_amt'),
							'month' => $this->input->post('peakmonths'),

							
						);
			
			$result=$this->Create_Model->addBusinessInfo($data);
			}
		}
		
		else
			{

				$data=array(
							'supplier_id' 		=>		$this->input->post('supplier_id'),
							'prefix' 			=>		$this->input->post('name_prefix'),
							'first_name' 		=>		$this->input->post('first_name'),
							'last_name' 		=>		$this->input->post('last_name'),
							'company_name' 		=>		$this->input->post('Company_name'),
							'email' 			=>		$this->input->post('mail_address'),
							'mobile' 			=>		$this->input->post('mobile_number'),
							'telephone' 		=>		$this->input->post('landline_number'),
							
							'ext' 				=>		$this->input->post('landline_number_ext'),
							'fax' 				=>		$this->input->post('fax_number'),
							'address' 			=>		$this->input->post('address1'),
							'address2' 			=>		$this->input->post('address2'),
							'stateid' 			=>		$this->input->post('State_id'),
							'cityid' 			=>		$this->input->post('city_id'),
							'latitude'			=>		$latitude,
							'longitude'			=>		$longitude,
							'zipcode' 			=>		$this->input->post('zipcode'),
							'consumer_event' 	=>		$cons,
							'business_event' 	=>		$busin,
							'travel_miles' 		=>		$this->input->post('accepteble_travel_miles'),
							'dynamic_classification' =>	$this->input->post('dynamic_classification'),
							'nationalwide' 			 => $nation,
							'insurance' 			 =>		$p_image,
							'certification' 		 =>		$sp_image,
							'discount_multi_type' =>$this->input->post('dis_multi_type'),
							'multi_discount_amount'=>$this->input->post('amount'),

							'discount_day_type' =>$this->input->post('dis_day_type'),
							'discount_days_amt'=>$this->input->post('discount_days_amt'),
							'days' => $this->input->post('peakdays'),

							'discount_month_type' =>$this->input->post('dis_month_type'),
							'discount_month_amt' =>$this->input->post('discount_month_amt'),
							'month' => $this->input->post('peakmonths'),

							
						);
			
			$result=$this->Create_Model->addBusinessInfo($data);
			}
//Update storefront_bussiness table with business id
			
			if($result){
						if(!empty($this->input->post('switch')))
						{

							$business=array(

											'id' =>$this->input->post('switch'),

											'business_id' 	=>	$result,
											
										);
					}
					else{

						$business=array(

										'id' =>$this->session->userdata('switch_id'),

										'business_id' 	=>	$result,
										
									);

				}

				$res=$this->Create_Model->updateBusinessstoreFront($business);

				$store=$this->Create_Model->selectSwitchid($result);

// Add consumer category for another table for normalization

		$con1['c']=$this->input->post('cons_accept');

		if(!empty($con1['c']))
		{
				$co=count($con1['c']);
				if($co>0)
				{
					$cons=array();
					for($i=0;$i<$co;$i++)
					{
						
						$cons[$i]['switchid'] = $store[0]->id;
						$cons[$i]['eventid'] = $con1['c'][$i];
						
						
					}
				//print_r($cons);die;
				$rr=$this->Create_Model->addSelectedEvents('selected_consumerevent',$cons);
				}
		}
		
// Add business category for another table for normalization

		$bis1['b']=$this->input->post('business_accept');
		if(!empty($bis1['b']))
		{
		$bi=count($bis['b']);
		if($bi>0)
		{
				$busin=array();
					for($i=0;$i<$bi;$i++)

					{

					$busin[$i]['switchid'] = $store[0]->id;
					$busin[$i]['eventid'] = $bis1['b'][$i];
					
					
					}

			$rr=$this->Create_Model->addSelectedEvents('selected_bussinessevent',$busin);
			}
		}


			
							$categoryies=$this->Edit_Model->selectSupplierid($res);

						$this->session->set_flashdata('success', 'Supplier  buissness Info has been Added.');
						redirect('supplier/create/addStoreFront/'.$store[0]->id.'/'.$store[0]->category_id, 'refresh');

					}
					else
					{
						$this->session->set_flashdata('success', 'Something went wrong.');
						redirect('supplier/create/addStoreFront/', 'refresh');

						
					}


		 }
	}	

// Add business details to storefront table
		public function addBusinessStore($s=null,$b=null,$c=null)
		{
			$business=array(

										'business_id' 	=>	$b,
										'supplier_id'	=>	$s,
										'category_id'	=>	$c,	
									);
				$res=$this->Create_Model->addBusinessstoreFront($business);
				$this->session->set_flashdata('success', 'Supplier  buissness Info has been Added.');
				redirect('supplier/create/promoinfo/'.$c.'/'.$res, 'refresh');		
				
		}

//function for Add new Store front 
		public function addNewStorefront($bist=null)
		{
						$business=array(

										
										'supplier_id'	=>	$this->session->userdata('supplier_id'),
										'category_id'	=>	$bist,	
									);
				$res=$this->Create_Model->addBusinessstoreFront($business);

				$dd['y']=array('sw'=>$res,
								'cat'=>$bist);

				$this->session->set_userdata('switch_id', $res);
				//echo json_decode($dd);

				echo "<ul class='navbar-nav'>";
				 echo "<li class='nav-item' >";
		    		echo "<a class='nav-link'  id='dash-link'  href='".base_url('supplier/create')."'>Dashboard</a>";
		    		echo " <div class='linkline'></div>";
		 		echo "</li>";
		  		echo "<li class='nav-item active' id='dash-link-sub' >";
		    		echo "<a class='nav-link' id='dash-link-sub-link'  href='".base_url('supplier/create/addStoreFront/'.$res.'/'.$bist)."'>Basic Info</a>";
		    		echo " <div class='line'></div>";
		 		echo "</li>";

		  		echo "<li class='nav-item' id='dash-link-sub' >";
		   		 	echo "<a class='nav-link' id='dash-link-sub-link' href='".base_url('supplier/create/promoinfo/'.$res.'/'.$bist)."'>Public Promo</a>";
		   		 	echo " <div class='linkline'></div>";
			 	echo "</li>";

			 	echo "<li class='nav-item' id='dash-link-sub'>";
		    		echo "<a class='nav-link' id='dash-link-sub-link'  href='".base_url('supplier/create/add_bankdetail/'.$res.'/'.$bist)."'>Bank Info</a>";
		    		echo " <div class='linkline'></div>";
		 		echo "</li>";

		  		echo "<li class='nav-item' id='dash-link-sub' >";
		    		echo "<a class='nav-link' id='dash-link-sub-link'  href='".base_url('supplier/create/add_productpackages/'.$res.'/'.$bist)."'>Product</a>";
		    		echo " <div class='linkline'></div>";
		 		echo "</li>";

		 		echo "<li class='nav-item dropdown' id='dash-link-sub'>";
                    echo "<a class='nav-link dropdown-toggle dash-link-sub-link' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Gallery</a>";
                    echo "<div class='linkline'></div>";
                    echo "<div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";
                      echo "<div>";
                      echo "<a class='dropdown-item' id='dash-link-sub-link' href='#'>Photo Gallery</a>";
                      echo "</div>";
                      echo "<a class='dropdown-item' href='#'>Video Gallery</a>";
                     
                    echo "</div>";
                 echo " </li>";


		  		echo "<li class='nav-item'id='dash-link-sub'>";
		    		echo "<a class='nav-link' id='dash-link-sub-link' href='#'>Calendar</a>";
		    		echo " <div class='linkline'></div>";
		 		echo "</li>";

		  	echo "<li class='nav-item' id='dash-link-sub' >";
		    	echo "<a class='nav-link' id='dash-link-sub-link' href='#'>Badges</a>";
		    	echo " <div class='linkline'></div>";
		 	echo "</li>";

		 	echo "<li class='nav-item' id='dash-link-sub' >";
		    	echo "<a class='nav-link' id='dash-link-sub-link' href='".site_url('admin/logout')."'>Logout</a>";
		    	echo " <div class='linkline'></div>";
		 	echo "</li>";

		 	 
		 echo "</ul>";

  
	}

//Select List of store front for created by logined supplier

		public function listOfStorefront()
		{
			$data['title'] = 'List Of Store Front';
			$data['supplier_id']=$this->session->userdata('supplier_id');
			$id=$data['supplier_id'];
			$t=0;

			$data['store']=$this->Supplier_Model->selectStoreFront($id);
			foreach ($data['store'] as $st) {
				
				
			$data['count'][$t]=$this->Create_Model->selectProfileStatus($st->storeid);
			$t++;
		}

			$this->load->view('admin/theme/header', $data);
			$this->load->view('admin/listOfStorefront' , $data);
			$this->load->view('admin/theme/footer');
		}

		
		  public function selectCityName($id)
   {
   	$data['city']=$this->Edit_Model->selectCityName($id);
   	echo "<input type='hidden' name='citynameassign' value='".$data['city'][0]->name."' id='citynameassign'>";
   }

   public function selectCityName2($id)
   {
   	$data['city']=$this->Edit_Model->selectCityName($id);
   	echo "<input type='hidden' name='citynameassignall' value='".$data['city'][0]->name."' id='citynameassignall'>";
   }

//========================================= ASISH   product packages=================================

public function add_productpackages($switchid='',$catid="")
	{
		$data2['title'] = 'Add Product Details';
		$userid=$this->session->userdata('supplier_id');
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('product_name', 'product_name', 'trim');

		if ($this->form_validation->run() === FALSE) {
			@$data2['service'] = $this->Edit_Model->getDatap('supplier_product_packages', $switchid);
			$data2['weekdays']=$this->Create_Model->product_weekdays();
			$data2['months']=$this->Create_Model->product_months();
			$data2['suppcategory']=$this->Create_Model->getCatId($catid);
			$data2['discount_types']=$this->Create_Model->discounts();
			$data2['culturals']=$this->Create_Model->culturals();
			$data2['denominations']=$this->Create_Model->denominations();
			$data2['languages']=$this->Create_Model->languages();
			$data2['sports']=$this->Create_Model->sports();
			//print_r($data2['category']);
			//echo $this->db->last_query();
//			$this->load->view('administrator/header-script');
//			$this->load->view('administrator/header');
//			$this->load->view('administrator/header-bottom');
//			$this->load->view('supplier/productpackages',@$data2);
//			$this->load->view('administrator/footer');
			
			$this->load->view('admin/includes/header', $data2);
				$this->load->view('admin/includes/mainmenu', $data2);
			$this->load->view('admin/productpackages', $data2);
			$this->load->view('admin/includes/footer');
			
		} else {
			@$data2['service'] = $this->Edit_Model->getDatap('supplier_product_packages', $switchid);
			$data2['weekdays']=$this->Create_Model->product_weekdays();
			$data2['months']=$this->Create_Model->product_months();
			$data2['suppcategory']=$this->Create_Model->getCatId($catid);
			$data2['discount_types']=$this->Create_Model->discounts();
			$data2['culturals']=$this->Create_Model->culturals();
			$data2['denominations']=$this->Create_Model->denominations();
			$data2['languages']=$this->Create_Model->languages();
			$data2['sports']=$this->Create_Model->sports();
			//$personal =  $this->input->post('pro_image');
			$name =  $this->input->post('product_name');
			$promid =  $this->input->post('promid');
			$busid =  $this->input->post('busid');
			$fr = uniqid($name);
			// print_r($bus );exit();
			if (!empty($_FILES['pro_image']['name'])) {
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				//$config['encrypt_name'] = TRUE;
				$config['file_name'] = $fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('pro_image')) {
					$uploadData = $this->upload->data();
					// unlink("assets/Profile/".$pic);
					$p_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('err', 'Unable  to upload file ,plz try again');
					redirect('supplier/create/add_productpackages/'.$catid."/".$switchid);
				}
				
				$data = array(

				//'users_id' => $this->session->userdata('admin_id'),
				//'scid' => $this->input->post('scid'),
				//'id' => $this->input->post('id'),
				//'promid' => $this->input->post('promid'),
				'supplier_id' => $userid,
				'category_id' => $catid,
				'switch_id' => $switchid,
				'product_name' =>  $this->input->post('product_name'),
				'product_number' =>  $this->input->post('product_number'),
				'price' => $this->input->post('product_price'),
				'description' => $this->input->post('product_detail'),
				'video' => $this->input->post('product_video'),
				// 'discount' => $this->input->post('discount'),
				// 'minimum' => $this->input->post('minimum'),
				// 'maximum' => $this->input->post('maximum'),
				// 'cost' => $this->input->post('cost'),
				// 'style' => $this->input->post('style'),
				// 'discount_days_amt' =>$this->input->post('discount_days_amt'),
				// 'discount_month_amt' =>$this->input->post('discount_month_amt'),
				// 'peakdays' => $this->input->post('peakdays'),
				// 'peakmonths' => $this->input->post('peakmonths'),

				'discount_multi_type' =>$this->input->post('dis_multi_type'),
				'multi_discount_amount'=>$this->input->post('amount'),

				'discount_day_type' =>$this->input->post('dis_day_type'),
				'discount_days_amt'=>$this->input->post('discount_days_amt'),
				'days' => $this->input->post('peakdays'),

				'discount_month_type' =>$this->input->post('dis_month_type'),
				'discount_month_amt' =>$this->input->post('discount_month_amt'),
				'month' => $this->input->post('peakmonths'),
				
				'sports_category' => $this->input->post('category'),
				'ethinicity' => $this->input->post('ethnicity'),
				'denomination' => $this->input->post('denomination'),
				'language' => $this->input->post('language'),
				// 'lowest' => $this->input->post('lowest'),
				// 'highest' => $this->input->post('highest'),
				// 'average' => $this->input->post('average'),
				'image' => @$p_image,
				// 'flat_amount'=>$this->input->post('amount'),
				// 'discount_type'=>$this->input->post('discount_type'),

			);
			} 
			else
			{
			$data = array(

				//'users_id' => $this->session->userdata('admin_id'),
				//'scid' => $this->input->post('scid'),
				//'id' => $this->input->post('id'),
				//'promid' => $this->input->post('promid'),
				'supplier_id' => $userid,
				'category_id' => $catid,
				'switch_id' => $switchid,
				'product_name' =>  $this->input->post('product_name'),
				'product_number' =>  $this->input->post('product_number'),
				'price' => $this->input->post('product_price'),
				'description' => $this->input->post('product_detail'),
				'video' => $this->input->post('product_video'),
				// 'discount' => $this->input->post('discount'),
				// 'minimum' => $this->input->post('minimum'),
				// 'maximum' => $this->input->post('maximum'),
				// 'cost' => $this->input->post('cost'),
				// 'style' => $this->input->post('style'),
				// 'discount_days_amt' =>$this->input->post('discount_days_amt'),
				// 'discount_month_amt' =>$this->input->post('discount_month_amt'),
				// 'peakdays' => $this->input->post('peakdays'),
				// 'peakmonths' => $this->input->post('peakmonths'),

				'discount_multi_type' =>$this->input->post('dis_multi_type'),
				'multi_discount_amount'=>$this->input->post('amount'),

				'discount_day_type' =>$this->input->post('dis_day_type'),
				'discount_days_amt'=>$this->input->post('discount_days_amt'),
				'days' => $this->input->post('peakdays'),

				'discount_month_type' =>$this->input->post('dis_month_type'),
				'discount_month_amt' =>$this->input->post('discount_month_amt'),
				'month' => $this->input->post('peakmonths'),
				
				'sports_category' => $this->input->post('category'),
				'ethinicity' => $this->input->post('ethnicity'),
				'denomination' => $this->input->post('denomination'),
				'language' => $this->input->post('language'),
				// 'lowest' => $this->input->post('lowest'),
				// 'highest' => $this->input->post('highest'),
				// 'average' => $this->input->post('average'),
				// 'flat_amount'=>$this->input->post('amount'),
				// 'discount_type'=>$this->input->post('discount_type'),

			);
			}
                                    
			// print_r($data);exit();
			//$promoId = $this->input->post('promid');
			//$getCatId = $this->dashboard_model->getCatId($promoId);//print_r($getCatId);die;
			//$catId = isset($getCatId->supplier_category_id)?$getCatId->supplier_category_id:'';
			//$getQuestionsByCatId = $this->dashboard_model->QuestionsByCatId($catId);

//			foreach ($getQuestionsByCatId as $key => $value) {
//				$quesId = $value->id;
//				$answers = $this->input->post($quesId.'_answer');
//				if(empty($answers)){
//					$answers = '';
//				}
//				$dataArr = [
//					"supplier_bnk_info_id"=> $promoId,
//					"questionnaire_id"=> $quesId,
//					"answer"=> $answers
//				];
//				$this->dashboard_model->insertAnswer($dataArr);
//			}

			$res = $this->Create_Model->Insert_product_info($data);
			
//			$productArr = [
//				'supplier_promo_info_id' => $this->input->post('promid'),
//				'product_name' =>  $this->input->post('product_name'),
//				'product_price' => $this->input->post('product_price'),
//				'product_desc' => $this->input->post('product_detail'),
//				'product_video' => $this->input->post('product_video'),
//				'product_package_id' => $res
//			];
//			$insertId = $this->dashboard_model->insertProduct($productArr);
			// print_r($res);exit();
			if ($res) {
				// $busid = $this->input->post('busid');
				// $scid  = $this->input->post('scid');
				//redirect('supplier/create/add_bankdetail/'.$userid."/".$catid."/".$switchid);
				
				redirect('supplier/create/add_productpackages/'.$switchid."/".$catid);

				// redirect("admin/promoinfo?busid=$busid&scid=".$scid);

			} else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				redirect('supplier/create/add_productpackages/'.$switchid."/".$catid);

			}
		}
	}
	public function add_products(){
	//print_r($_POST);die;
	$prid = $this->input->post('prid');
	$promid = $this->input->post('promid');
	$busid = $this->input->post('busid');
	if(!empty($busid)){
		$busid = $this->input->post('busid');
	}else {
		$busid = 0;
	}
	$product_name = $this->input->post('product_name');
	$product_number = $this->input->post('product_number');
	$product_price = $this->input->post('product_price');
	$product_detail = $this->input->post('product_detail');
	$product_video = $this->input->post('product_video');
	$fr = uniqid($product_name);
	if ($_FILES['pro_image']['name']!="") {
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				//$config['encrypt_name'] = TRUE;
				$config['file_name'] = $fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('pro_image')) {
					$uploadData = $this->upload->data();
					// unlink("assets/Profile/".$pic);
					$p_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					//redirect('admin/promoinfo');
					header('Location: ' . $_SERVER['HTTP_REFERER']);
				}
				$productArr = [
		"package_id" => $busid,
		"product_name" => $product_name,
		"product_number" =>$product_number,
		"price" => $product_price,
		"description" => $product_detail,
		"video" => $product_video,
		"image" => @$p_image,
	];
			}
			else
			{
			$productArr = [
		"package_id" => $busid,
		"product_name" => $product_name,
		"product_number" =>$product_number,
		"price" => $product_price,
		"description" => $product_detail,
		"video" => $product_video,
		
	];
			}
	
	if($this->input->post('product_id')){
	if ($_FILES['pro_image']['name']!="") {
		$productArr = [
		"package_id" => $busid,
		"product_name" => $product_name,
		"product_number" =>$product_number,
		"price" => $product_price,
		"description" => $product_detail,
		"video" => $product_video,
		"image" => @$p_image,
		];
		}
		else
		{
			$productArr = [
		"package_id" => $busid,
		"product_name" => $product_name,
		"product_number" =>$product_number,
		"price" => $product_price,
		"description" => $product_detail,
		"video" => $product_video,
		
	];
		}

		$this->Edit_Model->updateProduct($this->input->post('product_id'),$productArr);
		//echo $this->db->last_query();exit;
				//redirect('supplier/create/add_productpackages/'.$userid."/".$catid."/".$switchid);
		header('Location: ' . $_SERVER['HTTP_REFERER']);

	}else {
		$insertId = $this->Edit_Model->insertProduct($productArr);
		if(!empty($insertId)){
			if($this->input->post('type')=='edit'){
				//redirect('dashboard/edit_productinfok/'.$prid.'');
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}else {
				//redirect('supplier/create/add_productpackages/'.$userid."/".$catid."/".$switchid);
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}
		}
	}


}
	
	
		public function add_bankdetail($switchid='', $catid='')
	{
		

		$data2['title'] = 'Add Bank Details';
		$userid=$this->session->userdata('supplier_id');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('bank_name', 'Slug', 'trim');
		if ($this->form_validation->run() === FALSE) {
		
			$data2['states']=$this->State_Model->listsofState();
			$data2['suppcategory']=$this->Create_Model->getCatId($catid);
			@$data2['service'] = $this->Edit_Model->getDatap('supplier_bank_details', $switchid);

			
			$this->load->view('admin/includes/header', $data2);
				$this->load->view('admin/includes/mainmenu', $data2);
				$this->load->view('admin/bank_details' , $data2);
				$this->load->view('admin/includes/footer', $data2);
			
		} else {
		//echo 123;exit;
			@$data2['service'] = $this->Edit_Model->getDatap('supplier_bank_details', $switchid);
			$data2['states']=$this->State_Model->listsofState();
			$data2['suppcategory']=$this->Create_Model->getCatId($catid);
			$data = array(
				'supplier_id'        =>  $userid,
				'category_id'        =>  $catid,
				'switch_id' => $switchid,
				'bank_name' =>  $this->input->post('bank_name'),
				'account_number' =>  $this->input->post('account_nr'),
				'routing_number' =>  $this->input->post('routing_nr'),
				'city_id'   =>  $this->input->post('city_id'),
				'address2'   =>  $this->input->post('bank_addr2'),
				'address1'   =>  $this->input->post('bank_addr1'),
				'state_id'   =>  $this->input->post('State_id'),
				'zip_code'   =>  $this->input->post('zipcode'),
				'cc_number'   =>  $this->input->post('ccnr'),
				
				'cc_date'   =>  $this->input->post('ccdate'),
				'paypal_address'   =>  $this->input->post('paypal_addr'),
				
				'cvc'   =>  $this->input->post('ccvc'),
				'months' => $this->input->post('month'),
				'years' => $this->input->post('year'),
				'ccstate' => $this->input->post('state'),
				'cccity' => $this->input->post('city'),
				
				'holder_name'=>$this->input->post('holder_name'),
				'cc_number'=>$this->input->post('cc_number'),
				'billing_address'=>$this->input->post('billing_address'),
				'billing_zipcode'=>$this->input->post('billing_zipcode'),
				"load_default"=>$this->input->post('Default'),
				"same_email_business"=>$this->input->post('same_email'),

			);
			// print_r($data);exit();

			$res = $this->Create_Model->Insert_bank_info($data);

			if ($res) {
				
				redirect("supplier/create/add_bankdetail/".$switchid."/".$catid);
			} else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				$redirect("supplier/create/add_bankdetail/".$switchid."/".$catid);
			}
		}
	}
	

		//promo info ==============================================================================



		function promoinfo($switch_id=null, $category_id = null){
		$data['title']="Add Promo Info";
       	$id = $this->session->userdata('supplier_id');
        $data['supplier_id'] =$this->session->userdata('supplier_id');
        $data['switch_id'] = $switch_id;
		$data['category_id'] = $category_id;
		$data['promo']=$this->Create_Model->selectpromoInfo($id);
		$data['promo_data']=$this->Create_Model->promo_data($switch_id);
		//print_r($data['promo_data']);exit();

		$data['category_questions'] = $this->Create_Model->category_questions($category_id);
		
		if(!empty($data['promo']))
			{
				$data['available']="1";

				$this->load->view('admin/includes/header', $data);
				$this->load->view('admin/includes/mainmenu', $data);
				
        		$this->load->view('admin/promoinfo',$data );
				$this->load->view('admin/includes/footer',$data);

				
			}
			else
			{
				$data['available']="0";

				$this->load->view('admin/includes/header', $data);
				$this->load->view('admin/includes/mainmenu', $data);
				
        		$this->load->view('admin/promoinfo',$data );
				$this->load->view('admin/includes/footer',$data);
			}

        
    }
    function add_promoinfo(){
		
		//$switch_id = $this->input->post('switch_id');
		$category_id = $this->input->post('category_id');
        $switch_id = $this->input->post('switch_id');

		$questions = $this->Create_Model->category_questions($category_id);
		if(count($questions)>0)
									{
									
foreach ($questions as $key => $ques) {
$ans='';

if($ques->ques_type=='text')
{
$ans=$this->input->post('txt-'.$ques->id);
}
if($ques->ques_type=='numeric')
{
$ans=$this->input->post('num-'.$ques->id);
}
if($ques->ques_type=='radio')
{
$ans=$this->input->post('ans-'.$ques->id);
}
if($ques->ques_type=='checkbox')
{
//print_r($this->input->post('chk'.$ques->id));
if(count((array)$this->input->post('chk'.$ques->id))>0){
$ans=implode("<>",$this->input->post('chk'.$ques->id));	

}else{
$ans="";

}
}
if(!empty($ans))
{
$data2 = array('switch_id' => $switch_id,'question_id' => $ques->id,'answer' => $ans);
$res2 = $this->Create_Model->Insert_question_answer($data2);
//print_r($res2);die();
}
}	

}		
$res3 = $this->Create_Model->delete_promo($switch_id);
		
		if($this->input->post('same')==1)
		{
		$id = $this->session->userdata('supplier_id');
		$data['promo']=$this->Create_Model->selectpromoInfo($id);
		$category_id =  $this->input->post('category_id');
		$switch_id = $this->input->post('switch_id');
		if(!empty($this->input->post('personal_photo')))
        {
           $personal_photo =  $this->input->post('photo1');
            $fr = uniqid($personal_photo);
    	}
    	else
    	{
    		$personal_photo="";
    	}

        $fr = uniqid($personal_photo);
        if (!empty($_FILES['personal_photo']['name'])) {
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
            //$config['encrypt_name'] = TRUE;
            $config['file_name'] = $fr;
            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);


            if ($this->upload->do_upload('personal_photo')) {
                $uploadData = $this->upload->data();
                // unlink("assets/Profile/".$pic);
                $sp_image = $uploadData['file_name'];
            

                
            } else {
               // print_r($this->upload->display_errors());
                $this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
               redirect('supplier/create/promoinfo/'.$switch_id.'/'.$category_id, 'refresh');
            }
        } else 

        {
            $sp_image = $personal_photo;
        }
		$data = array(
            'supplier_id' => $id,
            'category_id' =>  $category_id,
            'switch_id' => $this->input->post('switch_id'),
            'business_name' =>$this->input->post('business_name1'), 
            'personal_bio' => $this->input->post('personal_bio1'),
            'description' => $this->input->post('description1'),
            'fb' =>  $this->input->post('fb1'),
            'photo' =>$sp_image,
            'instagram' => $this->input->post('instagram1') ,
            'linkedin' => $this->input->post('linkedin1'),
            'twitter' => $this->input->post('twitter1'),
            'display' => 1

        );

        $save_promo = $this->Create_Model->save_promo($data);
        //Set Message
        $this->session->set_flashdata('success', 'Promo Info Added Successfully.');
        redirect('supplier/create/promoinfo/'.$switch_id.'/'.$category_id, 'refresh');
			

			
		}else{
        $supplier_id = $this->input->post('supplier_id');
        $switch_id = $this->input->post('switch_id');
        $bus_detail = $this->input->post('bus_detail');

        $bus_name = $this->input->post('bus_name');
        $bio = $this->input->post('bio');
        $fb = $this->input->post('fb');
        $linkedin = $this->input->post('linkedin');
        $insta = $this->input->post('insta');
        $tweet = $this->input->post('tweet');
        $category_id = $this->input->post('category_id');

        if(!empty($this->input->post('personal_photo')))
        {
           $personal_photo =  $this->input->post('personal_photo');
            $fr = uniqid($personal_photo);
    	}
    	else
    	{
    		$personal_photo="";
    	}

        $fr = uniqid($personal_photo);
        if (!empty($_FILES['personal_photo']['name'])) {
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
            //$config['encrypt_name'] = TRUE;
            $config['file_name'] = $fr;
            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);


            if ($this->upload->do_upload('personal_photo')) {
                $uploadData = $this->upload->data();
                // unlink("assets/Profile/".$pic);
                $sp_image = $uploadData['file_name'];
            

                
            } else {
               // print_r($this->upload->display_errors());
                $this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
               redirect('supplier/create/promoinfo/'.$switch_id.'/'.$category_id, 'refresh');
            }
        } else 

        {
            $sp_image = $personal_photo;
        }
                         	
        $data = array(
            'supplier_id' => $supplier_id,
            'category_id' => $category_id,
            'switch_id' => $switch_id,
            'business_name' => $bus_name, 
            'personal_bio' => $bio,
            'description' => $bus_detail,
            'fb' => $fb,
            'photo' => $sp_image,
            'instagram' => $insta,
            'linkedin' => $linkedin,
            'twitter' => $tweet,
            'display' => 1

        );

		$save_promo = $this->Create_Model->save_promo($data);
;
		
		
        //Set Message
        $this->session->set_flashdata('success', 'Promo Info Added Successfully.');
        redirect('supplier/create/promoinfo/'.$switch_id.'/'.$category_id, 'refresh');
	}
}




    
    
}