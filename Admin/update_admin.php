<?php include 'database.php'; 

$update_id=$_GET['select'];
if(isset($_POST['UPDATE'])){
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t4 = $_FILES['t4'];
    $target_dir = "registar/images/";
    $filename = $target_dir . $_FILES['t4']['name'];
    move_uploaded_file($_FILES['t4']['tmp_name'], $filename);
    $data = mysqli_query($con, "UPDATE `admin` SET `Id`=$update_id,`name`='$t1',`email`='$t2',`mobile`='$t3',`image`='$filename' WHERE ID='$update_id'");
    header('location:admin_profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./admin_asset/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./admin_asset/img/favicon.png">
    <title>
        Dashboard | Admin
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="./admin_asset/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./admin_asset/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="./admin_asset/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 mt-6">
                <div class="card title w-75 ms-6">
                    <div class="card-header bg-dark">
                        <h2 class="title text-white"><u>Update</u></h2>
                    </div>
                    <?php
                    $query = mysqli_query($con,"SELECT * FROM `admin` where ID='$update_id'");
                    while($show=(mysqli_fetch_assoc($query))) {
                    ?>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <img class="card-img-top " src="<?php echo $show['image']; ?>" alt="" style="height:28vh ; width: 25vw; border-radius: 10%;"><br>
                                <label for="Name" class="l-label mt-3"> Name:</label>
                                <input type="text" name="t1" value="<?php echo $show['name']; ?>"><br>
                                <label for="Name" class="l-label">Email: </label>
                                <input type="text" name="t2" value="<?php echo $show['email']; ?>"><br>
                                <label for="Name" class="l-label mt-3">Mobile No:</label>
                                <input type="text" name="t3" value="<?php echo $show['mobile']; ?>"><br>
                                <label for="Name" class="l-label">Image:</label>
                                <input type="file" name="t4" id="t5" placeholder="image" style="border:1px solid;text-align:center;" required>
                                <button type="submit" name="UPDATE" class="btn btn-primary mt-2">Update</button>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </div>
</body>

</html>