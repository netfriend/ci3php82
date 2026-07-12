<?php
/* Smarty version 5.8.4, created on 2026-07-12 10:26:15
  from 'file:layouts/main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a534fa7f21ed9_30422857',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '306298a58334fb7e11eedf367b00ccb6d9914bf1' => 
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
function content_6a534fa7f21ed9_30422857 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\midnight\\layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_21267827086a534fa7f19196_39405849', "title");
?>
</title>
	<link rel="stylesheet" href="<?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('theme_assets_url')), ENT_QUOTES, 'UTF-8');?>
css/style.css">
	<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15777182276a534fa7f1ae95_13197243', "head");
?>

</head>
<body>
	<?php $_smarty_tpl->renderSubTemplate("file:partials/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

	<main class="container">
		<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9647525896a534fa7f1e7c4_62522774', "content");
?>

	</main>

	<?php $_smarty_tpl->renderSubTemplate("file:partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
	<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12616657536a534fa7f20aa3_64555366', "scripts");
?>

</body>
</html>
<?php }
/* {block "title"} */
class Block_21267827086a534fa7f19196_39405849 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\midnight\\layouts';
echo htmlspecialchars((string) ((($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? 'CodeIgniter' ?? null : $tmp)), ENT_QUOTES, 'UTF-8');
}
}
/* {/block "title"} */
/* {block "head"} */
class Block_15777182276a534fa7f1ae95_13197243 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\midnight\\layouts';
}
}
/* {/block "head"} */
/* {block "content"} */
class Block_9647525896a534fa7f1e7c4_62522774 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\midnight\\layouts';
}
}
/* {/block "content"} */
/* {block "scripts"} */
class Block_12616657536a534fa7f20aa3_64555366 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\midnight\\layouts';
}
}
/* {/block "scripts"} */
}
