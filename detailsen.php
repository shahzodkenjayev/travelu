<?php
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel: Details</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
    <!--Main container start-->
    <div class="main_wrapper">
        <!--Header start-->
        <?php include 'includes/headeren.php'; ?>
        <!--Header end-->
        <!--Navigation panel start-->
        <?php include 'includes/navbaren.php'; ?>
        <!--Navigation panel end-->
        <!--Content start-->
        <div class="content_wrapper">
            <!--Left sidebar start-->
            <?php include "includes/left-sidebar.php"; ?>
            <!--Left sidebar end-->
            <div id="content_area">
                <div id="shopping_cart">
                    <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">Welcome, Guest! <b
                                style="color: yellow;">Cart -</b> Total items: Total price: <a href="cart.php"
                                                                                                       style="color: yellow;">Go to cart</a></b></span>
                </div>
                <div id="packages_box">
                    <?php
                    if (isset($_GET['pack_id'])) {
                        $package_id = $_GET['pack_id'];

                        $get_pack = "select * from packages where package_id='$package_id'";

                        $run_pack = mysqli_query($con, $get_pack);

                        while ($row_pack = mysqli_fetch_array($run_pack)) {
                            $pack_id = $row_pack['package_id'];
                            $pack_title = $row_pack['package_title'];
                            $pack_price = $row_pack['package_price'];
                            $pack_image = $row_pack['package_image'];
                            $pack_desc = $row_pack['package_desc'];

                            echo "
                            <div id='single_package'>
                            <h3 style='font-family: Cambria; margin-bottom: 2px;'>$pack_title</h3>
                            <img src='admin_area/package_images/$pack_image' width='400' height='300'>
                            <p><b>Price: $ $pack_price</b></p>
                            <p>$pack_desc</p>
                            <a href='index.php' style='float: left; font-size: 18px;'>Back</a>
                            <a href='index.php?pack_id=$pack_id'><button style='float: right;font-size:16px; cursor: pointer; padding: 2px 4px; margin:2px;'>Order now</button></a>
                            </div>
                            ";
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
        <!--Content end-->
        <!--User panel start-->
        <?php include "includes/footeren.php";?>
        <!--User panel end-->
    </div>
    <!--Main container end-->
</body>
</html>
