@extends('frontend.layouts.app')
@section('title', 'Notice')
@section('content')


    <!-- banner section start  -->
    <section class="page_banner registation_details_page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="page_banner_content">
                        <h2>{{ $settings->notice_heading_title }}</h2>
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Notice</li>
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

            <div class="row">
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


        </div>
    </section>
    <!-- Blog Section End  -->

@endsection
