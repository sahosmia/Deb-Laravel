@extends('frontend.layouts.app')
@section('title', 'Blog')
@section('content')


    <!-- banner section start  -->
    <section class="page_banner registation_details_page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="page_banner_content">
                        <h2>Blog Page</h2>
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
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

            <div class="row" data-aos="fade-up" data-aos-duration="1000">
                @foreach ($blogs as $blog)
                <div class="col-md-4">
                    <div class="blog_item">
                        <img src="{{ asset('upload/blog') }}/{{ $blog->image }}" alt="{{ $blog->image }}">
                        <div class="blog_item_content">
                            <ul>
                                <li><i class="fa-solid fa-calendar-days"></i> {{ getCreatedAT($blog->created_at) }}</li>
                                <li><i class="fa-solid fa-comment"></i> {{ $blog->comments_count->count() }} Comment</li>
                            </ul>
                            <h4><a href="{{ route('front.blog.details', $blog->slug) }}">{{ $blog->title }}</a></h4>
                            <p>{{ $blog->short_description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>


        </div>
    </section>
    <!-- Blog Section End  -->

@endsection
