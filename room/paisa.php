<?php
include "connect.php";
session_start();


// Create a mapping of column names to time ranges
$timeMapping = [
    "x67" => "6am to 7am",
    "x78" => "7am to 8am",
    "x89" => "8am to 9am",
    "x910" => "9am to 10am",
    "x1011" => "10am to 11am",
    "x1112" => "11am to 12pm",
    "x121" => "12pm to 1pm",
    "x12" => "1pm to 2pm",
    "x23" => "2pm to 3pm",
    "x34" => "3pm to 4pm",
    "x45" => "4pm to 5pm",
    "x56" => "5pm to 6pm"
];

$query = "SELECT * FROM events";
$result = $connect->query($query);

if ($result) {
    $row = $result->fetch_assoc();

    // Create an array to store the selected time ranges
    $selectedTimeRanges = [];
    
    foreach ($timeMapping as $column => $timeRange) {
        // Check if the column has data (assuming 1 indicates it's selected)
        if ($row[$column] == "Deo Villavicencio") {
            $selectedTimeRanges[] = $timeRange;
        }
    }

    // If all time ranges are selected, create a condensed time range "6am to 6pm"
    if (count($selectedTimeRanges) === count($timeMapping)) {
        echo "6am to 6pm";
    } elseif (!empty($selectedTimeRanges)) {
        // If there are selected time ranges, create a condensed time range
        // Extract the start and end times from the selected ranges
        $startTimes = [];
        $endTimes = [];
        foreach ($selectedTimeRanges as $range) {
            list($startTime, $endTime) = explode(" to ", $range);
            $startTimes[] = $startTime;
            $endTimes[] = $endTime;
        }

        // Determine the earliest start time and latest end time
        $earliestStartTime = min($startTimes);
        $latestEndTime = max($endTimes);

        // Ensure the time range is in chronological order
        if (strtotime($earliestStartTime) > strtotime($latestEndTime)) {
            // Swap the start and end times if they are in the wrong order
            $temp = $earliestStartTime;
            $earliestStartTime = $latestEndTime;
            $latestEndTime = $temp;
        }
        $_SESSION["startTime"] = $earliestStartTime;
        $_SESSION["endTime"] = $latestEndTime;
        // Display the condensed time range
        echo $earliestStartTime . " to " . $latestEndTime;
    } else {
        echo "No time ranges selected.";
    }
} else {
    echo "Error executing the query.";
}

// Close the database connection when done
$connect->close();
?>
