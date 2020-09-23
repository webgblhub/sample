<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class DiscountType_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}

		
		public function listsofDiscont()
		{
			$this->db->select('*');
			$this->db->from('discount_type');
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function addDiscount($data)
		{
			$this->db->insert('discount_type',$data);
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}

		public function selectDiscountbtId($id)
		{
			$this->db->select('*');
			$this->db->from('discount_type');
			$this->db->where('discount_id',$id);
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function updateDiscount($data)
		{
			$this->db->where('discount_id',$data['discount_id']);
			$this->db->update('discount_type',$data);
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}

		public function deleteDiscountbtId($id)
		{
			$this->db->where('discount_id',$id);
			$this->db->delete('discount_type');
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}

		public function enable($id){
			$data = array(
				'status' => 1
			    );
			$this->db->where('discount_id', $id);
			$this->db->update('discount_type', $data);
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}
		public function disable($id){
			$data = array(
				'status' => 0			    );
			$this->db->where('discount_id', $id);
			$this->db->update('discount_type', $data);
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}


	}