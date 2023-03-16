@extends('admin.layouts.admin')

@section('title', 'Course Details')
@section('courses_menu', 'active')
@section('course_management_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Course Details</h1>
            <a href="{{ route('admin.courses.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Details Course</h4>
                        </div>
                        <div class="card-body">

                            @include('admin.layouts.com.status')

                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Current Image  -->
                                    <div class="form-group">
                                        <label>Current Image</label>
                                        <img class="d-block rounded w-25"
                                            src="{{ asset('upload/course/thumbnail') }}/{{ $data->image }}"
                                            alt="{{ $data->image }}">
                                    </div>

                                    <!-- Title -->
                                    <div class="form-group">
                                        <label>Title </label>
                                        <p>{{ $data->title }}</p>
                                    </div>

                                    <!-- Slug -->
                                    <div class="form-group">
                                        <label>Slug </label>
                                        <p>{{ $data->slug }}</p>
                                    </div>



                                    <!-- Description -->
                                    <div class="form-group">
                                        <label>Description </label>
                                        <p>{{ $data->description }}</p>
                                    </div>

                                    <!-- will Learn -->
                                    <div class="form-group">
                                        <label>What will we learn? </label>
                                        <p>{!! $data->will_learn !!}</p>
                                    </div>

                                    <!-- Requirement -->
                                    <div class="form-group">
                                        <label>Requirement </label>
                                        <p>{!! $data->requirement !!}</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Instructor  -->
                                    <div class="form-group">
                                        <label>Instructor</label>
                                        <p>{{ optional($data->instructor)->name }}</p>
                                    </div>

                                    <!-- Price -->
                                    <div class="form-group">
                                        <label>Price </label>
                                        <p>{{ $data->price }}</p>
                                    </div>

                                    <!-- Totall Enroll  -->
                                    <div class="form-group">
                                        <label>Total Enroll</label>
                                        <p>{{ count($data->coursePurchases) }}</p>
                                    </div>

                                    <!-- Create Time  -->
                                    <div class="form-group">
                                        <label>Create Time </label>
                                        <p>{{ getCreatedAT($data->created_at) }}</p>
                                    </div>



                                    <!-- Review  -->
                                    <div class="form-group">
                                        <label>Review</label>
                                        <div>
                                            <span
                                                class="fa fa-star {{ round(getAvarageReview($data->slug)) >= 1 ? 'checked' : '' }}"></span>
                                            <span
                                                class="fa fa-star {{ round(getAvarageReview($data->slug)) >= 2 ? 'checked' : '' }}"></span>
                                            <span
                                                class="fa fa-star {{ round(getAvarageReview($data->slug)) >= 3 ? 'checked' : '' }}"></span>
                                            <span
                                                class="fa fa-star {{ round(getAvarageReview($data->slug)) >= 4 ? 'checked' : '' }}"></span>
                                            <span
                                                class="fa fa-star {{ round(getAvarageReview($data->slug)) >= 5 ? 'checked' : '' }}"></span>
                                        </div>
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

            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 m-auto">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Course Cariculam</h4>
                            <a class="btn btn-primary" href="{{ route('admin.chapters.create', $data->id) }}"> New
                                Chapter</a>
                        </div>
                        <div class="card-body">

                            <div class="row">


                                <div class="col-md-6">
                                    <div class="accordion" id="accordionExample">

                                        @foreach ($data->course_chapter as $k => $chapter)
                                            <div class="card">
                                                <div class="card-header" id="heading{{ $k }}">
                                                    <h2 class="mb-0">
                                                        <button
                                                            class="btn btn-link btn-block text-left {{ $k != 0 ? 'collapsed' : '' }}"
                                                            type="button" data-toggle="collapse"
                                                            data-target="#collapse{{ $k }}"
                                                            aria-expanded="{{ $k == 0 ? 'true' : 'false' }}"
                                                            aria-controls="collapse{{ $k }}">
                                                            {{ $chapter->title }}
                                                        </button>

                                                    </h2>

                                                    <ul>
                                                        <li title="Add New Lesson"><a
                                                                href="{{ route('admin.lessons.create', $chapter->id) }}"><i
                                                                    class="fa-solid fa-plus"></i></a></li>
                                                        <li title="Edit Chapter"><a
                                                                href="{{ route('admin.chapters.edit', $chapter->id) }}"><i
                                                                    class="fa-solid fa-edit"></i></a></li>
                                                        <li title="Delete Chapter"><a
                                                                href="{{ route('admin.chapters.delete', $chapter->id) }}"><i
                                                                    class="fa-solid fa-trash"></i></a></li>
                                                    </ul>
                                                </div>

                                                <div id="collapse{{ $k }}"
                                                    class="collapse {{ $k == 0 ? 'show' : '' }}"
                                                    aria-labelledby="heading{{ $k }}"
                                                    data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <ul class="lesson">
                                                            @foreach ($chapter->courseLessons as $lesson)
                                                                <li class="lesson-item">
                                                                    <a href="{{ route('admin.courses.show.lesson', [$data->slug, $lesson->id]) }}"
                                                                        class="lesson-item-title"
                                                                        href="">{{ $lesson->title }}</a>

                                                                    <ul class="lesson-action">
                                                                        <li class="lesson-action-item" title="Edit Lesson">
                                                                            <a
                                                                                href="{{ route('admin.lessons.edit', $lesson->id) }}"><i
                                                                                    class="fa-solid fa-edit"></i></a>
                                                                        </li>
                                                                        <li class="lesson-action-item"
                                                                            title="Delete Lesson"><a
                                                                                href="{{ route('admin.lessons.delete', [$data->slug, $lesson->id]) }}"><i
                                                                                    class="fa-solid fa-trash"></i></a></li>
                                                                    </ul>

                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="file_pdf_video">
                                        @if (isset($lesson_data))

                                            @if ($lesson_data->file_type == 1)
                                                {!! $lesson_data->file_name !!}
                                            @endif

                                            @if ($lesson_data->file_type == 2)
                                                <a class="pdf_view_link" target="_blank"
                                                    href="https://drive.google.com/file/d/1Fpuh7l-tbWpGEG3wEC9KBkozXyoh76bv/view?usp=share_link">click</a>
                                            @endif

                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
