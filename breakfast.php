<?php include "header.php" ?>
<?php



if (isset($_POST['add_to_cart'])) 
{
    if (isset($_SESSION['cart']))
     {
        $myitems=array_column($_SESSION['cart'],'name');
        if(in_array($_POST['item_title'], $myitems)) 
        {
            echo "<script>alert('Item already added')
            window.location.href='breakfast.php';
            </script>";
        }
         else
          {
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]= array(
                'name' =>$_POST['item_title'],
                'price' =>$_POST['item_price'],
                'img' => $_POST['item_img'],
                'quantity' => 1
            );
        }
    }
    else
    {
        $_SESSION['cart'][0]= array(
            'name' =>$_POST['item_title'],
            'price' =>$_POST['item_price'],
            'img' => $_POST['item_img'],
            'quantity' => 1
        );
    }
}

?>
<section style="background-image: url(assets/images/menu-bg.png);" class="our-menu section bg-light repeat-img" id="menu">
    <div class="sec-wp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title text-center mb-5">
                        <p class="sec-sub-title mb-3">our menu</p>
                        <h2 class="h2-title">wake up early, <span>eat fresh & healthy</span></h2>
                        <div class="sec-title-shape mb-4">
                            <img src="assets/images/title-shape.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-tab-wp">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="menu-tab text-center">
                            <ul class="filters">
                                <div class="filter-active" style="width: 206px; transform: translate(157px, 0px);"></div>
                                <a href="menu.php">
                                <li class="filter">
                                    <img src="assets/images/menu-1.png" alt="">
                                    All
                                </li>
                                </a>
                                <a href="breakfast.php">
                                    <li class="filter active" data-filter=".breakfast.php" style="color: rgb(255, 255, 255);">
                                        <img src="assets/images/menu-2.png" alt="">
                                        Breakfast
                                    </li>
                                </a>
                                <a href="lunch.php">
                                    <li class="filter" data-filter=".lunch" style="color: rgb(13, 13, 37);">
                                        <img src="assets/images/menu-3.png" alt="">
                                        Lunch
                                    </li>
                                </a>
                                <a href="dinner.php">
                                    <li class="filter" data-filter=".dinner" style="color: rgb(13, 13, 37);">
                                        <img src="assets/images/menu-4.png" alt="">
                                        Dinner
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div class="menu-list-row mt-5">

                        <div class="row g-xxl-5 bydefault_show" id="menu-dish">
                            <?php
                            $list_of_dish = mysqli_query($con, "select * from Breakfast");
                            while ($show = mysqli_fetch_array($list_of_dish)) {
                            ?>
                                <div class="col-lg-4  col-sm-6 dish-box-wp breakfast">
                                    <div class="dish-box text-center ">
                                        <form action="breakfast.php" method="POST">


                                            <div class="dist-img">
                                                <img src="Admin/<?php echo $show['img'];?>"style="height:251px;width:251px";>
                                            </div>

                                            <div class="dish-rating">
                                                5
                                                <i class="uil uil-star"></i>
                                            </div>
                                            <div class="dish-title">
                                                <h3 class="h3-title"><?php echo $show['title']; ?></h3>
                                                <p>120 calories</p>
                                            </div>
                                            <div class="dish-info">
                                                <ul>
                                                    <li>
                                                        <p>Type</p>
                                                        <b><?php echo $show['type']; ?></b>
                                                    </li>
                                                    <li>
                                        <p>Persons</p>
                                        <b>1</b>
                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dist-bottom-row">
                                                <ul>
                                                    <li>
                                                        <b>Rs. <?php echo $show['price'];?></b>
                                                    </li>
                                                    <li>
                                                        <button type="submit" class="dish-add-btn" name="add_to_cart">
                                                            <i class="uil uil-plus"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="hidden" name="item_img" value="<?php echo $show['img']; ?>">
                                            <input type="hidden" name="item_title" value="<?php echo $show['title']; ?>">
                                            <input type="hidden" name="item_price" value="<?php echo $show['price']; ?>">

                                        </form>


                                    </div>

                                </div>


                            <?php
                            }
                            ?>

                        </div>


                    </div>
                </div>
            </div>
            <section class="two-col-sec section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="sec-img mt-5">
                                <img src="assets/images/pizza.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="sec-text">
                                <h2 class="xxl-title">Chicken Pepperoni</h2>
                                <p>This is Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet dolores
                                    eligendi earum eveniet soluta officiis asperiores repellat, eum praesentium nihil
                                    totam. Non ipsa expedita repellat atque mollitia praesentium assumenda quo
                                    distinctio excepturi nobis tenetur, cum ab vitae fugiat hic aspernatur? Quos
                                    laboriosam, repudiandae exercitationem atque a excepturi vel. Voluptas, ipsa.</p>
                                <p>This is Lorem ipsum dolor sit amet consectetur adipisicing elit. At fugit laborum
                                    voluptas magnam sed ad illum? Minus officiis quod deserunt.</p>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<section class="two-col-sec section pt-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-1 order-2">
                <div class="sec-text">
                    <h2 class="xxl-title">Chicken Pepperoni</h2>
                    <p>This is Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet dolores
                        eligendi earum eveniet soluta officiis asperiores repellat, eum praesentium nihil
                        totam. Non ipsa expedita repellat atque mollitia praesentium assumenda quo
                        distinctio excepturi nobis tenetur, cum ab vitae fugiat hic aspernatur? Quos
                        laboriosam, repudiandae exercitationem atque a excepturi vel. Voluptas, ipsa.</p>
                    <p>This is Lorem ipsum dolor sit amet consectetur adipisicing elit. At fugit laborum
                        voluptas magnam sed ad illum? Minus officiis quod deserunt.</p>
                </div>
            </div>
            <div class="col-lg-6 order-lg-2 order-1">
                <div class="sec-img">
                    <img src="assets/images/sushi.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="book-table section bg-light">
    <div class="book-table-shape">
        <img src="assets/images/table-leaves-shape.png" alt="">
    </div>

    <div class="book-table-shape book-table-shape2">
        <img src="assets/images/table-leaves-shape.png" alt="">
    </div>

    <div class="sec-wp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title text-center mb-5">
                        <p class="sec-sub-title mb-3">Book Table</p>
                        <h2 class="h2-title">Opening Table</h2>
                        <div class="sec-title-shape mb-4">
                            <img src="assets/images/title-shape.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="book-table-info">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="table-title text-center">
                            <h3>Monday to Thrusday</h3>
                            <p>9:00 am - 22:00 pm</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="call-now text-center">
                            <i class="uil uil-phone"></i>
                            <a href="tel:+91-8866998866">+91 - 8866998866</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="table-title text-center">
                            <h3>Friday to Sunday</h3>
                            <p>11::00 am to 20:00 pm</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="gallery">
                <div class="col-lg-10 m-auto">
                    <div class="book-table-img-slider" id="icon">
                        <div class="swiper-wrapper">
                            <a href="assets/images/bt1.jpg" data-fancybox="table-slider" class="book-table-img back-img swiper-slide" style="background-image: url(assets/images/bt1.jpg)"></a>
                            <a href="assets/images/bt2.jpg" data-fancybox="table-slider" class="book-table-img back-img swiper-slide" style="background-image: url(assets/images/bt2.jpg)"></a>
                            <a href="assets/images/bt3.jpg" data-fancybox="table-slider" class="book-table-img back-img swiper-slide" style="background-image: url(assets/images/bt3.jpg)"></a>
                            <a href="assets/images/bt4.jpg" data-fancybox="table-slider" class="book-table-img back-img swiper-slide" style="background-image: url(assets/images/bt4.jpg)"></a>
                            <a href="assets/images/bt1.jpg" data-fancybox="table-slider" class="book-table-img back-img swiper-slide" style="background-image: url(assets/images/bt1.jpg)"></a>
                            <a href="assets/images/bt2.jpg" data-fancybox="table-slider" class="book-table-img back-img swiper-slide" style="background-image: url(assets/images/bt2.jpg)"></a>
                            <a href="assets/images/bt3.jpg" data-fancybox="table-slider" class="book-table-img back-img swiper-slide" style="background-image: url(assets/images/bt3.jpg)"></a>
                            <a href="assets/images/bt4.jpg" data-fancybox="table-slider" class="book-table-img back-img swiper-slide" style="background-image: url(assets/images/bt4.jpg)"></a>
                        </div>

                        <div class="swiper-button-wp">
                            <div class="swiper-button-prev swiper-button">
                                <i class="uil uil-angle-left"></i>
                            </div>
                            <div class="swiper-button-next swiper-button">
                                <i class="uil uil-angle-right"></i>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</section>

<?php include "footer.php" ?>