<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Calendar extends CI_Controller
	{
		
	 	public function __construct()
		{
			parent::__construct();
			
			if(!$this->session->userdata('supplier_id')) {
				redirect('supplier');
			}
			$this->load->model('Supplier_Model');
			$this->load->model('Calendar_Model');
			
			require APPPATH."third_party/google-calendar-api.php";
			
			define('CLIENT_ID', '114849958186-gjglda726th5qq8memgr5o34v0me636c.apps.googleusercontent.com');

			/* Google App Client Secret */
			define('CLIENT_SECRET', 'ZVGpbAKZ0xPcufiECtxk7VTO');
			
			/* Google App Redirect Url */
			define('CLIENT_REDIRECT_URL', 'http://eventsdragon.com/supplier/calendar/index/');
			
		}
		
		public function index()
		{
			if($this->input->get('code')!="") {
				try {
					$capi = new GoogleCalendarApi();
					
					// Get the access token 
					$data = $capi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $this->input->get('code'));
					
					// Save the access token as a session variable
					//$_SESSION['access_token'] = $data['access_token'];
					$this->session->set_userdata('access_token', $data['access_token']);
			
					// Redirect to the page where user can create event
					$redirect = 'http://eventsdragon.com/supplier/calendar/lists';
					redirect(filter_var($redirect, FILTER_SANITIZE_URL) .'/'.base64_encode($this->session->userdata('storeid')));
					exit();
				}
				catch(Exception $e) {
					echo $e->getMessage();
					exit();
				}
			}
		}
		
		public function lists($offset = null)
		{
			
			$data['title'] = 'List of Events';
			$data['events'] = $this->Calendar_Model->getEvents();

			//$this->load->view('admin/theme/header',$data);
			//$this->load->view('admin/calendar',$data );
			//$this->load->view('admin/theme/footer');;
			
				$this->load->view('admin/includes/header', $data);
				$this->load->view('admin/includes/mainmenu', $data);
				$this->load->view('admin/calendar' , $data);
				$this->load->view('admin/includes/footer', $data);

        }
		
		public function load()
		{
			$event_data = $this->Calendar_Model->getEvents();
			//print_r($event_data);exit;
			  foreach($event_data->result_array() as $row)
			  {
			   $data[] = array(
				'id' => $row['id'],
				'supplier_id' => $row['supplier_id'],
				'title' => $row['title'],
				'location' => $row['location'],
				'description' => $row['description'],
				'start' => $row['start'],
				'end' => $row['end']
			   );
			  }
			  echo json_encode($data);
		}
		
		public function addEvent()
		{
			
			$data['title'] = 'Add Event';
						$data['events'] = $this->Calendar_Model->addEvent();
			if(!$this->session->userdata('access_token')) {
			$this->session->set_userdata('storeid', $this->input->get('switch'));
			$login_url = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';
			//redirect($login_url);
			echo "<script>window.open('".$login_url."','')</script>";
			
			}
			
			//$this->load->view('admin/theme/header',$data);
			//$this->load->view('admin/calendar',$data );
			//$this->load->view('admin/theme/footer');;
			//redirect('supplier/calendar/lists');
        }
		
		public function delete()
		 {
		  if($this->input->post('id'))
		  {
		   $this->Calendar_Model->delete_event($this->input->post('id'));
		   echo "1";
		  }
		 }
      
      
		}
