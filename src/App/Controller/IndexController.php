<?php

namespace App\Controller;

use Silex\Application;

class IndexController{

    public function indexAction(Application $app)
    {
        $viewContent[] = "StartIndexAction";
        $tabActive = "home";
        return  $app["twig"]->render("home.twig", array("tabActive" => $tabActive, "viewContent" => $viewContent));
    }
}