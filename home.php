<div style="font-size:0px">
    <div class="middletopc">
        <link href="Template/css/owl-carousel/owl.carousel.css" rel="stylesheet" />
        <link href="Template/css/owl-carousel/owl.theme.css" rel="stylesheet" />
        <!-- Prettify -->


        <div id="owl-demo" class="owl-carousel owl-theme">

            <div class="item"><a href="http://thanhhabooks.com/"><img src="http://thanhhabooks.com/image/data/banner slide.jpg" data-thumb="http://thanhhabooks.com/image/data/banner slide.jpg" title="" alt="" /></a></div>

            <div class="item"><a href="http://thanhhabooks.com/index.php?route=product/category&amp;path=170"><img src="http://thanhhabooks.com/image/data/banner 1.jpg" data-thumb="http://thanhhabooks.com/image/data/banner 1.jpg" title="" alt="" /></a></div>

            <div class="item"><a href="http://thanhhabooks.com/sach-cho-be-ky-nang-song"><img src="http://thanhhabooks.com/image/data/banner 2.jpg" data-thumb="http://thanhhabooks.com/image/data/banner 2.jpg" title="" alt="" /></a></div>

            <div class="item"><a href="http://thanhhabooks.com/index.php?route=product/category&amp;path=170"><img src="http://thanhhabooks.com/image/data/banner 3.jpg" data-thumb="http://thanhhabooks.com/image/data/banner 3.jpg" title="" alt="" /></a></div>

            <div class="item"><a href="http://thanhhabooks.com/index.php?route=product/category&amp;path=170"><img src="http://thanhhabooks.com/image/data/banner 4.jpg" data-thumb="http://thanhhabooks.com/image/data/banner 4.jpg" title="" alt="" /></a></div>

        </div>
        <script src="Template/css/owl-carousel/owl.carousel.js"></script>

        <!-- Demo -->
        <style>
            #owl-demo .item {
                margin: 0px;
            }

                #owl-demo .item img {
                    display: block;
                    width: 100%;
                    height: auto;
                }
        </style>

        <script>
            $(document).ready(function () {
                $("#owl-demo").owlCarousel({
                    autoPlay: 5000,
                    singleItem: true
                });

            });
        </script>

    </div>
    <div class="middletopr">
    </div>
</div>

<script src="Template/js/jquery/jquery.lazyload.min.js"></script>
<div id="categorywallandfile88">

 <?php
    $s = "SELECT * FROM `book_category` WHERE tinhtrang ='1' limit 0,4 ";
    $re = mysqli_query($conn, $s);
    while ($r = mysqli_fetch_array($re)) {
?>
     <div class="categorywallandfile9">
        <div class="cw_col">
            <div>
                <div class="topct8">

                    <h2 class=""><a title="<?php echo $r['Tenloai']; ?>" href="index.php?route=cate&type=<?php echo $r['Maloaisach']; ?>"><?php echo $r['Tenloai']; ?></a></h2>
                    <ul>
                        <!-- <li style="background: url('catalog/view/theme/default/image/tendo2.png') no-repeat; width: 30px; float: left; height: 33px;list-style: none;"></li> -->
                    </ul>

                </div>
            </div>
        </div>
        <div id="wraper">
            <div id="container">
                <div class="cw_col_c">
                <?php
                    $maloai=$r['Maloaisach'];
                   
                    $sbook = "SELECT * FROM `book` WHERE Loaisach = '".$maloai."' and trangthai ='1' limit 0,4 ";
                    //var_dump($sbook) ; exit();
                    $re2 = mysqli_query($conn, $sbook);
                    while ($r2 = mysqli_fetch_array($re2)) {
                ?>
                    <div class="sanpham xam">
                        <div>
                            <div class="image">

                                <a title="<?php echo $r2['Tensach']; ?>" href="index.php?route=book&type=<?php echo $r2['Masach']; ?>"><img title="<?php echo $r2['Tensach']; ?>" style="width: 100%" src="image/<?php echo $r2['anh'] ?>" alt="<?php echo $r2['Tensach']; ?>" /></a>
                            </div>
                            <div class="tensp">
                                <a title="<?php echo $r2['Tensach']; ?>"
                                href="index.php?route=book&type=<?php echo $r2['Masach']; ?>"><?php echo $r2['Tensach']; ?></a>
                            </div>
                            <div class="gia">
                                <div class="giacu"><?php echo $r2['Gia'],0; ?> đ</div>
                                <div class="giamoi"><?php echo $r2['Gia'],0; ?> đ</div>
                            </div>
                        </div>
                        <div class="chitietvsmua">
                            <div class="chitiet"><a title="<?php echo $r2['Tensach']; ?>" href="index.php?route=book&type=<?php echo $r2['Masach']; ?>">Chi tiết</a></div>
                            <div class="mua"><a href="index.php?route=checkout&type=<?php echo $r2['Masach']; ?>" title="Mua hàng">Đặt hàng</a></div>
                        </div>
                        <div class="labelspecial">-20%</div>
                    </div>
                <?php
                }
                ?>
             </div>
            </div>
        </div>
        </div>
    <?php
    }
    ?>
</div>