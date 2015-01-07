<?php
// Global Includes
require_once SMARTY_DIR . 'Smarty.class.php';
require_once JEFF_BASE_DIR . 'app/model/NavbarLinks.php';
require_once JEFF_BASE_DIR . 'app/model/PersonalWebLinks.php';

class Controller
{
    protected $req_params = array();
    protected $smarty = null;


    //{{{ init(string)
    public function init($url_path)
    {
        // Smarty setup
        $this->smarty = new Smarty();
        $this->smarty->template_dir =  JEFF_BASE_DIR . 'app/view/';
        $this->smarty->compile_dir =   JEFF_BASE_DIR . 'tmp/template_c/';

        // Record URL path for this request in template
        $this->smarty->assign('request_path', '/' . $url_path);
    }
    //}}}


    //{{{ checkParams(ParamManager)
    public function checkParams($param_manager)
    {
        $this->req_params = $param_manager;
        return array();
    }
    //}}}


    //{{{ assignNavbarLinks()
    protected function assignNavbarLinks()
    {
        $navbar_links = NavbarLinks::getAsArray();
        $this->smarty->assign('navbar_links', $navbar_links);
    }
    //}}}


    //{{{ assignPersonalWebLinks()
    protected function assignPersonalWebLinks()
    {
        $personal_web_links = PersonalWebLinks::getAsArray();
        $this->smarty->assign('personal_web_links', $personal_web_links);
    }
    //}}}
}
