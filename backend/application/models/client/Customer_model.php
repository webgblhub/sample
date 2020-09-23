<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    public function __construct()
    {
       
    }

     public function register($data)
    {

    	$email=array('email' =>$data['email']);
    	$check=$this->email_check($data['email'],'customer_info');
    	if(empty($check))
    	{
	       	$this->db->insert('customer_info',$email);


	        $query = $this->db->insert('customer_login', $data);

	        $result = $this->db->affected_rows();

	        if($result)
	        {
				return TRUE;
	        }
	        return FALSE;
    	}
    	else
    	{
    		return "available";
    	}

    }

    public function email_check($email,$table)
    {

     	$this->db->select('email');
    	$this->db->from($table);
    	$this->db->where('email',$email);
    	$query=$this->db->get();
    	return $query->result();
    }

    public function customer_login($data)
    {
    	 $query = $this->db->get_where('customer_login', array('email' => $data['email'], 'password' => $data['password']));
         $result = $query->row_array();

         $query1 = $this->db->get_where('customer_info', array('email' => $data['email']));
         $result1 = $query1->row_array();

        if($result)
        {
            $sessdata = array(
                'customer_id'     => $result1['customer_id'],
               
                'customer_email'  => $result['email'],
                
                'customer_logged' => TRUE
            );

            $this->session->set_userdata($sessdata);
            return TRUE;
        }
        return FALSE;

    }
    
}
