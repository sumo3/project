<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="/static/home/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="/static/home/style.css">

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="index.html"><img src="/static/home/img/core-img/logo.png" alt=""></a>
                            </div>
                            <div class="login-content">
                                <a href="#">登录 / 注册</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.html">主页</a></li>
                                    <li><a href="#">题目</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">类1</a></li>
                                            <li><a href="about-us.html">类1</a></li>
                                            <li><a href="course.html">类1</a></li>
                                            <li><a href="blog.html">类1</a></li>
                                            <li><a href="contact.html">类1</a></li>
                                            <li><a href="elements.html">类1</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">学习资料</a>
                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#">学习资料1</a></li>
                                                <li><a href="#">学习资料1</a></li>
                                                <li><a href="#">学习资料1</a></li>
                                                <li><a href="#">学习资料1</a></li>
                                                <li><a href="#">学习资料1</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#">学习资料2</a></li>
                                                <li><a href="#">学习资料2</a></li>
                                                <li><a href="#">学习资料2</a></li>
                                                <li><a href="#">学习资料2</a></li>
                                                <li><a href="#">学习资料2</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#">学习资料3</a></li>
                                                <li><a href="#">学习资料3</a></li>
                                                <li><a href="#">学习资料3</a></li>
                                                <li><a href="#">学习资料3</a></li>
                                                <li><a href="#">学习资料3</a></li>
                                            </ul>
                                            <div class="single-mega cn-col-4">
                                                <img src="/static/home/img/bg-img/bg-1.jpg" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="about-us.html">收藏</a></li>
                                    <li><a href="course.html">留言</a></li>
                                    <li><a href="contact.html">音乐</a></li>
                                    <li><a href="contact.html">个人中心</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:+654563325568889"><i class="icon-telephone-2"></i> <span>83838438</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
            @section('home')
                    @show

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <a href="#"><img src="/static/home/img/core-img/logo2.png" alt=""></a>
                            </div>
                            <p>Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod erat. Ut at erat et arcu pulvinar cursus a eget.</p>
                            <div class="footer-social-info">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>友情链接</h6>
                            </div>
                            <nav>
                                <ul class="useful-links">
                                    <li><a href="#">友情链接1</a></li>
                                    <li><a href="#">友情链接1</a></li>
                                    <li><a href="#">友情链接1</a></li>
                                    <li><a href="#">友情链接1</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>书展</h6>
                            </div>
                            <div class="gallery-list d-flex justify-content-between flex-wrap">
                                <a href="/static/home/img/bg-img/gallery1.jpg" class="gallery-img" title="Gallery Image 1"><img src="/static/home/img/bg-img/gallery1.jpg" alt=""></a>
                                <a href="/static/home/img/bg-img/gallery2.jpg" class="gallery-img" title="Gallery Image 2"><img src="/static/home/img/bg-img/gallery2.jpg" alt=""></a>
                                <a href="/static/home/img/bg-img/gallery3.jpg" class="gallery-img" title="Gallery Image 3"><img src="/static/home/img/bg-img/gallery3.jpg" alt=""></a>
                                <a href="/static/home/img/bg-img/gallery4.jpg" class="gallery-img" title="Gallery Image 4"><img src="/static/home/img/bg-img/gallery4.jpg" alt=""></a>
                                <a href="/static/home/img/bg-img/gallery5.jpg" class="gallery-img" title="Gallery Image 5"><img src="/static/home/img/bg-img/gallery5.jpg" alt=""></a>
                                <a href="/static/home/img/bg-img/gallery6.jpg" class="gallery-img" title="Gallery Image 6"><img src="/static/home/img/bg-img/gallery6.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>联系</h6>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-placeholder"></i>
                                <p>4127/ 5B-C Mislane Road, Gibraltar, UK</p>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-telephone-1"></i>
                                <p>主要: 203-808-8613 <br>办公室: 203-808-8648</p>
                            </div>
                            <div class="single-contact d-flex">
                                <i class="icon-contract"></i>
                                <p>office@yourbusiness.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Colorlib  All rights reserved | More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="/static/home/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/static/home/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/static/home/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="/static/home/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="/static/home/js/active.js"></script>
</body>

</html>