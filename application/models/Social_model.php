<?php
class Social_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }
  function check_email($email){
      $this->db->where('email',$email);
      $query = $this->db->get('event_dragon_users');
      return $query->row();
  }

 function admin_login($data)
{
    $query = $this->db->get_where('event_dragon_users', array('email' => $data['email']));
    $result = $query->row_array();
        //print_r($result);die;
  
        
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
 function register($data)
{
  // print_r($data);exit();
    $query = $this->db->insert('event_dragon_users', $data);
    $result = $this->db->affected_rows();

    if($result)
    {
        return TRUE;
    }
    return FALSE;
}

}