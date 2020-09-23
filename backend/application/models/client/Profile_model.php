<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function __construct()
    {
       
    }
	
    public function lists()
    {
      $this->db->select('*');
      $this->db->from('customer_info');
				$this->db->order_by('created_on', 'DESC');
      $query = $this->db->get();
	  return $query->result_array(); 
    }
	
    public function select_customer_details($id)
    {
    	 $this->db->select('*');
      $this->db->from('customer_info');
      $this->db->where('customer_id', $id);
      $query = $this->db->get();
      return $query->result();
    }
    public function update_customer_details($data)
    {
    	$this->db->where('customer_id',$data['customer_id']);
    	$this->db->update('customer_info',$data);

    	$result = $this->db->affected_rows();

	        if($result)
	        {
				return TRUE;
	        }
	        return FALSE;
    }

    public function customerBusinessDetails($cid)
    {
		$this->db->select('*');
      $this->db->from('customer_business_info');
      $this->db->where('customer_id', $cid);
      $query = $this->db->get();
      return $query->result();    
  }

  public function update_customer_bisness_details($data)
  {
  		$this->db->select('*');
      $this->db->from('customer_business_info');
      $this->db->where('customer_id', $data['customer_id']);
      $query = $this->db->get();
      $row= $query->result(); 
      if(!empty($row))
      {
      	$this->db->where('customer_id',$data['customer_id']);
    	$this->db->update('customer_business_info',$data);

    	$result = $this->db->affected_rows();

	        if($result)
	        {
				return TRUE;
	        }
	        return FALSE;
      } 
      else
      {
      	$this->db->insert('customer_business_info',$data);
      	$result = $this->db->affected_rows();

	        if($result)
	        {
				return TRUE;
	        }
	        return FALSE;
      }  
  }

  

   



}