<?php
session_start();
include('connect.php');
$userid='';

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}
else {
    $userid = $_SESSION['guest'];
} 


    $masach=$_POST["bookid"];
    $sl=$_POST["quanlity"];
    $giamua=$_POST["giamua"];
    $sql1 = "SELECT Magiohang FROM giohang Where MaKH= '".$userid."'";
    
    $query1 = mysqli_query($conn, $sql1);

    $rowcount=mysqli_num_rows($query1);
  
    if($rowcount>0){

        $r = mysqli_fetch_array($query1);

        $sql2 = "SELECT Masach FROM chitietgiohang Where Magiohang=".$r['Magiohang'];
        $query2 = mysqli_query($conn, $sql2);
        $rowcount2=mysqli_num_rows($query2);     
      
        if($rowcount2>0)
        {
            while ($r2 = mysqli_fetch_array($query2))
            {
                
                if ($r2['Masach']== $masach)
                {
                    //var_dump('cap nhat'.$r2['Masach']."vs".$masach); exit();
                    $sqlSL = "SELECT Soluong FROM chitietgiohang Where Masach='".$masach."' AND Magiohang='".$r['Magiohang']."'";
                   
                    $querySL = mysqli_query($conn, $sqlSL);
                    $SlCu=mysqli_fetch_array($querySL);
                   
                    $sqlUpdate = "Update chitietgiohang set Soluong= ". ($sl+ $SlCu['Soluong']).", Giamua=".$giamua." Where Masach='".$masach."' AND Magiohang='".$r['Magiohang']."'";
                    
                    mysqli_query($conn, $sqlUpdate);
                }
                else
                {
                    //var_dump('them moi'.$r2['Masach']."vs".$masach); exit();
                    $sqlAdd="insert into chitietgiohang (Magiohang,Masach,Soluong,Giamua) values('".$r['Magiohang']."','".$masach."',".$sl.",".$giamua.")";
                   
                    mysqli_query($conn, $sqlAdd);
                }
            }
        }
        else{
            
            $sqlAdd1="insert into chitietgiohang (Magiohang,Masach,Soluong,Giamua) values('".$r['Magiohang']."','".$masach."',".$sl.",".$giamua.")";
            $query31 = mysqli_query($conn, $sqlAdd1);
        }
    }
    else{
        $sql="insert into giohang (MaKH,Ngaydat) values('".$userid ."',CURRENT_DATE())";
      
        mysqli_query($conn, $sql);
        
        $sql5 = "SELECT Max(Magiohang) as magio FROM `giohang`";
        $query5 = mysqli_query($conn, $sql5);
        $magiohang=mysqli_fetch_array( $query5);
        $sqladdbook="insert into chitietgiohang (Magiohang,Masach,Soluong,Giamua) values('".$magiohang['magio']."','".$masach."',".$sl.",".$giamua.")";
        mysqli_query($conn, $sqladdbook);
    }

// }
// else  {
//     $sql="insert into giohang (MaKH,Ngaydat) values('".$userid ."',CURRENT_DATE())";
//      mysqli_query($conn, $sql);
//      $sql5 = "SELECT Max(Magiohang) as magio FROM `giohang`";
//      $query5 = mysqli_query($conn, $sql5);
//      $magiohang=mysqli_fetch_array( $query5);
//      $sqladdbook="insert into chitietgiohang (Magiohang,Masach,Soluong,Giamua) values('".$magiohang['magio']."','".$masach."',".$sl.",".$giamua.")";
//      mysqli_query($conn, $sqladdbook);
// }

?>
