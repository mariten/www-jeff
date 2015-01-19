{include file='inc/html/head.tpl'
    head_title_suffix   = 'Development'
    head_description    = 'Summary of my development history and personal projects'
}
{include file='inc/html/body.tpl' opening=true}

<!-- Header -->
{include file='inc/parts/page_header.tpl'}

<!-- Main -->
<div id="main-wrapper">
    <div class="container">

        <!-- Content -->
        <div id="content">

            <article>

                <h2>Development</h2>

                <p>I first started programming as a hobby when I was 14 years old and my language of choice at the time was Visual Basic 3.0 (in Windows 3.1).  Over the years as well as through my college Computer Science education and internship, I have come to be proficient with a vast number of languages, technologies, and skills.  These days I use PHP, Java, and JavaScript the most, occasionally making use of Python, Ruby, and C++.  As technology is an ever-changing field, I continue to learn new things and skills with each passing month.  I really enjoy making things and so it is always fun to learn new technologies for my toolbox.</p>

            </article>
            <article>

                <h2>Open Source Contributions</h2>
                <p>Some projects I have started or contributed to over the years</p>

                <h3><a href="https://github.com/mariten/kanatools-java">Kana Tools for Java</a></h3>
                <p>A small library to make life easier when dealing with Japanese text in Java that handles conversion between different varieties of kana, roma-ji, and character-width ("full-width" and "half-width").</p>
                <p>Has <a href="http://mariten.github.io/kanatools-java">in-depth documentation</a> as well.</p>

                <h3><a href="https://github.com/ubilabs/flickr_geocoding_bookmarklet">Flickr Geocoding Bookmarklet</a></h3>
                <p>A small script which when called from a Flickr photo page allows the user to geotag with extreme accuracy using Google Maps.  This is especially helpful in Japan due to the amount of detail present in the Zenrin map of Japan used by Google, as opposed to the very map used by Flickr (Yahoo US) which has very poor detail</p>

                <h3><a href="https://github.com/mariten/json-cat">JSON Cat</a></h3>
                <p>Output the content of JSON data files to the Linux command line (similar to the <b>cat</b> command) in a pretty, human-readable format - available in multiple langauges!</p>

                <h3><a href="https://github.com/mariten/good-grep">Good Grep</a></h3>
                <p>A small convenient Bash wrapper for <b>grep</b> that I use practically every day</p>

                <h3><a href="https://www.openoffice.org/bibliographic/">OpenOffice Bibliographic</a></h3>
                <p>Did some initial development for this project as my Capstone Project in college.  I worked on MODS storage backend in C++ for a plugin that would make it easier for academics to manage citations used in papers written in OpenOffice.  Unfortunately, this project (OOoBib, as it was known) is now defunct.</p>

                <h2>Cool Websites I've Made</h2>
                <p>These are some full websites I have created</p>

                <h3><a href="http://www.miejets.org/gb/">The Mie Guidebook</a></h3>
                <p>A comprehensive resource for English-speakers living in Mie Prefecture to thrive during their stay there.  I was in charge of this service not just in a technical capacity but a content capacity as well - In addition to installing, customizing, and in some cases extending <a href="http://www.mediawiki.org">MediaWiki</a>, I was also in charge of content itself as well.  I created more than half the articles myself, oversaw edits, enforced a guideline of style, and more.</p>
                <p>It is written to be useful to both those living in Mie as well as those just visiting its more well-known sites, and some of the articles are now top-ranked in Google's search results.</p>

                <h3><a href="http://www.mielifemagazine.com">Mie Life Magazine</a></h3>
                <p>A fully bilingual website for an online magazine created for residents of Mie Prefecture that I created and designed from scratch using PHP and MySQL, as well as set up the hosting servers and procured the domain.  Though the magazine has been defunct for several years, the content remains.</p>

                <h3><a href="http://wedding.mariten.com">A Website for My Own Wedding</a></h3>
                <p>Complete with a fully-functional online RSVP service, spam-proof guestbook, photo album, as well as a Google Map guide for Akron, Ohio</p>

            </article>

        </div>
    </div>
</div>

<!-- Footer -->
{include file='inc/parts/page_footer.tpl'}

{include file='inc/html/body.tpl' closing=true}
