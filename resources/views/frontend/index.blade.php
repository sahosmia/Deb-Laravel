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
    <div class="loader_bg">
        <div class="loader"></div>
    </div>

    <header>
        <nav class="navbar fixed-top navbar-expand-sm navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
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
                            <a class="nav-link" href="#">Course</a>
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
                            <a class="nav-link" href="./careear-hub.html">Carrear Hub</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./contact.html">Contact</a>
                        </li>
                    </ul>

                    <div class="navbar_auth">
                        <ul>
                            {{-- <li><a href="#" class="button-48">Login</a></li>
                <li><a href="#" class="button-48"><span class="text">Register</span></a></li> --}}

                            <li><a href="{{ route('logout') }}" class="button-48">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>


    </header>
    <main>
        <!-- banner section start  -->
        <section class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 m-auto">
                        <div class="banner_content text-center ">
                            <h1>Growth You Career With </h1>
                            <h1 data-aos="slide-down" data-aos-duration="3000">Digital Experts in Bangladesh</h1>
                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex
                                asperiores eos voluptas, corrupti Ut, ad facilis.
                            </p>
                            <a class="button" href="#">Start Your Jurning</a>

                            <!-- HTML !-->
                            <button class="button-48" role="button"><span class="text">Button 48</span></button>


                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- About US Section Start -->
        <section class="about_us" id="about_us">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 m-auto">
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
                    <div class="col-md-6">
                        <div class="about_us_content" data-aos="fade-up-right" data-aos-duration="1000">
                            <h5>Web & Softwer</h5>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Facere laboriosam neque aliquid rerum quas. Ea eligendi
                                veritatis quo possimus et. Lorem ipsum dolor sit amet
                                consectetur adipisicing elit.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Facere laboriosam neque aliquid rerum quas. Ea eligendi
                                veritatis quo possimus et.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Facere laboriosam neque aliquid rerum quas. Ea eligendi
                                veritatis quo possimus et. Lorem ipsum dolor sit amet
                                consectetur adipisicing elit.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
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
                    <div class="col-md-6 m-auto">
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
                    <div class="col-md-3">
                        <div class="notice_item">
                            <div class="notice_item_content">
                                <ul class="d-flex justify-content-between">
                                    <li>
                                        <p class="notice_category">Alex Sharuk</p>
                                    </li>
                                    <li>
                                        <p class="notice_date">26th Nov, 2016</p>
                                    </li>
                                </ul>
                                <h5>Basic web design for beginer course</h5>
                                <p class="notice_description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minima, incidunt aspernatur ipsa!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="notice_item">
                            <div class="notice_item_content">
                                <ul class="d-flex justify-content-between">
                                    <li>
                                        <p class="notice_category">Alex Sharuk</p>
                                    </li>
                                    <li>
                                        <p class="notice_date">26th Nov, 2016</p>
                                    </li>
                                </ul>
                                <h5>Basic web design for beginer course</h5>
                                <p class="notice_description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minima, incidunt aspernatur ipsa!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="notice_item">
                            <div class="notice_item_content">
                                <ul class="d-flex justify-content-between">
                                    <li>
                                        <p class="notice_category">Alex Sharuk</p>
                                    </li>
                                    <li>
                                        <p class="notice_date">26th Nov, 2016</p>
                                    </li>
                                </ul>
                                <h5>Basic web design for beginer course</h5>
                                <p class="notice_description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minima, incidunt aspernatur ipsa!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="notice_item">
                            <div class="notice_item_content">
                                <ul class="d-flex justify-content-between">
                                    <li>
                                        <p class="notice_category">Alex Sharuk</p>
                                    </li>
                                    <li>
                                        <p class="notice_date">26th Nov, 2016</p>
                                    </li>
                                </ul>
                                <h5>Basic web design for beginer course</h5>
                                <p class="notice_description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Minima, incidunt aspernatur ipsa!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 text-center m-auto">
                        <a href="#" class="see_all_btn">See All</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Populer Blog Section End  -->

        <!-- Auto Counter Section Start  -->
        <section class="auto_counter">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-3">
                        <div class="counter_item">
                            <h3 class="counter">750</h3>
                            <h5 class="">Learners</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter_item">
                            <h3 class="counter">60</h3>
                            <h5 class="">Course Published</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter_item">
                            <h3 class="counter">30</h3>
                            <h5 class="">Job Placement</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="counter_item">
                            <h3 class="counter">140</h3>
                            <h5 class="">Happy Client</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Auto Counter Section End  -->

        <!-- Why Choose Section Start  -->
        <section class="why_choose">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="section_content" data-aos="fade-up" data-aos-duration="1000">
                            <h3 class="section_heading">
                                Why <span class="primary_color">Choose</span>
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt,
                                exercitationem? Delectus nemo, quas neque totam voluptates.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-6">
                        <img class="w-75" src="{{ asset('frontend/assets/img/why-choose/why_choose.jpg') }}"
                            alt="why_choose" />
                    </div>
                    <div class="col-md-6 align-items-center d-flex" data-aos="fade-up" data-aos-duration="1000">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        24/7 hour support
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <span>Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Quas ipsa modi neque cum vero deserunt labore,
                                            voluptatum in? Iusto dolorem accusamus in ipsam possimus
                                            molestias vitae numquam similique accusantium
                                            placeat?</span>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Job placement for beginer
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <span>Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Quas ipsa modi neque cum vero deserunt labore,
                                            voluptatum in? Iusto dolorem accusamus in ipsam possimus
                                            molestias vitae numquam similique accusantium
                                            placeat?</span>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Group study best environtment
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <span>Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Quas ipsa modi neque cum vero deserunt labore,
                                            voluptatum in? Iusto dolorem accusamus in ipsam possimus
                                            molestias vitae numquam similique accusantium
                                            placeat?</span>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">
                                        Scolership Opportunity
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <span>Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Quas ipsa modi neque cum vero deserunt labore,
                                            voluptatum in? Iusto dolorem accusamus in ipsam possimus
                                            molestias vitae numquam similique accusantium
                                            placeat?</span>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                        aria-expanded="false" aria-controls="collapseFive">
                                        Accordion Item
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <span>Lorem ipsum dolor sit amet consectetur adipisicing
                                            elit. Quas ipsa modi neque cum vero deserunt labore,
                                            voluptatum in? Iusto dolorem accusamus in ipsam possimus
                                            molestias vitae numquam similique accusantium
                                            placeat?</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Course Category Section End  -->

        <!-- Newsletter Section Start  -->
        <section class="newsletter">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-6">
                        <h4>Newsletter</h4>
                        <p>
                            Keep us with our latest news and events. Subscribe to our
                            newsletter
                        </p>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-end">
                        <form action="">
                            <input type="text" placeholder="Type your email address" />
                            <button>Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Newsletter Section End  -->

        <!-- Mentor Section Start  -->
        <section class="mentor">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-6 m-auto">
                        <div class="section_content">
                            <h3 class="section_heading">
                                Best <span class="primary_color">Mentor</span>
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt,
                                exercitationem? Delectus nemo, quas neque totam voluptates.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-3">
                        <div class="mentor_item">
                            <div class="mentor_image">
                                <img src="{{ asset('frontend/assets/img/mentor/mentor-1.png') }}" alt="" />
                            </div>
                            <div class="mentor_content">
                                <h4 class="mentor_name">Sahos Mia</h4>
                                <h6 class="mentor_designation">Web Developer</h6>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Aliquid reprehenderit reiciendis itaque aspernatur.
                                </p>

                                <ul>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mentor_item">
                            <div class="mentor_image">
                                <img src="{{ asset('frontend/assets/img/mentor/mentor-2.png') }}" alt="" />
                            </div>
                            <div class="mentor_content">
                                <h4 class="mentor_name">Ridoy Hossin</h4>
                                <h6 class="mentor_designation">Networking Specalist</h6>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Aliquid reprehenderit reiciendis itaque aspernatur.
                                </p>

                                <ul>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mentor_item">
                            <div class="mentor_image">
                                <img src="{{ asset('frontend/assets/img/mentor/mentor-3.jpg') }}" alt="" />
                            </div>
                            <div class="mentor_content">
                                <h4 class="mentor_name">Jr. Naymer</h4>
                                <h6 class="mentor_designation">Web Developer</h6>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Aliquid reprehenderit reiciendis itaque aspernatur.
                                </p>

                                <ul>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mentor_item">
                            <div class="mentor_image">
                                <img src="{{ asset('frontend/assets/img/mentor/mentor-4.jpg') }}" alt="" />
                            </div>
                            <div class="mentor_content">
                                <h4 class="mentor_name">Alex Mojumdar</h4>
                                <h6 class="mentor_designation">App Developer</h6>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Aliquid reprehenderit reiciendis itaque aspernatur.
                                </p>

                                <ul>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mentor Section End  -->

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
                        <a href="./registation_details.html" class="button">Details</a>
                        <a href="{{ route('frontend.ragistation') }}" class="button">Registaion Here</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- registation_course Section End  -->

        <!-- Testimonial Section Start  -->
        <section class="testimonial">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-6 m-auto">
                        <div class="section_content">
                            <h3 class="section_heading">
                                Students <span class="primary_color">Feedback</span>
                            </h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt,
                                exercitationem? Delectus nemo, quas neque totam voluptates.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row owl-carousel" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-12">
                        <div class="testimonal_item">
                            <div class="testimonial_image">
                                <img src="{{ asset('frontend/assets/img/mentor/mentor-1.png') }}" alt="" />
                            </div>
                            <div class="testimonial_content">
                                <h4 class="testimonial_name">Ridoy Hossin</h4>
                                <h6 class="testimonial_designation">Networking Specalist</h6>
                                <p class="testimonial_description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Aliquid reprehenderit reiciendis itaque aspernatur.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="testimonal_item">
                            <div class="testimonial_image">
                                <img src="{{ asset('frontend/assets/img/mentor/mentor-2.png') }}" alt="" />
                            </div>
                            <div class="testimonial_content">
                                <h4 class="testimonial_name">Ridoy Hossin</h4>
                                <h6 class="testimonial_designation">Networking Specalist</h6>
                                <p class="testimonial_description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Aliquid reprehenderit reiciendis itaque aspernatur.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="testimonal_item">
                            <div class="testimonial_image">
                                <img src="{{ asset('frontend/assets/img/mentor/mentor-3.jpg') }}" alt="" />
                            </div>
                            <div class="testimonial_content">
                                <h4 class="testimonial_name">Ridoy Hossin</h4>
                                <h6 class="testimonial_designation">Networking Specalist</h6>
                                <p class="testimonial_description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Aliquid reprehenderit reiciendis itaque aspernatur.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="testimonal_item">
                            <div class="testimonial_image">
                                <img src="{{ asset('frontend/assets/img/mentor/mentor-4.jpg') }}" alt="" />
                            </div>
                            <div class="testimonial_content">
                                <h4 class="testimonial_name">Ridoy Hossin</h4>
                                <h6 class="testimonial_designation">Networking Specalist</h6>
                                <p class="testimonial_description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Aliquid reprehenderit reiciendis itaque aspernatur.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="testimonal_item">
                            <div class="testimonial_image">
                                <img src="{{ asset('frontend/assets/img/mentor/mentor-2.png') }}" alt="" />
                            </div>
                            <div class="testimonial_content">
                                <h4 class="testimonial_name">Ridoy Hossin</h4>
                                <h6 class="testimonial_designation">Networking Specalist</h6>
                                <p class="testimonial_description">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    Aliquid reprehenderit reiciendis itaque aspernatur.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial Section End  -->

        <!-- Add Bottom to top  -->
        <section class="back_to_top">
            <a id="back_to_top_btn"></a>
        </section>
        <!-- Add Bottom to top end -->


        <div class="modal_box">
            <div class="modal_content">
                <span class="close">&times;</span>
                <img src="{{ asset('frontend/assets/img/banner/modal.webp') }}" class="img-fluid rounded-top" alt="">
                <button class="btn btn-primary">Click Here</button>
            </div>
        </div>
    </main>

    <!-- footer start  -->
    <footer class="footer">
        <div class="container">
            <div class="main_footer">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
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
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="./Registation1.html">Registaion</a></li>
                            <li><a href="#">Contact Us</a></li>
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

            <div class="row" data-aos="fade-up" data-aos-duration="1000">
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
            //   'resizeDuration': 200,
            //   'wrapAround': true,
            alwaysShowNavOnTouchDevices: true,
            showImageNumberLabel: false,
        });


        AOS.init({
            once: true,
        });
    </script>
</body>

</html>
