[jeff.mariten.com](http://jeff.mariten.com)
==============================================
**jeff-www** is a small PHP/Smarty system that powers my personal website *[About Jeff Case](http://jeff.mariten.com)*

## Features
#### Technologies Used
* PHP 5.4 :elephant:
* Smarty 2
* Apache 2.2
* Page design and CSS derived from [**Verti**](http://html5up.net/verti) by [HTML5 UP](http://html5up.net)
  * Utilizes [Skel](https://github.com/n33/skel) JS and [Font Awesome](http://fortawesome.github.io/Font-Awesome) for social button glyphs

#### Photos via Flickr API
Performs asynchronous HTTP (via CURL) queries at the Flickr API to pick a photo from specified Flickr albums

* Fetches metadata for a Flickr photoset and picks a single random photo from one or more target albums
* Selected photos must meet certain conditions such as:
  * To ensure visual symmatery across the site, each photo must be a 4x3 landscape shot
  * Each photo must have been taken in a different state/prefecture as all of the other randomly selected photos
  * If the photo is geotagged, show a link to a satellite map location of where it was shot
* Perform queries to Flickr API asynchronously using the `curl_multi` wrapper
* Cache raw results from Flickr API for 24 hours, as my Flickr photosets are not updated more than once a day

#### Soft Rewrite Rules
All processing of the URL path and subsequent rewrite rules are handled by the top-level [index.php](www/index.php), with just a [single Apache-side rewrite rule](www/.htaccess) which indiscriminately forwards the entire URL path string to PHP where parsing and path checks can be handled more programatically.

#### Simple MVC
Top-level controller handles all page requests and based on URL path (passed as `url_path`) decides which page controller to employ.

The layers are constructed as follows:
* **Model**: Classes to directly interact with APIs and extract data from results.  Static data registries are also stored here.
* **Controller**: Fetches and arranges data from the relevant models for a given page, assigns all relevant variables to Smarty template, and then lastly displays said template
* **View**: Actual Smarty template made up mostly of HTML, comprised of multiple reusable parts

## Setup
1. Ensure `tmp/template_c` (where compiled Smarty templates go) is writable by the web server
2. For Flickr API calls, manually set the API key in the [Flickr config](config/secrets/flickr.php) file
3. Point the **DocumentRoot** for Apache to the `www` folder - [index.php](www/index.php) in that folder handles all requests

## Credits
* Thanks to [@ajlkn](https://github.com/ajlkn) for the great design skeletons at http://html5up.net
