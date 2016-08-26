{include file='inc/html/head.tpl'
    head_description    = 'Personal Website for Jeff Case - Developer, Photographer, and Translator'
}
{include file='inc/html/body.tpl' opening=true}

<!-- Header -->
{include file='inc/parts/page_header.tpl'}

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

                        <p>I am a software engineer living and working in Tokyo, originally from Dayton, Ohio.  I graduated from Kent State University in 2006 with a degree in Computer Science and have been living in Japan ever since, first in Mie Prefecture (home to Ise Grand Shrine!) and later in central Tokyo.  During my time in Mie I taught myself Japanese and through daily practice achieved full professional fluency over the years.</p>

                        <p>Throughout my life I have developed numerous pieces of software and websites, some of which are listed on the <a href="/development">development page</a>.  During my Tokyo years I have worked for two major Japanese web services that have millions of daily users.  For these large-scale services I have primarily worked with search, rankings, recommendations, data visualization, validation tools, and other data ETL functionality.  While living in Mie I also created and operated a number of English-language websites for local information.</p>

                        <p>When not programming, I am often found looking at maps.  I love exploring - finding stunning and/or interesting places, searching for tasty food, or just wandering around and seeking out new paths.  My fondness for exploring naturally lends itself to travel.  I travel when I can and enjoy taking pictures, particularly in Japan, due to the abundance of modern environments, historic scenes, natural beauty, and good food available.  You can see a sample of some of my photos taken in Japan below, or feel free to check out the <a href="/photography">photography page</a> for even more.

                    </section>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Photo Features Placeholder -->
<div id="photos_for_home" style="margin-top:3em;">
{include file='inc/parts/photo_loader.tpl'}
</div>

<!-- Footer -->
{include file='inc/parts/page_footer.tpl'}

{include file='inc/html/body.tpl' closing=true}
