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

                <h2>Sample Photos</h2>

            </section>

        </div>
    </div>
</div>

{if $sample_photos}
<!-- Features -->
<div id="photos_for_samples" style="margin-top:3em;">
    {include file='inc/parts/PhotoFeature.tpl'}
</div>
{/if}

<!-- Footer -->
{include file='inc/parts/PageFooter.tpl'}

{include file='inc/html/Body.tpl' closing=true}
