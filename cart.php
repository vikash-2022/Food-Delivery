<?php include "database.php"
?>
<?php
session_start();

if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    foreach ($_SESSION['cart'] as $k => $part) {
        if ($id == $part['id']) {
            unset($_SESSION['cart'][$k]);
        }
    }
}
if (isset($_POST['i_quantity'])) {
    foreach ($_SESSION['cart'] as $k => $item) {
        if ($item['name'] == $_POST['i_name']) {
            $_SESSION['cart'][$k]['quantity'] = $_POST['i_quantity'];
        }
    }
}
if (isset($_POST['submit'])) {

    $query = "INSERT INTO `order_user`( `Full_name`, `Email`, `Phone_no`, `Address`, `Pay_mode`) VALUES ('$_POST[u_name]','$_POST[u_email]','$_POST[u_number]','$_POST[u_address]','$_POST[paymode]')";

    if (mysqli_query($con, $query)) {
        $order_id = mysqli_insert_id($con);
        $query2 = "INSERT INTO `user_order`(`order_id`, `item_name`, `price`, `quantity`) VALUES (?,?,?,?)";
        $prepare_stmt = mysqli_prepare($con, $query2);
        if ($prepare_stmt) 
        {
            mysqli_stmt_bind_param($prepare_stmt, "issi",$order_id,$item_name,$price,$quantity);
            foreach ($_SESSION['cart'] as $k => $item)
             {
                $item_name=$item['name'];
                $price=$item['price'];
                $quantity=$item['quantity'];
                mysqli_stmt_execute($prepare_stmt);
            }
            unset($_SESSION['cart']);
            echo "<script> alert('Order Placed'); window.location.href='menu.php';
            </script>" ;
           
            
        }
    } else {
        echo 'not';
    }
}
?>


<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>cart</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <section class="pt-5 pb-5">

        <div class="container">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">

                <div class="modal-dialog">
                    <form action="" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Place Order</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Your Name:</label>
                                    <input type="text" name="u_name" class="form-control" id="recipient-name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="u_email" class="form-control" aria-label="Email" aria-describedby="email-addon" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Your Number:</label>
                                    <input type="text" name="u_number" class="form-control" id="recipient-name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Your Address:</label>
                                    <textarea class="form-control" name="u_address" id="message-text"></textarea>
                                </div>
                                <div class="mb-3">

                                    <input class="form-check-input " type="radio" name="paymode" id="flexRadioDefault2" checked="" style="margin: auto;margin-top: 6px;" value="COD">
                                    <label class="form-check-label" for="flexRadioDefault2" style="padding-left:24px;">
                                        Cash On delivery
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3 class="display-5 mb-2 text-center fs-1 fw-bold text-info">Shopping Cart</h3>
                    <p class="mb-5 text-center">
                        <i class="text-info font-weight-bold">3</i> items in your cart
                    </p>
                    <table id="shoppingCart" class="table table-condensed table-responsive">

                        <thead>
                            <tr>
                                <th style="width:60%">Product</th>
                                <th style="width:12%">Price</th>

                                <th style="width:10%">Quantity</th>
                                <th style="width:12%">Total</th>

                            </tr>
                        </thead>


                        <tbody>


                            <?php

                            if (isset($_SESSION['cart'])) : ?>
                                <?php foreach ($_SESSION['cart'] as $k => $item) : ?>
                                    <tr>

                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-md-3 text-left">
                                                    <img src="Admin/<?php echo $item['img']; ?>" style="height: 104px;  width: 104px;">
                                                </div>
                                                <div class="col-md-9 text-left mt-sm-2">
                                                    <h4 style=" text-align: left; margin-top:26px;"><?php echo $item['name']; ?>
                                                        <form method="POST">
                                                            <input type="hidden" name="i_name" value="<?php echo $item['name']; ?>">
                                                        </form>
                                                    </h4>
                                                    <p class="font-weight-light"></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price"" style=" font-size:larger; font-weight:bold">Rs <?php echo $item['price']; ?>
                                            <input type="hidden" class="price" value="<?php echo $item['price']; ?>">

                                        </td>

                                        <td data-th="Quantity">
                                            <form method="POST">
                                                <input type="number" name="i_quantity" class="form-control form-control-lg text-center quantity" onchange='this.form.submit();' min="1" max="5" value="<?php echo $item['quantity'] ?>">
                                                <input type="hidden" name="i_name" value="<?php echo $item['name']; ?>">
                                            </form>
                                        </td>
                                        <td data-th="Price" class="total" style="font-size:larger; font-weight:bold">Rs </td>

                                        <td class="actions" data-th="">
                                            <div class="text-center">
                                                <a href="cart.php?remove=<?php echo $item['id']; ?>">

                                                    <img src="assets\images\remove.png" style="height:34px;">
                                                </a>
                                            </div>
                                        </td>

                                    </tr>

                                <?php endforeach ?>
                            <?php endif ?>

                        </tbody>
                    </table>

                    <div class="float-right text-right">
                        <h4>Subtotal:</h4>
                        <h1>Rs <span id="gtotal"></span>
                            <input type="hidden" id="gtotal" name="All_total" value=" <?php
   echo "<script>document.writeln(gtotal);</script>";
?>">

                        </h1>
                    </div>

                </div>

            </div>
            <div class="row mt-4 d-flex align-items-center">
                <div class="col-sm-6 order-md-2 text-right">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Checkout</button>
                </div>
                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                    <a href="menu.php">
                    <button type="button" class="btn btn-primary">Continue Shopping</button>
</a>
                </div>
            </div>
        </div>

    </section>

    <script>
        let gt = 0;
        let item_price = document.getElementsByClassName('price');
        let item_quantity = document.getElementsByClassName('quantity');
        let item_total = document.getElementsByClassName('total');
        let gtotal = document.getElementById('gtotal');
        function subtotal() {
            gt = 0;
            for (i = 0; i < item_price.length; i++) {
                item_total[i].innerText = (item_price[i].value) * (item_quantity[i].value);
                gt = gt + (item_price[i].value) * (item_quantity[i].value);
            }
            gtotal.innerText = gt;
        }
        subtotal();
    </script>
</body>

</html>