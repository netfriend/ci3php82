<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->theme->display('welcome', array(
			'page_title' => 'Welcome',
			'heading'    => 'Welcome to CodeIgniter!',
			'message'    => 'This page is rendered by Smarty from the active theme (views/themes/' . $this->theme->get_theme() . ').',
		));
	}

	/**
	 * Switch active theme and redirect home.
	 * Example: /welcome/switch_theme/default
	 */
	public function switch_theme($slug = '')
	{
		if ($slug !== '' && $this->theme->set_theme($slug))
		{
			$this->session->set_flashdata('theme_switched', $slug);
		}

		redirect('/');
	}
}
