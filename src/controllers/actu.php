<?php

////////////////////////////////////////
// Inclusion des dépendances si besoin /
////////////////////////////////////////
$test = "test";
// On détermine sur quelle page on se trouve
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}
render('actu', [
    'news' => (new \App\Models\NewsModel())->getAllNews(),
    'categories' => (new \App\Models\CategoryNews())->getAllNewsCategories()
]);
