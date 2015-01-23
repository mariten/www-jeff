{foreach from=$sample_photos key=row_num item=row_of_photos}
<div id="features-wrapper">
    <div class="container">
        <div class="row">

    {foreach from=$row_of_photos key=album_key item=picked_photo name=photo_loop}
            <div class="4u">
                <section class="box feature{if $smarty.foreach.photo_loop.last} last{/if}">
                    <a href="{$picked_photo.photo_url}" class="image featured"><img src="{$picked_photo.img_url}" alt="{$picked_photo.title}" /></a>
                    <div class="inner">
                        <header>
                            <h2><a href="{$picked_photo.photo_url}" style="color:#444;">{$picked_photo.title}</a></h2>
                            <p>From album <a href="{$picked_photo.album_url}">{$picked_photo.album_display}</a></p>
                        </header>
        {if $picked_photo.prefecture}
                        <p>
                            <a href="{$picked_photo.tag_url}">Taken in {$picked_photo.prefecture} Prefecture</a>
                        </p>
        {/if}
                    </div>
                </section>
            </div>
    {/foreach}

        </div>
    </div>
</div>
{/foreach}
