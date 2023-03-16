@extends('auth.layouts.app')
@section('title', 'Register Page')

@section('content')



    <div class="form_side col-md-6">
        <div class="logo">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('upload/setting/logo') }}/{{ $settings->logo }}" alt="{{ $settings->logo }}">
            </a>
        </div>

        <h2>Register</h2>
        @include('auth.layouts.status')

        <form  method="POST" action="{{ route('registerSubmit') }}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input name="email" value="{{ old('email') }}" type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <div class="passwordDiv">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        id="exampleInputPassword1" value="{{ old('pasword') }}">
                    <span class="fa fa-eye"></span>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Conform Password</label>


                <div class="passwordDiv">
                    <input name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror"
                        id="exampleInputPassword1" value="{{ old('pasword') }}">
                    <span class="fa fa-eye"></span>
                </div>
            </div>
            <div class="row">

                <div class="form-check mb-3 col-md-6">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember" >Remember Me</label>
                </div>
                <div class="col-md-6">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot_link">Forget Password?</a>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn">Submit</button>

        </form>
        <span class="spanOr">Or Login With</span>
        <div class="social_link_item">
           <a href="{{ route('login.google') }}" class="social_link google_color"><i class="fa-brands fa-google"></i> Login with Google</a>
        </div>

        <p class="register_link">You have an account? <a href="{{ route('login') }}" class="color_primary">Login your account</a>
        </p>
    </div>

    <div class="content_side col-md-6">
        <h2 class="welcome">Welcome to Deb</h2>
        <div class="achive">
            <div class="login_about">
                <div class="login_about_content">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, eveniet porro adipisci
                        itaque perferendis, dolorem asperiores suscipit omnis magni dignissimos ex quo quasi
                        voluptatum nesciunt recusandae molestiae voluptatem perspiciatis odit.</p>
                </div>
                <div class="login_about_video d-flex justify-content-center">
                    <div class="video_box">
                        <div class="play_btn">
                            <i class="fa-solid fa-play"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="achive_item">
                <div class="row">
                    <div class="col-md-6">
                        <h2>What do you learn?</h2>
                        <ul>
                            <li><i class="fa-sharp fa-solid fa-arrow-right"></i>How can speak in english</li>
                            <li><i class="fa-sharp fa-solid fa-arrow-right"></i>Convertion with other pepole
                            </li>
                            <li><i class="fa-sharp fa-solid fa-arrow-right"></i>Solve your main problem</li>
                            <li><i class="fa-sharp fa-solid fa-arrow-right"></i>You get help for you career</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h2>What do you learn?</h2>
                        <ul>
                            <li><i class="fa-sharp fa-solid fa-arrow-right"></i>How can speak in english</li>
                            <li><i class="fa-sharp fa-solid fa-arrow-right"></i>Convertion with other pepole
                            </li>
                            <li><i class="fa-sharp fa-solid fa-arrow-right"></i>Solve your main problem</li>
                            <li><i class="fa-sharp fa-solid fa-arrow-right"></i>You get help for you career</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

