<?php
	class Sports_category_model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}



		public function lists()
		{

                $this->db->order_by('sports_category.name', 'ASC');
                //$this->db->where('status <>', 2); 
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('sports_category');
				return $query->result_array(); 

        }
        public function enable($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		}
		public function desable($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
        }
        function get($id){
            $this->db->where('id',$id);
            $query = $this->db->get('sports_category');
            return $query->row_array();
        }
		function update($data,$id){
            $this->db->where('id',$id);
            return $this->db->update('sports_category', $data);



        }
        function delete($id,$table)
		{
            $this->db->where('id', $id);
  
			$this->db->delete($table);
			return true;
	
        }
        function add($data){
            $this->db->insert('sports_category', $data);
            return $this->db->insert_id();
        }
		
		
		}
