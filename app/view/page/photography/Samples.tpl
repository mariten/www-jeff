{include file='inc/html/Head.tpl'
    head_title_suffix   = 'Photography Album Samples'
    head_description    = 'Multiple photos from same photoset'
}
{include file='inc/html/Body.tpl' opening=true}

<!-- Header -->
{include file='inc/parts/PageHeader.tpl'}

<!-- Main -->
<div id="small-wrapper">
    <div class="container">

        <!-- Content -->
        <div id="content" style="margin-bottom:0;">

            <section class="last">

                <h2>{$album_title}</h2>
                <p>{$album_description}</p>

            </section>

        </div>
    </div>
</div>

<!-- Photo Samples Placeholder -->
<div id="photos_for_samples" style="margin-top:3em;">
{include file='inc/parts/PhotoLoader.tpl'}
</div>

<!-- Footer -->
{include file='inc/parts/PageFooter.tpl'}

{include file='inc/html/Body.tpl' closing=true}
