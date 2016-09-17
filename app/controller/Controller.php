<?php
// Global Includes
require_once SMARTY_DIR . 'Smarty.class.php';
require_once JEFF_BASE_DIR . 'app/model/registry/NavbarLinks.php';
require_once JEFF_BASE_DIR . 'app/model/registry/PersonalWebLinks.php';

// Flickr Photo Selection Includes
require_once JEFF_BASE_DIR . 'app/model/extraction/AlbumPhotoPicker.php';

class Controller
{
    protected $request_params = array();
    protected $smarty = null;

    const FEATURE_PHOTOS_PER_ROW   = 3;


    //{{{ init(string)
    public function init($param_manager)
    {
        // Set params for this request
        $this->request_params = $param_manager;
        $url_path = $this->request_params->getParam('url_path', '');

        // Smarty setup
        $this->smarty = new Smarty();
        $this->smarty->template_dir   = JEFF_BASE_DIR . 'app/view/';
        $this->smarty->compile_dir    = JEFF_BASE_DIR . 'tmp/template_c/';

        // Record URL path for this request in template
        $this->smarty->assign('request_path', '/' . $url_path);

        // Assign data used by all pages
        $this->assignNavbarLinks();
        $this->assignPersonalWebLinks();
    }
    //}}}


    //{{{ loadParams()
    /**
      * Load and validate any necessary params
      *
      * @result array    List of error messages, empty array if no errors
      */
    public function loadParams()
    {
        // Parent function only returns empty array (no errors)
        // Sub-class in individual controllers for request-specific logic
        return array();
    }
    //}}}


    //{{{ assignNavbarLinks()
    protected function assignNavbarLinks()
    {
        $navbar_links = Registry_NavbarLinks::get();
        $this->smarty->assign('navbar_links', $navbar_links);
    }
    //}}}


    //{{{ assignPersonalWebLinks()
    protected function assignPersonalWebLinks()
    {
        $personal_web_links = Registry_PersonalWebLinks::get();
        $this->smarty->assign('personal_web_links', $personal_web_links);
    }
    //}}}


    //{{{ selectPhotosRandomlyFromAlbums(array)
    protected function selectPhotosRandomlyFromAlbums($target_albums)
    {
        $photo_picker = new Extraction_AlbumPhotoPicker();
        $api_success = $photo_picker->populatePhotosetLists($target_albums);
        if(!$api_success) {
            return array();
        }

        // Init ordered result array
        $ordered_sample_photos = array();
        foreach($target_albums as $album_key) {
            $ordered_sample_photos[$album_key] = array();
        }

        // Pick random photo out of each set in random order
        shuffle($target_albums);
        foreach($target_albums as $album_key) {
            $selected_photo = $photo_picker->drawPhotoFromAlbum($album_key);
            if(empty($selected_photo)) {
                // Query for this album key failed
                // Only show photos when all albums succeed, quit
                return array();
            } else {
                $ordered_sample_photos[$album_key] = $selected_photo;
            }
        }

        return $ordered_sample_photos;
    }
    //}}}


    //{{{ assignSamplePhotosInRows(array)
    protected function assignSamplePhotosInRows($sample_photos)
    {
        // Only show photos if all albums were successfully queried and selected
        $photo_count = count($sample_photos);
        $row_count = (int)floor($photo_count / self::FEATURE_PHOTOS_PER_ROW);

        // Group sample photos into rows
        $sample_photos_in_rows = array();
        $row = 1;
        $i = 1;
        foreach($sample_photos as $album_key => $selected_photo) {
            $sample_photos_in_rows[$row][$album_key] = $selected_photo;
            if($i >= self::FEATURE_PHOTOS_PER_ROW) {
                $i = 1;
                $row++;
                if($row > $row_count) {
                    // Do not continue displaying photos if beyond number of rows to display
                    break;
                }
            } else {
                $i++;
            }
        }

        // Store for template
        $this->smarty->assign('sample_photos', $sample_photos_in_rows);
    }
    //}}}
}
