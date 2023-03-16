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
                    {{-- Change Logo --}}
                    <div class="card">
                        <div class="card-header">
                            <h4>Logo</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.settings.logo.update') }}" method="POST" enctype="multipart/form-data">
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

                    {{-- Change Banner  --}}
                    <div class="card">
                        <div class="card-header">
                            <h4>Banner</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.settings.banner.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="banner_title" value="{{ $settings->banner_title }}" class="form-control">

                                <label>Description <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-3" name="banner_description" cols="30" rows="5">{{ $settings->banner_description }}</textarea>

                                <label>Button Text <span class="text-danger">*</span></label>
                                <input type="text" name="banner_btn_text" value="{{ $settings->banner_btn_text }}" class="form-control">

                                <label>Button Link <span class="text-danger">*</span></label>
                                <input type="text" name="banner_btn_link" value="{{ $settings->banner_btn_link }}" class="form-control">

                                <label>Active Status</label>
                                <select name="banner_is_active" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>


                                <label>Background Image</label>
                                <img class="d-block w-mx-150" src="{{ asset('upload/setting/banner') }}/{{ $settings->banner_background_image }}" alt="{{ $settings->banner_background_image }}">

                                <!-- Background  -->
                                <div class="form-group">
                                    <label>New Background Image </label>
                                    <input type="file" name="banner_background_image" value="{{ old('banner_background_image') }}" class="form-control-file" accept="image/*">
                                </div>

                                <button class="btn btn-primary mr-1" type="submit">Banner Update</button>
                            </form>
                        </div>
                    </div>

                    {{-- About --}}
                    <div class="card">
                        <div class="card-header">
                            <h4>About</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.settings.about.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <label>Heading Title <span class="text-danger">*</span></label>
                                <input type="text" name="about_heading_title" value="{{ $settings->about_heading_title }}" class="form-control">

                                <label>Heading Description <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-3" name="about_heading_description" cols="30" rows="5">{{ $settings->about_heading_description }}</textarea>

                                <label>First Passage Title <span class="text-danger">*</span></label>
                                <input type="text" name="about_first_passage_title" value="{{ $settings->about_first_passage_title }}" class="form-control">

                                <label>First Passage Description <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-3" name="about_first_passage_description" cols="30" rows="5">{{ $settings->about_first_passage_description }}</textarea>

                                <label>Second Passage Title <span class="text-danger">*</span></label>
                                <input type="text" name="about_second_passage_title" value="{{ $settings->about_second_passage_title }}" class="form-control">

                                <label>Second Passage Description <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-3" name="about_second_passage_description" cols="30" rows="5">{{ $settings->about_second_passage_description }}</textarea>

                                <label>Active Status</label>
                                <select name="about_is_active" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>

                                <label>About Home Image</label>
                                <img class="d-block w-mx-150" src="{{ asset('upload/setting/image') }}/{{ $settings->about_home_image }}" alt="{{ $settings->about_home_image }}">

                                <div class="form-group">
                                    <label>New About Home Image </label>
                                    <input type="file" name="about_home_image" value="{{ old('about_home_image') }}" class="form-control-file" accept="image/*">
                                </div>

                                <button class="btn btn-primary mr-1" type="submit">About Update</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6">
                    <!-- Contact _nformation -->
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

                                    <label>Messanger Code <span class="text-danger">*</span></label>
                                    <textarea class="form-control mb-3" name="messanger_code" cols="30" rows="5">{{ $settings->messanger_code }}</textarea>
                                </div>


                                <button class="btn btn-primary mr-1" type="submit">Update</button>
                            </form>
                        </div>
                    </div>

                    <!-- Notice -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Notice</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.settings.notice.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <label>Heading Title <span class="text-danger">*</span></label>
                                <input type="text" name="notice_heading_title" value="{{ $settings->notice_heading_title }}" class="form-control">

                                <label>Heading Description <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-3" name="notice_heading_description" cols="30" rows="5">{{ $settings->notice_heading_description }}</textarea>

                                <label>Active Status</label>
                                <select name="notice_is_active" class="form-control mb-3">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>

                                <button class="btn btn-primary mr-1" type="submit">Notice Update</button>
                            </form>
                        </div>
                    </div>

                    <!-- Blog -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Blog</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.settings.blog.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <label>Heading Title <span class="text-danger">*</span></label>
                                <input type="text" name="blog_heading_title" value="{{ $settings->blog_heading_title }}" class="form-control">

                                <label>Heading Description <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-3" name="blog_heading_description" cols="30" rows="5">{{ $settings->blog_heading_description }}</textarea>

                                <label>Active Status</label>
                                <select name="blog_is_active" class="form-control mb-3">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>

                                <button class="btn btn-primary mr-1" type="submit">Blog Update</button>
                            </form>
                        </div>
                    </div>

                    <!-- Team -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Team</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.settings.team.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <label>Heading Title <span class="text-danger">*</span></label>
                                <input type="text" name="team_heading_title" value="{{ $settings->team_heading_title }}" class="form-control">

                                <label>Heading Description <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-3" name="team_heading_description" cols="30" rows="5">{{ $settings->team_heading_description }}</textarea>

                                <label>Active Status</label>
                                <select name="team_is_active" class="form-control mb-3">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>

                                <button class="btn btn-primary mr-1" type="submit">Team Update</button>
                            </form>
                        </div>
                    </div>

                    <!-- Testimonial -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Testimonial</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.settings.testimonial.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <label>Heading Title <span class="text-danger">*</span></label>
                                <input type="text" name="testimonial_heading_title" value="{{ $settings->testimonial_heading_title }}" class="form-control">

                                <label>Heading Description <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-3" name="testimonial_heading_description" cols="30" rows="5">{{ $settings->testimonial_heading_description }}</textarea>

                                <label>Active Status</label>
                                <select name="testimonial_is_active" class="form-control mb-3">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>

                                <button class="btn btn-primary mr-1" type="submit">Testimonial Update</button>
                            </form>
                        </div>
                    </div>

                    <!-- Why Choose -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Why Choose</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.settings.why_choose.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <label>Heading Title <span class="text-danger">*</span></label>
                                <input type="text" name="why_choose_heading_title" value="{{ $settings->why_choose_heading_title }}" class="form-control">

                                <label>Heading Description <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-3" name="why_choose_heading_description" cols="30" rows="5">{{ $settings->why_choose_heading_description }}</textarea>

                                <label>Active Status</label>
                                <select name="why_choose_is_active" class="form-control mb-3">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>

                                <label>Why Choose Home Image</label>
                                <img class="d-block w-mx-150" src="{{ asset('upload/setting/image') }}/{{ $settings->why_choose_home_image }}" alt="{{ $settings->why_choose_home_image }}">

                                <div class="form-group">
                                    <label>New Why Choose Home Image </label>
                                    <input type="file" name="why_choose_home_image" value="{{ old('why_choose_home_image') }}" class="form-control-file" accept="image/*">
                                </div>

                                <button class="btn btn-primary mr-1" type="submit">Why Choose Update</button>
                            </form>
                        </div>
                    </div>

                    <!-- Question -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Question</h4>
                        </div>
                        <div class="card-body p-3">

                            <form action="{{ route('admin.settings.question.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <label>Heading Title <span class="text-danger">*</span></label>
                                <input type="text" name="question_heading_title" value="{{ $settings->question_heading_title }}" class="form-control">

                                <label>Heading Description <span class="text-danger">*</span></label>
                                <textarea class="form-control mb-3" name="question_heading_description" cols="30" rows="5">{{ $settings->question_heading_description }}</textarea>

                                <label>Active Status</label>
                                <select name="question_is_active" class="form-control mb-3">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>

                                <label>Question Home Image</label>
                                <img class="d-block w-mx-150" src="{{ asset('upload/setting/image') }}/{{ $settings->question_home_image }}" alt="{{ $settings->question_home_image }}">

                                <div class="form-group">
                                    <label>New Question Home Image </label>
                                    <input type="file" name="question_home_image" value="{{ old('question_home_image') }}" class="form-control-file" accept="image/*">
                                </div>

                                <button class="btn btn-primary mr-1" type="submit">Question Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>







@endsection
