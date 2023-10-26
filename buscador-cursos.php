<?php

/* 
    COMPOSER
    Gerenciador de pacotes

    PACKAGIST
    Respositório de pacotes públicos do Composer

    AUTOLOAD
    O autoload no composer.json pode receber entradas psr-4, classmap e files

    COMANDOS
    >composer init
    comando para criar o arquivo composer.json

    >composer require "vendor/package"
    comando para instalar o pacote x

    >composer require --dev "vendor/package"
    comando para instalar o pacote x para ambiente de desenvolvimento

    >composer install
    comando para instalar os pacotes listados no composer.lock, nas exatas versões definidas

    >composer install --no-dev
    comando para instalar as dependências de produção, não as de desenvolvimento

    >composer update
    comando para instalar e atualizar os pacotes listados no composer.json, nas versões declaradas ou mais atuais

    >composer dumpautoload
    comando para atualizar o autoload

    >composer list
    lista de comandos do composer

    PACOTES DE FERRAMENTAS
    PHPUnit
    pacote para testes

    PHPCS - PHP Code Sniffer
    pacote para verificar se o código está de acordo com padrões, e.g. PSR12

    Phan
    pacote para verificar erros nos código

    VENDOR/BIN
    o composer joga arquivos executáveis na cli para dentro da pasta vendor/bin
*/

require_once 'vendor/autoload.php';

use Matheushg94\BuscadorCursosAlura\Buscador;
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
