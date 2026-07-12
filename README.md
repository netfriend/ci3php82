# CodeIgniter 3 for PHP 8.2 — Multi-Theme + Smarty + HMVC

A ready-to-run **CodeIgniter 3.1.13** application patched for **PHP 8.2**, with:

- **Multiple themes** (switchable at runtime)
- **Smarty 5** as the theme template engine
- **Wiredesignz Modular Extensions (HMVC)** for modular controllers

Demo themes: `default` and `midnight`  
Demo HMVC module: `application/modules/demo` (renders through the active Smarty theme)

## Requirements

- PHP **8.2+** (developed/tested on PHP 8.2)
- Composer
- Apache (or compatible) with `mod_rewrite` optional
- MySQL/MariaDB only if you enable the database

## Quick start

```bash
composer install
# point your web root / vhost to this project, then open:
# http://localhost/ci3php82/
```

Useful URLs:

| URL | Description |
|-----|-------------|
| `/` | Welcome page (active theme + Smarty) |
| `/welcome/switch_theme/{slug}` | Switch theme (`default`, `midnight`, …) |
| `/demo` | HMVC demo module using the active theme |

## Project layout (themes & modules)

```
application/
  views/themes/{slug}/     # Smarty themes (layouts, partials, assets, pages)
  modules/{name}/          # HMVC modules (extend MX_Controller)
  libraries/Theme.php      # Smarty + theme switching
  third_party/MX/          # Wiredesignz HMVC core (PHP 8.2 patched)
  core/MY_Loader.php
  core/MY_Router.php
```

Theme templates use Smarty (`.tpl`). Controllers render with:

```php
$this->theme->display('welcome', ['page_title' => 'Home']);
$this->theme->set_theme('midnight');
```

## PHP 8.2 compatibility notes

Official CodeIgniter 3.1.13 and classic Wiredesignz HMVC were not fully PHP 8.2-ready. This repo includes practical patches such as:

- `#[\AllowDynamicProperties]` on core / MX classes that rely on dynamic properties
- Safer handling of nullable `controller_suffix` and `strtolower(null)` cases in HMVC
- Composer autoload for Smarty 5

## Credits / original sources

This project is based on (and modifies) the following upstream projects. All credit belongs to their authors and communities:

| Component | Upstream | Link |
|-----------|----------|------|
| **CodeIgniter 3** | CodeIgniter Foundation — legacy CI3 framework (v3.1.13) | https://codeigniter.com/ |
| **CodeIgniter 3 source** | Official CI3 repository | https://github.com/bcit-ci/CodeIgniter |
| **Smarty** | Smarty template engine (v5.x via Composer) | https://www.smarty.net/ |
| **Smarty (Packagist)** | `smarty/smarty` | https://github.com/smarty-php/smarty |
| **Wiredesignz HMVC** | Modular Extensions — HMVC for CodeIgniter | https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc |

HMVC files in this repository were adapted from a community mirror of Wiredesignz Modular Extensions and further patched for PHP 8.2.

## License

- CodeIgniter 3: MIT (see `license.txt`)
- Smarty: see the Smarty project license
- Wiredesignz Modular Extensions: MIT (as published by the original author)

Modifications in this repository are provided under the same spirit: keep attribution to the original projects above.
