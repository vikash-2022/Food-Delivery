<?php include 'database.php'?>
<?php
if(isset($_GET['select'])){
    $delete_admin=$_GET['select'];
    $query=mysqli_query($con,"DELETE FROM admin WHERE `admin`.`Id` ='$delete_admin'");
    header('location:admin_profile.php');};
?>
