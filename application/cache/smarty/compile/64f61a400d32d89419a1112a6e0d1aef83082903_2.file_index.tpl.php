<?php
/* Smarty version 5.8.4, created on 2026-07-12 10:26:14
  from 'file:demo/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a534fa6c9b2b1_48925505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64f61a400d32d89419a1112a6e0d1aef83082903' => 
    array (
      0 => 'demo/index.tpl',
      1 => 1783844761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a534fa6c9b2b1_48925505 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\default\\demo';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_12934779316a534fa6c8cba3_41409843', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7021290416a534fa6c94a60_76439088', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_12934779316a534fa6c8cba3_41409843 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\default\\demo';
echo htmlspecialchars((string) ((($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? 'HMVC Demo' ?? null : $tmp)), ENT_QUOTES, 'UTF-8');?>
 — CI3 Smarty<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_7021290416a534fa6c94a60_76439088 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\default\\demo';
?>

	<section class="hero">
		<h1><?php echo htmlspecialchars((string) ((($tmp = $_smarty_tpl->getValue('heading') ?? null)===null||$tmp==='' ? 'HMVC Demo' ?? null : $tmp)), ENT_QUOTES, 'UTF-8');?>
</h1>
		<p><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('message')), ENT_QUOTES, 'UTF-8');?>
</p>
		<ul class="meta">
			<li>Module: <code><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('module')), ENT_QUOTES, 'UTF-8');?>
</code></li>
			<li>Active theme: <code><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('theme_slug')), ENT_QUOTES, 'UTF-8');?>
</code></li>
			<li>Template: <code>views/themes/<?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('theme_slug')), ENT_QUOTES, 'UTF-8');?>
/demo/index.tpl</code></li>
			<li>Controller: <code>application/modules/demo/controllers/Demo.php</code></li>
			<li>PHP: <code><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('php')), ENT_QUOTES, 'UTF-8');?>
</code></li>
		</ul>
		<p><a class="btn" href="<?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('base_url')), ENT_QUOTES, 'UTF-8');?>
">Back to home</a></p>
	</section>
<?php
}
}
/* {/block "content"} */
}
