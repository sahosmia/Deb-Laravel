@extends('frontend.layouts.app')
@section('title', 'Gallery')
@section('gallary-menu', 'active')
@section('content')


    <!-- banner section start  -->
    <section class="page_banner registation_details_page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="page_banner_content">
                        <h2>Gallery</h2>
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Blog Section Start  -->
    <section class="gallery my-5">
        <div class="container-fluid">
            <div class="row">
                @foreach ($galleries as $gallery)
                    <div class="col-md-3 col-sm-6 gallery_item">
                        <img src="{{ asset('upload/gallery') }}/{{ $gallery->image }}"
                            alt="{{ $gallery->image }}">
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
    <!-- Blog Section End  -->

@endsection
