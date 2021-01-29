<?php

////////////////////////////////////////
// Inclusion des dépendances si besoin /
////////////////////////////////////////
use App\Models\GameModel;
// Récupération des articles
$GameModel = new GameModel();
$games = $GameModel->getAllGames();
/////////////////////////////////////////////////////////////
// Affichage : inclusion du fichier de template 
render('jeu', [
    'games' => $games

]);
