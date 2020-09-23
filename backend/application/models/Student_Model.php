<?php
	class Student_Model extends CI_Model{
		public function register($encrypt_password){

			$data = array('name' => $this->input->post('name'), 
						  'email' => $this->input->post('email'),
						  'password' => $encrypt_password,
						  'username' => $this->input->post('username'),
						  'zipcode' => $this->input->post('zipcode')
						  );

			return $this->db->insert('students', $data);
		}

		public function login($username){
			//Validate
			$this->db->where('username', $username);

			$result = $this->db->get('students');
			
			$row = $result->row();

			if (password_verify($this->input->post('password'), $row->password)){
				return $result->row(0);
			}else{
				return false;
			}
		}

		// Check Username exists
		public function check_username_exists($username){
			$query = $this->db->get_where('students', array('username' => $username));

			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}

		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('students', array('email' => $email));

			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}
	}