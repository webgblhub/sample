<?php
	class Language_Spoken_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}



		public function lists()
		{

                $this->db->order_by('language_spoken.language_spoken', 'ASC');
                //$this->db->where('status <>', 2); 
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('language_spoken');
				return $query->result_array(); 

        }
        public function enable($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('language_spoken_id', $id);
			return $this->db->update($table, $data);
		}
		public function desable($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('language_spoken_id', $id);
			return $this->db->update($table, $data);
        }
        function get($id){
            $this->db->where('language_spoken_id',$id);
            $query = $this->db->get('language_spoken');
            return $query->row_array();
        }
		function update($data,$id){
            $this->db->where('language_spoken_id',$id);
            return $this->db->update('language_spoken', $data);



        }
        function delete($id,$table)
		{
            $this->db->where('language_spoken_id', $id);
  
			$this->db->delete($table);
			return true;
	
        }
        function add($data){
            $this->db->insert('language_spoken', $data);
            return $this->db->insert_id();
        }
		
		
		}
