<?php
class Page_Top extends Controller
{
    public function perform()
    {
        $this->assignNavbarLinks();
        $this->assignPersonalWebLinks();
        $this->smarty->display('page/top.tpl');
    }
}
