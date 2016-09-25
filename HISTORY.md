v1.1.0 :: Sep 24 2016
======================
* Updated bio to indicate that I now live in San Francisco, not Tokyo anymore
* Flickr photos at bottom of "About Me" page are now loaded asychronously
    * Added new action `async/top` to spit out just the 3-in-a-row photoset HTML as it will be used on the page (using exact same template)
    * Hit this action via Ajax once the page is loaded, then stuff content as-is into photoset `<div>` holder
    * Create small framework allowing one or more functions to be added to a queue which is set to execute after the page loads
* Add detailed "Samples" pages for each of the target Flickr albums
    * These pages show 6 pictures from the same photoset, all from different prefectures
    * Similar to the photography page, however each photo is from the same photoset
    * Photos are loaded asynchronously, in same fashion as described above
* Added the ability to fetch params for `ParamManager` out of the URL path in addition to it already reading `GET` and `POST` params
    * Define regexes that seek a single value out of a given URL path pattern
    * Also allow parameters to be passed by query string (everything after `?`) from Apache via the re-write rule
* Flickr photo-on-map viewing service **loc.alize.us** is now defunct, use the improved Flickr built-in map page for linking to photos with geo coordinates
* Other minor refactoring, clean-ups, and CSS improvements


v1.0.1 :: Feb 10 2015
======================
* Added caching to `CurlMulti` class using SHA1 on the request string
* Flickr Photoset results are now cached locally (for 24 hours) allowing very quick retrieval - only wait for API results before showing page once per day


v1.0.0 :: Feb 09 2015
======================
* Polished wording and content on each page
* Added sample Flickr photos to bottom of top page as well (one row only)
* Cleaned up code, added more comments
* Wrote README and LICENSE


v0.9.0 :: Jan 25 2015
======================
* Added six sample photos (in two rows of three) to photography page pulled from Flickr API
* Sample photos are chosen as a random photo from six different Flickr sets I maintain
* The metadata for the newest 100 photos in each set are pulled asychronously using `curl_multi`
* For each set, a photo is randomly picked after meeting certain conditions.  Continue randomly selecting (and unsetting) photos from each set until one is found that meets all conditions
    * Size must be 4x3 landscape (pulling size `medium` from Flickr, so this is 500x375px)
    * Each randomly selected photo must be from a different prefecture.  This ensures that all six photos are not from the same place in Japan.
* Display medium-sized photo, album, prefecture, date taken, and (if available) link to satellite map showing where photo was taken if it is geotagged


v0.6.0 :: Jan 19 2015
======================
* Added basic summaries for remaining pages (development, photography, translation, and contact)
* Added data registries for social web links and navbar under `app/model/Registry/`
* Made simple controllers and templates for each
* Polished wording on top page


v0.5.0 :: Jan 08 2015
======================
* Wrote basic wording summary for top page
* Seperated parts of HTML into efficiently includable templates
* Cleaned up unnecessarily elements on page, particularly header/footer
* Fixed rendering issue where page would for just an instant appear without any CSS applied


v0.1.0 :: Nov 27 2014
======================
* Added `index.php` to handle all requests
* Added soft rewrite rule logic to handle URL branching
* Set up Smarty v2.6.28
* Added parent `Controller.php` and basic logic flow from receiving a URL to displaying a template


v0.0.1 :: Nov 18 2014
======================
* Implemented original design skeleton and CSS fixes/changes (only raw HTML, no PHP yet)
* Added vertical social icons left-hand element
