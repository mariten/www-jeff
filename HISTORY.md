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
