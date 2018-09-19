<?php 

session_start();
include('connect.php');
$email = $_POST["email"];
$Hoten = $_POST["Hoten"];
$Sodt = $_POST["Sodt"];
$Diachi = $_POST["Diachi"];

if (isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
$sqlemail="SELECT * FROM `user` WHERE User_ID='".$userid."'";
$queryemail = mysqli_query($conn, $sqlemail);
$rowcount2=mysqli_num_rows($queryemail);     
if  ( $rowcount2>0)
{
 
    if(isset($_POST["password"]))
    {   
        $pass=$_POST["password"];
        $password = md5($pass);

        $sql1 = "UPDATE user set Email = '$email', Password='$password', Hoten='$Hoten', Sodt='$Sodt', Diachi='$Diachi' WHERE User_ID='".$userid."'";

        $query1 = mysqli_query($conn, $sql1);
        if ($query1==true){
            echo 1; exit();
        }
        else{
            echo 0;
            exit();
        }
    }
    else
    {
    
        $sql1 = "UPDATE user set Email = '$email',Hoten='$Hoten', Sodt='$Sodt', Diachi='$Diachi' WHERE User_ID='".$userid."'";

        $query1 = mysqli_query($conn, $sql1);
     echo 1; exit();
 }
}
}
?>
