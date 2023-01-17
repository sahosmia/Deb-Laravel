<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DEB - Home</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/logo/Final Logo DEB-ai (4).png') }}"
        type="image/x-icon" />

    <!-- Bootstrap Css Link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Google Font Link  -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&family=Source+Serif+Pro:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <!-- Vendor Css Link  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/css/lightbox.min.css') }}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
                            <li><i class="fa-solid fa-phone-flip"></i> 01952827301</li>
                            <li><i class="fa-solid fa-envelope"></i> deb@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-3  top_header_right">
                        <ul class="top_header_social_ul">
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
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
                <a class="navbar-brand" href="./index.html">
                    <img src="{{ asset('frontend/assets/img/logo/DEB-Grean-Logo.png') }}" alt=""
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
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html#about_us">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gallery.html">Gallary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./notice.html">Notice</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./contact.html">Contact</a>
                        </li>
                    </ul>

                    <div class="navbar_auth">
                        <ul>
                            <div class="dropdown profile_dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <!-- <i class="fa-solid fa-user"></i>  -->
                                    Sahos Mia
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="./profile.html">Profile</a></li>
                                    <li><a class="dropdown-item" href="./profile-edit.html">Edit</a></li>
                                    <li><a class="dropdown-item" href="./class.html">Class</a></li>
                                    <li><a class="dropdown-item" href="./rules-regulaion.html">Rules & Regulation</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Logout</a></li>
                                </ul>
                            </div>
                        </ul>
                    </div>

                </div>


            </div>
        </nav>
        <!-- nav end -->
    </header>
    <!-- header  end -->

    <main>

        <!-- banner section start  -->
        <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8">
                        <div class="banner_content">
                            <h1>Growth You Career With Digital Experts in Bangladesh</h1>
                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex
                                asperiores eos voluptas, corrupti Ut, ad facilis.
                            </p>
                            <ul>
                                <li>Grouth</li>
                                <li>Experts</li>
                                <li>Success</li>
                            </ul>
                            <a class="button-48" role="button"><span class="text">Registar Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About US Section Start -->
        <section class="about_us" id="about_us">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="section_content" data-aos="zoom-in" data-aos-duration="4000">
                            <h3 class="section_heading">About Us</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt,
                                exercitationem? Delectus nemo, quas neque totam voluptates.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="about_us_content" data-aos="fade-up-right" data-aos-duration="1000">
                            <h5>Our Mission</h5>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Facere laboriosam neque aliquid rerum quas. Ea eligendi
                                veritatis quo possimus et. Lorem ipsum dolor sit amet
                                consectetur adipisicing elit.
                            </p>
                            <h5>Our Vission</h5>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Facere laboriosam neque aliquid rerum quas. Ea eligendi
                                veritatis quo possimus et.
                            </p>

                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="about_us_img" data-aos="fade-up-left" data-aos-duration="1000">
                            <img src="{{ asset('frontend/assets/img/logo/DEB-Grean-Logo.png') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About US Section End -->

        <!-- Notice Section Start  -->
        <section class="notice">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="section_content" data-aos="zoom-in" data-aos-duration="1000">
                            <h3 class="section_heading">Notice</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.Quas
                                neque totam voluptates.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
                    @foreach ($notices as $notice)
                    <div class="col-md-6 col-lg-3">
                        <div class="notice_item">
                            <div class="notice_item_content">
                                <ul class="d-flex justify-content-between">
                                    <li>
                                        <p class="notice_category">{{ optional($notice->user)->name }}</p>
                                    </li>
                                    <li>
                                        <p class="notice_date">{{ $notice->created_at->format('d M, Y') }}</p>
                                    </li>
                                </ul>
                                <h5>{{ $notice->title }}</h5>
                                <p class="notice_description">{{ $notice->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>

                <div class="row">
                    <div class="col-md-6 text-center m-auto">
                        <a href="#" class="button-49"><span class="text">See All</span></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Notice Section End  -->

        <!-- Choose US Section Start -->
        <section class="choose_us" id="choose_us">
            <div class="container">

                <div class="row d-flex align-items-center">
                    <div class="col-md-5">
                        <div class="choose_us_img" data-aos="fade-up-left" data-aos-duration="1000">
                            <img src="{{ asset('frontend/assets/img/why-choose.jpg') }}" alt="" />
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="choose_us_content" data-aos="fade-up-right" data-aos-duration="1000">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="sub_title">Why Choose Us</h4>
                                    <p class="sub_content">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Sed, laudantium?</p>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($whychooses as $whychoose)
                                    <div class="col-md-12 col-lg-6">
                                        <div class="choose_item">
                                            {!! $whychoose->icon !!}
                                            <div class="choose_item_content">
                                                <h6>{{ $whychoose->title }}</h6>
                                                <p>{{ $whychoose->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- Choose US Section End -->


        <!-- Auto Counter Section Start  -->
        <section class="auto_counter">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    @foreach ($counters as $counter)
                        <div class="col-md-6 col-lg-3">
                            <div class="counter_item">
                                <h3 class="counter" data-count="{{ $counter->number }}">{{ $counter->number }}</h3>
                                <h5 class="">{{ $counter->title }}</h5>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- Auto Counter Section End  -->

        <!-- Question Section Start  -->
        <section class="question">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="section_content" data-aos="fade-up" data-aos-duration="1000">
                            <h3 class="section_heading">
                                Questions
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt,
                                exercitationem? Delectus nemo, quas neque totam voluptates.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-12 col-lg-6">
                        <img class="w-75" src="{{ asset('frontend/assets/img/why-choose/why_choose.jpg') }}"
                            alt="question" />
                    </div>
                    <div class="col-md-12 col-lg-6 align-items-center d-flex" data-aos="fade-up"
                        data-aos-duration="1000">
                        <div class="accordion" id="accordionExample">

                            @foreach ($questions as $k => $question)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $k }}">
                                        <button class="accordion-button {{ $k == 0 ? '' : 'collapsed' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $k }}"
                                            aria-expanded="{{ $k == 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $k }}">
                                            {{ $k }}{{ $question->title }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $k }}"
                                        class="accordion-collapse collapse {{ $k == 0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $k }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <span>{{ $question->answer }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Question Category Section End  -->

        <!-- Gallery Section Start  -->

        <section class="gallery">
            <div class="container-fluid">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    @foreach ($galleries as $gallery)


                    <div class="col-md-3 col-sm-6 gallery_item">
                        <img src="{{ asset('upload/gallery') }}/{{ $gallery->image }}" alt="{{ $gallery->image }}">
                        <div class="gallery_eye">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="popup-image">
                    <span>x</span>
                    <img src="" alt="">
                </div>
            </div>
        </section>
        <!-- Gallery Section End  -->

        <!-- team Section Start  -->
        <section class="team">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-10 m-auto">
                        <div class="section_content">
                            <h3 class="section_heading">
                                Best <span class="primary_color">team</span>
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt,
                                exercitationem? Delectus nemo, quas neque totam voluptates.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-duration="1000">

                    @foreach ($teams as $team)
                        <div class="col-md-6 col-lg-3">
                            <div class="team_item">
                                <img class="w-100" src="{{ asset('upload/team') }}/{{ $team->image }}"
                                    alt="" />
                                <div class="team_item_backside">
                                    <div class="team_image">
                                        <img src="{{ asset('upload/team') }}/{{ $team->image }}"
                                            alt="{{ $team->image }}" />
                                    </div>
                                    <div class="team_content">
                                        <h4 class="team_name">{{ $team->name }}</h4>
                                        <h6 class="team_designation">{{ $team->designation }}</h6>


                                        <ul>
                                            @if ($team->facebook != null)
                                                <li>
                                                    <a href="{{ $team->facebook }}"><i
                                                            class="fa-brands fa-facebook-f"></i></a>
                                                </li>
                                            @endif

                                            @if ($team->twitter != null)
                                                <li>
                                                    <a href="{{ $team->twitter }}"><i
                                                            class="fa-brands fa-twitter"></i></a>
                                                </li>
                                            @endif

                                            @if ($team->instragram != null)
                                                <li>
                                                    <a href="{{ $team->instragram }}"><i
                                                            class="fa-brands fa-instagram"></i></a>
                                                </li>
                                            @endif

                                            @if ($team->linkedin != null)
                                                <li>
                                                    <a href="{{ $team->linkedin }}"><i
                                                            class="fa-brands fa-linkedin"></i></a>
                                                </li>
                                            @endif

                                            @if ($team->youtube != null)
                                                <li>
                                                    <a href="{{ $team->youtube }}"><i
                                                            class="fa-brands fa-youtube"></i></a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- team Section End  -->

        <!-- registation_course Section Start  -->
        <section class="registation_course">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-6">
                        <h4>Ragistation For Batch 3</h4>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                            Voluptatem sit ratione harum tempore obcaecati blanditiis rerum,
                            labore illum nam. Quidem!
                        </p>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-end">
                        <a href="./registation_details.html" class=" button-48"><span>Details</span></a>
                        <a href="./Registation1.html" class=" button-49"><span>Registaion Here</span></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- registation_course Section End  -->

        <!-- Testimonial Section Start  -->
        <section class="testimonial">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-10 m-auto">
                        <div class="section_content">
                            <h3 class="section_heading sec_heading">
                                Testimonials
                            </h3>

                        </div>
                    </div>
                </div>
                <div class="row owl-carousel" data-aos="fade-up" d ata-aos-duration="1000">

                    @foreach ($testimonials as $testimonial)
                        <div class="col-md-12">
                            <div class="testimonal_item">
                                <div class="testimonial_image">
                                    <img src="{{ asset('upload/testimonial') }}/{{ $testimonial->image }}"
                                        alt="{{ $testimonial->image }}" />
                                </div>
                                <div class="testimonial_content">
                                    <h4 class="testimonial_name">{{ $testimonial->name }}</h4>
                                    <h6 class="testimonial_designation">
                                        {{ $testimonial->designation }}{{ $testimonial->company != null ? ', ' . $testimonial->company : '' }}
                                    </h6>
                                    <p class="testimonial_description">{{ $testimonial->feedback }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- Testimonial Section End  -->

        <!-- Blog Section Start  -->
        <section class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="section_content" data-aos="zoom-in" data-aos-duration="1000">
                            <h3 class="section_heading">Blog</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.Quas
                                neque totam voluptates.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div class="blog_item">
                            <img src="{{ asset('frontend/assets/img/blog/5.webp') }}" alt="">
                            <div class="blog_item_content">
                                <ul>
                                    <li><i class="fa-solid fa-heart"></i> 50 Heart</li>
                                    <li><i class="fa-solid fa-comment"></i> 7 Comment</li>

                                </ul>
                                <h4><a href="#">Basic web design for beginer course</a></h4>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minima, incidunt aspernatur ipsa! Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Cumque, libero.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog_item">
                            <img src="{{ asset('frontend/assets/img/blog/7.webp') }}" alt="">
                            <div class="blog_item_content">
                                <ul>
                                    <li><i class="fa-solid fa-heart"></i> 50 Heart</li>
                                    <li><i class="fa-solid fa-comment"></i> 7 Comment</li>

                                </ul>
                                <h4><a href="#">Basic web design for beginer course</a></h4>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minima, incidunt aspernatur ipsa! Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Cumque, libero.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog_item">
                            <img src="{{ asset('frontend/assets/img/blog/6.webp') }}" alt="">
                            <div class="blog_item_content">
                                <ul>
                                    <li><i class="fa-solid fa-heart"></i> 50 Heart</li>
                                    <li><i class="fa-solid fa-comment"></i> 7 Comment</li>

                                </ul>
                                <h4><a href="#">Basic web design for beginer course</a></h4>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minima, incidunt aspernatur ipsa! Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Cumque, libero.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </section>
        <!-- Blog Section End  -->


        <!-- Add Bottom to top  -->
        <section class="back_to_top">
            <a id="back_to_top_btn"></a>
        </section>
        <!-- Add Bottom to top end -->


        {{-- <div class="modal_box">
            <div class="modal_content">
                <span class="close"><i class="fas fa-xmark"></i></span>
                <img src="{{ asset('frontend/assets/img/banner/bd_flag.jpg') }}" class="img-fluid rounded-top"
                    alt="">
                <button class="btn btn-primary">Click Here</button>
            </div>
        </div> --}}

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

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "104511779002223");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
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
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/assets/vendor/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/js/lightbox.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <script>
        lightbox.option({
            alwaysShowNavOnTouchDevices: true,
            showImageNumberLabel: false,
        });


        AOS.init({
            once: true,
        });
    </script>
</body>

</html>
