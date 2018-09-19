
<div class="top">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center">
        <h1>Đăng ký tài khoản</h1>
    </div>
</div>
<div class="middle">

    <p>Nếu bạn đã có tài khoản, vui lòng  <a href="index.php?route=login">Đăng nhập</a>.</p>
    <b style="margin-bottom: 2px; display: block;">Thông tin Cá nhân</b>
    <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-bottom: 10px;">
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
    </div>

    <b style="margin-bottom: 2px; display: block;">Mật khẩu</b>
    <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-bottom: 10px;">
        <table>
            <tr>
                <td width="150"><span class="required">*</span> Mật khẩu:</td>
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
                <td align="right"><a id="btn_submit" class="button"><span>Tiếp tục</span></a></td>
            </tr>
        </table>
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


        if (Hoten.length < 3|| Hoten.length>32) {
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

        if (Diachi.length < 3|| Diachi.length>128) {
            error.html("Địa chỉ phải nhiều hơn 3 và ít hơn 32 ký tự!");
            $("#Diachi").focus();
            return false;
        }
        if (password.length < 3|| password.length>20) {
            error.html("Mật khẩu phải lớn hơn 3 và nhỏ hơn 20 ký tự!");
            $("#password").focus();
            return false;
        }

        if (confirm != password) {
            error.html("Mật khẩu nhập lại sai!");
            $("#confirm").focus();
            return false;
        }
       
        $.ajax({
    url: "check_dang_ky.php",
    method: "POST",
    data: { Hoten: Hoten, password: password, email: email , Sodt: Sodt,Diachi: Diachi},
    success: function (response) {
        if (response == "1") {// kiem tra du lieu ra
      alert("Tài khoản đã đăng ký thành công");
         window.location="index.php";    
        } 
        else if(response == "2") {
            error.html("Email đã tồn tại !");
        }
        else{
            error.html("Lỗi hệ thống !");
        }
    }
});

    });

    function phonenumber(inputtxt)
    {
        var phoneno = /^\d{10}$/;
        var phoneno1 = /^\d{11}$/;
        if(inputtxt.match(phoneno) || inputtxt.match(phoneno1))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

</script>