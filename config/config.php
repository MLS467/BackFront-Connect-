<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
header("Content-type: text/html; charset=utf-8");

define('SERVER', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('BANCO', 'projetointegrado');
define('TITULO', 'AtendeBem');

define('URL_DESENVOLVIMENTO', 'http://localhost/PROJETO_INTEGRADO_FRONT_E_BACK');

define('URL_BASE', 'PROJETO_INTEGRADO_FRONT_E_BACK/');