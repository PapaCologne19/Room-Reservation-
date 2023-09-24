<?php
include '../room/connect.php';

// Approve User
if(isset($_POST["approve_button_click"])){
    $approveID = $_POST['approveIDs'];
    $status = "1";

    $query = "UPDATE user SET status = '$status' WHERE id = '$approveID'";
    $result = $connect->query($query);

    if($result){
        $_SESSION['success'] = "Successfully Approved";
        header("location: index.php");
    }
}

// Reject User
if(isset($_POST['reject_button_click'])){
    $rejectID = $_POST['rejectIDs'];
    $status2 = "2";
 
    $query2 = "UPDATE user SET status = '$status2' WHERE id = '$rejectID'";
    $result2 = $connect->query($query2);

    if($result2){
        $_SESSION['success'] = "Successfully Rejected";
        header("location: index.php");
    }
}




?>