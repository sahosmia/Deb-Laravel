@extends('frontend.layouts.app')
@section('title', 'Profie')

@section('content')


        <!-- banner section start  -->
        <section class="page_banner registation_details_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="page_banner_content">
                            <h2>Profile</h2>
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                                aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
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
                                @if (auth()->user()->image != null)
                                <img src="{{ asset('upload/user') }}/{{ auth()->user()->image }}" alt="{{ auth()->user()->image }}">
                                @else
                                <img src="{{ asset('default/profile.png') }}" alt="Profile Image">
                                @endif
                                <h6>{{ auth()->user()->name }}</h6>
                            </div>
                            <div class="profile_image_card_bottom">
                                <ul>
                                    <li><span>Join Date : </span>{{ auth()->user()->created_at->format("d M, Y")}}</li>


                                </ul>

                                <ul class="profile_social">
                                        @if (auth()->user()->information->facebook != null)
                                        <li><a href="{{ auth()->user()->information->facebook }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        @endif

                                        @if (auth()->user()->information->linkedin != null)
                                        <li><a href="{{ auth()->user()->information->linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                        @endif

                                        @if (auth()->user()->information->drive != null)
                                        <li><a href="{{ auth()->user()->information->drive }}"><i class="fab fa-google-drive"></i></a></li>
                                        @endif
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
                                @if (auth()->user()->information->date_of_birth != null)
                                    <li><span>Age : </span>{{ getBirthYear(auth()->user()->information->date_of_birth) }}</li>
                                @endif

                                @if (auth()->user()->information->gender != null)
                                    <li><span>Gender : </span>{{ getGender(auth()->user()->information->gender) }}</li>
                                @endif

                                @if (auth()->user()->information->blood != null)
                                    <li><span>Blood : </span>{{ getBlood(auth()->user()->information->blood) }}</li>
                                @endif
                                @if (auth()->user()->information->profession != null)
                                    <li><span>Profession : </span>{{ auth()->user()->information->profession }}</li>
                                @endif

                                 @if (auth()->user()->information->phone != null)
                                <li><span>Phone : </span>{{ auth()->user()->information->phone }}</li>
                                @endif

                                @if (auth()->user()->information->whatsapp != null)
                                <li><span>Whatsapp : </span>{{ auth()->user()->information->whatsapp }}</li>
                                @endif

                                @if (auth()->user()->information->address != null)
                                <li><span>Address : </span>{{ auth()->user()->information->address }}</li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- About US Section End -->

@endsection
