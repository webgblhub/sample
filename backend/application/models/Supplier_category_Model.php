<?php
	class Supplier_category_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}



		public function lists()
		{

                $this->db->order_by('supplier_category.category', 'ASC');
                $this->db->where('display <>', 2); 
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('supplier_category');
				return $query->result_array(); 

        }
        public function enable($id,$table){
			$data = array(
				'display' => 1
			    );
			$this->db->where('cat_id', $id);
			return $this->db->update($table, $data);
		}
		public function desable($id,$table){
			$data = array(
				'display' => 0
			    );
			$this->db->where('cat_id', $id);
			return $this->db->update($table, $data);
        }
        function get($cat_id){
            $this->db->where('cat_id',$cat_id);
            $query = $this->db->get('supplier_category');
            return $query->row_array();
        }
		function update($data,$cat_id){
            $this->db->where('cat_id',$cat_id);
            return $this->db->update('supplier_category', $data);



        }
        function delete($data,$cat_id)
		{
            $this->db->where('cat_id', $cat_id);
            return $this->db->update('supplier_category', $data);
	
        }
        function add($data){
            $this->db->insert('supplier_category', $data);
            return $this->db->insert_id();
        }
		
		
		}
