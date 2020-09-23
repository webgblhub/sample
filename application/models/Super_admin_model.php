<?php
class Super_admin_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  function get_admin_for_auth($email, $password){
    $this->db->where('email', $email); 
    $this->db->where('password', $password); 
    $this->db->where('status', '1'); 
    $lt_query = $this->db->get('event_super_admin');
    return $lt_query->row_array();
  }
  function get_suppliers(){
    //$this->db->where('status <>', 0); 
    $this->db->order_by("id", "desc");
    $query = $this->db->get('event_dragon_users');
    return $query->result();
  }
  function get_leads($supplier_id){
    $this->db->where('supplier_id',$supplier_id);
    $query = $this->db->get('customer_lead_message');
    return $query->result();
  }
  function get_customer_details($customer_id){
    $this->db->where('customer_id',$customer_id);
    $query = $this->db->get('customer_info');
    return $query->row_array();
  }
  function get_business_info($user_id){
    $this->db->where('users_id',$user_id);
    
    $this->db->where('status <>', 0); 
    $query = $this->db->get('event_dragon_supplier_business_info');
    
    return $query->result();

  }
  function get_business_info_user($business_info_id){
    $this->db->where('id',$business_info_id);
    $query = $this->db->get('event_dragon_supplier_business_info');
    return $query->row();

    
  }

  function get_promo_info($bus_id){
    $this->db->where('status <>', 0); 
    $this->db->where('business_info_id',$bus_id);

    $query = $this->db->get('event_dragon_supplier_promo_info');
    return $query->result();  
  }
  function get_promo_info_user($promo_info_id){
    $this->db->where('status <>', 0); 
    $this->db->where('id',$promo_info_id);
    $query = $this->db->get('event_dragon_supplier_promo_info');
    return $query->row();
  }
  function edit_promo_info_details($edit_data,$business_info_id){
    $this->db->where('id', $business_info_id);
    $this->db->update('event_dragon_supplier_promo_info', $edit_data);
  }
  function edit_business_info_details($edit_data,$promo_info_id){
    $this->db->where('id', $promo_info_id);
    $this->db->update('event_dragon_supplier_business_info', $edit_data);
  }
  function delete_data($editdata, $record_id){
    $this->db->where('id', $record_id);
    $this->db->update('event_dragon_supplier_business_info', $editdata);
   
}
function delete_promo_data($editdata, $record_id){
  $this->db->where('id', $record_id);
  $this->db->update('event_dragon_supplier_promo_info', $editdata);

}
function register_supplier($data){
  $query = $this->db->insert('event_dragon_users', $data);
  $result = $this->db->affected_rows();

  if($result)
  {
return TRUE;
  }
  return FALSE;
}
function get_supplier_data($supplier_id){
  //$this->db->where('status <>', 0); 
  $this->db->where('id',$supplier_id);
  $query = $this->db->get('event_dragon_users');
  return $query->row();
}
function edit_supplier($data_edit,$supplier_id){
  $this->db->where('id', $supplier_id);
  $this->db->update('event_dragon_users', $data_edit);
}
function get_user_id($business_id){
  $this->db->where('id', $business_id);
  $query = $this->db->get('event_dragon_supplier_business_info');
  return $query->row();

}
function insert_business_info($data){
  //$users_id = $data['users_id'];
  
  
  $query = $this->db->insert('event_dragon_supplier_business_info',$data);
  return $this->db->insert_id();
  //echo $this->db->last_query();
}
function insert_promo_info($data){
  $query = $this->db->insert('event_dragon_supplier_promo_info',$data);
  return $this->db->insert_id();
}
function get_promo_data($promo){
  $this->db->where('id', $promo);
  $query = $this->db->get('event_dragon_supplier_promo_info');
  return $query->row();
}
function insert_product_info($data){
  $query = $this->db->insert('event_dragon_supplier_promo_product_packages',$data);
  return $this->db->insert_id();
}




}