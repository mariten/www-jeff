{include file='inc/html/Head.tpl'
    head_description    = 'Personal Website for Jeff Case - Developer, Photographer, and Translator'
}
{include file='inc/html/Body.tpl' opening=true}

<!-- Header -->
{include file='inc/parts/PageHeader.tpl'}

<!-- Banner -->
<div id="banner-wrapper">
    <div id="banner" class="box container">
        <div class="row">
            <div class="7u">
                <h2>Jeff Case</h2>
                <p>Developer, photographer, creator, tinkerer, translator, explorer, computer geek</p>
            </div>
            <div class="5u">
                <ul>
                    <li><a href="/development" class="button big icon fa-arrow-circle-right">Development</a></li>
                    <li><a href="/photography" class="button big icon fa-arrow-circle-right">Photography</a></li>
                    <li><a href="/translation" class="button big icon fa-arrow-circle-right">Translation</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Main -->
<div id="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="3u">
            
                <!-- Sidebar -->
                <div id="sidebar">
                    <section>
                        <h3>Around the Web</h3>
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
                        <h2>About Me</h2>

                        <p>I am a software engineer living and working in the San Francisco Bay Area who spent close to a decade (2006 to 2015) living in Japan.  Originally from Ohio, I graduated from Kent State University in 2006 with a degree in Computer Science and moved to Japan shortly after graduation.  I taught myself Japanese during my initial years there, living in quiet Mie Prefecture (home of Ise Grand Shrine!), and through daily practice I eventually achieved full professional fluency.  In 2011, hungry for exciting new opportunities, I moved to Tokyo which is the heart of Japan's tech sector.  Then in 2015, I transferred to my current employer's US office in San Francisco.</p>

                        <p>I have worked for two major Japanese web services that have millions of daily users.  These large-scale systems demanded fast and stable performance in all facets of their software, so on all my projects I worked hard to make them efficient, robust, and maintainable.  I learned a lot about industrial-grade architecture, reliability, and scalability by getting to work regularly with some of Japan's most talented engineers.  In addition, I did some freelance work during my earlier Japan years, including creating and operating a bilingual online guidebook with content tailored to those living in Mie.  Some of the personal projects I have worked on over the years are detailed on the <a href="/development">development page</a>.</p>

                        <p>When not programming, I am often found looking at maps.  I love exploring — finding stunning and/or interesting places, searching for tasty food, or just wandering around somewhere new.  My fondness for exploring naturally lends itself to travel.  I travel when I can and enjoy taking pictures, particularly in Japan, due to the abundance of modern environments, historic scenes, natural beauty, and good food available.  You can see a sample of some of my photos taken there below, or feel free to check out the <a href="/photography">photography page</a> for even more.</p>

                    </section>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Photo Features Placeholder -->
<div id="photos_for_home" style="margin-top:3em;">
    {include file='inc/parts/PhotoLoader.tpl'}
</div>

<!-- Footer -->
{include file='inc/parts/PageFooter.tpl'}


<!-- JS for After OnLoad -->
{literal}
<script>
function lazyload_home_flickr_pics()
{
    $.ajax({
        url:        "async/top?ts=" + Date.now(),
        type:       "GET",
        dataType:   "html",
        success: function(photos_html) {
            // Returns photo HTML as-is, simply "replace" the current <div> in DOM with the results of this API
            var div_for_results = $('<div />').append(photos_html);
            $('#photos_for_home').html(div_for_results);
        },
        error: function(xhr, http_status) {
            $('#photos_for_home').remove();
        }
    });
}

window.onload_function_queue.push(lazyload_home_flickr_pics)
</script>
{/literal}

{include file='inc/html/Body.tpl' closing=true}
