<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Silex\Application;
use Silex\Provider\TwigServiceProvider;



$app = new Application();

//registrando o twig
$app->register(
    new TwigServiceProvider(),
    array("twig.path" => __DIR__ . "/../templates",
    ));

//restrando o Doctrine DBAL
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
        'db.options' => array(
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/../data/app.db',
    ),
));

$app["debug"] = true;