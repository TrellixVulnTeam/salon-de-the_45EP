<?php

$error = null;
/*
Vérification des champs obligatoires (attention aux espaces)
l’email doit avoir un format valide
le message doit comporter au moins 100 caractères

*/
// Si le formulaire est soumis 
if (!empty($_POST)) {


    try {

        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $content = htmlspecialchars($_POST['message']);
        $subject_id = htmlspecialchars($_POST['subject']);

        if (!isset($email) 
        || !isset($firstname) 
        || !isset($lastname) 
        || !isset($content) ) {
            addFlashMessage('veuillez remplir tous les champs.');
            header('Location: ' . buildUrl('/'));
            exit;
        } elseif ((strlen($message)) < 100) {
            addFlashMessage('Votre message doit contenir au moins 100 caractères.');
            header('Location: ' . buildUrl('/'));
            exit;
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        } else {
            addFlashMessage('email non valide.');
            header('Location: ' . buildUrl('/'));
            exit;
        }


        // Insertion de l'article en BDD
        $requestModel = (new \App\Models\RequestModel())->insertRequest($firstname, $lastname, $email, $phone, $content, $subject_id);

        // Ajout d'un message flash
        addFlashMessage('Message envoyé.');
        // Redirection vers home
        header('Location: ' . buildUrl('/'));
        exit;
    } catch (Exception $exception) {
        $error = $exception->getMessage();
    }
}


// Si le formualire n'a pas été soumis OU si il comporte des erreurs, on l'affiche
header('Location: ' . buildUrl('/'));
exit;
render('home');
