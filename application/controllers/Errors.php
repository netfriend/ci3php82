<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application error pages (used by routes 404_override).
 */
class Errors extends CI_Controller {

	public function not_found()
	{
		$this->output->set_status_header(404);
		$this->theme->display('errors/404', array(
			'page_title'  => '404 Page Not Found',
			'heading'     => '404 Page Not Found',
			'message'     => 'The page you requested was not found.',
			'status_code' => 404,
		));
	}
}
