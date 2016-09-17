<?php
require_once JEFF_BASE_DIR . 'app/model/registry/FlickrMariten.php';

class Page_Photography_Samples extends Controller
{
    // Constants
    const SAMPLE_SIZE = 6;

    // Request Params
    protected $album_name = null;


    public function loadParams()
    {
        $this->album_name = $this->request_params->getParam('album_name', null);
        if(is_null($this->album_name)) {
            // If invalid album name requested, re-direct to photography main page
            $this->doRedirect('/photography');
        }
    }


    public function perform()
    {
        $sample_photos = $this->selectPhotosRandomlyFromAlbums(array($this->album_name), self::SAMPLE_SIZE);
        if(!empty($sample_photos)) {
            // Include album metadata for display
            $album_registry = Registry_FlickrMariten::getAlbums();
            $this->smarty->assign('album_title', $album_registry[$this->album_name]['display']);
            $this->smarty->assign('album_description', $album_registry[$this->album_name]['desc']);
            $this->assignSamplePhotosInRows($sample_photos);
        }

        $this->smarty->display('page/photography/Samples.tpl');
    }
}
