<?php
session_start();
include('connect.php');
include('sendmail.php');
$userid='';
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}
else {
    $userid = $_SESSION['guest'];
}  

    $sqlemail="SELECT * FROM `user` WHERE User_ID='".$userid."'";
    $queryemail = mysqli_query($conn, $sqlemail);
    $user=mysqli_fetch_array($queryemail);

    $sql1 = "INSERT INTO `hoadon`(Makh,Ngaydat,Tinhtrang) values('".$userid ."',CURRENT_DATE(),'0')";
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
   
    $title='Thông tin đơn hàng: '.$mahd['mahd'];

    $hang=' ';
    $tongsotien = 0;
        $sbook = "SELECT ct.Mahd, ct.Masach,ct.Soluong, ct.Giamua,b.Tensach,b.anh FROM `cthoadon` ct JOIN `hoadon` g on ct.Mahd = g.Mahd join `book` b on b.Masach=ct.Masach where g.Mahd='".$mahd['mahd']."'AND g.Makh = '".$userid."'";
        $re2 = mysqli_query($conn, $sbook);
        $pos = 1;
        $tongsotien = 0;
         while ($row = mysqli_fetch_array($re2)) 
        {
            $tongsotien += $row['Soluong']*$row['Giamua'];
            $hang .='<tr>
            <td class="cotSTT">'.$pos++.'</td>
            <td class="cotTenSanPham">'.$row['Tensach'].'</td>
            <td class="cotGia">'.$row['Giamua'].'</td>
            <td class="cotSoLuong" align="center">'.$row['Soluong'].'</td>
            <td class="cotSo">'.number_format(($row['Soluong']*$row['Giamua']),0,",",".").'</td>
            </tr>';
        }       
    
    $content='
    <!DOCTYPE html>
    <html lang="vi">
    <head>
<style>
.page {
    width: 21cm;
    overflow:hidden;
   
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
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
</head>
<body>
    <div id="page" class="page">
    
  <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
  </div>
  <br/>
  <div>
  <b>Tên khách hàng: </b>'.$user['Hoten'].'
  
  </div>
  <div>
  <b>Email: </b>'.$user['Email'].'
  </div>
  <div>
  <b>SĐT: </b>'.$user['Sodt'].'
  </div>
  <div>
  <b>Địa chỉ: </b>'.$user['Diachi'].'
  </div>
  
  <br/>
  <table class="TableData">
    <tr>
      <th>STT</th>
      <th>Tên</th>
      <th>Đơn giá</th>
      <th>Số</th>
      <th>Thành tiền</th>
     </tr>'.
     $hang.'<tr>
      <td colspan="4" class="tong">Tổng cộng</td>
      <td class="cotSo">'.number_format(($tongsotien),0,",",".").' đ</td>
    </tr>
   
    <tr>
    <td colspan="5" style="background-color:#069;color:#fff;font-size:12px;font-weight:bold;padding:0.5em 1em" align="left"></td>
  </tr>
  <tr>
  <td colspan="5">&nbsp;</td>
</tr>
  <tr>
    <td colspan="5" style="font-size:10px;border-top:1px solid #069" align="center"><a style="color:#069;font-weight:bold;text-decoration:none" target="_blank" >Tủ sách thiếu nhi</a></td>
  </tr>
  </table>
  Cảm ơn bạn đã quan tâm đến sản phẩm Tủ sách thiếu nhi của chúng tôi. Chúng tôi đã nhận được đơn hàng của bạn và sẽ được xử lý sau khi bạn xác nhận thanh toán.

</div>
</body>
</html>
';

$mTo=$user['Email'];
if (sendMail($title,$content,$mTo)==1)
{
    echo 1; exit();
}
   
        

?>
