<?php
require_once JEFF_BASE_DIR . 'app/model/Extraction/AlbumPhotoPicker.php';
require_once JEFF_BASE_DIR . 'app/model/Registry/FlickrMariten.php';

class Page_Top extends Controller
{
    public function perform()
    {
        // Flickr photoset pictures for display
        $ordered_sample_photos = array(
            'olden_japan'        => array(),
            'modern_japan'       => array(),
            'natural_japan'      => array(),
        );
        $target_albums = array_keys($ordered_sample_photos);

        $photo_picker = new Extraction_AlbumPhotoPicker();
        $api_success = $photo_picker->populatePhotosetLists($target_albums);

        // Pick random photo out of each set in random order
        shuffle($target_albums);
        $all_albums_present = true;
        $sample_photos = array();
        foreach($target_albums as $album_key) {
            $selected_photo = $photo_picker->drawPhotoFromAlbum($album_key);
            if(empty($selected_photo)) {
                // Query for this album key failed
                $all_albums_present = false;
                break;
            } else {
                $ordered_sample_photos[$album_key] = $selected_photo;
            }
        }

        if($api_success && $all_albums_present) {
            $this->assignSamplePhotosInRows($ordered_sample_photos);
        }

        $this->smarty->display('page/top.tpl');
    }
}
