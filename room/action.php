<?php
 include 'connect.php';
 session_start();

 if(isset($_POST['addRoom'])){
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
    $folder = "images/" . $fileName;

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

                if($result){
                    $_SESSION['successMessage'] = "Successfully Added";
                    header('Location: index.php');
                }
                else{
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


    if(!empty($roomName) && !empty($capacity)){
        
    }
 }
?>