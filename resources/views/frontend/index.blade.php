@extends('frontend.layouts.app')
@section('title', 'Home')
@section('home-menu', 'active')

@section('content')
    <!-- banner section start  -->
    @if ($settings->banner_is_active == 1)
        <section class="banner"
            style="background: url('{{ asset('upload/setting/banner') }}/{{ $settings->banner_background_image }}') no-repeat center; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8">
                        <div class="banner_content">
                            <h1>{{ $settings->banner_title }}</h1>
                            <p>{{ $settings->banner_description }}</p>

                            <a href="{{ $settings->banner_btn_link }}" class="button-red" role="button"><span
                                    class="text">{{ $settings->banner_btn_text }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif



    <!-- About US Section Start -->
    @if ($settings->about_is_active == 1)
        <section class="about_us" id="about_us">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="section_content" data-aos="zoom-in" data-aos-duration="4000">
                            <h3 class="section_heading">{{ $settings->about_heading_title }}</h3>
                            <p>{{ $settings->about_heading_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="about_us_content" data-aos="fade-up" data-aos-duration="1000">
                            <h5>{{ $settings->about_first_passage_title }}</h5>
                            <p>{{ $settings->about_first_passage_description }}</p>
                            <h5>{{ $settings->about_second_passage_title }}</h5>
                            <p>{{ $settings->about_second_passage_description }}</p>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="about_us_img" data-aos="fade-up" data-aos-duration="1000">
                            <img src="{{ asset('upload/setting/image') }}/{{ $settings->about_home_image }}"
                                alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- About US Section End -->

    <!-- Course Section Start  -->
    {{-- @if ($settings->notice_is_active == 1) --}}
    <section class="course">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="section_content" data-aos="zoom-in" data-aos-duration="1000">
                        <h3 class="section_heading">{{ $settings->notice_heading_title }}</h3>
                        <p>{{ $settings->notice_heading_description }}</p>
                    </div>
                </div>
            </div>

            <div class="row">



                @foreach ($courses as $course)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-courses-box">
                            <div class="courses-image"><a class="d-block image"
                                    href="{{ route('front.course.details', $course->slug) }}"><img
                                        src="{{ asset('upload/course/thumbnail') }}/{{ $course->image }}"
                                        alt="{{ $course->title }}"></a>


                            </div>
                            <div class="courses-content">
                                <ul class="courses-box-footer d-flex justify-content-between align-items-center">
                                    <li><i class="fa-solid fa-book-open"></i> {{ getLessonCount($course->course_chapter) }}
                                        Lessons
                                    </li>
                                    <li>

                                        <span
                                            class="fa fa-star {{ round(getAvarageReview($course->slug)) >= 1 ? 'checked' : '' }}"></span>
                                        <span
                                            class="fa fa-star {{ round(getAvarageReview($course->slug)) >= 2 ? 'checked' : '' }}"></span>
                                        <span
                                            class="fa fa-star {{ round(getAvarageReview($course->slug)) >= 3 ? 'checked' : '' }}"></span>
                                        <span
                                            class="fa fa-star {{ round(getAvarageReview($course->slug)) >= 4 ? 'checked' : '' }}"></span>
                                        <span
                                            class="fa fa-star {{ round(getAvarageReview($course->slug)) >= 5 ? 'checked' : '' }}"></span>

                                        {{-- <span class="fa fa-star-half-stroke {{ getAvarageReview($course->slug) % 1 != 0 ? 'checked' : '' }} checked"></span> --}}
                                    </li>
                                </ul>




                                <div class="course-author d-flex align-items-center">

                                    @if ($course->instructor->image != null)
                                        <img class="rounded-circle"
                                            src="{{ asset('upload/user') }}/{{ $course->instructor->image }}"
                                            alt="{{ $course->instructor->image }}">
                                    @else
                                        <img class="rounded-circle" src="{{ asset('default/profile.png') }}"
                                            alt="Profile Image">
                                    @endif

                                    <span>{{ $course->instructor->name }}</span>
                                </div>
                                <h3><a href="{{ route('front.course.details', $course->slug) }}">{{ $course->title }}</a>
                                </h3>
                                <p>{{ $course->description }}</p>




                                <ul class="pt-3 d-flex justify-content-between align-items-center">
                                    @auth
                                        @if (in_array(
                                                $course->id,
                                                auth()->user()->coursePurches->pluck('course_id')->toArray()))
                                            <li class="course-buy-btn"><a href="{{ route('front.profile.dashboard') }}">See
                                                    Your Dashboard</a></li>
                                        @else
                                            <li class="course-buy-btn"><a
                                                    href="{{ route('front.cart.store', $course->id) }}"><i
                                                        class="fas fa-shopping-cart"></i>Buy
                                                    Now</a></li>
                                        @endif
                                    @else
                                        <li class="course-buy-btn"><a href="{{ route('front.cart.store', $course->id) }}"><i
                                                    class="fas fa-shopping-cart"></i>Buy
                                                Now</a></li>
                                    @endauth


                                    <li class="course-price"><i
                                            class="fa-solid fa-bangladeshi-taka-sign"></i>{{ $course->price }} Tk
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-md-6 text-center m-auto">
                    <a href="{{ route('front.course.index') }}" class="button-red"><span class="text">See
                            All</span></a>
                </div>
            </div>
        </div>
    </section>
    {{-- @endif --}}
    <!-- Course Section End  -->

    <!-- Notice Section Start  -->
    @if ($settings->notice_is_active == 1)
        <section class="notice">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="section_content" data-aos="zoom-in" data-aos-duration="1000">
                            <h3 class="section_heading">{{ $settings->notice_heading_title }}</h3>
                            <p>{{ $settings->notice_heading_description }}</p>
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
                        <a href="{{ route('front.notice.index') }}" class="button-red"><span class="text">See
                                All</span></a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Notice Section End  -->

    <!-- Choose US Section Start -->
    @if ($settings->why_choose_is_active == 1)
        <section class="choose_us" id="choose_us">
            <div class="container">

                <div class="row d-flex align-items-center">
                    <div class="col-md-5">
                        <div class="choose_us_img" data-aos="fade-up" data-aos-duration="1000">
                            <img src="{{ asset('upload/setting/image') }}/{{ $settings->why_choose_home_image }}"
                                alt="" />
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="choose_us_content" data-aos="fade-up" data-aos-duration="1000">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="sub_title">{{ $settings->why_choose_heading_title }}</h4>
                                    <p class="sub_content">{{ $settings->why_choose_heading_description }}</p>
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
    @endif
    <!-- Choose US Section End -->


    <!-- Auto Counter Section Start  -->
    <section class="auto_counter">
        <div class="container">
            <div class="row full-counter" data-aos="fade-up" data-aos-duration="1000">
                {{-- <div class=""> --}}
                @foreach ($counters as $counter)
                    <div class="col-md-6 col-lg-3">
                        <div class="counter_item">
                            <h3 class="counter" data-count="{{ $counter->number }}">{{ $counter->number }}</h3>
                            <h5 class="">{{ $counter->title }}</h5>
                        </div>
                    </div>
                @endforeach

                {{-- </div> --}}
            </div>
        </div>
    </section>
    <!-- Auto Counter Section End  -->

    <!-- Question Section Start  -->
    @if ($settings->question_is_active == 1)
        <section class="question">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="section_content" data-aos="fade-up" data-aos-duration="1000">
                            <h3 class="section_heading">{{ $settings->question_heading_title }}</h3>
                            <p>{{ $settings->question_heading_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-12 col-lg-6">
                        <img class="w-75"
                            src="{{ asset('upload/setting/image') }}/{{ $settings->question_home_image }}"
                            alt="question" />
                    </div>
                    <div class="col-md-12 col-lg-6 align-items-center d-flex" data-aos="fade-up"
                        data-aos-duration="1000">
                        <div class="accordion" id="accordionExample">

                            @foreach ($questions as $k => $question)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $k }}">
                                        <button class="accordion-button {{ $k == 0 ? '' : 'collapsed' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $k }}"
                                            aria-expanded="{{ $k == 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $k }}">
                                            {{ $question->title }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $k }}"
                                        class="accordion-collapse collapse {{ $k == 0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $k }}" data-bs-parent="#accordionExample">
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
    @endif
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
    @if ($settings->team_is_active == 1)
        <section class="team">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-10 m-auto">
                        <div class="section_content">
                            <h3 class="section_heading">
                                {{ $settings->team_heading_title }}
                            </h3>
                            <p>{{ $settings->team_heading_description }}</p>
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
    @endif
    <!-- team Section End  -->

    <!-- registation_course Section Start  -->
    {{-- <section class="registation_course">
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
                        <a href="./registation_details.html" class=" .button-red"><span>Details</span></a>
                        <a href="{{ route('front.ragistation.index') }}" class=" .button-red"><span>Registaion Here</span></a>
                    </div>
                </div>
            </div>
        </section> --}}
    <!-- registation_course Section End  -->

    <!-- Testimonial Section Start  -->
    @if ($settings->testimonial_is_active == 1)
        <section class="testimonial">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-10 m-auto">
                        <div class="section_content">
                            <h3 class="section_heading sec_heading">
                                {{ $settings->testimonial_heading_title }}
                            </h3>

                            <p>{{ $settings->testimonial_heading_description }}</p>

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
    @endif
    <!-- Testimonial Section End  -->

    <!-- Blog Section Start  -->
    @if ($settings->blog_is_active == 1)
        <section class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="section_content" data-aos="zoom-in" data-aos-duration="1000">
                            <h3 class="section_heading">{{ $settings->blog_heading_title }}</h3>
                            <p>{{ $settings->blog_heading_description }}</p>
                        </div>
                    </div>
                </div>

                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    @foreach ($blogs as $blog)
                        <div class="col-md-4">
                            <div class="blog_item">
                                <img src="{{ asset('upload/blog') }}/{{ $blog->image }}" alt="{{ $blog->image }}">
                                <div class="blog_item_content">
                                    <ul>
                                        <li><i class="fa-solid fa-calendar-days"></i>
                                            {{ getCreatedAT($blog->created_at) }}</li>
                                        <li><i class="fa-solid fa-comment"></i> {{ $blog->comments_count->count() }}
                                            Comment</li>
                                    </ul>
                                    <h4><a
                                            href="{{ route('front.blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h4>
                                    <p>{{ $blog->short_description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


            </div>
        </section>
    @endif
    <!-- Blog Section End  -->


    {{-- <div class="modal_box">
        <div class="modal_content">
            <span class="close"><i class="fas fa-xmark"></i></span>
            <img src="{{ asset('frontend/assets/img/banner/bd_flag.jpg') }}" class="img-fluid rounded-top"
                alt="">
            <button class="btn btn-primary">Click Here</button>
        </div>
    </div> --}}

@endsection
