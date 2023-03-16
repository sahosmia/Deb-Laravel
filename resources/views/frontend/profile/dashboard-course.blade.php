@extends('frontend.layouts.app')
@section('title', 'Dashborad')

@section('content')


    <!-- banner section start  -->
    <section class="page_banner registation_details_page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="page_banner_content">
                        <h2>{{ $data->title }}</h2>
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Profile Section Start -->
    <section class="profile_page">
        <div class="container">

            <div class="row">


                <div class="col-md-8">
                    @if (isset($lesson_data))
                        @if ($lesson_data->file_type == 1)
                           {!! $lesson_data->file_name !!}
                        @endif

                        @if ($lesson_data->file_type == 2)


                                <a class="pdf_view_link" target="_blank" href="{{ $lesson_data->file_name }}">click here</a>
                        @endif
                        <h3>{{ $lesson_data->title }}</h3>
                    @endif
                </div>


                <div class="col-md-4 course-cariculam">
                    <div class="accordion course-accordion" id="accordionExample">
                        @foreach ($data->course_chapter as $k => $chapter)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $k }}">
                                    <button class="accordion-button {{ $k != 0 ? 'collapsed' : '' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $k }}"
                                        aria-expanded="{{ $k == 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $k }}">
                                        {{ $chapter->title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $k }}"
                                    class="accordion-collapse collapse {{ $k == 0 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $k }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach ($chapter->courseLessons as $lesson)
                                                <li><a class="{{ $lesson_data->id == $lesson->id ? "text-danger" : "" }}" href="{{ route('front.profile.dashboard.course', [$data->slug,$lesson->id]) }}">{{ $lesson->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- About US Section End -->

@endsection
