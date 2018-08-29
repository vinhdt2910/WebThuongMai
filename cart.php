
<div class="top">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center">
        <h1>
            Giỏ hàng
        </h1>
    </div>
</div>
<div class="middle">
    <form action="cartaction.php" method="post" enctype="multipart/form-data" id="cart">
        <table class="cart">
            <tr>
                <th align="center">Loại bỏ</th>
                <th align="center">Hình</th>
                <th align="left">Tên</th>
                <th align="right">Số lượng</th>
                <th align="right">Đơn giá</th>
                <th align="right">Tổng</th>
            </tr>
            
        <?php
                if (isset( $_SESSION['userid'])){
                    $userid = $_SESSION['userid'];
                $sbook = "SELECT ct.Magiohang, ct.Masach,ct.Soluong, ct.Giamua,b.Tensach,b.anh FROM `chitietgiohang` ct JOIN `giohang` g on ct.Magiohang = g.Magiohang join `book` b on b.Masach=ct.Masach where g.Makh = '".$userid."'";
                    $re2 = mysqli_query($conn, $sbook);
                    //var_dump($sbook) ; exit();
                    $Tong=0;
                    $i=0;
                    while ($r2 = mysqli_fetch_array($re2)) {
                        $Tong= $Tong+ $r2['Giamua'] * $r2['Soluong'];
                        $i++;
                ?>
            <tr class="even">
                <td align="center"><img src="Template/theme/default/image/cancel.png" class="removeimg" /><input type="hidden" name="remove[]" value="386" /></td>
                <td align="center" width="80px">
                    <a href="index.php?route=book&type=<?php echo $r2['Masach'] ?>">
                        <img title="<?php echo $r2['Tensach']; ?>" style="width: 75px" src="image/<?php echo $r2['anh'] ?>" alt="<?php echo $r2['Tensach']; ?>" />
                    </a>
                </td>
                <td align="left" valign="top">
                    <a href="index.php/route=book&type=<?php echo $r2['Masach'] ?>"><?php echo $r2['Tensach'] ?></a>
                    <span style="color: #FF0000; font-weight: bold;" class="stock"></span>
                    <div>
                    </div>
                </td>

                <td align="right" valign="top">
                    <img src="Template/theme/default/image/plus.png" class="plusimg" align="absmiddle" onclick="plusvalue(<?php echo $i; ?>)" />&nbsp;
                    <input type="text" id="quantity<?php echo $i; ?>" value="<?php echo ($r2['Soluong']);?>" size="1" style="width:24px;" />&nbsp;
                    <img src="Template/theme/default/image/subtract.png" class="subtractimg" align="absmiddle" onclick="subvalue(<?php echo $i; ?>)"  />
                </td>
                <td align="right" valign="top" class="price"><?php echo number_format($r2['Giamua']); ?>đ</td>
                <td align="right" valign="top" class="total">168,000 đ</td>
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
                    <td align="left"><a onclick="location = 'http://thanhhabooks.com/index.php?route=product/product&product_id=386'" class="button"><span>Tiếp tục mua hàng</span></a></td>
                    <td align="right"><a onclick="location = 'http://thanhhabooks.com/index.php?route=checkout/shipping'" class="button"><span>Thanh toán</span></a></td>
                </tr>
            </table>
        </div>
    </form>
</div>
<script>
function plusvalue(i){
    //$("#quantity").val()=$("#quantity".i).val()+1;
    alert('i');
}

function subvalue(i){
    $("#quantity".i).val()=$("#quantity".i).val() +1;
}
</script>