<?php
session_start();
include('connect.php');

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];

    $sql1 = "INSERT INTO `hoadon`(Makh,Ngaydat,Tinhtrang) values('".$userid ."',CURRENT_DATE(),'Chưa xử lý')";
    $query1 = mysqli_query($conn, $sql1);

    $sqlmaHD="SELECT Max(Mahd) as mahd FROM `hoadon`";
    
    $queryHd = mysqli_query($conn, $sqlmaHD);
    $mahd=mysqli_fetch_array( $queryHd);

    $sql2 = "SELECT ct.Masach, ct.Soluong, ct.Giamua FROM chitietgiohang as ct join giohang as gio on ct.Magiohang=gio.Magiohang Where gio.Makh='".$userid."'";
   
    $query2 = mysqli_query($conn, $sql2);
    $rowcount2=mysqli_num_rows($query2);     
  
    if($rowcount2>0)
    {
        while ($r2 = mysqli_fetch_array($query2))
        {
            $sqlinsert = "INSERT INTO `cthoadon`(`Mahd`, `Masach`, `Soluong`, `Giamua`) values (".$mahd['mahd'].",".$r2['Masach'].",".$r2['Soluong'].",".$r2['Giamua'].");";
            
            mysqli_query($conn, $sqlinsert);
        }
    }
    $sqldelctgio = "DELETE FROM chitietgiohang Where Magiohang=(SELECT Magiohang FROM giohang WHERE Makh= ".$userid.")";  
    mysqli_query($conn, $sqldelctgio);
    $sqldelgio = "DELETE FROM giohang Where Makh='".$userid."'";  
    mysqli_query($conn, $sqldelgio);

}else  {
    // $sql="insert into giohang (MaKH,Ngaydat) values('".$userid ."',CURRENT_DATE())";
    //  mysqli_query($conn, $sql);
    //  $sql5 = "SELECT Max(Magiohang) as magio FROM `giohang`";
    //  $query5 = mysqli_query($conn, $sql5);
    //  $magiohang=mysqli_fetch_array( $query5);
    //  $sqladdbook="insert into chitietgiohang (Magiohang,Masach,Soluong,Giamua) values('".$magiohang['magio']."','".$masach."',".$sl.",".$giamua.")";
    //  mysqli_query($conn, $sqladdbook);
}

?>
