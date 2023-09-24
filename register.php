<?php
include 'room/connect.php';

if (isset($_POST['register'])) {
    $id_number = mysqli_real_escape_string($connect, $_POST['idnumber']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $firstname = mysqli_real_escape_string($connect, $_POST['firstName']);
    $middlename = mysqli_real_escape_string($connect, $_POST['middleName']);
    $lastname = mysqli_real_escape_string($connect, $_POST['lastName']);
    $contact_number = mysqli_real_escape_string($connect, $_POST['contactNumber']);
    $division = $_POST['division'];
    $category = "USER";

    $query = "INSERT INTO user(id_number, username, password, firstname, middlename, lastname, contactNumber, division, category) 
    VALUES('$id_number', '$username', '$password', '$firstname', '$middlename', '$lastname', '$contact_number', '$division', '$category')";
    $result = $connect->query($query);

    if ($result) {
        echo "Successfully Created an Account";
        header("Location: index.php");
    } else {
        echo "Error";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/bootstrap/js/bootstrap.min.js"></script>


    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="row g-3">
                    <div class="mb-3">
                        <label for="" class="form-label">ID Number</label>
                        <input type="number" class="form-control" name="idnumber" id="idnumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="middleName" id="middleName" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastName" id="lastName" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Contact Number</label>
                        <input type="number" class="form-control" name="contactNumber" id="contactNumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Division</label>
                        <select name="division" class="form-select" id="division" required>
                            <option value="" disabled selected>Select Division Name</option>
                            <option value="BD1-BU1_CORE">BD1-BU1_CORE</option>
                            <option value="BD1-BU2_SELECTA">BD1-BU2_SELECTA</option>
                            <option value="BD1-BU3_BEST_CENTER">BD1-BU3_BEST_CENTER</option>
                            <option value="BD1-BU3_SPECIAL_ACTIVATION">BD1-BU3_SPECIAL_ACTIVATION</option>
                            <option value="BD2-BU1">BD2-BU1</option>
                            <option value="BD3">BD3</option>
                            <option value="BSG">BSG</option>
                            <option value="BSG2">BSG2</option>
                            <option value="HR">HR</option>
                            <option value="FINANCE">FINANCE</option>
                            <option value="PPI">PPI</option>
                            <option value="STRAT">STRAT</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="register" class="btn btn-success">Register</button>
                        <button type="button" class="btn btn-danger" onclick="location.href = 'index.php';">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>