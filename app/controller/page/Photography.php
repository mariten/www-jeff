<?php
class Page_Photography extends Controller
{
    public function perform()
    {
        $this->smarty->display('page/photography.tpl');
    }
}
