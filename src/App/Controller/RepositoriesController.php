<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;


use Silex\Application;

class RepositoriesController
{
    public function indexAction(Application $app)
    {
        $viewContent[] = "StartIndexAction";
        $tabActive = "repositories";
        return $app["twig"]->render("repositories.index.twig", array("tabActive" => $tabActive, "viewContent" => $viewContent));
    }

    public function addAction(Application $app, Request $resquest)
    {
        $viewContent[] = "StartAction...";

        if ($resquest->getMethod() == "POST") {

            //obtem os dados do Form....
            $repositorio = $resquest->request->get("repositorie");

            $sql = "INSERT INTO `repositories`(`id`,`url`,`status`,`info`,`qtdCommits`,`qtdFilesJava`) VALUES (NULL,'{$repositorio}','stop','Aguardando Clone',NULL,NULL);";
            $query = $app["db"]->prepare($sql);
            if ($query->execute()) {
                $viewContent[] = "Repositório registrado com sucesso";
            }


            //criando uma pasta para o clone
            $gitfiles = __DIR__ . "/../../../gitfiles";
            $repositorioFolder = $repositorio;

            $repositorioFolder = str_replace("http://", "", $repositorioFolder);
            $repositorioFolder = str_replace("https://", "", $repositorioFolder);
            $repositorioFolder = str_replace("/", "_", $repositorioFolder);

            $pasta = $gitfiles . "/" . $repositorioFolder . "/";

            //@TODO Verificar e refatorar observando questões de segurança!

            if (!file_exists($pasta)) {
                if (mkdir($pasta)) {
                    $viewContent[] = "Pasta criada...";
                }
            } else {
                $viewContent[] = "Pasta já existia... não foi tocada...";
            }
            if (chmod($pasta, 0777)) {
                $viewContent[] = "Permissão 0777 para a pasta...";
            }


            $process = new Process("find /var/www/. -name '*.php'");

            $process->start();

            while ($process->isRunning()) {
                // waiting for process to finish
            }

            echo $process->getOutput();


            $viewContent[] = $repositorio;
        }

        $viewContent[] = "...EndAction";
        $tabActive = "repositories";
        return $app["twig"]->render("repositories.add.twig", array(
            "tabActive" => $tabActive,
            "viewContent" => $viewContent,
        ));
    }

    public function listAction(Application $app)
    {
        return "listAction";
    }

    public function delAction(Application $app)
    {
        return "delAction";
    }

    public function startProcessAction(Application $app)
    {
        return "startProcessAction";
    }

    public function stopProcessAction(Application $app)
    {
        return "stopProcessAction";
    }

    public function statusProcessAction(Application $app)
    {
        return "statusProcessAction";
    }
}