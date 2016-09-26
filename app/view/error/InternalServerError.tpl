{include file='inc/html/Head.tpl'
    head_title_suffix   = '500 Internal Server Error'
    head_description    = 'This page experienced an unexpected error while loading'
}
{include file='inc/html/Body.tpl' opening=true}

<!-- Header -->
{include file='inc/parts/PageHeader.tpl'}

<!-- Main -->
<div id="main-wrapper">
    <div class="container">

        <!-- Content -->
        <div id="content">

            <section class="last">

                <h2>500 Internal Server Error</h2>
                <p>Sorry!  There was an unexpected error while processing this page.  Please try again in a few minutes.</p>

                <p>I know it's not much of a consolation, but to try and make it up to you here is a tasty bowl of ramen.</p>
                <p><a class="image" href="{$personal_web_links.flickr.url}14474959427/"><img src="/images/ito_ramen.jpg" alt="Picture of bowl of ramen" /></a></p>

            </section>

        </div>
    </div>
</div>

<!-- Footer -->
{include file='inc/parts/PageFooter.tpl'}

{include file='inc/html/Body.tpl' closing=true}
