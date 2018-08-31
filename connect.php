<?php
$conn = new mysqli("localhost", "root", "") or die("không thể kết nối database");
mysqli_select_db($conn, "webthuongmai");
mysqli_set_charset($conn, 'UTF8');
mysqli_query($conn, "SET NAMES 'UTF8'");

?>