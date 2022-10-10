<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Orders</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php include "header.php" ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Page Wrapper -->
        <div id="wrapper">


            <!-- Content Wrapper -->

            <div id="content-wrapper" class="d-flex flex-column">

                <div class="container mt-5">
                    <div class="row">
                        <div class="col-sm-12">
                        <table class="table text-center table-dark">
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Customer name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone no</th>
      <th scope="col">Addres</th>
      <th scope="col">Paymode</th>
      <th scope="col">Orders</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $query=mysqli_query($con,"select * from order_user");
   $sr_no=0;
    while($data=mysqli_fetch_assoc($query)){
    
    ?>
    <tr>
      <td><?php echo ++$sr_no?></th>
      <td><?php echo $data['Full_name']?></td>
      <td><?php echo $data['Email']?></td>
      <td><?php echo $data['Phone_no']?></td>
      <td><?php echo $data['Address']?></td>
      <td><?php echo $data['Pay_mode']?></td>
      <td>  <table class="table text-center table-dark">
        <thead>
        <tr>
            <th scope="col">Item name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
        </tr>
        </thead>
        <tbody>
          <?php
          $order_query="select * from  user_order where order_id='$data[order_id]'";
          $order_result=mysqli_query($con,$order_query);
          while($order=mysqli_fetch_assoc($order_result)){
          ?>
          <tr>
            <td><?php echo $order['item_name']?></td>
            <td><?php echo $order['price']?></td>
            <td><?php echo $order['quantity']?></td>
          </tr>
          <?php }?>
        </tbody>
    </table>
</td>
    </tr>
  
   
    <?php }?>
  </tbody>
</table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>

        </div>
    </main>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>