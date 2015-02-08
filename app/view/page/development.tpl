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

                <p>I first started programming as a hobby when I was 14 years old - the year was 1996, the language was Visual Basic 3.0, and the OS was Windows 3.1.  Through my college Computer Science education, internship, and many independent projects over the years, I have come to be proficient with a vast number of languages, technologies, and skills.  These days I use PHP, Java, and JavaScript the most and occasionally make use of Python, Ruby, and C++.  As technology is an ever-changing field, I continue to acquire new skills with each passing month.  I really enjoy making things and so it is always fun to learn new technologies to add to my toolbox.</p>

            </article>
            <article>

                <h2>Open Source Contributions</h2>
                <p>Some projects I have started or contributed to over the years:</p>

                <h3><a href="https://github.com/mariten/kanatools-java">Kana Tools for Java</a></h3>
                <p>A small one-stop-shopping library to make life easier when dealing with Japanese text in Java that handles all types of conversion between different varieties of kana, roma-ji, and character-width ("full-width" and "half-width").  Languages such as PHP come with this functionality built-in, but no workable best practice in Java exists for this type of processing, so I am attempting to fill that void through the creation of this library.</p>
                <p>Has <a href="http://mariten.github.io/kanatools-java">in-depth documentation</a> as well.</p>

                <h3><a href="https://github.com/ubilabs/flickr_geocoding_bookmarklet">Flickr Geocoding Bookmarklet</a></h3>
                <p>As the <a href="/photography">photography</a> page will let you know, I love Flickr and its API.  However, since the vast majority of my photos are taken in Japan, I have always had some difficulty geotagging photos on the Flickr website because they show the Yahoo US map of Japan which is of very poor quality and low detail.  This small script, which can be bookmarked and called from any Flickr photo page, allows a user to geotag a given Flickr photo with the extreme accuracy of Google Maps, which when fully zoomed in offers an amazing level of detail.</p>

                <h3><a href="https://github.com/mariten/json-cat">JSON Cat</a></h3>
                <p>Output the content of JSON data files to the Linux command line (similar to the <b>cat</b> command) in a pretty, human-readable format - available in multiple langauges!</p>

                <h3><a href="https://github.com/mariten/good-grep">Good Grep</a></h3>
                <p>A small convenient Bash wrapper for <b>grep</b> that I use practically every day</p>

                <h3><a href="https://www.openoffice.org/bibliographic/">OpenOffice Bibliographic</a></h3>
                <p>Did some initial development for this project as my Capstone Project in college.  I worked on the backend of a MODS (XML schema developed by the US Library of Congress) storage API in C++ for a plugin to make it easier for academics to manage citations used in papers written in OpenOffice.  Unfortunately, this project (OOoBib, as it was known) is now defunct.</p>

                <h2>Cool Websites I've Made</h2>
                <p>These are some full websites I have created:</p>

                <h3><a href="http://www.miejets.org/gb/">The Mie Guidebook</a></h3>
                <p>A comprehensive resource for English-speakers living in Mie Prefecture to thrive during their stay there.  I was not only in charge of this service in a technical capacity, but an editing capacity as well.  In addition to installing, customizing, and in some cases extending <a href="http://www.mediawiki.org">MediaWiki</a>, I curated the content as well.  I wrote more than half the articles myself, oversaw edits, enforced style guidelines, and more.</p>
                <p>It was created to be useful to both those living in Mie as well as visitors, and some of the articles are now top-ranked in Google's search results.</p>

                <h3><a href="http://www.mielifemagazine.com">Mie Life Magazine</a></h3>
                <p>A fully bilingual website for an online magazine created for residents of Mie Prefecture.  I created and designed the site from scratch using PHP and MySQL, as well as set up the hosting servers and domain.  Though the magazine has been defunct for several years, the content remains.</p>

                <h3><a href="http://wedding.mariten.com">A Website for My Own Wedding</a></h3>
                <p>Complete with a fully-functional online RSVP service, spam-proof guestbook, photo album, as well as a Google Map guide for Akron, Ohio</p>

            </article>

        </div>
    </div>
</div>

<!-- Footer -->
{include file='inc/parts/page_footer.tpl'}

{include file='inc/html/body.tpl' closing=true}
