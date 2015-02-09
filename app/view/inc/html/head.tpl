<!DOCTYPE HTML>
<html lang="en">
    <head>
{if $head_title}
    {assign var="full_title" value="`$head_title`"}
{elseif $head_title_suffix}
    {assign var="full_title" value="`$smarty.const.DEFAULT_HTML_TITLE` :: `$head_title_suffix`"}
{else}
    {assign var="full_title" value="`$smarty.const.DEFAULT_HTML_TITLE`"}
{/if}

        <title>{$full_title}</title>
        <meta http-equiv="content-type"  content="text/html; charset=utf-8" />
        <meta name="description"         content="{$head_description}" />
        <meta property="og:title"        content="{$full_title}" />
        <meta property="og:description"  content="{$head_description}" />
        <meta property="og:image"        content="{$smarty.const.JEFF_DOMAIN_CANONICAL}/images/jeff200face.png" />
        <meta property="og:url"          content="{$smarty.const.JEFF_DOMAIN_CANONICAL}{$request_path}" />
        <link rel="canonical"            href="{$smarty.const.JEFF_DOMAIN_CANONICAL}{$request_path}" />

        <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="css/style.css" />

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.dropotron.min.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-layers.min.js"></script>
        <script src="js/init.js"></script>
        <noscript>
            <link rel="stylesheet" href="css/skel.css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/style-desktop.css" />
        </noscript>
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
    </head>
