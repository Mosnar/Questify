<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        self::checkCompanyLogin();
    }

    public function route404Action() {

    }

}
