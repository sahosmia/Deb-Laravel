@extends('frontend.layouts.app')
@section('content')


        <!-- banner section start  -->
        <section class="page_banner registation_details_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="page_banner_content">
                            <h2>Profile Page</h2>
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                                aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- Profile Section Start -->
        <section class="profile_page">
            <div class="container">

                <div class="row">
                    <div class="col-md-4">
                        <div class="profile_image_card" data-aos="fade-up-right" data-aos-duration="1000">
                            <div class="profile_image_card_top">
                                <img src="./assets/img/team/team-1.png" alt="">
                                <h6>{{ auth()->user()->name }}</h6>
                            </div>
                            <div class="profile_image_card_bottom">
                                <ul>
                                    <li><span>Role : </span>{{ auth()->user()->role->name }}</li>
                                    <li><span>Batch : </span>{{ auth()->user()->information->batch->title }}</li>
                                    <li><span>Join Date : </span>{{ auth()->user()->created_at->format("d M, Y")}}</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="profile_information_card" data-aos="fade-up-left" data-aos-duration="1000">
                            <h5 class="sub_title">Genarel Information</h5>
                            <ul>
                                <li><span>Name : </span>{{ auth()->user()->name }}</li>
                                <li><span>Email : </span>{{ auth()->user()->email }}</li>
                                <li><span>Age : </span>{{ getBirthYear(auth()->user()->information->date_of_birth) }}</li>
                            </ul>
                        </div>

                        <div class="profile_information_card" data-aos="fade-up-left" data-aos-duration="1000">
                            <h5 class="sub_title">Contact Information</h5>
                            <ul>
                                <li><span>Phone : </span>{{ auth()->user()->information->phone }}</li>
                                <li><span>Whatsapp : </span>{{ auth()->user()->information->whatsapp }}</li>
                                <li><span>Address : </span>{{ auth()->user()->information->address }}</li>
                                <li><span>Social :</span>
                                    <ul class="profile_social">
                                        <li><a href="{{ auth()->user()->information->facebook_link }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="{{ auth()->user()->information->linkedin_link }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About US Section End -->

@endsection
