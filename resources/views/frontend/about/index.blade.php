@extends('frontend.layouts.app')
@section('title', 'About Us')
@section('about-menu', 'active')

@section('content')


    <!-- banner section start  -->
    <section class="page_banner registation_details_page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="page_banner_content">
                        <h2>{{ $settings->about_heading_title }}</h2>
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </section>

      <section class="about_us" id="about_us">
            <div class="container">

                <div class="row d-flex align-items-center">
                    <div class="col-md-12 col-lg-6">
                        <div class="about_us_content">
                            <h5>{{ $settings->about_first_passage_title }}</h5>
                            <p>{{ $settings->about_first_passage_description }}</p>
                            <h5>{{ $settings->about_second_passage_title }}</h5>
                            <p>{{ $settings->about_second_passage_description }}</p>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="about_us_img">
                            <img src="{{ asset('upload/setting/image') }}/{{ $settings->about_home_image }}"
                                alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
