<?php
class Async_Photography_Samples extends Controller
{
    // Constants
    const SAMPLE_SIZE = 6;

    // Request Params
    protected $album_name = null;


    public function loadParams()
    {
        $this->album_name = $this->request_params->getParam('album_name', null);
    }


    public function perform()
    {
        $sample_photos = $this->selectPhotosRandomlyFromAlbums(array($this->album_name), self::SAMPLE_SIZE);
        if(!empty($sample_photos)) {
            $this->assignSamplePhotosInRows($sample_photos);
        }

        $this->smarty->display('async/photography/Samples.tpl');
    }
}
