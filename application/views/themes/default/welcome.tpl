{extends file="layouts/main.tpl"}

{block name="title"}{$page_title|default:'Welcome'} — CI3 Smarty{/block}

{block name="content"}
	<section class="hero">
		<h1>{$heading|default:'Welcome to CodeIgniter!'}</h1>
		<p>{$message|default:'This page is rendered by Smarty from the active theme.'}</p>
		<ul class="meta">
			<li>Template: <code>views/themes/{$theme_slug}/welcome.tpl</code></li>
			<li>Controller: <code>application/controllers/Welcome.php</code></li>
		</ul>
		<p><a class="btn" href="https://codeigniter.com/userguide3/" target="_blank" rel="noopener">User Guide</a></p>
	</section>
{/block}
