<?php

// Si l'utilisateur n'est pas connecté
if (!isAuthenticated()) {
    header('Location: ' . buildUrl('/admin/login'));
    exit;
}

if(!array_key_exists('id', $_GET) || empty($_GET['id']) || !ctype_digit($_GET['id'])){

    echo "Attention : pas de paramètre 'postid' dans l'URL !";
    exit;
}

// récupérer le paramètre postid dans la chaîne de requête (URL)
$postId = $_GET['id'];

// Création d'un objet PostModel
$postModel = new \App\Models\NewsModel();

// Si le formulaire est soumis 
if (!empty($_POST)) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $categoryId = $_POST['category'];
    $image = $_POST['image'];

    // Insertion de l'article en BDD
    $postModel->updatePost($title, $content, $categoryId, $image, $postId);
    

    // Redirection vers le dashboard admin
    header('Location: ' . buildUrl('/admin'));
    exit;
}

// Récupération de l'article
$post = $postModel->getOnePost($postId);

// On récupère la liste des catégories pour afficher le liste déroulante des catégories
//$categoryModel = new \App\Models\CategoryNews();
//$categories = $categoryModel->getAllCategories();

// Affichage du template
render('admin/edit_news', [
   // 'categories' => $categories,
    'post' => $post
]);