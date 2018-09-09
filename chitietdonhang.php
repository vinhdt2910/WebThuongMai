<?php
  if (isset($_GET['mahd'])) {
    $mahd= $_GET['mahd'];
}
?>
<div class="top">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center">
        <h1>
           Chi tiết đơn hàng
        </h1>
    </div>
</div>
<div class="middle">
    <div>
        <table class="cart">
            <tr>
                <th align="center">Hình</th>
                <th align="left">Tên</th>
                <th align="right">Số lượng</th>
                <th align="right">Đơn giá</th>
                <th align="right">Tổng</th>
            </tr>
            
        <?php
                if (isset( $_SESSION['userid'])){
                    $userid = $_SESSION['userid'];
                    $sbook = "SELECT ct.Mahd, ct.Masach,ct.Soluong, ct.Giamua,b.Tensach,b.anh FROM `cthoadon` ct JOIN `hoadon` g on ct.Mahd = g.Mahd join `book` b on b.Masach=ct.Masach where g.mahd='".$mahd."' AND g.Makh = '".$userid."'";
                    $re2 = mysqli_query($conn, $sbook);
                   
                    $Tong=0;
                    $i=0;
                    $rowcount=mysqli_num_rows($re2);     
                    while ($r2 = mysqli_fetch_array($re2)) {
                        $Tong= $Tong+ $r2['Giamua'] * $r2['Soluong'];
                        $i++;
                ?>
            <tr class="even">
             
                <td align="center" width="80px">
                    <a href="index.php?route=book&type=<?php echo $r2['Masach'] ?>">
                        <img title="<?php echo $r2['Tensach']; ?>" style="width: 75px" src="image/<?php echo $r2['anh'] ?>" alt="<?php echo $r2['Tensach']; ?>" />
                    </a>
                </td>
                <td align="left" valign="top">
                    <a href="index.php?route=book&type=<?php echo $r2['Masach'] ?>"><?php echo $r2['Tensach'] ?></a>
                    <span style="color: #FF0000; font-weight: bold;" class="stock"></span>
                    <div>
                    </div>
                </td>

                <td align="right" valign="top">
                <?php echo ($r2['Soluong']);?>
                </td>
                <td align="right" valign="top" class="price"><?php echo number_format($r2['Giamua']); ?> đ</td>
                <td align="right" valign="top" class="total"><?php echo number_format($r2['Giamua']*$r2['Soluong']); ?> đ</td>
            </tr>
           

            <?php
                }
                ?>

        </table>
   
        <div style="width: 100%; display: inline-block;" class="cart-total">
            <table style="float: right; display: inline-block;">
                <tr>
                    <td align="right"><b>Tổng:</b></td>
                    <td align="right"><?php echo number_format($Tong); ?>đ</td>
                </tr>
            </table>
            <br />
        </div>
        <?php
                }
                ?>
        <div class="buttons">
            <table>
                <tr>
                    <td align="left"><a onclick="location = 'index.php?route=inforuser'" class="button"><span>Quay lại</span></a></td>
                   
                </tr>
            </table>
        </div>
    </div>
</div>
