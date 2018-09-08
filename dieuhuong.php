<?php
    $route = '';
    $type='';
    if (isset($_GET['route'])) {
        $route = $_GET['route'];
      
        switch($route) {
	
            case 'login':
            include('login.php');
            break;
            
            case 'cate':
            include('category.php');
            break;

            case 'cart':
            include('cart.php');
            break;

            case 'search':
            include('search.php');
            break;

            case 'inforuser':
            include('inforuser.php');
            break;

            case 'regist':
            include('regist.php');
            break;

            case 'book':
            include('book_detail.php');
            break;
            
            case 'checkout':
            include('checkout.php');
            break;

            case 'thanks':
            include('thanks.php');
            break;

            default:
            include('home.php');break;
        
        } 
    } else  {
        include('home.php');
    }
?>