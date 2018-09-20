<?php

session_start();
include('connect.php');
	$username = $_POST["username"];
    $password = md5($_POST["password"]);
    
     $sql1 = "select * from user where Email = '$username' and Loainguoidung=2 and Trangthai = 1 ";

     $query1 = mysqli_query($conn, $sql1);

     $row1 = mysqli_fetch_assoc($query1);
     $admin_num_row = mysqli_num_rows($query1);
 
     if ($admin_num_row > 0) {
         if($row1['Password'] == $password)
         {
        $_SESSION['userid'] = $row1['User_ID'];
        $_SESSION['name'] = $row1['Hoten'];
        
        if ($row1['Loainguoidung'] == 1) {
            echo 1;
            exit();
        }
        else if($row1['Loainguoidung'] == 2)
        {
        echo 2;
		exit();
        }
        // Nếu thông tin đăng nhập sai, trả về giá trị là 0
	    echo 0;
        exit();
    }
     // Nếu thông tin đăng nhập sai, trả về giá trị là 0
     echo 0;
     exit();
    }
	// Nếu thông tin đăng nhập chính xác, trả về giá trị là 1
	
?>