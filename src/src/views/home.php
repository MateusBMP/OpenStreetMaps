<?php

require_once(__DIR__.'\..\class\geocoding.php');

$search = ['57020-050'];
$geocoding = new Geocoding();
$geocoding->generate($search);

// GERAR URL
    // echo $geocoding->getUrl();

// REDIRECIONAR URL
    // header("Location: ".$geocoding->getUrl());
    // exit;

// IMPRIMIR COORDENADAS
    // print_r($geocoding->getCoordinates());

// SALVAR SAIDA
    // $geocoding->saveRequest();

echo "Finish";