<?php
require_once JEFF_BASE_DIR . 'app/model/api/Flickr.php';

class API_Flickr_Photosets extends API_Flickr
{
    const DEFAULT_PHOTO_COUNT = 300;
    protected static $DEFAULT_EXTRA_FIELDS = array(
        'date_taken',
        'url_m',
        'o_dims',
        'geo',
        'tags',
    );


    //{{{ fetchAlbumPhotoLists(array[, array, integer])
    /**
      * Fetch lists of photos for a specified list of albums
      * @param  array    Key-value array with key as local photoset key, and value as the photoset ID on Flickr
      * @param  array    List of extra fields to request in Flickr API results for each photo
      * @param  integer  Max number of result photos per set
      * @return array    Key-value array with key as local photoset key, value as the API result from Flickr
      *                  Return empty array if any of the requests failed
      */
    public function fetchAlbumPhotoLists($target_photosets,
                                         $extra_fields_as_array = null,
                                         $max_photo_count = self::DEFAULT_PHOTO_COUNT
    )
    {
        if(is_null($extra_fields_as_array)) {
            $extra_fields_as_array = self::$DEFAULT_EXTRA_FIELDS;
        }

        $urls_for_api = array();
        foreach($target_photosets as $photoset_key => $photoset_id) {
            if(ctype_digit((string)$photoset_id)) {
                $urls_for_api[$photoset_key] = $this->makeQueryForGetPhotos(
                    $photoset_id,
                    $extra_fields_as_array,
                    $max_photo_count
                );
            } else {
                // Photoset ID non-numeric
                $urls_for_api[$photoset_key] = '';
            }
        }

        $api_results = $this->apiQueryMulti($urls_for_api);
        foreach($api_results as $photoset_key => $photoset_result) {
            if(isset($photoset_result['photoset'])
            && !empty($photoset_result['photoset']['photo'])
            && isset($photoset_result['stat'])
            && $photoset_result['stat'] === 'ok') {
                $api_results[$photoset_key] = $photoset_result['photoset'];
            } else {
                // Request failed
                return array();
            }
        }

        return $api_results;
    }
    //}}}


    //{{{ makeQueryForGetPhotos(bigint, array, integer)
    /**
      * Initialize key-values for Flickr API
      * @param  bigint   Numeric photoset ID (bigint passed as numeric or string)
      * @param  array    List of fields to pass for the "extras" param
      * @param  integer  Max number of results
      * @return string   URL to send to CURL query
      */
    protected function makeQueryForGetPhotos($photoset_id, $extra_fields, $photos_to_fetch)
    {
        $api_params = array(
            'method'        => 'flickr.photosets.getPhotos',
            'photoset_id'   => $photoset_id,
            'extras'        => implode(',', $extra_fields),
            'per_page'      => $photos_to_fetch,
        );
        return $this->buildRequestURL($api_params);
    }
    //}}}
}
