<?php
class Page_Photography_Samples extends Controller
{
    const SAMPLE_SIZE = 6;


    public function perform()
    {
        $requested_album = $this->request_params->getParam('album_name');
        $sample_photos = $this->selectPhotosRandomlyFromAlbums(array($requested_album), self::SAMPLE_SIZE);
        if(!empty($sample_photos)) {
            $this->assignSamplePhotosInRows($sample_photos);
        }

        $this->smarty->display('page/photography/Samples.tpl');
    }
}
