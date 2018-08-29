<?php
session_start();
include('connect.php');

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $masach=$_POST["bookid"];
    $sl=$_POST["quanlity"];
    $giamua=$_POST["giamua"];
    $sql1 = "SELECT Magiohang FROM giohang Where MaKH= '".$userid."'";
    $query1 = mysqli_query($conn, $sql1);
    $r = mysqli_fetch_array($query1);

    if(count($r)>0){
       // $r =
        $sql2 = "SELECT Masach FROM chitietgiohang Where Magiohang= '".$r['Magiohang']."'";
        $query2 = mysqli_query($conn, $sql2);

        while ($r2 = mysqli_fetch_array($query2))
        {
            if ($r2['Masach']== $masach)
            {
                $sqlUpdate="Update chitietgiohang set Masach='".$masach."',Soluong=".$sl.",Giamua=".$giamua."Where Magiohang='".$r['Magiohang']."'";
                mysqli_query($conn, $sqlUpdate);
            }
            else
            {
                $sqlAdd="insert into chitietgiohang (Magiohang,Masach,Soluong,Giamua) values('".$r['Magiohang']."','".$masach."',".$sl.",".$giamua.")";
                $query3 = mysqli_query($conn, $sqlAdd);
            }
        }
    }
    else{
        $sql="insert into giohang (MaKH,Ngaydat) values('".$userid ."',CURRENT_DATE())";
       // echo $sql; exit();
        mysqli_query($conn, $sql);
        
        $sql5 = "SELECT Max(Magiohang) as magio FROM `giohang`";
        $query5 = mysqli_query($conn, $sql5);
        $magiohang=mysqli_fetch_array( $query5);
        $sqladdbook="insert into chitietgiohang (Magiohang,Masach,Soluong,Giamua) values('".$magiohang['magio']."','".$masach."',".$sl.",".$giamua.")";
        mysqli_query($conn, $sqladdbook);
    }

}

?>
