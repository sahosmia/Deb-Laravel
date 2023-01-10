@extends('admin.layouts.admin')

@section('title', 'Testimonial Details')
@section('testimonials_menu', 'active')
@section('genaral_content_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Testimonial Details</h1>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Details Testimonial</h4>
                        </div>
                        <div class="card-body">

                                @include("admin.layouts.com.status")

                                <!-- Current Image  -->
                                <div class="form-group">
                                    <label>Current Image</label>
                                    <img class="d-block rounded-circle" src="{{ asset('upload/testimonial') }}/{{ $data->image }}" alt="{{ $data->image }}">
                                </div>

                                <!-- Name -->
                                <div class="form-group">
                                    <label>Name </label>
                                    <p>{{ $data->name }}</p>
                                </div>

                                <!-- Designation -->
                                <div class="form-group">
                                    <label>Designation </label>
                                    <p>{{ $data->designation }}</p>
                                </div>

                                <!-- Company  -->
                                <div class="form-group">
                                    <label>Company</label>
                                    <p>{{ $data->company != null ? $data->company : "Empty" }}</p>
                                </div>

                                <!-- Feedback  -->
                                <div class="form-group">
                                    <label>Feedback </label>
                                    <p>{{ $data->feedback }}</p>
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
