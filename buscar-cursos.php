<?php

require 'vendor/autoload.php';

use VNCHub\BuscadorDeCursos\Service\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.alura.com.br']);
$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);

$url = '/cursos-online-programacao/php';
$courses = $buscador->buscarCursos($url);

foreach ($courses as $course) {
    echo $course . PHP_EOL;
}
