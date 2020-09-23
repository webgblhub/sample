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

  public function categories(){
    $this->db->where('display', 1);
	$this->db->where('dyn_status', 1);
	$this->db->select('cat_id');
      $query = $this->db->get('supplier_category');
      // var_dump($query);exit();
            return $query->result();

  }

   public function insert_pay_methods($switchid)
  {
//		$i=0;
//  		foreach($this->input->post('chk') as $item)
//		{
//			$data=array('switch_id'=>$switchid,'payment_id'=>$item,'value'=>$this->input->post('value')[$i]);
//			$this->db->insert('supplier_payment', $data);
//			$insert_id = $this->db->insert_id();
//			$i++;
//			
//		}
//		$this->db->trans_complete();
//		return $insert_id;

	$this->db->where('switch_id',@$switchid);
	$this->db->delete('supplier_payment');
	
  $i=0;
  		foreach($this->input->post('chk') as $item)
		{
			$data=array('switch_id'=>$switchid,'payment_id'=>$item,'value'=>$this->input->post('value')[$i]);
			$this->db->insert('supplier_payment', $data);
			$insert_id = $this->db->insert_id();
			$i++;
			
		}
		$this->db->trans_complete();
		return $insert_id;

  }
   public function pay_methods(){

      $query = $this->db->get('payment_methods');
      //var_dump($query);exit();
            return $query->result();

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

    public function selectProfileStatus($switchid)
      {
        $i=0;
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('storefront_business');
       
        $this->db->where('id',$switchid);
        $storing = $this->db->get();
   
        $storee= $storing->result();

        

        $this->db->select('*');
          $this->db->from('supplier_business');
          $this->db->where('id',$storee[0]->business_id);
          $query = $this->db->get();
          $row= $query->result();
         
        //print_r($row);exit();

        if(!empty($row))
        {

          if(!empty($row[0]->first_name)){
            $i = $i+1;
          }

          if(!empty($row[0]->company_name)){
            $i = $i+1;
          }

          if(!empty($row[0]->mobile)){
            $i = $i+1;
          }
          if(!empty($row[0]->address)){
            $i = $i+1;
          }
          if(!empty($row[0]->cityid)){
            $i = $i+1;
          }
          if(!empty($row[0]->stateid)){
            $i = $i+1;
          }
          if(!empty($row[0]->zipcode)){
            $i = $i+1;
          }
          if(!empty($row[0]->travel_miles)){
            $i = $i+1;
          }


        }

          //$this->db->distinct();
          $this->db->select('*');
          $this->db->from('supplier_promo');
          $this->db->where('switch_id',$switchid);
          $query1 = $this->db->get();
          $row1= $query1->result();
          if(!empty($row1))
          {
            if(!empty($row1[0]->business_name)){
              $i = $i+1;
            }

            //$i=$i+1;
          }

          /* $this->db->distinct();
          $this->db->select('*');
          $this->db->from('supplier_product_packages');
          $this->db->where('switch_id',$switchid);
          $query2 = $this->db->get();
          $row2= $query2->result();
          if(!empty($row2))
          {
            $i++;
          }*/


          //$this->db->distinct();
          $this->db->select('*');
          $this->db->from('supplier_bank_details');
          $this->db->where('switch_id',$switchid);
          $query3 = $this->db->get();
          $row3= $query3->result();

          if(!empty($row3))
          {
            if(!empty($row3[0]->bank_name)){
              $i = $i+1;

            }
            if(!empty($row3[0]->account_number)){
              $i = $i+1;
            }
            if(!empty($row3[0]->routing_number)){
              $i = $i+1;
            }
            if(!empty($row3[0]->address1)){
              $i = $i+1;
            }
             if(!empty($row3[0]->address2)){
              $i = $i+1;
            }
            if(!empty($row3[0]->city_id)){
              $i = $i+1;
            }
            if(!empty($row3[0]->state_id)){
              $i = $i+1;
            }
            if(!empty($row3[0]->zip_code)){
              $i = $i+1;
            }
            if(!empty($row3[0]->cc_number)){
              $i = $i+1;
            }
            if(!empty($row3[0]->cvc)){
              $i = $i+1;
            }
            if(!empty($row3[0]->holder_name)){
              $i = $i+1;
            }
            if(!empty($row3[0]->billing_address)){
              $i = $i+1;
            }
            if(!empty($row3[0]->billing_zipcode)){
              $i = $i+1;
            }
            if(!empty($row3[0]->cccity)){
              $i = $i+1;
            }
            if(!empty($row3[0]->ccstate)){
              $i = $i+1;
            }
            if(!empty($row3[0]->paypal_address)){
              $i = $i+1;
            }
            if(!empty($row3[0]->months)){
              $i = $i+1;
            }
            if(!empty($row3[0]->years)){
              $i = $i+1;
            }
            


           
          }
          /* $this->db->distinct();
          $this->db->select('*');
          $this->db->from('supplier_photos');
          $this->db->where('switch_id',$switchid);
          $query4 = $this->db->get();
          $row4= $query4->result();
          if(!empty($row4))
          {
            $i++;
          }
           $this->db->distinct();
          $this->db->select('*');
          $this->db->from('supplier_videos');
          $this->db->where('switch_id',$switchid);
          $query5 = $this->db->get();
          $row5= $query5->result();
          if(!empty($row5))
          {
            $i++;
          }*/

        //echo $i;die;

        return $i;
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

      public function updateBusinessstoreFront($data)
      {
        $this->db->where('id',$data['id']);
        $this->db->update('storefront_business',$data);
        return $data['id'];

      }

		function save_promo($data){
            $this->db->insert('supplier_promo', $data);
            return $this->db->insert_id();
        }
         function selectpromoInfo($id){
       $this->db->where('supplier_id',$id);
      
       $query = $this->db->get('supplier_promo');
       return $query->result();

     }

          function saved_photo($data){
      $this->db->insert('supplier_photos', $data);
      return $this->db->insert_id(); 
  }


   function save_photo($data){
    //print_r($data);die;
            $this->db->insert_batch('supplier_photos', $data);
            return $this->db->insert_id(); 
        }

    function get_order($switch_id){
      $this->db->where('switch_id',$switch_id);
      $query =  $this->db->get('supplier_photos');
      return $query->result();
    }


        function add_video($data){
            $this->db->insert('supplier_videos', $data);
            return $this->db->insert_id(); 
        }
        

        function add_video_array($data){
      $this->db->insert('supplier_videos', $data);
      return $this->db->insert_id();

     }

     function category_questions($category_id){
      $this->db->select('*');
      $this->db->from('category_questions');
      $this->db->where('cat_id', $category_id);
      $query = $this->db->get();
      return $query->result();
     }

     function promo_data($switch_id){
  $this->db->where('switch_id', $switch_id);
  $query = $this->db->get('supplier_promo');
  return $query->row();

}
    
public function delete_promo($switch){
  $this->db->where('switch_id', $switch);
    $result = $this->db->delete('supplier_promo');
    return $result;
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
    $ethnicity =empty($data['ethinicity'])?"":implode(',',$data['ethinicity']);
  $data['ethinicity']=$ethnicity;
    $category =empty($data['sports_category'])?"":implode(',',$data['sports_category']);
  $data['sports_category']=$category;
    $denomination =$data['denomination'];
  $data['denomination']=$denomination;
    $language=empty($data['language'])?"":implode(',',$data['language']);
  $data['language']=$language;
    // $lowest =$data['lowest'];
    // $highest =$data['highest'];
    // $average =$data['average'];
    $photos =$data['image'];
    // $maximum=$data['maximum'];


   @$multi_store_type=$data['discount_multi_type'];
    @$multi_discount_amount=$data['multi_discount_amount'];

    @$discount_day_type=$data['discount_day_type'];
    @$discount_days_amt=$data['discount_days_amt'];
    @$peakdaysz =$data['days'];

    @$discount_month_type=$data['discount_month_type'];
    @$discount_month_amt=$data['discount_month_amt'];
    @$peakmonthsz =$data['month'];

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
  $switching=base64_decode($this->uri->segment(4));
  $categories=base64_decode($this->uri->segment(5));
  
    $this->db->select('*');
      $this->db->from('supplier_product_packages');
      $this->db->where('category_id', $categories);
    $this->db->where('switch_id', $switching);
    
      $query = $this->db->get();
    $result=$query->result();
    if(count($result)==0)
    {
        $this->db->insert('supplier_product_packages', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    else
    {
  $this->db->where('switch_id', $switching);
  return $this->db->update('supplier_product_packages', $data);
    }

    // if($this->db->affected_rows())
    // {
    //     return TRUE;
    // }
    //return FALSE;


  }
  
  public function Insert_question_answer($data){
        $this->db->insert('supplier_question_answer', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
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

    $switching=base64_decode($this->uri->segment(4));
    $categories=base64_decode($this->uri->segment(5));
    
    $query = $this->db->get_where('supplier_bank_details', array('switch_id' => $switching));
      $result = $query->result_array();
    if(count($result)==0)
    {
        $this->db->insert('supplier_bank_details', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    else
    {
    $this->db->where('switch_id', $switching);
    return $this->db->update('supplier_bank_details', $data);
    }

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
  
  public function culturals(){
    $this->db->where('status', 1);
      $query = $this->db->get('cultural_speciality');
      // var_dump($query);exit();
            return $query->result();

  }
  
  public function denominations(){
    $this->db->where('status', 1);
      $query = $this->db->get('denominations');
      // var_dump($query);exit();
            return $query->result();

  }
  
  public function languages(){
    $this->db->where('status', 1);
      $query = $this->db->get('language_spoken');
      // var_dump($query);exit();
            return $query->result();

  }
  
  public function sports(){
    $this->db->where('status', 1);
      $query = $this->db->get('sports_category');
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


   		   		public function search()
		{
			$switching=base64_decode($this->uri->segment(4));
			
			$sql="SELECT 
				   COUNT(case when event_lead.status = 'booked' then 1 end) AS bookedcount,
				   COUNT(case when event_lead.status = 'flagged' then 1 end)   AS flaggedcount,
				   storefront_business.views As viewcount,
				   created_at
			FROM customer_info INNER JOIN event_lead on event_lead.customer_id = customer_info.customer_id INNER JOIN storefront_business on event_lead.store_front_id = storefront_business.id where event_lead.supplier_id=".$this->session->userdata('supplier_id');
			
			$where_condition = ''; 
			if($switching!="")
			{
			$sql .= " and storefront_business.id = '".$switching."'";
			}
			if($this->input->get('ser')!="")
			{
			if($this->input->get('ser')==30)
			{
			$sql .= " and created_at BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()";
			}
			if($this->input->get('ser')==60)
			{
			$sql .= " and created_at BETWEEN CURDATE() - INTERVAL 60 DAY AND CURDATE()";
			}
			if($this->input->get('ser')==90)
			{
			$sql .= " and created_at BETWEEN CURDATE() - INTERVAL 90 DAY AND CURDATE()";
			}
			if($this->input->get('ser')=='custom')
			{
			$sql .= " and created_at >='".$this->input->get('datfrom')."'";
			$sql .= " and created_at <='".$this->input->get('datto')."'";
			}
			}
			if($this->input->get('month')!="")
			{
			$sql .= " and MONTH(created_at) = '".$this->input->get('month')."'";
			}
			if($this->input->get('year')!="")
			{
			$sql .= " and YEAR(created_at) = '".$this->input->get('year')."'";	
			}
			$sql .= " and 1 ";
			
			if($this->input->get('ser')==60)
			{
			$sql .= " group by created_at";
			}
			if($this->input->get('ser')=='custom')
			{
			$sql .= " group by created_at";
			}
			if($this->input->get('ser')==30)
			{
			$sql .= " group by created_at";
			}
			if($this->input->get('ser')==90)
			{
			$sql .= " group by MONTH(created_at)";
			}
			if($this->input->get('year')!="")
			{
			$sql .= " group by MONTH(created_at)";
			}
			return $this->db->query($sql, $where_condition)->result();
			
		}
		
		public function getGender()
		{
			$switching=base64_decode($this->uri->segment(4));
			$sql="SELECT 
				   COUNT(case when sex = 'Female' then 1 end) AS femalecount,
				   COUNT(case when sex = 'Male' then 1 end)   AS malecount
			FROM customer_info INNER JOIN event_lead on event_lead.customer_id = customer_info.customer_id where event_lead.supplier_id=".$this->session->userdata('supplier_id');
			
			$where_condition = ''; 
			if($switching!="")
			{
			$sql .= " and event_lead.store_front_id = '".$switching."'";
			}
			if($this->input->get('ser')!="")
			{
			if($this->input->get('ser')==30)
			{
			$sql .= " and created_on BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()";
			}
			if($this->input->get('ser')==60)
			{
			$sql .= " and created_on BETWEEN CURDATE() - INTERVAL 60 DAY AND CURDATE()";
			}
			if($this->input->get('ser')==90)
			{
			$sql .= " and created_on BETWEEN CURDATE() - INTERVAL 90 DAY AND CURDATE()";
			}
			if($this->input->get('ser')=='custom')
			{
			$sql .= " and created_on >='".$this->input->get('datfrom')."'";
			$sql .= " and created_on <='".$this->input->get('datto')."'";
			}
			}
			if($this->input->get('year')!="")
			{
			$sql .= " and YEAR(created_on) = '".$this->input->get('year')."'";	
			}
			if($this->input->get('month')!="")
			{
			$sql .= " and MONTH(created_on) = '".$this->input->get('month')."'";
			}
			$sql .= " and 1";
			
			return $this->db->query($sql, $where_condition)->result();
			
		}
    
    	public function getAge()
		{
			$switching=base64_decode($this->uri->segment(4));
			$sql="SELECT 
			  CASE
				WHEN age BETWEEN 13 AND 17 THEN '13-17'
				WHEN age BETWEEN 18 AND 24 THEN '18-24'
				WHEN age BETWEEN 25 AND 34 THEN '25-34'
				WHEN age BETWEEN 35 AND 44 THEN '35-44'
				WHEN age BETWEEN 45 AND 54 THEN '45-54'
				WHEN age BETWEEN 55 AND 64 THEN '55-64'
				WHEN age > 65 THEN '65+'
				ELSE 'Other'
			  END AS age_group,COUNT(*) AS age_count
			FROM customer_info INNER JOIN event_lead on event_lead.customer_id = customer_info.customer_id where event_lead.supplier_id=".$this->session->userdata('supplier_id')." ";
			
			$where_condition = ''; 
			if($switching!="")
			{
			$sql .= " and event_lead.store_front_id = '".$switching."'";
			}
			if($this->input->get('ser')!="")
			{
			if($this->input->get('ser')==30)
			{
			$sql .= " and created_on BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()";
			}
			if($this->input->get('ser')==60)
			{
			$sql .= " and created_on BETWEEN CURDATE() - INTERVAL 60 DAY AND CURDATE()";
			}
			if($this->input->get('ser')==90)
			{
			$sql .= " and created_on BETWEEN CURDATE() - INTERVAL 90 DAY AND CURDATE()";
			}
			if($this->input->get('ser')=='custom')
			{
			$sql .= " and created_on >='".$this->input->get('datfrom')."'";
			$sql .= " and created_on <='".$this->input->get('datto')."'";
			}
			}
			if($this->input->get('year')!="")
			{
			$sql .= " and YEAR(created_on) = '".$this->input->get('year')."'";	
			}
			if($this->input->get('month')!="")
			{
			$sql .= " and MONTH(created_on) = '".$this->input->get('month')."'";
			}
			$sql .= " and 1 group by age_group";
			
			return $this->db->query($sql, $where_condition)->result();
			
		}

               function delete_image($filename,$switch_id){
      $this->db->where('switch_id', $switch_id);
      $this->db->where('photos', $filename);
      $this->db->delete('supplier_photos');
      return true;
    }
    function delete_product_image($filename,$switch_id,$img_data){
      $this->db->where('package_id', $switch_id);
      $this->db->where('image', $filename);
    $this->db->update('supplier_products',$img_data);
    return true;
     // echo $this->db->last_query();
    }
    function get_category($switch_id){
      $this->db->where('id', $switch_id);
      
      $query = $this->db->get('storefront_business');
      return $query->row();
    }
    
    

	}
       