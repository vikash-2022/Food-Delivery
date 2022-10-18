<?php include "header.php";
if(isset($_GET['select'])){
$delete_id=$_GET['select'];
$query=mysqli_query($con,"DELETE FROM lunch WHERE `dinner`.`Id` = '$delete_id'");
}
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <div class="container">
   <h1 class="title"><u>
      Dinner Menu</u>
   </h1>
  <div class="card card-b ">
               <div class="card-header pb-0">
                  <h2 class="title"><u>Add new Item</u></h2>
               </div>
               <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">
                  <div class="row r-card">
                     <div class="col-sm-6">
                     <label for="exampleFormControlInput1" class="form-label l-label">Product Name</label>
                     <input type="text" name="t1" class="form-control" id="exampleFormControlInput1" placeholder="Product Name" style="border:1px solid;text-align: center;" required>
                     </div>
                     <div class="col-sm-6 ">
                     <label for="exampleFormControlInput1" class="form-label l-label">Product Price</label>
                     <input type="text" name="t2" class="form-control" id="exampleFormControlInput1" placeholder="Product Price" style="border:1px solid;text-align: center;"required>
                     </div>
                     <div class="col-sm-6 mt-2">
                     <label for="exampleFormControlInput1" class="form-label l-label">Product Category</label>
                     <input type="text" name="t3" class="form-control" id="exampleFormControlInput1" placeholder="veg/non-veg" style="border:1px solid;text-align: center;"required>
                     </div>
                     <div class="col-sm-6 mt-2">
                     <label for="exampleFormControlInput1" <div class="mb-3">
                  <label class="fs-5">Select Dish Image</label><br>
                  <input type="file" name="t5" id="t5" placeholder="image" style="border:1px solid;text-align:center;"required>
               </div>
               <div class="mt-3 b-add">
                  <button class="btn btn-warning b-w" name="submit">Add</button>
               </div>
                     </div>
                  </div>

                  </form>
               </div>
            
              
               <?php
               if (isset($_POST['submit'])) {
                  $t1 = $_POST['t1'];
                  $t2 = $_POST['t2'];
                  $t3 = $_POST['t3'];
                  $t5 = $_FILES['t5'];
                  $target_dir = "products/";
                  $filename = $target_dir . $_FILES['t5']['name'];
                  move_uploaded_file($_FILES['t5']['tmp_name'], $filename);
                  $data =  mysqli_query($con, "INSERT INTO `dinner`(`title`,`price`, `type`,  `img`) VALUES ('$t1','$t2','$t3','$filename')");
               }
               ?>
            <div class="container mt-5">
      <h2 class="title"><u>Available dishes</u></h2>
      <div class="row">
         <?php
         $list_of_dish = mysqli_query($con, "select * from dinner");
         while ($rowdoc = mysqli_fetch_array($list_of_dish)) {
         ?>
            <div class="col-lg-3 ">
               <div class="card text-center" style="width: 18rem; height: auto;margin-top:26px;">
                  <img class="card-img-top " src="<?php echo $rowdoc['img']; ?>" alt="Card image cap" style="height:30vh ; width: 18rempx;">
                  <div class="card-body">
                     <h5 class="card-title c-title"><?php echo $rowdoc['title']; ?></h5>
                     <h5 class="card-title">RS. <?php echo $rowdoc['price']; ?></h5>
                     <a href="update.php?select=<?php echo $rowdoc['id']?>&tb_name=dinner"  class="btn btn-primary">update</a>
                     <a href="dinner.php?select=<?php echo $rowdoc['id']?>" class="btn btn-danger">Delete</a>
                  </div>
               </div>
            </div>
         <?php } ?>
      </div>
   </div>

   <?php include "footer.php" ?>