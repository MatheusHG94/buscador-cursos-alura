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

use GuzzleHttp\Client;

$client = new Client();
$response = $client->request('GET', 'https://cursos.alura.com.br/category/front-end/reactjs');
$html = $response->getBody();
