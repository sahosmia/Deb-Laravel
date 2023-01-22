@extends('admin.layouts.admin')

@section('title', 'Setting')
@section('settings_menu', 'active')
@section('genaral_content_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Setting</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @include("admin.layouts.com.status")
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Logo</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Logo</label>
                                <img class="d-block" style="max-height: 100px" src="{{ asset('upload/setting/logo') }}/{{ $settings->logo }}" alt="{{ $settings->logo }}">


                                <!-- Logo  -->
                                <div class="form-group">
                                    <label>New Logo <span class="text-danger">*</span></label>
                                    <input type="file" name="logo" value="{{ old('logo') }}" class="form-control-file" accept="image/*">
                                </div>


                                <button class="btn btn-primary mr-1" type="submit">Logo Update</button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Logo</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Logo</label>
                                <img class="d-block" style="max-height: 100px" src="{{ asset('upload/setting/logo') }}/{{ $settings->logo }}" alt="{{ $settings->logo }}">


                                <!-- Logo  -->
                                <div class="form-group">
                                    <label>New Logo <span class="text-danger">*</span></label>
                                    <input type="file" name="logo" value="{{ old('logo') }}" class="form-control-file" accept="image/*">
                                </div>


                                <button class="btn btn-primary mr-1" type="submit">Logo Update</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Contact Information</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.settings.contact.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Logo  -->
                                <div class="form-group">
                                    <label>Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="{{ $settings->phone }}" class="form-control">

                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" value="{{ $settings->email }}" class="form-control">

                                    <label>Facebook <span class="text-danger">*</span></label>
                                    <input type="text" name="facebook" value="{{ $settings->facebook }}" class="form-control">

                                    <label>Facebook Group<span class="text-danger">*</span></label>
                                    <input type="text" name="facebook_group" value="{{ $settings->facebook_group }}" class="form-control">

                                    <label>Linkedin <span class="text-danger">*</span></label>
                                    <input type="text" name="linkedin" value="{{ $settings->linkedin }}" class="form-control">

                                    <label>Whatsapp</label>
                                    <input type="text" name="whatsapp" value="{{ $settings->whatsapp }}" class="form-control">

                                    <label>Youtube</label>
                                    <input type="text" name="youtube" value="{{ $settings->youtube }}" class="form-control">
                                </div>


                                <button class="btn btn-primary mr-1" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Contact Information</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Logo  -->
                                <div class="form-group">
                                    <label>Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="{{ $settings->phone }}" class="form-control">

                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" value="{{ $settings->email }}" class="form-control">

                                    <label>Facebook <span class="text-danger">*</span></label>
                                    <input type="text" name="facebook" value="{{ $settings->facebook }}" class="form-control">

                                    <label>Facebook Group<span class="text-danger">*</span></label>
                                    <input type="text" name="facebook_group" value="{{ $settings->facebook_group }}" class="form-control">

                                    <label>Linkedin <span class="text-danger">*</span></label>
                                    <input type="text" name="linkedin" value="{{ $settings->linkedin }}" class="form-control">

                                    <label>Youtube</label>
                                    <input type="text" name="youtube" value="{{ $settings->youtube }}" class="form-control">
                                </div>


                                <button class="btn btn-primary mr-1" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>







@endsection
