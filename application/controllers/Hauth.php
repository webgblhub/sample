<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Hauth Controller Class
 */
class Hauth extends CI_Controller
{

	/**
	 * {@inheritdoc}
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('hybridauth');
	}

	/**
	 * {@inheritdoc}
	 */
	public function index()
	{
		// Build a list of enabled providers.
		$providers = array();
		foreach ($this->hybridauth->HA->getProviders() as $name) {
			$uri = 'hauth/window/' . strtolower($name);
			$providers[] = anchor($uri, $name);
		}

		$this->load->view('hauth/login_widget', array(
			'providers' => $providers,
		));
	}

	/**
	 * Try to authenticate the user with a given provider
	 *
	 * @param string $provider Define provider to login
	 */
	public function window($provider)
	{
		try {
			$adapter = $this->hybridauth->HA->authenticate($provider);
			$profile = $adapter->getUserProfile();

			$this->load->view('hauth/done', array(
				'profile' => $profile,
			));
			$email = $profile->email;
			//$random = 12345678;
			//$password = password_hash($random,PASSWORD_DEFAULT);
			//print_r($email);
			$this->load->model('Social_model');
			$this->load->model('auth_model');

			$email_exists = $this->Social_model->check_email($email);
			$data = array(
				'email' => $profile->email,
				//'password' => $this->input->post('password')
			 );
			if($email_exists){
				//redirect('supplier/create/', 'refresh');
				
	
				$is_login = $this->Social_model->admin_login($data);
				redirect('supplier/create/', 'refresh');

			}else{
				$user_data = array(
				'username' =>$profile->firstName,
	    		'email' => $profile->email,
				
				);
				$is_reg = $this->Social_model->register($data);
				$is_login = $this->Social_model->admin_login($data);
				redirect('supplier/create/', 'refresh');

			}
		} catch (Exception $e) {
			show_error($e->getMessage());
		}
	}
}
