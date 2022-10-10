<?php include "database.php"?>
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
  <style>
body{
    background-image: url('rest.png');
    background-size: cover;
}

  </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
 <?php include('slidebar.php');?>
 <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
 <div class="container-fluid py-4">
 <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Today's Income</p>
                <h4 class="mb-0">$53k</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
         
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <?php 
              $query=mysqli_query($con,"select * FROM users");
              $user=mysqli_num_rows($query);
              ?>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Users</p>
                <h4 class="mb-0"><?php echo$user;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
           
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <?php 
              $query=mysqli_query($con,"select * FROM orders");
              $orders=mysqli_num_rows($query);
              
              ?>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Orders</p>
                <h4 class="mb-0"><?php echo$orders;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
           
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <?php 
              $query=mysqli_query($con,"select * FROM admin");
              $admin=mysqli_num_rows($query);
              ?>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Admins</p>
                <h4 class="mb-0"><?php echo$admin;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
           
          </div>
        </div>
      </div>
 </div>
 </main>

</main>
 
  <!--   Core JS Files   -->
  <script src="./admin_asset/js/core/popper.min.js"></script>
  <script src="./admin_asset/js/core/bootstrap.min.js"></script>
  <script src="./admin_asset/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./admin_asset/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./admin_asset/js/plugins/chartjs.min.js"></script>

 
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./admin_asset/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>