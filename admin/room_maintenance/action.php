<?php

include '../../room/connect.php';
session_start();

if (isset($_POST['addRoom'])) {
  $roomName = mysqli_real_escape_string($connect, $_POST['roomName']);
  $capacity = mysqli_real_escape_string($connect, $_POST['capacity']);
  $description = mysqli_real_escape_string($connect, $_POST['description']);
  $room = strtoupper($roomName);

  $file = $_FILES['image'];
  $fileName = $_FILES['image']['name'];
  $fileTempName = $_FILES["image"]["tmp_name"];
  $fileSize = $_FILES["image"]["size"];
  $fileError = $_FILES["image"]["error"];
  $fileType = $_FILES["image"]["type"];
  $folder = "../images/" . $fileName;

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 5000000) {
        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = $folder;
        move_uploaded_file($fileTempName, $fileDestination);

        if (!empty($file)) {
          $sql = "INSERT INTO rooms(rooms, capacity, image, description) VALUES('$room', '$capacity', '$fileName', '$description')";
          $result = $connect->query($sql);

          if ($result) {
            $_SESSION['success'] = "Successfully Added";
            header('Location: ../admin.php');
          } else {
            echo "Error";
          }
        } else {
          $_SESSION['errorMessage'] = "Failed to upload picture";
        }
      } else {
        $_SESSION['errorMessage'] = "You image is too big!";
      }
    } else {
      $_SESSION['errorMessage'] = " There was an error uplading your picture!";
    }
  } else {
    $_SESSION['errorMessage'] = "You cannot upload this type of Image. (Allowed file type: jpeg, jpg, png";
  }
}


// Deleting Rooms
if (isset($_POST['delete_button_click'])) {
  $id = $_POST['deleteIDs'];

  $query = "DELETE FROM rooms WHERE id = '$id'";
  $result = $connect->query($query);

  $_SESSION['success'] = "Successfully Deleted";
  header('Location: ../admin.php');
}

// Updating Rooms
if (isset($_POST['updateRoom'])) {
  $updateID = $_POST['updateRoomID'];
  $updateRoomName = $_POST['updateRoomName'];
  $updateCapacity = $_POST['updateCapacity'];
  $updateDescription = $_POST['updateDescription'];

  $updateQuery = "UPDATE rooms SET rooms = '$updateRoomName', capacity = '$updateCapacity', description = '$updateDescription' WHERE id = '$updateID'";
  $updateResults = $connect->query($updateQuery);

  if ($updateResults) {
    $_SESSION['success'] = "Successfully Updated";
    header('Location: ../admin.php');
  }
}


// Updating Room Image
if (isset($_POST['updateImageButton'])) {
  $updateRoomImageID = $_POST['updateImageRoomID'];
  $updateRoomImage = $_POST['updateImage'];

  $file = $_FILES['updateImage'];
  $fileName = $_FILES['updateImage']['name'];
  $fileTempName = $_FILES["updateImage"]["tmp_name"];
  $fileSize = $_FILES["updateImage"]["size"];
  $fileError = $_FILES["updateImage"]["error"];
  $fileType = $_FILES["updateImage"]["type"];
  $folder = "../images/" . $fileName;

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 5000000) {
        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = $folder;
        move_uploaded_file($fileTempName, $fileDestination);

        if (!empty($file)) {
          $updateRoomImageQuery = "UPDATE rooms SET image = '$fileName' WHERE id = '$updateRoomImageID'";
          $result = $connect->query($updateRoomImageQuery);

          if ($result) {
            $_SESSION['success'] = "Successfully Updated";
            header('Location: ../admin.php');
          } else {
            echo "Error";
          }
        } else {
          $_SESSION['errorMessage'] = "Failed to upload picture";
        }
      } else {
        $_SESSION['errorMessage'] = "You image is too big!";
      }
    } else {
      $_SESSION['errorMessage'] = " There was an error uplading your picture!";
    }
  } else {
    $_SESSION['errorMessage'] = "You cannot upload this type of Image. (Allowed file type: jpeg, jpg, png";
  }
}
