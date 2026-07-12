<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Sample HMVC module controller (Wiredesignz MX).
 * Renders through the active Smarty theme.
 *
 * URL: /demo or /demo/index
 */
class Demo extends MX_Controller {

	public function index()
	{
		$this->theme->display('demo/index', array(
			'page_title' => 'HMVC Demo',
			'heading'    => 'Module: demo',
			'message'    => 'Hello from HMVC module demo (MX_Controller + Smarty).',
			'module'     => 'demo',
			'php'        => PHP_VERSION,
		));
	}

	/**
	 * Widget for Modules::run('demo/widget') — also uses active theme.
	 */
	public function widget()
	{
		echo $this->theme->render('demo/widget', array(
			'module' => 'demo',
			'php'    => PHP_VERSION,
		));
	}
}
