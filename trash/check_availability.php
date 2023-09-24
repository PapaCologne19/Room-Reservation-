<?php
if (isset($_POST['submit'])) {
    // Replace 'YOUR_BOT_TOKEN' with your actual bot token
    $botToken = '6491649796:AAFl5xkJ4u654sMLaHLq9_81cjpeH9Idmhk';
    $chatId = $_POST['userid']; // Replace with the chat ID of the user or group you want to send the message to 2027552190
    $message = $_POST['message']; // The message you want to send

    // Create an associative array with the message parameters
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
    ];

    // Convert the data to JSON format
    $jsonData = json_encode($data);

    // Create the cURL request
    $ch = curl_init('https://api.telegram.org/bot' . $botToken . '/sendMessage');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


    // Execute the cURL request
    $result = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        // Check the API response for success
        $response = json_decode($result, true);
        if ($response['ok'] === true) {
            echo 'Message sent successfully!';
        } else {
            echo 'Message sending failed. Error: ' . $response['description'];
        }
    }

    // Close the cURL session
    curl_close($ch);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <div class="container">
            <div class="row">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="g-3">
                    <div class="col-md-4">
                        <label for="" class="form-label">USER ID</label><br>
                        <input type="text" name="userid" id="userid" required>
                    </div><br>
                    <div class="col-md-4">
                        <label for="">Message</label><br>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </center>
</body>

</html>





<?php
// Your Facebook Page Access Token
$access_token = 'EAAEuWIkg1MABO5SKZB8EEZCFOBmfjAW2IcJ60KrJ8t3haaKPRPq15AQW4HarbEAhYLqYccQ9RWJC91tsI7oSgyjovwz6HetgwMwaoZC1AfUCBWODFw3ecqbiLnhXdVhJvfhQO0Kb65ioy49ah4qhqgqeXKR1IFcPjsZCZC27WtZARaetXhLI9nV4HcBmiZCXge2';

// Recipient name
$recipient_name = 'linneth.gomera.5';

// Create the API request URL
$url = "https://graph.facebook.com/v15.0/me/messages?access_token=$access_token";

// Create the message data
$data = [
    'recipient' => ['name' => $recipient_name],
    'messaging_type' => 'RESPONSE',
    'message' => ['text' => 'Hello, Tanga!']
];

// Convert the data to JSON format
$json_data = json_encode($data);

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request and store the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    // Check the response for errors
    $json_response = json_decode($response);
    if ($json_response->error) {
        echo 'Facebook Graph API Error: ' . $json_response->error->message;
    } else {
        // Success!
        $recipient_id = $json_response->recipient_id;

        // Do something with the recipient ID
    }
}

// Close cURL session
curl_close($ch);