<?php
/* Smarty version 5.8.4, created on 2026-07-12 10:26:16
  from 'file:partials/footer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a534fa82b7bd6_29764956',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5861d8b915bbf92da8d6ddacf3385e1d374e9ae5' => 
    array (
      0 => 'partials/footer.tpl',
      1 => 1783844265,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a534fa82b7bd6_29764956 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\midnight\\partials';
?><footer class="site-footer">
	<div class="container">
		<p>Page rendered with Smarty | Theme <code><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('theme_slug')), ENT_QUOTES, 'UTF-8');?>
</code> | CodeIgniter <?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('ci_version')), ENT_QUOTES, 'UTF-8');?>
</p>
	</div>
</footer>
<?php }
}
