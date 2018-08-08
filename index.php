<?php
session_start();
include('connect.php')
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanhhabooks</title>
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
</head>
<!-- Them Background Image -->
<body>
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
                    <a href="" id="tab_logout"> <i class="fa fa-user-secret"></i><?php echo $_SESSION['name']; ?>|Đăng xuất</a>
                    <?php
                    }
                    else{ ?>
                    <a href="index.php?route=login" id="tab_login"><i class="fa fa-user-secret"></i> Đăng nhập</a>
                    <?php
                    }
                    ?>

                    
                </div>

                <div class="topmxh">
                    <i style="color: #000000; font-size: 18px" class="fa fa-shopping-cart"></i> <a href="index.php?route=checkout/shipping" id="tab_checkout">(0 sản phẩm) 0 đ</a>
                </div>
            </div>
        </div>
        <div class="wraper1">
            <div class="module_topheader">
                <div class="topheader">
                    <div class="logo">
                        <a href="index.php">
                            <img src="image/data/banner.jpg" title="Thanh Hà Books" alt="Thanh Hà Books" />
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
                    <a href="" id="tab_logout"> <?php echo $_SESSION['name']; ?>|Đăng xuất</a>
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
        //<!--
        function getURLVar(urlVarName) {
            var urlHalves = String(document.location).toLowerCase().split('?');
            var urlVarValue = '';

            if (urlHalves[1]) {
                var urlVars = urlHalves[1].split('&');

                for (var i = 0; i <= (urlVars.length) ; i++) {
                    if (urlVars[i]) {
                        var urlVarPair = urlVars[i].split('=');

                        if (urlVarPair[0] && urlVarPair[0] == urlVarName.toLowerCase()) {
                            urlVarValue = urlVarPair[1];
                        }
                    }
                }
            }

            return urlVarValue;
        }

        // Active submenu item
        $('.main-navigation li a[href="' + this.location.pathname + '"]').parent().addClass('onSelectedLi');
         // Active submenu item
         $('#nav li a[href="' + this.location.pathname + '"]').parent().addClass('onSelectedLi');
        
        $(document).ready(function () {
            route = getURLVar('route');

            if (!route) {
                $('#tab_home').addClass('selected');
            } else {
                part = route.split('/');

                if (route == 'common/home') {
                    $('#tab_home').addClass('selected');
                } else if (route == 'account/login') {
                    $('#tab_login').addClass('selected');
                } else if (part[0] == 'account') {
                    $('#tab_account').addClass('selected');
                } else if (route == 'checkout/cart') {
                    $('#tab_cart').addClass('selected');
                } else if (part[0] == 'checkout') {
                    $('#tab_checkout').addClass('selected');
                } else {
                    $('#tab_home').addClass('selected');
                }
            }
        });
    </script>
    <script type="text/javascript">

        $('#search input').keydown(function (e) {
            if (e.keyCode == 13) {
                moduleSearch();
            }
        });

        function moduleSearch() {
            pathArray = location.pathname.split('/');

            url = 'index.php';

            url += 'index.php?route=product/search';

            var filter_keyword = $('#filter_keyword').attr('value')

            if (filter_keyword) {
                url += '&keyword=' + encodeURIComponent(filter_keyword);
            }

            var filter_category_id = $('#filter_category_id').attr('value');

            if (filter_category_id) {
                url += '&category_id=' + filter_category_id;
            }

            location = url;
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
    <h1 style="display: none">Thanhhabooks</h1>
   
    <script type="text/javascript">
        $(document).ready(function () {
            $(".sign_in").live("hover", function () {
                $("#sign_box").fadeIn("fast");
                $("#sign_box").show();
            }
            );

            $("#sign_box").live("mouseleave", function () {
                $("#sign_box").show();
            }
             );
        });
    </script>
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
                <div class="box">
                    <div class="top"><img src="Template/theme/default/image/special.png" />Thống kê truy cập</div>
                    <div class="middle" style="text-align: center;">
                        <div style="font-size:16px;background-color:;color:;">00215689</div>

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
                                <span style="color:#00f;"><span style="font-family:georgia,serif;"><span style="font-size:16px;"><b>Thanh Hà Books - Nuôi dạy một em bé hạnh phúc!</b></span></span></span>
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
                                <span style="color:#00f;"><span style="font-family:georgia,serif;"><span style="font-size:16px;">Thanh Hà Books xin được đồng hành cùng bố mẹ trên con đường con lớn khôn mỗi ngày!</span></span></span>
                            </p>
                            <p>
                                <span style="color:#00f;"><span style="font-family:georgia,serif;"><span style="font-size:16px;">https://www.facebook.com/thanhhabookstore/</span></span></span>
                            </p>
                            <p>
                                <span style="color:#00f;"><span style="font-family:georgia,serif;"><span style="font-size:16px;"><strong>Hotline</strong> tư vấn và chăm sóc khách hàng: <strong>Ms. Thuận - 0977 636 101</strong></span></span></span>
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
                                <div>
                                    <p>
                                        <strong>VĂN PHÒNG HÀ NỘI</strong>
                                    </p>
                                    <p>
                                        Khu đô thị Viglacera Tây Mỗ, Phường Tây Mỗ, quận Nam Từ Liêm, thành phố Hà Nội
                                    </p>
                                    <p>
                                        Hotline: 0977 636 101
                                    </p>
                                    <p>
                                        Email: thanhhabooks@gmail.com
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <script src="https://apis.google.com/js/platform.js" async defer>{ lang: 'vi' }</script>
                    <div class="googlecong"><div class="g-follow" data-annotation="vertical-bubble" data-height="24" data-href="//plus.google.com/u/0/+thanhhabooks" data-rel="publisher"></div></a> </div>
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


                            <div>
                                Số người Online: <span style="color:#ff0;">29529</span> - Tổng truy cập: <span style="color:#ff0;">215680</span>
                            </div>
                            <div>Bản quyền thuộc về &copy; Design by <a href="#" title="Web trọn gói tại" target="_blank">NamnguyenIT</a></div>


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
        <a href="#"><i class="fa fa-book-reader"></i> ThanhhaBooks</a>
    </div>
</body>
</html>
