<?php

include '../../room/connect.php';
session_start();

if (isset($_SESSION["username"], $_SESSION["password"])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../images/pcn.png">

    <!-- ANDROID + CHROME + APPLE + WINDOWS APP -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="white">
    <!--<link rel="apple-touch-icon" href="icon-512.png">-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Calendar">
    <!--<meta name="msapplication-TileImage" content="icon-512.png">-->
    <meta name="msapplication-TileColor" content="#ffffff">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../bootstrap/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../bootstrap/bootstrap/css/bootstrap.min.css">
    <script src="../../bootstrap/bootstrap/js/bootstrap.js"></script>
    <script src="../../bootstrap/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

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

    <!-- Style.css -->
    <link rel="stylesheet" href="style.css">

    <title>PCN Room Maintenance</title>
</head>

<body>
    <!-- For success message sweet alert -->
    <?php
    if (isset($_SESSION['success'])) { ?>
        <script>
            swal({
                icon: 'success',
                title: "<?php echo $_SESSION['success']; ?>",
            })
        </script>
    <?php unset($_SESSION['success']);
    } ?>

    <div class="container">
        <div class="row">
            <div class="justify-content-center pt-4">
                <img src="../images/pcn.png" alt="" class="img-responsive" width="10%">
            </div>
        </div>
    </div>

    <center>
        <div class="container">

            <div class="button">
                <button type="button" class="btn btn-outline-info btn-sm my-4 float-end addRooms">Add Rooms</button>
            </div>
            <table class="table p-3 table-sm align-middle mb-0 p-3 bg-info bg-opacity-10 border border-info border-start-0 border-end-0 rounded-end mdc-data-table" id="roomTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rooms</th>
                        <th>Capacity</th>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Active</th>
                        <th>Time Added</th>
                        <th class="text-center">Function</th>
                        <th class="text-center">Function</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $query = "SELECT * FROM rooms";
                    $result = $connect->query($query);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['rooms']; ?></td>
                            <td><?php echo $row['capacity']; ?></td>
                            <td style="width: 10%; justify-content: center">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#updateRoomImage-<?php echo $row['id']; ?>">
                                    <img src="../images/<?php echo $row['image']; ?>" alt="Images" style="width: 100%;">
                                </a>
                            </td>
                            <td style="text-align: center;"><?php echo $row['active']; ?></td>
                            <td><?php echo $row['timestamp']; ?></td>
                            <td>
                                <input type="hidden" class="updateID" name="updateID" id="updateID" value="<?php echo $row['id'] ?>">
                                <button type="button" class="btn btn-sm updateButton button" name="updateButton" id="updateButton">Update</button>
                            <td>
                                <input type="hidden" class="deleteID" name="deleteID" id="deleteID" value="<?php echo $row['id'] ?>">
                                <button type="button" class="btn btn-sm deleteButton" name="deleteButton" id="deleteButton">Delete</button>
                            </td>
                        </tr>




                        <!-- Modal for Updating Room Information -->
                        <div class="modal fade" id="updateRoomImage-<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <img src="../images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px" onclick="playAudio();$('#myModal1').modal('show');" data-dismiss="modal">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="../images/<?php echo $row['image']?>" alt="" width="100%" height="100%"><br><br><br>
                                        <form action="action.php" method="POST" class="row g-3 needs-validation" enctype='multipart/form-data' accept="image/png, image/jpeg, image/jpg">
                                            <input type="hidden" name="updateImageRoomID" value="<?php echo $row['id']?>">
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
    </center>


    <!-- Modal For Adding Rooms -->
    <div class="modal fade" id="addRooms" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="../images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px" onclick="playAudio();$('#myModal1').modal('show');" data-dismiss="modal">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="action.php" method="post" class="row g-3 needs-validation" enctype="multipart/form-data" accept="image/png, image/jpeg, image/jpg">
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
                    <img src="../images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px" onclick="playAudio();$('#myModal1').modal('show');" data-dismiss="modal">
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
                        <form action="action.php" method="POST" class="row g-3 needs-validation">
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





    <!-- JAVASCRIPT -->
    <script>
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
                                url: "action.php",
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
</body>

</html>
<?php
} else {
  header("Location: ../../index.php");
  session_destroy();
}
mysqli_close($connect);
?>