<?php

// Include the database connection
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input (room name and selected date)
    $roomName = $_POST['roomName'];
    $selectedDate = $_POST['selectedDate'];

    // Construct and execute a query to check room availability for the selected date
    $query = "SELECT `x67`, `x78`, `x89`, `x910`, `x1011`, `x1112`, `x121`, `x12`, `x23`, `x34`, `x45`, `x56` 
    FROM events 
    WHERE evt_text = '$roomName' AND evt_start = '$selectedDate'";
    $result = $connect->query($query);

    
    $response = array();

    if ($result->num_rows > 0) {
        // Room is already booked for the selected date
        $response['available'] = false;
        $unavailableTimes = array();

        while ($row = $result->fetch_assoc()) {
            // Assuming you have columns like 'x67', 'x78', etc. for time slots
            for ($i = 1; $i <= 1112; $i++) {
                $timeSlotColumn = 'x' . $i; // Adjust to match your column names
                if (isset($row[$timeSlotColumn]) && $row[$timeSlotColumn] == "1") {
                    // This time slot is booked
                    $unavailableTimes[] = $timeSlotColumn;
                    
                }
            }
        }

        $response['unavailableTimes'] = $unavailableTimes;
    } else {
        // Room is available for the selected date
        $response['available'] = true;
    }

    // Close the database connection
    $connect->close();

    // Return the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
