<?php
defined('BASEPATH') or exit('No direct script access allowed');
	class Edit extends CI_Controller
	{
		
	 public function __construct()
		{
			parent::__construct();
			
			if(!$this->session->userdata('login')) {
				redirect('administrator/index');
			}
			$this->load->model('Supplier_Model');
			$this->load->model('Edit_Model');
			$this->load->model(array(
			'State_Model','Consumer_category_Model','Business_category_Model','Create_Model'));
			
		}

		public function editBusinessInfo($id=null)
		{
			$data['title'] = 'Edit New Bussiness';
			$data['business']=$this->Edit_Model->selectBusinessInfo($id);
			//print_r($data);die;
			if(!empty($data['business'][0]->cityid))
			{
			$data['city']=$this->Edit_Model->selectCityName($data['business'][0]->cityid);
		}
			$data['categoryname']=$this->Edit_Model->selectCategoryname($id);
			//print_r($data['business']);die;
			//$data['category']=$this->Edit_Model->selectCompanyName($id);
			$data['weekdays']=$this->Create_Model->product_weekdays();
			$data['months']=$this->Create_Model->product_months();
			$data['discount_types']=$this->Create_Model->discounts();

			$data['states']=$this->State_Model->listsofState();

			$data['business_cat']=$this->Business_category_Model->lists();
			$data['consumer_cat']=$this->Consumer_category_Model->lists();

			if(isset($_POST['submit']))
			{
				
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
				if(empty($data['business'][0]->insurance))
				{
					$p_image = "";
				}
				else
				{
					$p_image = $data['business'][0]->insurance;
				}
			}

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
					$data['citylt']=$this->Edit_Model->selectCityName($city);
					$latitude=$data['citylt'][0]->latitude;
					$longitude=$data['citylt'][0]->longitude;
				}
				else
				{
					$city=$data['business'][0]->cityid;

					if(!empty($city))
				{
				$data['citylt']=$this->Edit_Model->selectCityName($city);
				$latitude=$data['citylt'][0]->latitude;
				$longitude=$data['citylt'][0]->longitude;
					}
					else
					{
						$city="";
						$latitude="";
						$longitude="";
						
					}
				
				}

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
				$storid=$this->uri->segment(4);
				
			
			$result=$this->Edit_Model->editBusinessInfo($data);

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
//print_r($cons);die;
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

	$busin[$i]['switchid'] = $storid;
	$busin[$i]['eventid'] = $bis1['b'][$i];
	
	
}

$rr=$this->Create_Model->addSelectedEvents('selected_bussinessevent',$busin);
}
}
else
{
	$busin="";
}
			$supplier_id=$this->input->post('supplier_id');

			if ($result) {
			$this->session->set_flashdata('success', 'Supplier  buissness Info has been Updated.');
						redirect('supplier/edit/edit_promo_info/'.$storid, 'refresh');

					}
					else
					{
						$this->session->set_flashdata('success', 'Something went wrong.');
						redirect('supplier/supplier/lists', 'refresh');

						
					}

			}
			else
			{
				$this->load->view('administrator/header-script',$data);
				$this->load->view('administrator/header');
				$this->load->view('administrator/header-bottom');
				$this->load->view('supplier/editBussinessInfo', $data);
				$this->load->view('administrator/footer');
			}
		}

		public function deleteBusinessInfo($id=null,$supplier_id=null)
		{
			$result= $this->Edit_Model->deleteBusinessInfo($id);
			if ($result) {
			$this->session->set_flashdata('success', 'Supplier  buissness Info has been Deleted.');
						redirect('supplier/supplier/list_storefront/'.$supplier_id, 'refresh');

					}
					else
					{
						$this->session->set_flashdata('success', 'Something went wrong.');
						redirect('supplier/supplier/lists', 'refresh');

						
					}
		}

		public function listOfReviews($sid=null, $cid=null,$store_id=null)
		{
			$data['title'] = 'View Reviews';
			$data['categoryname']=$this->Edit_Model->selectCategorynamebycatId($cid);
			$data['company']=$this->Edit_Model->selectCategoryname($store_id);
			$data['review']= $this->Edit_Model->selectListOfReviews($sid,$cid);
			$data['supplier_id']=$sid;
//print_r($data['review']);die;
			$this->load->view('administrator/header-script',$data);
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('supplier/listOfReviews', $data);
			$this->load->view('administrator/footer');
		}


 function booked_Lead_list($store_front_id = null){

    	$data['categoryname']=$this->Edit_Model->selectCategoryname($store_front_id);
    	$data['title'] = 'View Lead';
		//$get_supplier =  $this->Edit_Model->get_supplier($store_front_id);
		//$supplier_id = $get_supplier->supplier_id; 
		$data['get_lead'] = $this->Edit_Model->get_booked_lead($store_front_id);
		
		$this->load->view('administrator/header-script',$data);
		$this->load->view('administrator/header');
		$this->load->view('administrator/header-bottom');
		$this->load->view('supplier/booked_lead_list', $data);
		$this->load->view('administrator/footer');	

	}

	public function view_booked_lead($lead_id){
		$data['title'] = 'View Lead';
		$data['lead_details'] = $this->Edit_Model->lead_details($lead_id);
		$this->load->view('administrator/header-script',$data);
		$this->load->view('administrator/header');
		$this->load->view('administrator/header-bottom');
		$this->load->view('supplier/view_booked_lead', $data);
		$this->load->view('administrator/footer');	

	}

	public function chat_history($lead_id=null,$store_id=null,$bookStatus=null)
    {
    	$data['title'] = 'Chatting';
    	
    	$data['bookStatus']=$bookStatus;

    	$data['store']= $this->Edit_Model->getStoreFrontbyLead($lead_id);
    	
    	$userid=$data['store'][0]->supplier_id;
    	$cust_id=$data['store'][0]->customer_id;
    	$data['msg'] = $this->Edit_Model->getallmessages($userid,$lead_id,$cust_id);
    	
    	$data['store_id']= $store_id;
    	$data['userid'] = $userid;

    	$this->load->view('administrator/header-script',$data);
		$this->load->view('administrator/header');
		$this->load->view('administrator/header-bottom');
		$this->load->view('supplier/chatting', $data);
		$this->load->view('administrator/footer');
    	
    }




		//Jisha Edited -------------------------------

			public function edit_promo_info($store_front_id=null){
			 	$data['title'] = 'Edit Promo Details';

		$data['get_promo_data']= $this->Edit_Model->get_promo_data($store_front_id);
		
		 $data['suppl']=$this->Edit_Model->selectSupplierid($store_front_id);
		$supplier_id = $data['suppl'][0]->supplier_id;

		$data['categoryname']=$this->Edit_Model->selectCategoryname($store_front_id);
		$data['promo_user_data'] = $this->Edit_Model->promo_user_data($supplier_id);
		$data['id'] = $supplier_id;
        
        $this->load->view('administrator/header-script',$data);
        $this->load->view('administrator/header');
        $this->load->view('administrator/header-bottom');
        $this->load->view('supplier/edit_promo_info',$data);
        $this->load->view('administrator/footer');	
    }
    function promo_info_editted(){
        //$this->form_validation->set_rules('business_name', 'Business Name', 'required');
		$store_front_id = $this->input->post('store_id');
		$supplier_id = $this->input->post('supplier_id');
        $category_id = $this->input->post('category_id');
		
		
		//$data['get_promo_data']= $this->Edit_Model->get_promo_data($store_front_id);
		$data['promo_user_data'] = $this->Edit_Model->promo_user_data($supplier_id);
		

       
        $config['upload_path'] = 'uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
   

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $image_data['file_name'] = '';

  
    if ($this->upload->do_upload('personal_photo')) {
        $image_data = $this->upload->data();
    } else if(!empty($this->input->post('imgg'))) {
    	 $image_data['file_name'] =$this->input->post('imgg');
        
    }
    else
    {
    	$image_data['file_name'] ="";
    }
    // $store_front_id = $this->input->post('store_id');

    // $supplier_id = $this->input->post('supplier_id');
    // $category_id = $this->input->post('category_id');

    $data['get_promo_data']= $this->Edit_Model->get_promo_data($store_front_id);

    if(!empty($data['get_promo_data']))
    {

    $data = array(
        'supplier_id' => $supplier_id,
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

    $edit_promo = $this->Edit_Model->edit_promo($data,$store_front_id);
}
else
{

	if($this->input->post('same')==1)
	{
		

		$data = array(
			'supplier_id' => $supplier_id,
			'category_id' =>$category_id,
			'switch_id'		=> $store_front_id,
			'business_name' => $data['promo_user_data'][0]->business_name, 
			'personal_bio' => $data['promo_user_data'][0]->personal_bio,
			'description' => $data['promo_user_data'][0]->description ,
			'fb' => $data['promo_user_data'][0]->description,
			'photo' => $data['promo_user_data'][0]->photo,
			'instagram' => $data['promo_user_data'][0]->instagram,
			'linkedin' => $data['promo_user_data'][0]->linkedin,
			'twitter' => $data['promo_user_data'][0]->twitter,
			'display' => 1
		);
        $edit_promo = $this->Create_Model->save_promo($data);

	}else{
    $data = array(
        'supplier_id' => $supplier_id,
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
    $this->session->set_flashdata('err', 'Promo Info Edited successfully.');
    redirect('supplier/edit/edit_promo_info/'.$store_front_id, 'refresh');
	}
        
    }
    public function edit_photo_gallery($store_front_id=null){
    	$data['title'] = 'View Photos';
        $data['get_photo_data']= $this->Edit_Model->get_photo_data($store_front_id);
        $data['categoryname']=$this->Edit_Model->selectCategoryname($store_front_id);
        //print_r($data['get_photo_data']);die();
        $this->load->view('administrator/header-script',$data);
        $this->load->view('administrator/header');
        $this->load->view('administrator/header-bottom');
        $this->load->view('supplier/edit_photo_gallery',$data);
        $this->load->view('administrator/footer');	
    }
	function editted_photo_gallery(){
        //$this->form_validation->set_rules('title', 'Title', 'required');
       //$this->form_validation->set_rules('title', 'Title', 'required');
        $store_front_id = $this->input->post('store_id');
       // echo $store_front_id;die;

          $get_order = $this->Create_Model->get_order($store_front_id);
	   $last_key = count($get_order);
		
		$display_count = $last_key + 1;

        $config['upload_path'] = '../uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width'] = '4096';
		$config['max_height'] = '4096';
        $this->load->library('upload', $config);
		$this->upload->initialize($config);
		$image_data['file_name'] = '';
		
		if ($this->upload->do_upload('photo')) {
			$image_data = $this->upload->data();
		} else {
			//print_r($this->upload->display_errors());
			$this->session->set_flashdata('error', $this->upload->display_errors());
		}
		 $supplier_id = $this->input->post('supplier_id');
            $category_id = $this->input->post('category_id');
            //$store_front_id = $this->input->post('store_id');
		
       

        	$data = array(
                'title' => $this->input->post('title'),
                'photos' => $image_data['file_name'],
                'display' => 1,
                'supplier_id'=> $this->input->post('supplier_id'),
                'category_id' => $this->input->post('category_id'),
                'switch_id'	=> $store_front_id,
                'display_order' => $display_count,

            );
           // print_r($data);die;
            //echo $store_front_id;die;
            $save_photo = $this->Create_Model->saved_photo($data);
            //Set Message $save_photo = $this->Create_Model->save_photo($data);
            $this->session->set_flashdata('success', 'Photo gallery edited successfully.');
            
            redirect('supplier/edit/edit_photo_gallery/'.$store_front_id, 'refresh');

    }
    public function edit_video_gallery($store_front_id=null){
    	$data['title'] = 'View Video';

     $data['get_video_data']= $this->Edit_Model->get_video_data($store_front_id);
     $data['categoryname']=$this->Edit_Model->selectCategoryname($store_front_id);
      
        $this->load->view('administrator/header-script',$data);
        $this->load->view('administrator/header');
        $this->load->view('administrator/header-bottom');
        $this->load->view('supplier/edit_video_gallery',$data);
        $this->load->view('administrator/footer');	
    }
    function editted_video_gallery(){
         //$this->form_validation->set_rules('link1', 'Link1', 'required');
        $store_front_id = $this->input->post('store_id');
       
        $supplier_id = $this->input->post('supplier_id');
        $category_id = $this->input->post('category_id');
        $store_front_id = $this->input->post('store_id');
       
      	 $data = array(
               'video1' => $this->input->post('link1'), 
               // 'video2' => $this->input->post('link2')  ,
               'supplier_id'=> $this->input->post('supplier_id'),
               'category_id' => $this->input->post('category_id'),
               'switch_id'	=> $store_front_id,
               

               );

          $add_video = $this->Create_Model->add_video($data);
      
           //Set Message
           $this->session->set_flashdata('success', 'Data Edited Successfully.');
           redirect('supplier/Edit/edit_video_gallery/'.$store_front_id, 'refresh');
    }

    function lead_list($store_front_id = null){
    	$data['title'] = 'View Lead';
		//$get_supplier =  $this->Edit_Model->get_supplier($store_front_id);
		//$supplier_id = $get_supplier->supplier_id; 
		$data['get_lead'] = $this->Edit_Model->get_lead($store_front_id);
		$data['categoryname']=$this->Edit_Model->selectCategoryname($store_front_id);
		
		$this->load->view('administrator/header-script',$data);
		$this->load->view('administrator/header');
		$this->load->view('administrator/header-bottom');
		$this->load->view('supplier/lead_list', $data);
		$this->load->view('administrator/footer');	

	}
	function view_lead($lead_id){
		$data['title'] = 'View Lead';
		$data['lead_details'] = $this->Edit_Model->lead_details($lead_id);
		$this->load->view('administrator/header-script',$data);
		$this->load->view('administrator/header');
		$this->load->view('administrator/header-bottom');
		$this->load->view('supplier/view_lead', $data);
		$this->load->view('administrator/footer');	

	}

	//ASISH EDIT ---------------------------------------


	public function add_productpackages($userid="",$catid="",$switchid='')
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('product_name', 'product_name', 'trim');

		if ($this->form_validation->run() === FALSE) {
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
					$this->session->set_flashdata('sub_error', 'Unable  to upload file ,plz try again');
					redirect('supplier/create/add_productpackages/'.$useid."/".$catid."/".$switchid);
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
				redirect('supplier/edit/update_bankdetail/'.$switchid);

				// redirect("admin/promoinfo?busid=$busid&scid=".$scid);

			} else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				redirect('supplier/edit/update_productpackages/'.$switchid);

			}
		}
	}

	public function update_productpackages($switchid='')
	{//print_r($_POST);die;
      
      $data2['categoryname']=$this->Edit_Model->selectCategoryname($switchid);

		if($this->input->post('previous'))
		{
			redirect("dashboard/edit_prominfok/".$this->session->userdata('promo_info'));
		}
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('product_name', 'product_name', 'trim');

		if ($this->form_validation->run() === FALSE) {
			@$data2['service'] = $this->Edit_Model->getDatap('supplier_product_packages', $switchid);
			//print_r($data2['service']);exit;
			$data2['weekdays']=$this->Create_Model->product_weekdays();
			$data2['months']=$this->Create_Model->product_months();
			$data2['suppcategory']=$this->Create_Model->getCatId(@$data2['service'][0]['category_id']);
			$data2['discount_types']=$this->Create_Model->discounts();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('supplier/editproductpackages',@$data2);
			$this->load->view('administrator/footer');
		} else {
			$data2['service'] = $this->Edit_Model->getDatap('supplier_product_packages', $switchid);
			$data2['weekdays']=$this->Create_Model->product_weekdays();
			$data2['months']=$this->Create_Model->product_months();
			$data2['suppcategory']=$this->Create_Model->getCatId($data2['service'][0]['category_id']);
			$data2['discount_types']=$this->Create_Model->discounts();
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

				'supplier_id' => $data2['service'][0]['supplier_id'],
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
				'discount_multi_type' =>$this->input->post('dis_multi_type'),
				'multi_discount_amount'=>$this->input->post('amount'),

				'discount_day_type' =>$this->input->post('dis_day_type'),
				'discount_days_amt'=>$this->input->post('discount_days_amt'),
				'days' => $this->input->post('peakdays'),

				'discount_month_type' =>$this->input->post('dis_month_type'),
				'discount_month_amt' =>$this->input->post('discount_month_amt'),
				'month' => $this->input->post('peakmonths'),

				// 'lowest' => $this->input->post('lowest'),
				// 'highest' => $this->input->post('highest'),
				// 'average' => $this->input->post('average'),
				'image' => $p_image,
				
				


			);
			//print_r($data);exit();

			$res = $this->Edit_Model->update_product_info($data,$switchid);
//			$masterId = $this->input->post('masterId');
//			//insert question answers
//			$getCatId = $this->dashboard_model->getCatId($masterId);
//			$catId = isset($getCatId->supplier_category_id)?$getCatId->supplier_category_id:'';
//			$getQuestionsByCatId = $this->dashboard_model->QuestionsByCatId($catId);
//
//			foreach ($getQuestionsByCatId as $key => $value) {
//				$quesId = $value->id;
//				$answers = $this->input->post($quesId.'_answer');
//				$dataArr = [
//					"supplier_bnk_info_id"=> $masterId,
//					"questionnaire_id"=> $quesId,
//					"answer"=> $answers
//				];
//				$this->dashboard_model->insertAnswer($dataArr);
//			}
			// print_r($res);exit();
			if ($res) {
				redirect('supplier/edit/update_bankdetail/'.$switchid);
			} else {
				redirect('supplier/edit/update_productpackages/'.$switchid);
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
					redirect('admin/promoinfo');
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
				redirect('supplier/edit/update_productpackages/'.$busid);

	}else {
		$insertId = $this->Edit_Model->insertProduct($productArr);
		if(!empty($insertId)){
			if($this->input->post('type')=='edit'){
				redirect('dashboard/edit_productinfok/'.$prid.'');
			}else {
				redirect('supplier/edit/update_productpackages/'.$busid);
			}
		}
	}


}

public function deleteProductPackage(){
	$promid = $this->input->post('promid');
	$busid = $this->input->post('busid');
	//$id = $this->input->post('id');
	$data = array();
//	$getCountProducts = $this->dashboard_model->getProductCount($busid);
//	if($getCountProducts =='1'){
//		$this->dashboard_model->deleteMasterProductPackage($promid);
//	}
	$this->form_validation->set_rules('id', 'Product Package ID', 'required');
	if ($this->form_validation->run() == TRUE) {
		$product_priceackageId = $this->input->post('id');
		$data = array(
			'status' => 'Deleted'
		);

		if ($this->Edit_Model->deleteProductPackage($product_priceackageId)){
			$message = "The ProductPackage has been deleted successfully...";
		}
	}else{
		$message = "Error.";
	}
	$this->session->set_flashdata('success', $message);
	//redirect('supplier/edit/update_productpackages/'.$busid);
	header('Location: ' . $_SERVER['HTTP_REFERER']);

}
	
	//=====================update bank detail======================================
	
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

				redirect("supplier/edit/edit_photogallery/" . $switchid);
			} else {
				$this->session->set_flashdata('err', 'Something went wrong, Please try again later!');
				redirect("supplier/edit/update_bankdetail/" . $switchid);
			}
		}
	}
	

	public function update_bankdetail($switchid='')
	{
		$data2['categoryname']=$this->Edit_Model->selectCategoryname($switchid);
		
		if($this->input->post('previous'))
		{
			redirect("dashboard/edit_productinfok/".$this->session->userdata('product_info'));
		}
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$this->form_validation->set_rules('bank_name', 'Slug', 'trim');
		if ($this->form_validation->run() === FALSE) {
			@$data2['service'] = $this->Edit_Model->getDatap('supplier_bank_details', $switchid);
			$data2['states']=$this->State_Model->listsofState();
			$this->load->view('administrator/header-script');
			$this->load->view('administrator/header');
			$this->load->view('administrator/header-bottom');
			$this->load->view('supplier/edit_bankdetails',@$data2);
			$this->load->view('administrator/footer');
		} else {
			@$data2['service'] = $this->Edit_Model->getDatap('supplier_bank_details', $switchid);
			$data2['states']=$this->State_Model->listsofState();
			$data = array(
				'supplier_id'    =>  $data2['service'][0]['supplier_id'],
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
				//"load_default"=>$this->input->post('Default'),
				//"same_email"=>$this->input->post('same_email'),

			);

			//print_r($data);exit();

			$res = $this->Edit_Model->update_bank_info($data,$switchid);
//echo $this->db->last_query();exit;
			if ($res) {
				// $busid = $this->input->post('busid');
				$id = $this->input->post('id');
				redirect("supplier/edit/edit_photo_gallery/" . $switchid);
			} else {
				$id = $this->input->post('id');
				redirect("supplier/edit/update_bankdetail/" . $switchid);
			}
		}
	}


	
	


	}