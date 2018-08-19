<div class="top">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center">
        <h1>Đăng nhập</h1>
    </div>
</div>
<div class="middle">
    <div style="margin-bottom: 10px; display: inline-block; width: 100%;">
        <div style="float: left; display: inline-block; width: 49%;">
            <b style="margin-bottom: 2px; display: block;">Bạn là khách hàng mới.</b>
            <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; min-height: 210px;">

                <p>Tùy chọn Thanh toán:</p>
                <label for="register" style="cursor: pointer;">
                    <div class="tm-radio tm-selected"><input name="account" value="register" id="register" checked="checked" class="tm-hide" type="radio"></div>
                    <b>Đăng ký tài khoản</b>
                </label>
                <br>
                <br>
                <p>Bạn hãy đăng ký một tài khoản, hoàn toàn nhanh chóng và miễn phí.</p>
                <div style="text-align: right;"><a href="index.php?route=regist" class="button"><span>Tiếp tục</span></a></div>

            </div>
        </div>
        <div style="float: right; display: inline-block; width: 49%;">
            <b style="margin-bottom: 2px; display: block;">Chào mừng bạn trở lại</b>
            <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; min-height: 210px;">
                Vui lòng đăng nhập.
                <br>
                
                <div>
                    <div id="error" style="color: red;"></div>
                </div>
                <br>
                <b>E-Mail của bạn:</b><br>
                <input name="email" value="" id="username" class="" type="email">
                <br>
                <br>
                <b>Mật khẩu:</b><br>
                <input name="password" id="password" type="password">
                <br>
                <a href="index.php?route=account/forgotten">Lấy lại mật khẩu</a><br>
                <div style="text-align: right;"><a id="btn_submit" class="button"><span>Đăng nhập</span></a></div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$('#password').keydown(function (e) {
    if (e.keyCode == 13) {
        $("#btn_submit").click();
    }
});

$("#btn_submit").on("click", function () {
var username = $("#username").val();
var password = $("#password").val();
var error = $("#error");

// resert 2 thẻ div thông báo trở về rỗng mỗi khi click nút đăng nhập
error.html("");

// Kiểm tra nếu username rỗng thì báo lỗi
if (username == "") {
    error.html("Tên đăng nhập không được để trống");

    return false;
}
// Kiểm tra nếu password rỗng thì báo lỗi
if (password == "") {
    error.html("Mật khẩu không được để trống");
    return false;
}

// Chạy ajax gửi thông tin username và password về server check_dang_nhap.php
// để kiểm tra thông tin đăng nhập hợp lệ hay chưa
$.ajax({
    url: "check_dang_nhap.php",
    method: "POST",
    data: { username: username, password: password },
    success: function (response) {
        if (response == "2") {// kiem tra du lieu ra
         alert("Đăng nhập thành công");
         window.location="index.php";    
        } else 
        if (response == "1"){
            window.location="admin.php"; 
        }
        else{
            error.html("Tên đăng nhập hoặc mật khẩu không chính xác !");
        }
    }
});

});
</script>