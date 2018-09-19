<?php 

session_start();
include('connect.php');
include('sendmail.php');
$email = $_POST["email"];
$Hoten = $_POST["Hoten"];
$Sodt = $_POST["Sodt"];
$Diachi = $_POST["Diachi"];


$sqlemail="SELECT * FROM `user` WHERE Email='".$email."'";
$queryemail = mysqli_query($conn, $sqlemail);
$rowcount2=mysqli_num_rows($queryemail);     
if  ( $rowcount2>0)
{
    echo 2; exit();
}
else{
    if(isset($_POST["password"]))
    {   
        $pass=$_POST["password"];
        $password = md5($pass);

        $sql1 = "INSERT INTO user (User_ID, Email, Password, Hoten, Sodt, Diachi, Loainguoidung, Trangthai) VALUES (NULL, '$email', '$password', '$Hoten', '$Sodt', '$Diachi', '2', '1')";

        $query1 = mysqli_query($conn, $sql1);
        if ($query1==true){
            $title='Đăng ký tài khoản';
            $content='Đăng ký tài khoản thành công<br />Thông tin tài khoản đăng nhập của bạn: <br />Tài khoản: '.$email.'<br />Mật khẩu: '.$pass;

            $mTo=$email;

            if (sendMail($title,$content,$mTo)==1)
            {
                echo 1; exit();
            }
            else  echo 0; exit();
        }
        else{
            echo 0;
            exit();
        }
    }
    else
    {
     $sql1 = "INSERT INTO user (User_ID, Email, Password, Hoten, Sodt, Diachi, Loainguoidung, Trangthai) VALUES ('".$_SESSION['guest']."', '$email', '', '$Hoten', '$Sodt', '$Diachi', '1', '1')";
     $query1 = mysqli_query($conn, $sql1);
     echo 1; exit();
 }
}
?>
