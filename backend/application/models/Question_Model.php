<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Question_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}

		public function selectCategory()
		{   
			$this->db->select('*');
			$this->db->from('supplier_category');
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;

		}

		public function listsofQuestion()
		{
			$this->db->select('*');
			$this->db->from('category_questions');
			$this->db->join('supplier_category','supplier_category.cat_id=category_questions.cat_id');
			$this->db->where('status','Active');
			$this->db->where('display','0');
			$this->db->order_by('category_questions.id','DESC');
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function listsofQuestionbyCategory($s)
		{
			$this->db->select('*');
			$this->db->from('category_questions');
			$this->db->join('supplier_category','supplier_category.cat_id=category_questions.cat_id');
			$this->db->where('status','Active');
			$this->db->where('display','0');
			$this->db->where('category_questions.cat_id',$s);
			$this->db->order_by('category_questions.id','DESC');
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function addQuestion($data)
		{
			$this->db->insert('category_questions',$data);
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}

		public function selectQuestionbtId($id)
		{
			$this->db->select('*');
			$this->db->from('category_questions');
			$this->db->join('supplier_category','supplier_category.cat_id=category_questions.cat_id');
			$this->db->where('id',$id);
			$query = $this->db->get();
	  		$row= $query->result();
	  		return $row;
		}

		public function updateQuestion($data)
		{
			$this->db->where('id',$data['id']);
			$this->db->update('category_questions',$data);
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}

		public function deleteQuestionbtId($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('category_questions');
			$result = $this->db->affected_rows();
		    	if($result)
			        {
						return TRUE;
			        }
			        return FALSE;
		}


	}