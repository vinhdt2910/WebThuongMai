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