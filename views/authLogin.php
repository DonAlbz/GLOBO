<main class="auth-container">
    <div class="loader-content">
        <div class="spinner-wrapper">
            <div class="spinner"></div>
        </div>

        <h1 class='loader-contentH1'>Stiamo verificando i tuoi dati</h1>
        <p class='loader-contentP'>Attendi un istante, stiamo preparando il tuo menù...</p>
    </div>
</main>

<script>
    // Animazione GSAP: rotazione infinita
    gsap.to(".spinner", {
        rotation: 360,
        duration: 1,
        repeat: -1,
        ease: "linear"
    });
    gsap.to(".spinner", {
        scale: 1.1,
        duration: 0.8,
        repeat: -1,
        yoyo: true,
        ease: "sine.inOut"
    });
</script>

<?php
require_once './config.php';

use Firebase\JWT\JWT;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
}
$url = SUPABASE_URL . "/auth/v1/token?grant_type=password";

$data = [
    "email" => $email,
    "password" => $password
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'apikey: ' . SUPABASE_KEY,
    'Content-Type: application/json'
]);

$response = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$result = json_decode($response, true);

if ($status === 200 || $status === 201) {
    $payload = [
        'email' => $email,
        'iat'   => time(),           // issued at
        'exp'   => time() + 3600,    // scadenza
    ];

    $token = JWT::encode($payload, KEY, 'HS256');

    setcookie('jwt', $token, [
        'expires'  => time() + 3600,
        'path'     => '/',
        'secure'   => true,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);

    header("Location: ./index.php");
} else {
    header("Location: ./index.php?page=login");
    exit;
}
?>