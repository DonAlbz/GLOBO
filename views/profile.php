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
} catch (Exception $e) {
    header('Location: index.php?page=login');
    exit;
}
?>

<main class="profile-container">
    <div class="profile-card">
        <h1 class="anim-target">I tuoi dettagli</h1>
        <div class="info-grid">
            <?php
            $email = urlencode($email);
            $url = SUPABASE_URL . "/rest/v1/users?email=eq." . $email . "&select=*";

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'apikey: ' . SUPABASE_KEY,
                'Content-Type: application/json',
            ]);

            $response = curl_exec($ch);
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $result = json_decode($response, true);

            if ($status === 200 && !empty($result)) {
                $user = $result[0]; // primo (e unico) risultato
                $email = $user['email'];
                $address = $user['address'];
                echo '<div class="info-row anim-target">
                    <span class="label">Email</span>
                    <span class="value">' . $email . '</span>
                </div>';

                echo '<div class="info-row anim-target">
                    <span class="label">Indirizzo</span>
                    <span class="value">' . $address . '</span>
                </div>';
            } else {
                header('Location: index.php?page=login');
                exit;
            }
            ?>

            <div class="info-row anim-target">
                <span class="label">Password</span>
                <span class="value">********</span>
            </div>

            <div class="info-row anim-target">
                <span class="label">Stato Ordine</span>
                <span class="status-badge">In consegna 🛵</span>
            </div>
        </div>

        <button class="btn-primary btn-full anim-target" style="margin-top: 30px;">
            Modifica dati
        </button>
    </div>
</main>

<script>
    // Animazione GSAP all'apertura
    window.addEventListener('load', () => {
        gsap.from(".anim-target", {
            duration: 0.8,
            y: 30,
            opacity: 0,
            stagger: 0.2, // Fa apparire gli elementi uno dopo l'altro
            ease: "back.out(1.7)"
        });
    });
</script>