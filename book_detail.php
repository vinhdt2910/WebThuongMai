<?php

 if (isset($_GET['type'])) {
   $type= $_GET['type'];
}
if (isset($type)) {
   $s = "select * from book where Masach='" . $type."' and trangthai ='1'";

   $re = mysqli_query($conn, $s);

   $r = mysqli_fetch_array($re);

   $title = $r['Tensach'];
   $today = date("Y-m-d");
    $ck_date=date($r['Thoigianck']);
}
?>

<div id="">
    <div class="middle">
        <div style="width: 100%; margin-bottom: 30px;">
            <div class="product-info">
                <div style="font-size: 0px">

                    <div class="spt">

                        <link href="Template/css/flexslider/flexslider.css" rel="stylesheet" />
                        <script defer src="Template/css/flexslider/jquery.flexslider.js"></script>
                        <div class="flexslider">
                            <ul class="slides">
                                <li><img src="image/<?php echo $r['anh'] ?>" title="<?php echo $r['Tensach']; ?>" alt="<?php echo $r['Tensach']; ?>"></li>
                                <li><img src="image/<?php echo $r['anh'] ?>" title="<?php echo $r['Tensach']; ?>" alt="<?php echo $r['Tensach']; ?>"></li>
                                <li><img src="image/<?php echo $r['anh'] ?>" title="<?php echo $r['Tensach']; ?>" alt="<?php echo $r['Tensach']; ?>"></li>
                                
                            </ul>
                        </div>
                        <script type="text/javascript">
                            $(window).load(function () {
                                $('.flexslider').flexslider({
                                    animation: "slide"

                                });
                            });
                        </script>


                    </div>

                    <div class="spl">
                        <h1><?php echo $title; ?></h1>
                        <div class="splc">
                            <div style="float: left;margin: 1px 3px 1px 1px;"><a class="addthis_button_tweet"></a></div>
                            <div style="float: left;margin: 1px 3px 1px 1px;">
                                <div class="fb-like" data-send="true" data-layout="button_count" data-width="0" data-colorscheme="dark" data-show-faces="false"></div>
                            </div>
                            <div style="float: left;margin: 1px 3px 1px 1px;">
                                <div class="g-plusone" data-size="medium" data-annotation="none"></div>
                            </div>
                            <script type="text/javascript" src="Template/js/addthis_widget.js#pubid=ra-50ecd28972abd0df"></script>
                        </div>

                        <div class="metadessp">
                            <b>Mã sản phẩm: </b><?php echo ($r['Masach']); ?>
                            <div><b>Trạng thái:</b> <?php if( $r['Soluong']>0) echo 'Số lượng sách còn'; else echo 'hết hàng'; ?></div>


                        </div>


                        <div class="giactsp">
                            <span class="tengia">Giá:</span>

                            <?php if(strtotime($today)<strtotime($ck_date)){ ?>
                                <span class="giamoictsp"><?php echo number_format($r['Gia']-($r['Gia']*$r['Chietkhau']/100)); ?>đ</span>
                                <?php } else { ?>
                                <span class="giamoictsp"><?php echo number_format($r['Gia']); ?>đ</span>
                                <?php } ?>

                                <span class="giacuctsp"><?php echo number_format($r['Gia']); ?>đ</span>



                        </div>


                        <!-- <form action="addcart.php" method="post" enctype="multipart/form-data" id="product"> -->
                        <div class="datmuasp">
                            <div>
                                Số lượng: <input type="text" id="quantity" size="3" name="quantity" value="1" />
                                &nbsp;
                                <!-- <a href="index.php?route=cart" class="add_to_cart"> -->
                                    <input type="button" value="Mua hàng" id="button-cart" />
                                <!-- </a> -->
                                <a href="index.php?route=information" id="add_to_cart" class="button"><span>Liên hệ</span></a>
                            </div>

                            <div class="hotrosp">

                                <a href="tel:01673293712">
                                    <img alt="Zalo" src="Template/theme/default/image/Icon-Zalo-Zalo.png">
                                </a>
                                <a href="tel:01673293712">
                                    <img alt="Viber" src="Template/theme/default/image/appicon.png">
                                </a>
                                <a href="mailto:thanhhabooks@gmail.com">
                                    <img alt="Email" src="Template/theme/default/image/email-icon.png">
                                </a>
                                <div class="dienthoaisp">
                                    <div class="tb">Để được tư vấn cụ thể quý khách vui lòng gọi: </div>
                                    <div class="dt">
                                        <a href="tel:01673293712">01673293712</a>
                                    </div>
                                </div>
                            </div>


                            <div>

                                <input type="hidden" id="masach" value="<?php echo $r['Masach'] ?>" />
                            </div>

                        </div>
                        <!-- </form> -->
                    </div>

                </div>

                <div class="product-infoo">

                    <div class="chitietsp">Chi tiết</div>
                    <?php echo ($r['Mota']); ?>


                </div>

                <div id="fb-root"></div>
                <script>
                    (function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=1450858071816097";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-comments" data-href="index.php/route=book&type=<?php echo $r['Masach'] ?>" data-width="100%" data-numposts="5"></div>



            </div>
        </div>
    </div>


    <div class="chitietsp">Sản phẩm cùng loại</div>
    <div class="dmsp">

        <?php

        $sbook2 = "SELECT * FROM `book` WHERE Loaisach = '".$r['Loaisach']."' and trangthai ='1' and Masach <> '".$r['Masach']."'";

        $re2 = mysqli_query($conn, $sbook2);
        while ($r2 = mysqli_fetch_array($re2)) {
        $today2 = date("Y-m-d");
        $ck_date2=date($r2['Thoigianck']);
        ?>
        <div class="sanpham xam">
            <div>
                <div class="image">
                    <?php if(strtotime($today2)<strtotime($ck_date2)){ ?>
                        <div class="labelspecial"><?php echo $r2['Chietkhau'];?>%</div>
                        <?php } else { ?>
                        <div class="labelspecial">0%</div>
                        <?php } ?>
                        <a title="<?php echo $r2['Tensach']; ?>" href="index.php?route=book&type=<?php echo $r2['Masach']; ?>"><img title="<?php echo $r2['Tensach']; ?>" style="width: 100%" src="image/<?php echo $r2['anh'] ?>" alt="<?php echo $r2['Tensach']; ?>" /></a>
                </div>
                <div class="tensp">
                    <a title="<?php echo $r2['Tensach']; ?>"
                       href="index.php?route=book&type=<?php echo $r2['Masach']; ?>"><?php echo $r2['Tensach']; ?></a>
                </div>
                <div class="gia">
                    <div class="giacu"><?php echo number_format($r2['Gia']); ?>đ</div>
                    <?php if(strtotime($today2)<strtotime($ck_date2)){ ?>
                        <div class="giamoi"><?php echo number_format($r2['Gia']-($r2['Gia']*$r2['Chietkhau']/100)); ?>đ</div>
                        <?php } else { ?>
                        <div class="giamoi"><?php echo number_format($r2['Gia']); ?>đ</div>
                        <?php } ?>
                </div>
            </div>
            <div class="chitietvsmua">
                <div class="chitiet"><a title="<?php echo $r2['Tensach']; ?>" href="index.php?route=book&type=<?php echo $r2['Masach']; ?>">Chi tiết</a></div>
                <div class="mua"><a href="index.php?route=checkout&type=<?php echo $r2['Masach']; ?>" title="Mua hàng">Đặt hàng</a></div>
            </div>

        </div>
        <?php
        }
        ?>

    </div>

</div>
<script>
   
    function checkSL() {
        var slkhach = $("#quantity").val();

        var slton=<?php echo $r['Soluong']; ?>;
        if($.isNumeric(slkhach)==false)
        {
            alert('Phải nhập số vào số lượng');
            $("#quantity").focus();
            return false;
        }
        else{
            if(slkhach>slton){
                alert('Số sách trong kho còn tối đa:'+slton);
                $("#quantity").focus();
                return false;
            }
        }
        return true;
    }

    $("#button-cart").on("click", function () {
        if(checkSL()){
        var quanlity = $("#quantity").val();
        var bookid = $("#masach").val();
        var gia=0;
        <?php if(strtotime($today)<strtotime($ck_date)){
            ?>
            gia= <?php echo ($r['Gia']-($r['Gia']*$r['Chietkhau']/100)); ?>;
            <?php } else { ?>
        gia= <?php echo $r['Gia']; ?>; 
     <?php } ?>

       
    $.ajax({
        url: "create_cart.php",
        method: "POST",
        data: {bookid:bookid, quanlity: quanlity ,giamua:gia},
        success: function (response) {
            // if  (response=="a")
            window.location="index.php?route=cart";
        }
    });
}
    });

</script>