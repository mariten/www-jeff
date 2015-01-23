<?php
require_once JEFF_BASE_DIR . 'app/model/API/Flickr/Photosets.php';
require_once JEFF_BASE_DIR . 'app/model/Registry/FlickrMariten.php';

class Extraction_AlbumPhotoPicker
{
    /** Flickr API instance */
    protected $flickr = null;

    /** Metadata about potential photosets to use in requests */
    protected $available_albums = array();

    /** Locally stored results from Flickr API */
    protected $photos_by_album = array();


    public function __construct()
    {
        $this->flickr = new API_Flickr_Photosets();
        $this->available_albums = Registry_FlickrMariten::getAlbums();
    }


    //{{{ populatePhotosetLists(array)
    /**
      * Fetch the results from Flickr API and store in class variable
      * @param  array    List of photoset keys to fetch photos for
      * @return boolean  True on success of all API queries, false otherwise
      */
    public function populatePhotosetLists($target_photosets)
    {
        $photosets_to_fetch = array();
        foreach($target_photosets as $album_key) {
            if(isset($this->available_albums[$album_key])) {
                $photosets_to_fetch[$album_key] = $this->available_albums[$album_key]['id'];
            } else {
                // Requested non-existant photoset
                return array();
            }
        }

        $this->photos_by_album = $this->flickr->fetchAlbumPhotoLists($photosets_to_fetch);
        if(empty($this->photos_by_album)) {
            // API failure
            return false;
        } else {
            return true;
        }
    }
    //}}}


    //{{{ getPhotosByAlbum()
    /**
      * Return full results populated by Flickr API
      * @return array    Key-value array with key as local photoset key, and value is photo list from Flickr
      */
    public function getPhotosByAlbum()
    {
        return $this->photos_by_album;
    }
    //}}}


    //{{{ drawPhotoFromAlbum(string)
    /**
      * Pick a random photo from an album's list of photos, and then remove it from that list
      * If first selected photo is unusable, loop until a selectable photo is found or the list is empty
      *
      * @param  string   Album from which to pick a random photo from
      * @return array    Key-value array containing all relevant metadata for the picked photo
      */
    public function drawPhotoFromAlbum($album_key)
    {
        $processed_photo = null;
        while(is_null($processed_photo)) {
            if(empty($this->photos_by_album[$album_key]['photo'])) {
                // Only reach here when there are no more photos left to pick
                return array();
            }

            $photo_count = count($this->photos_by_album[$album_key]['photo']);
            $random_photo_key = array_rand($this->photos_by_album[$album_key]['photo']);
            $photo_to_draw = $this->photos_by_album[$album_key]['photo'][$random_photo_key];
            unset($this->photos_by_album[$album_key]['photo'][$random_photo_key]);

            $processed_photo = $this->preparePhotoInformation($photo_to_draw, $album_key);
        }
        return $processed_photo;
    }
    //}}}


    //{{{ preparePhotoInformation(array, string)
    /**
      * Produce array containing all data necessary for controller and view
      * @param  array    Result array for photo from Flickr API
      * @param  string   Album key from which photo was picked
      * @return array    Key-value array containing relevant metadata for photo
      *                  All possible return fields are initialized at top of function
      *                  If the photo is not valid for display, return null
      */
    protected function preparePhotoInformation($photo_from_flickr, $album_key)
    {
        // Init result fields
        $url_base = Registry_FlickrMariten::BASE_URL;
        $photo_data = array(
            'id'            => $photo_from_flickr['id'],
            'photo_url'     => $url_base . $photo_from_flickr['id'] . '/',
            'title'         => $photo_from_flickr['title'],
            'img_url'       => $photo_from_flickr['url_m'],
            'width'         => $photo_from_flickr['width_m'],
            'height'        => $photo_from_flickr['height_m'],
            'album_display' => $this->available_albums[$album_key]['display'],
            'album_url'     => $url_base . 'sets/' . $this->available_albums[$album_key]['id'] . '/',
            'geo_url'       => '',
            'tag_url'       => '',
            'prefecture'    => '',
        );

        // Only use 4x3 landscape photos
        if($photo_data['width']  != API_Flickr::LANDSCAPE_MED_WIDTH
        || $photo_data['height'] != API_Flickr::LANDSCAPE_MED_HEIGHT) {
            return null;
        }

        // Check if photo is geotagged
        if(isset($photo_from_flickr['geo_is_public'])
        && $photo_from_flickr['geo_is_public'] == 1) {
            $photo_data['geo_url'] = Registry_FlickrMariten::MAP_URL . $photo_data['id'];
        }

        // Prettify title
        $photo_data['title'] = Registry_FlickrMariten::removeTitlePrefix($photo_from_flickr['title']);

        // Determine which prefecture photo was taken in
        $all_tags = explode(' ', $photo_from_flickr['tags']);
        foreach($all_tags as $photo_tag) {
            if(Registry_FlickrMariten::isPrefectureTag($photo_tag)) {
                $photo_data['prefecture'] = Registry_FlickrMariten::getPrefectureDisplay($photo_tag);
                $photo_data['tag_url'] = $url_base . 'tags/' . urlencode($photo_tag) . '/';
                break;
            }
        }

        return $photo_data;
    }
    //}}}
}
