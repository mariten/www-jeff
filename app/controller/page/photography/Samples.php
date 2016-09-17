<?php
require_once JEFF_BASE_DIR . 'app/model/registry/FlickrMariten.php';

class Page_Photography_Samples extends Controller
{
    const SAMPLE_SIZE = 6;


    public function perform()
    {
        // Get name of requetsed album name
        $requested_album = $this->request_params->getParam('album_name');
        if(is_null($requested_album)) {
            // If invalid album name requested, re-direct to photography main page
            $this->doRedirect('/photography');
        }

        // Select photos and assign to template
        $sample_photos = $this->selectPhotosRandomlyFromAlbums(array($requested_album), self::SAMPLE_SIZE);
        if(!empty($sample_photos)) {
            $album_registry = Registry_FlickrMariten::getAlbums();
            $this->smarty->assign('album_title', $album_registry[$requested_album]['display']);
            $this->smarty->assign('album_description', $album_registry[$requested_album]['desc']);
            $this->assignSamplePhotosInRows($sample_photos);
        }

        $this->smarty->display('page/photography/Samples.tpl');
    }
}
