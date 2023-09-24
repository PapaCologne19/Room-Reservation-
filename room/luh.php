<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message to Telegram</title>
</head>

<body>
    <center>
        <form id="messageForm">
            <input type="text" name="userID" id="userID" placeholder="USER ID" required><br><br>
            <textarea id="messageInput" rows="4" cols="50" placeholder="Enter your message" required></textarea><br><br>
            <button type="submit">Send Message</button>
        </form>
    </center>

    <script>
        document.getElementById('messageForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const userID = document.getElementById('userID').value;
            const message = document.getElementById('messageInput').value;

            // Create an object to hold both message and user ID
            const data = {
                userID: userID,
                message: message,
            };

            // Send the data to your backend server (send_message.php)
            fetch('send_message.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                })
                .then((response) => {
                    if (response.ok) {
                        alert('Message sent to Telegram!');
                        // Optionally, clear the textarea
                        document.getElementById('messageInput').value = '';
                    } else {
                        alert('Failed to send message.');
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>