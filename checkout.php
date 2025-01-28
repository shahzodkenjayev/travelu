<?php
session_start();
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>LOGIN : To'lov</title>
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
                <?php cart(); ?>
                <div id="shopping_cart">
                    <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">
                        <?php
                        if (isset($_SESSION['customer_email'])) {
                            echo "<b>Xush kelibsiz: </b>" . $_SESSION['customer_email'] . "<b style='color: yellow;'> Sizning</b>";
                        } else {
                            echo "<b>Xush kelibsiz Mehmon:</b>";
                        }
                        ?>
                        <b style="color: yellow;">Savatcha-</b> Jami mahsulotlar: <?php total_items(); ?> Jami narx: <?php total_price(); ?> <a
                                href="cart.php" style="color: yellow;">Savatchaga o'tish</a></b></span>
                </div>
                <div id="packages_box">
                    <?php
                    if (!isset($_SESSION['customer_email'])) {
                        include("includes/customer_login.php");
                    } else {
                        include("includes/payment.php");
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
