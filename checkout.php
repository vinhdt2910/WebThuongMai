
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
                  <option value="8" ><?php echo $r['Diachi'] ?></option>
                </select>
               
      </div>
      <?php }else{?>
      <div class="divclear">
                    <span class="required">*</span> Họ và tên:<br>
                    <input name="firstname" value=" " style="display:none;" type="text"><input name="lastname" value="" class="large-field" type="text"><br>
                </div>
                <br>
                <div class="divclear">
                    <span class="required">*</span> Email:<br>
                    <input name="email" value="" class="large-field" type="text"><br>
                    <input name="company" value="" style="display:none;" type="text">
                    <br>
                    <span class="required">*</span> Địa chỉ:<br>
                    <input name="address_1" value="" class="large-field" type="text"><br>
                    <input name="address_2" value="" style="display:none;" type="text">
                </div>
                <br>
                <div class="divclear">
                    <span class="required">*</span> Điện thoại:<br>
                    <input name="fax" value="" style="display:none;" type="text"><input name="telephone" value="" class="large-field" type="text"><br>
                </div>

                <div class="divclear"><input name="city" value="   " style="display:none;" type="text"><input name="postcode" value="  " style="display:none;" type="text"></div>

                <div class="divclear">

                    <select name="zone_id" class="large-field" style="display:none;"><option value="0"> --- Chọn --- </option><option value="3751">An Giang</option><option value="3756">Ba Ria-Vung Tau</option><option value="3752">Bac Giang</option><option value="3753">Bac Kan</option><option value="3754">Bac Lieu</option><option value="3755">Bac Ninh</option><option value="3757">Ben Tre</option><option value="3758">Binh Dinh</option><option value="3759">Binh Duong</option><option value="3760">Binh Phuoc</option><option value="3761">Binh Thuan</option><option value="3762">Ca Mau</option><option value="3763">Can Tho</option><option value="3764">Cao Bang</option><option value="3767">Da Nang</option><option value="3765">Dak Lak</option><option value="3766">Dak Nong</option><option value="3768">Dien Bien</option><option value="3769">Dong Nai</option><option value="3770">Dong Thap</option><option value="3771">Gia Lai</option><option value="3772">Ha Giang</option><option value="3775">Ha Nam</option><option value="3776" selected="selected">Ha Noi</option><option value="3777">Ha Tay</option><option value="3778">Ha Tinh</option><option value="3773">Hai Duong</option><option value="3774">Hai Phong</option><option value="3781">Hau Giang</option><option value="3780">Ho Chi Minh City</option><option value="3779">Hoa Binh</option><option value="3782">Hung Yen</option></select>

                    <br>
                    <input name="account" value="1" id="account" type="checkbox">
                    <label for="account">Tôi đăng ký thành viên ngay.</label>
                    <br>
                    <br>

                </div>
                <script type="text/javascript">
<!--
                    $('#payment-address select[name=\'zone_id\']').load('index.php?route=onecheckout/address/zone&country_id=230&zone_id=3776');

                    $('#payment-address select[name=\'zone_id\']').live('change', function () {
                        if ($('#payment-address input[name=\'shipping_address\']:checked').attr('value')) {
                            shippingmethod($('#payment-address select[name=\'country_id\']').val(), $('#payment-address select[name=\'zone_id\']').val(), 1, $('#payment-address input[name=\'city\']').val(), $('#payment-address input[name=\'postcode\']').val());
                        }
                        paymentmethod($('#payment-address select[name=\'country_id\']').val(), $('#payment-address select[name=\'zone_id\']').val(), 1, $('#payment-address input[name=\'city\']').val(), $('#payment-address input[name=\'postcode\']').val());
                    });

                    $('#shipping-address select[name=\'zone_id\']').live('change', function () {
                        shippingmethod($('#shipping-address select[name=\'country_id\']').val(), $('#shipping-address select[name=\'zone_id\']').val(), 1, $('#shipping-address input[name=\'city\']').val(), $('#shipping-address input[name=\'postcode\']').val());
                    });

                    $('#payment-address input[name=\'firstname\']').live('blur', function () {
                        valiform("payment", "firstname", "");
                    });

                    $('#payment-address input[name=\'firstname\']').live('focus', function () {
                        errorremove("payment", "firstname");
                    });

                    $('#payment-address input[name=\'lastname\']').live('blur', function () {
                        valiform("payment", "lastname", "");
                    });

                    $('#payment-address input[name=\'lastname\']').live('focus', function () {
                        errorremove("payment", "lastname");
                    });

                    $('#payment-address input[name=\'email\']').live('blur', function () {
                        valiform("payment", "email", "");
                    });

                    $('#payment-address input[name=\'email\']').live('focus', function () {
                        errorremove("payment", "email");
                    });

                    $('#payment-address input[name=\'address_1\']').live('blur', function () {
                        valiform("payment", "address_1", "");
                    });

                    $('#payment-address input[name=\'address_1\']').live('focus', function () {
                        errorremove("payment", "address_1");
                    });

                    $('#payment-address input[name=\'telephone\']').live('blur', function () {
                        valiform("payment", "telephone", "");
                    });

                    $('#payment-address input[name=\'telephone\']').live('focus', function () {
                        errorremove("payment", "telephone");
                    });

                    $('#payment-address input[name=\'city\']').live('blur', function () {
                        valiform("payment", "city", "");
                        if ($('#payment-address input[name=\'shipping_address\']:checked').attr('value')) {
                            shippingmethod($('#payment-address select[name=\'country_id\']').val(), $('#payment-address select[name=\'zone_id\']').val(), 1, $('#payment-address input[name=\'city\']').val(), $('#payment-address input[name=\'postcode\']').val());
                        }
                        paymentmethod($('#payment-address select[name=\'country_id\']').val(), $('#payment-address select[name=\'zone_id\']').val(), 1, $('#payment-address input[name=\'city\']').val(), $('#payment-address input[name=\'postcode\']').val());
                    });

                    $('#payment-address input[name=\'city\']').live('focus', function () {
                        errorremove("payment", "city");
                    });

                    $('#payment-address input[name=\'postcode\']').live('blur', function () {
                        valiform("payment", "postcode", ", #payment-address select");
                        if ($('#payment-address input[name=\'shipping_address\']:checked').attr('value')) {
                            shippingmethod($('#payment-address select[name=\'country_id\']').val(), $('#payment-address select[name=\'zone_id\']').val(), 1, $('#payment-address input[name=\'city\']').val(), $('#payment-address input[name=\'postcode\']').val());
                        }
                        paymentmethod($('#payment-address select[name=\'country_id\']').val(), $('#payment-address select[name=\'zone_id\']').val(), 1, $('#payment-address input[name=\'city\']').val(), $('#payment-address input[name=\'postcode\']').val());
                    });

                    $('#payment-address input[name=\'postcode\']').live('focus', function () {
                        errorremove("payment", "postcode");
                    });

                    $('#payment-address select[name=\'zone_id\']').live('focus', function () {
                        errorremove("payment", "zone_id");
                    });

                    $('#payment-address select[name=\'country_id\']').live('focus', function () {
                        errorremove("payment", "country_id");
                    });

                    $('#shipping-address input[name=\'firstname\']').live('blur', function () {
                        valiform("shipping", "firstname", "");
                    });

                    $('#shipping-address input[name=\'firstname\']').live('focus', function () {
                        errorremove("shipping", "firstname");
                    });

                    $('#shipping-address input[name=\'lastname\']').live('blur', function () {
                        valiform("shipping", "lastname", "");
                    });

                    $('#shipping-address input[name=\'lastname\']').live('focus', function () {
                        errorremove("shipping", "lastname");
                    });

                    $('#shipping-address input[name=\'address_1\']').live('blur', function () {
                        valiform("shipping", "address_1", "");
                    });

                    $('#shipping-address input[name=\'address_1\']').live('focus', function () {
                        errorremove("shipping", "address_1");
                    });

                    $('#shipping-address input[name=\'city\']').live('blur', function () {
                        valiform("shipping", "city", "");
                        shippingmethod($('#shipping-address select[name=\'country_id\']').val(), $('#shipping-address select[name=\'zone_id\']').val(), 1, $('#shipping-address input[name=\'city\']').val(), $('#shipping-address input[name=\'postcode\']').val());
                    });

                    $('#shipping-address input[name=\'city\']').live('focus', function () {
                        errorremove("shipping", "city");
                    });

                    $('#shipping-address input[name=\'postcode\']').live('blur', function () {
                        valiform("shipping", "postcode", ", #shipping-address select");
                        shippingmethod($('#shipping-address select[name=\'country_id\']').val(), $('#shipping-address select[name=\'zone_id\']').val(), 1, $('#shipping-address input[name=\'city\']').val(), $('#shipping-address input[name=\'postcode\']').val());
                    });

                    $('#shipping-address input[name=\'postcode\']').live('focus', function () {
                        errorremove("shipping", "postcode");
                    });

                    $('#shipping-address select[name=\'zone_id\']').live('focus', function () {
                        errorremove("shipping", "zone_id");
                    });

                    $('#shipping-address select[name=\'country_id\']').live('focus', function () {
                        errorremove("shipping", "country_id");
                    });

                    function valiform(layout, vname, othername) {
                        $.ajax({
                            url: 'index.php?route=onecheckout/form/validate',
                            type: 'post',
                            data: $('#' + layout + '-address input[name=\'' + vname + '\']' + othername),
                            dataType: 'json',
                            success: function (json) {
                                if (json['error'][vname]) {
                                    errorremove(layout, vname);
                                    $('#' + layout + '-address input[name=\'' + vname + '\'] + br').after('<span id="error_' + vname + '" class="error">' + json['error'][vname] + '</span>');
                                }
                            }
                        });
                    }

                    function errorremove(layout, vname) {
                        if ($('#' + layout + '-address #error_' + vname)) {
                            $('#' + layout + '-address #error_' + vname).remove();
                        }
                    }
                    //--></script> <div id="reg-cpanle" class="divclear">
                    <div class="left">
                        <span class="required">*</span> Mật khẩu:<br>
                        <input name="password" value="" class="small-field" type="password"><br>
                    </div>
                    <div class="right">
                        <span class="required">*</span> Xác nhận mật khẩu: <br>
                        <input name="confirm" value="" class="small-field" type="password"><br>
                    </div>
                    <div style="clear: both; padding-top: 15px; border-top: 1px solid #EEEEEE;">
                        <input name="newsletter" value="1" id="newsletter" type="checkbox">
                        <label for="newsletter">Đăng ký nhận Thanh Hà Books tin khuyến mại.</label>
                        <br>
                        <input name="shipping_address" value="1" id="shipping" checked="checked" style="display:none;" type="checkbox">
                        <br>
                    </div>
                    <script type="text/javascript">
<!--
                        $('.fancybox').fancybox({
                            width: 560,
                            height: 560,
                            autoDimensions: false
                        });

                        $('#payment-address input[name=\'password\']').live('blur', function () {
                            valiform("payment", "password", "");
                        });

                        $('#payment-address input[name=\'password\']').live('focus', function () {
                            errorremove("payment", "password");
                        });

                        $('#payment-address input[name=\'confirm\']').live('blur', function () {
                            valiform("payment", "confirm", ", #payment-address input[name=\'password\']");
                        });

                        $('#payment-address input[name=\'confirm\']').live('focus', function () {
                            errorremove("payment", "confirm");
                        });
                        //--></script>
                </div>
                    <?php } ?>

 </div>
          </div>
                </div>
        
      
        
        <div class="onecheckoutright">
          <div id="confirm">
            <div class="onecheckout-heading">Xác nhận đơn hàng</div>
            <div class="onecheckout-content" style="display: block;"><div class="onecheckout-product">
        <table>
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
                if (isset( $_SESSION['userid'])){
                    $userid = $_SESSION['userid'];
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
      <?php
                }
                ?>
      <div class="buttons">
        <div style="text-align:right;"><a id="button-confirmorder" class="button"><span>Xác nhận</span></a></div>
      </div>
<script>
     
     $("#button-confirmorder").on("click", function () {
       $.ajax({
           url: "checkout_action.php",
           method: "POST",
           success: function (response) {
              if(response=="1")
               window.location="index.php?route=thanks";
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
      $('.cart-module .cart-heading').bind('click', function() {
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
        <div id="confirmorder" style="clear:both"></div>
   