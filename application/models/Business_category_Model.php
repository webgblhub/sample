<?php
	class Business_category_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}



		public function lists()
		{

                $this->db->order_by('businessevent_categories.event_categories', 'ASC');
                $this->db->where('display <>', 2); 
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('businessevent_categories');
				return $query->result_array(); 

        }
        public function enable($id,$table){
			$data = array(
				'display' => 1
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}
		public function desable($id,$table){
			$data = array(
				'display' => 0
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
        }
        function get($id){
            $this->db->where('id',$id);
            $query = $this->db->get('businessevent_categories');
            return $query->row_array();
        }
		function update($data,$id){
            $this->db->where('id',$id);
            return $this->db->update('businessevent_categories', $data);



        }
        function delete($data,$id)
		{
            $this->db->where('id', $id);
            return $this->db->update('businessevent_categories', $data);
	
        }
        function add($data){
            $this->db->insert('businessevent_categories', $data);
            return $this->db->insert_id();
        }
		
		
		}
