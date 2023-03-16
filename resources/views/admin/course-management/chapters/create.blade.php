@extends('admin.layouts.admin')

@section('title', 'Chapter Create')
@section('courses_menu', 'active')
@section('course_management_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Chapter Create</h1>
            <a href="{{ route('admin.courses.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>New Chapter</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.chapters.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @include("admin.layouts.com.status")

                                <input type="hidden" name="course_id" value="{{ $course_id }}" class="form-control">

                                <!-- Title -->
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                </div>

                                <!-- position -->
                                <div class="form-group">
                                    <label>Position <span class="text-danger">*</span></label>
                                    <input type="number" name="position" value="{{ old('position') }}" class="form-control">
                                </div>

                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
