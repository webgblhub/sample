<?php
	class Cultural_speciality_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}



		public function lists()
		{

                $this->db->order_by('cultural_speciality.cultural_speciality', 'ASC');
                
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('cultural_speciality');
				return $query->result_array(); 

        }
        public function enable($id,$table){
			$data = array(
				'status' => 0
			    );
			$this->db->where('cultural_speciality_id', $id);
			return $this->db->update($table, $data);
		}
		public function desable($id,$table){
			$data = array(
				'status' => 1
			    );
			$this->db->where('cultural_speciality_id', $id);
			return $this->db->update($table, $data);
        }
        function get($id){
            $this->db->where('cultural_speciality_id',$id);
            $query = $this->db->get('cultural_speciality');
            return $query->row_array();
        }
		function update($data,$id){
            $this->db->where('cultural_speciality_id',$id);
            return $this->db->update('cultural_speciality', $data);



        }
        function delete($id,$table)
		{
			$this->db->where('cultural_speciality_id', $id);
  
			$this->db->delete($table);
			return true;
        }
        function add($data){
            $this->db->insert('cultural_speciality', $data);
            return $this->db->insert_id();
        }
		
		
		}
