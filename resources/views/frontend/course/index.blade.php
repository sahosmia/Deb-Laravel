@extends('frontend.layouts.app')
@section('title', 'Course')
@section('course-menu', 'active')

@section('content')


    <!-- banner section start  -->
    <section class="page_banner registation_details_page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="page_banner_content">
                        <h2>Course</h2>
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Course</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Course Section Start  -->
    <section class="blog">
        <div class="container">

            <div class="row" data-aos="fade-up" data-aos-duration="1000">
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


        </div>
    </section>
    <!-- Course Section End  -->

@endsection
