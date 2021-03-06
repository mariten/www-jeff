{include file='inc/html/Head.tpl'
    head_title          = 'Contact Jeff Case'
    head_description    = 'Get in touch with me today'
}
{include file='inc/html/Body.tpl' opening=true}

<!-- Header -->
{include file='inc/parts/PageHeader.tpl'}

<!-- Main -->
<div id="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="3u">

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
            <div class="9u skel-cell-important">

                <!-- Content -->
                <div id="content">
                    <section class="last">
                        <h2>Get In Touch</h2>

                        <p>I would be happy to hear from any and all about development, photography, translation, and more!</p>

                        <p>My email address is <a href="mailto:jeff@mariten.com">jeff@mariten.com</a>.  I am also active on several web communities (see icons); please feel free to contact me at any of them — LinkedIn or Flickr are probably the best method.  I will respond to genuine queries in time.</p>

                        <p><a class="image" href="{$personal_web_links.flickr.url}9253529281/"><img src="/images/contact_bridge.jpg" alt="Long suspension bridge picture" /></a></p>

                    </section>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Footer -->
{include file='inc/parts/PageFooter.tpl' hide_social_icons=true}

{include file='inc/html/Body.tpl' closing=true}
