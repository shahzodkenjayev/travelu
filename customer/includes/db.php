<?php
$server = 'localhost';
$username = 'root';
$password = 'newpassword';
$database = 'tagency';

// MySQLga ulanish
$con = mysqli_connect($server, $username, $password, $database);

// Agar ulanishda xato bo'lsa
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully!";
}
