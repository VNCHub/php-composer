<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();

$request = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');

$html = $request->getBody();

$crawler = new Crawler();

$crawler->addHtmlContent($html);

$courses = $crawler->filter('span.card-curso__nome');

foreach ($courses as $course) {
    echo $course->textContent . PHP_EOL;
}