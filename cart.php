<?php
session_start();
$total = 0;
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Travel Bird : Savatcha</title>
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
                            echo "<b style='color: #0056b3;'>Xush kelibsiz: </b>" . $_SESSION['customer_email'] . "<b style='color: #0056b3;'> Sizning</b>";
                        } else {
                            echo "<b style='color: #0056b3;'>Xush kelibsiz Mehmon:</b>";
                        }
                        ?>
                        <b style="color: #0056b3;">Savatcha-</b> Jami mahsulotlar: <?php total_items(); ?>
                        Jami narx: <?php total_price(); ?>
                        <a href="index.php" style="color: #0056b3;">Do'konga qaytish</a>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "<a href='checkout.php' style='color: #0056b3;'>Kirish</a>";
                        } else {
                            echo "<a href='logout.php' style='color: #0056b3;'>Chiqish</a>";
                        }
                        ?>
                    </span>
                </div>
                <div id="packages_box">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table align="center" width="700px" bgcolor="skyblue">
                            <tr align="center">
                                <th>O'chirish</th>
                                <th>Paket(lar)</th>
                                <th>Miqdor</th>
                                <th>Jami narx</th>
                            </tr>
                            <?php
                            global $con;
                            $ip = getIp();
                            $sel_price = "SELECT * FROM cart WHERE ip_add='$ip'";
                            $run_price = mysqli_query($con, $sel_price);

                            while ($p_price = mysqli_fetch_array($run_price)) {
                                $pack_id = $p_price['p_id'];
                                $pack_price = "SELECT * FROM packages WHERE package_id='$pack_id'";
                                $run_pack_price = mysqli_query($con, $pack_price);

                                while ($pp_price = mysqli_fetch_array($run_pack_price)) {
                                    $package_price = array($pp_price['package_price']);
                                    $package_title = $pp_price['package_title'];
                                    $package_image = $pp_price['package_image'];
                                    $single_price = $pp_price['package_price'];
                                    $values = array_sum($package_price);
                                    $total += $values;
                                    ?>
                                    <tr align="center">
                                        <td><input type="checkbox" name="remove[]" value="<?php echo $pack_id; ?>"></td>
                                        <td>
                                            <?php echo $package_title; ?><br>
                                            <img src="admin_area/package_images/<?php echo $package_image; ?>"
                                                 width="60px" height="60px">
                                        </td>
                                        <td><input type="text" size="4" name="qty" value="<?php
                                            if (isset($_SESSION['qty'])) {
                                                echo $_SESSION['qty'];
                                            }
                                            ?>">
                                        </td>
                                        <?php
                                        global $con;
                                        if (isset($_POST['update_cart'])) {
                                            $qty = $_POST['qty'];

                                            $update_qty = "UPDATE cart SET qty='$qty'";
                                            $run_qty = mysqli_query($con, $update_qty);
                                            $_SESSION['qty'] = $qty;
                                            $total = ($qty * $total);
                                        }
                                        ?>
                                        <td>
                                            <?php echo "$" . $single_price; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            <tr align="right">
                                <td style='color: #0056b3;' colspan="4"><b>Sub jami:</b></td>
                                <td>
                                    <?php echo "$" . $total; ?>
                                </td>
                            </tr>
                            <tr align="center">
                                <td colspan="2"><input type="submit" name="update_cart" value="Savatchani yangilash"></td>
                                <td><input type="submit" name="continue" value="Do'konni davom ettirish"></td>
                                <td>
                                    <button><a href="checkout.php"
                                               style="text-decoration: none; color: #0056b3;">To'lov</a></button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                    function updatecart()
                    {
                        global $con;
                        $ip = getIp();

                        if (isset($_POST['update_cart'])) {
                            foreach ($_POST['remove'] as $remove_id) {
                                $delete_package = "DELETE FROM cart WHERE p_id='$remove_id' AND ip_add='$ip'";
                                $run_delete = mysqli_query($con, $delete_package);
                                if ($run_delete) {
                                    echo "<script>window.open('cart.php','self')</script>";
                                }
                            }
                        }
                        if (isset($_POST['continue'])) {
                            echo "<script>window.open('index.php','self')</script>";
                        }
                    }

                    echo @$up_cart = updatecart();
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
