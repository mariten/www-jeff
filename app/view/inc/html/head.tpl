<!DOCTYPE HTML>
<html lang="en">
    <head>
{if $head_title}
        <title>{$head_title}</title>
{elseif $head_title_suffix}
        <title>{$smarty.const.DEFAULT_HTML_TITLE} :: {$head_title_suffix}</title>
{else}
        <title>{$smarty.const.DEFAULT_HTML_TITLE}</title>
{/if}
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="{$head_description}" />
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
