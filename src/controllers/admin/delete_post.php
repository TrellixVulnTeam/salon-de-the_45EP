<?php

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

// Création d'un objet PostModel
$requestModel = new \App\Models\RequestModel();
$requestModel->deleteRequest($id_request);

// Ajout d'un message flash
addFlashMessage('requête supprimée.');

// Redirection vers le dashboard admin
header('Location: ' . buildUrl('/admin'));
exit;