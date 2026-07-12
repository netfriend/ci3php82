<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Smarty\Smarty;

/**
 * Theme library — Smarty rendering + theme switching.
 *
 * Templates live in: application/views/themes/{slug}/
 *
 * Usage:
 *   $this->theme->assign('title', 'Home');
 *   $this->theme->display('welcome');
 *   $this->theme->set_theme('dark');
 */
class Theme {

	/** @var CI_Controller */
	protected $CI;

	/** @var Smarty */
	protected $smarty;

	/** @var string */
	protected $active_theme;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->config->load('themes', FALSE, TRUE);

		$this->_ensure_dirs();
		$this->active_theme = $this->_resolve_active_theme();
		$this->_init_smarty();
		$this->_assign_globals();
	}

	/**
	 * @param	string	$template	e.g. 'welcome' or 'pages/about'
	 * @param	array	$data
	 * @return	void
	 */
	public function display($template, array $data = array())
	{
		if ( ! empty($data))
		{
			$this->assign($data);
		}

		$this->smarty->display($this->_template_file($template));
	}

	/**
	 * @param	string	$template
	 * @param	array	$data
	 * @return	string
	 */
	public function render($template, array $data = array())
	{
		if ( ! empty($data))
		{
			$this->assign($data);
		}

		return $this->smarty->fetch($this->_template_file($template));
	}

	/**
	 * @param	string|array	$key
	 * @param	mixed		$value
	 * @return	Theme
	 */
	public function assign($key, $value = NULL)
	{
		if (is_array($key))
		{
			foreach ($key as $k => $v)
			{
				$this->smarty->assign($k, $v);
			}
		}
		else
		{
			$this->smarty->assign($key, $value);
		}

		return $this;
	}

	/**
	 * @param	string	$slug
	 * @param	bool	$persist	Save to session when theme_session_key is set
	 * @return	bool
	 */
	public function set_theme($slug, $persist = TRUE)
	{
		$slug = $this->_sanitize_slug($slug);
		if ( ! $this->theme_exists($slug))
		{
			return FALSE;
		}

		$this->active_theme = $slug;
		$this->smarty->setTemplateDir($this->theme_path($slug));

		$session_key = $this->CI->config->item('theme_session_key');
		if ($persist && $session_key)
		{
			$this->CI->session->set_userdata($session_key, $slug);
		}

		$this->_assign_globals();
		return TRUE;
	}

	/**
	 * @return	string
	 */
	public function get_theme()
	{
		return $this->active_theme;
	}

	/**
	 * @param	string|null	$slug
	 * @return	string
	 */
	public function theme_path($slug = NULL)
	{
		$root = rtrim($this->CI->config->item('theme_path'), '/\\') . DIRECTORY_SEPARATOR;
		if ($slug === NULL)
		{
			return $root;
		}

		return $root . $this->_sanitize_slug($slug) . DIRECTORY_SEPARATOR;
	}

	/**
	 * @param	string	$slug
	 * @return	bool
	 */
	public function theme_exists($slug)
	{
		return is_dir($this->theme_path($slug));
	}

	/**
	 * @return	array
	 */
	public function list_themes()
	{
		$root = $this->theme_path();
		$themes = array();

		if ( ! is_dir($root))
		{
			return $themes;
		}

		foreach (scandir($root) as $entry)
		{
			if ($entry === '.' OR $entry === '..' OR ! is_dir($root . $entry))
			{
				continue;
			}

			$meta = array(
				'slug'        => $entry,
				'name'        => $entry,
				'description' => '',
				'version'     => '',
				'active'      => ($entry === $this->active_theme),
			);

			$json = $root . $entry . DIRECTORY_SEPARATOR . 'theme.json';
			if (is_file($json))
			{
				$data = json_decode(file_get_contents($json), TRUE);
				if (is_array($data))
				{
					foreach (array('name', 'description', 'version', 'author') as $field)
					{
						if (isset($data[$field]))
						{
							$meta[$field] = $data[$field];
						}
					}
					$meta['slug'] = $entry;
					$meta['active'] = ($entry === $this->active_theme);
				}
			}

			$themes[] = $meta;
		}

		return $themes;
	}

	/**
	 * URL to a file in themes/{slug}/assets/
	 *
	 * @param	string		$path
	 * @param	string|null	$slug
	 * @return	string
	 */
	public function asset($path, $slug = NULL)
	{
		$slug = $this->_sanitize_slug($slug ?: $this->active_theme);
		$path = ltrim(str_replace('\\', '/', $path), '/');
		return site_url('theme_assets/' . rawurlencode($slug) . '/' . $path);
	}

	/**
	 * @return	Smarty
	 */
	public function smarty()
	{
		return $this->smarty;
	}

	// ------------------------------------------------------------------

	protected function _cfg($key, $default = NULL)
	{
		$val = $this->CI->config->item($key);
		return ($val === NULL) ? $default : $val;
	}

	protected function _init_smarty()
	{
		$this->smarty = new Smarty();
		$this->smarty->setTemplateDir($this->theme_path($this->active_theme));
		$this->smarty->setCompileDir($this->_cfg('smarty_compile_dir'));
		$this->smarty->setCacheDir($this->_cfg('smarty_cache_dir'));
		$this->smarty->setCaching($this->_cfg('smarty_caching') ? Smarty::CACHING_LIFETIME_CURRENT : Smarty::CACHING_OFF);
		$this->smarty->setForceCompile((bool) $this->_cfg('smarty_force_compile'));
		$this->smarty->setDebugging((bool) $this->_cfg('smarty_debugging'));
		$this->smarty->setEscapeHtml(TRUE);
	}

	protected function _assign_globals()
	{
		$this->smarty->assign(array(
			'base_url'         => base_url(),
			'site_url'         => site_url(),
			'theme_slug'       => $this->active_theme,
			'theme_assets_url' => site_url('theme_assets/' . $this->active_theme) . '/',
			'ci_version'       => CI_VERSION,
			'app_themes'       => $this->list_themes(),
		));
	}

	protected function _resolve_active_theme()
	{
		$default = $this->_sanitize_slug($this->_cfg('theme_active', 'default'));
		$session_key = $this->_cfg('theme_session_key');

		if ($session_key && isset($this->CI->session))
		{
			$from_session = $this->CI->session->userdata($session_key);
			if ($from_session && $this->theme_exists($from_session))
			{
				return $this->_sanitize_slug($from_session);
			}
		}

		if ( ! $this->theme_exists($default))
		{
			$root = $this->theme_path();
			if (is_dir($root))
			{
				foreach (scandir($root) as $entry)
				{
					if ($entry !== '.' && $entry !== '..' && is_dir($root . $entry))
					{
						return $entry;
					}
				}
			}
		}

		return $default;
	}

	protected function _template_file($template)
	{
		$ext = $this->_cfg('theme_extension', 'tpl');
		$template = str_replace('\\', '/', $template);
		$template = preg_replace('/\.' . preg_quote($ext, '/') . '$/', '', $template);
		return $template . '.' . $ext;
	}

	protected function _sanitize_slug($slug)
	{
		$slug = strtolower((string) $slug);
		$slug = preg_replace('/[^a-z0-9\-_]/', '', $slug);
		return $slug !== '' ? $slug : 'default';
	}

	protected function _ensure_dirs()
	{
		foreach (array('smarty_compile_dir', 'smarty_cache_dir', 'theme_path') as $key)
		{
			$dir = $this->_cfg($key);
			if ($dir && ! is_dir($dir))
			{
				@mkdir($dir, 0755, TRUE);
			}
		}
	}
}
