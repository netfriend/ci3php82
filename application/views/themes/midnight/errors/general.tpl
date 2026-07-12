{extends file="layouts/main.tpl"}

{block name="title"}{$page_title|default:'Error'} — CI3 Smarty{/block}

{block name="content"}
	<section class="hero error-page">
		<p class="error-code">{$status_code|default:500}</p>
		<h1>{$heading|default:'An Error Was Encountered'}</h1>
		<p class="error-message">{$message|default:'Something went wrong.'}</p>
		<p><a class="btn" href="{$base_url}">Back to home</a></p>
	</section>
{/block}
