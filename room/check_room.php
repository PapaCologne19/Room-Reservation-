<?php
// Include the database connection
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input (selected date)
    $selectedDate = $_POST['selectedDate'];

    // Define an array to store room availability status
    $roomAvailability = array();

    // Fetch room names from your database table
    $query = "SELECT DISTINCT rooms FROM rooms";
    $result = $connect->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $roomName = $row['rooms'];

            // Construct and execute a query to check if any appointments exist for the selected room and date
            $query = "SELECT `x67`, `x78`, `x89`, `x910`, `x1011`, `x1112`, `x121`, `x12`, `x23`, `x34`, `x45`, `x56` 
            FROM events 
            WHERE evt_text = '$roomName' AND evt_start = '$selectedDate'";

            $bookingResult = $connect->query($query);

            // Check if there is at least one booking for this room
            if ($bookingResult->num_rows > 0) {
                // Room has appointments for the selected date
                $allAppointments = true;

                while ($bookingRow = $bookingResult->fetch_assoc()) {
                    foreach ($bookingRow as $timeSlot) {
                        if (empty($timeSlot)) {
                            // If any time slot is empty, not all appointments are booked
                            $allAppointments = false;
                            break;
                        }
                    }
                }

                if ($allAppointments) {
                    // Room has all appointments, set the response to red
                    $roomAvailability[$roomName] = '#dc3545';
                } else {
                    // Room has some appointments but not all, set the response to yellow
                    $roomAvailability[$roomName] = '#ffc107';
                }
            } else {
                // Room has no appointments, set the response to green
                $roomAvailability[$roomName] = '#198754';
            }
        }
    }

    // Close the database connection
    $connect->close();

    // Return the JSON response
    header('Content-Type: application/json');
    echo json_encode($roomAvailability);
}
?>
