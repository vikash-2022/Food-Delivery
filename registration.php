<?php include 'database.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registartion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="registart/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="registar/css/style.css">

</head>

<body>
    <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <form method="POST" enctype="multipart/form-data">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="user" id="name" placeholder="Your Name" required />
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $user = $_POST['user'];
                            $email = $_POST['email'];
                            $password = md5($_POST['password']);
                            $re_pass = md5($_POST['re_password']);
                            $check = mysqli_query($con, "SELECT * FROM `users` WHERE email='$email'");
                            if (mysqli_num_rows($check) > 0) {

                                $msg = "<div class='alert alert-danger' role='alert'>
                                Email already exits!
                              </div>";
                            } elseif ($password != $re_pass) {
                                $msgg = "<div class='alert alert-danger' role='alert'>
                                Password doesn't match !
                              </div>";
                            } else {
                                $data = mysqli_query($con, "INSERT INTO `users`(`Name`, `email`, `password`, `Re_password`) VALUES ('$user','$email','$password','$re_pass')");
                        ?>
                                <script>
                                    let sweet = swal("Successfully submitted !", "", "success");
                                </script>
                        <?php

                            }
                        }
                        ?>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required />
                        </div>
                        <?php
                        if (isset($msg) & !empty($msg)) {
                            echo $msg;
                        }
                        ?>

                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password" required />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <?php
                        if (isset($msgg) & !empty($msgg)) {
                            echo $msgg;
                        }
                        ?>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password" required />
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" />
                        </div>

                    </form>
                    <p class="loginhere mt-0">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="registar/vendor/jquery/jquery.min.js"></script>
    <script src="registar/js/main.js"></script>


</body>

</html>