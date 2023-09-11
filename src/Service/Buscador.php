<?php

namespace VNCHub\BuscadorDeCursos\Service;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private ClientInterface $httpClient;
    private Crawler $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscarCursos(string $url): array
    {
        $request = $this->httpClient->request('GET', $url);
        $html = $request->getBody();
        $this->crawler->addHtmlContent($html);
        $resources = $this->crawler->filter('span.card-curso__nome');
        $courses = array();

        foreach ($resources as $resource) {
            array_push($courses, $resource->textContent);
        }

        return $courses;
    }
}
