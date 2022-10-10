<?php include 'database.php';
session_start();
if (isset($_POST['submit'])) {
  $user_email = $_POST['u_email'];
  $user_password =md5($_POST['u_password']);
  $query = mysqli_query($con, "SELECT * FROM `admin` WHERE `email` = '$user_email'");
  $email_count = mysqli_num_rows($query);
  if ($email_count) {
   $email_pass=mysqli_fetch_assoc($query);
   $check_password=($email_pass['password']);
     if(md5($user_password==$check_password)){
      header('location:index.php'); 
     }
     else{
      $msgg ="<div class='alert alert-warning text-dark' role='alert'>
  Invalid Password!
</div>";
     }
      }
      else{
        $msg ="<div class='alert alert-warning text-dark' role='alert'>
        Invalid Email!
      </div>";
      }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="login_assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="login_assets/img/favicon.png">
  <title>
     login
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="login_assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="login_assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="login_assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="login_assets/css/soft-ui-dashboard.minc924.css?v=1.0.6" rel="stylesheet" />
  <style>
    .async-hide {
      opacity: 0 !important
    }
  </style>
</head>
<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" name="u_email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required>
                     
                    </div>
                    <?php 
                    if(isset($msg))
                    {
                      echo $msg;
                    }
                    ?>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="u_password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required>
                    </div>
                    <?php if(isset($msgg)){
                      echo $msgg;
                    }
                    ?>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="registration.php" class="text-info text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('login_assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer py-6">
  </footer>
  <script src="login_assets/js/core/popper.min.js"></script>
  <script src="login_assets/js/core/bootstrap.min.js"></script>
  <script src="login_assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="login_assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
</body>
</html>