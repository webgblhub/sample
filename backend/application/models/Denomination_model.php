<?php
	class Denomination_model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}



		public function lists()
		{

                $this->db->order_by('denominations.denomination', 'ASC');
               // $this->db->where('status <>', 2); 
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('denominations');
				return $query->result_array(); 

        }
        public function enable($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
			//echo $this->db->last_query();
		}
		public function desable($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('id', $id);
			return $this->db->update($table, $data);
		//	echo $this->db->last_query();

        }
        function get($id){
            $this->db->where('id',$id);
            $query = $this->db->get('denominations');
            return $query->row_array();
        }
		function update($data,$id){
            $this->db->where('id',$id);
            return $this->db->update('denominations', $data);



        }
        function delete($id,$table)
		{
            $this->db->where('id', $id);
  
			$this->db->delete($table);
			return true;
	
        }
        function add($data){
            $this->db->insert('denominations', $data);
            return $this->db->insert_id();
        }
		
		
		}
