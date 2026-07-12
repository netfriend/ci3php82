<?php
/* Smarty version 5.8.4, created on 2026-07-12 10:26:14
  from 'file:layouts/main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a534fa6e70af6_42871416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '57cd66b23d74820a0154354b183e8ca04bff43ea' => 
    array (
      0 => 'layouts/main.tpl',
      1 => 1783844221,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:partials/header.tpl' => 1,
    'file:partials/footer.tpl' => 1,
  ),
))) {
function content_6a534fa6e70af6_42871416 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\default\\layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19010841756a534fa6e66cc8_81441523', "title");
?>
</title>
	<link rel="stylesheet" href="<?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('theme_assets_url')), ENT_QUOTES, 'UTF-8');?>
css/style.css">
	<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5574294496a534fa6e697b1_32164313', "head");
?>

</head>
<body>
	<?php $_smarty_tpl->renderSubTemplate("file:partials/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

	<main class="container">
		<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_21257452736a534fa6e6ea90_19896420', "content");
?>

	</main>

	<?php $_smarty_tpl->renderSubTemplate("file:partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
	<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15270267156a534fa6e70013_66035031', "scripts");
?>

</body>
</html>
<?php }
/* {block "title"} */
class Block_19010841756a534fa6e66cc8_81441523 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\default\\layouts';
echo htmlspecialchars((string) ((($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? 'CodeIgniter' ?? null : $tmp)), ENT_QUOTES, 'UTF-8');
}
}
/* {/block "title"} */
/* {block "head"} */
class Block_5574294496a534fa6e697b1_32164313 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\default\\layouts';
}
}
/* {/block "head"} */
/* {block "content"} */
class Block_21257452736a534fa6e6ea90_19896420 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\default\\layouts';
}
}
/* {/block "content"} */
/* {block "scripts"} */
class Block_15270267156a534fa6e70013_66035031 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\default\\layouts';
}
}
/* {/block "scripts"} */
}
