<?php

/* 
    COMPOSER
    Gerenciador de pacotes

    PACKAGIST
    Respositório de pacotes públicos do Composer

    >composer init
    comando para criar o arquivo composer.json

    >composer require "vendor/package"
    comando para instalar o pacote x

    >composer install
    comando para instalar os pacotes listados no composer.lock

    >composer update
    comando para instalar e atualizar os pacotes listados no composer.json
*/

require_once 'vendor/autoload.php';
require_once 'src/Buscador.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client([
    'base_uri' => 'https://www.alura.com.br/',
    'verify' => false
]);

$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-front-end/reactjs');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}
