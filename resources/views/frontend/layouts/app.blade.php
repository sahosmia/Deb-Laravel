<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DEB - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/logo/Final Logo DEB-ai (4).png') }}"
        type="image/x-icon" />

    <!-- Bootstrap Css Link  -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Google Font Link  -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&family=Source+Serif+Pro:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome Link  -->
    <link href="{{ asset('frontend/assets/css/all.min.css') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" /> --}}

    <!-- Vendor Css Link  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/owl.theme.default.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/lightbox.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/aos.css') }}" />
    {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}

    <!-- External Css Link  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" />
</head>

<body>

    <!-- <div class="loader_bg">
        <div class="loader"></div>
    </div> -->

    <!-- header start  -->
    <header>
        <!-- top header start  -->
        <div class="top_header">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-9 top_header_left">
                        <ul class="top_header_contact_ul">
                            <li><i class="fa-solid fa-phone-flip"></i> {{ $settings->phone }}</li>
                            <li><i class="fa-solid fa-envelope"></i> {{ $settings->email }}</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-3  top_header_right">
                        <ul class="top_header_social_ul">
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="{{ $settings->facebook }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="{{ $settings->linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- top header end  -->
        <!-- nav start -->
        <nav class="navbar  navbar-expand-sm navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('front.index') }}">
                    <img src="{{ asset('upload/setting/logo') }}/{{ $settings->logo }}" alt="{{ $settings->logo }}"
                        class="w_100" />
                </a>

                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav m-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#about_us">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gallery.html">Gallary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.blog.index') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./notice.html">Notice</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.contact.index') }}">Contact</a>
                        </li>
                    </ul>




                    @auth
                        <div class="navbar_auth">
                            <ul>
                                <div class="dropdown profile_dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- <i class="fa-solid fa-user"></i>  -->
                                        {{ auth()->user()->name }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item"
                                                href="{{ route('front.profile.index') }}">Profile</a></li>
                                        <li><a class="dropdown-item" href="{{ route('admin.home') }}">Admin Panel</a>
                                        <li><a class="dropdown-item" href="{{ route('front.profile.edit') }}">Edit</a>
                                        </li>
                                        <li><a class="dropdown-item" href="./class.html">Class</a></li>
                                        <li><a class="dropdown-item" href="./rules-regulaion.html">Rules & Regulation</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                    </ul>
                                </div>
                            </ul>
                        </div>
                        @else
                        <ul>
                            <li><a class="text-dark" href="{{ route('login') }}">Sing In</a></li>
                            <li>/</li>
                            <li><a class="text-dark" href="{{ route('register') }}">Sing Up</a></li>
                        </ul>
                    @endauth
                </div>


            </div>
        </nav>
        <!-- nav end -->
    </header>
    <!-- header  end -->

    <main>

        @yield('content')

    </main>




    <!-- Footer start  -->
    <footer class="footer">
        <div class="container">
            <div class="main_footer">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h5 class="footer_subtitle">Contact Us</h5>
                        <ul>
                            <li><a href="">+8801952827301</a></li>
                            <li><a href="">+8801952827301</a></li>
                            <li><a href="">+8801952827301</a></li>
                            <li><a href="">sahosmia.webdev@gmail.com</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h5 class="footer_subtitle">Quick Link</h5>
                        <ul>
                            <li><a href="index.html#about_us">About Us</a></li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="./Registation1.html">Registaion</a></li>
                            <li><a href="./contact.html">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h5 class="footer_subtitle">Blog</h5>
                        <ul>
                            <li>
                                <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Aliquam, laboriosam.</a>
                            </li>
                            <li><a href="#">Dolor sit amet consectetur</a></li>
                            <li><a href="#">Ipsum dolor sit amet</a></li>
                            <li><a href="#">Amet consectetur adipisicing elit</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h5 class="footer_subtitle">News</h5>
                        <ul>
                            <li><a href="#">Lorem ipsum dolor sit</a></li>
                            <li><a href="#">Ipsum dolor sit amet</a></li>
                            <li><a href="#">Amet cons☺ectetur adipisicing elit</a></li>
                            <li><a href="#">Dolor sit amet consectetur</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="footer_bottom d-flex justify-content-between">
                    <div class="footer_bottom_left">
                        Copyright © 2022 Sahos Mia. All right reserved
                    </div>
                    <div class="footer_bottom_right">
                        <ul>
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Refand</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    {{-- <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "104511779002223");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script> --}}

    <!-- Your SDK code -->
    {{-- <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v15.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script> --}}
    <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('frontend/assets/vendor/js/owl.carousel.min.js') }}"></script>
    {{-- <script src="{{ asset('frontend/assets/vendor/js/lightbox.min.js') }}"></script> --}}
    <script src="{{ asset('frontend/assets/vendor/js/aos.js') }}"></script>
    {{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <script>
        // lightbox.option({
        //     alwaysShowNavOnTouchDevices: true,
        //     showImageNumberLabel: false,
        // });


        AOS.init({
            once: true,
        });
    </script>
</body>

</html>
