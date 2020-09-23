<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    public function __construct()
    {
       
    }

    public function selectAllClientSelectedCategory($cid)
    {
		  $this->db->select('customer_supplier_category.*,event_dragon_supplier_category.*');
	      $this->db->from('customer_supplier_category');
	      $this->db->join('event_dragon_supplier_category','cat_id=select_category_id');
	      $this->db->where('customer_id',$cid);
	      $this->db->order_by('created_on','ASC');
	      $query = $this->db->get();
	      return $query->result();
    }

    public function selectAllSupplierCategory()
    {
    	  $this->db->select('*');
	      $this->db->from('event_dragon_supplier_category');
	      $query = $this->db->get();
	      return $query->result();
    }

    public function insert_supplier_category($data)
    {
    	$this->db->insert('customer_supplier_category',$data);
    	$result = $this->db->affected_rows();

	        if($result)
	        {
				return TRUE;
	        }
	        return FALSE;
    }

     public function deleteClientSelectCategory($t)
	    {
	    	$this->db->where('id',$t);
	    	$this->db->delete('customer_supplier_category');
	    	$result = $this->db->affected_rows();
	    	if($result)
	        {
				return TRUE;
	        }
	        return FALSE;
	    }

	public function selectSupplierCategorybyId($id)
	{
		  $this->db->select('customer_supplier_category.*,event_dragon_supplier_category.*');
	      $this->db->from('customer_supplier_category');
	      $this->db->join('event_dragon_supplier_category','cat_id=select_category_id');
	      $this->db->where('id',$id);
	      $query = $this->db->get();
	      return $query->result();
	}
	public function selectSupplierCategoryExpect($cid)
	{
		  $this->db->select('*');
	      $this->db->from('event_dragon_supplier_category');
	      $this->db->where('cat_id !=',$cid);
	      $query = $this->db->get();
	      return $query->result();
	}

	public function update_supplier_category($data)
	{
		$this->db->where('id',$data['id']);
	    	$this->db->update('customer_supplier_category',$data);
	    	$result = $this->db->affected_rows();

	        if($result)
	        {
				return TRUE;
	        }
	        return FALSE;
	}



}