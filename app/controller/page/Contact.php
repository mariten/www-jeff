<?php
class Page_Contact extends Controller
{
    public function perform()
    {
        $this->smarty->display('page/Contact.tpl');
    }
}
