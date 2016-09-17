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


    //{{{ doRedirect(string)
    protected function doRedirect($redirect_url, $is_internal_redirect = true)
    {
        header('HTTP/1.1 301 Moved Permanently');
        if($is_internal_redirect) {
            header('Location: ' . JEFF_DOMAIN_CANONICAL . $redirect_url);
        } else {
            header('Location: ' . $redirect_url);
        }
    }
    //}}}


    //{{{ selectPhotosRandomlyFromAlbums(array, int)
    protected function selectPhotosRandomlyFromAlbums($target_albums, $photos_per_album = 1)
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
            for($i = 0; $i < $photos_per_album; $i++) {
                $selected_photo = $photo_picker->drawPhotoFromAlbum($album_key);
                if(empty($selected_photo)) {
                    // Query for this album key failed
                    // Only show photos when all albums succeed, quit
                    return array();
                } else {
                    $ordered_sample_photos[$album_key][] = $selected_photo;
                }
            }
        }

        return $ordered_sample_photos;
    }
    //}}}


    //{{{ assignSamplePhotosInRows(array)
    protected function assignSamplePhotosInRows($sample_photos)
    {
        // Only show photos if all albums were successfully queried and selected
        $photo_count = 0;
        foreach($sample_photos as $photos_from_album) {
            $photo_count += count($photos_from_album);
        }

        // Group sample photos into rows
        $row_count = (int)floor($photo_count / self::FEATURE_PHOTOS_PER_ROW);
        $x = 1;
        $y = 1;
        $sample_photos_in_rows = array();
        foreach($sample_photos as $album_key => $photos_from_album) {
            foreach($photos_from_album as $selected_photo) {
                if(!isset($sample_photos_in_rows[$x])) {
                    $sample_photos_in_rows[$x] = array();
                }

                if(isset($sample_photos_in_rows[$x])) {
                    // Append to row
                    $sample_photos_in_rows[$x][] = $selected_photo;
                } else {
                    // Start new row
                    $sample_photos_in_rows[$x] = array($selected_photo);
                }

                // Monitor current row/column (x/y) position
                if($y >= self::FEATURE_PHOTOS_PER_ROW) {
                    $y = 1;
                    $x++;
                    if($x > $row_count) {
                        // Do not continue displaying photos if beyond number of rows to display
                        break;
                    }
                } else {
                    $y++;
                }
            }
        }

        // Store for template
        $this->smarty->assign('sample_photos', $sample_photos_in_rows);
    }
    //}}}
}
