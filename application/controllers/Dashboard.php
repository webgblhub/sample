<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
//test
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->model('dashboard_model');
	}


	public function view($page = '', $data = NULL)
	{

		if ($this->session->userdata('admin_logged')) {
			if ($page == '') {
				$page = 'dashboard';
			}

			$data['title'] = ucwords(str_replace('-', ' ', $page));

			// $data['category'] = $this->dashboard_model->getData('event_dragon_supplier_category');
			$data['category'] = $this->dashboard_model->gets_store_category();
			$data['eventcats'] = $this->dashboard_model->gets_event_category();
			$data['business_eventcats'] = $this->dashboard_model->gets_business_event_category();
			$data['weekdays'] = $this->dashboard_model->product_weekdays();
			$data['months'] = $this->dashboard_model->product_months();
			$data['discount_types'] = $this->dashboard_model->getDiscountType();
			//join
			$adid = $this->session->userdata('admin_id');
			$data['details'] = $this->dashboard_model->gets_storefront_category($adid);
			$data['sport_category']=$this->dashboard_model->getData('event_supplier_sports_category','');




			$data['db_obj'] = $this->dashboard_model;
			$data['map'] = $this->load_media();

			$this->load->view('admin/theme/header', $data);
			$this->load->view('admin/' . $page, $data);
			$this->load->view('admin/theme/footer');
		} else {
			$this->load->view('admin/theme/top', $data);
			$this->load->view('admin/login', $data);
		}
	}

	// ------------------------------------------------------------------------------------------------------------------------------------
	// ------------------------------------------------------------------------------------------------------------------------------------
public function bankdetails()
{
	$user_id=$this->session->userdata('admin_id');
	echo  json_encode($this->dashboard_model->getbankdeatils('default_bank',$user_id));

}

public function emailcheck()
{
	$from_email = "a.harish2905@gmail.com";
	$to_email = "a.harish2905@gmail.com";

	//Load email library
	$this->load->library('email');

	$this->email->from($from_email, 'hari');
	$this->email->to($to_email);
	$this->email->subject('Email Test');
	$this->email->message('Testing the email class.');

	//Send mail
	if($this->email->send())
	print_r('ok');
	else
	print_r('false');
}

	public function media()
	{
		$data = [];
		$files = $_FILES;
		$count = count($_FILES['photo']['name']);

		if (is_uploaded_file($_FILES['photo']['tmp_name'][0])) {
			for ($i = 0; $i < $count; $i++) {
				$_FILES['photo']['name']	= $files['photo']['name'][$i];
				$_FILES['photo']['type'] 	= $files['photo']['type'][$i];
				$_FILES['photo']['tmp_name'] = $files['photo']['tmp_name'][$i];
				$_FILES['photo']['error']	= $files['photo']['error'][$i];
				$_FILES['photo']['size']	= $files['photo']['size'][$i];

				$this->upload->initialize($this->upload_options('media/'));

				if ($this->upload->do_upload('photo')) {
					if (($_FILES['photo']['type'] != 'application/pdf') && ($_FILES['photo']['size'] >= '364000')) {
						$config['image_library'] = 'gd2';
						$config['source_image'] = FCPATH . 'uploads/media/' . $this->upload->data()['file_name'];
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = TRUE;
						$config['quality'] = 85;
						$config['width'] = 1200;
						$config['height'] = 1200;
						$config['new_image'] = FCPATH . 'uploads/media/' . $this->upload->data()['file_name'];
						$this->image_lib->clear();
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
					}

					$data['photos'][$i] = $this->upload->data()['file_name'];
				}
			}
			redirect('admin/media', 'refresh');
		} else {
			redirect('admin/media', 'refresh');
		}
	}

	public function dynamic_media()
	{
		return TRUE;
		$data = [];
		$files = $_FILES;
		$count = count($_FILES['photo']['name']);

		if (is_uploaded_file($_FILES['photo']['tmp_name'][0])) {
			for ($i = 0; $i < $count; $i++) {
				$_FILES['photo']['name']	= $files['photo']['name'][$i];
				$_FILES['photo']['type'] 	= $files['photo']['type'][$i];
				$_FILES['photo']['tmp_name'] = $files['photo']['tmp_name'][$i];
				$_FILES['photo']['error']	= $files['photo']['error'][$i];
				$_FILES['photo']['size']	= $files['photo']['size'][$i];

				$this->upload->initialize($this->upload_options('media/'));

				if ($this->upload->do_upload('photo')) {
					if (($_FILES['photo']['type'] != 'application/pdf') && ($_FILES['photo']['size'] >= '364000')) {
						$config['image_library'] = 'gd2';
						$config['source_image'] = FCPATH . 'uploads/media/' . $this->upload->data()['file_name'];
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = TRUE;
						$config['quality'] = 85;
						$config['width'] = 1200;
						$config['height'] = 1200;
						$config['new_image'] = FCPATH . 'uploads/media/' . $this->upload->data()['file_name'];
						$this->image_lib->clear();
						$this->image_lib->initialize($config);
						$this->image_lib->resize();
					}

					$data['photos'][$i] = $this->upload->data()['file_name'];
				}
			}
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function load_media()
	{
		$dir = "uploads/media/";
		chdir($dir);
		array_multisort(array_map('filemtime', ($map = glob("*.*"))), SORT_DESC, $map);
		return $map;
	}

	public function delete_media_item()
	{
		$item = $this->input->post('item');
		$path = FCPATH . 'uploads/media/' . $item;
		@unlink($path);
		echo true;
		exit();
	}

	private function upload_options($folder = '')
	{
		$config['upload_path'] = './uploads/' . $folder;
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']     = '204800';

		if (!file_exists($config['upload_path']) && !is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0700, true);
		}

		return $config;
	}

	public function deleteImage($id = '', $table = '', $field = '', $folder = '')
	{
		if ($id && $table) {
			$image = $this->dashboard_model->getSingleVal($id, $table, $field);

			if ($image) {
				$path = FCPATH . 'uploads/' . $folder . '/' . $image;
				@unlink($path);
				return TRUE;
			}
			return FALSE;
		}
		return FALSE;
	}

	public function delete_mail($id = '')
	{

		//var_dump($_POST['checkedvalue']); die();
		if (isset($_POST['checkedvalue'])) {
			$count = count($_POST['checkedvalue']);
			for ($i = 0; $i < $count; $i++) {
				$id = $_POST['checkedvalue'][$i];
				$deleted = $this->dashboard_model->deleteData('mails', $id);
			}
		} else {
			$deleted = $this->dashboard_model->deleteData('mails', $id);
		}
		redirect('admin/list-mail', 'refresh');
	}
	public function view_mail($id)
	{
		$data['mail'] = $this->dashboard_model->getmail($id);
		$this->view('mail-details', $data);
	}
	//=====================================backend================================================================================================

	// .........................................backend..........................................
	public function store_front_category()
	{
		$data['category'] = $this->dashboard_model->gets_store_category();
		// print_r($data['category']);exit();
		$this->load->view("create_storefront", $data);
	}
	public function list_store_front_details()
	{

		$adid = $this->session->userdata('admin_id');

		$data['details'] = $this->dashboard_model->gets_storefront_category($adid);
		print_r($data['details']);
		exit();
	}


	public function create_storefront()
	{

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");

		$this->form_validation->set_rules('title', 'Title', 'trim|required');

		if ($this->form_validation->run() === FALSE) {
			$this->view('create_storefront');
		} else {
			$data = array(
				'id' => $this->input->post('id'),
				'title' => $this->input->post('title'),
				'users_id' => $this->session->userdata('admin_id'),
			);

			$res = $this->dashboard_model->Insert_create_store_front($data);
			// print_r($res);exit();

			if ($res) {

				// print_r($xd);exit();
				$scid = $this->input->post('title');
				// redirect("business_info.php?scid=".$store_front_category_id."&last_id=".$last_id);
				redirect("admin/business_info?scid=$scid&bus_id=" . $res);
				// redirect('admin/business_info', 'refresh');
			} else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				$this->view('add-service');
			}
		}
	}

	// public function edit_service($id = '')
	// {
	//   $data['service'] = $this->dashboard_model->getData('limo_service',$id);
	//   $this->view('add-service', $data);
	// }
	//
	// public function delete_service($id = '')
	// {
	// 	$deleted = $this->dashboard_model->deleteData('limo_service',$id);
	// 	redirect('admin/list-services', 'refresh');
	// }

	//===========================business info================================
	public function add_businessinfo()
	{

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('first_name', 'Slug', 'trim');

		if ($this->form_validation->run() === FALSE) {
			$this->view('business_info');
		} else {
			$name =  $this->input->post('first_name');
			$certify =  $this->input->post('certify');

			$fr = uniqid($name);
			if (!empty($_FILES['certify']['name'])) {
				$config['upload_path'] = 'uploads/';
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
					redirect('admin/business_info');
				}
			} else {
				$sp_image = $certify;
			}

			$name =  $this->input->post('first_name');
			$photo =  $this->input->post('photo');

			$fr = uniqid($name);
			if (!empty($_FILES['photo']['name'])) {
				$config['upload_path'] = 'uploads/';
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
					redirect('admin/business_info');
				}
			} else {
				$p_image = $photo;
			}


			$data = array(
				'id' => $this->input->post('id'),
				'users_id' => $this->session->userdata('admin_id'),
				'scid' => $this->input->post('scid'),
				'prefix' => $this->input->post('name_prefix'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'Company_name' => $this->input->post('Company_name'),
				'email_address' => $this->input->post('email_address'),
				'description' => $this->input->post('description'),
				'mobile_number' => $this->input->post('mobile_number'),
				'landline_number' => $this->input->post('landline_number'),
				'landline_number_ext' => $this->input->post('landline_number_ext'),
				'fax_number' => $this->input->post('fax_number'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'city_id' => $this->input->post('city_id'),
				'state_id' => $this->input->post('State_id'),
				'accept' => $this->input->post('accept'),
				'zipcode' => $this->input->post('zipcode'),
				'accepteble_travel_miles' => $this->input->post('accepteble_travel_miles'),
				 'dynamic_classification' => $this->input->post('dynamic_classification'),
				'supplier_forms' => $p_image,
				'certify' => $sp_image,
				'nationalwide' => $this->input->post('nationalwide'),
				'supplier_acceptable_event_business_categories_ids'=>$this->input->post('business_accept'),

			);
			// print_r($data);exit();

			$res = $this->dashboard_model->Insert_business_info($data);
			$Company_name = $this->input->post('Company_name');
			$this->session->set_userdata('compnay_name',$Company_name);


			if ($res) {
				$busid = $this->input->post('busid');
				$scid  = $this->input->post('scid');

				redirect("admin/promoinfo?busid=$busid&scid=" . $scid);
			} else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				$this->view('business_info');
			}
		}
	}



	// public function delete_service($id = '')
	// {
	// 	$deleted = $this->dashboard_model->deleteData('limo_service',$id);
	// 	redirect('admin/list-services', 'refresh');
	// }


	//=============================================================
	public function	add_promoinfo()
	{


		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('bus_name', 'Slug', 'trim');
		if ($this->form_validation->run() === FALSE) {
			$this->view('promoinfo');
		} else {

			$bus =  $this->input->post('bus_name');
			$bio =  $this->input->post('bio');
			// print_r($bus );exit();
			$fr = uniqid($bus);
			if (!empty($_FILES['bio']['name'])) {
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				//$config['encrypt_name'] = TRUE;
				$config['file_name'] = $fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('bio')) {
					$uploadData = $this->upload->data();
					// unlink("assets/Profile/".$pic);
					$sp_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					redirect('admin/promoinfo');
				}
			} else {
				$sp_image = $bio;
			}
			//personalphoto
			$personal =  $this->input->post('personal');
			$bus =  $this->input->post('bus_name');
			// print_r($bus );exit();
			$fr = uniqid($bus);
			if (!empty($_FILES['personal']['name'])) {
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				//$config['encrypt_name'] = TRUE;
				$config['file_name'] = $fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('personal')) {
					$uploadData = $this->upload->data();
					// unlink("assets/Profile/".$pic);
					$p_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					redirect('admin/promoinfo');
				}
			} else {
				$p_image = $personal;
			}



			$data = array(
				'id' => $this->input->post('id'),
				'promid' => $this->input->post('promid'),
				'scid' => $this->input->post('scid'),
				'users_id'        =>  $this->session->userdata('admin_id'),
				'personal_bio'    =>  $this->input->post('bio'),
				'personal_photo'  =>  $p_image,
				'business_info_id' =>  $this->input->post('businessid'),
				'business_name'   =>  $this->input->post('bus_name'),
				'business_desc'   =>  $this->input->post('bus_detail'),
				// 'business_logo'   =>  $this->input->post('photo'),
				'business_fb_link'   =>  $this->input->post('fb'),
				'business_linkedin_link'   =>  $this->input->post('linkedin'),
				'business_instagram_link'   =>  $this->input->post('insta'),
				'business_twitter_link'   =>  $this->input->post('tweet'),
				'busyid'   =>  $this->input->post('busyid'),
				'supyid'   =>  $this->input->post('supyid'),


			);
			// print_r($data);exit();

			$res = $this->dashboard_model->Insert_promo_info($data);

			if ($res) {
				// $busid = $this->input->post('busid');

				redirect("admin/productpackages?promid=" . $res."&busid=".$this->input->post('businessid'));
			} else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				$this->view('business_info');
			}
		}
	}
	//=========================================product packages=================================


	public function add_productpackages()
	{//print_r($_POST);die;
 
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('product_name', 'product_name', 'trim');

		if ($this->form_validation->run() === FALSE) {
			$this->view('productpackages');
		} else {

			$personal =  $this->input->post('pro_image');
			$bus =  $this->input->post('product_name');
			$promid =  $this->input->post('promid');
			$busid =  $this->input->post('busid');
			// print_r($bus );exit();
			$fr = uniqid($bus);
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
					redirect('admin/promoinfo');
				}
			} else {
				$p_image = $personal;
			}
			$data = array(

				'users_id' => $this->session->userdata('admin_id'),
				'scid' => $this->input->post('scid'),
				'id' => $this->input->post('id'),
				'promid' => $this->input->post('promid'),
				'product_name' =>  $this->input->post('product_name'),
				'product_number' =>  $this->input->post('product_number'),
				'product_price' => $this->input->post('product_price'),
				'product_detail' => $this->input->post('product_detail'),
				'product_video' => $this->input->post('product_video'),
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
				'peakdays' => $this->input->post('peakdays'),

				'discount_month_type' =>$this->input->post('dis_month_type'),
				'discount_month_amt' =>$this->input->post('discount_month_amt'),
				'peakmonths' => $this->input->post('peakmonths'),

				
				'category' => $this->input->post('category'),
				'ethnicity' => $this->input->post('ethnicity'),
				'denomination' => $this->input->post('denomination'),
				'language' => $this->input->post('language'),
				// 'lowest' => $this->input->post('lowest'),
				// 'highest' => $this->input->post('highest'),
				// 'average' => $this->input->post('average'),
				'pro_image' => $p_image,
				// 'flat_amount'=>$this->input->post('amount'),
				// 'discount_type'=>$this->input->post('discount_type'),


			);
			// print_r($data);exit();
$promoId = $this->input->post('promid');
			$getCatId = $this->dashboard_model->getCatId($promoId);//print_r($getCatId);die;
			$catId = isset($getCatId->supplier_category_id)?$getCatId->supplier_category_id:'';
			$getQuestionsByCatId = $this->dashboard_model->QuestionsByCatId($catId);

			foreach ($getQuestionsByCatId as $key => $value) {
				$quesId = $value->id;
				$answers = $this->input->post($quesId.'_answer');
				if(empty($answers)){
					$answers = '';
				}
				$dataArr = [
					"supplier_bnk_info_id"=> $promoId,
					"questionnaire_id"=> $quesId,
					"answer"=> $answers
				];
				$this->dashboard_model->insertAnswer($dataArr);
			}

			$res = $this->dashboard_model->Insert_product_info($data);
			$productArr = [
				'supplier_promo_info_id' => $this->input->post('promid'),
				'product_name' =>  $this->input->post('product_name'),
				'product_price' => $this->input->post('product_price'),
				'product_desc' => $this->input->post('product_detail'),
				'product_video' => $this->input->post('product_video'),
				'product_package_id' => $res
			];
			$insertId = $this->dashboard_model->insertProduct($productArr);
			// print_r($res);exit();
			if ($res) {
				// $busid = $this->input->post('busid');
				// $scid  = $this->input->post('scid');
				redirect('admin/productpackages?promid='.$promid.'&busid='.$busid.'');


				// redirect("admin/promoinfo?busid=$busid&scid=".$scid);

			} else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				$this->view('business_info');
			}
		}
	}


	//bankdetail=====================================================================
	public function add_bankdetail()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('bank_name', 'Slug', 'trim');
		if ($this->form_validation->run() === FALSE) {
			$this->view('promoinfo');
		} else {

			$data = array(
				'id' => $this->input->post('id'),
				'prod_id' => $this->input->post('prod_id'),
				'users_id'        =>  $this->session->userdata('admin_id'),
				'bank_name' =>  $this->input->post('bank_name'),
				'account_nr' =>  $this->input->post('account_nr'),
				'routing_nr' =>  $this->input->post('routing_nr'),
				'city'   =>  $this->input->post('city'),
				'bank_addr2'   =>  $this->input->post('bank_addr2'),
				'bank_addr1'   =>  $this->input->post('bank_addr1'),
				'state'   =>  $this->input->post('state'),
				'zipcode'   =>  $this->input->post('zipcode'),
				'ccnr'   =>  $this->input->post('ccnr'),
				'ccdate'   =>  $this->input->post('ccdate'),
				'paypal_addr'   =>  $this->input->post('paypal_addr'),
				'Default'   =>  $this->input->post('Default'),
				'ccvc'   =>  $this->input->post('ccvc'),
				'month' => $this->input->post('month'),
				'year' => $this->input->post('year'),
				'holder_name'=>$this->input->post('holder_name'),
				'cc_number'=>$this->input->post('cc_number'),
				'billing_address'=>$this->input->post('billing_address'),
				'billing_zipcode'=>$this->input->post('billing_zipcode'),
				"load_default"=>$this->input->post('Default'),
				"same_email"=>$this->input->post('same_email'),

			);
			// print_r($data);exit();

			$res = $this->dashboard_model->Insert_bank_info($data);

			if ($res) {
				// print_r($res);exit();
				// $busid = $this->input->post('busid');

				redirect("admin/photogallery?nkid=" . $res);
			} else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				$this->view('business_info');
			}
		}
	}
	//==============================================================================updation here====================


	//==============================photogallery======================================================================

	//============================================================================================================
	public function update_businessinfo()
	{

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('first_name', 'Slug', 'trim');

		if ($this->form_validation->run() === FALSE) {
			$this->view('business_info');
		} else {
			$name =  $this->input->post('first_name');
			$certify =  $this->input->post('certify');

			$fr = uniqid($name);
			if (!empty($_FILES['certify']['name'])) {
				$config['upload_path'] = 'uploads/';
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
					redirect('admin/business_info');
				}
			} else {
				$sp_image = $certify;
			}

			$name =  $this->input->post('first_name');
			$photo =  $this->input->post('photo');

			$fr = uniqid($name);
			if (!empty($_FILES['photo']['name'])) {
				$config['upload_path'] = 'uploads/';
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
					redirect('admin/business_info');
				}
			} else {
				$p_image = $photo;
			}


			$data = array(
				'id' => $this->input->post('id'),
				'users_id' => $this->session->userdata('admin_id'),
				'scid' => $this->input->post('scid'),
				'prefix' => $this->input->post('name_prefix'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'Company_name' => $this->input->post('Company_name'),
				'email_address' => $this->input->post('email_address'),
				'description' => $this->input->post('description'),
				'mobile_number' => $this->input->post('mobile_number'),
				'landline_number' => $this->input->post('landline_number'),
				'landline_number_ext' => $this->input->post('landline_number_ext'),
				'fax_number' => $this->input->post('fax_number'),
				'address1' => $this->input->post('address1'),
				'address2' => $this->input->post('address2'),
				'city_id' => $this->input->post('city_id'),
				'state_id' => $this->input->post('State_id'),
				'accept' => $this->input->post('accept'),
				'zipcode' => $this->input->post('zipcode'),
				'accepteble_travel_miles' => $this->input->post('accepteble_travel_miles'),
				'dynamic_classification' => $this->input->post('dynamic_classification'),
				'nationalwide' => $this->input->post('nationalwide'),
				// 'supplier_forms' => $this->input->post('supplier_forms'),
				'supplier_forms' => $p_image,
				'certify' => $sp_image,
				'supplier_acceptable_event_business_categories_ids'=>$this->input->post('business_accept'),
				// 'busyid'   =>  $this->input->post('busyid'),
				// 'supyid'   =>  $this->input->post('supyid'),

			);





			$res = $this->dashboard_model->update_business_info($data);

			if ($res) {
				$id = $this->input->post('id');
				redirect("dashboard/edit_prominfok/" . $id);
				// redirect("admin/edit_promoinfo?promid=".$res);

				// $data['service'] = $this->dashboard_model->getDatas('event_dragon_supplier_promo_info',$id);
				//
				// $this->view('edit_promoinfo',$data);

			} else {

				$id = $this->input->post('id');

				redirect("dashboard/edit_prominfok/" . $id);
			}
		}
	}

	//update promoinfo=====================================================================================
	public function update_promoinfo()
	{


		if($this->input->post('previous'))
		{
			redirect("dashboard/edit_businessinfo/".$this->input->post('previous_id'));
		}
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('bus_name', 'Slug', 'trim');
		if ($this->form_validation->run() === FALSE) {
			$this->view('promoinfo');
		} else {

			$bus =  $this->input->post('bus_name');
			$bio =  $this->input->post('bio');
			// print_r($bus );exit();
			$fr = uniqid($bus);
			if (!empty($_FILES['bio']['name'])) {
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				//$config['encrypt_name'] = TRUE;
				$config['file_name'] = $fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('bio')) {
					$uploadData = $this->upload->data();
					// unlink("assets/Profile/".$pic);
					$sp_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					redirect('admin/promoinfo');
				}
			} else {
				$sp_image = $bio;
			}
			//personalphoto
			$personal =  $this->input->post('personal');
			$bus =  $this->input->post('bus_name');
			// print_r($bus );exit();
			$fr = uniqid($bus);
			if (!empty($_FILES['personal']['name'])) {
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc';
				//$config['encrypt_name'] = TRUE;
				$config['file_name'] = $fr;
				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('personal')) {
					$uploadData = $this->upload->data();
					// unlink("assets/Profile/".$pic);
					$p_image = $uploadData['file_name'];
				} else {
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					redirect('admin/promoinfo');
				}
			} else {
				$p_image = $personal;
			}


			$data = array(
				'id' => $this->input->post('id'),
				'promid' => $this->input->post('promid'),
				'scid' => $this->input->post('scid'),
				'users_id'        =>  $this->session->userdata('admin_id'),
				'personal_bio'    =>  $this->input->post('bio'),
				'personal_photo'  =>  $p_image,
				'business_info_id' =>  $this->input->post('businessid'),
				'business_name'   =>  $this->input->post('bus_name'),
				'business_desc'   =>  $this->input->post('bus_detail'),
				// 'business_logo'   =>  $this->input->post('photo'),
				'business_fb_link'   =>  $this->input->post('fb'),
				'business_linkedin_link'   =>  $this->input->post('linkedin'),
				'business_instagram_link'   =>  $this->input->post('insta'),
				'business_twitter_link'   =>  $this->input->post('tweet'),
				'busyid'   =>  $this->input->post('busyid'),
				'supyid'   =>  $this->input->post('supyid'),


			);


			// print_r($data);exit();

			$res = $this->dashboard_model->update_promo_info($data);

			if ($res) {
				 $previous_id = $this->input->post('previous_id');
				 $id = $this->input->post('id');
				$catId = $this->input->post('cat_id');
				redirect("dashboard/edit_productinfok/" . $previous_id.'/'.$catId);
				// print_r($id);exit();
				// $data['service'] = $this->dashboard_model->getDatap('event_dragon_supplier_promo_product_packages',$id);
				//
				//
				// $this->view('edit_productpackages',$data);

			} else {
				// $this->session->set_flashdata('err','Something went wrong, Please try again later!');
				// $this->view('business_info');
				$previous_id = $this->input->post('previous_id');
				$id = $this->input->post('id');
				$catId = $this->input->post('cat_id');
				redirect("dashboard/edit_productinfok/" . $previous_id.'/'.$catId);
			}
		}
	}
	public function update_productpackages()
	{//print_r($_POST);die;



		if($this->input->post('previous'))
		{


			redirect("dashboard/edit_prominfok/".$this->session->userdata('promo_info'));
		}
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('product_name', 'product_name', 'trim');

		if ($this->form_validation->run() === FALSE) {
			$this->view('productpackages');
		} else {

			$personal =  $this->input->post('pro_image');
			$bus =  $this->input->post('product_name');
			// print_r($bus );exit();
			$fr = uniqid($bus);
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
					redirect('admin/promoinfo');
				}
			} else {
				$p_image = $personal;
			}
			$data = array(

				'users_id' => $this->session->userdata('admin_id'),
				'scid' => $this->input->post('scid'),
				'id' => $this->input->post('id'),
				'prid' => $this->input->post('prid'),
				'promid' => $this->input->post('promid'),
				'product_name' =>  $this->input->post('product_name'),
				'product_number' =>  $this->input->post('product_number'),
				'product_price' => $this->input->post('product_price'),
				'product_detail' => $this->input->post('product_detail'),
				'product_video' => $this->input->post('product_video'),
				// 'discount' => $this->input->post('discount'),
				// 'minimum' => $this->input->post('minimum'),
				// 'maximum' => $this->input->post('maximum'),
				// 'cost' => $this->input->post('cost'),
				// 'style' => $this->input->post('style'),
				'discount_multi_type' =>$this->input->post('dis_multi_type'),
				'multi_discount_amount'=>$this->input->post('amount'),

				'discount_day_type' =>$this->input->post('dis_day_type'),
				'discount_days_amt'=>$this->input->post('discount_days_amt'),
				'peakdays' => $this->input->post('peakdays'),

				'discount_month_type' =>$this->input->post('dis_month_type'),
				'discount_month_amt' =>$this->input->post('discount_month_amt'),
				'peakmonths' => $this->input->post('peakmonths'),

				'category' => $this->input->post('category'),
				'ethnicity' => $this->input->post('ethnicity'),
				'denomination' => $this->input->post('denomination'),
				'language' => $this->input->post('language'),
				// 'lowest' => $this->input->post('lowest'),
				// 'highest' => $this->input->post('highest'),
				// 'average' => $this->input->post('average'),
				'pro_image' => $p_image,
				
				


			);
			//print_r($data);exit();

			$res = $this->dashboard_model->update_product_info($data);
			$masterId = $this->input->post('masterId');
			//insert question answers
			$getCatId = $this->dashboard_model->getCatId($masterId);
			$catId = isset($getCatId->supplier_category_id)?$getCatId->supplier_category_id:'';
			$getQuestionsByCatId = $this->dashboard_model->QuestionsByCatId($catId);

			foreach ($getQuestionsByCatId as $key => $value) {
				$quesId = $value->id;
				$answers = $this->input->post($quesId.'_answer');
				$dataArr = [
					"supplier_bnk_info_id"=> $masterId,
					"questionnaire_id"=> $quesId,
					"answer"=> $answers
				];
				$this->dashboard_model->insertAnswer($dataArr);
			}
			// print_r($res);exit();
			if ($res) {
				$id = $this->input->post('id');

				//


			//	print_r($scid);die;
			///	redirect('dashboard/edit_productinfok/'.$this->input->post('lastId').'');

				 redirect('dashboard/edit_bankinfok/'.$id.'');

			} else {
				$id = $this->input->post('id');
				redirect('dashboard/edit_bankinfok/'.$id.'');
			}
		}
	}
	//=====================update bank detail======================================
	public function update_bankdetail()
	{


		if($this->input->post('previous'))
		{


			redirect("dashboard/edit_productinfok/".$this->session->userdata('product_info'));
		}
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('bank_name', 'Slug', 'trim');
		if ($this->form_validation->run() === FALSE) {
			$this->view('edit_bankdetails');
		} else {


			$data = array(
				'id'  => $this->input->post('id'),
				'prod_id' => $this->input->post('prod_id'),
				'proid' => $this->input->post('proid'),
				'users_id'    =>  $this->session->userdata('admin_id'),
				'bank_name' =>  $this->input->post('bank_name'),
				'account_nr' =>  $this->input->post('account_nr'),
				'routing_nr' =>  $this->input->post('routing_nr'),
				'city'   =>  $this->input->post('city'),
				'bank_addr2'   =>  $this->input->post('bank_addr2'),
				'bank_addr1'   =>  $this->input->post('bank_addr1'),
				'state'   =>  $this->input->post('state'),
				'zipcode'   =>  $this->input->post('zipcode'),
				'ccnr'   =>  $this->input->post('ccnr'),
				'ccdate'   =>  $this->input->post('ccdate'),
				'paypal_addr'   =>  $this->input->post('paypal_addr'),
				'Default'   =>  $this->input->post('Default'),
				'ccvc'   =>  $this->input->post('ccvc'),
				'proid'   =>  $this->input->post('proid'),
				'month' => $this->input->post('month'),
				'year' => $this->input->post('year'),
				'holder_name'=>$this->input->post('holder_name'),
				'cc_number'=>$this->input->post('cc_number'),
				'billing_address'=>$this->input->post('billing_address'),
				'billing_zipcode'=>$this->input->post('billing_zipcode'),
				"load_default"=>$this->input->post('Default'),
				"same_email"=>$this->input->post('same_email'),

			);


			//print_r($data);exit();

			$res = $this->dashboard_model->update_bank_info($data);

			if ($res) {
				// $busid = $this->input->post('busid');
				$id = $this->input->post('id');
				redirect("dashboard/edit_photogallery/" . $id);
			} else {
				$id = $this->input->post('id');
				redirect("dashboard/edit_photogallery/" . $id);
			}
		}
	}
	//photogallery============================================================================================================

	public function add_photogallery()
	{
		// $nkid = $this->input->post('nkid')
		// print_r("hello");exit(); // $album=$this->security->xss_clean($this->input->post('alb_id'));
		// $str_arr = explode (",", $album);
		// $alb_id=$str_arr[0];
		// print_r($alb_id);
		// exit();

		$data = array();
		// If file upload form submitted
		// $title =uniqid($_FILES['files']['name']);
		// print_r($title);
		// exit();
		if ($this->input->post('fileSubmit') && !empty($_FILES['files']['name'])) {
			$filesCount = count($_FILES['files']['name']);
			// print_r($_FILES['files']['name']);exit();
			for ($i = 0; $i < $filesCount; $i++) {
				$_FILES['file']['name']     = $_FILES['files']['name'][$i];

				$_FILES['file']['type']     = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error']    = $_FILES['files']['error'][$i];
				$_FILES['file']['size']     = $_FILES['files']['size'][$i];

				// File upload configuration
				$uploadPath = 'uploads/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'jpg|jpeg|png|gif';

				// Load and initialize upload library
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// Upload file to server
				if ($this->upload->do_upload('file')) {
					// Uploaded file data
					$fileData = $this->upload->data();
					$uploadData[$i]['photos'] = $fileData['file_name'];
					$uploadData[$i]['supplier_bnk_info_id'] = $this->input->post('nkid');
					$uploadData[$i]['title'] = $this->input->post('message');
					// $uploadData[$i]['galalb_id'] = $alb_id;
					// $uploadData[$i]['g_status'] = 1;

					//                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
				}
			}

			if (!empty($uploadData)) {
				// Insert files data into the database
				$insert = $this->dashboard_model->insert($uploadData);


				// Upload status message
				$statusMsg = $insert ? 'Files uploaded successfully.' : 'Some problem occurred, please try again.';
				$this->session->set_flashdata('statusMsg', $statusMsg);
			}
		}

		// Get files data from the database
		$data['files'] = $this->dashboard_model->getRows();

		$this->session->set_flashdata('sub_succ', 'gallery created successfully');
		$nkid = $this->input->post('nkid');
		redirect("admin/videogallery?nkid=" . $nkid);

		// Pass the files data to view
		// $this->load->view('view_albgallery_list', $data);
	}
	//============================update photogallery==================================================================
	public function update_photogallery()
	{



		$pho_id=explode("/",$_SERVER['HTTP_REFERER']);


		// $nkid = $this->input->post('nkid')
		// print_r("hello");exit(); // $album=$this->security->xss_clean($this->input->post('alb_id'));
		// $str_arr = explode (",", $album);
		// $alb_id=$str_arr[0];
		// print_r($alb_id);
		// exit();

		$data = array();
		// If file upload form submitted
		// $title =uniqid($_FILES['files']['name']);
		// print_r($title);
		// exit();
		if($this->input->post('previous'))
		{


			redirect("dashboard/edit_bankinfok/".$this->session->userdata('bank_info'));
		}
		if (($this->input->post('fileSubmit') || $this->input->post('upload_data')) && !empty($_FILES['files']['name'])) {
			$filesCount = count($_FILES['files']['name']);
			// print_r($_FILES['files']['name']);exit();
			for ($i = 0; $i < $filesCount; $i++) {
				$_FILES['file']['name']     = $_FILES['files']['name'][$i];

				$_FILES['file']['type']     = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error']    = $_FILES['files']['error'][$i];
				$_FILES['file']['size']     = $_FILES['files']['size'][$i];

				// File upload configuration
				$uploadPath = 'uploads/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'jpg|jpeg|png|gif';

				// Load and initialize upload library
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// Upload file to server
				if ($this->upload->do_upload('file')) {
					// Uploaded file data
					$fileData = $this->upload->data();
					$uploadData[$i]['photos'] = $fileData['file_name'];
					// $uploadData[$i]['supplier_bnk_info_id'] = $this->input->post('nkid');
					$uploadData[$i]['supplier_bnk_info_id'] =  empty($this->input->post('photo_id'))?$pho_id[6]:$this->input->post('photo_id');
					$uploadData[$i]['title'] =  $this->input->post('message');;
					// $uploadData[$i]['g_status'] = 1;

					//                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
				}
			}

			if (!empty($uploadData)) {
				// Insert files data into the database
				$insert = $this->dashboard_model->insert($uploadData);


				// Upload status message
				$statusMsg = $insert ? 'Files uploaded successfully.' : 'Some problem occurred, please try again.';
				$this->session->set_flashdata('statusMsg', $statusMsg);
			}




			// Get files data from the database

		}

		if($this->input->post('upload_data')=="Upload")
			{

				$ids=$this->dashboard_model->getphotoid()-1;
				$id = $this->input->post('photo_id');
				redirect("dashboard/edit_photogallery/" . $pho_id[6]);


			}
		$data['files'] = $this->dashboard_model->getRows();

		$this->session->set_flashdata('sub_succ', 'gallery created successfully');
		$nkid = $this->input->post('nkid');
		redirect("dashboard/edit_videogallery?nkid=" . $nkid);

		// Pass the files data to view
		// $this->load->view('view_albgallery_list', $data);
	}





	public function delete_photo_gallery_image($del,$master)
	{


		$this->dashboard_model->deleteimagegallery('event_dragon_supplier_promo_info_photos', $del);
		redirect("dashboard/edit_photogallery/" . $master);
	}
//delete  store front




public function delete_storefront($id,$userid,$category_id)
{

	$data=array(
		"id"=>$id,
		"userid"=>$userid,
		"category_id"=>$category_id

	);


	 $res = $this->dashboard_model->delete_storefront($data);

	if($res)
	{

		redirect("admin/list_storefront");
	}

}
	//videogallery====================================================================================================================
	public function add_videogallery()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('bank_name', 'Slug', 'trim');
		if ($this->form_validation->run() === FALSE) {
			$this->view('promoinfo');
		} else {

			$data = array(
				'id' => $this->input->post('id'),
				'nkid' => $this->input->post('nkid'),
				'users_id' =>  $this->session->userdata('admin_id'),
				'link1' =>  $this->input->post('link1'),
				'link2' =>  $this->input->post('link2'),

			);


			$res = $this->dashboard_model->Insert_video_info($data);
			// print_r($data);exit();
			if ($res) {
				// print_r($res);exit();
				// $busid = $this->input->post('busid');

				redirect("admin/store_front_finish.php");
			} else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				$this->view('business_info');
			}
		}
	}

	public function update_videogallery()
	{

		if($this->input->post('previous'))
		{


			redirect("dashboard/edit_photogallery/".$this->session->userdata('photogallery_info'));
		}
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('video1', 'Slug', 'trim');
		if ($this->form_validation->run() === FALSE) {
			$this->view('edit_videogallery');
		} else {

			$data = array(
				'id' => $this->input->post('id'),
				'nkid' => $this->input->post('nkid'),
				'users_id' =>  $this->session->userdata('admin_id'),
				'link1' =>  $this->input->post('link1'),
				'link2' =>  $this->input->post('link2'),

			);


			$res = $this->dashboard_model->update_video_info($data);
			// print_r($data);exit();
			if ($res) {
				// print_r($res);exit();
				// $busid = $this->input->post('busid');

				redirect("admin/dashboard.php");
			} else {
				redirect("admin/dashboard.php");
			}
		}
	}


	//checking====================================================================================================================

	public function edit_businessinfo($id = '')
	{
		$session_del=array('promo_info','product_info','bank_info','photogallery_info');
		$this->session->unset_userdata($session_del);
		$data['service'] = $this->dashboard_model->getData('event_dragon_supplier_business_info', $id);
		$nav=$this->dashboard_model->getnav('event_dragon_supplier_business_info', $id);
		//supplier_category_id
		$data['cat_id'] = $id;
		$this->view('edit_businessinfo', $data);
	}

	public function edit_prominfok($id = '')
	{
		$masterId = $this->session->userdata('masterId');
		$packageId = $this->session->userdata('packageId');
		$this->session->set_userdata('promo_info',$id);
		$data['service'] = $this->dashboard_model->getDatas('event_dragon_supplier_promo_info', $id);
		$data['masterId']=$masterId;
		$data['packageId']=$packageId;
		$this->view('edit_promoinfo', $data);
	}

	public function edit_productinfok($id = '')
	{
		$masterId = $this->session->userdata('masterId');
		$packageId = $this->session->userdata('packageId');
		$data['service'] = $this->dashboard_model->getDatap('event_dragon_supplier_promo_product_packages', $id);
		$this->session->set_userdata('product_info',$id);
		$data['sport_category']=$this->dashboard_model->getData('event_supplier_sports_category','');
		$getCatId = $this->dashboard_model->getCatId($id);
		$catId = isset($getCatId->supplier_category_id)?$getCatId->supplier_category_id:0;
		$getQuestionsByCatId = $this->dashboard_model->QuestionsByCatId($catId);
		$data['questions'] = $getQuestionsByCatId;
		$getAnswers = $this->dashboard_model->getAnswers($id);
		$data['discount_types']=$this->dashboard_model->getDiscountType();
//print_r($data['questions']);die;
		$data['answers'] = $getAnswers;
		$data['cat_id'] = $catId;
		$data['masterId'] = $masterId;
		$data['packageId'] = $packageId;
		$data['lastId'] = $id;
		$this->view('edit_productpackages', $data);
	}
	public function edit_bankinfok($id = '')
	{
		// print_r("$id");exit();
		$data['service'] = $this->dashboard_model->getDatab('event_dragon_supplier_business_bank_details', $id);
		// print_r($data['service']);exit();
		$packageId = $this->session->userdata('packageId');
		$masterId = $this->session->userdata('masterId');
		$this->session->set_userdata('bank_info',$id);
		$data['masterId'] = $masterId;
		$data['packageId'] = $packageId;
		$this->view('edit_bankdetails', $data);
	}
	public function edit_photogallery($id = '')
	{

		$data['service'] = $this->dashboard_model->getDataph('event_dragon_supplier_promo_info_photos', $id);
		// print_r($data['service']);exit();
		$this->session->set_userdata('photogallery_info',$id);
		$masterId = $this->session->userdata('masterId');
		$packageId = $this->session->userdata('packageId');
		$data['masterId'] = $masterId;
		$data['packageId'] = $packageId;
		$this->view('edit_photogallery', $data);
	}
	public function edit_videogallery($id = '')
	{
		// print_r("$id");exit();
		$data['service'] = $this->dashboard_model->getDataph('event_dragon_supplier_promo_info_videos', $id);
		// print_r($data['service']);exit();
		$packageId = $this->session->userdata('packageId');
		$masterId = $this->session->userdata('masterId');
		$data['masterId'] = $masterId;
		$data['packageId'] = $packageId;
		$this->view('edit_videogallery', $data);
	}

	public function questionnaire($id = ''){
		$data = array();

		$data['service'] = $this->dashboard_model->getDataph('event_dragon_supplier_questionnaire', $id);
		$this->view('edit_questionnaire', $data);
	}

	//===================================================================

// Manuja Edit Start===============================================================


	public function list_leads($skey=null)
	{

		$userid = $this->session->userdata('admin_id');
		$data['userid'] = $userid;

		$masterId = $this->session->userdata('masterId');
		$data['masterId'] = $masterId;
		$packageId = $this->session->userdata('packageId');
		$data['packageId'] = $packageId;

		if(!empty($skey))
		{
			$data['leads'] = $this->dashboard_model->getLeadMessagebySearch($data['userid'],$skey,$data['masterId']);
			//print_r($data);die;
			$data['s']=$skey;
			$this->view('list_leads', $data);

		}
		else
		{

			$userid = $this->session->userdata('admin_id');
			$data['userid'] = $userid;

			$masterId = $this->session->userdata('masterId');
			$data['masterId'] = $masterId;
			$data['s']="not";
			//echo $data['masterId'];die;
			$data['leads'] = $this->dashboard_model->getLeadMessage($data['userid'],$data['masterId']);
			//print_r($data);die;
			$this->view('list_leads', $data);
		}

	}

	public function leads_details($lead_id=null)
	{
		$userid = $this->session->userdata('admin_id');
		 $data['userid'] = $userid;
		 $packageId = $this->session->userdata('packageId');
		$data['packageId'] = $packageId;
		 $masterId = $this->session->userdata('masterId');
		$data['masterId'] = $masterId;
		//echo $data['masterId'];die;
		$data['leads'] = $this->dashboard_model->getLeadsbyId($data['userid'],$lead_id);
		//print_r($data);die;
		$this->view('lead_details', $data);
	}

	public function send_enquiry($id=null,$lead=null,$msg=null)
	{

		$userid = $this->session->userdata('admin_id');
		 $data['userid'] = $userid;
		 $packageId = $this->session->userdata('packageId');
		$data['packageId'] = $packageId;
		$date=date("Y/m/d H:i:s");

		if(!empty($msg))
		{
			if($msg=="not_avail")
			{
				$m="Not Available";
			}
				else if($msg="not_inter")
				{
					$m="Not Interested";
				}
			$data=array(
						'from_id' => $userid,
						'to_id'		=> $id,
						'lead_id' => $lead,
						'message'	=>$m,
						'date'   =>$date,
					);

		}
		else
		{
			$pic=$_FILES["file"]["name"];
			if(!empty($pic))
			{
			$extension = substr($pic,strlen($pic)-4,strlen($pic));
			$propic=md5($pic).time().$extension;
     		move_uploaded_file($_FILES["file"]["tmp_name"],"assets/chatimage/".$propic);
     		$data=array(

						'from_id' => $userid,
						'to_id'		=> $id,
						'lead_id' => $lead,
						'message'	=>$this->input->post('reply'),
						'document' => $propic,
						'date'   =>$date,


					);

     		}
     		else
     		{

			$data=array(

						'from_id' => $userid,
						'to_id'		=> $id,
						'lead_id' => $lead,
						'message'	=>$this->input->post('reply'),
						'date'   =>$date,


					);
		}
		}

		$result = $this->dashboard_model->add_replay($data);

		if($result==true)
		{
			$this->session->set_flashdata('err', 'Send Sucessfully!');
				$this->view('business_info');
		}
			else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				$this->view('business_info');
			}

	}


	//===================================================================

// Sreejith Edit Start===============================================================

public function deleteProductPackage(){
	$promid = $this->input->post('promid');
	$busid = $this->input->post('busid');
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

		if ($this->dashboard_model->deleteProductPackage($product_priceackageId)){
			$message = "The ProductPackage has been deleted successfully...";
		}
	}else{
		$message = "Error.";
	}
	$this->session->set_flashdata('success', $message);
	redirect('admin/productpackages?promid='.$promid.'&busid='.$busid.'');

}

function fetchProductPackage()
{
	$output = array();
	$productid = $this->input->post('product_id');//
	$data = $this->dashboard_model->fetchProductPackage($productid);//print_r($data);die;
	foreach($data as $row)
	{
		$output['product_name'] = $row->product_name;
		$output['product_price'] = $row->product_price;
		$output['product_desc'] = $row->product_desc;
		$output['product_video'] = $row->product_video;
		// $output['multi_storefront_discount_range_percentage'] = $row->multi_storefront_discount_range_percentage;
		// $output['multi_storefront_flat_amount'] = $row->multi_storefront_flat_amount;
		// $output['supplier_capacity_minimum'] = $row->supplier_capacity_minimum;
		// $output['supplier_cost_minimum'] = $row->supplier_cost_minimum;
		// $output['supplier_denomination'] = $row->supplier_denomination;
		// $output['supplier_average_cost_per_person'] = $row->supplier_average_cost_per_person;
		// $output['supplier_lowest_cost_per_person'] = $row->supplier_lowest_cost_per_person;
		// $output['supplier_highest_cost_per_person'] = $row->supplier_highest_cost_per_person;
		// $output['supplier_capacity_maximum'] = $row->supplier_capacity_maximum;
		// $output['discount_type'] = $row->discount_type;

	}
	echo json_encode($output);
}
public function deleteEditProductPackage(){
	$promid = $this->input->post('prod_id');
	$bus_id = $this->input->post('bus_id');
	$data = array();
	$this->form_validation->set_rules('id', 'Product Package ID', 'required');
	if ($this->form_validation->run() == TRUE) {
		$product_priceackageId = $this->input->post('id');
		$data = array(
			'status' => 'Deleted'
		);
		if ($this->dashboard_model->deleteProductPackage($product_priceackageId)){
			$message = "The ProductPackage has been deleted successfully...";
		}
	}else{
		$message = "Error.";
	}
	$this->session->set_flashdata('success', $message);
	redirect('dashboard/edit_productinfok/'.$promid.'');

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

	$productArr = [
		"supplier_promo_info_id" => $busid,
		"product_name" => $product_name,
		"product_number" =>$product_number,
		"product_price" => $product_price,
		"product_desc" => $product_detail,
		"product_video" => $product_video,
	];
	if($this->input->post('product_id')){
		$productArr = [
			"supplier_promo_info_id" => $busid,
			"product_name" => $product_name,
			"product_number" =>$product_number,
			"product_price" => $product_price,
			"product_desc" => $product_detail,
			"product_video" => $product_video,
		];

			$this->dashboard_model->updateProduct($this->input->post('product_id'),$productArr);
		redirect('dashboard/edit_productinfok/'.$prid.'');

	}else {
		$insertId = $this->dashboard_model->insertProduct($productArr);
		if(!empty($insertId)){
			if($this->input->post('type')=='edit'){
				redirect('dashboard/edit_productinfok/'.$prid.'');
			}else {
				redirect('admin/productpackages?promid='.$promid.'&busid='.$busid.'');

			}
		}
	}


}

public function getCity()
	{
		$cities=$this->dashboard_model->getCity();
		$city=$this->input->post('city2');
		echo "<option value=''>Select City</option>";
		foreach($cities as $item)
		{
		if($city==$item['id'])
		echo "<option value='".$item['id']."' selected='selected'>".$item['name']."</option>";
		else
		echo "<option value='".$item['id']."'>".$item['name']."</option>";
		}
	}	
	public function getCity2()
	{
		$cities=$this->dashboard_model->getCity2();
		$city=$this->input->post('city3');
		echo "<option value=''>Select City</option>";
		foreach($cities as $item)
		{
		if($city==$item['id'])
		echo "<option value='".$item['id']."' selected='selected'>".$item['name']."</option>";
		else
		echo "<option value='".$item['id']."'>".$item['name']."</option>";
		}
	}	


}
