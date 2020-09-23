<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| HybridAuth settings
| -------------------------------------------------------------------------
| Your HybridAuth config can be specified below.
|
| See: https://hybridauth.github.io/developer-ref-user-authentication.html
|
*/
$config['hybridauth'] = array(

	'callback' => site_url(), // skip validation

	'providers' => array(

		'Twitter' => array(
			'callback' => site_url('hauth/window/twitter'),
			'enabled' => false,
			'keys' => array(
				'key' => '...',
				'secret' => '...'
			),
			'include_email' => TRUE,
		),

		'Google'   => ['enabled' => true, 'keys' => ['id'  => '875138157548-vq8gqrsd55domf427jrr22q4ee15htnd.apps.googleusercontent.com', 'secret' => '6PausloaM0bLDn2YcPiJwEdd']],
		'Facebook' => ['enabled' => true, 'keys' => ['id'  => '2736077883304664', 'secret' => 'e8935679bb3e325ba8f54d12e627a491']],
	),

	/**
     * Optional: Debug Mode
     *
     * The debug mode is set to false by default, however you can rise its level to either 'info', 'debug' or 'error'.
     *
     * debug_mode: false|info|debug|error
     * debug_file: Path to file writeable by the web server. Required if only 'debug_mode' is not false.
     */
	'debug_mode' => ENVIRONMENT === 'development',
	'debug_file' => APPPATH . 'logs/hybridauth.log',
);
