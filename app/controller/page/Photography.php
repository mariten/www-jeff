<?php
require_once JEFF_BASE_DIR . 'app/model/Extraction/AlbumPhotoPicker.php';
require_once JEFF_BASE_DIR . 'app/model/Registry/FlickrMariten.php';

class Page_Photography extends Controller
{
    public function perform()
    {
        // Flickr photoset pictures for display
        $target_albums = array(
            'olden_japan',
            'modern_japan',
            'natural_japan',
            'japan_at_night',
            'food_in_japan',
            'animals_in_japan',
        );

        $photo_picker = new Extraction_AlbumPhotoPicker();
        $photo_picker->populatePhotosetLists($target_albums);

        // Pick random photo out of each set
        $all_albums_present = true;
        $sample_photos = array();
        foreach($target_albums as $album_key) {
            $selected_photo = $photo_picker->drawPhotoFromAlbum($album_key);
            if(empty($selected_photo)) {
                // Query for this album key failed
                $all_albums_present = false;
                break;
            } else {
                $sample_photos[$album_key] = $selected_photo;
            }
        }

        if($all_albums_present) {
            $this->assignSamplePhotosInRows($sample_photos);
        }

        $this->smarty->display('page/photography.tpl');
    }
}
