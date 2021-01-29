<?php

// Définition de constantes de configuration
/*
define('BDD_HOST', '');
define('BDD_NAME', '');
define('BDD_USER', '');
define('BDD_PASSWORD', '');
*/


define('ROOT_DIR', __DIR__);
define('PUBLIC_DIR', ROOT_DIR . '/www');
define('TEAPICTURE_DIR', ROOT_DIR . '/www/img/the');
define('VIEWS_DIR', ROOT_DIR . '/views');
define('MODELS_DIR', ROOT_DIR . '/src/Models');
define('SERVICES_DIR', ROOT_DIR . '/src/services');
define('CONTROLLERS_DIR', ROOT_DIR . '/src/controllers');
define('CORE_DIR', ROOT_DIR . '/src/Core');
define('CSS_DIR', ROOT_DIR . '/www/css');

// Si on passe par le localhost, il faut ajouter tout le chemin dans les URLs
if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {


    define('BASE_URL', '/mellie/www');
} else if ($_SERVER['HTTP_HOST'] === 'nomdedomaine.com') {
    define('BASE_URL', '/mellie/www');
}

// Si on est sur le virtual host on ne doit pas mettre le chemin
else {
    define('BASE_URL', '');
}
