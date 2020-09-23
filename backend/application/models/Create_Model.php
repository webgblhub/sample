<?php
	class Create_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}

		public function addsupplier($data)
		{
			 $this->db->insert('event_dragon_users', $data);
			return $this->db->insert_id();
		}
		public function checkEmailExisit($email)
		{
			$this->db->select('*');
			$this->db->from('event_dragon_users');
			$this->db->where('email',$email);
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function selectBusinessInfo($sid)
		{
			$this->db->select('supplier_business.*,storefront_business.id as stor_id,storefront_business.category_id,cities.name as cname,states.name as sname');
			$this->db->from('supplier_business');
			$this->db->join('storefront_business','business_id=supplier_business.id');
			$this->db->join('cities','cities.id=supplier_business.cityid');
			$this->db->join('states','states.id=supplier_business.stateid');
			$this->db->where('supplier_business.supplier_id',$sid);
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;		
	  	}

	  	public function addBusinessInfo($data)
	  	{

         $peakdaysz =$data['days'];

        $peakmonthsz =$data['month'];

        if(!empty($peakdaysz)){
          $data['days'] = implode(",",$peakdaysz);
        }else{
          $data['days']="";
        }

        if(!empty($peakmonthsz)){
          $data['month'] = implode(",",$peakmonthsz);
        }else{
          $data['month']="";
        }
        
	  		$this->db->insert('supplier_business', $data);
            return $this->db->insert_id();
	  	}

	  	public function addBusinessstoreFront($data)
	  	{
	  		$this->db->insert('storefront_business', $data);
            return $this->db->insert_id();
	  	}

       public function selectSwitchid($id)
      {
          $this->db->select('*');
          $this->db->from('storefront_business');
          $this->db->where('business_id',$id);
          $query = $this->db->get();
          $row= $query->result();
          return $row;
      }

      public function addSelectedEvents($table,$data)
      {
        //print_r($data);die;
        $this->db->where('switchid', $data[0]['switchid']);
        $this->db->delete($table);

         $this->db->insert_batch($table, $data);
            return $this->db->insert_id();
      }

		function save_promo($data){
            $this->db->insert('supplier_promo', $data);
            return $this->db->insert_id();
        }

          function saved_photo($data){
      $this->db->insert('supplier_photos', $data);
      return $this->db->insert_id(); 
  }
   function save_photo($data){
            $this->db->insert_batch('supplier_photos', $data);
            return $this->db->insert_id(); 
        }
        function add_video($data){
            $this->db->insert('supplier_videos', $data);
            return $this->db->insert_id(); 
        }

        function add_video_array($data){
      $this->db->insert('supplier_videos', $data);
      return $this->db->insert_id();

     }
     function selectpromoInfo($supplier_id){
      $this->db->where('supplier_id',$supplier_id);
      
      $query = $this->db->get('supplier_promo');
      return $query->result();
     }

     function get_order($switch_id){
      $this->db->where('switch_id',$switch_id);
      $query =  $this->db->get('supplier_photos');
      return $query->result();
    }


          //Asish edited------------------------------------------





  public function Insert_product_info($data){

    // $id => $this->session->userdata('admin_id'),
    //$id = isset($this->input->post['id'])?$this->input->post['id']:'';
    //$promid = $data['promid'];
    $product_name = $data['product_name'];
    $product_number = $data['product_number'];
    $product_price =$data['price'];
    $product_detail =$data['description'];
    $product_video =$data['video'];
    // $discount =$data['discount'];
    // $minimum=$data['minimum'];
    // $cost=$data['cost'];
    // $style =$data['style'];
    // $peakdaysz =$data['peakdays'];
    // $peakmonthsz =$data['peakmonths'];
    //$ethnicity =empty($data['ethnicity'])?"":implode(',',$data['ethnicity']);
    //$category =empty($data['category'])?"":implode(',',$data['category']);
    //$denomination =$data['denomination'];
    //$language=empty($data['language'])?"":implode(',',$data['language']);
    // $lowest =$data['lowest'];
    // $highest =$data['highest'];
    // $average =$data['average'];
    $photos =$data['image'];
    // $maximum=$data['maximum'];


   $multi_store_type=$data['discount_multi_type'];
    $multi_discount_amount=$data['multi_discount_amount'];

    $discount_day_type=$data['discount_day_type'];
    $discount_days_amt=$data['discount_days_amt'];
    $peakdaysz =$data['days'];

    $discount_month_type=$data['discount_month_type'];
    $discount_month_amt=$data['discount_month_amt'];
    $peakmonthsz =$data['month'];

    if(!empty($peakdaysz)){
      $data['days'] = implode(",",$peakdaysz);
    }else{
      $data['days']="";
    }

    if(!empty($peakmonthsz)){
      $data['month'] = implode(",",$peakmonthsz);
    }else{
      $data['month']="";
    }
    if(!empty($photos)){
      $photo = $photos;
    }else{
      $photo="";
    }

// $peakdays = implode(",",$peakdaysz);

  // print_r($personal_bio);exit();

        $this->db->insert('supplier_product_packages', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;

    // if($this->db->affected_rows())
    // {
    //     return TRUE;
    // }
    //return FALSE;


  }
  
  public function Insert_bank_info($data){

    // $id => $this->session->userdata('admin_id'),


//    $id = $data['id'];
//    $prod_id = $data['prod_id'];
//    $bank_name=  $data['bank_name'];
//    $account_nr=  $data['account_nr'];
//    $routing_nr=  $data['routing_nr'];
//    $city   =  $data['city'];
//    $bank_addr2   =  $data['bank_addr2'];
//    $bank_addr1   =  $data['bank_addr1'];
//    $state   =  $data['state'];
//    $zipcode   =  $data['zipcode'];
//    $ccnr   =  $data['ccnr'];
//    $ccdate   =  $data['ccdate'];
//    $paypal_addr   =  $data['paypal_addr'];
//    $Default   =  $data['Default'];
//    $ccvc   =  $data['ccvc'];
//    $month=$data['month'];
//    $year=$data['year'];
//
//    $user_id=$data['users_id'];
//
//    $holder_name=$data['holder_name'];
//    $cc_number=$data['cc_number'];
//    $billing_address=$data['billing_address'];
//    $billing_zipcode=$data['billing_zipcode'];
//    $load_default=$data['load_default'];
//    $same_email_business=$data['same_email'];

        $this->db->insert('supplier_bank_details', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;

  }
  
  public function product_weekdays(){

      $query = $this->db->get('event_dragon_days');
      //var_dump($query);exit();
            return $query->result();

  }
  
  public function product_months(){

      $query = $this->db->get('event_dragon_months');
      // var_dump($query);exit();
            return $query->result();

  }
  
  public function discounts(){

      $query = $this->db->get('discount_type');
      // var_dump($query);exit();
            return $query->result();

  }

    public function checkQuestionbyCate($catId){
      $sql = 'SELECT * FROM event_dragon_supplier_category_questions where cat_id= ?';
      $query = $this->db->query($sql, array($catId));
      return $query->num_rows();
    }

    public function getCatId($masterId){
  $this->db->select('*');
      $this->db->from('supplier_category');
      $this->db->where('cat_id', $masterId);
    
      $query = $this->db->get();
      return $query->result();
    }

    public function QuestionsByCatId($catId){
      $this->db->select('*');
      $this->db->from('event_dragon_supplier_category_questions');
      $this->db->where('cat_id', $catId);
      $query = $this->db->get();
      return $query->result();
    }
    function insertAnswer($data) {
        $this->db->set($data);
        $this->db->insert('event_dragon_supplier_questionnaire', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    public function getAnswers($catId){
      $this->db->select('*');
      $this->db->from('event_dragon_supplier_questionnaire');
      $this->db->where('supplier_bnk_info_id', $catId);
      $query = $this->db->get();
      return $query->result();
    }

    public function deleteProductPackage($promid){
      $this->db->where('id', $promid);
      $result = $this->db->delete('event_dragon_supplier_promo_products');
      return $result?true:false;
    }
  
    public function deleteMasterProductPackage($packageId){
      $this->db->where('supplier_promo_info_id', $packageId);
      $result = $this->db->delete('event_dragon_supplier_promo_product_packages');
      return $result?true:false;
    }

    function fetchProductPackage($product_id)
     {
          $this->db->where("event_dragon_supplier_promo_products.id", $product_id);
          $query=$this->db->get('event_dragon_supplier_promo_products');
          return $query->result();
     }

     function insertProduct($data){
       $this->db->set($data);
        $this->db->insert('event_dragon_supplier_promo_products', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
     }

     function getProductCount($promid){
       $this->db->select('*');
       $this->db->from('event_dragon_supplier_promo_products');
       $this->db->where('event_dragon_supplier_promo_products.supplier_promo_info_id',$promid);
       $query = $this->db->get();
       return $query->num_rows();
     }

     function updateProduct($id, $data) {

       $this->db->where('id', $id);
       if ($this->db->update('event_dragon_supplier_promo_products', $data)) {
         return true;
       }
       else {
         return false;
       }
     }


		

	}
       