<style>  
        .breadcrumb {
            display: none;
        }

        .detailhowtobook {
            display: block;
        }

        .headline {
            display: block;
            width: 1200px;
            margin: 0 auto;
            margin-top: -30px;
            position: absolute;
        }

        #sign_box {
            position: relative;
            display: block;
        }

       #column_left {
            margin-top: -56px;
        } 
    </style>
<div style="font-size:0px">
    <div class="middletopc">
        <link href="Template/css/owl-carousel/owl.carousel.css" rel="stylesheet" />
        <link href="Template/css/owl-carousel/owl.theme.css" rel="stylesheet" />
        <!-- Prettify -->


        <div id="owl-demo" class="owl-carousel owl-theme">

            <div class="item"><a href="#"><img src="image/data/bannerslide.jpg" data-thumb="image/data/banner slide.jpg" title="" alt="" /></a></div>

            <div class="item"><a href="#"><img src="image/data/banner1.jpg" data-thumb="image/data/banner 1.jpg" title="" alt="" /></a></div>

            <div class="item"><a href="#"><img src="image/data/banner2.jpg" data-thumb="image/data/banner 2.jpg" title="" alt="" /></a></div>

            <div class="item"><a href="#"><img src="image/data/banner3.jpg" data-thumb="image/data/banner 3.jpg" title="" alt="" /></a></div>

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
                   
                    $re2 = mysqli_query($conn, $sbook);
                    while ($r2 = mysqli_fetch_array($re2)) {
                        $today = date("Y-m-d");
                        $ck_date=date($r2['Thoigianck']);
                        //  var_dump($ck_date) ; exit();
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
                                <div class="giacu"><?php echo number_format($r2['Gia']); ?>đ</div>
                                <?php if(strtotime($today)<strtotime($ck_date)){
                                ?>
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
                        <?php if(strtotime($today)<strtotime($ck_date)){
                                ?>
                        <div class="labelspecial"><?php echo $r2['Chietkhau'];?>%</div>
                        <?php } else { ?>
                            <div class="labelspecial">0%</div>
                             <?php } ?>
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