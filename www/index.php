<?php 

////////////////////////////////////////
// Inclusion des dépendances si besoin /
////////////////////////////////////////

// Inclusion du fichier d'autoload de Composer
require '../vendor/autoload.php';
require '../config.php';
require SERVICES_DIR . '/functions.php';


error_reporting(E_ALL);
ini_set("display_errors", 1);
// Détection de la route
$route = '/'; // Par défaut on sera sur la page d'accueil 
if (array_key_exists('route', $_GET)) {
    $route = $_GET['route']; // Sinon on récupère présente dans l'URL
}

// Routing 
switch ($route) {

    // Page d'accueil
    case '/':
        require CONTROLLERS_DIR . '/home.php';
        break;


    // Connexion à l'interface d'administration
    case '/admin/login':
        require CONTROLLERS_DIR . '/login.php';        
        break;    

    // Interface d'administration
    case '/admin':
        require CONTROLLERS_DIR . '/admin/admin.php';        
        break; 


    // Edition d'article
    case '/admin/request/edit':
        require CONTROLLERS_DIR . '/admin/edit_request.php';        
        break;

    // Suppression d'un article
    case '/admin/request/delete':
        require CONTROLLERS_DIR . '/admin/delete_request.php';        
        break;
        
    // Déconnexion
    case '/admin/logout':
        require CONTROLLERS_DIR . '/admin/logout.php';  
        break;

    // Contact
    case '/add_request':
        require CONTROLLERS_DIR . '/add_request.php';  
        break;

}


