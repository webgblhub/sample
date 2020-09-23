<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'client/profile_model',
			'client/event_model'
		));
		
		if ($this->session->userdata('customer_logged') == false 
		) 
		redirect('client/customer/login'); 

	}


public function customerDetails()
	{
		$email=$this->session->userdata('customer_email');
		$result=$this->profile_model->select_customer_details($email);
		return $result;
	}

	public function index()
	{
		$data['title']="Customer - All Events";
		$data['customer']=$this->customerDetails();
		$data['event']=$this->event_model->selectallEvent($data['customer'][0]->customer_id);
		//print_r($data['event']);die;
		$this->load->view('client/theme/header', $data);
	    $this->load->view('client/listofevent', $data);
	    $this->load->view('client/theme/footer');
	}


public function event()
	{
		$data['title']="Customer - New Event";
		$data['customer']=$this->customerDetails();
		$data['event_type']=$this->event_model->selectallEventtype();
		$data['customer_type']=$this->event_model->selectCreatedevent($data['customer'][0]->customer_id);
		
		$this->load->view('client/theme/header', $data);
	    $this->load->view('client/addevent', $data);
	    $this->load->view('client/theme/footer');
	}

	public function add_event()
	{ 
// 		$address=$this->input->post('venue');
// 		echo $address;
// 		$url = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".urlencode($address)."&sensor=false&key=AIzaSyDPD7Dl_cbogA9N0fhpyfxhTW9m44Yrci8");
// 		$response = json_decode($url);
		   
// 		if ($response->status == 'OK')
// 		 {
// 		    $latitude = $response->results[0]->geometry->location->lat;
// 		    $longitude = $response->results[0]->geometry->location->lng;
		
// 		echo $latitude. " <br/>" . $longitude;  die;echo 'Latitude: ' . $latitude;
//     echo '<br />';
//     echo 'Longitude: ' . $longitude;
// } else {
//     echo $response->status;
// }
		$latitude="-33.8761111";
		$longitude="151.2130556";
		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s");
		$data=array(

					'customer_id'		=> 	$this->input->post('id'),
					'event_name'		=> 	$this->input->post('event_name'),
					'celebrant'			=>	$this->input->post('celebrant'),
					'event_date'		=>	$this->input->post('edate'),
					'earliest_date'		=>	$this->input->post('earliest_date'),
					'latest_date'		=>	$this->input->post('latest_date'),
					'event_type'		=>	$this->input->post('event_type'),
					'duration'			=>	$this->input->post('event_duration'),
					'guests'			=>	$this->input->post('guest'),
					'venue'				=>	$this->input->post('venue'),
					'city'				=>	$this->input->post('city'),
					'zipcode'			=>	$this->input->post('zipcode'),
					'latitude'			=>	$latitude,
					'longitude'			=>	$longitude,
					'location'			=>	$this->input->post('location'),
					'comments'			=>	$this->input->post('comment'),
					'created_on'		=>$date,

					);

		$result=$this->event_model->saveEventDetails($data);
		if($result=="TRUE")
		{
			$this->session->set_flashdata('err','Sucessfully Save.');
			redirect('client/event/index', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('err','Please try one more time.');
			redirect('client/event/event', 'refresh');

		}	

	}

	public function viewEventDetails($eid)
	{
		$data['title']="Customer - Event Details";
		$data['customer']=$this->customerDetails();
		$data['event_type']=$this->event_model->selectallEventtype();
		$data['event']=$this->event_model->selectEventbyId($eid);
		//print_r($data['event']);die;
		$this->load->view('client/theme/header', $data);
	    $this->load->view('client/editfevent', $data);
	    $this->load->view('client/theme/footer');
	}

	public function edit_event($eid)
	{

		$latitude="-33.8761111";
		$longitude="151.2130556";
		$data=array(

					'event_id'			=>	$eid,
					'event_name'		=> 	$this->input->post('event_name'),
					'celebrant'			=>	$this->input->post('celebrant'),
					'event_date'		=>	$this->input->post('edate'),
					'earliest_date'		=>	$this->input->post('earliest_date'),
					'latest_date'		=>	$this->input->post('latest_date'),
					'event_type'		=>	$this->input->post('event_type'),
					'duration'			=>	$this->input->post('event_duration'),
					'guests'			=>	$this->input->post('guest'),
					'venue'				=>	$this->input->post('venue'),
					'city'				=>	$this->input->post('city'),
					'zipcode'			=>	$this->input->post('zipcode'),
					'latitude'			=>	$latitude,
					'longitude'			=>	$longitude,
					'location'			=>	$this->input->post('location'),
					'comments'			=>	$this->input->post('comment'),
					

					);

		$result=$this->event_model->updateEventDetails($data);
		if($result=="TRUE")
		{
			$this->session->set_flashdata('err','Sucessfully Update.');
			redirect('client/event/index', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('err','Please try one more time.');
			redirect('client/event/event', 'refresh');

		}	

	}
	public function deleteEvent($t=null)
	{
		$result=$this->event_model->deleteEventDetails($t);
		if($result=="TRUE")
		{
			$this->session->set_flashdata('err','Sucessfully Delete.');
			redirect('client/event/index', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('err','Please try one more time.');
			redirect('client/event/event', 'refresh');

		}	
	}



}