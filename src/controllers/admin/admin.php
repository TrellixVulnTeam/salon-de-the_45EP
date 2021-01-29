<?php

// Si l'utilisateur n'est pas connecté
if (!isAuthenticated()) {
    header('Location: ' . buildUrl('/admin/login'));
    exit;
}

render('admin/admin', [
    'posts' => (new \App\Models\TeaModel())->getAllPosts(),
    'news' => (new \App\Models\NewsModel())->getAllNews(),
    'games' => (new \App\Models\GameModel())->getAllGames(),
    'successMessages' => fetchFlashMessages()
]);
