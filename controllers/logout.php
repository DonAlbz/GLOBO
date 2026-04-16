<?php
$cookie_name = 'jwt';

if (isset($_COOKIE[$cookie_name])) {

    setcookie($cookie_name, '', [
        'expires' => time() - 3600,
        'path' => '/',           // Deve coincidere con il path originale
        'domain' => '',          // Deve coincidere con il dominio originale
        'secure' => true,        // Se il JWT era HTTPS, mantieni true
        'httponly' => true,      // Se era HttpOnly, mantieni true
        'samesite' => 'Lax',
    ]);

    // 3. Rimuove la variabile dall'array globale per lo script corrente
    unset($_COOKIE[$cookie_name]);

    //echo "Il cookie JWT è stato eliminato.";
} else {
    //echo "Il cookie JWT non esiste o è già stato rimosso.";
}
