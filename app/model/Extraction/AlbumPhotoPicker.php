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
        foreach($target_photosets as $photoset_key) {
            if(isset($this->available_albums[$photoset_key])) {
                $photosets_to_fetch[$photoset_key] = $this->available_albums[$photoset_key]['id'];
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
      * @param  string   Album from which to pick a random photo from
      * @return array    Key-value array containing all relevant metadata for the picked photo
      */
    public function drawPhotoFromAlbum($photoset_key)
    {
        if(empty($this->photos_by_album[$photoset_key]['photo'])) {
            // Only reach here when there are no more photos left to pick
            return array();
        }

        $photo_count = count($this->photos_by_album[$photoset_key]['photo']);
        $random_photo_key = array_rand($this->photos_by_album[$photoset_key]['photo']);
        $photo_to_draw = $this->photos_by_album[$photoset_key]['photo'][$random_photo_key];
        unset($this->photos_by_album[$photoset_key]['photo'][$random_photo_key]);

        return $this->preparePhotoInformation($photo_to_draw, $photoset_key);
    }
    //}}}
}
