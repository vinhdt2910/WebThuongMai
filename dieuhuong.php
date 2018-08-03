<?php
    $function = '';
    if (isset($_GET['route'])) {
        $function = $_GET['route'];
        // var_dump($function) ; exit();
        if ($function == 'login')
            include('login.php');
        else if ($function == 'logout')
        {
            session_destroy();
            include('home.php');
        }
    }
    else include('home.php');

?>