<?php

$client = new \GuzzleHttp\Client();

$request = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');

$html = $request->getBody();

