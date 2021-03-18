<?php

// Si l'utilisateur n'est pas connecté
if (!isAuthenticated()) {
    header('Location: ' . buildUrl('/admin/login'));
    exit;
}

render('admin/admin', [
    'requests' => (new \App\Models\RequestModel())->getAllRequests(),
    'successMessages' => fetchFlashMessages()
]);