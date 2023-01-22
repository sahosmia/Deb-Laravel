@extends('admin.layouts.admin')

@section('title', 'BLog Details')
@section('blogs_menu', 'active')
@section('genaral_content_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>BLog Details</h1>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Details BLog</h4>
                        </div>
                        <div class="card-body">

                                @include("admin.layouts.com.status")

                                <!-- Current Image  -->
                                <div class="form-group">
                                    <label>Current Image</label>
                                    <img class="d-block rounded w-25" src="{{ asset('upload/blog') }}/{{ $data->image }}" alt="{{ $data->image }}">
                                </div>

                                <!-- Title -->
                                <div class="form-group">
                                    <label>Title </label>
                                    <p>{{ $data->title }}</p>
                                </div>

                                <!-- Short Description -->
                                <div class="form-group">
                                    <label>Short Description </label>
                                    <p>{{ $data->short_description }}</p>
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label>Description </label>
                                    <p>{{ $data->description }}</p>
                                </div>


                                <!-- Added By  -->
                                <div class="form-group">
                                    <label>Added By</label>
                                    <p>{{ optional($data->user)->name }}</p>
                                </div>

                                <!-- Create Time  -->
                                <div class="form-group">
                                    <label>Create Time </label>
                                    <p>{{ getCreatedAT($data->created_at) }}</p>
                                </div>

                                <!-- Status  -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <p>{!! is_active($data->is_active) !!}</p>
                                </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
