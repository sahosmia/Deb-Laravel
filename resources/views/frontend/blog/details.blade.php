@extends('frontend.layouts.app')
@section('title', $data->title)
@section('content')


        <!-- banner section start  -->
        <section class="page_banner registation_details_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="page_banner_content">
                            <h2>Blog Details Page</h2>
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                                aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Section Start  -->
        <section class="blog">
            <div class="container">

                <div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-12 col-lg-9">
                        <div class="blog_details">
                            <img class="thumbnail" src="{{ asset('upload/blog') }}/{{ $data->image }}" alt="{{ $data->image }}">
                            <ul>
                                <li><i class="fa-solid fa-eye"></i> 200 People</li>
                                <li><i class="fa-solid fa-heart"></i> 50 Love</li>
                                <li><i class="fa-solid fa-comment"></i> {{ $data->comments_count->count() }} Comment</li>
                                <li><i class="fa-solid fa-calendar-days"></i> {{ $data->created_at->format("d M, Y") }}</li>
                                <li><i class="fa-solid fa-user"></i> {{ optional($data->user)->name }}</li>
                            </ul>

                            <h4>{{ $data->title }}</h4>

                            <p>{{ $data->short_description }}</p>
                            <p>{{ $data->description }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="blog_sidebar">
                            <h6 class="subtitle">Populer Blog</h6>
                            <div class="small_item">
                                <div class="blog_img">
                                    <img src="./assets/img/blog/5.webp" alt="">
                                </div>
                                <div class="item_content">
                                    <h6><a href="#">Basic web design for beginer course</a></h6>

                                </div>
                            </div>
                            <div class="small_item">
                                <div class="blog_img">
                                    <img src="./assets/img/blog/5.webp" alt="">
                                </div>
                                <div class="item_content">
                                    <h6><a href="#">Basic web design for beginer course</a></h6>

                                </div>
                            </div>
                            <div class="small_item">
                                <div class="blog_img">
                                    <img src="./assets/img/blog/5.webp" alt="">
                                </div>
                                <div class="item_content">
                                    <h6><a href="#">Basic web design for beginer course</a></h6>

                                </div>
                            </div>
                        </div>

                        <div class="blog_sidebar">
                            <h6 class="subtitle">Latest Blog</h6>
                            @foreach ($latest_blogs as $latest_blog)


                            <div class="small_item">
                                <div class="blog_img">
                                    <img src="{{ asset('upload/blog') }}/{{ $latest_blog->image }}" alt="{{ $latest_blog->image }}">
                                </div>
                                <div class="item_content">
                                    <h6><a href="{{ route('frontend.blog.details', $latest_blog->slug) }}">{{ $latest_blog->title }}</a></h6>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Section End  -->

@endsection
