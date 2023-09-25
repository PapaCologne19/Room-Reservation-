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

  $ireserver = "1";
  $userID = $_POST['userID'];
  $userCategory = $_POST['userCategory'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $fullname = $firstname . " " . $lastname;
  $evtStart = $_POST['evtStart'];
  $evtEnd = $_POST['evtStart'];
  $roomko = $_POST['roomko'];
  $qty = $_POST['qty'];
  $room_orientation = isset($_POST['roomOrientation']) ? $_POST['roomOrientation'] : $_POST['others_rem1'];


  $others_rem = $_POST['others_rem'];
  $status = "pending";
  // $other_equipment = $_POST['equi_others'];

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


  
    // No existing data, proceed with the insertion
    $query = "INSERT INTO events (user_id, evt_start, evt_end, evt_text, evt_color, evt_bg, qty, projector, whiteboard, ext_cord, sound, sound_simple, sound_advance, basic_lights,
    cleanup, cleanup_before, cleanup_after, others, others1, x67, x78, x89, x910, x1011, x1112, x121, x12, x23, x34, x45, x56, room_orientation, fullName, user_category) 
    VALUES ('$userID','$evtStart', '$evtEnd', '$roomko', '#000000', '#ffff00', '$qty', '$cprojector', '$cwhiteboard', '$cextn', 'sound', '$radios', '$radioa', '$basicl',
    'cleanup', '$c_before', '$c_after', '$other_equipment', '$others_rem', '$x67v', '$x78v', '$x89v', '$x910v', '$x1011v', '$x1112v', '$x121v', '$x12v', '$x23v', '$x34v', '$x45v', '$x56v', '$room_orientation', '$fullname', '$userCategory')";

    $result = mysqli_query($connect, $query);

    if (!$result) {
    // Handle the case where the insertion query failed
    echo "Insertion failed.";
    }else{
      header("location: index.php");
    }
  }

if (isset($_SESSION["username"], $_SESSION["password"])) {
?>


  <!-- HTML Start here -->
  <!DOCTYPE html>
  <html>

  <head>
    <title>Calendar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5">
    <meta http-equiv="refresh" content="1800; url=logout.php">

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
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Julius+Sans+One&family=Poppins&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">
    <!-- Bootstrap -->


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
      <div id="calPeriod" style="width: 70%;">
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
      <center>
        <img src="images/pcn.png" alt="" width="15%">
      </center>
      <?php
      $query = "SELECT * FROM user WHERE category = '" . $_SESSION['category'] . "'";
      $result = $connect->query($query);
      $row = $result->fetch_assoc();

      if ($row['category'] === "ADMIN") {

      ?>
        <input class="btn" id="calAdd" type="hidden" value="+">&nbsp;
        <button type="button" class="gbutton btn btn-primary" data-toggle="modal" data-target="#myModal" style="float:right">Add Appointment</button> &nbsp;
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRoom" style="float:right">Add Room</button>&nbsp;
        <button type="button" class="btn btn-danger" onclick="location.href = 'logout.php';">Logout</button>

      <?php
      } else {
      ?>
        <input class="btn" id="calAdd" type="hidden" value="+">&nbsp;
        <button type="button" class="gbutton btn btn-primary" data-toggle="modal" data-target="#myModal" style="float:right;">Add Appointment</button> &nbsp;
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRoom" style="float:right; display: none;">Add Room</button>&nbsp;
        <button type="button" class="btn btn-danger" onclick="location.href = 'logout.php';">Logout</button>
      <?php } ?>


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
          <input type="hidden" name="evtCategory" id="evtCategory">
          <input type="hidden" name="evtUserID" id="evtUserID">
        <div class="evt50">
          <label for=""> Requestor</label>
          <input type="text" name="evtRequestor" id="evtRequestor" disabled>
        </div>

        <div class="evt50">
          <label>Requested Date</label>
          <input id="evtStart" name="evtStart" type="text" disabled onclick="fwriteme()">
        </div>

        <div class="evt50">
          <input type="hidden" name="evtEnd" id="evtEnd" disabled>
        </div>

        <div class="evt100">
          <label for="">Time</label>
          <input type="text" name="evtEndAll" id="evtEndAll" disabled>
          <input type="text" name="evtEnd1" id="evtEnd1" disabled>
        </div>

        <div class="evt100">
          <input id="evtColor" type="color" value="#000000" style="display:none !important;">
        </div>

        <?php
        $query = "SELECT * FROM user WHERE category = '" . $_SESSION['category'] . "'";
        $result = $connect->query($query);
        $row = $result->fetch_assoc();

        if ($row['category'] === "ADMIN") {

        ?>
          <div class="evt100">
            <select name="evtBG" id="evtBG" class="form-control" aria-placeholder="select" style="display: none;">
              <option value="#80c87e">Green (Approve)</option>
              <option value="#e0c23b">Yellow (Pending)</option>
              <option value="#f47171">Red (Rejected)</option>
            </select>
          </div>
        <?php } else {
        ?>
          <div class="evt100">
            <label for="" class="form-label">Status</label>
            <select name="evtBG" id="evtBG" class="form-control" aria-placeholder="select" disabled>
              <option value="#80c87e">Green (Approve)</option>
              <option value="#e0c23b">Yellow (Pending)</option>
              <option value="#f47171">Red (Rejected)</option>
            </select>
          </div>
        <?php } ?>


        <div class="evt100">
          <label>Room</label>
          <input id="evtTxt" type="text" disabled required>
        </div>

        <div class="evt100">
          <label>Quantity</label>
          <input id="evtQuantity" type="text" disabled required>
        </div>

        <div class="evt100">
          <input id="evtTime" type="hidden" disabled required>
        </div>

        <div class="evt100 col-lg-3">
          <label>Equipment/s</label>
          <input type="text" name="evtProjector" id="evtProjector" disabled>
          <input type="text" name="evtWhiteboard" id="evtWhiteboard" disabled>
          <input type="text" name="evtExtCord" id="evtExtCord" disabled>
          <input type="text" name="evtSound" id="evtSound" disabled>
          <input type="text" name="evtBasicLights" id="evtBasicLights" disabled>
          <input type="text" name="evtCleanup" id="evtCleanup" disabled>
          <input type="text" name="evtOthers" id="evtOthers" disabled>
        </div>

        <div class="evt100">
          <label for="">Room Orientation</label>
          <input type="text" name="evtRoomOrientation" id="evtRoomOrientation" disabled>
        </div>


        <?php
        $query = "SELECT * FROM user WHERE category = '" . $_SESSION['category'] . "'";
        $result = $connect->query($query);
        $row = $result->fetch_assoc();

        if ($row['category'] === "ADMIN") {

        ?>
          <div class="evt100">
            <input type="hidden" id="evtID">
            <input class="btn btn-danger" type="submit" id="evtDel" name="evtDel" value="Reject">
            <input class="btn btn-success" type="submit" id="evtSave" name="evtSave" value="Approve">
          </div>
        <?php } else {
        ?>
          <div class="evt100">
            <input type="hidden" id="evtID">
            <input class="btn btn-danger" type="hidden" id="evtDel" name="evtDel" value="Delete" style="display: none !important;">
            <input class="btn btn-success" type="submit" id="evtSave" name="evtSave" value="Accept" style="display: none;">
          </div>
        <?php } ?>

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
                <textarea name="description" maxlength="500" id="description" class="form-control" cols="30" rows="10"></textarea>
              </div>

              <br><br>
              <div class="mb-3" style="float: right;">
                <button type="submit" class="btn btn-primary" name="addRoom" id="addRoom">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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

          <div class="row" style="margin: 10px !important;">
            <div class="column">
              <div class="card">
                <h3>Date</h3>
                <center>
                  <?php
                  $query = "SELECT * FROM user WHERE username = '" . $_SESSION['username'] . "'";
                  $result = $connect->query($query);
                  $row = $result->fetch_assoc();
                  ?>
                  <form action="" method="POST">
                    <input type="hidden" name="userID" id="userID" value="<?php echo $row['id']?>">
                    <input type="hidden" name="userCategory" id="userCategory" value="<?php echo $row['category']?>">
                    <input type="hidden" name="firstname" id="firstname" value="<?php echo $row['firstname']?>">
                    <input type="hidden" name="lastname" id="lastname" value="<?php echo $row['lastname']?>">
                    <div class="evt50">
                      <br>
                      <label for="" class="form-label">Select Date</label>
                      <br>
                      <input id="evtStarts" name="evtStart" type="date" onchange="checkRoom()" required>

                    </div>
                    <button type="button" class="btn btn-warning" id="selectingRoomButton" aria-label="Close" required style="display: none;"> Please select </button>
                    <input type="text" name="roomko" id="roomko" class="form-control" placeholder="Place of Meeting" style="height:45px;width:250px;" required readonly>
                    <p id="result"></p>
                    <div class="mb-3">
                      <label for="" class="form-label">Input Quantity</label>
                      <input type="number" name="qty" id="qty" class="form-control" placeholder="Qty" style="height:45px;width:250px;" required>
                    </div>

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
                    <input type="radio" name="roomOrientation" value="Classroom" onclick="fdisplay1x()" checked /><a href="#" onclick="$('#myModalroomClassroom').modal('show');" aria-label="Close" style="display: inline; text-align: left; font-size: 1.3rem; text-decoration: none; color: #555555;">Class Room (Tables and chairs) <img src="images/classroom.png" alt="picture" style="float: right;" width="20%"> </a>
                  </label>

                  <label class="form-control" style="text-align:left">
                    <input type="radio" name="roomOrientation" value="Workshop" onclick="fdisplay1x()" />
                    <a href="#" onclick="$('#myModalroomworkshop').modal('show');" aria-label="Close" style="display: inline; text-align: left; font-size: 1.5rem; text-decoration: none; color: #555555;">Workshop <img src="images/workshop.png" alt="picture" style="float: right;" width="20%"> </a>
                  </label>

                  <label class="form-control" style="text-align:left">
                    <input type="radio" name="roomOrientation" value="Training" onclick="fdisplay1x()" />
                    <a href="#" onclick="$('#myModalroomTraining').modal('show');" aria-label="Close" style="display: inline; text-align: left; font-size: 1.5rem; text-decoration: none; color: #555555;">Training (All Chairs) <img src="images/trainingroom.png" alt="picture" style="float: right;" width="20%"> </a>
                  </label>

                  <label class="form-control" style="text-align:left">
                    <input type="radio" name="roomOrientation" value="Open" onclick="fdisplay1x()" />
                    <a href="#" onclick="$('#myModalroomOpen').modal('show');" aria-label="Close" style="display: inline; text-align: left; font-size: 1.5rem; text-decoration: none; color: #555555;">Open <img src="images/openroom.png" alt="picture" style="float: right;" width="20%"> </a>

                  </label>

                  <label class="form-control" style="text-align:left">
                    <input type="radio" name="roomOrientation" id="room_others" onclick="fdisplay1()" onblur="fdisplay1x()" />
                    Others
                    <input type="text" name="roomOrientation" id="others_rem1" class="form-control" placeholder="Others" style="height:40px;width:250px;">
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
                            <img src="./images/workshop.png" id="imgko1" alt="logo" class="" style="width:500px;height:auto;padding:10px 10px 10px 10px;background-color:green">
                            <p>Workshop Room</p>
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
                            <img src="./images/trainingroom.png" id="imgko1" alt="logo" class="" style="width:500px;height:auto;padding:10px 10px 10px 10px;background-color:green">
                            <p>Training Room</p>
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
                            <img src="./images/openroom.png" id="imgko1" alt="logo" class="" style="width:500px;height:auto;padding:10px 10px 10px 10px;background-color:green">
                            <p>Open Room</p>
                          </center>
                        </center>

                      </div>
                    </div>
                  </div>
                </div>

                <br><br><br><br>
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
                    <div class="container">
                      <div class="row">
                        <?php
                        $query = "SELECT * FROM rooms";
                        $result = $connect->query($query);
                        $imageUrls = array();

                        // Fetch and store image URLs in the array
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            $imageUrl = $row["image"];
                            $roomName = $row['rooms'];
                            $descriptions = $row['description'];

                        ?>
                            <div class="col-md-4">
                              <img src="images/<?php echo $imageUrl; ?>" id="<?php echo str_replace(' ', '-', strtolower($roomName)); ?>" alt="logo" width="285" height="285" onclick="selectRoom('<?php echo $roomName; ?>');focusQtyInput();">
                              <h4><?php echo $roomName; ?></h3>
                                <div class="card-body">
                                  <p style="text-align: justify; text-indent: ;"><?php echo $descriptions ?></p>
                                </div>
                            </div>


                        <?php  }
                        } ?>
                      </div>
                    </div>
                  </center>
                </div>
              </div>
            </div>
          </div>





  </body>


  <script>
    function focusQtyInput() {
    // Set focus on the "Qty" input field
    setTimeout(function() {
      document.getElementById('qty').focus();
    }, 100); 
  }

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


      // Send an AJAX request to the server to check availability
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "check_availability.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      // Define the data to be sent in the request
      const data = `roomName=${selectedRoom}&selectedDate=${selectedDate}`;

      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { // Check readyState only once
          if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);

            try {
              if (response.available) {

              } else {


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
      $('#myModalroom').modal('show');

      // Get the selected date
      const selectedDate = document.getElementById('evtStarts').value;

      // Send an AJAX request to the server to check availability
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "check_room.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      // Define the data to be sent in the request (only selectedDate)
      const data = `selectedDate=${selectedDate}`;

      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { // Check readyState only once
          if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);

            try {
              // Loop through the response to set border colors for each room
              for (const roomName in response) {
                const color = response[roomName];

                // Convert room name to a suitable format for id (lowercase, replace spaces with hyphens)
                const roomId = roomName.toLowerCase().replace(/ /g, '-');

                // Try to find an element with this id
                const roomElement = document.getElementById(roomId);

                // If such an element exists, change its border color
                if (roomElement) {
                  roomElement.style.borderColor = color;
                  roomElement.style.borderWidth = "10px";
                  roomElement.style.borderStyle = "solid";
                  roomElement.style.borderRadius = "10px";
                } else {
                  console.error('No element found with id:', roomId);
                }
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

    // Add an event listener to trigger the room availability check when the date selection changes
    document.getElementById('evtStarts').addEventListener('change', checkRoom);
  </script>

  </html>
<?php
} else {
  header("Location: ../index.php");
  session_destroy();
}
mysqli_close($connect);
?>