<?php
session_start();
include('connect.php');
include('sendmail.php');

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];

    // $sql1 = "INSERT INTO `hoadon`(Makh,Ngaydat,Tinhtrang) values('".$userid ."',CURRENT_DATE(),'Chưa xử lý')";
    // $query1 = mysqli_query($conn, $sql1);

    $sqlmaHD="SELECT Max(Mahd) as mahd FROM `hoadon`";
    
    $queryHd = mysqli_query($conn, $sqlmaHD);
    $mahd=mysqli_fetch_array( $queryHd);

    $sql2 = "SELECT ct.Masach, ct.Soluong, ct.Giamua FROM chitietgiohang as ct join giohang as gio on ct.Magiohang=gio.Magiohang Where gio.Makh='".$userid."'";
   
    $query2 = mysqli_query($conn, $sql2);
    $rowcount2=mysqli_num_rows($query2);     
  
    // if($rowcount2>0)
    // {
    //     while ($r2 = mysqli_fetch_array($query2))
    //     {
    //         $sqlinsert = "INSERT INTO `cthoadon`(`Mahd`, `Masach`, `Soluong`, `Giamua`) values (".$mahd['mahd'].",".$r2['Masach'].",".$r2['Soluong'].",".$r2['Giamua'].");";
            
    //         mysqli_query($conn, $sqlinsert);
    //     }
    // }
    // $sqldelctgio = "DELETE FROM chitietgiohang Where Magiohang=(SELECT Magiohang FROM giohang WHERE Makh= ".$userid.")";  
    // mysqli_query($conn, $sqldelctgio);
    // $sqldelgio = "DELETE FROM giohang Where Makh='".$userid."'";  
    // mysqli_query($conn, $sqldelgio);
   
    $title='Thông tin đơn hàng: '.$mahd['mahd'];
    $content='
<style>
.page {
    width: 21cm;
    overflow:hidden;
    min-height:297mm;
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
button {
    width:100px;
    height: 24px;
}
.header {
    overflow:hidden;
}
.logo {
    background-color:#FFFFFF;
    text-align:left;
    float:left;
}
.company {
    padding-top:24px;
    text-transform:uppercase;
    background-color:#FFFFFF;
    text-align:right;
    float:right;
    font-size:16px;
}
.title {
    text-align:center;
    position:relative;
    color:#0000FF;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
.TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}
.TableData .cotSTT {
    text-align:center;
    width: 10%;
}
.TableData .cotTenSanPham {
    text-align:left;
    width: 40%;
}
.TableData .cotHangSanXuat {
    text-align:left;
    width: 20%;
}
.TableData .cotGia {
    text-align:right;
    width: 120px;
}
.TableData .cotSoLuong {
    text-align: center;
    width: 50px;
}
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
.TableData .cotSoLuong input {
    text-align: center;
}
</style>
    <div id="page" class="page">
    <div class="header">
        <div class="logo"><img src="image/data/34.jpg"/></div>
        <div class="company">Thanh Hà Book</div>
    </div>
  <br/>
  <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
  </div>
  <br/>
  <br/>
  <table class="TableData">
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>Đơn giá</th>
      <th>Số</th>
      <th>Thành tiền</th>
     </tr><tr>
      <td colspan="4" class="tong">Tổng cộng</td>
      <td class="cotSo">0 đ</td>
    </tr>
  </table>
  <div class="footer-left"> Hà nội, ngày 09 tháng 09 năm 2018<br/>
    Khách hàng </div>
  <div class="footer-right">  Hà nội, ngày 09 tháng 09 năm 2018<br/>
    Nhân viên </div>
</div>';
  

 
    $sqlemail="SELECT email FROM `user` WHERE User_ID='".$userid."'";
    $queryemail = mysqli_query($conn, $sqlemail);
    $email=mysqli_fetch_array($queryemail);

    $mTo=$email['email'];
    if (sendMail($title,$content,$mTo)==1)
    {
        echo 1; exit();
    }
   
        
}
?>
