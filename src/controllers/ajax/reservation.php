<?php
/*
$errors         = array(); // tableau des erreurs
$data           = array(); // tableau des messages

*/
$issues = FALSE;
$text = htmlspecialchars($_POST['message']);
$email = htmlspecialchars($_POST['email']);
$quantity = htmlspecialchars($_POST['quantity']);
$the = htmlspecialchars($_POST['theselected']);
$spam = htmlspecialchars($_POST['name']);
/*
$to = 'simatovic.lucie@gmail.com';
$subject = $email;
//$mailBody = 'Une reservation demandée:' . $the . 'x' . $quantity . '+' . $message;
$message = $text;
$headers = 'From: ' . $email . '+' . 'Reply-To: ' . $email . '+' . 'X-Mailer: PHP/' . phpversion();
*/
$spamwords = array('mastecard', 'paypal', 'deal', 'identité');


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

if (empty($text)) {
    $issues = TRUE;
    echo "message vide";
}


$tableau = explode(' ', $text);
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

    // On envoie le mail et on stocke le résultat
    $to      = 'simatovic.lucie@gmail.com';
    $subject = 'Réservation de thé';
    $message = 'Une réservation demandée:' . $the . ' x ' . $quantity . '. Avec le message' . $text;
    $headers = 'From:' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $send = mail($to, $subject, $message, $headers);
    //if (!$send) {
    //// $errorMessage = error_get_last()['message'];
    // echo json_encode(
    //     $errorMessage
    //  );
    // }
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
