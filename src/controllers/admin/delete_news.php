<?php

// Si l'utilisateur n'est pas connecté
if (!isAuthenticated()) {
    header('Location: ' . buildUrl('/admin/login'));
    exit;
}

if(!array_key_exists('newsid', $_GET) || empty($_GET['newsid']) || !ctype_digit($_GET['newsid'])){

    echo "Attention : pas de paramètre 'postid' dans l'URL !";
    exit;
}

// récupérer le paramètre postid dans la chaîne de requête (URL)
$postId = $_GET['newsid'];

// Création d'un objet PostModel
$postModel = new \App\Models\NewsModel();
$postModel->deleteNews($postId);

// Ajout d'un message flash
addFlashMessage('Article supprimé.');
echo $postId;
// Redirection vers le dashboard admin
header('Location: ' . buildUrl('/admin'));
exit;