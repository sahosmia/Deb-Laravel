@extends('frontend.layouts.app')
@section('title', $data->title)
@section('course-menu', 'active')

@section('content')


    <!-- Blog Section Start  -->
    <section class="course-details">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-12 col-lg-8">
                    <div class="course_details">
                        <img class="thumbnail" src="{{ asset('upload/course/thumbnail') }}/{{ $data->image }}"
                            alt="{{ $data->image }}">
                        <ul class="course_top_ul">
                            <li><i class="fa-solid fa-calendar-days"></i> {{ getCreatedAT($data->created_at) }}</li>
                            <li><i class="fa-solid fa-user"></i> {{ optional($data->instructor)->name }}</li>

                        </ul>
                        <h4 class="title">{{ $data->title }}</h4>
                        <div class="course-content">
                            <h4 class="course-subtitle">Description</h4>
                            <p>{{ $data->description }}</p>
                        </div>

                        <div class="course-content">
                            <h4 class="course-subtitle">What will you learn?</h4>
                            {!! $data->will_learn !!}
                        </div>


                        <div class="course-content">
                            <h4 class="course-subtitle">Requirement</h4>
                            {!! $data->requirement !!}
                        </div>

                        <div class="course-content">

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr class="">
                                            <td>Skill Level</td>
                                            <td>{{ getSkillLevel($data->skill_level) }}</td>
                                        </tr>
                                        <tr class="">
                                            <td>Lesson</td>
                                            <td>{{ getLessonCount($data->course_chapter) }}</td>
                                        </tr>

                                        <tr class="">
                                            <td>Enroll</td>
                                            <td>{{ $data->coursePurchases->count() }}</td>
                                        </tr>

                                        <tr class="">
                                            <td>Created At </td>
                                            <td>{{ getCreatedAT($data->created_at) }}</td>
                                        </tr>

                                        <tr class="">
                                            <td>Price </td>
                                            <td>{{ $data->price }} Tk</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>




                    </div>






                </div>

                <div class="col-md-6 col-lg-4 course-cariculam">

                    <ul class=" pb-3 d-flex justify-content-between align-items-center">
                        @auth
                                        @if (in_array(
                                                $data->id,
                                                auth()->user()->coursePurches->pluck('course_id')->toArray()))
                                            <li class="course-buy-btn"><a href="{{ route('front.profile.dashboard') }}">See
                                                    Your Dashboard</a></li>
                                        @else
                                            <li class="course-buy-btn"><a
                                                    href="{{ route('front.cart.store', $data->id) }}"><i
                                                        class="fas fa-shopping-cart"></i>Buy
                                                    Now</a></li>
                                        @endif
                                    @else
                                        <li class="course-buy-btn"><a href="{{ route('front.cart.store', $data->id) }}"><i
                                                    class="fas fa-shopping-cart"></i>Buy
                                                Now</a></li>
                                    @endauth
                        <li class="course-price"><i class="fa-solid fa-bangladeshi-taka-sign"></i>{{ $data->price }} Tk
                        </li>
                    </ul>
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

            <div class="row">
                <div class="col-lg-8 col-md-12">

                    <div class="reviews-section">
                        <div class="d-flex justify-content-between">
                            <h3 class="fs-24">Total Review ({{ $data->courseReviews->count() }})</h3>
                            <ul>
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
                                </li>
                            </ul>
                        </div>
                        <hr>

                        @auth


                            @if (in_array(
                                    $data->id,
                                    auth()->user()->coursePurches->pluck('course_id')->toArray()))
                                <form class="form-horizontal poststars" action="{{ route('front.course.review.store') }}"
                                    id="addStar" method="POST">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $data->id }}">
                                    <label class="title-label" for="">Your Rating <span
                                            class="mandatory">*</span></label>
                                    <div class="form-group review-star required d-flex">
                                        <div class="">
                                            <input class="star star-5" value="5" id="star-5" type="radio"
                                                name="rating" />
                                            <label class="star star-5" for="star-5"><span class="fa fa-star"></span></label>
                                            <input class="star star-4" value="4" id="star-4" type="radio"
                                                name="rating" />
                                            <label class="star star-4" for="star-4"><span class="fa fa-star"></span></label>
                                            <input class="star star-3" value="3" id="star-3" type="radio"
                                                name="rating" />
                                            <label class="star star-3" for="star-3"><span class="fa fa-star"></span></label>
                                            <input class="star star-2" value="2" id="star-2" type="radio"
                                                name="rating" />
                                            <label class="star star-2" for="star-2"><span
                                                    class="fa fa-star"></span></label>
                                            <input class="star star-1" value="1" id="star-1" type="radio"
                                                name="rating" />
                                            <label class="star star-1" for="star-1"><span
                                                    class="fa fa-star"></span></label>
                                        </div>
                                    </div>

                                    <label class="title-label" for="">Your Review <span
                                            class="mandatory">*</span></label>
                                    <textarea name="comment" id="" cols="30" rows="5"></textarea>
                                    <button class="button-red" type="submit">Submit</button>
                                </form>
                            @else
                                <span class="text-danger">Please enroll this course If you want to add review.</span>
                            @endif

                        @endauth
                        @guest
                            <span class="text-danger">Please login and enroll this course If you want to add review.</span>
                        @endguest




                        <div class="review">
                            @if (count($data->courseReviews) > 0)
                                @foreach ($data->courseReviews as $review)
                                    <div class="d-flex ">
                                        <div class="media">
                                            @if (optional($review->user)->image != null)
                                                <img src="{{ asset('upload/user') }}/{{ optional($review->user)->image }}"
                                                    class="mr-3" alt="...">
                                            @else
                                                <img src="{{ asset('default/profile.png') }}" class="mr-3"
                                                    alt="...">
                                            @endif
                                        </div>
                                        <div class="review-body">

                                            <div class="d-flex">
                                                <h3>{{ $review->user->name }}</h3>
                                                <small>{{ getCreatedAt($review->created_at) }}</small>
                                            </div>
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

                                            <p>{{ $review->comment }}</p>



                                            <br>

                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>


                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- Blog Section End  -->



@endsection
