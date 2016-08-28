<?php
class Page_Top extends Controller
{
    public function perform()
    {
        $this->smarty->display('page/top.tpl');
    }
}
