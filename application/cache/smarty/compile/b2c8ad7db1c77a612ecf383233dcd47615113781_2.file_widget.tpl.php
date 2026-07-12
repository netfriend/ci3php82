<?php
/* Smarty version 5.8.4, created on 2026-07-12 10:26:16
  from 'file:demo/widget.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a534fa8573a73_67329764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2c8ad7db1c77a612ecf383233dcd47615113781' => 
    array (
      0 => 'demo/widget.tpl',
      1 => 1783844764,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a534fa8573a73_67329764 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\midnight\\demo';
?><div class="hmvc-widget">
	HMVC widget OK — theme <code><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('theme_slug')), ENT_QUOTES, 'UTF-8');?>
</code> | module <code><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('module')), ENT_QUOTES, 'UTF-8');?>
</code> | PHP <code><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('php')), ENT_QUOTES, 'UTF-8');?>
</code>
</div>
<?php }
}
