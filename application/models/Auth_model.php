<?php
class Auth_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function admin_login($data)
    {
        $query = $this->db->get_where('event_dragon_users', array('email' => $data['email'],'user_email_verified'=>1));
        $result = $query->row_array();
            //print_r($result);die;
        if (password_verify($data['password'], $result['password'])){
            
            $sessdata = array(
                'supplier_id'     => $result['id'],
                // 'admin_name'   => $result['name'],
                'admin_email'  => $result['email'],
                'role'         => $result['role'],
                'admin_logged' => TRUE
            );

            $this->session->set_userdata($sessdata);
            return TRUE;
        }
        return FALSE;
    }

    public function register($data)
    {
      // print_r($data);exit();
        $query = $this->db->insert('event_dragon_users', $data);
		return $this->db->insert_id();
//        $result = $this->db->affected_rows();
//
//        if($result)
//        {
//			return TRUE;
//        }
//        return FALSE;
    }
	
	function activate($id)
	{
	$data=array('user_email_verified'=>1);
	$this->db->where('id', $id);
return $this->db->update('event_dragon_users', $data);
	}

    function verifyUserEmail($email){
        
        $this->db->where('email',$email);    
        
        $this->db->from('event_dragon_users'); 
        $data = $this->db->get();
        if($data->num_rows() > 0){
            return $data->row();
        }else{
            return false;
        }
    }
    function update_password($data,$email){
        $this->db->where('email',$email); 
       
        if($this->db->update('event_dragon_users',$data)==true){
            return true;
            }else{
                return false;
            } 

    }
    function get_forgot_template(){
        $this->db->where('category','Forgot Password');
        $query = $this->db->get('master_template');
       return $query->row();
      // echo $this->db->last_query();die();
    }
    function get_template(){
        $this->db->where('id',3);
        $query = $this->db->get('master_template');
        return $query->row();
    }

    function header_template(){
        $this->db->where('category','master template');
        $query = $this->db->get('master_template');
        return $query->row();
    }

}
