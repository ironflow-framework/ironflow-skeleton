<?php

define('IRONFLOW_START', microtime(true));

// Chargement de l'autoloader de Composer
require __DIR__ . '/../vendor/autoload.php';

// Chargement des variables d'environnement
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

// Initialisation du noyau de l'application
$app = new \IronFlow\Kernel\Application(
   realpath(__DIR__ . '/..')
);

// Chargement des services de base
$app->bootstrap();

// Traitement de la requête
$response = $app->handle(
   \IronFlow\Http\Request::capture()
);

// Envoi de la réponse
$response->send();

// Terminaison de l'application
$app->terminate();
