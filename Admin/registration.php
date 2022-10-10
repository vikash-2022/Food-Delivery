<?php include 'database.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registartion</title>
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
                            <input type="text" class="form-input" name="user" id="name" placeholder="Your Name" />
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $user = $_POST['user'];
                            $email = $_POST['email'];
                            $password = md5($_POST['password']);
                            $re_pass = md5($_POST['re_password']);
                            $mobile = $_POST['number'];
                            $target_dir = "registar/images";
                            $filename = $target_dir . $_FILES['image']['name'];
                            move_uploaded_file($_FILES['image']['tmp_name'], $filename);
                            $check = mysqli_query($con, "SELECT * FROM `admin` WHERE email='$email'");
                            if (mysqli_num_rows($check) > 0) {
                                $msg = 'email already exists';
                            } elseif ($password != $re_pass) {
                                $msg = "passwords doesn't match";
                            } else {
                                $data = mysqli_query($con, "INSERT INTO `admin`(`name`, `password`, `Repeat_pass`, `email`, `image`,`mobile`) VALUES ('$user','$password','$re_pass','$email','$filename','$mobile')");
                                $msg = "User Created Successfully";
                                header( "refresh:1;url=login.php" );
                            }
                        }
                        ?>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password" required/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="number" id="re_password" placeholder="P.no" required/>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-input" name="image" id="image" placeholder="Image" required/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" />
                        </div>
                        <?php
                        if (isset($msg) & !empty($msg)) {
                            echo $msg;
                            
                        }
                        ?>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>
    <!-- JS -->
    <script src="registar/vendor/jquery/jquery.min.js"></script>
    <script src="registar/js/main.js"></script>
</body>
</html>