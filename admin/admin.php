<?php
include '../room/connect.php';
session_start();

if (isset($_SESSION["username"], $_SESSION["password"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="refresh" content="1800; url=logout.php">
        <link rel="shortcut icon" href="../room/images/pcn.png" type="image/x-icon">
        <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
        <script src="../bootstrap/bootstrap/js/bootstrap.js"></script>
        <script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

        <!-- Sweet Alert and Jquery -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins&family=Roboto&family=Thasadith&display=swap" rel="stylesheet">

        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <link rel="stylesheet" href="room_maintenance/style.css">


        <title>Admin Panel</title>
    </head>

    <body>
        <?php
        if (isset($_SESSION['success'])) { ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "<?php echo $_SESSION['success']; ?>",
                })
            </script>
        <?php unset($_SESSION['success']);
        }
        ?>

        <center>
            <div class="container">
                <div class="row pt-3" style="float: right !important;">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary" onclick="location.href = 'logout.php'">Logout</button>
                    </div>
                </div>
                <div class="row">
                    <div class="justify-content-left pt-5">
                        <img src="../room/images/pcn.png" alt="" class="img-responsive" style="float: left;" width="10%">
                        <?php
                        $sql = "SELECT * FROM user WHERE username = '" . $_SESSION['username'] . "'";
                        $output = $connect->query($sql);
                        $rows = $output->fetch_assoc();
                        ?>
                        <div class="col-md-3" style="float: right;">
                            <h4>Welcome, Admin <?php echo $rows['firstname'] ?></h4>
                        </div>
                    </div>
                </div>




                <ul class="nav nav-tabs nav-tabs-bordered justify-content-center">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#account-management">Account Management</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#room-maintenance">Room Maintenance</button>
                    </li>
                </ul>
                <div class="tab-content pt-2">
                    <div class="tab-pane fade show active profile-overview" id="account-management">
                        <div class="container pt-5">
                            <table class="table table-sm align-middle mb-0 bg-white p-3 bg-opacity-10 border border-secondary border-start-0 border-end-0 rounded-end mdc-data-table" id="userTable">
                                <thead class="bg-light">
                                    <tr>
                                        <th>ID Number</th>
                                        <th>Fullname</th>
                                        <th>Contact Number</th>
                                        <th>Division</th>
                                        <th>Status</th>
                                        <th>Date Registered</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT *, DATE_FORMAT(timestamp, '%M %d, %Y') as date_format 
                                            FROM user WHERE category = 'USER' 
                                            ORDER BY status ASC";
                                    $result = $connect->query($query);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td>
                                                <p class="text-muted mb-0"><?php echo $row['id_number'] ?></p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1"><?php echo $row['lastname'], ", ", $row["firstname"], " ", $row["middlename"] ?></p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1"><?php echo $row['contactNumber'] ?></p>
                                            </td>
                                            <td>
                                                <p class="fw-normal mb-1"><?php echo $row['division'] ?></p>
                                            </td>

                                            <?php
                                            if ($row['status'] === "0") { ?>
                                                <td>
                                                    <span class="badge bg-warning rounded-pill d-inline"><?php echo "Pending"; ?></span>
                                                </td>
                                            <?php } elseif ($row['status'] === "1") { ?>
                                                <td>
                                                    <span class="badge bg-success rounded-pill d-inline text-white"><?php echo "Approved"; ?></span>
                                                </td>
                                            <?php } elseif ($row["status"] === "2") { ?>
                                                <td>
                                                    <span class="badge bg-danger rounded-pill d-inline text-white"><?php echo "Rejected";
                                                                                                                } ?></span>
                                                </td>


                                                <td><?php echo $row['date_format'] ?></td>
                                                
                                                <?php if($row["status"] === "0"){?>
                                                <td>
                                                    <input type="hidden" name="approveID" id="approveID" class="approveID" value="<?php echo $row['id']; ?>">
                                                    <button type="button" class="btn btn-success btn-sm approveButton" name="approveButton" id="approveButton">Approve</button>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="rejectID" id="rejectID" class="rejectID" value="<?php echo $row['id'] ?>">
                                                    <button type="button" class="btn btn-danger btn-sm rejectButton" name="rejectButton" id="rejectButton">Reject</button>
                                                </td>
                                                <?php } elseif($row["status"] === "1" || $row["status"] === "2"){ ?>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm approveButton" name="approveButton" id="approveButton" disabled>Approve</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm rejectButton" name="rejectButton" id="rejectButton" disabled>Reject</button>
                                                </td>
                                                <?php }?>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>






                    <div class="tab-pane fade show" id="room-maintenance">
                        <div class="container">

                            <div class="button">
                                <button type="button" class="btn btn-outline-info btn-sm my-4 float-end addRooms">Add Rooms</button>
                            </div>
                            <table class="table p-3 table-sm align-middle mb-0 p-3 bg-info bg-opacity-10 border border-info border-start-0 border-end-0 rounded-end mdc-data-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Rooms</th>
                                        <th class="text-center">Capacity</th>
                                        <th style="text-align: center;">Image</th>
                                        <th style="text-align: center;">Active</th>
                                        <th class="text-center">Time Added</th>
                                        <th colspan="2" class="text-center">Function</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php
                                    $query = "SELECT * FROM rooms";
                                    $result = $connect->query($query);
                                    while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $row['id']; ?></td>
                                            <td class="text-center"><?php echo $row['rooms']; ?></td>
                                            <td class="text-center"><?php echo $row['capacity']; ?></td>
                                            <td style="width: 10%; justify-content: center">
                                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#updateRoomImage-<?php echo $row['id']; ?>">
                                                    <img src="../room/images/<?php echo $row['image']; ?>" alt="Images" style="width: 100%;">
                                                </a>
                                            </td>
                                            <td style="text-align: center;"><?php echo $row['active']; ?></td>
                                            <td class="text-center"><?php echo $row['timestamp']; ?></td>
                                            
                                            <td class="text-center">
                                                <input type="hidden" class="updateID" name="updateID" id="updateID" value="<?php echo $row['id'] ?>">
                                                <button type="button" class="btn btn-sm updateButton button" name="updateButton" id="updateButton">Update</button>
                                            <td class="text-center">
                                                <input type="hidden" class="deleteID" name="deleteID" id="deleteID" value="<?php echo $row['id'] ?>">
                                                <button type="button" class="btn btn-sm deleteButton" name="deleteButton" id="deleteButton">Delete</button>
                                            </td>
                                        </tr>




                                        <!-- Modal for Updating Room Information -->
                                        <div class="modal fade" id="updateRoomImage-<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <img src="../room/images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px" onclick="playAudio();$('#myModal1').modal('show');" data-dismiss="modal">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="../room/images/<?php echo $row['image'] ?>" alt="" width="100%" height="100%"><br><br><br>
                                                        <form action="room_maintenance/action.php" method="POST" class="row g-3 needs-validation" enctype='multipart/form-data' accept="image/png, image/jpeg, image/jpg">
                                                            <input type="hidden" name="updateImageRoomID" value="<?php echo $row['id'] ?>">
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Update Image</label>
                                                                <input type="file" class="form-control" name="updateImage" id="updateImage" required>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn button" name="updateImageButton" id="updateImageButton">Save changes</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>



                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </center>
<br><br><br><br><br>
        <!-- Modal For Adding Rooms -->
        <div class="modal fade" id="addRooms" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="../room/images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px" onclick="playAudio();$('#myModal1').modal('show');" data-dismiss="modal">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="room_maintenance/action.php" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg">
                            <div class="mb-3">
                                <label for="">Room Name</label>
                                <input type="text" name="roomName" id="roomName" class="form-control" style="text-transform: uppercase;" required>
                            </div>

                            <div class="mb-3">
                                <label for="">Capacity</label>
                                <input type="number" name="capacity" id="capacity" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="description" class="form-control" maxlength="500" cols="30" rows="10" required></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn button" name="addRoom" id="addRoom">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal for Updating Room Information -->
        <div class="modal fade" id="updateRooms" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="../room/images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px" onclick="playAudio();$('#myModal1').modal('show');" data-dismiss="modal">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="modalIdDisplay"></p>
                        <?php
                        $sql = "SELECT * FROM rooms";
                        $result = $connect->query($sql);
                        if (mysqli_num_rows($result)) {
                            $row = $result->fetch_assoc();
                        ?>
                            <p id="modalIdDisplay"></p>
                            <form action="room_maintenance/action.php" method="POST" class="row g-3 needs-validation">
                                <input type="hidden" class="form-control" name="updateRoomID" id="updateRoomID" value="<?php echo $row['id'] ?>">
                                <div class="mb-3">
                                    <label for="">Room Name</label>
                                    <input type="text" class="form-control" name="updateRoomName" id="updateRoomName" value="<?php echo $row['rooms'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Capacity</label>
                                    <input type="number" class="form-control" name="updateCapacity" id="updateCapacity" value="<?php echo $row['capacity']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="updateDescription" maxlength="500" id="updateDescription" cols="30" rows="10" required></textarea>
                                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn button" name="updateRoom" id="updateRoom">Save changes</button>
                    </div>
                    </form>
                <?php }
                ?>
                </div>
            </div>
        </div>

        <script>
            // Datatables
            new DataTable('#userTable');

            // Approving User
            $(document).ready(function() {
                $('.approveButton').click(function(e) {
                    e.preventDefault();

                    var approveID = $(this).closest("tr").find('.approveID').val();

                    swal({
                            title: "Are you sure you want to approve this user?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {

                                $.ajax({
                                    type: "POST",
                                    url: "action.php",
                                    data: {
                                        "approve_button_click": 1,
                                        "approveIDs": approveID,
                                    },
                                    success: function(response) {

                                        swal("Successfully Approved!", {
                                            icon: "success",
                                        }).then((result) => {
                                            location.reload();
                                        });

                                    }
                                });

                            }
                        });

                });
            });


            // Rejecting User
            $(document).ready(function() {
                $('.rejectButton').click(function(e) {
                    e.preventDefault();

                    var rejectID = $(this).closest("tr").find('.rejectID').val();

                    swal({
                            title: "Are you sure you want to reject this user?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {

                                $.ajax({
                                    type: "POST",
                                    url: "action.php",
                                    data: {
                                        "reject_button_click": 1,
                                        "rejectIDs": rejectID,
                                    },
                                    success: function(response) {

                                        swal("Successfully Rejected!", {
                                            icon: "success",
                                        }).then((result) => {
                                            location.reload();
                                        });

                                    }
                                });

                            }
                        });

                });
            });


            // Datatables
            new DataTable('#roomTable');

            // Deleting Rooms
            $(document).ready(function() {
                $('.deleteButton').click(function(e) {
                    e.preventDefault();

                    var deleteID = $(this).closest("tr").find('.deleteID').val();

                    swal({
                            title: "Are you sure you want to delete this room?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {

                                $.ajax({
                                    type: "POST",
                                    url: "room_maintenance/action.php",
                                    data: {
                                        "delete_button_click": 1,
                                        "deleteIDs": deleteID,
                                    },
                                    success: function(response) {

                                        swal("Successfully Deleted!", {
                                            icon: "success",
                                        }).then((result) => {
                                            location.reload();
                                        });

                                    }
                                });

                            }
                        });

                });
            });

            // Adding Rooms 
            $(document).ready(function() {
                $('.addRooms').on('click', function() {
                    $('#addRooms').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#job_id').val(data[0]);


                });
            });

            // Updating Room
            $(document).ready(function() {
                $('.updateButton').on('click', function() {
                    // Show the modal
                    $('#updateRooms').modal('show');
                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);
                    $('#updateRoomID').val(data[0]);
                    $('#updateRoomName').val(data[1]);
                    $('#updateCapacity').val(data[2]);

                });
            });
        </script>
        <footer>
            <center>
                <p class="blockquote-footer" style="font-family: 'Roboto', sans-serif !important;">Copyright &copy; 2023 PCNPromopro Inc. All rights reserved.</p>
            </center>
        </footer>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    session_destroy();
}
mysqli_close($connect);
?>