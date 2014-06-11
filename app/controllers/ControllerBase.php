<?php

use Phalcon\Mvc\Controller,
    Phalcon\Assets as assets;

class ControllerBase extends Controller
{
    public function initialize() {
        $this->view->title = "";

        $this->assets
            ->addCss("css/bootstrap.min.css")
            ->addCss("css/main.css")
            ->addCss("css/animate.css");

        $this->assets
            ->addJs("https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", false)
            ->addJs("js/main.js")
            ->addJs("js/bootstrap.min.js");

        $this->view->loggedIn = false;
        if ($this->auth->getUser()) {
            $this->view->loggedIn = true;
        }
    }

    /**
     * Appends a specific description to the page title
     * @param $title
     * @return string full title
     */
    public function setPageTitle($title) {
        $this->view->title = " - ".$title;
        return $this->view->title;
    }
}