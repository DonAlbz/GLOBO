<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLOBO</title>
    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="./assets/js/cursor.js" defer></script>
    <script src="./assets/js/404.js" defer></script>
</head>

<body>
    <div class="cursor-follower"></div>
    <header class="globo-header">
        <div class="header-container">
            <div class="header-left">
                <a href="index.php" class="globo-logo">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="20" cy="20" r="20" fill="#FFC244" />
                        <path d="M20 10V30M10 20H30" stroke="white" stroke-width="4" stroke-linecap="round" />
                    </svg>
                    <span class="brand-name">Globo</span>
                </a>

                <div class="address-selector">
                    <span class="icon">📍</span>
                    <span class="address-text">Cosa vuoi ordinare?</span>
                </div>
            </div>

            <div class="header-right">

                <?php
                require_once './config.php';

                use Firebase\JWT\JWT;
                use Firebase\JWT\Key;



                try {
                    if (empty($_COOKIE['jwt'])) {
                        throw new Exception('Token mancante');
                    }

                    $decoded = JWT::decode($_COOKIE['jwt'], new Key(KEY, 'HS256'));

                    // Accedi ai dati
                    $email = $decoded->email;
                    echo '<button class="btn-secondary" onclick="location.href=\'index.php?page=logout\'">Logout (' . $email . ')</button>';
                } catch (Exception $e) {
                    echo '<button class="btn-primary" onclick="location.href=\'index.php?page=singUp\'">Registrati</button>';
                    echo '<button class="btn-secondary" onclick="location.href=\'index.php?page=login\'">Login</button>';
                }
                ?>
                <div class="cart-icon">
                    <span class="badge">
                        🛒
                    </span>
                </div>
            </div>
        </div>
    </header>