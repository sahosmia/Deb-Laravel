@extends('frontend.layouts.app')
@section('title', 'Contact')
@section('content')


    <!-- banner section start  -->
    <section class="page_banner registation_details_page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="page_banner_content">
                        <h2>Contact Us</h2>
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section Start  -->
    <section class="contact">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8">
                    <div class="contact-message">
                        <h4> Get in touch</h4>

                        <form action="{{ route('front.contact.message.store') }}" method="post">

                            @csrf
                            @include('auth.layouts.status')
                            <!-- Name  -->
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Name</label>
                                <input value="{{ old('name') }}" name="name" type="text" class="form-control"
                                    id="exampleInputName">
                            </div>

                            <!-- Email  -->
                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Email</label>
                                <input value="{{ old('email') }}" name="email" type="text" class="form-control"
                                    id="exampleInputEmail">
                            </div>

                            <!-- Message  -->
                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Message</label>
                                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="8">{{ old('message') }}</textarea>
                            </div>

                            <button type="submit" class="btn text-white bg_green">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-list">
                        <h4>Contact Information</h4>

                        <div class="contact_information_item">
                            <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>

                            <div class="text">
                                <span>Email Us</span>
                                <h5>{{ $settings->email }}</h5>
                            </div>
                        </div>
                        <div class="contact_information_item">
                            <div class="icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>

                            <div class="text">
                                <span>Phone</span>
                                <h5>{{ $settings->phone }}</h5>
                            </div>
                        </div>

                    </div>

                    <div class="contact-list">
                        <h4>Social Information</h4>

                        <div class="contact_information_item">
                            <div class="icon">
                                <i class="fa-brands fa-square-facebook"></i>
                            </div>

                            <div class="text">
                                <a target="_blank" href="{{ $settings->facebook }}"><span>Facebook Page</span></a>
                            </div>
                        </div>
                        <div class="contact_information_item">
                            <div class="icon">
                                <i class="fa-solid fa-user"></i>
                            </div>

                            <div class="text">
                                <a target="_blank" href="{{ $settings->facebook_group }}"><span>Facebook Group</span></a>
                            </div>
                        </div>

                        <div class="contact_information_item">
                            <div class="icon">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </div>

                            <div class="text">
                                <a target="_blank" href="{{ $settings->linkedin }}"><span>Linkedin</span></a>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>

        <ul class="contact-shape-group-1 list-unstyled">
            {{-- <li class="shape shape-1"><img src="./assets/img/shap/as.png" alt="bubble"></li>
            <li class="shape shape-2"><img src="./assets/img/shap/line-1.png" alt="bubble"></li>
            <li class="shape shape-3"><img src="./assets/img/shap/r.png" alt="bubble"></li>
            <li class="shape shape-4"><img src="./assets/img/shap/line-2.png" alt="bubble"></li>
            <li class="shape shape-5"><img src="./assets/img/shap/bubole-1.png" alt="bubble"></li>
            <li class="shape shape-6"><img src="./assets/img/shap/buble-2.png" alt="bubble"></li> --}}
        </ul>
    </section>
    <!-- Blog Section End  -->

@endsection
