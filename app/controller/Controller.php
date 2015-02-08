<?php
// Global Includes
require_once SMARTY_DIR . 'Smarty.class.php';
require_once JEFF_BASE_DIR . 'app/model/Registry/NavbarLinks.php';
require_once JEFF_BASE_DIR . 'app/model/Registry/PersonalWebLinks.php';

class Controller
{
    protected $request_params = array();
    protected $smarty = null;

    const FEATURE_PHOTOS_PER_ROW   = 3;


    //{{{ init(string)
    public function init($url_path)
    {
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


    //{{{ checkParams(ParamManager)
    /**
      * Assign and validate any necessary params
      *
      * @param  object   ParamManager object for the current request
      * @result array    List of error messages, empty array if no errors
      */
    public function checkParams($param_manager)
    {
        $this->request_params = $param_manager;
        return array();
    }
    //}}}


    //{{{ assignNavbarLinks()
    protected function assignNavbarLinks()
    {
        $navbar_links = Registry_NavbarLinks::getAsArray();
        $this->smarty->assign('navbar_links', $navbar_links);
    }
    //}}}


    //{{{ assignPersonalWebLinks()
    protected function assignPersonalWebLinks()
    {
        $personal_web_links = Registry_PersonalWebLinks::getAsArray();
        $this->smarty->assign('personal_web_links', $personal_web_links);
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
