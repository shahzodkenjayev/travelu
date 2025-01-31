<?php
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Путешествие: Подробности</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
    <!--Основной контейнер начало-->
    <div class="main_wrapper">
        <!--Заголовок начало-->
        <?php include 'includes/headerru.php'; ?>
        <!--Заголовок конец-->
        <!--Панель навигации начало-->
        <?php include 'includes/navbarru.php'; ?>
        <!--Панель навигации конец-->
        <!--Контент начало-->
        <div class="content_wrapper">
            <!--Левая боковая панель начало-->
            <?php include "includes/left-sidebar.php"; ?>
            <!--Левая боковая панель конец-->
            <div id="content_area">
                <div id="shopping_cart">
                    <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">Добро пожаловать, Гость! <b
                                style="color: yellow;">Корзина -</b> Всего товаров: Общая сумма: <a href="cart.php"
                                                                                                       style="color: yellow;">Перейти в корзину</a></b></span>
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
                            <p><b>Цена: $ $pack_price</b></p>
                            <p>$pack_desc</p>
                            <a href='index.php' style='float: left; font-size: 18px;'>Назад</a>
                            <a href='index.php?pack_id=$pack_id'><button style='float: right;font-size:16px; cursor: pointer; padding: 2px 4px; margin:2px;'>Оформить заказ</button></a>
                            </div>
                            ";
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
        <!--Контент конец-->
        <!--Панель пользователя начало-->
        <?php include "includes/footerru.php";?>
        <!--Панель пользователя конец-->
    </div>
    <!--Основной контейнер конец-->
</body>
</html>
