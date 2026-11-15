<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /#kontakt');
    exit;
}

if (!empty($_POST['website'] ?? '')) {
    header('Location: /?msg=ok#kontakt');
    exit;
}

$first_name = trim($_POST['first_name'] ?? '');
$last_name  = trim($_POST['last_name'] ?? '');
$email      = trim($_POST['email'] ?? '');
$phone      = trim($_POST['phone'] ?? '');
$message    = trim($_POST['message'] ?? '');

if ($first_name === '' || $last_name === '' || $email === '' || $message === '') {
    header('Location: /?msg=fail&error=' . urlencode('Fyll i alla obligatoriska fält.') . '#kontakt');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: /?msg=fail&error=' . urlencode('Ange en giltig e-postadress.') . '#kontakt');
    exit;
}

$to = 'nancy@cmlmassagewellness.se';
$subject = 'Nytt meddelande från hemsidan – ' . $first_name . ' ' . $last_name;

$body  = "Namn: {$first_name} {$last_name}\n";
$body .= "E-post: {$email}\n";
$body .= "Telefon: {$phone}\n\n";
$body .= "Meddelande:\n{$message}\n";

$headers  = "From: noreply@cmlmassagewellness.se\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$sent = mail($to, $subject, $body, $headers);

if ($sent) {
    header('Location: /?msg=ok#kontakt');
} else {
    header('Location: /?msg=fail&error=' . urlencode('Kunde inte skicka meddelandet. Försök igen senare.') . '#kontakt');
}
exit;
