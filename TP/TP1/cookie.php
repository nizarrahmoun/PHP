<?php
$cookie_name = "Cookie";
$cookie_value = "valeurCookie";

$expiration_time = time() + (10 * 24 * 60 * 60);

// Créer le cookie
setcookie($cookie_name, $cookie_value, $expiration_time);

?>


