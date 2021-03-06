﻿<?php
session_start();
include('connect.php');
if (!isset($_SESSION['guest'])) {
    $sqlMaxUser="SELECT Max(User_ID)+1 as userid FROM `user`";
    $query = mysqli_query($conn, $sqlMaxUser);
    $makhach=mysqli_fetch_array( $query);
   
    if($makhach['userid']==null){
        $_SESSION['guest']=1;
    }else{
    $_SESSION['guest']=$makhach['userid'];}

    $sqlsgio="SELECT Magiohang as magio FROM `giohang` where Makh='".$makhach['userid']."'";
    $query2 = mysqli_query($conn, $sqlsgio);
    $magio=mysqli_fetch_array( $query2);

    $sqldelgio="DELETE FROM `chitietgiohang` where Magiohang='".$magio['magio']."'";
    $query3 = mysqli_query($conn, $sqldelgio);

     $sqldel="DELETE FROM `giohang` where Makh='".$makhach['userid']."'";
    $query4 = mysqli_query($conn, $sqldel);
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tusachthieunhi</title>
    <link href="image/data/34.jpg" rel="icon" />
    <link href="Template/css/stylesheet.css" rel="stylesheet" />
    <!-- livesearch -->
    <link href="Template/css/livesearch.css" rel="stylesheet" />
    <!-- end livesearch -->
    <link href="Template/css/alertphone.css" rel="stylesheet" />
    <link href="Template/css/default.css" rel="stylesheet" />
    <link href="Template/css/component.css" rel="stylesheet" />
    <link href="Template/css/stylesheet-mobile.css" rel="stylesheet" />
    <link href="Template/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="Template/js/jquery/thickbox/thickbox.css" rel="stylesheet" />
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Roboto:400,700,500,300'>
    <script src="Template/js/jquery/thickbox/thickbox-compressed.js"></script>
    <script src="Template/js/jquery/jquery-2.2.1.js"></script>
    <script src="Template/js/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="Template/js/mobile.js"></script>
    <script src="Template/js/modernizr.custom.js"></script>
    <script src="Template/js/jquery/tab.js"></script>
    <script src="Template/js/common.js"></script>
    <style>
    #loading {
      background-color:white;
      position: fixed;
      display: block;
      top: 0;
      bottom: 0;
      z-index: 1000000;
      opacity: 0.6;
      width: 100%;
      height: 100%;
      text-align: center;
  }

  #loading img {
      margin: auto;
      display: block;
      top: calc(50% - 150px);
      left: calc(50% - 10px);
      position: absolute;
      z-index: 999999;
      width:60px;
  }
</style>
</head>
<!-- Them Background Image -->
<body>
    <div id="loading" style="display:none">
        <img src="images/load.gif" alt="Loading..."/>
    </div>
    <!-- Them Background Image -->
    <header id="header">
        <div class="toptop">
            <div class="toptop960">

                <div class="toplink">

                    <a href="tel:0977636101"><i class="fa fa-phone"></i></a>
                    <a href="khuyen-mai-sp"><i class="fa fa-paypal"></i> Khuyến mại</a>
                    <a href="lien-he-vi"><i class="fa fa-envelope"></i> Liên hệ</a>
                    <?php
                    
                    if (isset($_SESSION['userid'])) {
                        ?>
                        <a href="index.php?route=inforuser" id="tab_inforUser"> <i class="fa fa-user-secret"></i><?php echo $_SESSION['name'];?></a>
                        <a href="" id="tab_logout">Đăng xuất</a>
                        <?php
                    }
                    else{ ?>
                        <a href="index.php?route=login" id="tab_login"><i class="fa fa-user-secret"></i> Đăng nhập</a>
                        <?php
                    }
                    ?>                    
                </div>

                <div class="topmxh">
                    <i style="color: #000000; font-size: 18px" class="fa fa-shopping-cart"></i>
                    <a href="index.php?route=cart" >
                       <?php
                       $userid ='';
                       if (isset($_SESSION['userid'])) 
                       {
                        $userid = $_SESSION['userid'];
                    }
                    else {
                        $userid = $_SESSION['guest'];
                    }
                    $sql4="SELECT Magiohang From giohang where Makh='". $userid."'" ;
                    $query4= mysqli_query($conn, $sql4);
                    $magio=mysqli_fetch_array( $query4);
                    $sql5 = "SELECT SUM(Soluong)as soluong, SUM(Giamua*Soluong) as tongtien FROM `chitietgiohang` WHERE Magiohang= '". $magio['Magiohang']."'";
                    $query5 = mysqli_query($conn, $sql5);
                    $magiohang=mysqli_fetch_array( $query5);

                    ?>
                    <label  id="tab_checkout">(<?php echo $magiohang["soluong"] ?>sản phẩm)<?php echo number_format($magiohang["tongtien"]) ?>đ</label>

                </a>
            </div>
        </div>
    </div>
    <div class="wraper1">
        <div class="module_topheader">
            <div class="topheader">
                <div class="logo">
                    <a href="index.php">
                        <img src="image/data/banner.jpg" title="Tủ Sách Thiếu Nhi" alt="Tủ Sách Thiếu Nhi" />
                    </a>
                </div>

                <div class="topheadercenter">
                    <div class="topsearch">
                        <div id="search">
                            <div class="searchnd">
                                <input type="text" value="Từ khóa" id="filter_keyword" onclick="this.value = '';" onkeydown="this.style.color = '#000000'" style="color: #999;" />

                                <div class="searchicon"><a onclick="moduleSearch();"><i class="fa fa-search"></i></a></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div>
                    <a href="tel:+841673293712" title="Tư vấn khách hàng">
                        <div class="alo-phone alo-green alo-show">
                            <div class="alo-ph-circle"></div>
                            <div class="alo-ph-circle-fill"></div>
                            <div class="alo-ph-img-circle">
                                <i class="fa fa-phone"></i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <div class="wraper2">
        <div class="moduleheader">
            <nav class="nav-container">
                <div class="nav-inner">
                    <!-- ======= Menu Code START ========= -->
                    <div id="menu" class="main-menu">
                        <div class="nav-responsive" style="display: none;"><span>Menu</span><div class="expandable"></div></div>
                        <ul class="main-navigation">
                            <li>
                                <a class="inactive" href="index.php"><i class="fa fa-home"></i></a>
                            </li>
                            <?php
                            $s = "SELECT * FROM book_category WHERE  tinhtrang='1'";
                            $re = mysqli_query($conn, $s);

                            while ($r = mysqli_fetch_array($re)) {
                                ?>
                                <li>
                                    <a title="<?php echo $r['Tenloai']; ?>" href="index.php?route=cate&type=<?php echo $r['Maloaisach']; ?>">
                                        <?php echo $r['Tenloai']; ?>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <li>
                                <?php
                                if (isset($_SESSION['userid'])) {
                                    ?>
                                    <a href="index.php?route=inforuser" id="tab_inforUser"> <i class="fa fa-user-secret"></i><?php echo $_SESSION['name'];?></a>
                                    <a href="" id="tab_logout">Đăng xuất</a>

                                    <?php
                                }
                                else{ ?>
                                    <a href="index.php?route=login" id="tab_login">Đăng nhập</a>
                                    <?php
                                }
                                ?>
                            </li>
                        </ul>
                    </div>

                    <!-- ======= Menu Code END ========= -->
                </div>
            </nav>

            <!-- Megnor www.templatemela.com - Start -->
            <script src="Template/js/megnor/megnor.min.js"></script>
            <script src="Template/js/megnor/custom.js"></script>
            <script src="Template/js/megnor/jquery.custom.min.js"></script>
            <script src="Template/js/megnor/jstree.min.js"></script>

            <div class="breadcrumb">
                <div class="center">
                    <div id="breadcrumb">

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script type="text/javascript">
    $("#tab_logout").on("click", function () {
        $.ajax({
            url: "logout_action.php",
            method: "POST",
            data:{},
            success: function (response) {

                    if (response == "1") {// kiem tra du lieu ra
                        window.location = "index.php";
                    }
                }
            });

    });

</script>
<script type="text/javascript">

    $('#search input').keydown(function (e) {
        if (e.keyCode == 13) {
            moduleSearch();
        }
    });

    function moduleSearch() {
        var key = $("#filter_keyword").val();
        window.location="index.php?route=search&key="+key;
    }
</script>
<script type="text/javascript">

    $('.switcher').bind('click', function () {
        $(this).find('.option').slideToggle('fast');
    });
    $('.switcher').bind('mouseleave', function () {
        $(this).find('.option').slideUp('fast');
    });
</script>
<h1 style="display: none">Tusachthieunhi</h1>


<div class="wraper3">
    <div class="module_middle_top">
        <div id="column_middle_top">
        </div>

    </div>
</div>
<div id="wraper">
    <div id="container">
        <aside id="column_left">
            <link href="Template/css/popupcategory.css" rel="stylesheet" />
            <div class="headhowtobook"><a class="sign_in" href="#">Danh mục sản phẩm</a></div>
            <div id="sign_box">
                <div class="box">
                    <div style="border:1px solid #ddd;">
                        <ul id="nav">
                            <?php
                            $s = "SELECT * FROM book_category WHERE  tinhtrang='1'";
                            $re = mysqli_query($conn, $s);
                            while ($r = mysqli_fetch_array($re)) {
                                ?>
                                <li class="">
                                    <a title="<?php echo $r['Tenloai']; ?>" href="index.php?route=cate&type=<?php echo $r['Maloaisach']; ?>"><?php echo $r['Tenloai']; ?>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>

        </div>

        <div class="box">
            <div class="html1tc">
                <div class="top">Hình ảnh</div>
                <div class="middle">

                    <div>

                        <a href="/1088-cau-do-phat-trien-tri-tue-3-4-tuoi-bo-4-q" target="blanc">
                            <img src="image/data/1088%20C%c3%a2u%20%c4%91%e1%bb%91%20ph%c3%a1t%20tri%e1%bb%83n%20tr%c3%ad%20tu%e1%bb%87%203-4%20tu%e1%bb%95i%20(B%e1%bb%99%204%20q)/1088%20C%c3%a2u%20%c4%91%e1%bb%91%20ph%c3%a1t%20tri%e1%bb%83n%20tr%c3%ad%20tu%e1%bb%87%203-4t.jpg" />

                        </a>
                    </div>
                    <div>

                        <a href="/sach-cho-be-ky-nang-song/cam-nang-sinh-hoat-bang-tranh-cho-be" target="blanc">
                            <img src="image/data/C%e1%ba%a9m%20nang%20sinh%20ho%e1%ba%a1t%20b%e1%ba%b1ng%20tranh%20cho%20b%c3%a9/C%e1%ba%a9m%20nang%20sinh%20ho%e1%ba%a1t%20b%e1%ba%b1ng%20tranh%20cho%20b%c3%a9.jpg" />

                        </a>
                    </div>
                </div>
            </div>
        </div>

    </aside>
    <section id="content">
        <!-- cho dat slide-->
        <?php
        include('dieuhuong.php');
        ?>

        <!--énd-->

        <div style="clear: both"> </div>
    </section>
</div>
</div>
<div class="wraper4">
    <div class="module_middle_end">
        <div class="column_middle_end">
            <div class="middleend1">
                <div class="box">
                    <div class="top">
                        <img src="Template/theme/default/image/brands.png" />
                        Giới thiệu
                    </div>
                    <div class="middle" style="text-align: left;">
                        <p>
                            <span style="color:#00f;"><span style="font-family:georgia,serif;"><span style="font-size:16px;"><b>Tủ Sách Thiếu Nhi - Nuôi dạy một em bé hạnh phúc!</b></span></span></span>
                        </p>
                        <p>
                            <span style="color:#00f;">
                                <span style="font-family:georgia,serif;">
                                    <span style="font-size:16px;">
                                        Bố mẹ hãy dành thời gian đọc sách và chơi trò chơi cùng con mỗi ngày để con được là một em bé hạnh phúc! <br />
                                    </span>
                                </span>
                            </span>
                        </p>
                        <p>
                            <span style="color:#00f;"><span style="font-family:georgia,serif;"><span style="font-size:16px;">Tủ Sách Thiếu Nhi xin được đồng hành cùng bố mẹ trên con đường con lớn khôn mỗi ngày!</span></span></span>
                        </p>
                        <p>
                            <span style="color:#00f;"><span style="font-family:georgia,serif;"><span style="font-size:16px;">https://www.facebook.com/Tusachthieunhi/</span></span></span>
                        </p>
                        <p>
                            <span style="color:#00f;"><span style="font-family:georgia,serif;"><span style="font-size:16px;"><strong>Hotline</strong> tư vấn và chăm sóc khách hàng: <strong>Tusachthieunhi - 0977 636 101</strong></span></span></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="middleend2">
                <div class="box">
                    <div class="top"><img src="Template/theme/default/image/imagelinks.png" /> Video Clip</div>
                    <div class="middle">

                        <div class="youtube" id="ytapiplayer"><iframe allowfullscreen="" frameborder="0" height="290" src="http://www.youtube.com/embed/IJ_ZF1WmBIk" width="100%"></iframe></div>


                    </div>
                </div>
            </div>

            <script type="text/javascript">
                function updateHTML(elmId, value) {
                    document.getElementById(elmId).innerHTML = value;
                }
                    // functions for the api calls
                    function loadNewVideo(id, startSeconds) {
                        document.getElementById('ytapiplayer').innerHTML = '<iframe width="100%" height="100%" src="http://www.youtube.com/embed/' + id + '" frameborder="0" allowfullscreen></iframe>';
                    }
                    function Change() {
                        /*var change=document.getElementById('chude').value;
                        loadNewVideo(change,0)*/
                        document.form1.submit();
                    }
                </script>        
                <div class="middleend3">
                    <div class="box">
                        <div class="top">
                            <img src="Template/theme/default/image/imagelinks.png" />
                            <img src="Template/theme/default/image/imagelinks.png" />
                            Fans Page
                        </div>
                        <div class="middle">
                            <div id="fb-root"></div>
                            <script>
                                (function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>

                                <div class="fb">
                                    <div class="fb-page"
                                    data-href="https://www.facebook.com/tusachthieunhi/"
                                    data-tabs="timeline"
                                    data-width="340"
                                    data-height="290"
                                    data-small-header="false"
                                    data-adapt-container-width="true"
                                    data-hide-cover="false"
                                    data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/tusachthieunhi/" class="fb-xfbml-parse-ignore">
                                        <a href="https://www.facebook.com/tusachthieunhi/">Tủ sách Thiếu nhi</a>
                                    </blockquote>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="wraper6">
            <div class="module_danhmucface">
                <div class="danhmucface">
                    <div class="footer11">


                        <div class="welpow">
                            <div class="welcome">
                                <?php
                                $sqladdress= "SELECT * FROM `business`";
                                $queryemail = mysqli_query($conn, $sqladdress);
                                $radd = mysqli_fetch_array($queryemail)
                                ?>

                                <div>
                                    <p>
                                        <strong><?php echo $radd['name']?></strong>
                                    </p>
                                    <p>
                                        <?php echo $radd['address']?>  
                                    </p>
                                    <p>
                                        Hotline: <?php echo $radd['telephone']?>
                                    </p>
                                    <p>
                                        Email: <?php echo $radd['email']?>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <script src="https://apis.google.com/js/platform.js" async defer>{ lang: 'vi' }</script>
                    <div class="googlecong"><div class="g-follow" data-annotation="vertical-bubble" data-height="24" data-href="//plus.google.com/u/0/+Tusachthieunhi" data-rel="publisher"></div></a> </div>
                    <div class="footer12">
                        <div class="powered">
                            <div class="newletter">
                            </div>
                            <div>
                                <div style="display:inline-block;    vertical-align: top;" class="g-plusone" data-size="medium" data-annotation="none"></div>
                                <script>
                                    (function (d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s); js.id = id;
                                        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script>
                                    <div style="display:inline-block;    vertical-align: top;" class="fb-like" data-send="true" data-layout="button_count" data-width="0" data-colorscheme="dark" data-show-faces="false"></div>
                                    <script src="https://apis.google.com/js/platform.js" async defer></script>
                                </div>


                                <div>Bản quyền thuộc về &copy; Design by <a href="#" title="Web trọn gói tại" target="_blank"> <?php echo $radd['website']?></a></div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wraper5">
                <div class="module_danhmucface">
                    <div class="danhmucface">

                        <div class="module_footermenu">
                            <!-- Menu header -->
                            <div class="footermenu">
                            </div>

                            <!-- End Menu header -->

                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    $(document).ajaxStart(function() {
                        $("#loading").show();
                    });
                    $(document).ajaxStop(function() {
                        $("#loading").hide();
                    });
                });
            </script>

            <!--Start of Tawk.to Script-->
            <script type="text/javascript">
                var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
                (function () {
                    var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
                    s1.async = true;
                    s1.src = 'https://embed.tawk.to/5912f62d4ac4446b24a6e3f0/default';
                    s1.charset = 'UTF-8';
                    s1.setAttribute('crossorigin', '*');
                    s0.parentNode.insertBefore(s1, s0);
                })();


            </script>
            <!--End of Tawk.to Script-->



            <script src="Template/js/livesearch.js"></script>
            <script src="Template/js/highlighter.js"></script>
        </footer>
        <div class="goict">
            <a href="#"><i class="fa fa-book-reader"></i>  <?php echo $radd['name']?></a>
        </div>
    </body>
    </html>
