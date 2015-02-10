<?php
require_once JEFF_BASE_DIR . 'config/secrets/flickr.php';
require_once JEFF_BASE_DIR . 'app/model/CurlMulti.php';

class API_Flickr
{
    const FLICKR_API_URL        = 'https://api.flickr.com/services/rest/';
    const FLICKR_PUBLIC_PHOTOS  = 1;

    const LANDSCAPE_MED_WIDTH   = 500;
    const LANDSCAPE_MED_HEIGHT  = 375;

    /** Object use to asynchronously call CURL */
    protected $curl;

    public function __construct()
    {
        $this->curl = new CurlMulti();
    }


    //{{{ buildRequestURL(array)
    /**
      * Affix global parameters to requests bound for the Flickr API
      * @param  array    Key-value array with request-specific values already set
      * @return array    Full URL for this API request, URL-encoded
      */
    protected function buildRequestURL($api_params)
    {
        // Affix universal parameters
        $api_params['api_key']          = SECRET_FLICKR_API_KEY;
        $api_params['privacy_filter']   = self::FLICKR_PUBLIC_PHOTOS;
        $api_params['format']           = 'json';
        $api_params['nojsoncallback']   = '1';

        // Build URL
        $request_params = http_build_query($api_params);
        $request_url = self::FLICKR_API_URL . '?' . $request_params;
        return $request_url;
    }
    //}}}


    //{{{ apiQueryMulti(array)
    /**
      * Request multiple URL responses using CURL
      * @param  array    Key-value array of URL strings (already encoded)
      * @return array    Key-value array with JSON-decoded response for each URL assigned to the key found in $urls
      */
    protected function apiQueryMulti($urls)
    {
        $flickr_response_options = array(
            'decode_json'    => true,
            'use_cache'      => true,
            'cache_expires'  => 86400,
            'cache_path'     => CACHE_FILE_DIR,
        );
        return $this->curl->performParallelRequests($urls, $flickr_response_options);
    }
    //}}}
}
