<?php
session_start();
include("functions/functions.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UNITUR : SAYOHAT</title>
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/style.css" media="all">
    <style>
        .adminbtn {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 1px 2px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            float: right;
            margin-top: 12px;
            margin-left: 2px;
        }

        .adminbtn:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
</head>
<body>
    <!--Main container starts-->
    <div class="main_wrapper">
        <!--Header starts-->
        <?php include 'includes/header.php'; ?>
        <!--Header ends-->
        <!--Navbar starts-->
        <?php include 'includes/navbar.php'; ?>
        <!--Navbar ends-->
        <!--Content starts-->
        <div class="content_wrapper">
            <!--left-sidebar starts-->
            <?php include "includes/left-sidebar.php"; ?>
            <!--left-sidebar ends-->
            <div id="content_area">
              <?php cart(); ?>
<div id="shopping_cart">
    <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">
        <?php
        if (isset($_SESSION['customer_email'])) {
            echo "<b style='color: #0056b3;'>Xush kelibsiz: </b>" . $_SESSION['customer_email'] . "<b style='color: yellow;'> Your</b>";
        } else {
            echo "<b style='color: #0056b3;'>Xush kelibsiz: </b>";
        }
        ?>
        <b style="color: #0056b3;">Tanlanganlar-</b> turlar: <?php total_items(); ?>
        <span style="color: #0056b3;">Umumiy narxi: <?php total_price(); ?></span>
        <a href="cart.php" style="color: #0056b3;">Kartaga qaytish</a>
        <?php
        if (!isset($_SESSION['customer_email'])) {
            echo "<a href='checkout.php' style='color: #0056b3;'>Shahsiy kabinet</a>";
        } else {
            echo "<a href='logout.php' style='color: #0056b3;'>Logout</a>";
        }
        ?>
                        <button class="adminbtn"><a style="text-decoration: none; color: #ffffff;"
                                                    href="admin_area/index.php"></a></button>
                    </span>
                </div>
                <div id="packages_box">
                    <?php getPack(); ?>
                    <?php getCatPack(); ?>
                    <?php getTypePack(); ?>
                </div>
            </div>
        </div>
        <!--Content ends-->
        <!--footer starts-->
        <?php include "includes/footer.php";?>
        <!--footer ends-->
    </div>
    <!--Main container ends-->
</body>
</html>
