<?php
class Page_Async_Top extends Controller
{
    public function perform()
    {
        // Flickr photoset pictures for display
        $display_albums = array(
            'olden_japan',
            'modern_japan',
            'natural_japan',
        );

        $sample_photos = $this->selectPhotosRandomlyFromAlbums($display_albums);
        if(!empty($sample_photos)) {
            $this->assignSamplePhotosInRows($sample_photos);
        }

        $this->smarty->display('page/async/top.tpl');
    }
}
