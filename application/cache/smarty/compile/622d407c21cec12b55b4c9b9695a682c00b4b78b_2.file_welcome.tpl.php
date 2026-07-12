<?php
/* Smarty version 5.8.4, created on 2026-07-12 10:24:38
  from 'file:welcome.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a534f465fad00_84495490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '622d407c21cec12b55b4c9b9695a682c00b4b78b' => 
    array (
      0 => 'welcome.tpl',
      1 => 1783844227,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a534f465fad00_84495490 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\default';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11077540416a534f465f0f18_45303763', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11372254196a534f465f8a24_92759659', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_11077540416a534f465f0f18_45303763 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\default';
echo htmlspecialchars((string) ((($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? 'Welcome' ?? null : $tmp)), ENT_QUOTES, 'UTF-8');?>
 — CI3 Smarty<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_11372254196a534f465f8a24_92759659 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\default';
?>

	<section class="hero">
		<h1><?php echo htmlspecialchars((string) ((($tmp = $_smarty_tpl->getValue('heading') ?? null)===null||$tmp==='' ? 'Welcome to CodeIgniter!' ?? null : $tmp)), ENT_QUOTES, 'UTF-8');?>
</h1>
		<p><?php echo htmlspecialchars((string) ((($tmp = $_smarty_tpl->getValue('message') ?? null)===null||$tmp==='' ? 'This page is rendered by Smarty from the active theme.' ?? null : $tmp)), ENT_QUOTES, 'UTF-8');?>
</p>
		<ul class="meta">
			<li>Template: <code>views/themes/<?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('theme_slug')), ENT_QUOTES, 'UTF-8');?>
/welcome.tpl</code></li>
			<li>Controller: <code>application/controllers/Welcome.php</code></li>
		</ul>
		<p><a class="btn" href="https://codeigniter.com/userguide3/" target="_blank" rel="noopener">User Guide</a></p>
	</section>
<?php
}
}
/* {/block "content"} */
}
