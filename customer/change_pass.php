<h2 style="text-align: center; margin-top: 20px;">Parolni o'zgartiring</h2><br>
<form action="" method="post">
    <table align="center" width="550">
        <tr align="right">
            <td><b>Joriy parolni kiriting:</b></td>
            <td><input type="password" name="current_pass" required=""></td>
        </tr>
        <tr align="right">
            <td><b>Yangi parolni kiriting:</b></td>
            <td><input type="password" name="new_pass" required=""></td>
        </tr>
        <tr align="right">
            <td><b>Yangi parolni qayta kiriting:</b></td>
            <td><input type="password" name="new_pass_again" required=""></td>
        </tr>
        <tr align="right">
            <td></td>
            <td colspan="8"><input type="submit" name="change_pass" value="Parolni o'zgartirish"></td>
        </tr>
    </table>
</form>
<?php
include("includes/db.php");

if (isset($_POST['change_pass'])) {

    $user = $_SESSION['customer_email'];

    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $new_again = $_POST['new_pass_again'];

    $sel_pass = "select * from customers where customer_pass='$current_pass' AND customer_email='$user'";

    $run_pass = mysqli_query($con, $sel_pass);

    $check_pass = mysqli_num_rows($run_pass);

    if ($check_pass == 0) {
        echo "<script>alert('Sizning joriy parolingiz noto‘g‘ri!')</script>";
        exit();
    }

    if ($new_pass != $new_again) {
        echo "<script>alert('Yangi parollar mos kelmayapti!')</script>";
        exit();
    } else {
        $update_pass = "update customers set customer_pass='$new_pass' where customer_email='$user'";
        $run_update = mysqli_query($con, $update_pass);

        echo "<script>alert('Sizning joriy parolingiz muvaffaqiyatli yangilandi!')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }
}
?>
<h2 style="text-align: center; margin-top: 20px;">Parolni o'zgartiring</h2><br>
<form action="" method="post">
    <table align="center" width="550">
        <tr align="right">
            <td><b>Joriy parolni kiriting:</b></td>
            <td><input type="password" name="current_pass" required=""></td>
        </tr>
        <tr align="right">
            <td><b>Yangi parolni kiriting:</b></td>
            <td><input type="password" name="new_pass" required=""></td>
        </tr>
        <tr align="right">
            <td><b>Yangi parolni qayta kiriting:</b></td>
            <td><input type="password" name="new_pass_again" required=""></td>
        </tr>
        <tr align="right">
            <td></td>
            <td colspan="8"><input type="submit" name="change_pass" value="Parolni o'zgartirish"></td>
        </tr>
    </table>
</form>
<?php
include("includes/db.php");

if (isset($_POST['change_pass'])) {

    $user = $_SESSION['customer_email'];

    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $new_again = $_POST['new_pass_again'];

    $sel_pass = "select * from customers where customer_pass='$current_pass' AND customer_email='$user'";

    $run_pass = mysqli_query($con, $sel_pass);

    $check_pass = mysqli_num_rows($run_pass);

    if ($check_pass == 0) {
        echo "<script>alert('Sizning joriy parolingiz noto‘g‘ri!')</script>";
        exit();
    }

    if ($new_pass != $new_again) {
        echo "<script>alert('Yangi parollar mos kelmayapti!')</script>";
        exit();
    } else {
        $update_pass = "update customers set customer_pass='$new_pass' where customer_email='$user'";
        $run_update = mysqli_query($con, $update_pass);

        echo "<script>alert('Sizning joriy parolingiz muvaffaqiyatli yangilandi!')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }
}
?>
<h2 style="text-align: center; margin-top: 20px;">Parolni o'zgartiring</h2><br>
<form action="" method="post">
    <table align="center" width="550">
        <tr align="right">
            <td><b>Joriy parolni kiriting:</b></td>
            <td><input type="password" name="current_pass" required=""></td>
        </tr>
        <tr align="right">
            <td><b>Yangi parolni kiriting:</b></td>
            <td><input type="password" name="new_pass" required=""></td>
        </tr>
        <tr align="right">
            <td><b>Yangi parolni qayta kiriting:</b></td>
            <td><input type="password" name="new_pass_again" required=""></td>
        </tr>
        <tr align="right">
            <td></td>
            <td colspan="8"><input type="submit" name="change_pass" value="Parolni o'zgartirish"></td>
        </tr>
    </table>
</form>
<?php
include("includes/db.php");

if (isset($_POST['change_pass'])) {

    $user = $_SESSION['customer_email'];

    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $new_again = $_POST['new_pass_again'];

    $sel_pass = "select * from customers where customer_pass='$current_pass' AND customer_email='$user'";

    $run_pass = mysqli_query($con, $sel_pass);

    $check_pass = mysqli_num_rows($run_pass);

    if ($check_pass == 0) {
        echo "<script>alert('Sizning joriy parolingiz noto‘g‘ri!')</script>";
        exit();
    }

    if ($new_pass != $new_again) {
        echo "<script>alert('Yangi parollar mos kelmayapti!')</script>";
        exit();
    } else {
        $update_pass = "update customers set customer_pass='$new_pass' where customer_email='$user'";
        $run_update = mysqli_query($con, $update_pass);

        echo "<script>alert('Sizning joriy parolingiz muvaffaqiyatli yangilandi!')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }
}
?>
