<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Serves static files from application/views/themes/{slug}/assets/
 *
 * URL: /theme_assets/{slug}/css/style.css
 */
class Theme_assets extends CI_Controller {

	/** @var string[] */
	protected $allowed_ext = array(
		'css', 'js', 'map', 'png', 'jpg', 'jpeg', 'gif', 'webp', 'svg', 'ico',
		'woff', 'woff2', 'ttf', 'eot', 'otf', 'txt', 'json'
	);

	public function _remap($slug, $segments = array())
	{
		$slug = preg_replace('/[^a-z0-9\-_]/', '', strtolower((string) $slug));
		$rel  = implode('/', array_map(function ($s) {
			return str_replace(array('..', '\\', "\0"), '', (string) $s);
		}, $segments));
		$rel = ltrim(str_replace('\\', '/', $rel), '/');

		if ($slug === '' OR $rel === '' OR strpos($rel, '..') !== FALSE)
		{
			show_404();
			return;
		}

		$ext = strtolower(pathinfo($rel, PATHINFO_EXTENSION));
		if ( ! in_array($ext, $this->allowed_ext, TRUE))
		{
			show_404();
			return;
		}

		$base = realpath(APPPATH . 'views/themes/' . $slug . '/assets');
		$file = $base ? realpath($base . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $rel)) : FALSE;

		if ($base === FALSE OR $file === FALSE OR strpos($file, $base) !== 0 OR ! is_file($file))
		{
			show_404();
			return;
		}

		$mimes = array(
			'css'  => 'text/css; charset=UTF-8',
			'js'   => 'application/javascript; charset=UTF-8',
			'map'  => 'application/json',
			'png'  => 'image/png',
			'jpg'  => 'image/jpeg',
			'jpeg' => 'image/jpeg',
			'gif'  => 'image/gif',
			'webp' => 'image/webp',
			'svg'  => 'image/svg+xml',
			'ico'  => 'image/x-icon',
			'woff' => 'font/woff',
			'woff2'=> 'font/woff2',
			'ttf'  => 'font/ttf',
			'eot'  => 'application/vnd.ms-fontobject',
			'otf'  => 'font/otf',
			'txt'  => 'text/plain; charset=UTF-8',
			'json' => 'application/json',
		);

		$this->output
			->set_content_type(isset($mimes[$ext]) ? $mimes[$ext] : 'application/octet-stream')
			->set_header('Cache-Control: public, max-age=86400')
			->set_output(file_get_contents($file));
	}
}
