@extends('frontend.layouts.app')
@section('title', $data->title)
@section('content')


    <!-- Blog Section Start  -->
    <section class="course-details">
        <div class="container">

            <div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-md-12 col-lg-8">
                    <div class="blog_details">
                        <img class="thumbnail" src="{{ asset('frontend/assets/img/gallary/2.jpg') }}"
                            alt="{{ $data->image }}">
                        <ul>
                            <li><i class="fa-solid fa-calendar-days"></i> {{ getCreatedAT($data->created_at) }}</li>
                            <li><i class="fa-solid fa-user"></i> {{ optional($data->user)->name }}</li>
                            <li>
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

                                {{ round(getAvarageReview($data->slug)) }}
                            </li>
                        </ul>
                        <h4>{{ $data->title }}</h4>
                        <p>{{ $data->short_description }}</p>
                        <p>{{ $data->description }}</p>
                    </div>


                    <form class="form-horizontal poststars" action="{{ route('front.course.review.store') }}"
                        id="addStar" method="POST">

                        @csrf
                        <input type="hidden" name="course_id" value="{{ $data->id }}">
                        <div class="form-group required">
                            <div class="col-sm-12">
                                <input class="star star-5" value="5" id="star-5" type="radio" name="rating" />
                                <label class="star star-5" for="star-5"><span class="fa fa-star"></span></label>
                                <input class="star star-4" value="4" id="star-4" type="radio" name="rating" />
                                <label class="star star-4" for="star-4"><span class="fa fa-star"></span></label>
                                <input class="star star-3" value="3" id="star-3" type="radio" name="rating" />
                                <label class="star star-3" for="star-3"><span class="fa fa-star"></span></label>
                                <input class="star star-2" value="2" id="star-2" type="radio" name="rating" />
                                <label class="star star-2" for="star-2"><span class="fa fa-star"></span></label>
                                <input class="star star-1" value="1" id="star-1" type="radio" name="rating" />
                                <label class="star star-1" for="star-1"><span class="fa fa-star"></span></label>
                            </div>
                        </div>

                        <textarea name="comment" id="" cols="30" rows="10"></textarea>
                        <button type="submit">Submit</button>
                    </form>

                    @if (count($data->courseReviews) > 0)
                        @foreach ($data->courseReviews as $review)
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < $review->rating)
                                    @if ($review->rating > 0.5)
                                        <span class="fa fa-star checked"></span>
                                    @else
                                        <span class="fa fa-star-half-stroke checked"></span>
                                    @endif
                                @else
                                    <span class="fa fa-star"></span>
                                @endif
                            @endfor

                            <h3>{{ $review->comment }}</h3>
                            <small>{{ getCreatedAt($review->created_at) }}</small>


                            <br>
                        @endforeach
                    @endif
                </div>
                <div class="col-md-6 col-lg-4 course-cariculam">

                    <div class="accordion" id="accordionExample">
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
                                                <li><a href="">{{ $lesson->title }}</a></li>
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
    <!-- Blog Section End  -->



@endsection
