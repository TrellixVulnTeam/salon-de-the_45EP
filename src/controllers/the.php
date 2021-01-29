<?php

////////////////////////////////////////
// Inclusion des dépendances si besoin /
////////////////////////////////////////

use App\Models\TeaModel;
// Inclusion du fichier d'autoload de Composer
//require MODELS_DIR . '/the_model.php';

// Récupération des articles
$teaModel = new TeaModel();
$posts = $teaModel->getAllPosts();

/////////////////////////////////////////////////////////////
// Affichage : inclusion du fichier de template 
render('the', [
      'posts' => $posts

]);
