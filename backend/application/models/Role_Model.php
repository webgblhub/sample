<?php
	class Role_Model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
        public function create()
		{

			$data = array(
				'title' => $this->input->post('title'), 
			    'status' => $this->input->post('status')
			    );
			return $this->db->insert('roles', $data);
		}

		public function lists($id = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($id === FALSE){
				$this->db->order_by('roles.id', 'ASC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('roles');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('roles', array('id' => $id));
			return $query->row_array();
		}
		
		public function actlists($id = FALSE, $limit = FALSE, $offset = FALSE)
		{
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($id === FALSE){
				//$this->db->order_by('roles.title', 'ASC');
				$this->db->order_by('id', 'ASC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$this->db->where('status',1);
				$query = $this->db->get('roles');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('roles', array('id' => $id));
			return $query->row_array();
		}

		public function update(){
			//$slug = url_title($this->input->post('title'), "dash", TRUE);
			$data = array(
				'title' => $this->input->post('title'), 
			    'status' => $this->input->post('status')
			    );
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('roles', $data);
		}
		
		public function get($id = FALSE, $limit = FALSE, $offset = FALSE)
		{
		
			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($id === FALSE){
				$this->db->order_by('roles.title', 'ASC');
				//$this->db->join('categories as cat', 'cat.id = posts.category_id'); 
				$query = $this->db->get('roles');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('roles', array('id' => $id));
			return $query->row_array();
		}
		
		}
