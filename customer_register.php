<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
global $con;
if (isset($_POST['register'])) {
    $ip = getIp();
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_passport = $_POST['c_passport'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];

    // rasimni yuklash
    move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

    $insert_c = "INSERT INTO customers (customer_ip,customer_name,customer_email,customer_pass,c_passport,customer_country,customer_city,customer_contact,customer_address,customer_image) VALUES ('$ip','$c_name','$c_email','$c_pass','$c_passport','$c_country','$c_city','$c_contact','$c_address','$c_image')";

    $run_c = mysqli_query($con, $insert_c);

    $sel_cart = "SELECT * FROM cart WHERE ip_add='$ip'";

    $run_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if ($check_cart == 0) {
        $_SESSION['customer_email'] = $c_email;
        echo "<script>alert('Hisob muvaffaqiyatli yaratildi. Rahmat!')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
    } else {
        $_SESSION['customer_email'] = $c_email;
        echo "<script>alert('Hisob muvaffaqiyatli yaratildi. Rahmat!')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>Travel Bird : Ro'yxatdan o'tish</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <style type="text/css">
        #fixm {
            font-size: 15px;
            padding: 4px;
            font-family: arial;
        }

        #fixi {
            font-size: 14px;
            font-family: arial;
        }

        #btn {
            font-family: arial;
            font-size: 14px;
            background-color: #4CAF50; /* Yashil */
            border: none;
            color: white;
            padding: 10px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            background-color: #32E875;
            color: black;
        }

        #btn:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
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
            <!--Chap sidebar boshlanadi-->
            <?php include "includes/left-sidebar.php"; ?>
            <!--Chap sidebar tugaydi-->
            <div id="content_area">
                <?php cart(); ?>
                <div id="shopping_cart">
                        <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">Xush kelibsiz, Mehmon! <b
                                    style="color: yellow;">Savatcha-</b> Jami mahsulotlar: <?php total_items(); ?> Jami narx: <?php total_price(); ?> <a
                                    href="cart.php" style="color: yellow;">Savatchaga o'tish</a></b></span>
                </div>
                <form action="customer_register.php" method="post" enctype="multipart/form-data">
                    <table align="center" width="750" style="margin-top: 20px;">
                        <tr align="center">
                            <td colspan="6">
                                <h2 style="margin-bottom: 15px; font-family: Cambria;">Hisob yaratish</h2>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Ismingiz:</td>
                            <td><input id="fixi" type="text" name="c_name" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Email manzilingiz:</td>
                            <td><input type="email" name="c_email" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Parolingiz:</td>
                            <td><input id="fixi" type="password" name="c_pass" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Pasport ID raqamingiz:</td>
                            <td><input type="text" name="c_passport" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Rasm:</td>
                            <td><input id="fixi" type="file" name="c_image" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Davlatingiz:</td>
                            <td>
                                <select name="c_country" required="">Tanlang
                                    <option>O'zbekiston</option>
                                    <option>Rossiya</option> 
                                    <option>Qozog'iston</option>
                                    <option>Qirg'iziston</option>
                                    <option>Tojikiston</option>
                                    <option>Turkmaniston</option>   
                                    <option>Bangladesh</option>
                                    <option>Hindiston</option>
                                    <option>Yaponiya</option>
                                    <option>Xitoy</option>
                                    <option>AQSH</option>
                                    <option>Portugaliya</option>
                                    <option>Angliya</option>
                                    <option>Braziliya</option>
                                    <option>Ispaniya</option>
                                    <option>Fransiya</option>
                                    <option>Shveytsariya</option>
                                    <option>Xorvatiya</option>
                                    <option>Argentina</option>
                                    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Shaharingiz:</td>
                            <td><input id="fixi" type="text" name="c_city" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Aloqa raqamingiz:</td>
                            <td><input id="fixi" type="text" name="c_contact" required=""></td>
                        </tr>
                        <tr>
                            <td align="right" id="fixm">Manzilingiz:</td>
                            <td><input id="fixi" type="text" name="c_address" required=""></td>
                        </tr>
                        <tr align="center">
                            <td colspan="6"><input id="btn" type="submit" name="register" value="Hisob yaratish">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <!--Kontent tugaydi-->
        <!--Futyer boshlanadi-->
        <?php include "includes/footer.php"; ?>
        <!--Futyer tugaydi-->
    </div>
    <!--Asosiy konteyner tugaydi-->
</body>
</html>
