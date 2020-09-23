<?php
class Dashboard_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->tableName = 'event_dragon_supplier_promo_info_photos';
    }

//     function __construct() {
//     parent::__construct();
//     $this->load->database();
//     $this->tableName = 'tbl_albgallery';
//
// }



	public function delete_storefront($data)
	{
		$id=$data['id'];
		$category_id=$data['category_id'];
		$userid=$data['userid'];
		$sql = "DELETE FROM event_dragon_supplier_business_info WHERE id = ? and users_id =? and supplier_category_id=?";
		return $this->db->query($sql, array($id,$userid,$category_id));

	}
     public function socials($data)
    {
        $id             = $data['id'];
        $title          = $data['title'];
        $link            = $data['link'];
        $icon           = $data['icon'];
        $status         = $data['status'];

        if($id)
        {
            $sql = "UPDATE socials SET title = ?, link = ?, icon = ?,  status = ? WHERE id = ?";
            $this->db->query($sql, array($title, $link, $icon,  $status, $id));
        }
        else
        {
            $sql = "INSERT INTO socials (title, link, icon,  status) VALUES (?,?,?,?)";
            $this->db->query($sql, array($title, $link, $icon, $status));
            $id = $this->db->insert_id();
        }

        if($this->db->affected_rows())
        {
            return TRUE;
        }
        return FALSE;
    }
 // ======================================================================================

    public function gallery($data)
    {
        $id             = $data['id'];
        $title          = $data['title'];
        $photo         = $data['photo'];
        $category_id    = $data['category_id'];
        $status         = $data['status'];

        if($id)
        {
            $sql = "UPDATE gallery SET title = ?, photo = ?, category_id = ?,  status = ?  WHERE id = ?";
            $this->db->query($sql, array($title,  $photo, $category_id, $status, $id));
        }
        else
        {
            $sql = "INSERT INTO gallery (title, photo, category_id ,status) VALUES (?,?,?,?)";
            $this->db->query($sql, array($title,  $photo, $category_id,$status));
            $id = $this->db->insert_id();
        }

        if($this->db->affected_rows())
        {
            return TRUE;
        }
        return FALSE;
    }

    // ------------------------------------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------------------------------------
		public function getbankdeatils($table = '', $id = '')
    {
			$sql = "SELECT * FROM $table WHERE users_id = ? order by id desc";
			$query = $this->db->query($sql, array($id));
			$result = $query->first_row();
			return $result;
		}

		public function getnav($table = '', $id = '')
    {
			if($id)
			{

				$this->session->set_userdata('business-info', "Dashboard/edit_businessinfo/$id");
				$this->session->set_userdata('promo-info', "dashboard/edit_prominfok/$id");
				$sql = "SELECT  id  FROM `event_dragon_supplier_promo_info` where business_info_id=$id";
				$query = $this->db->query($sql);
				$result = $query->first_row();
				if(empty($result->id))
				{
					$sql = "SELECT * FROM `event_dragon_supplier_promo_info` ORDER by `id` desc";
					$query = $this->db->query($sql);
					$result = $query->first_row();
					$productid=$result->id+1;
				}
				else{
					$productid=$result->id;
				}




				$this->session->set_userdata('product-info', "dashboard/edit_productinfok/$productid");

				$sql = "SELECT  id  FROM `event_dragon_supplier_promo_product_packages` where supplier_promo_info_id=$productid";
				$query = $this->db->query($sql);
				$result = $query->first_row();

				if(empty($result->id))
				{
					$sql = "SELECT * FROM `event_dragon_supplier_promo_product_packages` ORDER by `id` desc";
					$query = $this->db->query($sql);
					$result = $query->first_row();
					$bank_id=$result->id+1;
				}
				else{
					$bank_id=$result->id;
				}




				$this->session->set_userdata('Bank_info', "dashboard/edit_bankinfok/$bank_id");

				$sql = "SELECT  id  FROM `event_dragon_supplier_business_bank_details` where supplier_product_info_id=$bank_id";
				$query = $this->db->query($sql);
				$result = $query->first_row();

				if(empty($result->id))
				{
					$sql = "SELECT * FROM `event_dragon_supplier_business_bank_details` ORDER by `id` desc";
					$query = $this->db->query($sql);
					$result = $query->first_row();
					$photo_id=$result->id+1;
				}
				else{
					$photo_id=$result->id;
				}


				$this->session->set_userdata('photo_info', "dashboard/edit_photogallery/$photo_id");

        $this->session->set_userdata('video_info', "dashboard/edit_videogallery?nkid=$photo_id");
				$this->session->set_userdata('questionnaire', "dashboard/questionnaire?nkid=$photo_id");



			}
		}



    public function getData($table = '', $id = '')
    {
        if($id)
        {
            $sql = "SELECT * FROM $table WHERE id = ?";
            $query = $this->db->query($sql, array($id));
						$result = $query->result_array();
						if(empty($result))
						{
							$sql = "SELECT * FROM $table ORDER BY id DESC";
							$query = $this->db->query($sql, array());
							$result = $query->result_array();
						}
        }
        else
        {
            $sql = "SELECT * FROM $table ORDER BY id DESC";
            $query = $this->db->query($sql, array());
            $result = $query->result_array();
        }
        return $result;
    }

    // ===========================================================================
    public function getDatas($table = '', $id = '')
    {
        if($id)
        {
            $sql = "SELECT * FROM $table WHERE business_info_id = ?";
            $query = $this->db->query($sql, array($id));
						$result = $query->result_array();
						if(empty($result))
						{
							$sql = "SELECT * FROM $table ORDER BY id DESC";
							$query = $this->db->query($sql, array());
							$result = $query->result_array();
						}
        }
        else
        {
            $sql = "SELECT * FROM $table ORDER BY id DESC";
            $query = $this->db->query($sql, array());
            $result = $query->result_array();
        }
        return $result;
    }
//=====================prod=================================================
public function getDatap($table = '', $id = '')
{

    if($id)
    {
        $sql = "SELECT * FROM $table WHERE supplier_promo_info_id = ?";
        $query = $this->db->query($sql, array($id));
				$result = $query->result_array();
				if(empty($result))
				{
					$sql = "SELECT * FROM $table ORDER BY id DESC";
          $query = $this->db->query($sql, array());
          $result = $query->result_array();
				}
    }
    else
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        $query = $this->db->query($sql, array());
        $result = $query->result_array();
    }
    return $result;
}
//===============================================================================
public function getDatab($table = '', $id = '')
{
    if($id)
    {
        $sql = "SELECT * FROM $table WHERE supplier_product_info_id = ?";
        $query = $this->db->query($sql, array($id));
				$result = $query->result_array();
				if(empty($result))
				{
					$sql = "SELECT * FROM $table ORDER BY id DESC";
					$query = $this->db->query($sql, array());
					$result = $query->result_array();
				}
    }
    else
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        $query = $this->db->query($sql, array());
        $result = $query->result_array();
    }
    return $result;
}

//========================================================================
public function getDataph($table = '', $id = '')
{
    if($id)
    {
        $sql = "SELECT * FROM $table WHERE supplier_bnk_info_id = ?";
        $query = $this->db->query($sql, array($id));
        $result = $query->result_array();
    }
    else
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        $query = $this->db->query($sql, array());
        $result = $query->result_array();
    }
    return $result;
}

//=======================================================================================
    public function getSingleVal($id = '', $table = '', $field = '')
    {
        if($id && $table && $field)
        {
            $sql = "SELECT $field FROM $table WHERE id = ?";
            $query = $this->db->query($sql, array($id));
            $result = $query->result_array();

            return $result[0][$field];
        }
        else
        {
            return FALSE;
        }
    }

    public function makeOptions($table = '', $field = '',$active = '')
    {
        if($table && $field)
        {
            $sql = "SELECT * FROM $table ORDER BY $field";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            $options = '';

            foreach ($result as $res)
            {
                if($active == $res['id']){ $selected = "selected"; } else { $selected = ""; }
                $options .= '<option value="'.$res['id'].'" '. $selected.'>'.$res[$field].'</option>';
            }

            echo $options;
        }
        else
        {
            return FALSE;
        }
    }

    public function deleteData($table = '', $id = '')
    {
        if($id)
        {
            $sql = "DELETE FROM $table WHERE id = ?";
            $this->db->query($sql, array($id));

            return TRUE;
        }

    }
    //==============================backend model==============================================================================================
    public function Insert_create_store_front($data){


      $id             = $data['id'];
      $title          = $data['title'];
      $users_id          = $data['users_id'];


      if($id)
      {
          $sql = "UPDATE event_dragon_supplier_business_info SET title = ?WHERE id = ?";
          $this->db->query($sql, array($title,$id));
      }
      else
      {
          $sql = "INSERT INTO event_dragon_supplier_business_info(users_id,supplier_category_id) VALUES (?,?)";
          $this->db->query($sql, array($users_id,$title));
          $query = $this->db->insert_id();
          return $query;

      }

      if($this->db->affected_rows())
      {
          return TRUE;
      }
      return FALSE;


  }

  //businessinfo===================================================

  public function Insert_business_info($data){
          $users_id = $data['users_id'];
          $id = $data['scid'];
          $first_name = $data['first_name'];
          $prefix = $data['prefix'];
          $last_name = $data['last_name'];
          $Company_name = $data['Company_name'];
          $email_address = $data['email_address'];
          $description = $data['description'];
          $mobile_number = $data['mobile_number'];
          $landline_number = $data['landline_number'];
          $landline_number_ext = $data['landline_number_ext'];
          $fax_number = $data['fax_number'];
          $address1 = $data['address1'];
          $address2 = $data['address2'];
          $city_id = $data['city_id'];
          $state_id = $data['state_id'];
          $supplier_miles = $data['accepteble_travel_miles'];
          $dynamic_classification = $data['dynamic_classification'];
          $zipcode = $data['zipcode'];
          $accept_cat_idd = $data['accept'];
          $supplier_forms = $data['supplier_forms'];
          $certify = $data['certify'];
					$name_prefix ="1";
					$nationwide=empty($data['nationalwide'])?"":$data['nationalwide'];
$supplier_acceptable_event_business_categories_ids=$data['supplier_acceptable_event_business_categories_ids'];


            // print_r( $prefix);exit();



						if(!empty($supplier_acceptable_event_business_categories_ids)){
							$supplier_acceptable_event_business_categories_ids =implode(",",$supplier_acceptable_event_business_categories_ids);
							}else{
								$supplier_acceptable_event_business_categories_ids="";
							}


            if(!empty($accept_cat_idd)){
            $accept_cat_id =implode(",",$accept_cat_idd);
            }else{
              $accept_cat_id="";
            }

          if($id)
          {
            // print_r($id);exit();


          $sql = "UPDATE event_dragon_supplier_business_info SET name_prefix = ?, first_name = ?, last_name = ?, company_name = ?, email_address = ?, mobile_number = ?,
          landline_number = ?, landline_number_ext = ?, fax_number = ?, address1 = ?, address2 = ?, city_id= ?, state_id = ?, zipcode = ?,
          supplier_travel_miles = ?,dynamic_classification = ?, supplier_acceptable_event_categories_ids = ?, supplier_insurance_forms = ?, supplier_certification = ?,nationalwide=?,supplier_acceptable_event_business_categories_ids=? WHERE supplier_category_id = ? && users_id = ?";

        $this->db->query($sql, array($prefix, $first_name, $last_name, $Company_name, $email_address, $mobile_number, $landline_number, $landline_number_ext,
         $fax_number, $address1, $address2, $city_id, $state_id, $zipcode, $supplier_miles,$dynamic_classification, $accept_cat_id, $supplier_forms, $certify,$nationwide,$supplier_acceptable_event_business_categories_ids,$id,$users_id));


          }
          else
          {
              // $sql = "INSERT INTO event_dragon_supplier_business_info(supplier_category_id) VALUES (?)";
              //
              // $this->db->query($sql, array($title));
              // $id = $this->db->insert_id();
          }

          if($this->db->affected_rows())
          {
              return TRUE;
          }
          return FALSE;


  }
  //===========================================================================
  public function Insert_promo_info($data){

    // $id =  $data['users_id'];
    $id             = $data['id'];
    $scid            = $data['scid'];
    $personal_bios=  $data['personal_bio'];
    $personal_photos=  $data['personal_photo'];
    $business_info_id=  $data['business_info_id'];
    $business_name  =  $data['business_name'];
    $business_desc   =  $data['business_desc'];
    // $business_logo  =  $data['business_logo'];
    $business_fb_link   =  $data['business_fb_link'];
    $business_linkedin_link   =  $data['business_linkedin_link'];
    $business_instagram_link   =  $data['business_instagram_link'];
    $business_twitter_link  =  $data['business_twitter_link'];
    $busyid            = $data['busyid'];
    $supyid            = $data['supyid'];



    if(!empty($personal_photos)){
      $personal_photo = $personal_photos;
    }else{
      $personal_photo="";
    }



    // print_r($supyid);exit();

    if($id)
    {
      $sql = "UPDATE event_dragon_supplier_promo_info SET business_info_id = ?,supplier_category_id= ?,business_name= ?,business_desc= ?,personal_bio= ?,
      personal_photo= ?,business_fb_link= ?,business_linkedin_link= ?,business_instagram_link= ?,business_twitter_link= ? WHERE supplier_category_id = ? && business_info_id = ? ";

    $this->db->query($sql, array($business_info_id,$supyid,$business_name,$business_desc,$personal_bios,$personal_photo,
    $business_fb_link,$business_linkedin_link,$business_instagram_link,$business_twitter_link,$supyid,$busyid));

    }
    else
    {


        $sql = "INSERT INTO event_dragon_supplier_promo_info(business_info_id,supplier_category_id,business_name,business_desc,personal_bio,personal_photo,business_fb_link,
          business_linkedin_link,business_instagram_link,business_twitter_link)
        VALUES (?,?,?,?,?,?,?,?,?,?)";

        $this->db->query($sql, array($business_info_id,$scid,$business_name,$business_desc,$personal_bios,$personal_photo,
        $business_fb_link,$business_linkedin_link,$business_instagram_link,$business_twitter_link));
        $query = $this->db->insert_id();
        return $query;
    }

    if($this->db->affected_rows())
    {
        return TRUE;
    }
    return FALSE;


  }
  //=========================================================================================================================================
  public function Insert_product_info($data){

    // $id => $this->session->userdata('admin_id'),
    $id = isset($this->input->post['id'])?$this->input->post['id']:'';
    $promid = $data['promid'];
    $product_name = $data['product_name'];
    $product_number = $data['product_number'];
    $product_price =$data['product_price'];
    $product_detail =$data['product_detail'];
    $product_video =$data['product_video'];
    // $discount =$data['discount'];
    // $minimum=$data['minimum'];
    // $cost=$data['cost'];
    // $style =$data['style'];
    // $peakdaysz =$data['peakdays'];
    // $peakmonthsz =$data['peakmonths'];
    $ethnicity =empty($data['ethnicity'])?"":implode(',',$data['ethnicity']);
    $category =empty($data['category'])?"":implode(',',$data['category']);
    $denomination =$data['denomination'];
    $language=empty($data['language'])?"":implode(',',$data['language']);
    // $lowest =$data['lowest'];
    // $highest =$data['highest'];
    // $average =$data['average'];
		$photos =$data['pro_image'];
		// $maximum=$data['maximum'];


   $multi_store_type=$data['discount_multi_type'];
    $multi_discount_amount=$data['multi_discount_amount'];

    $discount_day_type=$data['discount_day_type'];
    $discount_days_amt=$data['discount_days_amt'];
    $peakdaysz =$data['peakdays'];

    $discount_month_type=$data['discount_month_type'];
    $discount_month_amt=$data['discount_month_amt'];
    $peakmonthsz =$data['peakmonths'];

    if(!empty($peakdaysz)){
      $peakdays = implode(",",$peakdaysz);
    }else{
      $peakdays="";
    }

    if(!empty($peakmonthsz)){
      $peakmonths = implode(",",$peakmonthsz);
    }else{
      $peakmonths="";
    }
    if(!empty($photos)){
      $photo = $photos;
    }else{
      $photo="";
    }

// $peakdays = implode(",",$peakdaysz);

  // print_r($personal_bio);exit();

    if($id)
    {
      $sql = "UPDATE event_dragon_supplier_business_info SET title = ?WHERE id = ?";
      $this->db->query($sql, array($title,$id));

    }
    else
    {

        $sql = "INSERT INTO event_dragon_supplier_promo_product_packages(supplier_promo_info_id,product_name,product_number,product_price,product_desc,product_image,product_video,discount_multi_type,
        multi_discount_amount,discount_day_type,discount_days_amt,supplier_peak_days,discount_month_type,discount_month_amt,supplier_peak_month,supplier_ethinicity,supplier_denomination,
        supplier_language,supplier_sports_category)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $this->db->query($sql, array($promid,$product_name,$product_number,$product_price,$product_detail,$photo,$product_video,$multi_store_type,$multi_discount_amount,$discount_day_type,$discount_days_amt,$peakdays,$discount_month_type,$discount_month_amt,$peakmonths,$ethnicity,$denomination,$language,$category));
        $query = $this->db->insert_id();
        return $query;
    }

    // if($this->db->affected_rows())
    // {
    //     return TRUE;
    // }
    return FALSE;


  }
  //======================================================bank========================
  public function Insert_bank_info($data){

    // $id => $this->session->userdata('admin_id'),


    $id = $data['id'];
    $prod_id = $data['prod_id'];
    $bank_name=  $data['bank_name'];
    $account_nr=  $data['account_nr'];
    $routing_nr=  $data['routing_nr'];
    $city   =  $data['city'];
    $bank_addr2   =  $data['bank_addr2'];
    $bank_addr1   =  $data['bank_addr1'];
    $state   =  $data['state'];
    $zipcode   =  $data['zipcode'];
    $ccnr   =  $data['ccnr'];
    $ccdate   =  $data['ccdate'];
    $paypal_addr   =  $data['paypal_addr'];
    $Default   =  $data['Default'];
		$ccvc   =  $data['ccvc'];
		$month=$data['month'];
		$year=$data['year'];

		$user_id=$data['users_id'];

		$holder_name=$data['holder_name'];
		$cc_number=$data['cc_number'];
		$billing_address=$data['billing_address'];
		$billing_zipcode=$data['billing_zipcode'];
		$load_default=$data['load_default'];
		$same_email_business=$data['same_email'];




    if($id)
    {
      $sql = "UPDATE event_dragon_supplier_business_bank_details SET title = ?WHERE id = ?";
      $this->db->query($sql, array($title,$id));

    }
    else
    {

        $sql = "INSERT INTO event_dragon_supplier_business_bank_details(supplier_product_info_id,bank_name,bank_account_number,bank_routing_number,bank_address1,
        bank_address2,bank_city_id,bank_state_id,bank_zip_code,cc_date,cc_cvc,paypal_address,months,years,users_id,holder_name,cc_number,billing_address,billing_zipcode,load_default,same_email_business)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $this->db->query($sql, array($prod_id,$bank_name,$account_nr,$routing_nr,$bank_addr2,$bank_addr1,$city,$state,$zipcode,$ccdate,$ccvc,$paypal_addr,$month,$year,$user_id,$holder_name,$cc_number,$billing_address,$billing_zipcode,$load_default,$same_email_business));
        $query = $this->db->insert_id();
        return $query;
    }

    if($this->db->affected_rows())
    {
        return TRUE;
    }
    return FALSE;


  }
  //videoinfo=============================================
public function Insert_video_info($data){


    $id    = $data['id'];
    $nkid  = $data['nkid'];
    $link1 =  $data['link1'];
    $link2 =  $data['link2'];


    if($id)
    {
      $sql = "UPDATE event_dragon_supplier_business_bank_details SET title = ?WHERE id = ?";
      $this->db->query($sql, array($title,$id));

    }
    else
    {

        $sql = "INSERT INTO event_dragon_supplier_promo_info_videos(supplier_bnk_info_id,video1,video2)
        VALUES (?,?,?)";

        $this->db->query($sql, array($nkid,$link1,$link2));
        $query = $this->db->insert_id();
        return $query;
    }

    if($this->db->affected_rows())
    {
        return TRUE;
    }
    return FALSE;


  }
  //================================================================================================

public function update_video_info($data){


    $id    = $data['id'];
    $nkid  = $data['nkid'];
    $link1 =  $data['link1'];
    $link2 =  $data['link2'];


    if($id)
    {
      $sql = "UPDATE event_dragon_supplier_promo_info_videos SET supplier_bnk_info_id= ?,video1= ?,video2= ? WHERE id = ?";
      $this->db->query($sql, array($nkid,$link1,$link2,$id));

    }
    else
    {

        $sql = "INSERT INTO event_dragon_supplier_promo_info_videosx(title)
        VALUES (?,?)";

        $this->db->query($sql, array($nkid,$link1,$link2));
        $query = $this->db->insert_id();
        return $query;
    }

    if($this->db->affected_rows())
    {
        return TRUE;
    }
    return FALSE;


  }



//=================================================================================
  public function gets_store_category(){
              $this->db->order_by('event_dragon_supplier_category.category','ASC');
      $query = $this->db->get('event_dragon_supplier_category');

      // var_dump($query);exit();
            return $query->result();

  }
  public function gets_event_category(){

      $query = $this->db->get('event_dragon_supplier_event_categories');
      // var_dump($query);exit();
            return $query->result();

	}
	public function gets_business_event_category()
	{
		$query = $this->db->get('event_dragon_supplier__businessevent_categories');
		// var_dump($query);exit();
					return $query->result();
	}
  public function product_weekdays(){

      $query = $this->db->get('event_dragon_days');
      // var_dump($query);exit();
            return $query->result();

  }
  public function product_months(){

      $query = $this->db->get('event_dragon_months');
      // var_dump($query);exit();
            return $query->result();

  }
  public function gets_storefront_category($adid){
    $query = $this->db->where("event_dragon_supplier_business_info.users_id",$adid)
                   ->select("event_dragon_supplier_business_info.*,event_dragon_supplier_category.*")
                   ->from("event_dragon_supplier_business_info")
                   ->join("event_dragon_supplier_category","event_dragon_supplier_category.cat_id=event_dragon_supplier_business_info.supplier_category_id","left")
									 ->get();

                   return $query->result();
                    // print_r($this->db->last_query());
                    // exit();
  }

  //===============updation here================================

  public function update_business_info($data){

          $users_id = $data['users_id'];
          $id = $data['scid'];
          $first_name = $data['first_name'];
          $prefix = $data['prefix'];
          $last_name = $data['last_name'];
          $Company_name = $data['Company_name'];
          $email_address = $data['email_address'];
          $description = $data['description'];
          $mobile_number = $data['mobile_number'];
          $landline_number = $data['landline_number'];
          $landline_number_ext = $data['landline_number_ext'];
          $fax_number = $data['fax_number'];
          $address1 = $data['address1'];
          $address2 = $data['address2'];
          $city_id = $data['city_id'];
          $state_id = $data['state_id'];
          $supplier_miles = $data['accepteble_travel_miles'];
          $dynamic_classification = $data['dynamic_classification'];
          $zipcode = $data['zipcode'];
          $accept_cat_idd = $data['accept'];
          $supplier_forms = isset($data['supplier_forms'])?$data['supplier_forms']:'';
					$certify = isset($data['certify'])?$data['certify']:'';
					$nationalwide = empty($data['nationalwide'])?0:$data['nationalwide'];
					$supplier_acceptable_event_business_categories_ids=$data['supplier_acceptable_event_business_categories_ids'];





				if(!empty($supplier_acceptable_event_business_categories_ids)){
					$supplier_acceptable_event_business_categories_ids =implode(",",$supplier_acceptable_event_business_categories_ids);
					}else{
						$supplier_acceptable_event_business_categories_ids="";
					}

            if(!empty($accept_cat_idd)){
            $accept_cat_id =implode(",",$accept_cat_idd);
            }else{
              $accept_cat_id="";
            }

          if($id)
          {
            // print_r($id);exit();

if(empty($supplier_forms) && empty($certify))
{
	$sql = "UPDATE event_dragon_supplier_business_info SET name_prefix = ?, first_name = ?, last_name = ?, company_name = ?, email_address = ?, mobile_number = ?,
	landline_number = ?, landline_number_ext = ?, fax_number = ?, address1 = ?, address2 = ?, city_id= ?, state_id = ?, zipcode = ?,
	supplier_travel_miles = ?, supplier_acceptable_event_categories_ids = ?,nationalwide=?,supplier_acceptable_event_business_categories_ids=?,dynamic_classification =? WHERE supplier_category_id = ? && users_id = ?";

 $this->db->query($sql, array($prefix, $first_name, $last_name, $Company_name, $email_address, $mobile_number, $landline_number, $landline_number_ext,
 $fax_number, $address1, $address2, $city_id, $state_id, $zipcode, $supplier_miles, $accept_cat_id,$nationalwide,$supplier_acceptable_event_business_categories_ids,$dynamic_classification,$id,$users_id));


}
else if(!empty($supplier_forms) && empty($certify))
{
	$sql = "UPDATE event_dragon_supplier_business_info SET name_prefix = ?, first_name = ?, last_name = ?, company_name = ?, email_address = ?, mobile_number = ?,
	landline_number = ?, landline_number_ext = ?, fax_number = ?, address1 = ?, address2 = ?, city_id= ?, state_id = ?, zipcode = ?,
	supplier_travel_miles = ?, supplier_acceptable_event_categories_ids = ?, supplier_insurance_forms = ?,nationalwide=?,supplier_acceptable_event_business_categories_ids=?,dynamic_classification=? WHERE supplier_category_id = ? && users_id = ?";

 $this->db->query($sql, array($prefix, $first_name, $last_name, $Company_name, $email_address, $mobile_number, $landline_number, $landline_number_ext,
 $fax_number, $address1, $address2, $city_id, $state_id, $zipcode, $supplier_miles, $accept_cat_id, $supplier_forms,$nationalwide,$supplier_acceptable_event_business_categories_ids,$dynamic_classification,$id,$users_id));


}
else if(empty($supplier_forms) && !empty($certify))
{
	$sql = "UPDATE event_dragon_supplier_business_info SET name_prefix = ?, first_name = ?, last_name = ?, company_name = ?, email_address = ?, mobile_number = ?,
          landline_number = ?, landline_number_ext = ?, fax_number = ?, address1 = ?, address2 = ?, city_id= ?, state_id = ?, zipcode = ?,
          supplier_travel_miles = ?, supplier_acceptable_event_categories_ids = ?, supplier_certification = ?,nationalwide=?,supplier_acceptable_event_business_categories_ids=?,dynamic_classification=? WHERE supplier_category_id = ? && users_id = ?";

         $this->db->query($sql, array($prefix, $first_name, $last_name, $Company_name, $email_address, $mobile_number, $landline_number, $landline_number_ext,
         $fax_number, $address1, $address2, $city_id, $state_id, $zipcode, $supplier_miles, $accept_cat_id, $certify,$nationalwide,$supplier_acceptable_event_business_categories_ids,$dynamic_classification,$id,$users_id));


}
else if(!empty($supplier_forms) && !empty($certify))
{
	$sql = "UPDATE event_dragon_supplier_business_info SET name_prefix = ?, first_name = ?, last_name = ?, company_name = ?, email_address = ?, mobile_number = ?,
          landline_number = ?, landline_number_ext = ?, fax_number = ?, address1 = ?, address2 = ?, city_id= ?, state_id = ?, zipcode = ?,
          supplier_travel_miles = ?, supplier_acceptable_event_categories_ids = ?, supplier_insurance_forms = ?, supplier_certification = ?,nationalwide=?,supplier_acceptable_event_business_categories_ids=?,dynamic_classification=?  WHERE supplier_category_id = ? && users_id = ?";

         $this->db->query($sql, array($prefix, $first_name, $last_name, $Company_name, $email_address, $mobile_number, $landline_number, $landline_number_ext,
         $fax_number, $address1, $address2, $city_id, $state_id, $zipcode, $supplier_miles, $accept_cat_id, $supplier_forms, $certify,$nationalwide,$supplier_acceptable_event_business_categories_ids,$dynamic_classification,$id,$users_id));


}

          }
          else
          {
              // $sql = "INSERT INTO event_dragon_supplier_business_info(supplier_category_id) VALUES (?)";
              //
              // $this->db->query($sql, array($title));
              // $id = $this->db->insert_id();
          }

          if($this->db->affected_rows())
          {
              return TRUE;
          }
          return FALSE;


  }
  //==============update_promoinfo==================================
  public function update_promo_info($data){

    // $id =  $data['users_id'];
    $id             = $data['id'];
    $scid            = $data['scid'];
    $personal_bios=  $data['personal_bio'];
    $personal_photos=  $data['personal_photo'];
    $business_info_id=  $data['business_info_id'];
    $business_name  =  $data['business_name'];
    $business_desc   =  $data['business_desc'];
    // $business_logo  =  $data['business_logo'];
    $business_fb_link   =  $data['business_fb_link'];
    $business_linkedin_link   =  $data['business_linkedin_link'];
    $business_instagram_link   =  $data['business_instagram_link'];
    $business_twitter_link  =  $data['business_twitter_link'];
    $busyid            = $data['busyid'];
    $supyid            = $data['supyid'];

    // print_r($busyid);exit();




		if(!empty($personal_photos)){
      $personal_photo = $personal_photos;
    }else{
      $personal_photo="";
    }


    // print_r($supyid);exit();

    if($id)
    {
			if(!empty($personal_photos)){
				$personal_photo = $personal_photos;
				$sql = "UPDATE event_dragon_supplier_promo_info SET business_info_id = ?,supplier_category_id= ?,business_name= ?,business_desc= ?,personal_bio= ?,
				personal_photo= ?,business_fb_link= ?,business_linkedin_link= ?,business_instagram_link= ?,business_twitter_link= ? WHERE supplier_category_id = ? && business_info_id = ? ";

			$this->db->query($sql, array($busyid,$supyid,$business_name,$business_desc,$personal_bios,$personal_photo,
			$business_fb_link,$business_linkedin_link,$business_instagram_link,$business_twitter_link,$supyid,$busyid));
			}else{

				$sql = "UPDATE event_dragon_supplier_promo_info SET business_info_id = ?,supplier_category_id= ?,business_name= ?,business_desc= ?,personal_bio= ?,
				business_fb_link= ?,business_linkedin_link= ?,business_instagram_link= ?,business_twitter_link= ? WHERE supplier_category_id = ? && business_info_id = ? ";

			$this->db->query($sql, array($busyid,$supyid,$business_name,$business_desc,$personal_bios,
			$business_fb_link,$business_linkedin_link,$business_instagram_link,$business_twitter_link,$supyid,$busyid));
			}



    }
    else
    {


        $sql = "INSERT INTO event_dragon_supplier_promo_info(business_info_id,supplier_category_id,business_name,business_desc,personal_bio,personal_photo,business_fb_link,
          business_linkedin_link,business_instagram_link,business_twitter_link)
        VALUES (?,?,?,?,?,?,?,?,?,?)";

        $this->db->query($sql, array($business_info_id,$scid,$business_name,$business_desc,$personal_bio,$personal_photo,
        $business_fb_link,$business_linkedin_link,$business_instagram_link,$business_twitter_link));
        $query = $this->db->insert_id();
        return $query;
    }

    if($this->db->affected_rows())
    {
        return TRUE;
    }
    return FALSE;


  }
  //==============================product update=======================================
  public function update_product_info($data){

    // $id => $this->session->userdata('admin_id'),
    $id = $data['id'];
    $prid = $data['prid'];
    $promid = $data['promid'];
    $product_name = $data['product_name'];
    $product_number = $data['product_number'];
    $product_price =$data['product_price'];
    $product_detail =$data['product_detail'];
    $product_video =$data['product_video'];
    // $discount =$data['discount'];
    // $minimum=$data['minimum'];
    // $cost=$data['cost'];
    // $style =$data['style'];
    
    $ethnicity =empty($data['ethnicity'])?"":implode(',',$data['ethnicity']);
    $category =empty($data['category'])?"":implode(',',$data['category']);
    $denomination =$data['denomination'];
    $language=empty($data['language'])?"":implode(',',$data['language']);
    // $lowest =$data['lowest'];
    // $highest =$data['highest'];
    // $average =$data['average'];
		$photos =$data['pro_image'];
		// $maximum=$data['maximum'];
  //   $multi_storefront_flat_amount=$data['flat_amount'];
		// $discount_type=$data['discount_type'];
    $multi_store_type=$data['discount_multi_type'];
    $multi_discount_amount=$data['multi_discount_amount'];

    $discount_day_type=$data['discount_day_type'];
    $discount_days_amt=$data['discount_days_amt'];
    $peakdaysz =$data['peakdays'];

    $discount_month_type=$data['discount_month_type'];
    $discount_month_amt=$data['discount_month_amt'];
    $peakmonthsz =$data['peakmonths'];

  // print_r($id);exit();

    if(!empty($peakdaysz)){
      $peakdays = implode(",",$peakdaysz);
    }else{
      $peakdays="";
    }

    if(!empty($peakmonthsz)){
      $peakmonths = implode(",",$peakmonthsz);
    }else{
      $peakmonths="";
    }


// $peakdays = implode(",",$peakdaysz);

  // print_r($personal_bio);exit();

    if($id)
    {

			if(!empty($photos)){
				$sql = "UPDATE event_dragon_supplier_promo_product_packages SET supplier_promo_info_id = ?,product_name = ?,product_number = ?,product_price = ?,product_desc = ?,product_image = ?,product_video = ?,discount_multi_type = ?,multi_discount_amount = ?,discount_day_type = ?,discount_days_amt = ?,supplier_peak_days = ?,discount_month_type = ?,discount_month_amt = ?,supplier_peak_month = ?,supplier_ethinicity = ?,supplier_denomination = ?,
      supplier_language = ?,supplier_sports_category = ? WHERE id = ?";
      $this->db->query($sql, array($prid,$product_name,$product_number,$product_price,$product_detail,$photos,$product_video,$multi_store_type,$multi_discount_amount,$discount_day_type,$discount_days_amt,$peakdays,$discount_month_type,$discount_month_amt,$peakmonths,$ethnicity,
      $denomination,$language,$category,$id));
			}else{


				$sql = "UPDATE event_dragon_supplier_promo_product_packages SET supplier_promo_info_id = ?,product_name = ?,product_number = ?,product_price = ?,product_desc = ?,product_video = ?,discount_multi_type = ?,multi_discount_amount = ?,discount_day_type = ?,discount_days_amt = ?,supplier_peak_days = ?,discount_month_type = ?,discount_month_amt = ?,supplier_peak_month = ?,supplier_ethinicity = ?,supplier_denomination = ?,
      supplier_language = ?,supplier_sports_category = ? WHERE id = ?";
      $this->db->query($sql, array($prid,$product_name,$product_number,$product_price,$product_detail,$product_video,$multi_store_type,$multi_discount_amount,$discount_day_type,$discount_days_amt,$peakdays,$discount_month_type,$discount_month_amt,$peakmonths,$ethnicity,
      $denomination,$language,$category,$id));


			}




    }
    else
    {

      $sql = "INSERT INTO event_dragon_supplier_business_info(users_id,supplier_category_id) VALUES (?,?)";
      $this->db->query($sql, array($users_id,$title));
      $query = $this->db->insert_id();
      return $query;

    }

    if($this->db->affected_rows())
    {
        return TRUE;
    }
    return FALSE;


  }
//update bankdetails=======================================
public function update_bank_info($data){

  $id = $data['id'];
  $prod_id = $data['prod_id'];
  $proid = $data['proid'];
  $bank_name=  $data['bank_name'];
  $account_nr=  $data['account_nr'];
  $routing_nr=  $data['routing_nr'];
  $city   =  $data['city'];
  $bank_addr2   =  $data['bank_addr2'];
  $bank_addr1   =  $data['bank_addr1'];
  $state   =  $data['state'];
  $zipcode   =  $data['zipcode'];
  $ccnr   =  $data['ccnr'];
  $ccdate   =  $data['ccdate'];
  $paypal_addr   =  $data['paypal_addr'];
  $Default   =  $data['Default'];
	$ccvc   =  $data['ccvc'];
	$month=$data['month'];
	$year=$data['year'];
	$holder_name=$data['holder_name'];
	$cc_number=$data['cc_number'];
	$billing_address=$data['billing_address'];
	$billing_zipcode=$data['billing_zipcode'];
	$load_default=$data['load_default'];
	$same_email_business=$data['same_email'];


// print_r($proid);exit();

  if($id)
  {
    $sql = "UPDATE event_dragon_supplier_business_bank_details SET supplier_product_info_id= ?,bank_name= ?,bank_account_number= ?,bank_routing_number= ?,bank_address1= ?,
    bank_address2= ?,bank_city_id= ?,bank_state_id= ?,bank_zip_code= ?,cc_number= ?,cc_date= ?,cc_cvc= ?,paypal_address= ?,months=?,years=?,holder_name=?,cc_number=?,billing_address=?,billing_zipcode=?,load_default=?,same_email_business=? WHERE id = ?";
    $this->db->query($sql, array($proid,$bank_name,$account_nr,$routing_nr,$bank_addr2,$bank_addr1,$city,$state,$zipcode,$ccnr,$ccdate,$ccvc,$paypal_addr,$month,$year,$holder_name,$cc_number,$billing_address,$billing_zipcode,$load_default,$same_email_business,$id));

  }
  else
  {

    $sql = "INSERT INTO event_dragon_supplier_business_info(users_id,supplier_category_id) VALUES (?,?)";
    $this->db->query($sql, array($users_id,$title));
    $query = $this->db->insert_id();
    return $query;
  }

  if($this->db->affected_rows())
  {
      return TRUE;
  }
  return FALSE;


}

public function getphotoid(){


	$sql = "SELECT DISTINCT(`supplier_bnk_info_id`) FROM `event_dragon_supplier_promo_info_photos` ORDER by `supplier_bnk_info_id` desc";
			$query = $this->db->query($sql);
			$result = $query->first_row();
$data=$result->supplier_bnk_info_id+1;
return $data;



}
//photogallery=============================
public function getRows($id = ''){
        $this->db->select('photos');
        $this->db->from('event_dragon_supplier_promo_info_photos');
        if($id){
            $this->db->where('supplier_bnk_info_id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            // $this->db->order_by('id','supplier_promo_info_id');  //order by uploaded on
            $this->db->order_by('id');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }

    /*
     * Insert file data into the database
     * @param array the data for inserting into the table
     */
    public function insert($data = array()){
        $insert = $this->db->insert_batch('event_dragon_supplier_promo_info_photos',$data);
        // $query = $this->db->insert_id();

        return $insert?true:false;
		}


		public function deleteimagegallery($table,$id)
		{
			$sql = "DELETE FROM $table WHERE id = ?";
			$this->db->query($sql, array($id));
			//echo $this->db->last_query();exit;

			return TRUE;
		}

    public function checkQuestionbyCate($catId){
      $sql = 'SELECT * FROM event_dragon_supplier_category_questions where cat_id= ?';
      $query = $this->db->query($sql, array($catId));
      return $query->num_rows();
    }

    public function getCatId($masterId){
      $this->db->select('supplier_category_id');
      $this->db->from('event_dragon_supplier_business_info');
      $this->db->where('id', $masterId);
      $query = $this->db->get();
      return $query->row();
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


  //==============================================================================================


// Manuja Edit Start ==================================================

     public function getLeadMessage($id,$sid)
     {
        $this->db->select('custom_supplier_chat.*,customer_info.customer_id,customer_info.firstname,customer_info.lastname,event_lead.event_date,event_lead.lead_id,event_lead.status');
      $this->db->from('custom_supplier_chat');
      $this->db->join('customer_info','customer_info.customer_id=custom_supplier_chat.from_id');
      $this->db->join('event_lead','event_lead.lead_id=custom_supplier_chat.lead_id');
      $this->db->where('custom_supplier_chat.to_id', $id);
       $this->db->where('event_lead.store_front_id', $sid);
      $this->db->order_by('event_date','DESC');
      $this->db->group_by('custom_supplier_chat.lead_id');
      $query = $this->db->get();
      return $query->result();
     }

     public function getLeadMessagebySearch($id,$key,$sid)
     {
          if($key=="recent")
          {
           $this->db->select('custom_supplier_chat.*,customer_info.*,event_lead.event_date,event_lead.lead_id,event_lead.status');
          $this->db->from('custom_supplier_chat');
          $this->db->join('customer_info','customer_info.customer_id=custom_supplier_chat.from_id');
          $this->db->join('event_lead','event_lead.lead_id=custom_supplier_chat.lead_id');
          $this->db->where('custom_supplier_chat.to_id', $id);
           $this->db->where('event_lead.store_front_id', $sid);
          $this->db->order_by('event_date','DESC');
          $this->db->group_by('custom_supplier_chat.lead_id');
            $query = $this->db->get();
            return $query->result();
          }
           else if($key=="wdate")
          {
           $this->db->select('custom_supplier_chat.*,customer_info.*,event_lead.event_date,event_lead.lead_id,event_lead.status');
          $this->db->from('custom_supplier_chat');
          $this->db->join('customer_info','customer_info.customer_id=custom_supplier_chat.from_id');
          $this->db->join('event_lead','event_lead.lead_id=custom_supplier_chat.lead_id');
          $this->db->where('custom_supplier_chat.to_id', $id);
           $this->db->where('event_lead.store_front_id', $sid);
          $this->db->order_by('event_date','DESC');
          $this->db->group_by('custom_supplier_chat.lead_id');
            $query = $this->db->get();
            return $query->result();
          }

           else if($key=="idate")
          {
            $this->db->select('custom_supplier_chat.*,customer_info.*,event_lead.event_date,event_lead.lead_id,event_lead.status');
            $this->db->from('custom_supplier_chat');
            $this->db->join('customer_info','customer_info.customer_id=custom_supplier_chat.from_id');
            $this->db->join('event_lead','event_lead.lead_id=custom_supplier_chat.lead_id');
            $this->db->where('custom_supplier_chat.to_id', $id);
             $this->db->where('event_lead.store_front_id', $sid);
            $this->db->order_by('date','DESC');
            $this->db->group_by('custom_supplier_chat.lead_id');

            $query = $this->db->get();
            return $query->result();
          }
           else if($key=="fname")
          {
            $this->db->select('custom_supplier_chat.*,customer_info.*,event_lead.event_date,event_lead.lead_id,event_lead.status');
            $this->db->from('custom_supplier_chat');
            $this->db->join('customer_info','customer_info.customer_id=custom_supplier_chat.from_id');
            $this->db->join('event_lead','event_lead.lead_id=custom_supplier_chat.lead_id');
            $this->db->where('custom_supplier_chat.to_id', $id);
             $this->db->where('event_lead.store_front_id', $sid);
             $this->db->order_by('event_lead.firstname','DESC');
            $this->db->group_by('custom_supplier_chat.lead_id');

            $query = $this->db->get();
            return $query->result();
          }
           else if($key=="lname")
          {
           $this->db->select('custom_supplier_chat.*,customer_info.*,event_lead.event_date,event_lead.lead_id,event_lead.status');
            $this->db->from('custom_supplier_chat');
            $this->db->join('customer_info','customer_info.customer_id=custom_supplier_chat.from_id');
            $this->db->join('event_lead','event_lead.lead_id=custom_supplier_chat.lead_id');
            $this->db->where('custom_supplier_chat.to_id', $id);
             $this->db->where('event_lead.store_front_id', $sid);
             $this->db->order_by('event_lead.lastname','DESC');
            $this->db->group_by('custom_supplier_chat.lead_id');

            $query = $this->db->get();
            return $query->result();
          }
           else if($key=="booked")
          {

             $this->db->select('custom_supplier_chat.*,customer_info.*,event_lead.event_date,event_lead.lead_id,event_lead.status');
            $this->db->from('custom_supplier_chat');
            $this->db->join('customer_info','customer_info.customer_id=custom_supplier_chat.from_id');
            $this->db->join('event_lead','event_lead.lead_id=custom_supplier_chat.lead_id');
             $this->db->where('event_lead.status', 'booked');
            $this->db->where('custom_supplier_chat.to_id', $id);
             $this->db->where('event_lead.store_front_id', $sid);
             $this->db->order_by('event_lead.event_date','DESC');
            $this->db->group_by('custom_supplier_chat.lead_id');


            $query = $this->db->get();
            return $query->result();
          }
           else if($key=="flag")
          {
            $this->db->select('custom_supplier_chat.*,customer_info.*,event_lead.event_date,event_lead.lead_id,event_lead.status');
            $this->db->from('custom_supplier_chat');
            $this->db->join('customer_info','customer_info.customer_id=custom_supplier_chat.from_id');
            $this->db->join('event_lead','event_lead.lead_id=custom_supplier_chat.lead_id');
             $this->db->where('event_lead.status', 'flagged');
            $this->db->where('custom_supplier_chat.to_id', $id);
             $this->db->where('event_lead.store_front_id', $sid);
             $this->db->order_by('event_lead.event_date','DESC');
            $this->db->group_by('custom_supplier_chat.lead_id');

            $query = $this->db->get();
            return $query->result();
          }
           else if($key=="archive")
          {

            $this->db->select('custom_supplier_chat.*,customer_info.*,event_lead.event_date,event_lead.lead_id,event_lead.status');
            $this->db->from('custom_supplier_chat');
            $this->db->join('customer_info','customer_info.customer_id=custom_supplier_chat.from_id');
            $this->db->join('event_lead','event_lead.lead_id=custom_supplier_chat.lead_id');
             $this->db->where('event_lead.status', 'archived');
            $this->db->where('custom_supplier_chat.to_id', $id);
             $this->db->where('event_lead.store_front_id', $sid);
             $this->db->order_by('event_lead.event_date','DESC');
            $this->db->group_by('custom_supplier_chat.lead_id');




            $query = $this->db->get();
            return $query->result();
          }


     }

     public function getLeadsbyId($userid,$leadid)
     {
          $this->db->select('*');
          $this->db->from('event_lead');
          $this->db->join('custom_supplier_chat','custom_supplier_chat.lead_id=event_lead.lead_id');
          $this->db->where('event_lead.supplier_id', $userid);
          $this->db->where('event_lead.lead_id', $leadid);
           $this->db->group_by('custom_supplier_chat.lead_id');
          $query = $this->db->get();

          return $query->result();
      }

      public function add_replay($data)
      {
        // $this->db->where('customer_lead_id',$data['customer_lead_id']);
        // $result=$this->db->update('customer_lead_message',$data);
        $result=$this->db->insert('custom_supplier_chat',$data);
        return $result?true:false;
      }


      //==============================================================================================


    // Sreejith Edit Start ==================================================

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

     ///manuja Start Editing


     public function getDiscountType()
     {
       $this->db->select('*');
      $this->db->from('discount_type');
      $this->db->where('status', '1');
      $query = $this->db->get();
      return $query->result();
     }

     public function getCity()
  {
    $state=$this->input->post('State_id');
    $this->db->where('state_id', $state);
      $query = $this->db->get('cities');
    return $query->result_array(); 
  }
  
  public function getCity2()
  {
    $state=$this->input->post('state');
    $this->db->where('state_id', $state);
      $query = $this->db->get('cities');
    return $query->result_array(); 
  }


}
