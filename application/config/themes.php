<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Active theme (slug)
|--------------------------------------------------------------------------
| Folder name under application/views/themes/{slug}
| Can be overridden at runtime via $this->theme->set_theme('slug')
| or session key below (e.g. after theme switcher UI).
*/
$config['theme_active'] = 'default';

/*
|--------------------------------------------------------------------------
| Session key for theme override
|--------------------------------------------------------------------------
| Set to FALSE to disable session-based theme switching.
*/
$config['theme_session_key'] = 'active_theme';

/*
|--------------------------------------------------------------------------
| Theme templates root
|--------------------------------------------------------------------------
*/
$config['theme_path'] = APPPATH . 'views/themes/';

/*
|--------------------------------------------------------------------------
| Smarty compile / cache directories
|--------------------------------------------------------------------------
*/
$config['smarty_compile_dir'] = APPPATH . 'cache/smarty/compile/';
$config['smarty_cache_dir']   = APPPATH . 'cache/smarty/cache/';

/*
|--------------------------------------------------------------------------
| Smarty options
|--------------------------------------------------------------------------
*/
$config['smarty_caching']       = FALSE;
$config['smarty_force_compile'] = ENVIRONMENT === 'development';
$config['smarty_debugging']     = FALSE;

/*
|--------------------------------------------------------------------------
| Template file extension
|--------------------------------------------------------------------------
*/
$config['theme_extension'] = 'tpl';
