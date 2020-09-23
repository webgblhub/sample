<?php
	class Badge_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}



		public function lists()
		{
            $query = $this->db->get('site_config');
            return $query->result_array(); 

        }



        function update_data($editdata, $record_id){
            $this->db->where('id', $record_id);
            $this->db->update('site_config', $editdata);
        }
        
		
		
		}
