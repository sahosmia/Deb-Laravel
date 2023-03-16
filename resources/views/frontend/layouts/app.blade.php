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
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Google Font Link  -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&family=Source+Serif+Pro:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome Link  -->
    <link href="{{ asset('frontend/assets/css/all.min.css') }}" rel="stylesheet" />

    <!-- Vendor Css Link  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/aos.css') }}" />

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
                            <li><a href="{{ $settings->facebook }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="{{ $settings->linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
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
                            <a class="nav-link @yield('home-menu')" href="{{ route('front.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('about-menu')" href="{{ route('front.about.index') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('course-menu')" href="{{ route('front.course.index') }}">Course</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('gallary-menu')" href="{{ route('front.gallery.index') }}">Gallary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('blog-menu')" href="{{ route('front.blog.index') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('notice-menu')" href="{{ route('front.notice.index') }}">Notice</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link @yield('contact-menu')" href="{{ route('front.contact.index') }}">Contact</a>
                        </li>
                    </ul>




                    {{-- <div class="navbar_auth"> --}}
                    <ul class="navbar_auth">
                        @auth
                            <li>
                                <div class="dropdown profile_dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <!-- <i class="fa-solid fa-user"></i>  -->
                                        {{ auth()->user()->name }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ route('front.profile.index') }}">Profile</a>
                                        </li>

                                        <li><a class="dropdown-item" href="{{ route('front.profile.dashboard') }}">Dashboard</a>
                                        </li>
                                        @if (auth()->user()->role_id != 1)
                                            <li><a class="dropdown-item" href="{{ route('admin.home') }}">Admin Panel</a>
                                            </li>
                                        @endif
                                        <li><a class="dropdown-item" href="{{ route('front.profile.edit') }}">Edit</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('front.cart.index') }}">Cart</a>
                                        </li>

                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="sign-in-btn"><a class="text-dark" href="{{ route('login') }}">Sign In</a></li>
                            <li class="sign-up-btn"><a class="text-dark" href="{{ route('register') }}">Sign Up</a></li>
                        @endauth
                    </ul>
                    {{-- </div> --}}
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
    <footer id="rs-footer" class="rs-footer style1">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 md-mb-10">
                        <div class="footer-logo mb-40">
                            <a href="{{ route('front.index') }}"><img style="max-width: 100px;"
                                    src="{{ asset('upload/setting/logo') }}/{{ $settings->logo }}"
                                    alt=""></a>
                        </div>
                        <div class="textwidget white-color pb-40">
                            <p>We denounce with righteous indig nation in and dislike men who are so beguiled and to
                                demo realized by the, so blinded by desire, that they cannot foresee.</p>
                        </div>


                        <ul class="footer-social md-mb-30">

                            <li><a target="_blank" href="{{ $settings->facebook }}"><i
                                        class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a target="_blank" href="{{ $settings->linkedin }}"><i
                                        class="fa-brands fa-linkedin-in"></i></a></li>


                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 md-mb-10 pl-55 md-pl-15">
                        <h3 class="footer-title">Quick Link</h3>
                        <ul class="site-map">
                            <li><a href="{{ route('front.about.index') }}">About Us</a></li>
                            <li><a href="{{ route('front.blog.index') }}">Blog</a></li>
                            <li><a href="{{ route('front.gallery.index') }}">Notice</a></li>
                            <li><a href="{{ route('front.contact.index') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 md-mb-10">
                        <h3 class="footer-title">Blog</h3>
                        <ul class="site-map">
                            @foreach ($blogProvider as $blog)
                                <li><a href="{{ route('front.blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <h3 class="footer-title">Course</h3>
                        <ul class="site-map">
                            @foreach ($courseProvider as $course)
                                <li><a
                                        href="{{ route('front.course.details', $course->slug) }}">{{ $course->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-lg-6 md-mb-10 text-lg-end text-center order-last">
                        <ul class="copy-right-menu">
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">Privacy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="copyright text-lg-start text-center ">
                            <p>Copyright © 2023 Sahos Mia. All right reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <script>
        AOS.init({
            once: true,
        });
    </script>
</body>

</html>
