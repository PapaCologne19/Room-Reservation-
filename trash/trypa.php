<?php
// Your Facebook Page Access Token
$access_token = 'EAAEuWIkg1MABO5SKZB8EEZCFOBmfjAW2IcJ60KrJ8t3haaKPRPq15AQW4HarbEAhYLqYccQ9RWJC91tsI7oSgyjovwz6HetgwMwaoZC1AfUCBWODFw3ecqbiLnhXdVhJvfhQO0Kb65ioy49ah4qhqgqeXKR1IFcPjsZCZC27WtZARaetXhLI9nV4HcBmiZCXge2';

// Verification token that you set in the Facebook Developer Portal
$verify_token = '93ee511f61ced474691e13f5d8c026c0';

// Verify the request method (should be GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_REQUEST['hub_verify_token'])) {
    // Check if the received verify token matches the one you set
    if ($_REQUEST['hub_verify_token'] === $verify_token) {
        // Respond with the challenge sent by Facebook to confirm verification
        echo $_REQUEST['hub_challenge'];
        exit;
    } else {
        // Verification failed
        echo 'Verification failed. Invalid verify token.';
        exit;
    }
}

// Process incoming messages and events here for POST requests
$input = json_decode(file_get_contents('php://input'), true);

if (!empty($input['entry'][0]['messaging'])) {
    $messaging_events = $input['entry'][0]['messaging'];

    foreach ($messaging_events as $event) {
        $sender_id = $event['sender']['id'];
        $message = $event['message']['text'];

        // Here, you can add your logic to process and respond to the incoming message
        // For example, you can send a response back to the user
        sendTextMessage($sender_id, 'You sent: ' . $message);
    }
}

// Function to send a text message back to the user
function sendTextMessage($recipient_id, $message_text)
{
    global $access_token;

    $url = "https://graph.facebook.com/v15.0/me/messages?access_token=$access_token";
    $data = [
        'recipient' => ['id' => $recipient_id],
        'message' => ['text' => $message_text]
    ];

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($data)
        ]
    ];

    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}

// Respond with a 200 OK status
http_response_code(200);
?>
