<?php
require_once __DIR__."/bootstrap.php";

/**
 * Rotas  gerais para a aplicação
 */
$app->get("/","App\Controller\IndexController::indexAction")->bind("home-index");

/**
 * Rotas para os gerenciamento  e processamento de repositórios
 */
$app->get("/repositories","App\Controller\RepositoriesController::indexAction")->bind("repo-index");

$app->get("/repositories/add","App\Controller\RepositoriesController::addAction")->bind("repo-add");
$app->post("/repositories/add","App\Controller\RepositoriesController::addAction")->bind("repo-add-post");

$app->get("/repositories/list","App\Controller\RepositoriesController::listAction")->bind("repo-list");
$app->get("/repositories/del","App\Controller\RepositoriesController::delAction")->bind("repo-del");
$app->get("/repositories/startProcess","App\Controller\RepositoriesController::startProcessAction")->bind("repo-start");
$app->get("/repositories/stopProcess","App\Controller\RepositoriesController::stopProcessAction")->bind("repo-stop");
$app->get("/repositories/statusProcess","App\Controller\RepositoriesController::statusProcessAction")->bind("repo-status");
