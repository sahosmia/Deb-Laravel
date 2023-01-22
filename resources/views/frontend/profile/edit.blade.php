@extends('frontend.layouts.app')
@section('title', 'Profie Edit')

@section('content')


    <!-- banner section start  -->
    <section class="page_banner registation_details_page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="page_banner_content">
                        <h2>Profile Edit</h2>
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('front.profile.index') }}">Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>








    <section class="profile_page">
        <div class="container">

            <div class="row">

                <div class="col-md-8">

                    @include('auth.layouts.status')
                    <div class="profile_information_card">

                        <h5 class="sub_title">Genarel Information</h5>
                        <form action="{{ route('front.profile.update.genarel') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Current Profile Image</label>


                                @if (auth()->user()->image != null)
                                    <img class="profile_image_update"
                                        src="{{ asset('upload/user') }}/{{ auth()->user()->image }}"
                                        alt="{{ auth()->user()->image }}">
                                @else
                                    <img class="profile_image_update" src="{{ asset('default/profile.png') }}"
                                        alt="Profile Image">
                                @endif
                            </div>

                            <!-- Profile Image  -->
                            <div class="mb-3">
                                <label for="exampleInputImage" class="form-label">New Image</label>
                                <input name="image" type="file" class="form-control" id="exampleInputImage">
                            </div>

                            <!-- Name  -->
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Name</label>
                                <input value="{{ auth()->user()->name }}" name="name" type="text" class="form-control"
                                    id="exampleInputName">
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Email Address</label>
                                <input name="email" value="{{ auth()->user()->email }}" type="text"
                                    class="form-control" id="exampleInputName">
                            </div>



                            <button type="submit" class="btn text-white bg_green">Update</button>
                        </form>
                    </div>


                    <div class="profile_information_card">

                        <h5 class="sub_title">Other Information</h5>
                        <form action="{{ route('front.profile.update.other') }}" method="post">

                            @csrf
                            <!-- Gender -->
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Gender</label>
                                <select class="form-select" name="gender">
                                    <option value="">Select</option>
                                    <option value="1"
                                        {{ auth()->user()->information->gender == 1 ? 'selected' : '' }}>
                                        Male</option>
                                    <option value="2"
                                        {{ auth()->user()->information->gender == 2 ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <!-- Birth Date  -->
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Birth Date</label>
                                <input value="{{ date('Y-m-d', strtotime(auth()->user()->information->date_of_birth)) }}"
                                    name="date_of_birth" type="date" class="form-control" id="exampleInputName">
                            </div>

                            <!-- Blood Group -->
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Blood Group</label>
                                <select class="form-select" name="blood">
                                    <option value="">Select</option>
                                    <option value="1" {{ auth()->user()->information->blood == 1 ? 'selected' : '' }}>A +</option>
                                    <option value="2" {{ auth()->user()->information->blood == 2 ? 'selected' : '' }}>B +</option>
                                    <option value="3" {{ auth()->user()->information->blood == 3 ? 'selected' : '' }}>O +</option>
                                    <option value="4" {{ auth()->user()->information->blood == 4 ? 'selected' : '' }}>AB +</option>
                                    <option value="5" {{ auth()->user()->information->blood == 5 ? 'selected' : '' }}>A -</option>
                                    <option value="6" {{ auth()->user()->information->blood == 6 ? 'selected' : '' }}>B -</option>
                                    <option value="7" {{ auth()->user()->information->blood == 7 ? 'selected' : '' }}>O -</option>
                                    <option value="8" {{ auth()->user()->information->blood == 8 ? 'selected' : '' }}>AB -</option>
                                </select>
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label for="exampleInputAddress" class="form-label">Profession</label>
                                <input value="{{ auth()->user()->information->profession }}" name="profession"
                                    type="text" class="form-control" id="exampleInputAddress">
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label for="exampleInputAddress" class="form-label">Address</label>
                                <input value="{{ auth()->user()->information->address }}" name="address" type="text"
                                    class="form-control" id="exampleInputAddress">
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Phone</label>
                                <input value="{{ auth()->user()->information->phone }}" name="phone" type="text"
                                    class="form-control" id="exampleInputName">
                            </div>

                            <!-- Whatsapp Number -->
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Whatsapp Number</label>
                                <input value="{{ auth()->user()->information->whatsapp }}" name="whatsapp"
                                    type="text" class="form-control" id="exampleInputName">
                            </div>

                            <!-- Facebook -->
                            <div class="mb-3">
                                <label for="exampleInputFacebook" class="form-label">Facebook</label>
                                <input value="{{ auth()->user()->information->facebook }}" name="facebook"
                                    type="text" class="form-control" id="exampleInputFacebook">
                            </div>

                            <!-- Linkedin -->
                            <div class="mb-3">
                                <label for="exampleInputLinkedin" class="form-label">Linkedin</label>
                                <input value="{{ auth()->user()->information->linkedin }}" name="linkedin"
                                    type="text" class="form-control" id="exampleInputLinkedin">
                            </div>

                            <!-- Drive -->
                            <div class="mb-3">
                                <label for="exampleInputLinkedin" class="form-label">Drive</label>
                                <input value="{{ auth()->user()->information->drive }}" name="drive" type="text"
                                    class="form-control" id="exampleInputLinkedin">
                            </div>

                            <button type="submit" class="btn text-white bg_green">Submit</button>

                        </form>
                    </div>



                    <div class="profile_information_card">

                        <h5 class="sub_title">Password Update</h5>
                        <form action="{{ route('front.profile.update.password') }}" method="post">

                            @csrf
                            <!-- Current Password -->
                            <div class="mb-3">
                                <label for="exampleInputAddress" class="form-label">Current Password</label>
                                <input name="current_password" type="password" class="form-control"
                                    id="exampleInputAddress">
                            </div>

                            <!-- New Password -->
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">New Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputName">
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Password Confirmation</label>
                                <input name="password_confirmation" type="password" class="form-control"
                                    id="exampleInputName">
                            </div>

                            <button type="submit" class="btn text-white bg_green">Update</button>

                        </form>
                    </div>

                </div>


            </div>
        </div>
    </section>






@endsection
