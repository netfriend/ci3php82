<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Smarty\Smarty;

/**
 * Theme-aware exceptions — HTML errors render via the active Smarty theme.
 */
class MY_Exceptions extends CI_Exceptions {

	/**
	 * @param	string	$page
	 * @param	bool	$log_error
	 * @return	void
	 */
	public function show_404($page = '', $log_error = TRUE)
	{
		if (is_cli())
		{
			parent::show_404($page, $log_error);
			return;
		}

		$heading = '404 Page Not Found';
		$message = 'The page you requested was not found.';

		if ($log_error)
		{
			log_message('error', $heading.': '.$page);
		}

		echo $this->show_error($heading, $message, 'error_404', 404);
		exit(4);
	}

	/**
	 * @param	string		$heading
	 * @param	string|string[]	$message
	 * @param	string		$template
	 * @param	int		$status_code
	 * @return	string
	 */
	public function show_error($heading, $message, $template = 'error_general', $status_code = 500)
	{
		if (is_cli())
		{
			return parent::show_error($heading, $message, $template, $status_code);
		}

		set_status_header($status_code);

		$html = $this->_render_themed($template, array(
			'page_title'  => is_string($heading) ? $heading : 'Error',
			'heading'     => is_string($heading) ? $heading : 'Error',
			'message'     => $this->_normalize_message($message),
			'status_code' => (int) $status_code,
			'show_debug'  => (ENVIRONMENT !== 'production'),
		));

		if ($html !== NULL)
		{
			return $html;
		}

		return parent::show_error($heading, $message, $template, $status_code);
	}

	/**
	 * @param	Throwable	$exception
	 * @return	void
	 */
	public function show_exception($exception)
	{
		if (is_cli())
		{
			parent::show_exception($exception);
			return;
		}

		$message = $exception->getMessage();
		if ($message === '')
		{
			$message = '(null)';
		}

		set_status_header(500);

		$html = $this->_render_themed('error_exception', array(
			'page_title'  => 'Exception',
			'heading'     => get_class($exception),
			'message'     => $message,
			'filename'    => $exception->getFile(),
			'line'        => $exception->getLine(),
			'status_code' => 500,
			'show_debug'  => (ENVIRONMENT !== 'production'),
		));

		if ($html !== NULL)
		{
			echo $html;
			return;
		}

		parent::show_exception($exception);
	}

	/**
	 * @param	int	$severity
	 * @param	string	$message
	 * @param	string	$filepath
	 * @param	int	$line
	 * @return	void
	 */
	public function show_php_error($severity, $message, $filepath, $line)
	{
		if (is_cli())
		{
			parent::show_php_error($severity, $message, $filepath, $line);
			return;
		}

		$severity_label = isset($this->levels[$severity]) ? $this->levels[$severity] : $severity;

		$filepath = str_replace('\\', '/', $filepath);
		if (strpos($filepath, '/') !== FALSE)
		{
			$x = explode('/', $filepath);
			$filepath = $x[count($x) - 2].'/'.end($x);
		}

		$html = $this->_render_themed('error_php', array(
			'page_title'  => 'PHP Error',
			'heading'     => 'A PHP Error was encountered',
			'severity'    => $severity_label,
			'message'     => $message,
			'filepath'    => $filepath,
			'line'        => $line,
			'status_code' => 500,
			'show_debug'  => (ENVIRONMENT !== 'production'),
		));

		if ($html !== NULL)
		{
			echo $html;
			return;
		}

		parent::show_php_error($severity, $message, $filepath, $line);
	}

	/**
	 * @param	string|string[]	$message
	 * @return	string
	 */
	protected function _normalize_message($message)
	{
		if (is_array($message))
		{
			$parts = array();
			foreach ($message as $line)
			{
				$parts[] = trim(strip_tags((string) $line));
			}
			return implode("\n", array_filter($parts, 'strlen'));
		}

		return trim(strip_tags((string) $message));
	}

	/**
	 * @param	string	$template	CI name: error_404, error_general, …
	 * @param	array	$data
	 * @return	string|null
	 */
	protected function _render_themed($template, array $data)
	{
		$map = array(
			'error_404'       => 'errors/404',
			'error_general'   => 'errors/general',
			'error_db'        => 'errors/db',
			'error_exception' => 'errors/exception',
			'error_php'       => 'errors/php',
		);

		$smarty_tpl = isset($map[$template]) ? $map[$template] : 'errors/general';

		try
		{
			// Prefer the live Theme library when CI is ready
			if (function_exists('get_instance'))
			{
				$CI = @get_instance();
				if ($CI && isset($CI->load))
				{
					if ( ! isset($CI->theme))
					{
						$CI->load->library('theme');
					}
					if (isset($CI->theme))
					{
						$tpl_file = $CI->theme->theme_path($CI->theme->get_theme())
							.str_replace('/', DIRECTORY_SEPARATOR, $smarty_tpl).'.tpl';
						if ( ! is_file($tpl_file) && $CI->theme->theme_exists('default'))
						{
							$CI->theme->set_theme('default', FALSE);
						}
						return $CI->theme->render($smarty_tpl, $data);
					}
				}
			}

			return $this->_render_smarty_standalone($smarty_tpl, $data);
		}
		catch (Throwable $e)
		{
			log_message('error', 'Themed error render failed: '.$e->getMessage());
			return NULL;
		}
	}

	/**
	 * Render with Smarty when Theme library / CI instance is unavailable.
	 *
	 * @param	string	$smarty_tpl	e.g. errors/404
	 * @param	array	$data
	 * @return	string|null
	 */
	protected function _render_smarty_standalone($smarty_tpl, array $data)
	{
		$autoload = FCPATH.'vendor/autoload.php';
		if (is_file($autoload))
		{
			require_once $autoload;
		}

		if ( ! class_exists(Smarty::class))
		{
			return NULL;
		}

		if (is_file(APPPATH.'config/themes.php'))
		{
			include APPPATH.'config/themes.php';
		}

		$slug = isset($config['theme_active']) ? $config['theme_active'] : 'default';
		$session_key = isset($config['theme_session_key']) ? $config['theme_session_key'] : 'active_theme';

		if (session_status() === PHP_SESSION_NONE)
		{
			@session_start();
		}
		if ( ! empty($_SESSION[$session_key]))
		{
			$candidate = preg_replace('/[^a-z0-9\-_]/', '', strtolower((string) $_SESSION[$session_key]));
			if ($candidate !== '' && is_dir(APPPATH.'views/themes/'.$candidate))
			{
				$slug = $candidate;
			}
		}

		// CI file sessions store userdata differently — try ci_session flash/userdata via Theme config default only
		// Also peek CodeIgniter session array shape if present
		if ( ! empty($_SESSION['__ci_vars']) && isset($_SESSION[$session_key]))
		{
			// already handled above
		}

		$theme_root = APPPATH.'views/themes/'.$slug.DIRECTORY_SEPARATOR;
		$tpl_path = $theme_root.str_replace('/', DIRECTORY_SEPARATOR, $smarty_tpl).'.tpl';
		if ( ! is_file($tpl_path))
		{
			$slug = 'default';
			$theme_root = APPPATH.'views/themes/default'.DIRECTORY_SEPARATOR;
			$tpl_path = $theme_root.str_replace('/', DIRECTORY_SEPARATOR, $smarty_tpl).'.tpl';
			if ( ! is_file($tpl_path))
			{
				return NULL;
			}
		}

		$compile = isset($config['smarty_compile_dir']) ? $config['smarty_compile_dir'] : APPPATH.'cache/smarty/compile/';
		$cache   = isset($config['smarty_cache_dir']) ? $config['smarty_cache_dir'] : APPPATH.'cache/smarty/cache/';
		foreach (array($compile, $cache) as $dir)
		{
			if ( ! is_dir($dir))
			{
				@mkdir($dir, 0755, TRUE);
			}
		}

		$base_url = config_item('base_url');
		if ( ! $base_url)
		{
			$base_url = '/';
		}

		$smarty = new Smarty();
		$smarty->setTemplateDir($theme_root);
		$smarty->setCompileDir($compile);
		$smarty->setCacheDir($cache);
		$smarty->setEscapeHtml(TRUE);
		$smarty->setForceCompile(ENVIRONMENT === 'development');

		$assign = array_merge(array(
			'base_url'         => $base_url,
			'site_url'         => rtrim($base_url, '/').'/index.php',
			'theme_slug'       => $slug,
			'theme_assets_url' => rtrim($base_url, '/').'/index.php/theme_assets/'.$slug.'/',
			'ci_version'       => defined('CI_VERSION') ? CI_VERSION : '',
			'app_themes'       => $this->_list_themes_standalone($slug),
		), $data);

		foreach ($assign as $key => $value)
		{
			$smarty->assign($key, $value);
		}

		return $smarty->fetch($smarty_tpl.'.tpl');
	}

	/**
	 * @param	string	$active
	 * @return	array
	 */
	protected function _list_themes_standalone($active)
	{
		$root = APPPATH.'views/themes/';
		$out = array();
		if ( ! is_dir($root))
		{
			return $out;
		}

		foreach (scandir($root) as $entry)
		{
			if ($entry === '.' OR $entry === '..' OR ! is_dir($root.$entry))
			{
				continue;
			}
			$name = $entry;
			$json = $root.$entry.'/theme.json';
			if (is_file($json))
			{
				$meta = json_decode(file_get_contents($json), TRUE);
				if (is_array($meta) && ! empty($meta['name']))
				{
					$name = $meta['name'];
				}
			}
			$out[] = array(
				'slug'   => $entry,
				'name'   => $name,
				'active' => ($entry === $active),
			);
		}

		return $out;
	}
}
