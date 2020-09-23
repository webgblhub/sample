<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class State_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}

		public function listsofState()
		{
			$this->db->select('*');
			$this->db->from('states');
			$this->db->where('country_id','233');
			$this->db->order_by('name','ASC');
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}
		public function is_code_available($code)
		{
			$this->db->select('*');
			$this->db->from('states');
			$this->db->where('iso2',$code);
			$query = $this->db->get();
	  		$row= $query->result();
	  		 if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
		}

		public function addState($data)
		{
			$this->db->insert('states',$data);
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}

		public function selectStatebtId($sc)
		{
			$this->db->select('*');
			$this->db->from('states');
			$this->db->where('id',$sc);
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function updateState($data)
		{
			$this->db->where('id',$data['id']);
			$this->db->update('states',$data);
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}

		public function deleteStatebtId($scid)
		{
			$this->db->where('id',$scid);
			$this->db->delete('states');
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}

		public function listsofCity($state_id)
		{
			$this->db->select('cities.*,states.name as statename');
			$this->db->from('cities');
			$this->db->join('states','states.id=cities.state_id');
			$this->db->where('state_id',$state_id);
			$this->db->order_by('name','ASC');
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function addCity($data)
		{
			$this->db->insert('cities',$data);
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}

		public function selectCityId($id)
		{
			$this->db->select('cities.*,states.name as statename,states.id as stateid');
			$this->db->from('cities');
			$this->db->join('states','states.id=cities.state_id');
			$this->db->where('cities.id',$id);
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function listsofotherState($sid)
		{
			$this->db->select('*');
			$this->db->from('states');
			$this->db->where('id !=',$sid);
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function updateCity($data)
		{
			$this->db->where('id',$data['id']);
			$this->db->update('cities',$data);
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}

		public function deleteCitybtId($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('cities');
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;

		}


}
