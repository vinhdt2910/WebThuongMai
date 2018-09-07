<?php

include('connect.php');
	$book = $_POST["book"];
    $action = $_POST["action"];
    $cart= $_POST["cart"];
    $sl = $_POST["quantity"];
    if($action == "3"){
    $sql1 = "delete from chitietgiohang where Masach = '$book' and Magiohang='$cart'";
   
     $query1 = mysqli_query($conn, $sql1);
   
     if($query1=="1"){
        echo 3;
        exit();
     }
    }
    if($action == "1"){
       
        $sql2 = "Update chitietgiohang set Soluong=$sl where Masach = '$book' and Magiohang='$cart'";
       
         $query2 = mysqli_query($conn, $sql2);
       
         if($query2=="1"){
            echo 1;
            exit();
        }
    }
   
	
	
?>