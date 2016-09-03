{include file='inc/html/head.tpl'
    head_title_suffix   = 'Photography'
    head_description    = 'Samples of my work and a guide to where they can be found around the web'
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

            <section>

                <h2>Sample Photos via the Flickr API</h2>
                <p>The six photos above are samples from six thematic albums covering different sides of Japan which I curate on Flickr to showcase my work.  They have been pulled using the Flickr API and one from each album has been selected at random — <a href="/photography">refresh to see different selections!</a></p>

                <p>As the above samples may indicate, the things that draw my eye the most are architure, including stunning historic buildings, striking modern buildings, and larger-than-life feats of civil engineering (especially bridges).  I also really appreciate natural beauty of both the controlled sort (like gardens and urban parks) as well as the uncontrolled sort such as photos of mountains, bodies of water, and the seasons.  If it has blue and green in it, I am likely to take a picture of it, even moreso if there are also hints of red mixed in.</p>

                <p>In addition to architecture and nature, I have a fondness for pictures of trains, amusing animals, and tasty food.  I have been lucky to live in Japan for many years as it is a place that provides abundant chances to see all of these these things.  Japan's penchant for mixing the very old and very new together makes for especially great photographic scenes.</p>

            </section>
            <section class="last">

                <h2>My Photos Around the Web</h2>

                <h3><a href="https://www.flickr.com/groups/projectweather/pool/mariten/">Yahoo! Weather App Backgrounds</a></h3>
                <p>Starting in late 2014, a few of my Japan photos were selected by admins of the <a href="https://mobile.yahoo.com/weather/">Yahoo! Weather app</a> to be used as full-screen backgrounds.  When app users look up the weather for the city/town/village in which these photos were taken, they will be displayed when the weather in the photo matches the current weather conditions.  One of the places where my photo is used is <a href="http://wikitravel.org/en/Hamamatsu">Hamamatsu</a>, a city of 750,000 that just happens to be one of my favorite places in the whole country.</p>

                <p>I think it is a very interesting and smart use of data on Yahoo's part — taking advantage of the innumerable good photos on Flickr that are geotagged.</p>


                <h3><a href="http://www.gettyimages.com/search/2/image?artist=Jeff%20Case&family=creative,editorial&excludenudity=false&sort=newest">Getty Images</a></h3>
                <p>The best of the best of my work, particularly from my earlier Japan days, are available for purchase on Getty</p>


                <h3><a href="https://www.flickr.com/photos/mariten/">Flickr Photostream</a></h3>
                <p>Consistently updated, though the photos I upload are perenially behind the present day.  For the time being, most of the photos are taken in Japan.</p>

            </section>

        </div>
    </div>
</div>

<!-- Footer -->
{include file='inc/parts/page_footer.tpl'}

{include file='inc/html/body.tpl' closing=true}
