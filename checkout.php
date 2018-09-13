
<div class="top">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center">
        <h1>Đặt hàng</h1>
    </div>
</div>


    <div class="onecheckout">
        <div id="payment-address">
            <div class="onecheckout-heading"><span>Thanh toán</span></div>
            <div class="onecheckout-content">
                <?php
                if (isset( $_SESSION['userid'])){
                $userid = $_SESSION['userid'];
                $s = "select * from user where User_ID='".$userid."'";
                $re = mysqli_query($conn, $s);
                $r = mysqli_fetch_array($re);
                ?>
                <label for="payment-address-existing">Địa chỉ giao hàng</label>
                <div id="payment-existing" style="display: block;">

                    <select name="address_id" style="width: 100%; margin-bottom: 15px;" size="5">
                        <option value="8"><?php echo $r['Diachi'] ?></option>
                    </select>

                </div>
                <div class="buttons">
                    <div style="text-align:right;"><a href="index.php?route=inforuser" class="button"><span>Thay đổi địa chỉ</span></a></div>
                </div>
                <?php }
                else{
                ?>
                 <table>
            <tr>
                <td width="150"></td>
                <td>
                    <span id="err" class="error"></span>
                </td>
            </tr>
            <tr>
                <td width=""><span class="required">*</span> Tên bạn:</td>
                <td>
                    <input type="text" id="Hoten" value="" />
                </td>
            </tr>
            <tr>
                <td><span class="required">*</span> E-Mail:</td>
                <td>
                    <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">

                </td>
            </tr>
            <tr>
                <td><span class="required">*</span> Điện thoại:</td>
                <td>
                    <input type="text" id="Sodt" value="" />

                </td>
            </tr>
            <tr>
                <td><span class="required">*</span> Địa chỉ:</td>
                <td>
                    <input type="text" id="Diachi" value="" />

                </td>
            </tr>
        </table>

                <div class="divclear">

                    <input type="checkbox" id="myCheck"  onclick="myFunction()">Tôi đăng ký thành viên ngay.
                </div>
                <br>
                   
                <div id="reg-cpanle" class="divclear">
                    <div class="left">
                        <span class="required">*</span> Mật khẩu:<br>
                        <input name="password" value="" class="small-field" type="password"><br>
                    </div>
                    <div class="right">
                        <span class="required">*</span> Xác nhận mật khẩu: <br>
                        <input name="confirm" value="" class="small-field" type="password"><br>
                    </div>

                </div>
                <?php } ?>

            </div>
        </div>
    </div>

<script>
function myFunction() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "block";
    } else {
       text.style.display = "none";
    }
}
</script>

    <div class="onecheckoutright">
        <div id="confirm" style="margin-left:10px">
            <div class="onecheckout-heading">Xác nhận đơn hàng</div>
            <div class="onecheckout-content" style="display: block;">
                <div class="onecheckout-product">
                    <table >
                        <thead>
                            <tr>
                                <td class="name">Sản phẩm</td>
                                <td class="quantity">Số</td>
                                <td class="price">Giá</td>
                                <td class="total">Tổng</td>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            $userid='';
                            if (isset($_SESSION['userid'])) {
                                $userid = $_SESSION['userid'];
                            }
                            else {
                                $userid = $_SESSION['guest'];
                            }  
                            
                            $sbook = "SELECT ct.Magiohang, ct.Masach,ct.Soluong, ct.Giamua,b.Tensach,b.anh FROM `chitietgiohang` ct JOIN `giohang` g on ct.Magiohang = g.Magiohang join `book` b on b.Masach=ct.Masach where g.Makh = '".$userid."'";
                            $re2 = mysqli_query($conn, $sbook);
                            //var_dump($sbook) ; exit();
                            $Tong=0;
                            $i=0;
                            $rowcount=mysqli_num_rows($re2);
                            while ($r2 = mysqli_fetch_array($re2)) {
                            $Tong= $Tong+ $r2['Giamua'] * $r2['Soluong'];
                            $i++;
                            ?>

                            <tr>
                                <td class="name">
                                    <a href="index.php?route=book&type=<?php echo $r2['Masach'] ?>"><?php echo $r2['Tensach'] ?></a>
                                </td>
                                <td class="quantity"><?php echo ($r2['Soluong']);?></td>
                                <td class="price"><?php echo number_format($r2['Giamua']); ?> đ</td>
                                <td class="total"><?php echo number_format($r2['Giamua']*$r2['Soluong']); ?> đ</td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="price"><b>Tổng:</b></td>
                                <td colspan="2" class="total"><?php echo number_format($Tong); ?> đ</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
               
                <div class="buttons">
                    <div style="text-align:right;"><a id="button-confirmorder" class="button"><span>Xác nhận</span></a></div>
                </div>
                <script>

                    $("#button-confirmorder").on("click", function () {
                        $.ajax({
                            url: "checkout_action.php",
                            method: "POST",
                            success: function (response) {
                                if (response == "1")
                                    window.location = "index.php?route=thanks";
                            }
                        });
                    });
                </script>

                <script type="text/javascript">
                    $('.fancybox').fancybox({
                        width: 560,
                        height: 560,
                        autoDimensions: false
                    });
                    $('.cart-module .cart-heading').bind('click', function () {
                        if ($(this).hasClass('active')) {
                            $(this).removeClass('active');
                        } else {
                            $(this).addClass('active');
                        }

                        $(this).parent().find('.cart-content').slideToggle('slow');
                    });

                </script>
            </div>
        </div>
    </div>
