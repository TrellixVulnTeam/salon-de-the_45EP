<?php

// Si l'utilisateur n'est pas connecté
if (!isAuthenticated()) {
    header('Location: ' . buildUrl('/admin/login'));
    exit;
}

if(!array_key_exists('teaid', $_GET) || empty($_GET['teaid']) || !ctype_digit($_GET['teaid'])){

    echo "Attention : pas de paramètre 'postid' dans l'URL !";
    exit;
}

// récupérer le paramètre postid dans la chaîne de requête (URL)
$postId = $_GET['teaid'];

// Création d'un objet PostModel
$postModel = new \App\Models\TeaModel();
$postModel->deleteTea($postId);

// Ajout d'un message flash
addFlashMessage('Article supprimé.');
echo $postId;
// Redirection vers le dashboard admin
header('Location: ' . buildUrl('/admin'));
exit;