<?php
/* Smarty version 5.8.4, created on 2026-07-12 10:26:15
  from 'file:partials/header.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.4',
  'unifunc' => 'content_6a534fa70cd009_67689195',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1581ba7538992b614220fa3052c2ac59cb2a4617' => 
    array (
      0 => 'partials/header.tpl',
      1 => 1783844240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a534fa70cd009_67689195 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'E:\\xampp8\\htdocs\\ci3php82\\application\\views\\themes\\default\\partials';
?><header class="site-header">
	<div class="container header-inner">
		<a class="brand" href="<?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('base_url')), ENT_QUOTES, 'UTF-8');?>
">CI3 + Smarty</a>
		<nav class="theme-switcher" aria-label="Theme switcher">
			<span class="label">Theme:</span>
			<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('app_themes'), 't');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('t')->value) {
$foreach0DoElse = false;
?>
				<?php if ($_smarty_tpl->getValue('t')['active']) {?>
					<strong><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('t')['name']), ENT_QUOTES, 'UTF-8');?>
</strong>
				<?php } else { ?>
					<a href="<?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('site_url')), ENT_QUOTES, 'UTF-8');?>
/welcome/switch_theme/<?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('t')['slug']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) ($_smarty_tpl->getValue('t')['name']), ENT_QUOTES, 'UTF-8');?>
</a>
				<?php }?>
			<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</nav>
	</div>
</header>
<?php }
}
