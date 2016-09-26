{include file='inc/html/Head.tpl'
    head_title_suffix   = '400 Bad Request'
    head_description    = 'This page had an invalid request parameter'
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

                <h2>400 Bad Request</h2>
                <p>Sorry!  That URL contained an invalid request parameter.</p>

                <p>I know it's not much of a consolation, but to try and make it up to you here is a double-serving of amazing french toast.</p>
                <p><a class="image" href="{$personal_web_links.flickr.url}7855759630/"><img src="/images/french_toast.jpg" alt="Picture of two plates of french toast" /></a></p>

            </section>

        </div>
    </div>
</div>

<!-- Footer -->
{include file='inc/parts/PageFooter.tpl'}

{include file='inc/html/Body.tpl' closing=true}
