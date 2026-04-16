<div class="feed">

<?php
$posts = [
    [
        "user" => "Pizza Express",
        "img" => "https://picsum.photos/600/400?pizza",
        "desc" => "La nostra margherita 🔥"
    ],
    [
        "user" => "Sushi World",
        "img" => "https://picsum.photos/600/400?sushi",
        "desc" => "Fresh sushi every day 🍣"
    ],
    [
        "user" => "Burger House",
        "img" => "https://picsum.photos/600/400?burger",
        "desc" => "Double burger da paura 🍔"
    ]
];

foreach ($posts as $post) {
    echo "
    <div class='post'>
        <div class='post-header'>
            <div class='avatar'></div>
            <div class='username'>{$post['user']}</div>
        </div>

        <img src='{$post['img']}'>

        <div class='post-content'>
            <div class='actions'>❤️ 💬 📤</div>
            <div class='likes'>Piace a 120 persone</div>
            <div class='description'><b>{$post['user']}</b> {$post['desc']}</div>
        </div>

        <div class='comment-box'>
            <input type='text' placeholder='Aggiungi un commento...'>
        </div>
    </div>
    ";
}
?>

</div>
