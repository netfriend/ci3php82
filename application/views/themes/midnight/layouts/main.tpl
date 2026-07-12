<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{block name="title"}{$page_title|default:'CodeIgniter'}{/block}</title>
	<link rel="stylesheet" href="{$theme_assets_url}css/style.css">
	{block name="head"}{/block}
</head>
<body>
	{include file="partials/header.tpl"}

	<main class="container">
		{block name="content"}{/block}
	</main>

	{include file="partials/footer.tpl"}
	{block name="scripts"}{/block}
</body>
</html>
