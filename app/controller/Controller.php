<?php
// Global Includes
require_once SMARTY_DIR . 'Smarty.class.php';

class Controller
{
    protected $req_params = array();
    protected $smarty = array();


    //{{{ init()
    public function init()
    {
        // Smarty setup
        $this->smarty = new Smarty();
        $this->smarty->template_dir =  JEFF_BASE_DIR . 'app/view/';
        $this->smarty->compile_dir =   JEFF_BASE_DIR . 'tmp/template_c/';
    }
    //}}}


    //{{{ checkParams(ParamManager)
    public function checkParams($param_manager)
    {
        $this->req_params = $param_manager;
        return array();
    }
    //}}}
}
