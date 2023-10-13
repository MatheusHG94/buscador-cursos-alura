<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {
        $response = $this->httpClient->request('GET', $url);
        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);
        $cursosHtml = $this->crawler->filter('span.card-curso__nome');

        $cursos = [];
        
        foreach ($cursosHtml as $cursoHtml) {
            $curso = $cursoHtml->textContent;
            array_push($cursos, $curso);

            // alternativa:
            // $cursos[] = $cursoHtml->textContent;
        }

        return $cursos;
    }
}
