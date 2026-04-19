<?php
// ... Logica cURL e Supabase identica a quella che hai caricato ...
// Assicurati che SUPABASE_URL e SUPABASE_KEY siano definiti
require_once 'config.php';

$id = $_GET['id'] ?? '';
$name = str_replace('_', ' ', $id);
$url = SUPABASE_URL . "/rest/v1/restaurants?select=name,description,address,phone,cover_image,is_open";

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
$restaurant = null;

if ($status === 200 && !empty($result)) {
    foreach ($result as $row) {
        if (strtolower($row['name']) === strtolower($name)) {
            $restaurant = $row;
            break;
        }
    }
}
?>

<?php if ($restaurant): ?>
    <?php
    $status_class = $restaurant['is_open'] ? 'status-open' : 'status-closed';
    $status_text = $restaurant['is_open'] ? 'Aperto' : 'Chiuso';
    ?>

    <section class="restaurant-profile">
        <div class="profile-header-bg" style="background-image: url('<?php echo htmlspecialchars($restaurant['cover_image']); ?>');">
            <div class="overlay"></div>
        </div>

        <div class="profile-info-container">
            <div class="restaurant-main-details">
                <div class="title-row">
                    <h1><?php echo htmlspecialchars($restaurant['name']); ?></h1>
                    <span class="status-badge <?php echo $status_class; ?>"><?php echo $status_text; ?></span>
                </div>

                <p class="res-description"><?php echo htmlspecialchars($restaurant['description']); ?></p>

                <div class="res-meta">
                    <span>📍 <?php echo htmlspecialchars($restaurant['address']); ?></span>
                    <span>📞 <?php echo htmlspecialchars($restaurant['phone']); ?></span>
                </div>
            </div>
        </div>
    </section>

    <hr class="section-divider">

    <section class="restaurant-posts-feed">
        <h2 class="feed-title">Post e Novità</h2>
        <div class="feed-container">
            <p class="empty-feed-msg">Nessun post disponibile al momento.</p>
        </div>
    </section>

<?php else: ?>
    <div class="error-msg">Ristorante non trovato.</div>
<?php endif; ?>