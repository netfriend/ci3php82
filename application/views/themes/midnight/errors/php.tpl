{extends file="layouts/main.tpl"}

{block name="title"}{$page_title|default:'PHP Error'} — CI3 Smarty{/block}

{block name="content"}
	<section class="hero error-page">
		<p class="error-code">PHP</p>
		<h1>{$heading|default:'A PHP Error was encountered'}</h1>
		<ul class="meta">
			<li>Severity: <code>{$severity|default:''}</code></li>
			<li>Message: {$message|default:''}</li>
			{if $show_debug|default:false}
				<li>Filename: <code>{$filepath|default:''}</code></li>
				<li>Line Number: <code>{$line|default:''}</code></li>
			{/if}
		</ul>
		<p><a class="btn" href="{$base_url}">Back to home</a></p>
	</section>
{/block}
