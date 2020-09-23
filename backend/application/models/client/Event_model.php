<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

    public function __construct()
    {
       
    }

    public function selectallEventtype()
	    {
	      $this->db->select('*');
	      $this->db->from('event_dragon_supplier_event_categories');
	      $query = $this->db->get();
	      return $query->result();
	    }
	    public function selectCreatedevent($cid)
	    {
	    	$this->db->select('*');
	  		$this->db->from('customer_events');
	  		$this->db->where('customer_id',$cid);
	  		$this->db->where('event_name',"");
	  		$query = $this->db->get();
	  		 
	     	 return $query->result();
	     	 
	    }

    public function saveEventDetails($data)
	  {
	  		$this->db->select('*');
	  		$this->db->from('customer_events');
	  		$this->db->where('customer_id',$data['customer_id']);
	  		$this->db->where('event_name',"");
	  		$query = $this->db->get();
			$r= $query->result();

			if(!empty($r))
			{
				$this->db->where('event_id',$r[0]->event_id);
		    	$this->db->update('customer_events',$data);
		    	$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
			}
			else
			{
		  		$this->db->insert('customer_events',$data);
		  		$result = $this->db->affected_rows();
			    	if($result)
				        {
							return TRUE;
				        }
				        return FALSE;
	  		}
	        
	  }

	  public function selectallEvent($cid)
	    {
	      $this->db->select('customer_events.*');
	      $this->db->from('customer_events');
	      $this->db->where('customer_id',$cid);
	      $this->db->order_by('event_date','ASC');
	      $query = $this->db->get();
	      return $query->result();
	    }

	    public function selectEventbyId($eid)
	    {
	    	$this->db->select('customer_events.*');
	      $this->db->from('customer_events');
	     
	      $this->db->where('event_id',$eid);
	      $query = $this->db->get();
	      return $query->result();
	    }

	    public function updateEventDetails($data)
	    {
	    	$this->db->where('event_id',$data['event_id']);
	    	$this->db->update('customer_events',$data);
	    	$result = $this->db->affected_rows();

	        if($result)
	        {
				return TRUE;
	        }
	        return FALSE;
	    }

	    public function deleteEventDetails($t)
	    {
	    	$this->db->where('event_id',$t);
	    	$this->db->delete('customer_events');
	    	$result = $this->db->affected_rows();
	    	if($result)
	        {
				return TRUE;
	        }
	        return FALSE;
	    }

}
