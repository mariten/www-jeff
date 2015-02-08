[jeff.mariten.com](http://jeff.mariten.com)
==============================================
**jeff-www** is a small PHP/Smarty system that powers my personal website *[About Jeff Case](http://jeff.mariten.com)*

## Features
#### Technologies Used
* PHP 5.4
* Smarty 2
* Apache 2.2
* Page design based on [**Verti**](http://html5up.net/verti) by [HTML5 UP](http://html5up.net) (with a number of locally-made CSS customizations)
  * Utilizes [Skel](https://github.com/n33/skel) JS and [Font Awesome](http://fortawesome.github.io/Font-Awesome) for social button glyphs

#### Photos via Flickr API
Performs asynchronous CURL queries at the Flickr API to pick a photo from specified Flickr albums

* Fetch metadata for a Flickr photoset and pick a single random photo from multiple albums, each photo must meet certain conditions such as:
  * To ensure visual symmatery, each photo must be a 4x3 landscape shot
  * Each photo must have been taken in a different prefecture as all of the other randomly selected photos
  * Check whether the photo is geotagged, and if so show a link to a satellite map location of where it was shot
* Perform queries to Flickr API asynchronously using `curl_multi` wrapper

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
2. For Flickr API calls, manually set your API key in the [Flickr config](config/secrets/flickr.php) file
3. Point the **DocumentRoot** for Apache to the `www` folder - [index.php](www/index.php) in that folder handles all requests

## Credits
* Thanks to @n33 for the great design skeletons at http://html5up.net
