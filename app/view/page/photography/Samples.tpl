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


<!-- JS for After OnLoad -->
{literal}
<script>
function lazyload_home_flickr_pics()
{
    var requested_album = '{/literal}{$params.album_name}{literal}'
    $.ajax({
        url:        '/async/photography/samples?album_name=' + requested_album + '&ts=' + Date.now(),
        type:       'GET',
        dataType:   'html',
        success: function(photos_html) {
            // Returns photo HTML as-is, simply "replace" the current <div> in DOM with the results of this API
            var div_for_results = $('<div />').append(photos_html);
            $('#photos_for_samples').html(div_for_results);
        },
        error: function(xhr, http_status) {
            $('#photos_for_samples').remove();
        }
    });
}

window.onload_function_queue.push(lazyload_home_flickr_pics)
</script>
{/literal}

{include file='inc/html/Body.tpl' closing=true}
