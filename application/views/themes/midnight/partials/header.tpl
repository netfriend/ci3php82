<header class="site-header">
	<div class="container header-inner">
		<a class="brand" href="{$base_url}">CI3 + Smarty</a>
		<nav class="theme-switcher" aria-label="Theme switcher">
			<span class="label">Theme:</span>
			{foreach $app_themes as $t}
				{if $t.active}
					<strong>{$t.name}</strong>
				{else}
					<a href="{$site_url}/welcome/switch_theme/{$t.slug}">{$t.name}</a>
				{/if}
			{/foreach}
		</nav>
	</div>
</header>
