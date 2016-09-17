<?php
class Page_Photography extends Controller
{
    public function perform()
    {
        // Flickr photoset pictures for display
        $display_albums = array(
            'olden_japan',
            'modern_japan',
            'natural_japan',
            'japan_at_night',
            'food_in_japan',
            'animals_in_japan',
        );

        $sample_photos = $this->selectPhotosRandomlyFromAlbums($display_albums);
        if(!empty($sample_photos)) {
            $this->assignSamplePhotosInRows($sample_photos);
        }

        $this->smarty->display('page/Photography.tpl');
    }
}
