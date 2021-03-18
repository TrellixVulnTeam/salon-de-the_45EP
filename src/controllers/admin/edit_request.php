<?php
use App\Models\SubjectModel;
// Si l'utilisateur n'est pas connecté
if (!isAuthenticated()) {
    header('Location: ' . buildUrl('/admin/login'));
    exit;
}

if(!array_key_exists('id_request', $_GET) || empty($_GET['id_request']) || !ctype_digit($_GET['id_request'])){

    echo "Attention : pas de paramètre 'id_request' dans l'URL !";
    exit;
}

// récupérer le paramètre id_request dans la chaîne de requête (URL)
$id_request = $_GET['id_request'];


$postModel = new \App\Models\RequestModel();

// Si le formulaire est soumis 
if (!empty($_POST)) {

    $title = $_POST['title'];


    // Insertion de l'article en BDD
    $postModel->updateRequest($title, $id_request);
    
    // Ajout d'un message flash
    addFlashMessage('requête correctement mis à jour.');

    // Redirection vers le dashboard admin
    header('Location: ' . buildUrl('/admin'));
    exit;
}

// Récupération de l'article
$request = $requestModel->getOneRequest($postId);




// Récupération des articles
$postModel = new StatusModel();
$status = $postModel->getAllStatus();


// Affichage du template
render('admin/edit_request', [
    'status' => $status,
    'request' => $request
]);