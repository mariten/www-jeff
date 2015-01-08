<?php
class Page_Development extends Controller
{
    public function perform()
    {
        $this->assignNavbarLinks();
        $this->assignPersonalWebLinks();
        $this->smarty->display('page/development.tpl');
    }
}
