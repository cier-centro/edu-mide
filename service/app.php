<?php
require_once 'Reader.php';
require_once 'BaseMide.php';
require_once 'BaseMideMerge.php';

$fileName = "base-mide.json";
$reader = new Reader();
$baseMide = new BaseMide();
$baseMideMerge = new BaseMideMerge();

$reader->read("Resources/", "base-mide.xlsx");
$baseMide->setReader($reader);
$baseMideMerge->setReader($reader);
$baseMideMerge->setBaseMide($baseMide);

$dataArray = array();

$dataArray = $baseMideMerge->getArrayAllUniversitiesToBuildJson();

$file = fopen('Resources/'.$fileName.'', "w") or die("Problemas para generar el archivo Json - ( Resources/".$fileName." )");
fwrite($file, json_encode($dataArray,JSON_PRETTY_PRINT));
echo "El archivo ($fileName) se genero correctamente";