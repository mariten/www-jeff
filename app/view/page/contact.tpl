{include file='inc/html/head.tpl'
    head_title          = 'Contact Jeff Case'
    head_description    = 'Get in touch with me today'
}
{include file='inc/html/body.tpl' opening=true}

<!-- Header -->
{include file='inc/parts/page_header.tpl'}

<!-- Main -->
<div id="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="4u">

                <!-- Sidebar -->
                <div id="sidebar">
                    <section>
                        <ul class="web-icons">
{foreach from=$personal_web_links item=web_link}
                            <li class="icon {$web_link.glyph}"><a href="{$web_link.url}">{$web_link.display}</a></li>
{/foreach}
                        </ul>
                    </section>
                </div>

            </div>
            <div class="8u skel-cell-important">

                <!-- Content -->
                <div id="content">
                    <section class="last">
                        <h2>Get In Touch</h2>

                        <p>I'm happy to hear from any and all about development, photography, translation, and more!</p>

                        <p>I am currently active on several web communities shown on the left, please feel free to contact me at any of them - LinkedIn or Flickr are probably the easiest.  I will respond in time to genuine queries.</p>

                    </section>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Footer -->
{include file='inc/parts/page_footer.tpl'}

{include file='inc/html/body.tpl' closing=true}
