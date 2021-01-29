<?php
require '../vendor/autoload.php';
require '../config.php';
require SERVICES_DIR . '/functions.php';


ini_set('display_errors', 1);

// Détection de la route
$route = '/'; // Par défaut on sera sur la page d'accueil 
if (array_key_exists('route', $_GET)) {
    $route = $_GET['route']; // Sinon on récupère présente dans l'URL
}

if ($route != "/") {
    $route = rtrim($route, "/");
};
// dump($route);

// Routing 
switch ($route) {

        // Page d'accueil
    case '/':
        require CONTROLLERS_DIR . '/home.php';
        break;

        // Page Article
    case '/contact':
        require CONTROLLERS_DIR . '/contact.php';
        break;

        //ajax
    case '/ajax/contact':
        require CONTROLLERS_DIR . '/ajax/contact.php';
        break;

    case '/ajax/tea':
        require CONTROLLERS_DIR . '/ajax/reservation.php';
        break;

        // jeu
    case '/jeu':
        require CONTROLLERS_DIR . '/jeu.php';
        break;

        // actu
    case '/actu':
        require CONTROLLERS_DIR . '/actu.php';
        break;
        // Ajout d'un commentaire
    case '/the':
        require CONTROLLERS_DIR . '/the.php';
        break;

        // Connexion à l'interface d'administration
    case '/admin/login':
        require CONTROLLERS_DIR . '/login.php';
        break;

        // Interface d'administration
    case '/admin':
        require CONTROLLERS_DIR . '/admin/admin.php';
        break;

        // Rédaction d'article
    case '/admin/tea/new':
        require CONTROLLERS_DIR . '/admin/add_tea.php';
        break;

        // Rédaction d'article
    case '/admin/post/new':
        require CONTROLLERS_DIR . '/admin/add_news.php';
        break;

        // test enregistrement image
    case '/admin/img/new':
        require CONTROLLERS_DIR . '/admin/add_img_test.php';
        break;


        // test enregistrement image
    case '/pb':
        require CONTROLLERS_DIR . '/admin/pb.php';
        break;


        // test enregistrement jeux
    case '/admin/game/new':
        require CONTROLLERS_DIR . '/admin/add_game.php';
        break;

        // Suppression d'un article
    case '/admin/game/delete':
        require CONTROLLERS_DIR . '/admin/delete_game.php';
        break;


        // Edition d'article
    case '/admin/post/edit':
        require CONTROLLERS_DIR . '/admin/edit_news.php';
        break;

        // Suppression d'un article
    case '/admin/post/delete':
        require CONTROLLERS_DIR . '/admin/delete_news.php';
        break;

        // Suppression d'un the
    case '/admin/tea/delete':
        require CONTROLLERS_DIR . '/admin/delete_tea.php';
        break;

        // Déconnexion
    case '/admin/logout':
        require CONTROLLERS_DIR . '/admin/logout.php';
        break;
}
