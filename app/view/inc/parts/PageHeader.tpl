<div id="header-wrapper">
    <header id="header" class="container">

        <!-- Logo -->
        <div id="logo">
            <a href="/">
                <img src="/images/jeff64face.png" alt="[My Avatar]" width="64" height="64" />
                <h1>About Jeff Case</h1>
            </a>
        </div>

        <!-- Nav -->
        <nav id="nav">
            <ul>
{foreach from=$navbar_links item=nav_link}
                <li class="{if $nav_link.sub_menu}opener{/if} {if $nav_link.path == $request_path}current{/if}">
                    <a href="{$nav_link.path}">{$nav_link.display}</a>
                </li>
{/foreach}
            </ul>
        </nav>

    </header>
</div>
