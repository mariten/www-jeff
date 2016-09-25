<?php
require_once JEFF_BASE_DIR . 'app/model/registry/FlickrMariten.php';

class Page_Photography_Samples extends Controller
{
    // Request Params
    protected $album_name = null;


    public function loadParams()
    {
        $this->album_name = $this->request_params->getParam('album_name', null);
        if(is_null($this->album_name)) {
            // If invalid album name requested, re-direct to photography main page
            $this->doRedirect('/photography');
        }

        parent::loadParams();
    }


    public function perform()
    {
        // Include album metadata for display
        $album_registry = Registry_FlickrMariten::getAlbums();
        $this->smarty->assign('album_title', $album_registry[$this->album_name]['display']);
        $this->smarty->assign('album_description', $album_registry[$this->album_name]['desc']);
        $this->smarty->assign('album_url', Registry_FlickrMariten::BASE_URL . 'sets/' . $album_registry[$this->album_name]['id']);
        $this->smarty->display('page/photography/Samples.tpl');
    }
}
