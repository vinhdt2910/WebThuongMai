<?php
    $route = '';
    $type='';
    if (isset($_GET['route'])) {
        $route = $_GET['route'];
        // var_dump($function) ; exit();
        if ($route == 'login')
            include('login.php');
        else if ($route == 'cate')
        {
            include('category.php');
        }
        else if ($route == 'inforuser')
        {
            include('inforuser.php');
        }
        else if ($route == 'cart')
        {
            include('cart.php');
        }
        else if ($route == 'regist')
        {
            include('regist.php');
        }
        else if($route == 'book')
        {
            include('book_detail.php');
        }
    }
    else include('home.php');

?>