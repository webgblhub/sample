<?php
	class Calendar_Model extends CI_Model
	{
		public function __construct()
		{
            $this->load->database();
		}
       
        public function getEvents(){
            $query = $this->db->where("supplier_id",$this->session->userdata('supplier_id'))
            //->select("storefront_business.*,supplier_category.*")
			->where('switchid',$this->input->get('switch'))
            ->from("supplier_availability")
            //->join("supplier_category","supplier_category.cat_id=storefront_business.category_id","left")
            ->get();

            return $query;

        }
		
        public function addEvent(){
		
			$this->db->select('*');
			$this->db->from('supplier_availability');
			//$this->db->join('supplier_category','cat_id=category_id');
			$this->db->where('start <=',$this->input->post('start'));
			//$this->db->or_where('end <=',$this->input->post('start'));
			//$this->db->where('start <=',date('Y-m-d H:i:s',strtotime($this->input->post('start'))));
			$this->db->where('end >=',$this->input->post('end'));
			//$this->db->or_where('end <=',$this->input->post('end'));
			//$this->db->where('end <=',date('Y-m-d H:i:s',strtotime($this->input->post('end'))));
			$this->db->where('supplier_id',$this->session->userdata('supplier_id'));
			
			$this->db->where('switchid',$this->input->get('switch'));
			
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
	  		//$row= $query->result();
			
			if($query->num_rows()==0)
			{
		
			$data = array('start' => date('Y-m-d H:i:s',strtotime($this->input->post('start'))), 
							'end' => date('Y-m-d H:i:s',strtotime($this->input->post('end'))),
							'title' => $this->input->post('title'),
							'location' => $this->input->post('location'),
							'description' => $this->input->post('description'),
							'supplier_id' => $this->session->userdata('supplier_id'),
							'switchid' => $this->input->get('switch')
						  );
			$this->db->insert('supplier_availability', $data);
			
			//$capi = new GoogleCalendarApi();
//
//			// Get user calendar timezone
//			$user_timezone = $capi->GetUserCalendarTimezone($this->session->userdata('access_token'));
//			$event['event_time']['event_date']=date('Y-m-d',strtotime($this->input->post('start')));
//			$event['all_day']=1;
//			// Create event on primary calendar
//			$event_id = $capi->CreateCalendarEvent('primary', $this->input->post('title'), $event['all_day'], $event['event_time'], $user_timezone, $this->session->userdata('access_token'));
			
			echo "Event Added Successfully";
			}
			else
			{
			echo "Event already exist in this date for this user";
			}
        }
		
		public function delete_event($id)
		 {
		  $this->db->where('id', $id);
		  $this->db->delete('supplier_availability');
		 }

		
		}
