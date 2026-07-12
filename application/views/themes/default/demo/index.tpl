{extends file="layouts/main.tpl"}

{block name="title"}{$page_title|default:'HMVC Demo'} — CI3 Smarty{/block}

{block name="content"}
	<section class="hero">
		<h1>{$heading|default:'HMVC Demo'}</h1>
		<p>{$message}</p>
		<ul class="meta">
			<li>Module: <code>{$module}</code></li>
			<li>Active theme: <code>{$theme_slug}</code></li>
			<li>Template: <code>views/themes/{$theme_slug}/demo/index.tpl</code></li>
			<li>Controller: <code>application/modules/demo/controllers/Demo.php</code></li>
			<li>PHP: <code>{$php}</code></li>
		</ul>
		<p><a class="btn" href="{$base_url}">Back to home</a></p>
	</section>
{/block}
