<div id="header-wrapper">
    <header id="header" class="container">

        <!-- Logo -->
        <div id="logo">
            <a href="/">
                <img src="images/jeff64face.png" alt="[My Avatar]" width="64" height="64" />
                <h1>About Jeff Case</h1>
            </a>
        </div>

        <!-- Nav -->
        <nav id="nav">
            <ul>
{foreach from=$navbar_links key=target_path item=target_desc}
                <li class="{if $target_path == $request_path}current{/if}">
                    <a href="{$target_path}">{$target_desc}</a>
                </li>
{/foreach}
            </ul>
        </nav>

    </header>
</div>
