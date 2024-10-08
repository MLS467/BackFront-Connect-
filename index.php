<?php
require_once "vendor/autoload.php";

use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;
use sistema\nucleo\Helpers;
use sistema\nucleo\Mensagem;


SimpleRouter::setDefaultNamespace('sistema\rotas');

try {
    // ADM
    SimpleRouter::get(URL_BASE . 'dashboard', 'SiteRotas@dashboard');
    SimpleRouter::get(URL_BASE . 'listar_funcionario', 'SiteRotas@listar_funcionario');
    SimpleRouter::get(URL_BASE . 'cadastrar_funcionario', 'SiteRotas@cadastrarFuncionario');
    SimpleRouter::get(URL_BASE . "editar_funcionario/{id}/{cargo}", "SiteRotas@editar_funcionario");

    // ATENDENTE
    SimpleRouter::get(URL_BASE . 'consultar_dados', 'SiteRotas@consultar_dados');
    SimpleRouter::get(URL_BASE . 'cadastro_paciente', 'SiteRotas@cadastrarPaciente');


    //ENFERMEIRO
    SimpleRouter::get(URL_BASE . 'visualizar_registro', 'SiteRotas@visualizarRegistro');
    SimpleRouter::get(URL_BASE . 'triagem', 'SiteRotas@triagem');

    // Médico
    SimpleRouter::get(URL_BASE . 'visualizar', 'SiteRotas@visualizar');
    SimpleRouter::get(URL_BASE . 'consulta', 'SiteRotas@consulta');
    SimpleRouter::get(URL_BASE . 'consulta_realizada', 'SiteRotas@consultaRealizada');

    // Home
    SimpleRouter::get(URL_BASE, 'SiteRotas@home');
    SimpleRouter::get(URL_BASE . 'login', 'SiteRotas@login');

    //Erro
    SimpleRouter::get(URL_BASE . '404', 'SiteRotas@notFound');


    SimpleRouter::start();
} catch (\Pecee\SimpleRouter\Exceptions\NotFoundHttpException $th) {

    if (Helpers::getServer() == URL_DESENVOLVIMENTO) {
        echo (new Mensagem())->msg($th->getMessage())->erro()->renderizar();
    } else {
        header("Location:404");
    }
}