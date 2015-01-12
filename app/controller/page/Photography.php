<?php
class Page_Photography extends Controller
{
    public function perform()
    {
        $this->assignNavbarLinks();
        $this->assignPersonalWebLinks();
        $this->smarty->display('page/photography.tpl');
    }
}
