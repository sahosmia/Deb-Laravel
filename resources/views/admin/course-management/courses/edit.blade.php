@extends('admin.layouts.admin')

@section('title', 'Course Edit')
@section('courses_menu', 'active')
@section('course_management_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Course Edit</h1>
            <a href="{{ route('admin.courses.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Course</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.courses.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @include("admin.layouts.com.status")

                                <!-- Name -->
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ old('title', $data->title) }}" class="form-control">
                                </div>

                                <!-- Slug -->
                                <div class="form-group">
                                    <label>Slug <span class="text-danger">*</span></label>
                                    <input type="text" name="slug" value="{{ old('slug', $data->slug) }}" class="form-control">
                                </div>

                                <!-- Price -->
                                <div class="form-group">
                                    <label>Price <span class="text-danger">*</span></label>
                                    <input type="number" min="0" name="price" value="{{ old('price', $data->price) }}"
                                        class="form-control">
                                </div>


                                <!-- instructor  -->
                                <div class="form-group">
                                    <label>Instructor <span class="text-danger">*</span></label>
                                    <select class="form-control" name="instructor_id">
                                        @foreach ($instructors as $instructor)
                                            <option @selected($instructor->id == old('instructor_id',$data->instructor_id)) value="{{ $instructor->id }}">
                                                {{ $instructor->name }}</option>
                                        @endforeach

                                    </select>
                                </div>


                                <!-- Description  -->
                                <div class="form-group">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="5">{{ old('description', $data->description) }}</textarea>
                                </div>

                                <!-- will learn  -->
                                <div class="form-group">
                                    <label>What will learn? <span class="text-danger">*</span></label>
                                    <textarea name="will_learn" class="form-control ck_editor_will_learn" rows="10">{{ old('will_learn', $data->will_learn) }}</textarea>
                                </div>

                                <!-- requirement  -->
                                <div class="form-group">
                                    <label>Requirement <span class="text-danger">*</span></label>
                                    <textarea name="requirement" class="form-control ck_editor_requirement" rows="10">{{ old('requirement', $data->requirement) }}</textarea>
                                </div>

                                <!-- Skill Level  -->
                                <div class="form-group">
                                    <label>Skill Level <span class="text-danger">*</span></label>
                                    <select class="form-control" name="skill_level">
                                        <option @selected(old('skill_level', $data->is_active) == 1) value="1">Beginar</option>
                                        <option @selected(old('skill_level', $data->is_active) == 2) value="2">Intermediate</option>
                                        <option @selected(old('skill_level', $data->is_active) == 3) value="3">Advance</option>
                                    </select>
                                </div>


                                <!-- Is Active  -->
                                <div class="form-group">
                                    <label>Publish</label>
                                    <select class="form-control" name="is_active">
                                        <option @selected(old('is_active', $data->is_active) == 1) value="1">Active</option>
                                        <option @selected(old('is_active', $data->is_active) == 0) value="0">In Active</option>
                                    </select>
                                </div>

                                <!-- Current Image  -->
                                 <div class="form-group">
                                    <label>Current Image</label>
                                    <img class="d-block rounded w-25" src="{{ asset('upload/course/thumbnail') }}/{{ $data->image }}" alt="{{ $data->image }}">
                                </div>

                                <!-- Image  -->
                                <div class="form-group">
                                    <label>Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" value="{{ old('image') }}"
                                        class="form-control-file" accept="image/*">
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

@section('exta_js')
    <script>
        ClassicEditor
            .create(document.querySelector('.ck_editor_will_learn'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('.ck_editor_requirement'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
