<?php
session_start();
class Calendar
{
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo = null;
  private $stmt = null;
  public $error = "";
  function __construct()
  {
    $this->pdo = new PDO(
      "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
      DB_USER,
      DB_PASSWORD,
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]
    );
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct()
  {
    if ($this->stmt !== null) {
      $this->stmt = null;
    }
    if ($this->pdo !== null) {
      $this->pdo = null;
    }
  }

  // (C) HELPER - RUN SQL QUERY
  function query($sql, $data = null)
  {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);
  }




  // (D) SAVE EVENT
  function save($start, $end, $txt, $color, $bg , $id = null)
  {
      $bg = "#009900";

    // (D2) RUN SQL
    if ($id === null) {
      $sql = "INSERT INTO `events` (`evt_start`, `evt_end`, `evt_text`, `evt_color`, `evt_bg`) VALUES (?,?,?,?,?)";
      $data = [$start, $end, strip_tags($txt), $color, $bg];
    } else {
      $sql = "UPDATE `events` SET `evt_start`= ?, `evt_end`= ?, `evt_text`= ?, `evt_color`= ?, `evt_bg`= ?  
      WHERE `evt_id`= ?";
      $data = [$start, $end, strip_tags($txt), $color, $bg, $id];

      // $sql = "UPDATE `events` SET `evt_start`=?, `evt_end`=?, `evt_text`=?, `evt_color`=?, `evt_bg`=? WHERE `evt_id`=?";
      // $data = [$start, $end, strip_tags($txt), $color, $bg, $id];

    }
    $this->query($sql, $data);

    return true;
  }




  // (E) DELETE EVENT
  function del($bg, $id)
  {
    $bg = "#ff0000";

    if ($id != null) {
      $sql = "UPDATE `events` SET `evt_bg`= ?  
      WHERE `evt_id`= ?";
      $data = [$bg, $id];
    }
    $this->query($sql, $data);
    return true;
  }





  // (F) GET EVENTS FOR SELECTED PERIOD
  function get($month, $year)
  {
    // (F1) DATE RANGE CALCULATIONS
    $month = $month < 10 ? "0$month" : $month;
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dateYM = "{$year}-{$month}-";
    $start = $dateYM . "01 00:00:00";
    $end = $dateYM . $daysInMonth . " 23:59:59";
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $user_id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $category = $_SESSION['category'];
    // (F2) GET EVENTS
    // s & e : start & end date
    // c & b : text & background color
    // t : event text


    $this->query("SELECT * FROM `events` WHERE (
      (`evt_start` BETWEEN ? AND ?)
      OR (`evt_end` BETWEEN ? AND ?)
      OR (`evt_start` <= ? AND `evt_end` >= ?)
    )", [$start, $end, $start, $end, $start, $end]);


    $events = [];
    while ($r = $this->stmt->fetch()) {
      $events[$r["evt_id"]] = [
        "s" => $r["evt_start"], "e" => $r["evt_end"],
        "c" => $r["evt_color"], "b" => $r["evt_bg"], 
        "t" => $r["evt_text"], "q" => $r["qty"], "time" => $r["allday"],
        "projector" => $r["projector"], "whiteboard" => $r["whiteboard"],
        "ext_cord" => $r["ext_cord"], "sound" => $r["sound"],
        "sound_simple" => $r["sound_simple"], "sound_advance" => $r["sound_advance"],
        "basic_lights" => $r["basic_lights"], "cleanup" => $r["cleanup"],
        "cleanup_before" => $r["cleanup_before"], "cleanup_after" => $r["cleanup_after"],
        "room_orientation" => $r["room_orientation"], "other_equipment" => $r['others1'],

        "x67" => $r["x67"], "x78" => $r["x78"], "x89" => $r["x89"], "x910" => $r["x910"], 
        "x1011" => $r["x1011"], "x1112" => $r["x1112"], "x121" => $r["x121"], "x12" => $r["x12"], 
        "x23" => $r["x23"], "x34" => $r["x34"], "x45" => $r["x45"], "x56" => $r["x56"],
        "firstname" => $firstname, "lastname" => $lastname, "userCategory" => $r['user_category'], "userID" => $r["user_id"],
        "category" => $category, "username" => $username, "userIDSESSION" => $user_id, "fullname" => $r["fullName"],
        
       ];
    }

    // (F3) RESULTS
    return count($events) == 0 ? false : $events;
  }
}


// (G) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "calendar");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (H) NEW CALENDAR OBJECT
$_CAL = new Calendar();


