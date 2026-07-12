{extends file="layouts/main.tpl"}

{block name="title"}{$page_title|default:'Exception'} — CI3 Smarty{/block}

{block name="content"}
	<section class="hero error-page">
		<p class="error-code">{$status_code|default:500}</p>
		<h1>{$heading|default:'Exception'}</h1>
		<p class="error-message">{$message}</p>
		{if $show_debug|default:false}
			<ul class="meta">
				<li>File: <code>{$filename|default:''}</code></li>
				<li>Line: <code>{$line|default:''}</code></li>
			</ul>
		{/if}
		<p><a class="btn" href="{$base_url}">Back to home</a></p>
	</section>
{/block}
