<?php include "database.php" ?>

<?php
$update_id = $_GET['select'];
$table_name = $_GET['tb_name'];
if (isset($_POST['UPDATE'])) {
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_FILES['t3'];
    $t4 = $_POST['t4'];
   
    $target_dir = "products/";
    $filename = $target_dir . $_FILES['t3']['name'];
    move_uploaded_file($_FILES['t3']['tmp_name'], $filename);
    $data = mysqli_query($con, "UPDATE $table_name SET `Id`=$update_id,`title`='$t1',`type`='$t4',`price`='$t2',`img`='$filename' WHERE ID='$update_id'");

    if ($table_name == 'lunch') {
        header('location:lunch.php');
    } else if ($table_name == 'dinner') {
        header('location:dinner.php');
    } else if ($table_name == 'breakfast') {
        header('location:breakfast.php');
    }
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
                    $query_fetch = mysqli_query($con, "select * from $table_name where ID='$update_id'");
                    while ($rowk = mysqli_fetch_array($query_fetch)) {
                        $pname = $rowk['title'];
                        $price = $rowk['price'];
                        $ptype = $rowk['type'];
                        $image = $rowk['img'];
                    }

                    ?>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <img class="card-img-top " src="<?php echo $image; ?>" alt="Card image cap" style="height:28vh ; width: 25vw; border-radius: 10%;"><br>
                            <label for="Name" class="l-label mt-3">Product Name:</label>
                            <input type="text" name="t1" value="<?php echo $pname; ?>"><br>
                            <label for="Name" class="l-label">Product Price:</label>
                            <input type="text" name="t2" value="<?php echo $price; ?>"><br>
                            <label for="Name" class="l-label mt-3">Product type:</label>
                            <input type="text" name="t4" value="<?php echo $ptype; ?>"><br>
                            <label for="Name" class="l-label">Image:</label>
                            <input type="file" name="t3" id="t5" placeholder="image" style="border:1px solid;text-align:center;" required>
                            <button type="submit" name="UPDATE" class="btn btn-primary mt-2">Update</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
            </div>
        </div>
    </div>

</body>
</html>