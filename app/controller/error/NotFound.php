<?php
class Error_NotFound extends Controller
{
    public function perform()
    {
        $this->httpNotFound();
    }
}
