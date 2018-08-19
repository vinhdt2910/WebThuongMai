
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
                        <span id="err" class="error">Tên Bạn phải nhiều hơn 3 và ít hơn 32 ký tự!</span>
                    </td>
                </tr>
                <tr>
                    <td width=""><span class="required">*</span> Tên bạn:</td>
                    <td>
                        <input type="text" id="Hoten" value="" />
                        <span class="error">Tên Bạn phải nhiều hơn 3 và ít hơn 32 ký tự!</span>
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
                        <span class="error">Điện thoại phải nhiều hơn 3 và ít hơn 32 ký tựs!</span>
                    </td>
                </tr>
                <tr>
                    <td><span class="required">*</span> Địa chỉ:</td>
                    <td>
                        <input type="text" id="Diachi" value="" />
                        <span class="error">Địa chỉ phải nhiều hơn 3 và ít hơn 128 ký tự!</span>
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
                        <span class="error">Mật khẩu phải lớn hơn 3 và nhỏ hơn 20 ký tự!</span>
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
    </form>
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
});


</script>