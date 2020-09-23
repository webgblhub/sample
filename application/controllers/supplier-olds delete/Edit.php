<?php
defined('BASEPATH') or exit('No direct script access allowed');
	class Edit extends CI_Controller
	{
		
	 public function __construct()
		{
			parent::__construct();
			
			if($this->session->userdata('admin_logged')==false) {
				redirect('admin');
			}
			$this->load->model('Supplier_Model');
			$this->load->model('Edit_Model');
			$this->load->model('dashboard_model');

			$this->load->model(array(
			'State_Model','Consumer_category_Model','Business_category_Model','Create_Model'));
			
		}

		//Manuja Edited ======================================================

		//Edit business info 

		public function editBusinessInfo($id=null)
		{
			$data['title'] = 'Edit Bussiness';
			$data['supplier_id']=$this->session->userdata('supplier_id');
			$data['business']=$this->Edit_Model->selectBusinessInfo($id);
			if(!empty($data['business'][0]->cityid)){
			$data['city']=$this->Edit_Model->selectCityName($data['business'][0]->cityid); }
			$data['categoryname']=$this->Edit_Model->selectCategoryname($id);
			
			$data['states']=$this->State_Model->listsofState();			//Select state
			$data['weekdays']=$this->Create_Model->product_weekdays();	//Select Days
			$data['months']=$this->Create_Model->product_months();		//Select Month
			$data['discount_types']=$this->Create_Model->discounts();	//Select Discount Types

			$data['business_cat']=$this->Business_category_Model->lists();	//Select Business Category
			$data['consumer_cat']=$this->Consumer_category_Model->lists();	//Select Consuner Category

			if(isset($_POST['submit']))
			{
				
				$name =  $this->input->post('first_name');
				$certify =  $this->input->post('certify');

				$fr = uniqid($name);

				//Check file is empty or not

				if (!empty($_FILES['certify']['name'])) {
				$config['upload_path'] = 'uploads/business_info';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				//$config['encrypt_name'] = TRUE;
				$config['file_name'] = $fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				//Certificate File upload
				if ($this->upload->do_upload('certify')) {
					$uploadData = $this->upload->data();
					
					$sp_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					
				}
			} else {
				if(empty($data['business'][0]->certification))
				{
					$sp_image = "";
				}
				else
				{
					$sp_image = $data['business'][0]->certification;
				}
			}


			$name =  $this->input->post('first_name');
			$photo =  $this->input->post('photo');

			$fr = uniqid($name);
			//Check insurance is empty or not
			if (!empty($_FILES['photo']['name'])) {
				$config['upload_path'] = 'uploads/business_info';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				
				$config['file_name'] = $fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				//Insurance file upload

				if ($this->upload->do_upload('photo')) {
					$uploadData = $this->upload->data();
					
					$p_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					
				}
			} else {
				if(empty($data['business'][0]->insurance))
				{
					$p_image = "";
				}
				else
				{
					$p_image = $data['business'][0]->insurance;
				}
			}

			// get consumer accepected category

			if(!empty($this->input->post('cons_accept')))
			{
				$con['c']=$this->input->post('cons_accept');

				$co=count($con['c']);
							

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

		// get business accepected category

			if(!empty($this->input->post('business_accept')))
			{
			$bis['b']=$this->input->post('business_accept');

			$bi=count($bis['b']);

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


				if(!empty($this->input->post('city_id')))
				{
					$city=$this->input->post('city_id');
					
					$latitude=$this->input->post('latitude');
					$longitude=$this->input->post('longitude');
				}
				else
				{
					$city=$data['business'][0]->cityid;

					if(!empty($city))
				{
				
					$latitude=$this->input->post('latitude');
					$longitude=$this->input->post('longitude');
					}
					else
					{
						$city="";
						$latitude="";
						$longitude="";
						
					}
				
				}
				if(!empty($this->input->post('businessid')))
				{


				$data=array(
							'id'				=>		$this->input->post('businessid'),
							'supplier_id' 		=>		$this->input->post('supplier_id'),
							'prefix' 			=>		$this->input->post('name_prefix'),
							'first_name' 		=>		$this->input->post('first_name'),
							'last_name' 		=>		$this->input->post('last_name'),
							'company_name' 		=>		$this->input->post('Company_name'),
							'email' 			=>		$this->input->post('email_address'),
							'mobile' 			=>		$this->input->post('mobile_number'),
							'telephone' 		=>		$this->input->post('landline_number'),
							
							'ext' 				=>		$this->input->post('landline_number_ext'),
							'fax' 				=>		$this->input->post('fax_number'),
							'address' 			=>		$this->input->post('address1'),
							'address2' 			=>		$this->input->post('address2'),
							'stateid' 			=>		$this->input->post('State_id'),
							'cityid' 			=>		$city,
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
			
				
			
			$result=$this->Edit_Model->editBusinessInfo($data);
		}
		else
		{
			$data=array(
							'id'				=>		$this->input->post('businessid'),
							'supplier_id' 		=>		$this->input->post('supplier_id'),
							'prefix' 			=>		$this->input->post('name_prefix'),
							'first_name' 		=>		$this->input->post('first_name'),
							'last_name' 		=>		$this->input->post('last_name'),
							'company_name' 		=>		$this->input->post('Company_name'),
							'email' 			=>		$this->input->post('email_address'),
							'mobile' 			=>		$this->input->post('mobile_number'),
							'telephone' 		=>		$this->input->post('landline_number'),
							
							'ext' 				=>		$this->input->post('landline_number_ext'),
							'fax' 				=>		$this->input->post('fax_number'),
							'address' 			=>		$this->input->post('address1'),
							'address2' 			=>		$this->input->post('address2'),
							'stateid' 			=>		$this->input->post('State_id'),
							'cityid' 			=>		$city,
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

//Update storefront_bussiness table with business id
			$business=array(

										'id' =>$this->input->post('storefrontid'),

										'business_id' 	=>	$result,
										
									);
							$res=$this->Create_Model->updateBusinessstoreFront($business);
			


		}

			$storid=$this->uri->segment(4);

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
						
						$cons[$i]['switchid'] = $storid;
						$cons[$i]['eventid'] = $con1['c'][$i];
						
						
					}
				
				$rr=$this->Create_Model->addSelectedEvents('selected_consumerevent',$cons);
				}
			}



			$bis1['b']=$this->input->post('business_accept');
			if(!empty($bis1['b']))
			{
					$bi=count($bis['b']);
					if($bi>0)
					{
						$busin=array();
						for($i=0;$i<$bi;$i++)

						{

						$busin[$i]['switchid'] = $storid;
						$busin[$i]['eventid'] = $bis1['b'][$i];
					
						}

					$rr=$this->Create_Model->addSelectedEvents('selected_bussinessevent',$busin);
					}
			}


			$supplier_id=$this->input->post('supplier_id');

			if ($result) {
			$this->session->set_flashdata('success', 'Supplier  buissness Info has been Updated.');
						redirect('supplier/edit/editBusinessInfo/'.$storid, 'refresh');

					}
					else
					{
						$this->session->set_flashdata('success', 'Something went wrong.');
						redirect('supplier/supplier/lists', 'refresh');

						
					}

			}
			else
			{
				$this->load->view('admin/includes/header', $data);
				$this->load->view('admin/includes/mainmenu', $data);
				$this->load->view('admin/edit_businessinfo' , $data);
				$this->load->view('admin/includes/footer', $data);


				
			}
		}

		public function deleteBusinessInfo($id=null,$supplier_id=null)
		{
			$result= $this->Edit_Model->deleteBusinessInfo($id);
			if ($result) {
			$this->session->set_flashdata('err', 'Supplier  buissness Info has been Deleted.');
						redirect('supplier/supplier/list_storefront/'.$supplier_id, 'refresh');

					}
					else
					{
						$this->session->set_flashdata('err', 'Something went wrong.');
						redirect('supplier/supplier/lists', 'refresh');

						
					}
		}

		

 


//Jisha Edited ===================================================================================





public function edit_promo_info($store_front_id=null){
				$data['title'] = 'Edit Promo Info';
				$data['categoryname']=$this->Edit_Model->selectCategoryname($store_front_id);
				$category = $this->Edit_Model->get_Categoryname($store_front_id);
				//print_r($data['category'] );die();
				$category_id = $category->category_id;
				$id = $this->session->userdata('supplier_id');
				$data['promo_user_data'] = $this->Edit_Model->get_promo_user_data($id);
			$data['category_questions'] = $this->Edit_Model->category_questions($category_id,$store_front_id);
			
	
    $data['get_promo_data']= $this->Edit_Model->get_promo_data($store_front_id);
    
  				$this->load->view('admin/includes/header', $data);
				$this->load->view('admin/includes/mainmenu', $data);
			      $this->load->view('admin/edit_promoinfo',$data );
			      $this->load->view('admin/includes/footer');
//
 }
function edit_promoinfo(){
	
	$id = $this->session->userdata('supplier_id');
	$store_front_id = $this->input->post('store_id');
	$supplier_id = $this->input->post('supplier_id');
	$category_id = $this->input->post('category_id');
	$questions = $this->Edit_Model->category_questions($category_id,$store_front_id);

	if(count($questions)>0)
	{
$res3 = $this->Edit_Model->delete_question_answer($store_front_id);
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


$data2 = array('switch_id' => $store_front_id,'question_id' => $ques->id,'answer' => $ans);
//print_r($ans);die();

$this->load->model('Create_Model');

$res2 = $this->Create_Model->Insert_question_answer($data2);


}	

}		


	$data['promo_user_data'] = $this->Edit_Model->get_promo_user_data($id);
    $config['upload_path'] = 'uploads/';

    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_width'] = '1024';
    $config['max_height'] = '768';

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $image_data['file_name'] = '';
    
    
    $config['upload_path'] = 'uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_width'] = '4096';
    $config['max_height'] = '4096';

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $image_data['file_name'] = '';

  
    if ($this->upload->do_upload('personal_photo')) {
        $image_data = $this->upload->data();
    } else if(!empty($this->input->post('imgg'))) {
    	 $image_data['file_name'] =$this->input->post('imgg');
        
    }
  

	$data['get_promo_data']= $this->Edit_Model->get_promo_data($store_front_id);


	if($this->input->post('same')==1)
	{
		$data = array(
			'supplier_id' => $id,
			'category_id' =>$category_id,
			'switch_id'		=> $store_front_id,
			'business_name' => $this->input->post('business_name1'), 
			'personal_bio' => $this->input->post('personal_bio1'),
			'description' => $this->input->post('description1') ,
			'fb' => $this->input->post('fb1'),
			'photo' => $this->input->post('photo1'),
			'instagram' => $this->input->post('instagram1'),
			'linkedin' => $this->input->post('linkedin1'),
			'twitter' =>  $this->input->post('twitter1'),
			'display' => 1
		);
		

		$edit_promo = $this->Edit_Model->edit_promo($data,$store_front_id);


	}else{
		if(!empty($data['get_promo_data']))
    {

    $data = array(
        'supplier_id' => $id,
        'category_id' => $category_id,
        'business_name' => $this->input->post('business_name'), 
        'personal_bio' => $this->input->post('personal_bio'),
        'description' => $this->input->post('busines_detail'),
        'fb' => $this->input->post('fb_link'),
        'photo' => $image_data['file_name'],
        'instagram' => $this->input->post('insta_link'),
        'linkedin' => $this->input->post('linked_in'),
        'twitter' => $this->input->post('twitter_link'),
        'display' => 1

    );
	//print_r($data);die();
    $edit_promo = $this->Edit_Model->edit_promo($data,$store_front_id);
}
else{
    $data = array(
        'supplier_id' => $id,
        'category_id' => $category_id,
        'switch_id'		=> $store_front_id,
        'business_name' => $this->input->post('business_name'), 
        'personal_bio' => $this->input->post('personal_bio'),
        'description' => $this->input->post('busines_detail'),
        'fb' => $this->input->post('fb_link'),
        'photo' => $image_data['file_name'],
        'instagram' => $this->input->post('insta_link'),
        'linkedin' => $this->input->post('linked_in'),
        'twitter' => $this->input->post('twitter_link'),
        'display' => 1
    );
		
        $edit_promo = $this->Create_Model->save_promo($data);
}
    //Set Message
    $this->session->set_flashdata('err', 'Promo Info Edited sucessefully.');
    redirect('supplier/edit/edit_promo_info/'.$store_front_id, 'refresh');
	}
	$this->session->set_flashdata('err', 'Promo Info Edited sucessefully.');
    redirect('supplier/edit/edit_promo_info/'.$store_front_id, 'refresh');

}
}

    
	//ASISH EDIT ---------------------------------------

//public function add_productpackages($userid="",$catid="",$switchid='')
//	{
//
//		date_default_timezone_set('Asia/Kolkata');
//		$date = date("Y-m-d H:i:s");
//		$this->form_validation->set_rules('product_name', 'product_name', 'trim');
//
//		if ($this->form_validation->run() === FALSE) {
//			$data2['weekdays']=$this->Create_Model->product_weekdays();
//			$data2['months']=$this->Create_Model->product_months();
//			$data2['suppcategory']=$this->Create_Model->getCatId($catid);
//			$data2['discount_types']=$this->Create_Model->discounts();
//			
//			$data2['culturals']=$this->Create_Model->culturals();
//			$data2['denominations']=$this->Create_Model->denominations();
//			$data2['languages']=$this->Create_Model->languages();
//			$data2['sports']=$this->Create_Model->sports();
//			//print_r($data2['category']);
//			//echo $this->db->last_query();
//			$this->load->view('admin/theme/header', $data2);
//			$this->load->view('admin/includes/mainmenu',$data2);
//			$this->load->view('supplier/productpackages',@$data2);
//			$this->load->view('admin/includes/footer');
//
//			
//		} else {
//			$data2['weekdays']=$this->Create_Model->product_weekdays();
//			$data2['months']=$this->Create_Model->product_months();
//			$data2['suppcategory']=$this->Create_Model->getCatId($catid);
//			$data2['discount_types']=$this->Create_Model->discounts();
//			
//			$data2['culturals']=$this->Create_Model->culturals();
//			$data2['denominations']=$this->Create_Model->denominations();
//			$data2['languages']=$this->Create_Model->languages();
//			$data2['sports']=$this->Create_Model->sports();
//			//$personal =  $this->input->post('pro_image');
//			$name =  $this->input->post('product_name');
//			$promid =  $this->input->post('promid');
//			$busid =  $this->input->post('busid');
//			$fr = uniqid($name);
//			// print_r($bus );exit();
//			if (!empty($_FILES['pro_image']['name'])) {
//				$config['upload_path'] = 'uploads/';
//				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
//				//$config['encrypt_name'] = TRUE;
//				$config['file_name'] = $fr;
//				//Load upload library and initialize configuration
//				$this->load->library('upload', $config);
//				$this->upload->initialize($config);
//
//				if ($this->upload->do_upload('pro_image')) {
//					$uploadData = $this->upload->data();
//					// unlink("assets/Profile/".$pic);
//					$p_image = $uploadData['file_name'];
//				} else {
//					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
//					redirect('supplier/edit/update_productpackages/'.$switchid);
//				}
//			} 
//			$data = array(
//
//				//'users_id' => $this->session->userdata('admin_id'),
//				//'scid' => $this->input->post('scid'),
//				//'id' => $this->input->post('id'),
//				//'promid' => $this->input->post('promid'),
//				'supplier_id' => $userid,
//				'category_id' => $catid,
//				'switch_id' => $switchid,
//				'product_name' =>  $this->input->post('product_name'),
//				'product_number' =>  $this->input->post('product_number'),
//				'price' => $this->input->post('product_price'),
//				'description' => $this->input->post('product_detail'),
//				'video' => $this->input->post('product_video'),
//				// 'discount' => $this->input->post('discount'),
//				// 'minimum' => $this->input->post('minimum'),
//				// 'maximum' => $this->input->post('maximum'),
//				// 'cost' => $this->input->post('cost'),
//				// 'style' => $this->input->post('style'),
//				// 'discount_days_amt' =>$this->input->post('discount_days_amt'),
//				// 'discount_month_amt' =>$this->input->post('discount_month_amt'),
//				// 'peakdays' => $this->input->post('peakdays'),
//				// 'peakmonths' => $this->input->post('peakmonths'),
//
//				//'discount_multi_type' =>$this->input->post('dis_multi_type'),
//				//'multi_discount_amount'=>$this->input->post('amount'),
//
//				//'discount_day_type' =>$this->input->post('dis_day_type'),
//				//'discount_days_amt'=>$this->input->post('discount_days_amt'),
//				//'days' => $this->input->post('peakdays'),
//
//				//'discount_month_type' =>$this->input->post('dis_month_type'),
//				//'discount_month_amt' =>$this->input->post('discount_month_amt'),
//				//'month' => $this->input->post('peakmonths'),
//				
//				'sports_category' => $this->input->post('category'),
//				'ethinicity' => $this->input->post('ethnicity'),
//				'denomination' => $this->input->post('denomination'),
//				'language' => $this->input->post('language'),
//				
//				//'category' => $this->input->post('category'),
//				//'ethnicity' => $this->input->post('ethnicity'),
//				//'denomination' => $this->input->post('denomination'),
//				//'language' => $this->input->post('language'),
//				// 'lowest' => $this->input->post('lowest'),
//				// 'highest' => $this->input->post('highest'),
//				// 'average' => $this->input->post('average'),
//				'image' => @$p_image,
//				// 'flat_amount'=>$this->input->post('amount'),
//				// 'discount_type'=>$this->input->post('discount_type'),
//
//
//			);
//			
//                                    $this->db->select('*');
//                                    $this->db->from('category_questions');
//                                    $this->db->where('cat_id', $catid);
//                                    $query = $this->db->get();
//                                    $questions = $query->result();
//									if(count($questions)>0)
//									{
//									
//foreach ($questions as $key => $ques) {
//$ans='';
//
//if($ques->ques_type=='text')
//{
//$ans=$this->input->post('txt-'.$ques->id);
//}
//if($ques->ques_type=='numeric')
//{
//$ans=$this->input->post('num-'.$ques->id);
//}
//if($ques->ques_type=='radio')
//{
//$ans=$this->input->post('ans-'.$ques->id);
//}
//if($ques->ques_type=='checkbox')
//{
////print_r($this->input->post('chk'.$ques->id));
//$ans=implode(",",$this->input->post('chk'.$ques->id));
//}
//if(!empty($ans))
//{
//$data2 = array('switch_id' => $switchid,'question_id' => $ques->id,'answer' => $ans);
//$res2 = $this->Create_Model->Insert_question_answer($data2);
//}
//}	
//
//}		
//			
//			// print_r($data);exit();
//			//$promoId = $this->input->post('promid');
//			//$getCatId = $this->dashboard_model->getCatId($promoId);//print_r($getCatId);die;
//			//$catId = isset($getCatId->supplier_category_id)?$getCatId->supplier_category_id:'';
//			//$getQuestionsByCatId = $this->dashboard_model->QuestionsByCatId($catId);
//
////			foreach ($getQuestionsByCatId as $key => $value) {
////				$quesId = $value->id;
////				$answers = $this->input->post($quesId.'_answer');
////				if(empty($answers)){
////					$answers = '';
////				}
////				$dataArr = [
////					"supplier_bnk_info_id"=> $promoId,
////					"questionnaire_id"=> $quesId,
////					"answer"=> $answers
////				];
////				$this->dashboard_model->insertAnswer($dataArr);
////			}
//
//			$res = $this->Create_Model->Insert_product_info($data);
//			//echo $this->db->last_query();exit;
////			$productArr = [
////				'supplier_promo_info_id' => $this->input->post('promid'),
////				'product_name' =>  $this->input->post('product_name'),
////				'product_price' => $this->input->post('product_price'),
////				'product_desc' => $this->input->post('product_detail'),
////				'product_video' => $this->input->post('product_video'),
////				'product_package_id' => $res
////			];
////			$insertId = $this->dashboard_model->insertProduct($productArr);
//			// print_r($res);exit();
//			if ($res) {
//				// $busid = $this->input->post('busid');
//				// $scid  = $this->input->post('scid');
//				redirect('supplier/edit/update_productpackages/'.$switchid);
//
//				// redirect("admin/promoinfo?busid=$busid&scid=".$scid);
//
//			} else {
//				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
//				redirect('supplier/edit/update_productpackages/'.$switchid);
//
//			}
//		}
//	}
//
//	public function update_productpackages($switchid='')
//	{//print_r($_POST);die;
//		$data2['title']="edit Products Details";
//		
//
//		if($this->input->post('previous'))
//		{
//			redirect("dashboard/edit_prominfok/".$this->session->userdata('promo_info'));
//		}
//		date_default_timezone_set('Asia/Kolkata');
//		$date = date("Y-m-d H:i:s");
//		$this->form_validation->set_rules('product_name', 'product_name', 'trim');
//
//		if ($this->form_validation->run() === FALSE) {
//			@$data2['service'] = $this->Edit_Model->getDatap('supplier_product_packages', $switchid);
//			//print_r($data2['service']);exit;
//			$data2['weekdays']=$this->Create_Model->product_weekdays();
//			$data2['months']=$this->Create_Model->product_months();
//			$data2['suppcategory']=$this->Create_Model->getCatId(@$data2['service'][0]['category_id']);
//			$data2['discount_types']=$this->Create_Model->discounts();
//			$data2['culturals']=$this->Create_Model->culturals();
//			$data2['denominations']=$this->Create_Model->denominations();
//			$data2['languages']=$this->Create_Model->languages();
//			$data2['sports']=$this->Create_Model->sports();
////			$this->load->view('administrator/header-script');
////			$this->load->view('administrator/header');
////			$this->load->view('administrator/header-bottom');
////			$this->load->view('supplier/editproductpackages',@$data2);
////			$this->load->view('administrator/footer');
//			$this->load->view('admin/includes/header', $data2);
//			$this->load->view('admin/includes/mainmenu',$data2);
//			$this->load->view('admin/edit_productpackages', $data2);
//			$this->load->view('admin/includes/footer');
//
//		} else {
//			$data2['service'] = $this->Edit_Model->getDatap('supplier_product_packages', $switchid);
//			$data2['weekdays']=$this->Create_Model->product_weekdays();
//			$data2['months']=$this->Create_Model->product_months();
//			$data2['suppcategory']=$this->Create_Model->getCatId($data2['service'][0]['category_id']);
//			$data2['discount_types']=$this->Create_Model->discounts();
//			$data2['culturals']=$this->Create_Model->culturals();
//			$data2['denominations']=$this->Create_Model->denominations();
//			$data2['languages']=$this->Create_Model->languages();
//			$data2['sports']=$this->Create_Model->sports();
//			$personal =  $this->input->post('pro_image');
//			$bus =  $this->input->post('product_name');
//			// print_r($bus );exit();
//			$fr = uniqid($bus);
//			if (!empty($_FILES['pro_image']['name'])) {
//				$config['upload_path'] = 'uploads/';
//				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
//				//$config['encrypt_name'] = TRUE;
//				$config['file_name'] = $fr;
//				//Load upload library and initialize configuration
//				$this->load->library('upload', $config);
//				$this->upload->initialize($config);
//
//				if ($this->upload->do_upload('pro_image')) {
//					$uploadData = $this->upload->data();
//					// unlink("assets/Profile/".$pic);
//					$p_image = $uploadData['file_name'];
//				} else {
//					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
//					redirect('supplier/edit/update_productpackages/'.$switchid);
//				}
//			} else {
//				$p_image = $personal;
//			}
//			$data = array(
//
//				'supplier_id' => $data2['service'][0]['supplier_id'],
//				'product_name' =>  $this->input->post('product_name'),
//				'product_number' =>  $this->input->post('product_number'),
//				'price' => $this->input->post('product_price'),
//				'description' => $this->input->post('product_detail'),
//				'video' => $this->input->post('product_video'),
//				// 'discount' => $this->input->post('discount'),
//				// 'minimum' => $this->input->post('minimum'),
//				// 'maximum' => $this->input->post('maximum'),
//				// 'cost' => $this->input->post('cost'),
//				// 'style' => $this->input->post('style'),
//				//'discount_multi_type' =>$this->input->post('dis_multi_type'),
//				//'multi_discount_amount'=>$this->input->post('amount'),
//
//				//'discount_day_type' =>$this->input->post('dis_day_type'),
//				//'discount_days_amt'=>$this->input->post('discount_days_amt'),
//				//'days' => $this->input->post('peakdays'),
//
//				//'discount_month_type' =>$this->input->post('dis_month_type'),
//				//'discount_month_amt' =>$this->input->post('discount_month_amt'),
//				//'month' => $this->input->post('peakmonths'),
//				
//				'sports_category' => $this->input->post('category'),
//				'ethinicity' => $this->input->post('ethnicity'),
//				'denomination' => $this->input->post('denomination'),
//				'language' => $this->input->post('language'),
//
//				// 'lowest' => $this->input->post('lowest'),
//				// 'highest' => $this->input->post('highest'),
//				// 'average' => $this->input->post('average'),
//				'image' => @$p_image,
//				
//				
//
//
//			);
//			
//                                    $this->db->select('*');
//                                    $this->db->from('category_questions');
//                                    $this->db->where('cat_id', @$data2['service'][0]['category_id']);
//                                    $query = $this->db->get();
//									//echo $this->db->last_query();exit;
//                                    $questions = $query->result();
//									if(count($questions)>0)
//									{
//									$res3 = $this->Edit_Model->delete_question_answer($this->uri->segment(4));
//									
//foreach ($questions as $key => $ques) {
//$ans='';
//
//if($ques->ques_type=='text')
//{
//$ans=$this->input->post('txt-'.$ques->id);
//}
//if($ques->ques_type=='numeric')
//{
//$ans=$this->input->post('num-'.$ques->id);
//}
//if($ques->ques_type=='radio')
//{
//$ans=$this->input->post('ans-'.$ques->id);
//}
//if($ques->ques_type=='checkbox')
//{
////print_r($this->input->post('chk'.$ques->id));
//$ans=implode(",",$this->input->post('chk'.$ques->id));
//}
//
//$data2 = array('switch_id' => $switchid,'question_id' => $ques->id,'answer' => $ans);
//
//$res2 = $this->Create_Model->Insert_question_answer($data2);
//}	
//
//}		
//			
//			//print_r($data);exit();
//
//			$res = $this->Edit_Model->update_product_info($data,$switchid);
////			$masterId = $this->input->post('masterId');
////			//insert question answers
////			$getCatId = $this->dashboard_model->getCatId($masterId);
////			$catId = isset($getCatId->supplier_category_id)?$getCatId->supplier_category_id:'';
////			$getQuestionsByCatId = $this->dashboard_model->QuestionsByCatId($catId);
////
////			foreach ($getQuestionsByCatId as $key => $value) {
////				$quesId = $value->id;
////				$answers = $this->input->post($quesId.'_answer');
////				$dataArr = [
////					"supplier_bnk_info_id"=> $masterId,
////					"questionnaire_id"=> $quesId,
////					"answer"=> $answers
////				];
////				$this->dashboard_model->insertAnswer($dataArr);
////			}
//			// print_r($res);exit();
//			if ($res) {
//				redirect('supplier/edit/update_productpackages/'.$switchid);
//			} else {
//				redirect('supplier/edit/update_productpackages/'.$switchid);
//			}
//		}
//	}
	
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
	if (!empty($_FILES['pro_image']['name'])) {
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				//$config['encrypt_name'] = TRUE;
				$config['file_name'] = @$fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('pro_image')) {
					$uploadData = $this->upload->data();
					// unlink("assets/Profile/".$pic);
					$p_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
				redirect('supplier/edit/update_productpackages/'.$prid,'refresh');
				}
			}
	$productArr = [
		"package_id" => $prid,
		"product_name" => $product_name,
		"product_number" =>$product_number,
		"price" => $product_price,
		"description" => $product_detail,
		"video" => $product_video,
		"image" => @$p_image,
	];
	if($this->input->post('product_id')){
		$productArr = [
		"package_id" => $prid,
		"product_name" => $product_name,
		"product_number" =>$product_number,
		"price" => $product_price,
		"description" => $product_detail,
		"video" => $product_video,
		"image" => @$p_image,
		];

			$this->Edit_Model->updateProduct($this->input->post('product_id'),$productArr);
				redirect('supplier/edit/update_productpackages/'.$prid,'refresh');

	}else {
		$insertId = $this->Edit_Model->insertProduct($productArr);
		if(!empty($insertId)){
			if($this->input->post('type')=='edit'){
				redirect('supplier/edit/update_productpackages/'.$prid.'','refresh');
			}else {
				redirect('supplier/edit/update_productpackages/'.$prid,'refresh');
			}
		}
	}


}
//
public function deleteProductPackage(){

	$promid = $this->input->post('promid');
	$busid = $this->input->post('busid');
	//$id = $this->input->post('id');
	$data = array();
	$getCountProducts = $this->dashboard_model->getProductCount($busid);
	if($getCountProducts =='1'){
		$this->dashboard_model->deleteMasterProductPackage($promid);
	}
	$this->form_validation->set_rules('id', 'Product Package ID', 'required');
	if ($this->form_validation->run() == TRUE) {
		$product_priceackageId = $this->input->post('id');
		$data = array(
			'status' => 'Deleted'
		);

		if ($this->Edit_Model->deleteProductPackage($product_priceackageId)){
			$message = "The ProductPackage has been deleted errfully...";
		}
	}else{
		$message = "Error.";
	}
	$this->session->set_flashdata('err', $message);
	//redirect('supplier/edit/update_productpackages/'.$busid);
	header('Location: ' . $_SERVER['HTTP_REFERER']);

}
//	
//
//
//	//=====================update bank detail======================================
//	
//	public function add_bankdetail($userid='',$catid='',$switchid='')
//	{
//		//date_default_timezone_set('Asia/Kolkata');
//		$date = date("Y-m-d H:i:s");
//		$this->form_validation->set_rules('bank_name', 'Slug', 'trim');
//		if ($this->form_validation->run() === FALSE) {
//			$data2['states']=$this->State_Model->listsofState();
//			$data2['suppcategory']=$this->Create_Model->getCatId($catid);
//
//			$this->load->view('admin/includes/header', $data2);
//				$this->load->view('admin/includes/mainmenu', $data2);
//				$this->load->view('admin/bank_details' , $data2);
//				$this->load->view('admin/includes/footer', $data2);
//		} else {
//			$data2['states']=$this->State_Model->listsofState();
//			$data2['suppcategory']=$this->Create_Model->getCatId($catid);
//			$data = array(
//				'supplier_id'        =>  $userid,
//				'category_id'        =>  $catid,
//				'switch_id' => $switchid,
//				'bank_name' =>  $this->input->post('bank_name'),
//				'account_number' =>  $this->input->post('account_nr'),
//				'routing_number' =>  $this->input->post('routing_nr'),
//				'city_id'   =>  $this->input->post('city_id'),
//				'address2'   =>  $this->input->post('bank_addr2'),
//				'address1'   =>  $this->input->post('bank_addr1'),
//				'state_id'   =>  $this->input->post('State_id'),
//				'zip_code'   =>  $this->input->post('zipcode'),
//				'cc_number'   =>  $this->input->post('ccnr'),
//				
//				'cc_date'   =>  $this->input->post('ccdate'),
//				'paypal_address'   =>  $this->input->post('paypal_addr'),
//				//'Default'   =>  $this->input->post('Default'),
//				'cvc'   =>  $this->input->post('ccvc'),
//				'months' => $this->input->post('month'),
//				'years' => $this->input->post('year'),
//				'ccstate' => $this->input->post('state'),
//				'cccity' => $this->input->post('city'),
//				
//				'holder_name'=>$this->input->post('holder_name'),
//				'cc_number'=>$this->input->post('cc_number'),
//				'billing_address'=>$this->input->post('billing_address'),
//				'billing_zipcode'=>$this->input->post('billing_zipcode'),
//				"load_default"=>$this->input->post('Default'),
//				"same_email_business"=>$this->input->post('same_email'),
//
//			);
//			// print_r($data);exit();
//
//			$res = $this->Create_Model->Insert_bank_info($data);
//
//			if ($res) {
//				// print_r($res);exit();
//				// $busid = $this->input->post('busid');
//
//				redirect("supplier/edit/update_bankdetail/" . $switchid,'refresh');
//			} else {
//				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
//				redirect("supplier/edit/update_bankdetail/" . $switchid,'refresh');
//			}
//		}
//	}
//	
//	public function update_bankdetail($switchid='')
//	{
//		$data2['title']="edit Bank Details";
//		$data['categoryname']=$this->Edit_Model->selectCategoryname($switchid);
//
//		if($this->input->post('previous'))
//		{
//			redirect("dashboard/edit_productinfok/".$this->session->userdata('product_info'));
//		}
//		date_default_timezone_set('Asia/Kolkata');
//		$date = date("Y-m-d H:i:s");
//		$this->form_validation->set_rules('bank_name', 'Slug', 'trim');
//		if ($this->form_validation->run() === FALSE) {
//			@$data2['service'] = $this->Edit_Model->getDatap('supplier_bank_details', $switchid);
//			$data2['states']=$this->State_Model->listsofState();
////			$this->load->view('administrator/header-script');
////			$this->load->view('administrator/header');
////			$this->load->view('administrator/header-bottom');
////			$this->load->view('supplier/edit_bankdetails',@$data2);
////			$this->load->view('administrator/footer');
//			$this->load->view('admin/includes/header', $data2);
//				$this->load->view('admin/includes/mainmenu', $data2);
//				$this->load->view('admin/edit_bankdetails' , $data2);
//				$this->load->view('admin/includes/footer', $data2);
//		} else {
//			@$data2['service'] = $this->Edit_Model->getDatap('supplier_bank_details', $switchid);
//			$data2['states']=$this->State_Model->listsofState();
//			$data = array(
//				'supplier_id'    =>  $data2['service'][0]['supplier_id'],
//				'bank_name' =>  $this->input->post('bank_name'),
//				'account_number' =>  $this->input->post('account_nr'),
//				'routing_number' =>  $this->input->post('routing_nr'),
//				'city_id'   =>  $this->input->post('city_id'),
//				'address2'   =>  $this->input->post('bank_addr2'),
//				'address1'   =>  $this->input->post('bank_addr1'),
//				'state_id'   =>  $this->input->post('State_id'),
//				'zip_code'   =>  $this->input->post('zipcode'),
//				'cc_number'   =>  $this->input->post('ccnr'),
//				'cc_date'   =>  $this->input->post('ccdate'),
//				'paypal_address'   =>  $this->input->post('paypal_addr'),
//				//'Default'   =>  $this->input->post('Default'),
//				'cvc'   =>  $this->input->post('ccvc'),
//				'months' => $this->input->post('month'),
//				'years' => $this->input->post('year'),
//				'ccstate' => $this->input->post('state'),
//				'cccity' => $this->input->post('city'),
//				'holder_name'=>$this->input->post('holder_name'),
//				'cc_number'=>$this->input->post('cc_number'),
//				'billing_address'=>$this->input->post('billing_address'),
//				'billing_zipcode'=>$this->input->post('billing_zipcode'),
//				//"load_default"=>$this->input->post('Default'),
//				//"same_email"=>$this->input->post('same_email'),
//
//			);
//
//			//print_r($data);exit();
//
//			$res = $this->Edit_Model->update_bank_info($data,$switchid);
////echo $this->db->last_query();exit;
//			if ($res) {
//				// $busid = $this->input->post('busid');
//				$id = $this->input->post('id');
//				redirect("supplier/edit/update_bankdetail/" . $switchid,'refresh');
//			} else {
//				$id = $this->input->post('id');
//				redirect("supplier/edit/update_bankdetail/" . $switchid);
//			}
//		}
//	}


    function insertProduct($data){
       $this->db->set($data);
        $this->db->insert('supplier_products', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
     }
     function updateProduct($id, $data) {

       $this->db->where('id', $id);
       if ($this->db->update('supplier_products', $data)) {
         return true;
       }
       else {
         return false;
       }
     }
   
  //  public function deleteProductPackage($promid){
    //  $this->db->where('id', $promid);
     // $result = $this->db->delete('supplier_products');
     // return $result?true:false;
   // }
  
  public function delete_question_answer($switch){
    $this->db->where('switch_id', $switch);
        $result = $this->db->delete('supplier_question_answer');
    return $result;
  }
   
  public function getDatap($table = '', $id = '')
{

//    if($id)
//    {
//        $sql = "SELECT * FROM $table WHERE supplier_promo_info_id = ?";
//        $query = $this->db->query($sql, array($id));
//        $result = $query->result_array();
//        if(empty($result))
//        {
//          $sql = "SELECT * FROM $table ORDER BY id DESC";
//          $query = $this->db->query($sql, array());
//          $result = $query->result_array();
//        }
//    }
//    else
//    {
//        $sql = "SELECT * FROM $table ORDER BY id DESC";
//        $query = $this->db->query($sql, array());
//        $result = $query->result_array();
//    }
  $query = $this->db->get_where($table, array('switch_id' => $id));
  $result = $query->result_array();
    return $result;
}

  
  public function update_product_info($data,$switchid){
  
    $ethnicity =empty($data['ethinicity'])?"":implode(',',$data['ethinicity']);
  $data['ethinicity']=$ethnicity;
    $category =empty($data['sports_category'])?"":implode(',',$data['sports_category']);
  $data['sports_category']=$category;
    $denomination =$data['denomination'];
  $data['denomination']=$denomination;
    $language=empty($data['language'])?"":implode(',',$data['language']);
  $data['language']=$language;
    if(!empty($data[days])){
      $data['days'] = implode(",",$data[days]);
    }else{
      $data['days']="";
    }

    if(!empty($data['month'])){
      $data['month'] = implode(",",$data['month']);
    }else{
      $data['month']="";
    }
  
    if(!empty($photos)){
      $photo = $photos;
    }else{
      $photo="";
    }

  $this->db->where('switch_id', $switchid);
  return $this->db->update('supplier_product_packages', $data);
  
  }
//update bankdetails=======================================
public function update_bank_info($data,$switchid){

  $this->db->where('switch_id', $switchid);
  return $this->db->update('supplier_bank_details', $data);

}
  public function Insert_bank_info($data){

        $this->db->insert('supplier_bank_details', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;

  }

	
	


	}