@extends('admin.layouts.admin')

@section('title', 'Lesson Edit')
@section('courses_menu', 'active')
@section('course_management_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Lesson Edit</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Lesson</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.lessons.update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- @method('PUT') --}}

                                @include('admin.layouts.com.status')

                                <!-- Title -->
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ old('title', $data->title) }}"
                                        class="form-control">
                                </div>

                                <!-- position -->
                                <div class="form-group">
                                    <label>Position <span class="text-danger">*</span></label>
                                    <input type="number" name="position" value="{{ old('position', $data->position) }}"
                                        class="form-control">
                                </div>







                                <!-- file -->
                                <div class="form-group">
                                    <label>File Link <span class="text-danger">*</span></label>
                                    <textarea name="file_name" class="form-control" rows="5">{{ old('file_name', $data->file_name) }}</textarea>
                                </div>

                                 <div class="form-group">
                                    <label>File Type <span class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="file_type" value="1" @checked(old('file_type', $data->file_type) == 1) id="flexRadioDefault1"
                                            >
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Video
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="file_type" value="2" @checked(old('file_type', $data->file_type) == 2) id="flexRadioDefault2"
                                            >
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Pdf
                                        </label>
                                    </div>
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
