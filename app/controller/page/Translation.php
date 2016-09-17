<?php
class Page_Translation extends Controller
{
    public function perform()
    {
        $this->smarty->display('page/Translation.tpl');
    }
}
