<?php
include("connect.php");
session_start();
date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');
$date1 = date('Y-m-d');


if (isset($_POST['verify'])) {
  echo $date1;
}

if (isset($_POST['SubButton'])) {

  $ireserver = "Deo Villavicencio";
  $evtStart = $_POST['evtStart'];
  $evtEnd = $_POST['evtStart'];
  $roomko = $_POST['roomko'];
  $qty = $_POST['qty'];
  $room_orientation = $_POST['roomOrientation'];

  $others_rem = $_POST['others_rem'];
  $status = "pending";

  if (isset($_POST['cprojector'])) {
    $cprojector = 1;
  } else {
    $cprojector = 0;
  }

  if (isset($_POST['cwhiteboard'])) {
    $cwhiteboard = 1;
  } else {
    $cwhiteboard = 0;
  }

  if (isset($_POST['cextn'])) {
    $cextn = 1;
  } else {
    $cextn = 0;
  }

  if (isset($_POST['radios'])) {
    $radios = 1;
  } else {
    $radios = 0;
  }

  if (isset($_POST['radioa'])) {
    $radioa = 1;
  } else {
    $radioa = 0;
  }

  if (isset($_POST['basicl'])) {
    $basicl = 1;
  } else {
    $basicl = 0;
  }

  if (isset($_POST['c_before'])) {
    $c_before = 1;
  } else {
    $c_before = 0;
  }

  if (isset($_POST['c_after'])) {
    $c_after = 1;
  } else {
    $c_after = 0;
  }



  if (isset($_POST['c_allday'])) {
    // // Checkbox is selected
    // echo "c_allday selected";
    $c_alldayv = $ireserver;

    $x67v = $ireserver;
    $x78v = $ireserver;
    $x89v = $ireserver;
    $x910v = $ireserver;
    $x1011v = $ireserver;
    $x1112v = $ireserver;
    $x121v = $ireserver;
    $x12v = $ireserver;
    $x23v = $ireserver;
    $x34v = $ireserver;
    $x45v = $ireserver;
    $x56v = $ireserver;
  } else {
    $c_alldayv = "x";
  }



  if (isset($_POST['c67'])) {
    $start_t = "6am";
  } else if (!isset($_POST['c67']) && (isset($_POST['c78']))) {
    $start_t = "7am";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (isset($_POST['c89'])))) {
    $start_t = "8am";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (isset($_POST['c910'])))) {
    $start_t = "9am";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (isset($_POST['c1011'])))) {
    $start_t = "10am";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (isset($_POST['c1112'])))) {
    $start_t = "11am";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (isset($_POST['c121'])))) {
    $start_t = "12nn";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (isset($_POST['c12'])))) {
    $start_t = "1pm";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (isset($_POST['c23'])))) {
    $start_t = "2pm";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (isset($_POST['c34'])))) {
    $start_t = "3pm";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (isset($_POST['c45'])))) {
    $start_t = "4pm";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (isset($_POST['c56'])))) {
    $start_t = "5pm";
  }




  if (isset($_POST['c56'])) {
    $end_t = "6pm";
  } else if ((isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "5pm";
  } else if ((isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "4pm";
  } else if ((isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "3pm";
  } else if ((isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "2pm";
  } else if ((isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "1pm";
  } else if ((isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "12nn";
  } else if ((isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "11am";
  } else if ((isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "10am";
  } else if ((isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "9am";
  } else if ((isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56'])))) {
    $end_t = "8am";
  } else if (isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56'])))) {
    $end_t = "7am";
  }

  if (isset($_POST['c67'])) {
    $x67v = $ireserver;
  } else {
    $x67v = "";
  }


  if (isset($_POST['c78'])) {
    $x78v = $ireserver;
  } else {
    $x78v = "";
  }

  if (isset($_POST['c89'])) {
    $x89v = $ireserver;
  } else {
    $x89v = "";
  }

  if (isset($_POST['c910'])) {
    $x910v = $ireserver;
  } else {
    $x910v = "";
  }

  if (isset($_POST['c1011'])) {
    $x1011v = $ireserver;
  } else {
    $x1011v = "";
  }

  if (isset($_POST['c1112'])) {
    $x1112v = $ireserver;
  } else {
    $x1112v = "";
  }

  if (isset($_POST['c121'])) {
    $x121v = $ireserver;
  } else {
    $x121v = "";
  }


  if (isset($_POST['c12'])) {
    $x12v = $ireserver;
  } else {
    $x12v = "";
  }

  if (isset($_POST['c23'])) {
    $x23v = $ireserver;
  } else {
    $x23v = "";
  }

  if (isset($_POST['c34'])) {
    $x34v = $ireserver;
  } else {
    $x34v = "";
  }

  if (isset($_POST['c45'])) {
    $x45v = $ireserver;
  } else {
    $x45v = "";
  }

  if (isset($_POST['c56'])) {
    $x56v = $ireserver;
  } else {
    $x56v = "";
  }


  // //echo $evtStart;
  // echo $start_t;
  // echo $end_t;


  //for time
  $string_to_date = $d = strtotime($evtStart);
  $new_date = Date('H:i a', $string_to_date);


  // Get the next available column number
  $nextColumnNumber = 1;
  $sql = "SELECT MAX(columnNumber) AS maxColumnNumber FROM events";
  $result = mysqli_query($connect, $sql);

  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $nextColumnNumber = $row["maxColumnNumber"] + 1;
    } else {
      // Handle the case where there are no rows in the result set
      $nextColumnNumber = 1; // Or any other default value you want to set
    }
  } else {
    // Handle the case where the query failed
    $nextColumnNumber = -1; // Or any other default value indicating a failure
  }

  // $sql = "SELECT * FROM events WHERE (x67 = '$x67v' OR x78 = '$x78v' OR x89 = '$x89v' OR x910 = '$x910v' 
  //         OR x1011 = '$x1011v' OR x1112 = '$x1112v' OR x121 = '$x121v' OR x12 = '$x12v' OR x23 = '$x23v' 
  //         OR x34 = '$x34v' OR x45 = '$x45v' OR x56 = '$x56v') AND evt_start = '$evtStart'";

  // Check if there is existing data for the specified date in any of the columns
  $sql = "SELECT COUNT(*) AS existingDataCount FROM events WHERE 
          (x67 = '$x67v' AND x78 = '$x78v' AND x89 = '$x89v' AND x910 = '$x910v' 
          AND x1011 = '$x1011v' AND x1112 = '$x1112v' AND x121 = '$x121v' 
          AND x12 = '$x12v' AND x23 = '$x23v' AND x34 = '$x34v' AND x45 = '$x45v' 
          AND x56 = '$x56v') AND evt_start = '$evtStart'";

  $result = mysqli_query($connect, $sql);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $existingDataCount = $row["existingDataCount"];

    // echo "Existing Data Count: $existingDataCount"; // Debugging line,

    if ($existingDataCount > 0) {
      // Data already exists for the specified date in one of the columns, do not insert
      // You can return an error message or handle it accordingly
      echo "";
    } else {
      // No existing data, proceed with the insertion
      $query = "INSERT INTO events (
          evt_start, evt_end, evt_text, evt_color, evt_bg, qty, projector, whiteboard, ext_cord, sound, sound_simple, sound_advance, basic_lights,
          cleanup, cleanup_before, cleanup_after, others, others1, allday, x67, x78, x89, x910, x1011, x1112, x121, x12, x23, x34, x45, x56, room_orientation, status
        ) VALUES (
          '$evtStart', '$evtEnd', '$roomko', '#000000', '#fbff00', '$qty', '$cprojector', '$cwhiteboard', '$cextn', 'sound', '$radios', '$radioa', '$basicl',
          'cleanup', '$c_before', '$c_after', 'others', '$others_rem', '$c_alldayv', '$x67v', '$x78v', '$x89v', '$x910v', '$x1011v', '$x1112v', '$x121v', '$x12v', '$x23v', '$x34v', '$x45v', '$x56v', '$room_orientation', '$status'
        )";

      $result = mysqli_query($connect, $query);

      if (!$result) {
        // Handle the case where the insertion query failed
        echo "Insertion failed.";
      }
    }
  } else {
    // Handle the case where the query to check existing data failed
    $nextColumnNumber = -1; // Or any other default value indicating a failure
  }



  //  if(mysqli_num_rows($result) > 0){
  //   $sql = "INSERT INTO events (column$nextColumnNumber, evt_start) VALUES ('$x910v', '$evtStart')";
  //   $connect->query($sql);
  //  }else{
  // Try


  //     mysql_query("INSERT INTO events
  //       (evt_start, evt_end, evt_text, evt_color, evt_bg,qty,projector,whiteboard,ext_cord,sound,sound_simple,sound_advance,basic_lights,
  //       cleanup,cleanup_before,cleanup_after,others,others1,allday,x67,x78,x89,x910,x1011,x1112,x121,x12,x23,x34,x45,x56,room_orientation,status)
  //       VALUES
  //       ('$evtStart','$evtEnd','$roomko','#000000','#fbff00','$qty','$cprojector','$cwhiteboard','$cextn','sound','$radios','$radioa','$basicl',
  //       'cleanup','$c_before','$c_after','others','$others_rem','$c_alldayv','$x67v','$x78v','$x89v','$x910v','$x1011v','$x1112v','$x121v','$x12v','$x23v','$x34v','$x45v','$x56v','$room_orientation','$status')
  //       ");


  //   // insert more data to locationpo table for date and location monitoring

  //   $resultE = mysql_query("select * from locationpo WHERE evt_text = '$roomko'  and evt_start='$evtStart'");
  //   if (mysql_num_rows($resultE) == 0) {
  //     // kapag walang  kaparehas
  //     mysql_query("INSERT INTO locationpo
  // (evt_start, evt_text, evt_color,qty,allday,x67,x78,x89,x910,x1011,x1112,x121,x12,x23,x34,x45,x56)
  // VALUES
  // ('$evtStart','$roomko','#000000','$qty','$c_alldayv','$x67v','$x78v','$x89v','$x910v','$x1011v','$x1112v','$x121v','$x12v','$x23v','$x34v','$x45v','$x56v')
  // ");
  //   } else {

  //     while ($rowE = mysql_fetch_row($resultE))
  //       if ($rowE[1]) {
  //       }


  //     $query = mysql_query("UPDATE locationpo
  //       SET
  //       x67='$x67v',
  //       x78='$x78v',
  //       x89='$x89v',
  //       x910='$x910v',
  //       x1011='$x1011v',
  //       x1112='$x1112v',
  //       x121='$x121v',
  //       x12='$x12v',
  //       x23='$x23v',
  //       x34='$x34v',
  //       x45='$x45v',
  //       x56='$x56v'

  //     WHERE evt_start = '$evtStart' and evt_text = '$roomko'
  //     ");
  //   }
}

?>


<!-- HTML Start here -->
<!DOCTYPE html>
<html>

<head>
  <title>Calendar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5">

  <!-- ANDROID + CHROME + APPLE + WINDOWS APP -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="theme-color" content="white">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Calendar">
  <meta name="msapplication-TileColor" content="#ffffff">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="strap/bootstrap.min.css">
  <script src="strap/jquery.min.js"></script>
  <script src="strap/bootstrap.min.js"></script>



  <!-- WEB APP MANIFEST -->
  <!-- https://web.dev/add-manifest/ -->
  <link rel="manifest" href="5-manifest.json">
  <link rel="shortcut icon" href="images/pcn.png" type="image/x-icon">

  <!-- SERVICE WORKER -->
  <script>
    if ("serviceWorker" in navigator) {
      navigator.serviceWorker.register("5-worker.js");
    }
  </script>

  <!-- JS + CSS -->
  <script src="4b-calendar.js"></script>
  <link rel="stylesheet" href="css/4c-calendar.css">
  <link rel="stylesheet" href="css/style.css">


  <!-- Sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">

</head>

<body>


  <?php
  if (isset($_SESSION['successMessage'])) { ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: "<?php echo $_SESSION['successMessage']; ?>",
      })
    </script>
  <?php unset($_SESSION['successMessage']);
  } ?>

  <?php
  // (A) DAYS MONTHS YEAR
  $months = [
    1 => "January", 2 => "Febuary", 3 => "March", 4 => "April",
    5 => "May", 6 => "June", 7 => "July", 8 => "August",
    9 => "September", 10 => "October", 11 => "November", 12 => "December"
  ];
  $monthNow = date("m");
  $yearNow = date("Y"); ?>

  <!-- (B) PERIOD SELECTOR -->
  <div id="calHead">
    <div id="calPeriod">
      <input id="calBack" type="button" class="mi" value="&lt;">
      <select id="calMonth"><?php foreach ($months as $m => $mth) {
                              printf(
                                "<option value='%u'%s>%s</option>",
                                $m,
                                $m == $monthNow ? " selected" : "",
                                $mth
                              );
                            } ?></select>
      <input id="calYear" type="number" value="<?= $yearNow ?>">
      <input id="calNext" type="button" class="mi" value="&gt;">
    </div>
    <input class="btn" id="calAdd" type="hidden" value="+">&nbsp;
    <button type="button" class="gbutton btn btn-primary" data-toggle="modal" data-target="#myModal" style="float:right">Add Appointment</button> &nbsp;
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRoom" style="float:right">Add Room</button>



  </div>




  <!-- (C) CALENDAR WRAPPER -->
  <div id="calWrap" style="padding:0px 10px 0px 10px ">
    <div id="calDays"></div>
    <div id="calBody"></div>
  </div>

  <!-- (D) EVENT FORM -->
  <dialog id="calForm">

    <form method="dialog">
      <div id="evtCX">&times;</div>
      <h2 class="evt100">CALENDAR EVENT</h2>

      <div class="evt50">
        <label>Start Date</label>
        <input id="evtStart" name="evtStart" type="text" disabled onclick="fwriteme()">
      </div>

      <div class="evt50">
        <label for="">End Date</label>
        <input type="text" name="evtEnd" id="evtEnd" disabled>
      </div>

      <div class="evt50">
        <input id="evtColor" type="color" value="#000000" style="display:none !important;">
      </div>

      <div class="evt100">
        <label for="">Set Color</label>
        <input id="evtBG" type="color" value="#11ff00" required>
        <label>(RED = Reject, GREEN = Approve, YELLOW = Pending)</label>
      </div>

      <div class="evt100">
        <label>Room</label>
        <input id="evtTxt" type="text" disabled required>
      </div>

      <div class="evt100">
        <label>Quantiy</label>
        <input id="evtQuantity" type="text" disabled required>
      </div>

      <div class="evt100">
        <label>Time</label>
        <input id="evtTime" type="text" disabled required>
      </div>

      <div class="evt100">
        <label>Equipment/s</label>
        <input type="text" name="evtProjector" id="evtProjector" disabled>
        <input type="text" name="evtWhiteboard" id="evtWhiteboard" disabled>
        <input type="text" name="evtExtCord" id="evtExtCord" disabled>
        <input type="text" name="evtSound" id="evtSound" disabled>
        <input type="text" name="evtSoundSimple" id="evtSoundSimple" disabled>
        <input type="text" name="evtSoundAdvance" id="evtSoundAdvance" disabled>
        <input type="text" name="evtBasicLights" id="evtBasicLights" disabled>
        <input type="text" name="evtCleanup" id="evtCleanup" disabled>
        <input type="text" name="evtCleanupBefore" id="evtCleanupBefore" disabled>
        <input type="text" name="evtCleanupAfter" id="evtCleanupAfter" disabled>

      </div>

      <div class="evt100">
        <label for="">Room Orientation</label>
        <input type="text" name="evtRoomOrientation" id="evtRoomOrientation" disabled>
      </div>

      <div class="evt100">
        <input type="hidden" id="evtID">
        <input class="btn btn-danger" type="submit" id="evtDel" name="evtDel" value="Delete">
        <input class="btn btn-success" type="submit" id="evtSave" name="evtSave" value="Accept">
      </div>

    </form>
  </dialog>


  <!-- Modal for Adding Rooms -->
  <div class="modal fade" id="addRoom" role="dialog">
    <div class="modal-dialog modal-dialog-sm modal-dialog-scrollable">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px" onclick="playAudio();$('#myModal1').modal('show');" data-dismiss="modal">
        </div>
        <div class="modal-body">
          <form action="action.php" method="POST" class="row g-3" enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg">
            <div class="mb-3">
              <label for="">Room Name</label>
              <input type="text" class="form-control form-control-lg" name="roomName" id="roomName" style="text-transform: uppercase;" required>
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Capacity</label>
              <input type="text" class="form-control" name="capacity" id="capacity" required>
            </div>


            <div class="mb-3">
              <label for="" class="form-label">Image</label>
              <input type="file" class="form-control" name="image" id="image">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Description</label>
              <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <br><br>
            <div class="mb-3">
              <button type="submit" class="btn btn-primary" name="addRoom" id="addRoom">Add</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>




  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" style="width:95%;">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px" onclick="playAudio();$('#myModal1').modal('show');" data-dismiss="modal">
        </div>
        <div class="modal-body">
        </div>

        <div class="row">
          <div class="column">
            <div class="card">

              <center>
                <form action="" method="POST">
                  <div class="evt50">
                    <br>
                    <label for="" class="form-label">Select Date</label>
                    <br>
                    <input id="evtStarts" name="evtStart" type="date" onchange="checkRoom()" required>

                  </div>
                  <label for="">Select Room</label>
                  <button type="button" class="btn btn-warning" id="selectingRoomButton" onclick="$('#myModalroom').modal('show');" aria-label="Close" required> Please select </button>
                  <input type="text" name="roomko" id="roomko" class="form-control" placeholder="Place of Meeting" style="height:45px;width:250px;" required readonly>
                  <p id="result"></p>
                  <br>
                  <br>
                  <input type="number" name="qty" id="qty" class="form-control" placeholder="Qty" style="height:45px;width:250px;" required>

              </center>


            </div>
          </div>


          <!-- Time -->
          <div class="column">
            <div class="card">
              <h3>Time</h3>
              <center>

                <label class="form-control" style="text-align:center;width:300px">
                  <input type="checkbox" class="time-checkbox" name="c_allday" id="allday" onclick="fallday()" />
                  All day
                </label>

                <label class="form-control" data-time="67" style="text-align:center;padding-left:10px;width:250px">
                  <input type="checkbox" class="time-checkbox" name="c67" id="x67" onclick="falldayx('67')" />
                  6am - 7am
                </label>

                <label class="form-control" data-time="78" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" class="time-checkbox" name="c78" id="x78" onclick="falldayx('78')" />
                  7am - 8am
                </label>

                <label class="form-control" data-time="89" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" class="time-checkbox" name="c89" id="x89" onclick="falldayx('89')" />
                  8am - 9am
                </label>

                <label class="form-control" data-time="910" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" class="time-checkbox" name="c910" id="x910" onclick="falldayx('910')" />
                  9am - 10am
                </label>

                <label class="form-control" data-time="1011" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" class="time-checkbox" name="c1011" id="x1011" onclick="falldayx('1011')" />
                  10am - 11am
                </label>

                <label class="form-control" data-time="1112" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" class="time-checkbox" name="c1112" id="x1112" onclick="falldayx('1112')" />
                  11am - 12nn
                </label>

                <label class="form-control" data-time="121" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" class="time-checkbox" name="c121" id="x121" onclick="falldayx('121')" />
                  12nn - 1pm
                </label>

                <label class="form-control" data-time="12" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" class="time-checkbox" name="c12" id="x12" onclick="falldayx('12')" />
                  1pm - 2pm
                </label>

                <label class="form-control" data-time="23" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" class="time-checkbox" name="c23" id="x23" onclick="falldayx('23')" />
                  2pm - 3pm
                </label>

                <label class="form-control" data-time="34" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" class="time-checkbox" name="c34" id="x34" onclick="falldayx('34')" />
                  3pm - 4pm
                </label>

                <label class="form-control" data-time="45" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" class="time-checkbox" name="c45" id="x45" onclick="falldayx('45')" />
                  4pm - 5pm
                </label>

                <label class="form-control" data-time="56" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" class="time-checkbox" name="c56" id="x56" onclick="falldayx('56')" />
                  5pm - 6pm
                </label>

              </Center>
            </div>
          </div>

          <div class="column">
            <div class="card">
              <h3>Equipment</h3>

              <center>

                <label class="form-control" style="text-align:left;margin-top:2px;width:300px">
                  <input type="checkbox" name="cprojector" id="cprojector" />
                  Projector
                </label>

                <label class="form-control" style="text-align:left;margin-top:2px;width:300px">
                  <input type="checkbox" name="cwhiteboard" id="cwhiteboard" />
                  Whiteboard
                </label>

                <label class="form-control" style="text-align:left;margin-top:2px;width:300px">
                  <input type="checkbox" name="cextn" id="cextn" />
                  Extension Cord
                </label>

                <label class="form-control" style="text-align:left;margin-top:2px;width:300px">
                  <input type="checkbox" name="checkbox" id="soundsys" onclick="fsoundsys()" />
                  Sound system
                </label>

                <label class="form-control" style="margin-left:10px;text-align:left;margin-top:2px;width:200px">
                  <input type="radio" name="radios" id="s_simple" onclick="fsimple()" />
                  Simple
                </label>

                <label class="form-control" style="margin-left:10px;text-align:left;margin-top:2px;width:200px">
                  <input type="radio" name="radioa" id="s_advance" onclick="fadvance()" />
                  Advanced
                </label>

                <label class="form-control" style="text-align:left;;width:300px">
                  <input type="checkbox" name="basicl" id="basicl" />
                  Basic Lights
                </label>

                <label class="form-control" style="text-align:left;margin-top:2px;width:300px">
                  <input type="checkbox" name="checkbox" id="cleanme" onclick="fclean()" />
                  Clean Up / Disinfect
                </label>
                <label class="form-control" style="margin-left:10px;text-align:left;margin-top:2px;width:200px">
                  <input type="radio" name="c_before" id="c_before" onclick="fbefore()" />
                  Before
                </label>

                <label class="form-control" style="margin-left:10px;text-align:left;margin-top:2px;width:200px">
                  <input type="radio" name="c_after" id="c_after" onclick="fafter()" />
                  After
                </label>

                <label class="form-control" style="text-align:left;margin-top:2px;width:300px">
                  <input type="checkbox" name="checkbox" id="equi_others" onclick="fdisplay()" />
                  Others

                  <input type="text" name="others_rem" id="others_rem" class="form-control" placeholder="Others" style="height:45px;width:250px;">
                </label>

                <br>
                <br>
              </Center>
            </div>
          </div>


          <!-- Room Orientation -->
          <div class="column">
            <div class="card">
              <h3>Room Orientation</h3>

              <center>
                <label class="form-control" style="text-align:left">
                  <input type="radio" name="roomOrientation" value="Classroom" onclick="fdisplay1x()" checked /><a href="#" onclick="$('#myModalroomClassroom').modal('show');" aria-label="Close" style="display: inline; text-align: left; font-size: 1.1rem; text-decoration: none; color: #555555;">Class Room (Tables and chairs) <u style="text-decoration: underline; font-size: .8rem;">Click Me</u> </a>
                </label>

                <label class="form-control" style="text-align:left">
                  <input type="radio" name="roomOrientation" value="Workshop" onclick="fdisplay1x()" />
                  <a href="#" onclick="$('#myModalroomworkshop').modal('show');" aria-label="Close" style="display: inline; text-align: left; font-size: 1.1rem; text-decoration: none; color: #555555;">Workshop <u style="text-decoration: underline; font-size: .8rem;">Click Me</u> </a>
                </label>

                <label class="form-control" style="text-align:left">
                  <input type="radio" name="roomOrientation" value="Training" onclick="fdisplay1x()" />
                  <a href="#" onclick="$('#myModalroomTraining').modal('show');" aria-label="Close" style="display: inline; text-align: left; font-size: 1.1rem; text-decoration: none; color: #555555;">Training (All Chairs) <u style="text-decoration: underline; font-size: .8rem;">Click Me</u> </a>
                </label>

                <label class="form-control" style="text-align:left">
                  <input type="radio" name="roomOrientation" value="Open" onclick="fdisplay1x()" />
                  <a href="#" onclick="$('#myModalroomOpen').modal('show');" aria-label="Close" style="display: inline; text-align: left; font-size: 1.1rem; text-decoration: none; color: #555555;">Open <u style="text-decoration: underline; font-size: .8rem;">Click Me</u> </a>

                </label>

                <label class="form-control" style="text-align:left">
                  <input type="radio" name="roomOrientation" id="room_others" onclick="fdisplay1()" onblur="fdisplay1x()" />
                  Others
                  <input type="text" name="others_rem1" id="others_rem1" class="form-control" placeholder="Others" style="height:40px;width:250px;">
                </label>
              </Center>

              <!-- Modal for Classroom Seating Setup-->
              <div class="modal fade" id="myModalroomClassroom" role="dialog">

                <div class="modal-dialog modal-dialog-scrollable" style="width:95%;">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" onclick="$('#myModalroomClassroom').modal('hide')">&times;</button>
                      <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px;justify-content: start;" onclick="playAudio();$('#myModalroomClassroom').modal('hide')">

                    </div>

                    <div class="modal-body2">
                      <?php
                      echo "<script> document.getElementById('evtStart').value;</script>";
                      ?>
                      <center>

                        <center>
                          <p style="font-weight: bold;">C L A S S R O O M </p>
                          <img src="./images/classroom.png" id="imgko1" alt="logo" class="" style="width:500px;height:auto;padding:10px 10px 10px 10px;background-color:green">
                          <p style="padding: 1rem; margin: 1rem 15rem; text-align: justify; text-indent: 5rem;">A classroom seating arrangements may consist of learners sitting in a circle or around a single large table. This seating arrangement can also be formed using individual desks. Learners and teachers all face one another in this setup, which can support whole-class as well as pair-wise dialogue.</p>
                        </center>
                      </center>

                    </div>

                  </div>
                </div>
              </div>


              <!-- Modal for Workshop Seating Setup-->
              <div class="modal fade" id="myModalroomworkshop" role="dialog">

                <div class="modal-dialog modal-dialog-scrollable" style="width:95%;">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" onclick="$('#myModalroomworkshop').modal('hide')">&times;</button>
                      <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px;justify-content: start;" onclick="playAudio();$('#myModalroomworkshop').modal('hide')">

                    </div>

                    <div class="modal-body2">
                      <?php
                      echo "<script> document.getElementById('evtStart').value;</script>";
                      ?>
                      <center>

                        <center>
                          <img src="./images/5-Different-styles-of-seating-arrangements.png" id="imgko1" alt="logo" class="" style="width:500px;height:auto;padding:10px 10px 10px 10px;background-color:green">
                          <p>Board Room</p>
                        </center>
                      </center>

                    </div>
                  </div>
                </div>
              </div>


              <!-- Modal for Training Seating Setup-->
              <div class="modal fade" id="myModalroomTraining" role="dialog">

                <div class="modal-dialog modal-dialog-scrollable" style="width:95%;">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" onclick="$('#myModalroomTraining').modal('hide')">&times;</button>
                      <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px;justify-content: start;" onclick="playAudio();$('#myModalroomTraining').modal('hide')">

                    </div>

                    <div class="modal-body2">
                      <?php
                      echo "<script> document.getElementById('evtStart').value;</script>";
                      ?>
                      <center>

                        <center>
                          <img src="./images/5-Different-styles-of-seating-arrangements.png" id="imgko1" alt="logo" class="" style="width:500px;height:auto;padding:10px 10px 10px 10px;background-color:green">
                          <p>Board Room</p>
                        </center>
                      </center>

                    </div>
                  </div>
                </div>
              </div>


              <!-- Modal for Open Seating Setup-->
              <div class="modal fade" id="myModalroomOpen" role="dialog">

                <div class="modal-dialog modal-dialog-scrollable" style="width:95%;">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" onclick="$('#myModalroomOpen').modal('hide')">&times;</button>
                      <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px;justify-content: start;" onclick="playAudio();$('#myModalroomOpen').modal('hide')">

                    </div>

                    <div class="modal-body2">
                      <?php
                      echo "<script> document.getElementById('evtStart').value;</script>";
                      ?>
                      <center>

                        <center>
                          <img src="./images/5-Different-styles-of-seating-arrangements.png" id="imgko1" alt="logo" class="" style="width:500px;height:auto;padding:10px 10px 10px 10px;background-color:green">
                          <p>Board Room</p>
                        </center>
                      </center>

                    </div>
                  </div>
                </div>
              </div>


              <input type="submit" name="SubButton" value="Process me" class="btn btn-primary loginButton" style="margin-top: 1.5rem;">

              </form>


            </div>

          </div>
        </div>



        <!-- Modal for Room Selection (Place of Meeting) -->
        <div class="modal fade" id="myModalroom" role="dialog">
          <div class="modal-dialog modal-dialog-scrollable" style="width:95%;">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" onclick="$('#myModalroom').modal('hide')">&times;</button>
                <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px" onclick="playAudio();$('#myModalroom').modal('hide')">
              </div>
              <div class="modal-body2">

                <center>
                  <?php
                  $query = "SELECT * FROM rooms";
                  $result = $connect->query($query);
                  $imageUrls = array();

                  // Fetch and store image URLs in the array
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $imageUrls[] = $row["image"];
                      $roomName[] = $row['rooms'];
                      $descriptions[] = $row['description'];
                    }
                  }
                  ?>
                  <div class="slider-container">
                    <div class="slides">
                      <?php
                      // Loop through the image URLs and generate <figure> elementsonclick="checkRoomAvailability(this.value)"
                      foreach ($imageUrls as $index => $imageUrl) {
                        echo '<figure style="--index:' . $index . '">'; ?>
                        <img src="images/<?php echo $imageUrl; ?>" id="changeImageBackground" alt="logo" width="285" height="285" onclick="selectRoom('<?php echo $roomName[$index]; ?>');">
                      <?php
                        echo '<h1>' . $roomName[$index] . '</h1>';
                        echo '<h5>' . $descriptions[$index] . '</h5>';
                        echo '</figure>';
                      }
                      ?>

                    </div>
                  </div>
                  <button class="prev">&#10094</button>
                  <button class="next">&#10095</button>
                </center>
              </div>
            </div>
          </div>
        </div>





</body>


<script>
  function fwriteme() {

    alert(document.getElementById("evtstart").value);
    // document.getElementById("evtstartv").value=document.getElementById("evtstart").value;
  }

  function endDate() {

    alert(document.getElementById("evtstart").value);
    // document.getElementById("evtstartv").value=document.getElementById("evtstart").value;
  }




  function fdisplay() {
    var x = document.getElementById("equi_others");
    if (x.checked == 1) {

      document.getElementById("others_rem").style.display = "block";
      document.getElementById("others_rem").focus();
      document.getElementById("others_rem").required = true;
    } else {
      document.getElementById("others_rem").style.display = "none";
      document.getElementById("others_rem").required = false;
    }
  }
  document.getElementById("others_rem").style.display = "none";
  document.getElementById("others_rem1").style.display = "none";


  function fdisplay1() {
    var x = document.getElementById("room_others");
    if (x.checked == true) {

      document.getElementById("others_rem1").style.display = "block";
      document.getElementById("others_rem1").focus();
      document.getElementById("others_rem1").required = true;
    } else {
      document.getElementById("others_rem1").style.display = "none";
      document.getElementById("others_rem1").required = false;
    }
  }


  function fdisplay1x() {
    var x = document.getElementById("room_others");
    if (x.checked == true) {

      document.getElementById("others_rem1").style.display = "block";
      document.getElementById("others_rem1").focus();
      document.getElementById("others_rem1").required = true;
    } else {
      document.getElementById("others_rem1").style.display = "none";
      document.getElementById("others_rem1").required = false;
    }
  }





  function fsoundsys() {
    var x = document.getElementById("soundsys");
    if (x.checked == 1) {
      document.getElementById("s_simple").checked = true;
    } else {
      document.getElementById("s_simple").checked = false;
      document.getElementById("s_advance").checked = false;
    }
  }


  function fclean() {
    var x = document.getElementById("cleanme");
    if (x.checked == 1) {
      document.getElementById("c_before").checked = true;
    } else {
      document.getElementById("c_before").checked = false;
      document.getElementById("c_after").checked = false;
    }
  }



  function fsimple() {
    var x = document.getElementById("s_simple");
    if (x.checked == 1) {
      document.getElementById("soundsys").checked = true;
    }

  }

  function fadvance() {
    var x = document.getElementById("s_advance");
    if (x.checked == 1) {
      document.getElementById("soundsys").checked = true;
    }

  }


  function fbefore() {
    var x = document.getElementById("c_before");
    if (x.checked == 1) {
      document.getElementById("cleanme").checked = true;
    }

  }


  function fafter() {
    var x = document.getElementById("c_after");
    if (x.checked == 1) {
      document.getElementById("cleanme").checked = true;
    }

  }


  function fallday() {
    var x = document.getElementById("allday");
    var checkboxes = [
      document.getElementById("x67"),
      document.getElementById("x78"),
      document.getElementById("x89"),
      document.getElementById("x910"),
      document.getElementById("x1011"),
      document.getElementById("x1112"),
      document.getElementById("x121"),
      document.getElementById("x12"),
      document.getElementById("x23"),
      document.getElementById("x34"),
      document.getElementById("x45"),
      document.getElementById("x56"),
    ];

    // Check if any checkbox is disabled
    var anyDisabled = checkboxes.some(function(checkbox) {
      return checkbox.disabled;
    });


    if (anyDisabled) {
      x.checked = false; // Uncheck "All day" if any checkbox is disabled
    } else if (x.checked && !anyDisabled) {
      checkboxes.forEach(function(checkbox) {
        checkbox.checked = true;

      });
    } else {
      checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
      });
    }
  }


  function falldayx1() {

    document.getElementById("allday").checked = false;
  }



  // Get references to all time slot checkboxes
  var checkboxes = [
    document.getElementById("x67"),
    document.getElementById("x78"),
    document.getElementById("x89"),
    document.getElementById("x910"),
    document.getElementById("x1011"),
    document.getElementById("x1112"),
    document.getElementById("x121"),
    document.getElementById("x12"),
    document.getElementById("x23"),
    document.getElementById("x34"),
    document.getElementById("x45"),
    document.getElementById("x56"),
  ];

  // Add an event listener to each checkbox
  checkboxes.forEach(function(checkbox) {
    checkbox.addEventListener("click", function() {
      // Check if any checkbox is disabled
      var anyDisabled = checkboxes.some(function(checkbox) {
        return checkbox.disabled;
      });

      // Update the "All day" checkbox based on whether any checkbox is disabled
      document.getElementById("allday").checked = !anyDisabled;
    });
  });


  function falldayx(timeSlot) {
    // Your existing code for handling checkbox states
  }





  var selectedDate; // Global variable for selected date
  var selectedRoom; // Global variable for selected room

  function selectRoom(roomName) {
    selectedDate = document.getElementById('evtStarts').value;
    selectedRoom = roomName;
    document.getElementById('roomko').value = roomName;
    $('#myModalroom').modal('hide');
    checkRoomAvailability(); // Call checkRoomAvailability here
  }


  function checkRoomAvailability() {
  // Reset checkbox states (enable all checkboxes)
  document.querySelectorAll('.time-checkbox').forEach((checkbox) => {
    checkbox.disabled = false;
  });

  // Rest of your code...
  const image = document.getElementById("changeImageBackground");
  const timeCheckboxes = document.querySelectorAll('.time-checkbox');

  console.log('Selected:', selectedDate);
  console.log('Selected:', selectedRoom);

  // Send an AJAX request to the server to check availability
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "check_availability.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Define the data to be sent in the request
  const data = `roomName=${selectedRoom}&selectedDate=${selectedDate}`;

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) { // Check readyState only once
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        console.log('Response:', response);

        try {
          if (response.available) {
            image.style.borderColor = "green";
          } else {
            image.style.borderColor = "yellow";

            // Disable unavailable time checkboxes
            response.unavailableTimes.forEach((timeSlot) => {
              const checkbox = document.getElementById(timeSlot);
              if (checkbox) {
                checkbox.disabled = true;
                checkbox.classList.add("disabled-checkbox");
              } else {
                console.log('Checkbox not found for time slot:', timeSlot);
              }
            });
          }
        } catch (error) {
          console.error('Error parsing JSON response:', error);
        }
      } else {
        // Handle the request error here
        console.error('Request failed with status:', xhr.status);
      }
    }
  };

  // Send the request
  xhr.send(data);
}



// JavaScript code for checking room availability and setting border color
function checkRoom() {
  // Get the selected date and room name
  const selectedDate = document.getElementById('evtStarts').value;
  const selectedRoom = document.getElementById('roomko').value;

  // Send an AJAX request to the server to check availability
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "check_room.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Define the data to be sent in the request
  const data = `roomName=${selectedRoom}&selectedDate=${selectedDate}`;

  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) { // Check readyState only once
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        console.log('Selected Date:', selectedDate);
        console.log('Response:', response);

        try {
          const color = response.color;

          if (color === "green") {
            // Room has no appointments, set border color to green
            document.getElementById("changeImageBackground").style.borderColor = "green";
          } else if (color === "yellow") {
            // Room has some appointments but not all, set border color to yellow
            document.getElementById("changeImageBackground").style.borderColor = "yellow";
          } else if (color === "red") {
            // Room has all appointments, set border color to red
            document.getElementById("changeImageBackground").style.borderColor = "red";
          }
        } catch (error) {
          console.error('Error parsing JSON response:', error);
        }
      } else {
        // Handle the request error here
        console.error('Request failed with status:', xhr.status);
      }
    }
  };

  // Send the request
  xhr.send(data);
}

// Add an event listener to trigger the room availability check when the date or room selection changes
document.getElementById('evtStarts').addEventListener('change', checkRoom);
document.getElementById('roomko').addEventListener('change', checkRoom);





  // For Image sliding
  const slides = document.querySelector(".slides");
  const slidesCount = document.querySelectorAll(".slides img").length;
  let index = 0;
  let deg = 360 / slidesCount;
  const imgs = document.querySelectorAll(".slides img");

  document.querySelector(".next").addEventListener("click", () => {
    // Remove the 'selected-image' class from the previously selected image
    imgs[index].classList.remove("selected-image");

    index++;
    if (index >= slidesCount) {
      index = 0;
    }

    // Add the 'selected-image' class to the current image
    imgs[index].classList.add("selected-image");

    move();
  });

  document.querySelector(".prev").addEventListener("click", () => {
    // Remove the 'selected-image' class from the previously selected image
    imgs[index].classList.remove("selected-image");

    index--;
    if (index < 0) {
      index = slidesCount - 1;
    }

    // Add the 'selected-image' class to the current image
    imgs[index].classList.add("selected-image");

    move();
  });

  function move() {
    const rotation = deg * index;
    slides.style.transition = "transform 0.5s ease-in";
    slides.style.transform = `perspective(1000px) rotateY(-${rotation}deg)`;
  }

  // Initialize the slider when the DOM is ready
  document.addEventListener("DOMContentLoaded", function() {
    move(); // Initialize the slider at the first image
    // Add 'selected-image' class to the initial image
    imgs[index].classList.add("selected-image");
  });
</script>

</html>