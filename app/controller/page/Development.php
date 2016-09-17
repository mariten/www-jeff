<?php
class Page_Development extends Controller
{
    public function perform()
    {
        $this->smarty->display('page/Development.tpl');
    }
}
