<div id="footer-wrapper">
    <footer id="footer" class="container">

{if !$hide_social_icons}
        <div class="row">
            <div class="12u">

                <!-- Contact -->
                <section class="widget contact last">
                    <h3>Get In Touch</h3>
                    <ul>
    {foreach from=$personal_web_links item=web_link}
                        <li><a href="{$web_link.url}" class="icon {$web_link.glyph}"><span class="label">{$web_link.display}</span></a></li>
    {/foreach}
                    </ul>
                </section>

            </div>
        </div>
{/if}

        <div class="row">
            <div class="12u">

                <!-- Credits -->
                <div id="copyright">
                    <ul class="menu">
                        <li>&copy; Jeff Case. All Rights Reserved.</li>
                        <li>Original Design: <a href="http://html5up.net/verti">Verti</a> by <a href="http://html5up.net">HTML5 UP</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>
</div>
