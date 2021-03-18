<?php 

use App\Models\SubjectModel;

// Récupération des articles
$postModel = new SubjectModel();
$subjects = $postModel->getAllSubjects();

// Affichage : inclusion du fichier de template 
render('home', [
    'subjects' => $subjects,
    'successMessages' => fetchFlashMessages()
]);