<?php
	class Mail_template_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}



		public function lists()
		{

				$query = $this->db->get('master_template');
				return $query->result_array(); 

        }

        function get_header(){
            $this->db->where('category','master template');
            $query = $this->db->get('master_template');
            return $query->row();
        }
        function get_body($id){
            $this->db->where('id',$id);
            $query = $this->db->get('master_template');
            return $query->row();

        }
        function delete($id,$table){
            $this->db->where('id', $id);
            $this->db->delete($table);
			return true;
        }
        function update($data,$id){
            $this->db->where('id',$id);
            return $this->db->update('master_template', $data);

        }
        function save($data){
            return $this->db->insert('master_template', $data);
        }
        function message_lists()
		{
                $query = $this->db->get('messages');
				return $query->result_array(); 

        }
        function save_message($data){
            return $this->db->insert('messages', $data);
        }
        function get_message($id){
            $this->db->where('id',$id);
            $query = $this->db->get('messages');
            return $query->row();
        }
        function update_message($data,$id){
            $this->db->where('id',$id);
            return $this->db->update('messages', $data);
            //echo $this->db->last_query();die();
        }
    }