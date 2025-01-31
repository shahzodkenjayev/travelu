<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biz bilan bog'laning</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <style>
        #guides {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            border: 1px solid black;
            width: 740px;
        }

        #guides th {
            text-align: left;
            background-color: #3A6070;
            color: #fff;
            padding: 4px;
        }

        #guides td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
        }

        #guides tr:nth-child(odd) td {
            background-color: #E7EDF0;
        }

        #regoff {
            font-size: 15px;
        }

        #headoff {
            font-size: 16px;
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
            <div class="sidebar">
                <div id="sidebar_title"><b>Biz bilan bog'laning</b></div>
                <br><br><br><br><br><br><br>
                <div id="sidebar_title"><b>24/7 Yordam liniyasi</b></div>
                <div id="sidebar_title"><b>Telefon: +99878-777-11-11</b></div>
            </div>
            <div id="content_area">
                <div id="packages_box">
                    <br>
                    <h2 style="font-family: Cambria;">Bizning Mahalliy Gidlarimiz</h2>
                    <br>
                    <table id="guides" align="center" bgcolor="#EEE0CB">
                        <tr align="center" bgcolor="#5FCEE8">
                            <th id="thfix">Ism</th>
                            <th id="thfix">Email</th>
                            <th id="thfix">Joylashuv</th>
                            <th id="thfix">Manzil</th>
                            <th id="thfix">Aloqa</th>
                        </tr>
                        <?php
                        include("includes/db.php");

                        $get_c = "SELECT * FROM employees";
                        $run_c = mysqli_query($con, $get_c);
                        $i = 0;

                        while ($row_c = mysqli_fetch_array($run_c)) {
                            $e_id = $row_c['emp_id'];
                            $e_name = $row_c['emp_name'];
                            $e_email = $row_c['emp_email'];
                            $e_designation = $row_c['emp_designation'];
                            $e_location = $row_c['emp_location'];
                            $e_address = $row_c['emp_address'];
                            $e_contact = $row_c['emp_contact'];
                            $i++;

                            ?>
                            <tr align="left">
                                <td style="width: 150px;"><?php echo $e_name; ?></td>
                                <td style="width: 160px;"><?php echo $e_email; ?></td>
                                <td style="width: 100px;"><?php echo $e_location; ?></td>
                                <td style="width: 240px;" align="center"><?php echo $e_address; ?></td>
                                <td style="width: 120px;"><?php echo $e_contact; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>


        <table id="guides" align="center" bgcolor="#EEE0CB">
    <tr align="center" bgcolor="#5FCEE8">
        <th id="thfix">Companiya</th>
        <th id="thfix">Р/с:</th>
        <th id="thfix">Manzil</th>
        <th id="thfix">Bank</th>
        <th id="thfix">МФО</th>
        <th id="thfix">ИНН</th>
    </tr>
    <tr align="left">
        <td style="width: 150px;"><?php echo "UNITUR" . " MCHJ"; ?></td>
        <td style="width: 160px;"><?php echo 202080003071869490; ?></td>
        <td style="width: 100px;"><?php echo "TOSHKENT SHAHRI, BEKTEMIR TUMANI, XUSAYN BOYQARO KO'CHASI, 117-UY"; ?></td>
        <td style="width: 240px;" align="center"><?php echo "Ipak yo'li bank Sag'bon filiali"; ?></td>
        <td style="width: 120px;"><?php echo 01036; ?></td>
        <td style="width: 120px;"><?php echo 311796396; ?></td>
    </tr>
</table>

                    <br><br><br>
                    <h3 style="font-family: Cambria;">Bosh Ofis:</h3>
                    <p id="headoff"><b>Manzil: </b>Toshkent sh . Bektemir t. Husayn Bayqaro 117-uy.<br>
                        <b>Aloqa: </b>+99878-777-11-11
                    </p>
                    <br>
                    <h4 style="font-family: Cambria;">Mintaqaviy Ofis:</h4>
                    <p id="regoff"><b>Manzil: </b>Toshkent sh . Bektemir t. Husayn Bayqaro 117-uy.<br>
                        <b>Aloqa: </b>+99878-777-11-11
                    </p>
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
