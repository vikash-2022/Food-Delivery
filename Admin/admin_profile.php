<?php include 'header.php' ?>


<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <div class="container-fluid py-4">
  <h2 class="title"><u>Admin Account</u></h2> 
  <div class="row">
         <?php
         $query = mysqli_query($con, "select * from admin");
         while ($rowdoc = mysqli_fetch_array($query)) {
         ?>
            <div class="col-sm-4 ">
               <div class="card text-center" style="width: 20rem; height: 410px;margin-top:26px; background-color:aliceblue ;border-radius:10%">
                  <img class="card-img-top mt-3 border border-info" src="<?php echo $rowdoc['image']; ?>" alt="" style="height:28vh ; width: 13rem; margin:auto;border-radius:50%">
                  <div class="card-body">
                     <h5 class="card-title c-title">Name:<?php echo $rowdoc['name']; ?></h5>
                     <h5 class="card-title">Email: <?php echo $rowdoc['email']; ?></h5>
                     <h5 class="card-title">Mobile: <?php echo $rowdoc['mobile']; ?></h5>
                     <a href="update_admin.php?select=<?php echo $rowdoc['Id']?>" class="btn btn-success">Update</a>
                     <a href="delete.php?select=<?php echo $rowdoc['Id']?>" class="btn btn-danger">Delete</a>
                  </div>
               </div>
            </div>
         <?php } ?>
      </div>
  <?php include 'footer.php' ?>