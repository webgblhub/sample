<?php
	class Edit_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}

	 public function selectBusinessInfo($id)
    {
      $this->db->select('storefront_business.*,supplier_business.*,storefront_business.id as storeid');
      $this->db->from('storefront_business');
      $this->db->join('supplier_business','supplier_business.id=business_id');
      
      $this->db->where('storefront_business.id',$id);
      $query = $this->db->get();
        $row= $query->result();
          if(empty($row))
          {
           $this->db->select('*,storefront_business.id as storeid');
          $this->db->from('storefront_business');
          $this->db->where('storefront_business.id',$id);
      $query = $this->db->get();
        $row= $query->result();
          }
          else
          {

       if(!empty($row[0]->cityid))
       {
        $this->db->select('id,name');
        $this->db->from('cities');
        $this->db->where('id',$row[0]->cityid);
        $query1 = $this->db->get();
          $row1= $query1->result();
        $row[0]->cityid=$row1[0]->id;
        $row[0]->name=$row1[0]->name;
       
       }
     }
        return $row;
    }

public function update_pay_methods($switchid){
	$this->db->where('switch_id',$switchid);
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


      public function selectCityName($city_id)
    {
      $this->db->select('*');
      $this->db->from('cities');
      $this->db->where('id',$city_id);
      $query = $this->db->get();
        $row= $query->result();
        return $row;
    }

		public function editBusinessInfo($data)
		{
         if(!empty($data['days'])){
          $data['days'] = implode(",",$data['days']);
        }else{
          $data['days']="";
        }

        if(!empty($data['month'])){
          $data['month'] = implode(",",$data['month']);
        }else{
          $data['month']="";
        }
			 $this->db->where('id',$data['id']);
            return $this->db->update('supplier_business', $data);
		}

		public function deleteBusinessInfo($id)
		{
			$this->db->select('business_id');
			$this->db->from('storefront_business');
			$this->db->where('id',$id);
			$query = $this->db->get();
	  		$row= $query->result();
	  		//print_r($row);die;
	  		$this->db->select('category_id');
			$this->db->from('storefront_business');
			$this->db->where('business_id',$row[0]->business_id);
			$query1 = $this->db->get();
	  		$row1= $query1->result();
	  		$count=count($row1);
	  		if($count>1)
	  		{
	  			$this->db->where('id',$id);
	  			return $this->db->delete('storefront_business');
	  		}
	  		else
	  		{
	  			$this->db->where('id',$row[0]->business_id);
	  			$this->db->delete('supplier_business');

	  			$this->db->where('id',$id);
	  			return $this->db->delete('storefront_business');
	  		}

		}

		public function selectListOfReviews($sid,$cid)
		{
			$this->db->select('*');
			$this->db->from('supplier_reviews');
			$this->db->where('supplier_id',$sid);
			$this->db->where('category_id',$cid);
      $this->db->where('status','1');
      $this->db->order_by('id','desc');
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function selectSupplierid($id)
		{
			$this->db->select('*');
			$this->db->from('storefront_business');
			$this->db->where('id',$id);
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		 public function selectCategoryname($id)
    {
     $this->db->select('category');
      $this->db->from('storefront_business');
      $this->db->join('supplier_category','category_id=cat_id');          
      $this->db->where('storefront_business.id',$id); 
      $query = $this->db->get();
        $row= $query->result();
        if(!empty($row[0]->business_id))
        {
          $this->db->select('company_name');
      $this->db->from('supplier_business');
      $this->db->where('id',$row[0]->business_id);
      $query1 = $this->db->get();
        $row1= $query1->result();
        $row[0]->company_name=$row1[0]->company_name;
          
        }
        else
        {
           $row[0]->company_name="";
        }
        return $row;
    }

    public function selectCategorynamebycatId($cid)
    {
      $this->db->select('category');
      $this->db->from('supplier_category');
      $this->db->where('cat_id',$cid);
      $query = $this->db->get();
        $row= $query->result();
        return $row;
    }
     public function getBussinessInfo($id)
    {
        $this->db->select('*');
        $this->db->from('supplier_business');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $row= $query->result();
        return $row;
    }


// Lead ==================================================================================


     public function get_booked_lead($store_front_id,$s){

       $st=$this->selectSupplierid($store_front_id);
       //echo $s;die;
       if($s=="not")
       {
        $t="event_lead.created_at";
       }
       else if($s=="recent")
       {
        $t="event_lead.created_at";

       }
       else if($s=="wdate")
       {
        $t="event_lead.event_date";

       }
       else if($s=="idate")
       {
        $t="event_lead.created_at";

       }
       else if($s=="fname")
       {
        $t="customer_info.firstname";

       }
       else if($s=="lname")
       {
        $t="customer_info.lastname";

       }
       else
       {
        $t="event_lead.created_at";
       }



      $this->db->select('event_lead.*,event_lead.status as estatus,customer_info.*,custom_supplier_chat.message');
      $this->db->from('event_lead');
      $this->db->join('custom_supplier_chat', 'custom_supplier_chat.lead_id  = event_lead.lead_id');
      $this->db->join('customer_info', 'customer_info.customer_id  = custom_supplier_chat.from_id');
      $this->db->where('store_front_id', $store_front_id);
      $this->db->where('event_lead.supplier_id', $st[0]->supplier_id);
      $this->db->where('custom_supplier_chat.to_id', $st[0]->supplier_id);
      $this->db->where('event_lead.status','booked');
      //$this->db->where('event_lead.supplier_id', $supplier_id);
      $this->db->order_by($t ,'asc');
       $this->db->group_by('custom_supplier_chat.lead_id');

      $query = $this->db->get();
      return $query->result();
      //echo $this->db->last_query();

    }

     function get_lead($store_front_id,$s){

      $f="not";

      if($s=="not")
       {
        $t="event_lead.created_at";
       }
       else if($s=="recent")
       {
        $t="event_lead.created_at";

       }
       else if($s=="wdate")
       {
        $t="event_lead.event_date";

       }
       else if($s=="idate")
       {
        $t="event_lead.created_at";

       }
       else if($s=="fname")
       {
        $t="customer_info.firstname";

       }
       else if($s=="lname")
       {
        $t="customer_info.lastname";

       }
       else if($s=="booked")
       {
        $f="booked";

       }
       else if($s=="flag")
       {
        $f="flagged";

       }
       else if($s=="archive")
       {
        $f="archive";

       }
        else
       {
        $t="event_lead.created_at";
       }


           $st=$this->selectSupplierid($store_front_id);

      $this->db->select('event_lead.*,event_lead.status as estatus,customer_info.*,custom_supplier_chat.message');
      $this->db->from('event_lead'); 
      $this->db->join('custom_supplier_chat', 'custom_supplier_chat.lead_id  = event_lead.lead_id');
      $this->db->join('customer_info', 'customer_info.customer_id  = custom_supplier_chat.from_id');
      $this->db->where('event_lead.store_front_id', $store_front_id);
      $this->db->where('event_lead.supplier_id', $st[0]->supplier_id);
      $this->db->where('custom_supplier_chat.to_id', $st[0]->supplier_id);
        if($f!="not")
        {
        $this->db->where('event_lead.status',$f);
      }
      else
      {
      //$this->db->where('event_lead.supplier_id', $supplier_id);
      $this->db->order_by($t ,'desc');
    }
       $this->db->group_by('custom_supplier_chat.lead_id');
      $query = $this->db->get();
      return $query->result();
      //echo $this->db->last_query();

    }
    function lead_details($lead_id,$userid){


          $this->db->select('*');
          $this->db->from('event_lead');
          $this->db->join('custom_supplier_chat','custom_supplier_chat.lead_id=event_lead.lead_id');
           $this->db->join('customer_info', 'customer_info.customer_id  = custom_supplier_chat.from_id');
          $this->db->where('event_lead.supplier_id', $userid);
          $this->db->where('event_lead.lead_id', $lead_id);
          $this->db->group_by('custom_supplier_chat.lead_id');
          $query = $this->db->get();

          return $query->result();

    }

     public function add_replay($data)
      {
        
        $result=$this->db->insert('custom_supplier_chat',$data);
        return $result?true:false;
      }

  public function getallmessages($user_id,$lead_id,$cust_id)
      { 

                $update='(from_id='.$cust_id .' and to_id ='.$user_id.')';
              $sataus=array('msg_read_status' =>'1');
                $this->db->where($update);
                $this->db->update('custom_supplier_chat',$sataus);



           $where='((from_id='.$user_id .' and to_id ='.$cust_id.') OR (from_id ='.$cust_id .' AND to_id ='.$user_id .'))';

          $this->db->select('*');
          $this->db->from('custom_supplier_chat');
          $this->db->where($where);
          $this->db->order_by('id','ASC');
          $query = $this->db->get();
          
          return $query->result();
      }

      public function getStoreFrontbyLead($lead_id)
      {
        $this->db->select('*');
        $this->db->from('event_lead');
        $this->db->where('lead_id',$lead_id);
        $query = $this->db->get();
        return $query->result();
      }

    

     public function getmessages($id)
      {
          $this->db->select('*');
          $this->db->from('custom_supplier_chat');
          $this->db->where('id',$id);
          $query = $this->db->get();
          return $query->result();
      }


//Lead End ===================================================================================

		//jisha edited ==================================================================



		  function get_promo_data($store_front_id){
    $this->db->where('switch_id',$store_front_id);
    $query = $this->db->get('supplier_promo');
    return $query->row();

}

function edit_promo($data,$store_front_id){

$this->db->where('switch_id',$store_front_id);
 $this->db->update('supplier_promo', $data);
  
}

 function get_Categoryname($store_front_id){
    $this->db->where('id',$store_front_id);
      
    $query = $this->db->get('storefront_business');
    return $query->row();
  }
  function category_questions($category_id,$switch_id){
 
  
  //   $this->db->select('t1.id,t1.cat_id,t1.question,t1.status,t1.ques_type,t1.answer,t1.must_required,t2.answer as supplier_answer');
  //   $this->db->from('category_questions as t1');
  //   $this->db->where('t1.cat_id', $category_id);
  //   //$this->db->where('t3.id', $store_front_id);

  //   $this->db->join('supplier_question_answer as t2', 't1.id = t2.question_id');
  //   //$this->db->join('storefront_business as t3', 't3.id = t2.switch_id');
  //  $query = $this->db->get();
  //  //return $query->result();
  //   echo $this->db->last_query();exit();
  $this->db->select('category_questions.*,supplier_question_answer.answer as qanswer');
  $this->db->from('category_questions');
  $this->db->join('supplier_question_answer', 'supplier_question_answer.question_id = category_questions.id');
  $this->db->where('cat_id', $category_id);
  $this->db->where('switch_id', $switch_id);
  $query = $this->db->get();
  //$questions = $query->result();
  return $query->result();
     
   }
   function answer($question_id){
    $this->db->select('*');
    $this->db->from('supplier_question_answer');
    $this->db->where('question_id', $question_id);
    $query = $this->db->get();
    $answer = $query->result();
   }

 function get_promo_user_data($id){
    $this->db->where('supplier_id',$id);
      
    $query = $this->db->get('supplier_promo');
    return $query->result();
  }

function get_photo_data($store_front_id){
  $this->db->where('switch_id',$store_front_id);
   $this->db->order_by('display_order','ASC');
   $query = $this->db->get('supplier_photos');
   //echo $this->db->last_query();
  return $query->result();
}
public function delete($id,$table)
{
   
  $this->db->where('id', $id);
  
  $this->db->delete($table);
  return true;
}
function get_video_data($store_front_id){
  $this->db->where('switch_id',$store_front_id);
  $query = $this->db->get('supplier_videos');
  return $query->result();
}

function get_articles($category_id){
  $this->db->where('cat_id',$category_id);
  $query = $this->db->get('questionnaire_articles');
  return $query->result();
}

       
		// ASiSH EDIT ---------------------------

		
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
   
    public function deleteProductPackage($promid){

      $this->db->where('id', $promid);
      $result = $this->db->delete('supplier_products');
      return $result?true:false;
    }
  
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
//    if(!empty($data[days])){
//      $data['days'] = implode(",",$data[days]);
//    }else{
//      $data['days']="";
//    }
//
//    if(!empty($data['month'])){
//      $data['month'] = implode(",",$data['month']);
//    }else{
//      $data['month']="";
//    }
  
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
  function get_img_data($id){
    $this->db->where('id', $id);
      
    $query = $this->db->get('supplier_photos');
    return $query->row();
  }
  function pdt_img_exists($switch_id,$filename){
    $this->db->where('package_id', $switch_id);
    $this->db->where('image', $filename);

      
    $query = $this->db->get('supplier_products');
    return $query->row();
  }
	}