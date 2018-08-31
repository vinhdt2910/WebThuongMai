
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
            <div class="onecheckout-content"><input type="radio" name="payment_address" value="existing" id="payment-address-existing" checked="checked">
      <label for="payment-address-existing">Sử dụng địa chỉ này</label>
      <div id="payment-existing" style="display: block;">
        <select name="address_id" style="width: 100%; margin-bottom: 15px;" size="5">
                  <option value="8" selected="selected">Nam Namnguyen, Hà Nội, Hà Nội, Viet Nam</option>
                </select>
      </div>
      <p>
        <input type="radio" name="payment_address" value="new" id="payment-address-new">
        <label for="payment-address-new">Sử dụng địa chỉ mới</label>
      </p>

      <br>
      <script type="text/javascript">
      
      $('#payment-address select[name=\'address_id\']').live('change', function() {
              paymentmethodid($('#payment-address select[name=\'address_id\']').val());
      });
      $('#payment-address select[name=\'zone_id\']').live('change', function() {
              paymentmethod($('#payment-address select[name=\'country_id\']').val(), $('#payment-address select[name=\'zone_id\']').val(), 1 , $('#payment-address input[name=\'city\']').val(),$('#payment-address input[name=\'postcode\']').val());
      });
      
      $('#payment-address input[name=\'payment_address\']').live('change', function() {
          if (this.value == 'new') {
              $('#payment-existing').hide();
              $('#payment-new').show();
              paymentmethod($('#payment-address select[name=\'country_id\']').val(), $('#payment-address select[name=\'zone_id\']').val(), 1 , $('#payment-address input[name=\'city\']').val(),$('#payment-address input[name=\'postcode\']').val());
          } else {
              $('#payment-existing').show();
              $('#payment-new').hide();
      paymentmethodid($('#payment-address select[name=\'address_id\']').val());
              if($('#payment-address .onecheckout-content .error'))
                $('#payment-address .onecheckout-content .error').remove();
          }
      });
      
      $('#payment-address input[name=\'firstname\']').live('blur', function() {
          valiformpayment("firstname","");
      });
      
      $('#payment-address input[name=\'firstname\']').live('focus', function() {
          errorremovepayment("firstname");
      });
      
      $('#payment-address input[name=\'lastname\']').live('blur', function() {
          valiformpayment("lastname","");
      });
      
      $('#payment-address input[name=\'lastname\']').live('focus', function() {
          errorremovepayment("lastname");
      });
      
      $('#payment-address input[name=\'address_1\']').live('blur', function() {
          valiformpayment("address_1","");
      });
      
      $('#payment-address input[name=\'address_1\']').live('focus', function() {
          errorremovepayment("address_1");
      });
      
      $('#payment-address input[name=\'city\']').live('blur', function() {
          valiformpayment("city","");
          paymentmethod($('#payment-address select[name=\'country_id\']').val(), $('#payment-address select[name=\'zone_id\']').val(), 1 , $('#payment-address input[name=\'city\']').val(),$('#payment-address input[name=\'postcode\']').val());
      });
      
      $('#payment-address input[name=\'city\']').live('focus', function() {
          errorremovepayment("city");
      });
      
      $('#payment-address input[name=\'postcode\']').live('blur', function() {
          valiformpayment("postcode",", #payment-address select");
          paymentmethod($('#payment-address select[name=\'country_id\']').val(), $('#payment-address select[name=\'zone_id\']').val(), 1 , $('#payment-address input[name=\'city\']').val(),$('#payment-address input[name=\'postcode\']').val());
      });
      
      $('#payment-address input[name=\'postcode\']').live('focus', function() {
          errorremovepayment("postcode");
      });
      
      $('#payment-address select[name=\'zone_id\']').live('focus', function() {
          errorremovepayment("zone_id");
      });
      
      $('#payment-address select[name=\'country_id\']').live('focus', function() {
          errorremovepayment("country_id");
      });
      
      function valiformpayment(vname, othername){
          $.ajax({
              url: 'index.php?route=onecheckout/form/validate',
              type: 'post',
              data: $('#payment-address input[name=\''+vname+'\']'+othername),
              dataType: 'json',
              success: function(json) {						
                  if (json['error'][vname]) {
                      errorremovepayment(vname);
                      $('#payment-address input[name=\''+vname+'\'] + br').after('<span id="error_'+vname+'" class="error">' + json['error'][vname] + '</span>');
                  }
              }
          });	
      }
      function errorremovepayment(vname) {
          if($('#payment-address #error_'+vname)){
              $('#payment-address #error_'+vname).remove();
          }
      }
      //--></script> </div>
          </div>
                </div>
        
        <div class="onecheckoutmid">
              <div id="payment-method">
            <div class="onecheckout-heading">Thanh toán</div>
            <div class="onecheckout-content" style=""><p>Bạn vui lòng chọn phương thức thanh toán</p>
      <table class="form">
          <tbody><tr>
          <td style="width: 1px;">            <input type="radio" name="payment_method" value="cod" id="cod" checked="checked">
            </td>
          <td><label for="cod">Thanh toán trực tiếp</label></td>
          
        </tr>
          <tr>
          <td style="width: 1px;">      <input type="radio" name="payment_method" value="bank_transfer" id="bank_transfer">
            </td>
          <td><label for="bank_transfer">Chuyển khoản ngân hàng</label></td>
          
        </tr>
        </tbody></table>
      <div class="onecheckout-heading">Yêu cầu khác</div>
      <p style="padding-top:10px;">Nội dung yêu cầu</p>
      <textarea name="comment" rows="5" style="width: 97%;"></textarea>
      <br>
      <script type="text/javascript">
      $('#payment-method textarea[name=\'comment\']').live('blur', function() {
          jQuery.post('index.php?route=onecheckout/payment/savecomment',$('#payment-method textarea[name=\'comment\']'));
      });
      //--></script> </div>
          </div>
        </div>
        
        <div class="onecheckout">
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
                  <tr>
              <td class="name"><a href="http://thanhhabooks.com/index.php?route=product/product&amp;product_id=435">Chơi cờ vua cùng bé (Bộ 3q)</a>
                </td>
              <td class="quantity">1</td>
              <td class="price">182,000 đ</td>
              <td class="total">182,000 đ</td>
            </tr>
                  <tr>
              <td class="name"><a href="http://thanhhabooks.com/index.php?route=product/product&amp;product_id=386">Cùng con lớn khôn - Bộ 1 Xây Dựng Nhân Cách (6q)</a>
                </td>
              <td class="quantity">1</td>
              <td class="price">168,000 đ</td>
              <td class="total">168,000 đ</td>
            </tr>
                  <tr>
      <td class="name"><a href="http://thanhhabooks.com/index.php?route=product/product&amp;product_id=436">365 Ý Tưởng Sáng Tạo Vẽ Và Tô Màu</a>
                </td>
              <td class="quantity">1</td>
              <td class="price">120,000 đ</td>
              <td class="total">120,000 đ</td>
            </tr>
                </tbody>
          <tfoot>
                  <tr>
              <td colspan="2" class="price"><b>Tổng phụ:</b></td>
              <td colspan="2" class="total">470,000 đ</td>
            </tr>
                  <tr>
              <td colspan="2" class="price"><b>Tổng:</b></td>
              <td colspan="2" class="total">470,000 đ</td>
            </tr>
                </tfoot>
        </table>
      </div>
      <div class="cart-module">
        <div class="cart-heading"><span style="color: #ff6c00">Mã giảm giá</span></div>
        <div class="cart-content" id="coupon">Điền mã giảm giá:&nbsp;<br>
          <input type="text" name="coupon" value="">
          &nbsp;<a id="button-coupon" class="button"><span>Cập nhật</span></a></div>
      </div>
      <div class="buttons">
        <div style="text-align:right;"><a id="button-confirmorder" class="button"><span>Xác nhận</span></a></div>
      </div>
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
      //--></script></div>
          </div>
        </div>
        <div id="confirmorder" style="clear:both"></div>
   