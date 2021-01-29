<?php
/*
$errors         = array(); // tableau des erreurs
$data           = array(); // tableau des messages

*/
$problem = false;
$message = htmlspecialchars($_POST['message']);
$email = htmlspecialchars($_POST['email']);
$spam = htmlspecialchars($_POST['name']);

$to = 'simatovic.lucie@gmail.com';

$headers = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n" . 'X-Mailer: PHP/' . phpversion();
$spamwords = array("mastecard", "paypal", "deal", "identité");


// valide le remplissage des champs, sinon message d'erreur ======================================================

if (empty($email)) {
    $problem = true;
    echo "email vide";
}

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
} else {
    $problem = true;
    echo "email non valide";
}

if (empty($message)) {
    $problem = true;
    echo "message vide";
}


$tableau = explode(' ', $message);
foreach ($tableau as $mot) {
    if (in_array($mot, $spamwords)) {
        $problem = true;
        echo "spammot";
    }
}

//si ce champ n'est pas vide, c'est qu'un bot l'a rempli, on accepte pas les données
if (!empty($spam)) {
    $problem = true;
    echo "spam";
}
// retourne la réponse ====================================================================

// s'il y a des erreurs
echo $problem;
if ($problem == false) {

    //on envoie notre email en toute sécurité (presque)
    $to      = "simatovic.lucie@gmail.com";
    $subject = $email;
    $message = $message;
    $headers = "Formulaire de contact Chez Mellie";
    // On envoie le mail et on stocke le résultat
    $result = mail($to, $subject, $message, $headers);
    // Le contenu sera renvoyé au format JSON
    header('Content-Type: application/json');
    echo json_encode([
        'result' => $result
    ]);

    //si c'est un succes
} elseif ($problem == true) {


    echo json_encode($problem);
}
