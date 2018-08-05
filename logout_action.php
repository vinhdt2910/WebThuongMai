<?php
session_start();
include('connect.php');
session_destroy();
echo 1;
exit();
?>