<?php
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Travel Bird : Barcha Paketlar</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
    <!--Asosiy konteyner bu yerda boshlanadi-->
    <div class="main_wrapper">
        <!--Sarlavha bu yerda boshlanadi-->
        <?php include 'includes/header.php'; ?>
        <!--Sarlavha bu yerda tugaydi-->
        <!--Navigatsiya paneli bu yerda boshlanadi-->
        <?php include 'includes/navbar.php'; ?>
        <!--Navigatsiya paneli bu yerda tugaydi-->
        <!--Kontent bu yerda boshlanadi-->
        <div class="content_wrapper">
            <!--Chap tomondagi panel boshlanadi-->
            <?php include "includes/left-sidebar.php"; ?>
            <!--Chap tomondagi panel tugaydi-->
            <div id="content_area">
                <div id="shopping_cart">
                    <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">Xush kelibsiz Mehmon! <b
                                style="color: yellow;">Savatcha-</b> Jami mahsulotlar: Jami narx: <a href="cart.php"
                                                                                                       style="color: yellow;">Savatchaga o'tish</a></b></span>
                </div>
                <div id="packages_box">
                    <?php
                    $get_pack = "SELECT * FROM packages";

                    $run_pack = mysqli_query($con, $get_pack);

                    while ($row_pack = mysqli_fetch_array($run_pack)) {
                        $pack_id = $row_pack['package_id'];
                        $pack_cat = $row_pack['package_cat'];
                        $pack_type = $row_pack['package_type'];
                        $pack_title = $row_pack['package_title'];
                        $pack_price = $row_pack['package_price'];
                        $pack_image = $row_pack['package_image'];

                        echo "
                        <div id='single_package'>
                        <h3 style='font-family: Cambria; margin-bottom: 2px;'>$pack_title</h3>
                        <img src='admin_area/package_images/$pack_image' width='180' height='180'>
                        <p><b> Narx: $ $pack_price</b></p>
                        <a href='details.php?pack_id=$pack_id' style='float: left; font-size:18px;text-decoration: none;'>Tafsilotlar</a>
                        <a href='index.php?pack_id=$pack_id'><button style='float: right; font-size:14px; cursor: pointer; padding: 2px 4px;'>Buyurtma berish</button></a>
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--Kontent tugaydi-->
        <!--Futyer boshlanadi-->
        <?php include "includes/footer.php";?>
        <!--Futyer tugaydi-->
    </div>
    <!--Asosiy konteyner tugaydi-->
</body>
</html>
