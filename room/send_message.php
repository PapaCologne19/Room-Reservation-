<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST["message"];
    $botToken = 'YOUR_BOT_TOKEN';
    $chatId = $_POST['userID']; // Replace with the target chat or user ID

    // Compose the message data
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
    ];

    // Send the message using the Telegram Bot API
    $url = 'https://api.telegram.org/bots' . $botToken . '/sendMessage';
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($data),
        ],
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === false) {
        echo 'Failed to send message.';
    } else {
        echo 'Message sent to Telegram!';
    }
}
?>