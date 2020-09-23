<?php
defined('BASEPATH') or exit('No direct script access allowed');
	class Create extends CI_Controller
	{
		
	 public function __construct()
		{
			parent::__construct();
			
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$this->load->model('Supplier_Model');
			$this->load->model('Create_Model');
			$this->load->model(array(
			'State_Model','Consumer_category_Model','Business_category_Model','Edit_Model'));
			
		}
		public function index()
		{

		$data['title'] = 'Add New Supplier';
			

			if(isset($_POST['submit']))
			{
				$email=$this->input->post('email');

				$row = $this->Create_Model->checkEmailExisit($email);
				if(!empty($row))
				{
					$this->session->set_flashdata('success', 'Email already registered.');
					redirect('supplier/supplier/lists', 'refresh');
				}
				else
				{
					$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
					$cpass=$this->input->post('cpass');
					$pass=$this->input->post('password');
					if($cpass==$pass){
					$data=array(

								'username'  	=> $this->input->post('uname'),
								'email'			=> $this->input->post('email'),
								'password'			=> $password,
															
								);
					$result = $this->Create_Model->addsupplier($data);

					if($result){
						$this->session->set_flashdata('success', 'Supplier has been Added.');
						redirect('supplier/create/addStoreFront/'.$result, 'refresh');

					}
					else
					{
						$this->session->set_flashdata('success', 'Something went wrong.');
						redirect('supplier/create/index', 'refresh');

						
					}
			}
		
			else
			{
				$this->session->set_flashdata('success', 'Password Mismatch.');
				redirect('supplier/create/index', 'refresh');
			}
		}
				
			}

			

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('supplier/add', $data);
			$this->load->view('administrator/footer');
		}

		public function addStoreFront($id=null)
		{
			$data['title'] = 'Add New Bussiness';
			$data['business']=$this->Create_Model->selectBusinessInfo($id);
			if(!empty($data['business']))
			{
			$data['city']=$this->Edit_Model->selectCityName($data['business'][0]->cityid); 
			

		}
			//print_r($data['business']);die;
			$data['states']=$this->State_Model->listsofState();
			$data['cat'] = $this->Supplier_Model->selectCategory();
			$data['business_cat']=$this->Business_category_Model->lists();
			$data['consumer_cat']=$this->Consumer_category_Model->lists();
			$data['weekdays']=$this->Create_Model->product_weekdays();
			$data['months']=$this->Create_Model->product_months();
			$data['discount_types']=$this->Create_Model->discounts();

			$data['supplier_id']=$id;
			if(!empty($data['business']))
			{
				$data['available']="1";
				$this->load->view('administrator/header-script');
				$this->load->view('administrator/header');
				$this->load->view('administrator/header-bottom');
				$this->load->view('supplier/addBussinessInfo', $data);
				$this->load->view('administrator/footer');
			}
			else
			{
				$data['available']="0";

				$this->load->view('administrator/header-script');
				$this->load->view('administrator/header');
				$this->load->view('administrator/header-bottom');
				$this->load->view('supplier/addBussinessInfo', $data);
				$this->load->view('administrator/footer');
			}
		}

		public function addBusiness()
		{
			$suppler_id=$this->input->post('supplier_id');
			$category_id=$this->input->post('category');
			
			
			if($this->input->post('same')==1)
			{
				$cityid=$this->input->post('cityname');
					if(!empty($cityid))
				{
				$data['city']=$this->Edit_Model->selectCityName($cityid);
				$latitude=$data['city'][0]->latitude;
				$longitude=$data['city'][0]->longitude;
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
				if (!empty($_FILES['certi']['name'])) {
				$config['upload_path'] = 'uploads/business_info';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				//$config['encrypt_name'] = TRUE;
				$config['file_name'] = $fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('certi')) {
					$uploadData = $this->upload->data();
					// unlink("assets/Profile/".$pic);
					$sp_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					//redirect('admin/business_info');
				}
			} else {
				
				$sp_image = $defult_certi;
			}

			$name =  $this->input->post('namefirst');
			$insurance =  $this->input->post('insurance');
			$defult_insur=$this->input->post('defult_insur');
			$fr = uniqid($name);
			if (!empty($_FILES['insurance']['name'])) {
				$config['upload_path'] = 'uploads/business_info';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				//$config['encrypt_name'] = TRUE;
				$config['file_name'] = $fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('insurance')) {
					$uploadData = $this->upload->data();
					// unlink("assets/Profile/".$pic);
					$p_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					//redirect('admin/business_info');
				}
			} else {
				$p_image = $defult_insur;
			}

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
			
			$result=$this->Create_Model->addBusinessInfo($data);

			if($result){
							$business=array(

										'business_id' 	=>	$result,
										'supplier_id'	=>	$this->input->post('supplier_id'),
										'category_id'	=>	$this->input->post('category'),	
									);
							$res=$this->Create_Model->addBusinessstoreFront($business);


							$store=$this->Create_Model->selectSwitchid($result);


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
else
{
	$cons="";
}


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
else
{
	$busin="";
}

						$this->session->set_flashdata('success', 'Supplier  buissness Info has been Added.');
						redirect('supplier/create/add_promo_info/'.$suppler_id.'/'.$category_id.'/'.$res, 'refresh');

					}
					else
					{
						$this->session->set_flashdata('success', 'Something went wrong.');
						redirect('supplier/create/addStoreFront', 'refresh');

						
					}

			}
			else
			{

				$cityid=$this->input->post('city_id');
				if(!empty($cityid))
				{
				$data['city']=$this->Edit_Model->selectCityName($cityid);
				$latitude=$data['city'][0]->latitude;
				$longitude=$data['city'][0]->longitude;
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
				$config['upload_path'] = '../uploads/business_info';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				//$config['encrypt_name'] = TRUE;
				$config['file_name'] = $fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('certify')) {
					$uploadData = $this->upload->data();
					// unlink("assets/Profile/".$pic);
					$sp_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					//redirect('admin/business_info');
				}
			} else {
				$sp_image = $certify;
			}

			$name =  $this->input->post('first_name');
			$photo =  $this->input->post('photo');

			$fr = uniqid($name);
			if (!empty($_FILES['photo']['name'])) {
				$config['upload_path'] = '../uploads/business_info';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				//$config['encrypt_name'] = TRUE;
				$config['file_name'] = $fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('photo')) {
					$uploadData = $this->upload->data();
					// unlink("assets/Profile/".$pic);
					$p_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					//redirect('admin/business_info');
				}
			} else {
				$p_image = $photo;
			}

$con['c']=$this->input->post('cons_accept');

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
else
{
	$cons="";
}

$bis['b']=$this->input->post('business_accept');

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

			if($result){
							$business=array(

										'business_id' 	=>	$result,
										'supplier_id'	=>	$this->input->post('supplier_id'),
										'category_id'	=>	$this->input->post('category'),	
									);
							$res=$this->Create_Model->addBusinessstoreFront($business);

							$store=$this->Create_Model->selectSwitchid($result);


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
$rr=$this->Create_Model->addSelectedEvents('selected_consumerevent',$cons);

}
}
else
{
	$cons="";
}


$bis1['b']=$this->input->post('business_accept');
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
else
{
	$busin="";
}

						$this->session->set_flashdata('success', 'Supplier  buissness Info has been Added.');
						redirect('supplier/create/add_promo_info/'.$suppler_id.'/'.$category_id.'/'.$res, 'refresh');

					}
					else
					{
						$this->session->set_flashdata('success', 'Something went wrong.');
						redirect('question/questions/addStoreFront', 'refresh');

						
					}


		}
		}	

		public function addBusinessStore($s=null,$b=null,$c=null)
		{
			$business=array(

										'business_id' 	=>	$b,
										'supplier_id'	=>	$s,
										'category_id'	=>	$c,	
									);
				$res=$this->Create_Model->addBusinessstoreFront($business);
				$this->session->set_flashdata('success', 'Supplier  buissness Info has been Added.');
				redirect('supplier/create/add_promo_info/'.$s.'/'.$c.'/'.$res, 'refresh');
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

public function add_productpackages($userid="",$catid="",$switchid="")
	{
		
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('product_name', 'product_name', 'trim');

		if ($this->form_validation->run() === FALSE) {
			@$data2['service'] = $this->Edit_Model->getDatap('supplier_product_packages', $switchid);
			$data2['weekdays']=$this->Create_Model->product_weekdays();
			$data2['months']=$this->Create_Model->product_months();
			$data2['suppcategory']=$this->Create_Model->getCatId($catid);
			$data2['discount_types']=$this->Create_Model->discounts();
			//print_r($data2['category']);
			//echo $this->db->last_query();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('supplier/productpackages',@$data2);
			$this->load->view('administrator/footer');
			
		} else {
			@$data2['service'] = $this->Edit_Model->getDatap('supplier_product_packages', $switchid);
			$data2['weekdays']=$this->Create_Model->product_weekdays();
			$data2['months']=$this->Create_Model->product_months();
			$data2['suppcategory']=$this->Create_Model->getCatId($catid);
			$data2['discount_types']=$this->Create_Model->discounts();
			//$personal =  $this->input->post('pro_image');
			$name =  $this->input->post('product_name');
			$promid =  $this->input->post('promid');
			$busid =  $this->input->post('busid');
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
					$this->session->set_flashdata('danger', 'Unable  to upload file ,plz try again');
					redirect('supplier/create/add_productpackages/'.$userid."/".$catid."/".$switchid);
				}
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
				
				//'category' => $this->input->post('category'),
				//'ethnicity' => $this->input->post('ethnicity'),
				//'denomination' => $this->input->post('denomination'),
				//'language' => $this->input->post('language'),
				// 'lowest' => $this->input->post('lowest'),
				// 'highest' => $this->input->post('highest'),
				// 'average' => $this->input->post('average'),
				'image' => @$p_image,
				// 'flat_amount'=>$this->input->post('amount'),
				// 'discount_type'=>$this->input->post('discount_type'),


			);
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
				
				redirect('supplier/create/add_productpackages/'.$userid."/".$catid."/".$switchid);

				// redirect("admin/promoinfo?busid=$busid&scid=".$scid);

			} else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				redirect('supplier/create/add_productpackages/'.$userid."/".$catid."/".$switchid);

			}
		}
	}
	
		public function add_bankdetail($userid='',$catid='',$switchid='')
	{
		//date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('bank_name', 'Slug', 'trim');
		if ($this->form_validation->run() === FALSE) {
		
			$data2['states']=$this->State_Model->listsofState();
			$data2['suppcategory']=$this->Create_Model->getCatId($catid);

			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('supplier/bank_details',@$data2);
			$this->load->view('administrator/footer');
		} else {
		//echo 123;exit;
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
				//'Default'   =>  $this->input->post('Default'),
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
				// print_r($res);exit();
				// $busid = $this->input->post('busid');

				redirect("supplier/create/photogallery/".$userid."/".$catid."/".$switchid);
			} else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				$redirect("supplier/create/add_bankdetail/".$userid."/".$catid."/".$switchid);
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
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					//redirect('admin/promoinfo');
					header('Location: ' . $_SERVER['HTTP_REFERER']);
				}
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
	if($this->input->post('product_id')){
		$productArr = [
		"package_id" => $busid,
		"product_name" => $product_name,
		"product_number" =>$product_number,
		"price" => $product_price,
		"description" => $product_detail,
		"video" => $product_video,
		"image" => @$p_image,
		];

			$this->Edit_Model->updateProduct($this->input->post('product_id'),$productArr);
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






		//promo info 



		public function add_promo_info($supplier_id, $category_id,$switch_id){
            $data['supplier_id'] = $supplier_id;
            $data['category_id'] = $category_id;
            $data['switch_id'] = $switch_id;
			$data['promo'] = $this->Create_Model->selectpromoInfo($supplier_id);
			//print_r($data['promo']);die();
			if(!empty($data['promo'])){
				$data['available'] = "1";
				$this->load->view('administrator/header-script');
				$this->load->view('administrator/header');
				$this->load->view('administrator/header-bottom');
				$this->load->view('supplier/add_promo_info',$data);
				$this->load->view('administrator/footer');	
			}
			else{
				$data['available'] = "0";
				$this->load->view('administrator/header-script');
				$this->load->view('administrator/header');
				$this->load->view('administrator/header-bottom');
				$this->load->view('supplier/add_promo_info',$data);
				$this->load->view('administrator/footer');	
			}
        }

		public function save_promo_info(){
         

            
            //$this->form_validation->set_rules('busines_detail', 'Business detail', 'required');
            //$this->form_validation->set_rules('personal_bio', 'Personal Bio', 'required');
            //$this->form_validation->set_rules('insta_link', 'Instagram Link', 'required');
			//$this->form_validation->set_rules('linked_in', 'LinkedIN Link', 'required');
            ///$this->form_validation->set_rules('twitter_link', 'Twitter Link', 'required');
			//$this->form_validation->set_rules('fb_link', 'Facebook Link', 'required');
            
            $supplier_id 	= $this->input->post('supplier_id');
            $category_id = $this->input->post('category_id');
            $switch_id = $this->input->post('switch_id');
			if($this->input->post('same')==1){
				$data['promo'] = $this->Create_Model->selectpromoInfo($supplier_id);
				$category_id =  $data['promo'][0]->category_id;
				
				$data = array(
					'supplier_id' =>$this->input->post('supplier_id'),
					'category_id' =>  $data['promo'][0]->category_id,
					'switch_id' => $this->input->post('switch_id'),
					'business_name' =>$data['promo'][0]->business_name, 
					'personal_bio' => $data['promo'][0]->personal_bio,
					'description' => $data['promo'][0]->description,
					'fb' => $data['promo'][0]->fb,
					'photo' => $data['promo'][0]->photo,
					'instagram' => $data['promo'][0]->instagram,
					'linkedin' => $data['promo'][0]->linkedin,
					'twitter' => $data['promo'][0]->twitter,
					'display' => 1
		
				);
				$save_promo = $this->Create_Model->save_promo($data);
			    //Set Message
			    $this->session->set_flashdata('success', 'Promo Info Addes Successfully.');
			    redirect('supplier/create/add_productpackages/'.$supplier_id.'/'.$category_id.'/'.$switch_id, 'refresh');


			}
			else{
				$this->form_validation->set_rules('business_name', 'Business Name', 'required');
			

                $personal_photo =  $this->input->post('personal_photo');

                $fr = uniqid($personal_photo);
                if (!empty($_FILES['personal_photo']['name'])) {
                    $config['upload_path'] = '../uploads/';
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
                        $this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
                        redirect('supplier/create/add_promo_info/'.$supplier_id.'/'.$category_id.'/'.$switch_id, 'refresh');
                    }
                } else {
                    $sp_image = "";
                }

                 	
                $data = array(
                    'supplier_id' => $this->input->post('supplier_id'),
                    'category_id' => $this->input->post('category_id'),
                    'switch_id' => $this->input->post('switch_id'),
                    'business_name' => $this->input->post('business_name'), 
                    'personal_bio' => $this->input->post('personal_bio'),
                    'description' => $this->input->post('busines_detail'),
                    'fb' => $this->input->post('fb_link'),
                    'photo' => $sp_image,
                    'instagram' => $this->input->post('insta_link'),
                    'linkedin' => $this->input->post('linked_in'),
                    'twitter' => $this->input->post('twitter_link'),
                    'display' => 1

                );

				$save_promo = $this->Create_Model->save_promo($data);
			    //Set Message
			    $this->session->set_flashdata('success', 'Promo Info Addes Successfully.');
			    redirect('supplier/create/add_productpackages/'.$supplier_id.'/'.$category_id.'/'.$switch_id, 'refresh');
			}
      
        
    }	

    function add_photo_gallery($supplier_id = null, $category_id = null, $switch_id = null){
        $data['supplier_id'] = $supplier_id;
        $data['category_id'] = $category_id;
        $data['switch_id'] = $switch_id;

        $this->load->view('administrator/header-script');
        $this->load->view('administrator/header');
        $this->load->view('administrator/header-bottom');
        $this->load->view('supplier/add_photo_gallery',$data);
        $this->load->view('administrator/footer');
    }
    // function save_photo_gallery(){
    //     //$this->form_validation->set_rules('title', 'Title', 'required');

    //     if($this->form_validation->run() === FALSE){
    //         $this->load->view('administrator/header-script');
    //            $this->load->view('administrator/header');
    //            $this->load->view('administrator/header-bottom');
    //            $this->load->view('supplier/add_photo_gallery');
    //            $this->load->view('administrator/footer');	
    //     }else{
    //     	$supplier_id 	= $this->input->post('supplier_id');
    //         $category_id = $this->input->post('category_id');
    //         $switch_id = $this->input->post('switch_id');
    //         $photo =  $this->input->post('photo');

    //         $fr = uniqid($photo);
    //         if (!empty($_FILES['photo'])) {
    //             $config['upload_path'] = '../uploads/';
    //             $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
    //             //$config['encrypt_name'] = TRUE;
    //             $config['file_name'] = $fr;
    //             //Load upload library and initialize configuration
    //             $this->load->library('upload', $config);
    //             $this->upload->initialize($config);

    //             if ($this->upload->do_upload('photo')) {
    //                 $uploadData = $this->upload->data();
    //                 // unlink("assets/Profile/".$pic);
    //                 $sp_image = $uploadData['file_name'];
    //             } else {
    //                 $this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
    //                 redirect('supplier/create/add_photo_gallery/'.$supplier_id.'/'.$category_id.'/'.$switch_id, 'refresh');
    //             }
    //         } else {
    //             $sp_image = $photo;
    //         }
    //         $data = array(
    //             'title' => $this->input->post('title'),
    //             'photos' => $sp_image,
    //             'display' => 1,
    //             'supplier_id'=> $this->input->post('supplier_id'),
    //             'category_id' => $this->input->post('category_id'),
    //             'switch_id' => $this->input->post('switch_id'),

    //         );

    //         $save_photo = $this->Create_Model->save_photo($data);
    //         //Set Message
    //         $this->session->set_flashdata('success', 'Photo gallery Added Successfully.');
    //         redirect('supplier/create/add_video_gallery/'.$supplier_id.'/'.$category_id.'/'.$switch_id, 'refresh');
    
  
    //     }
    // }

    function save_photo_gallery(){
	$data = array();
	$title =$this->input->post('title');
	$supplier_id = $this->input->post('supplier_id');
	$category_id = $this->input->post('category_id');
	$switch_id = $this->input->post('switch_id');
	$get_order = $this->Create_Model->get_order($switch_id);
	$last_key = count($get_order);
	$display_count = $last_key + 1;

		if (!empty($_FILES['files']['name'][0])) {
			$filesCount = count($_FILES['files']['name']);
			 //print_r($_FILES['files']['name']);exit();
			for ($i = 0; $i < $filesCount; $i++) {
				$_FILES['file']['name']     = $_FILES['files']['name'][$i];

				$_FILES['file']['type']     = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error']    = $_FILES['files']['error'][$i];
				$_FILES['file']['size']     = $_FILES['files']['size'][$i];

				// File upload configuration
				$uploadPath = '../uploads/';
				$config['upload_path'] = '../uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';

				// Load and initialize upload library
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				//print_r($this->upload->data());exit();
				// Upload file to server
				if ($this->upload->do_upload('file')) {
					// Uploaded file data
					$fileData = $this->upload->data();
					$uploadData[$i]['photos'] = $fileData['file_name'];
					$uploadData[$i]['supplier_id'] = $this->input->post('supplier_id');
					$uploadData[$i]['category_id'] = $this->input->post('category_id');
					$uploadData[$i]['switch_id'] = $this->input->post('switch_id');
					$uploadData[$i]['title'] =$title[$i];
					$uploadData[$i]['display_order'] =$display_count;
				}
				$display_count=$display_count+1;
				
			
			}
			
			$supplier_id 	= $this->input->post('supplier_id');
            $category_id = $this->input->post('category_id');
           $switch_id = $this->input->post('switch_id');
           
		  	$save_photo = $this->Create_Model->save_photo($uploadData);
		
               //Set Message
               $this->session->set_flashdata('success', 'Photo gallery Added Successfully.');
           	redirect('supplier/create/add_video_gallery/'.$supplier_id.'/'.$category_id.'/'.$switch_id, 'refresh');


		}

		else{
                        //print_r($this->upload->display_errors());

    	  //Set Message
                  // $this->session->set_flashdata('success', 'Photo gallery Added Successfully.');
                  redirect('supplier/create/add_video_gallery/'.$supplier_id.'/'.$category_id.'/'.$switch_id, 'refresh');
          }


	
	}
    function add_video_gallery($supplier_id = null, $category_id = null , $switch_id = null){
        $data['supplier_id'] = $supplier_id;
        $data['category_id'] = $category_id;
        $data['switch_id'] = $switch_id;

        $this->load->view('administrator/header-script');
        $this->load->view('administrator/header');
        $this->load->view('administrator/header-bottom');
        $this->load->view('supplier/add_video_gallery',$data);
        $this->load->view('administrator/footer');
    }
    // function save_video_gallery(){
    //     //$this->form_validation->set_rules('link1', 'Link1', 'required');
    //     //$this->form_validation->set_rules('link2', 'Link2', 'required');

    //    if($this->form_validation->run() === FALSE){
    //        $this->load->view('administrator/header-script');
    //           $this->load->view('administrator/header');
    //           $this->load->view('administrator/header-bottom');
    //           $this->load->view('supplier/add_video_gallery', $data);
    //           $this->load->view('administrator/footer');	
    //    }else{

    //    	$supplier_id 	= $this->input->post('supplier_id');
    //         $category_id = $this->input->post('category_id');
    //          $switch_id = $this->input->post('switch_id');

    //        $data = array(
    //            'video1' => $this->input->post('link1'), 
    //            'video2' => $this->input->post('link2')  ,
    //            'supplier_id'=> $this->input->post('supplier_id'),
    //            'category_id' => $this->input->post('category_id'),
    //            'switch_id' => $this->input->post('switch_id'),
               

    //            );

    //       $add_video = $this->Create_Model->add_video($data);
    //        //Set Message
    //        $this->session->set_flashdata('success', 'Data Added Successfully.');
    //        redirect('supplier/create/add_video_gallery/'.$supplier_id.'/'.$category_id.'/'.$switch_id, 'refresh');
    //    }
    // }

    function save_video_gallery(){
			$supplier_id 	= $this->input->post('supplier_id');
            $category_id = $this->input->post('category_id');
			 $switch_id = $this->input->post('switch_id');
			 $link1 =$this->input->post('link1');
			 if(count(array_unique($link1))<count($link1))
			{	   
				$this->session->set_flashdata('danger', 'Please not enter duplicate values.');

				redirect('supplier/create/add_video_gallery/'.$supplier_id.'/'.$category_id.'/'.$switch_id, 'refresh');
			}
			else
			{
				//echo 'Array  has  noduplicates';


			for ($i = 0; $i < count($link1); $i++) {
				//print_r(count($link1));die();

			$data = array(
		 		'video1' => $link1[$i], 
		 		//'video2' => $this->input->post('link2')  ,
		 		'supplier_id'=> $supplier_id,
		 		'category_id' => $category_id,
		 		'switch_id' => $switch_id,

				 );

			  $add_video = $this->Create_Model->add_video_array($data);
			  
		 	}
           //Set Message
            $this->session->set_flashdata('success', 'Data Added Successfully.');
            redirect('supplier/supplier/lists', 'refresh');
       }

	}
}