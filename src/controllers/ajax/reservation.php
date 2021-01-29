<?php
/*
$errors         = array(); // tableau des erreurs
$data           = array(); // tableau des messages

*/
$issues = FALSE;
$message = htmlspecialchars($_POST['message']);
$email = htmlspecialchars($_POST['email']);
$quantity = htmlspecialchars($_POST['quantity']);
$the = htmlspecialchars($_POST['theselected']);
//$spam = htmlspecialchars($_POST['name']);

$to = 'simatovic.lucie@gmail.com';
//echo json_encode($email);


$headers = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n" . 'X-Mailer: PHP/' . phpversion();
$spamwords = array("mastecard", "paypal", "deal", "identité");


// valide le remplissage des champs, sinon message d'erreur ======================================================

if (empty($email)) {
    $issues = TRUE;
    echo "email vide";
}

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
} else {
    $issues = TRUE;
    echo "email non valide";
}

if (empty($message)) {
    $issues = TRUE;
    echo "message vide";
}


$tableau = explode(' ', $message);
foreach ($tableau as $mot) {
    if (in_array($mot, $spamwords)) {
        $issues = TRUE;
        echo "spammot";
    }
}

//si ce champ n'est pas vide, c'est qu'un bot l'a rempli, on accepte pas les données
if (!empty($spam)) {
    $issues = TRUE;
    echo "spam";
}
// retourne la réponse ====================================================================

// s'il y a des erreurs

if ($issues !== TRUE) {
    //on envoie notre email en toute sécurité (presque)

    $to      = "simatovic.lucie@gmail.com";
    $subject = $email;
    $message = "Vous avez une nouvelle réservation du thé:" + $the + "(QUANTITÉ:" + $quantity + "). Avec le message:" + $message;
    $headers = "Réservation de thé";
    // On envoie le mail et on stocke le résultat

    $send = mail($to, $subject, $message, $headers);
    if (!$send) {
        $errorMessage = error_get_last()['message'];
        echo json_encode(
            $errorMessage
        );
    }
    // $send = mail($to, $subject, $message, $headers);
    // Le contenu sera renvoyé au format JSON
    header('Content-Type: application/json');
    echo json_encode([
        'send' => $send
    ]);


    //si c'est un succes
} elseif ($issues == TRUE) {


    echo json_encode($issues);
}
