{include file='inc/html/head.tpl'
    head_title_suffix   = 'Photography'
    head_description    = 'Where my photos can be found around the web'
}
{include file='inc/html/body.tpl' opening=true}

<!-- Header -->
{include file='inc/parts/page_header.tpl'}

{if $sample_photos}
<!-- Features -->
    {include file='inc/parts/photo_feature.tpl'}
{/if}

<!-- Main -->
<div id="main-wrapper">
    <div class="container">

        <!-- Content -->
        <div id="content">

            <article>

                <h2>My Photos Around the Web</h2>
                <p>Though I take many pictures, the better ones can be seen around the web<p>

                <h3><a href="https://www.flickr.com/groups/projectweather/pool/mariten/">Yahoo! Weather App Backgrounds</a></h3>
                <p>A few of my newer Japan photos were selected by admins of the <a href="https://mobile.yahoo.com/weather/">Yahoo! Weather app</a> to be used as backgrounds when people search the weather for the city/town/village in which they were taken, displayed when the real weather conditions match the weather seen in the photo.  So far I had photos selected for five different municipalities in Japan - including <a href="http://wikitravel.org/en/Hamamatsu">Hamamatsu</a>, a city of 750,000 that is one of my favorite places in the country.</p>
                <p>I think it is a very interesting and smart use of data on Yahoo's part - taking advantage of the innumerable good photos on Flickr that are geotagged.</p>

                <h3><a href="http://www.gettyimages.com/search/2/image?artist=Jeff%20Case&family=creative,editorial&excludenudity=false&sort=newest">Getty Images</a></h3>
                <p>The best of the best of my earlier Japan photos can be purchased on Getty</p>

                <h3><a href="https://www.flickr.com/photos/mariten/">Flickr Photostream</a></h3>
                <p>Consistently updated, though the photos I upload are almost eternally behind the present day.  Most common types of photos include natural scenes, modern architecture, traditional Japanese beauty such as gardens and shrines, trains, food, and more.</p>

            </article>

        </div>
    </div>
</div>

<!-- Footer -->
{include file='inc/parts/page_footer.tpl'}

{include file='inc/html/body.tpl' closing=true}
