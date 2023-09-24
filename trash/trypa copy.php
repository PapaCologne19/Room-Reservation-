<?php
if(isset($_POST['submit'])){
    // Your Facebook Page Access Token
$access_token = 'EAAEuWIkg1MABOZBc3wPfVmIomUaYQq7VPxT42c0nsQraVUJ1ohSCkhJGfktLizWih8rnTEy9L87ax30vys8LxNDd8LSMVmZBTh5heLFHFnzH87KUqq4OiOmJZAvCpTk4DocvDWUW2w5bOnMrLDWYcQTVjoWbVu14GRuuR98J3D7G3tGRhV6GYLxtcqjayLW';

// Recipient's PSID (Page-Scoped ID)
$recipient_psid = $_POST['id'];//24253529504238261

// Message to send
$message = [
    'text' => $_POST['message']
];

// Create the API request URL
$url = "https://graph.facebook.com/v15.0/128456347018540/messages?access_token=$access_token";

// Create the message data
$data = [
    'recipient' => ['id' => $recipient_psid],
    'messaging_type' => 'RESPONSE',
    'message' => $message
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
    // Handle the response (check for errors, etc.)
    // ...
    echo 'Response: ' . $response;
}

// Close cURL session
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
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <input type="number" name="id">
    <label for="">Message</label>
    <textarea name="message" id="" cols="30" rows="10"></textarea>
    <button type="submit" name="submit">Submit</button>
</form>
</body>
</html>