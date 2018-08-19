<?php

session_start();
include('connect.php');
    $email = $_POST["email"];
    $Hoten = $_POST["Hoten"];
    $Sodt = $_POST["Sodt"];
    $Diachi = $_POST["Diachi"];
    $password = md5($_POST["password"]);
    
     $sql1 = "INSERT INTO user (User_ID, Email, Password, Hoten, Sodt, Diachi, Loainguoidung, Trangthai) VALUES (NULL, '$email', '$password', '$Hoten', '$Sodt', '$Diachi', '2', '1')";

     $query1 = mysqli_query($conn, $sql1);
    if ($query1==true){
        echo 2;
        exit();
    }
    
    //  $row1 = mysqli_fetch_assoc($query1);
    //  $admin_num_row = mysqli_num_rows($query1);
 
    //  if ($admin_num_row > 0) {
    //      if($row1['Password'] == $password)
    //      {
    //     $_SESSION['userid'] = $username;
    //     $_SESSION['name'] = $row1['Hoten'];
        
    //     if ($row1['Loainguoidung'] == 1) {
    //         echo 1;
    //         exit();
    //     }
    //     else if($row1['Loainguoidung'] == 2)
    //     {
    //     echo 2;
	// 	exit();
    //     }
    //     // Nếu thông tin đăng nhập sai, trả về giá trị là 0
	//     echo 0;
    //     exit();
    // }
    //  // Nếu thông tin đăng nhập sai, trả về giá trị là 0
    //  echo 0;
    //  exit();
    // }
	// // Nếu thông tin đăng nhập chính xác, trả về giá trị là 1
	
?>