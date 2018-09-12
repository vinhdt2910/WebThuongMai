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
                $sbook = "SELECT ct.Magiohang, ct.Masach,ct.Soluong, ct.Giamua,b.Tensach,b.anh,b.Soluong as 'Slton' FROM `chitietgiohang` ct JOIN `giohang` g on ct.Magiohang = g.Magiohang join `book` b on b.Masach=ct.Masach where g.Makh = '".$userid."'";
                    $re2 = mysqli_query($conn, $sbook);
                    //var_dump($sbook) ; exit();
                    $Tong=0;
                    $i=0;
                    $rowcount=mysqli_num_rows($re2);     
                    while ($r2 = mysqli_fetch_array($re2)) {
                        $Tong= $Tong+ $r2['Giamua'] * $r2['Soluong'];
                        $i++;
                ?>
            <tr class="even">
                <td align="center">
                    <a onclick="if (confirm('Bạn có chắc xóa sản phẩm này không?')) {removebook(<?php echo $r2['Masach']?>,<?php echo $r2['Magiohang']?>);}" ><img src="Template/theme/default/image/cancel.png" class="removeimg" /></a>
                </td>
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
                    <a onclick="plusvalue(<?php echo $i; ?>,<?php echo $r2['Masach']?>,<?php echo $r2['Magiohang']?>,<?php echo $r2['Slton'] ?>)" ><img src="Template/theme/default/image/plus.png" class="plusimg" align="absmiddle" /></a>&nbsp;
                    <input readonly="true" type="text" id="quantity<?php echo $i; ?>" value="<?php echo ($r2['Soluong']);?>" size="1" style="width:24px;" />&nbsp;
                    <a onclick="subvalue(<?php echo $i; ?>,<?php echo $r2['Masach']?>,<?php echo $r2['Magiohang']?>)" ><img src="Template/theme/default/image/subtract.png" class="subtractimg" align="absmiddle"/></a>
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
                    <td align="left"><a onclick="location = 'index.php'" class="button"><span>Tiếp tục mua hàng</span></a></td>
                    <?php if ($rowcount>0){ ?>
                    <td align="right"><a onclick="location = 'index.php?route=checkout'" class="button"><span>Thanh toán</span></a></td>
                    <?php } ?>
                </tr>
            </table>
        </div>
    </form>
</div>
<script>
function plusvalue(i,b,c,t){
    
    document.getElementById("quantity"+i).value = parseInt(document.getElementById("quantity"+i).value)+1;
    var quantity=document.getElementById("quantity"+i).value;
    if(quantity>t)
    {alert('Số lượng sách trong kho chỉ còn: '+t)}
    else{
    var book= b;
    var cart= c;
    $.ajax({
    url: "cartaction.php",
    method: "POST",
    data: { book: book, cart:cart,action:"1",quantity:quantity },
    success: function (response) {
        if (response == "1") {// kiem tra du lieu ra
         window.location="index.php?route=cart";    
        } 
    }
});
}
}

function removebook(i,e){
    var book= i;
    var cart= e;
    $.ajax({
    url: "cartaction.php",
    method: "POST",
    data: { book: book, cart:cart,action:"3",quantity:0 },
    success: function (response) {
        if (response == "3") {// kiem tra du lieu ra
         window.location="index.php?route=cart";    
        } 
    }
});

}

function subvalue(i,b,c){
    if(parseInt(document.getElementById("quantity"+i).value)>1)
    document.getElementById("quantity"+i).value = parseInt(document.getElementById("quantity"+i).value)-1;

    var quantity=document.getElementById("quantity"+i).value;
    var book= b;
    var cart= c;
    $.ajax({
    url: "cartaction.php",
    method: "POST",
    data: { book: book, cart:cart,action:"1",quantity:quantity },
    success: function (response) {
        if (response == "1") {// kiem tra du lieu ra
         window.location="index.php?route=cart";    
        } 
    }
});
}
</script>