<?php
class Page_Translation extends Controller
{
    public function perform()
    {
        $this->assignNavbarLinks();
        $this->assignPersonalWebLinks();
        $this->smarty->display('page/translation.tpl');
    }
}
