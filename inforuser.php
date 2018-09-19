<?php
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $sql = "select * from user where User_ID = '$userid'";
    $record = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($record);
}
?>
<div class="top">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center">
        <h1>Thông tin khách hàng</h1>
    </div>
</div>

<div class="onecheckout">
    <div id="payment-address">
        <div class="onecheckout-heading"><span>Thông tin cá nhân</span></div>
        <div class="onecheckout-content">
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
                        <input type="text" id="Hoten" value="<?php echo $row1['Hoten'];?>" />
                    </td>
                </tr>
                <tr>
                    <td><span class="required">*</span> E-Mail:</td>
                    <td>
                        <input type="email" id="email" value="<?php echo $row1['Email'];?>" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">

                    </td>
                </tr>
                <tr>
                    <td><span class="required">*</span> Điện thoại:</td>
                    <td>
                        <input type="text" id="Sodt" value="<?php echo $row1['Sodt'];?>" />

                    </td>
                </tr>
                <tr>
                    <td><span class="required">*</span> Địa chỉ:</td>
                    <td>
                        <textarea id="Diachi" name="Diachi"><?php echo $row1['Diachi'];?></textarea>
                    </td>
                </tr>
            </table>
        </div>

        <b style="margin-bottom: 2px; display: block;">Thay đổi Mật khẩu</b>
        <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-bottom: 10px;">
            <table>
                <tr>
                    <td width="150"><span class="required">*</span> Mật khẩu mới:</td>
                    <td>
                        <input type="password" id="password" value="" />

                    </td>
                </tr>
                <tr>
                    <td><span class="required">*</span> Nhập lại mật khẩu:</td>
                    <td>
                        <input type="password" id="confirm" value="" />
                    </td>
                </tr>
            </table>
        </div>

        <div class="buttons">
            <table>
                <tr>
                    <td align="right"><a id="btn_submit" class="button"><span>Cập nhật</span></a></td>
                </tr>
            </table>
        </div>

    </div>
</div>



<div class="onecheckoutright">
    <div id="confirm">
        <div class="onecheckout-heading">Các đơn hàng đã mua</div>
        <div class="onecheckout-content" style="display: block;">
            <div class="onecheckout-product">
                <table style="margin-left: 10px;">
                    <thead>
                        <tr>
                            <th>Mã HD</th>
                            <th>Tình trạng</th>
                            <th>Tổng tiền</th>
                            <th>Ngày đặt</th>
                            <th>Xem chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        if (isset( $_SESSION['userid'])){
                        $userid = $_SESSION['userid'];
                        $sbook = "SELECT g.Mahd,g.Tinhtrang,sum(ct.Soluong*ct.Giamua) tongtien , g.Ngaydat FROM `cthoadon` ct JOIN `hoadon` g on ct.Mahd = g.Mahd  where g.Makh = '".$userid."' Group by g.Mahd Order by g.Ngaydat desc";

                        $re2 = mysqli_query($conn, $sbook);
                      
                        $Tong=0;
                        $i=0;

                        while ($r2 = mysqli_fetch_array($re2)) {
                        $Tong= $Tong+ $r2['tongtien'];
                        $i++;
                        ?>

                        <tr>
                            <td><?php echo $r2['Mahd'] ?></td>
                            <td>
                                <?php 
                                if($r2['Tinhtrang']==0) echo 'Chờ xử lý'; else{ if($r2['Tinhtrang']==1) echo 'Hủy'; else  echo 'Duyệt';}?>
                            </td>
                            <td><?php echo number_format($r2['tongtien']); ?> đ</td>
                            <td><?php echo $newDate = date("d-m-Y", strtotime($r2['Ngaydat'])); ?></td>
                            <td>
                               
                                <a href="index.php?route=chitiethd&mahd=<?php echo $r2['Mahd']; ?>">
                                    <img src="Template/theme/default/image/plus.png" class="plusimg" align="absmiddle" />
                                </a>
                             
                            </td>
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
            <?php
            }
            ?>


        </div>
    </div>
</div>

<script>
    $("#btn_submit").on("click", function () {
        var Hoten = $("#Hoten").val();
        var email = $("#email").val();
        var Sodt = $("#Sodt").val();
        var Diachi = $("#Diachi").val();

        var password = $("#password").val();
        var confirm = $("#confirm").val();

        var error = $("#err");

        // resert 2 thẻ div thông báo trở về rỗng mỗi khi click nút đăng nhập
        error.html("");


        if (Hoten.length < 3 || Hoten.length > 32) {
            error.html("Tên Bạn phải nhiều hơn 3 và ít hơn 32 ký tự!");
            $("#Hoten").focus();
            return false;
        }
        if (email.length < 3) {
            error.html("Bạn phải nhập email");
            $("#email").focus();
            return false;
        }
        if (!phonenumber(Sodt)) {
            error.html("Số điện thoại không đúng!");
            $("#Sodt").focus();
            return false;
        }

        if (Diachi.length < 3 || Diachi.length > 128) {
            error.html("Địa chỉ phải nhiều hơn 3 và ít hơn 32 ký tự!");
            $("#Diachi").focus();
            return false;
        }
       
if(password.length===0){
    $.ajax({
            url: "checkinfo.php",
            method: "POST",
            data: { Hoten: Hoten, email: email, Sodt: Sodt, Diachi: Diachi },
            success: function (response) {
                if (response == "1") {// kiem tra du lieu ra
                    alert("Thay đổi thông tin thành công");
                  
                }
                
                else {
                    error.html("Lỗi hệ thống !");
                }
            }
        });

}else{
    if (password.length < 3 || password.length > 20) {
            error.html("Mật khẩu phải lớn hơn 3 và nhỏ hơn 20 ký tự!");
            $("#password").focus();
            return false;
        }

        if (confirm != password) {
            error.html("Mật khẩu phải lớn hơn 3 và nhỏ hơn 20 ký tự!");
            $("#confirm").focus();
            return false;
        }
        $.ajax({
            url: "checkinfo.php",
            method: "POST",
            data: { Hoten: Hoten, password: password, email: email, Sodt: Sodt, Diachi: Diachi },
            success: function (response) {
                if (response == "1") {// kiem tra du lieu ra
                    alert("Thay đổi thông tin thành công");
                }
                else {
                    error.html("Lỗi hệ thống !");
                }
            }
        });
    }

    });

    function phonenumber(inputtxt) {
        var phoneno = /^\d{10}$/;
        var phoneno1 = /^\d{11}$/;
        if (inputtxt.match(phoneno) || inputtxt.match(phoneno1)) {
            return true;
        }
        else {
            return false;
        }
    }

</script>
