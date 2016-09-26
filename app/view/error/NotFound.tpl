{include file='inc/html/Head.tpl'
    head_title_suffix   = '404 Not Found'
    head_description    = 'This page count not be found'
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

                <h2>404 Not Found</h2>
                <p>Sorry!  That URL does not match any existing page on the site.</p>

                <p>I know it's not much of a consolation, but to try and make it up to you here are some delicious chicken fingers.</p>
                <p><a class="image" href="{$personal_web_links.flickr.url}15505847264/"><img src="/images/chicken_fingers.jpg" alt="Tasty picture of chicken fingers" /></a></p>

            </section>

        </div>
    </div>
</div>

<!-- Footer -->
{include file='inc/parts/PageFooter.tpl'}

{include file='inc/html/Body.tpl' closing=true}
