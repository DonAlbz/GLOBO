<?php
require_once __DIR__ . '/vendor/autoload.php';

// 1. Configurazione e Connessione (es. Supabase via PDO o API)
//require_once 'includes/config.php';
//require_once 'includes/db.php'; // Qui gestirai le tue 5+ tabelle 

// 2. Recupero della rotta dalla URL (es: index.php?page=contatti)
if (!isset($_GET['page']) || empty($_GET['page'])) {
    header("Location: index.php?page=home");
    exit;
}

$page = $_GET['page'];

// 3. Sistema di routing semplice
// Definiamo le pagine permesse per sicurezza
$allowed_pages = ['home', 'login', 'logout', '404', 'authLogin', 'authSingUp', 'singUp', 'profile', 'restaurant'];
if (!in_array($page, $allowed_pages)) {
    $page = '404'; // Pagina non trovata
}

// Backend logica comune

// 4. Gestione del login
if ($page === 'logout') {
    include 'controllers/logout.php';
    include 'templates/header.php';
    include 'views/' . 'logout' . '.php';
    include 'templates/footer.php';
} else if ($_GET['page'] === 'restaurant' && isset($_GET['id'])) {

    include 'templates/header.php';
    include 'controllers/restaurantId.php';
    include 'templates/footer.php';
} else {
    // 5. Rendering del Frontend (View) 
    // Includiamo l'header comune (dove metterai Motion One)
    include 'templates/header.php';

    // Includiamo il contenuto dinamico della pagina
    include 'views/' . $page . '.php';

    // Includiamo il footer comune
    include 'templates/footer.php';
}
