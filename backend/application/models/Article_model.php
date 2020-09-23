<?php
	class Article_model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}



		public function lists()
		{
			$this->db->order_by('questionnaire_articles.id', 'DESC');

			$query = $this->db->select("questionnaire_articles.*,supplier_category.*")
            ->from("questionnaire_articles")
            ->join("supplier_category","supplier_category.cat_id=questionnaire_articles.cat_id","left")
                              ->get();

            return $query->result_array();
                // $this->db->order_by('event_dragon_cultural_speciality.cultural_speciality', 'ASC');
                // $this->db->where('status <>', 2); 
				// //$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				// $query = $this->db->get('event_dragon_cultural_speciality');
				// return $query->result_array(); 

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
            $this->db->where('id',$id);
            $query = $this->db->get('questionnaire_articles');
            return $query->row_array();
        }
		function update($data,$id){
            $this->db->where('id',$id);
            return $this->db->update('questionnaire_articles', $data);



        }
        function delete($id,$table)
		{
			$this->db->where('id', $id);
			$this->db->delete($table);
			return true;
	
        }
        function add($data){
            $this->db->insert('questionnaire_articles', $data);
            return $this->db->insert_id();
		}
		function get_category(){
			$query = $this->db->get('supplier_category');
            return $query->result();

		}
		
		
		}
