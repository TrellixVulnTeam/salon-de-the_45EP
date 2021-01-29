<?php

// Si l'utilisateur n'est pas connecté
if (!isAuthenticated()) {
    header('Location: ' . buildUrl('/admin/login'));
    exit;
}

// Initialisation de la variable $error qui contiendra le cas échéant un message d'erreur
$error = null;


// Si le formulaire est soumis 
if (!empty($_POST)) {

    try {

        //   $userId = getUserSessionId();
        $title = $_POST['name'];
        $extension = $_POST['extension'];
        $player = $_POST['player'];
        $max_player = $_POST['player_max'];

        $time = $_POST['time'];
        $max_time = $_POST['time_max'];
        // Insertion du temps en BDD

        $difficulty = $_POST['difficulty'];
        $max_difficulty = $_POST['difficulty_max'];
        $age = $_POST['age'];

        // Insertion de l'article en BDD
        $postModel = new \App\Models\GameModel();
        $postId = $postModel->insertGame($title, $extension, $player, $max_player, $time, $max_time,  $difficulty, $max_difficulty, $age);

        // Message flash de confirmation
        //  addFlashMessage('Article ajouté.');

        header('Location: ' . buildUrl('/admin'));
        exit;
    } catch (Exception $exception) {
        $error = $exception->getMessage();
    }
}

render('admin/add_game', [
    'error' => $error
]);
