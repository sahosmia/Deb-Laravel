@extends('frontend.layouts.app')
@section('title', $data->title)
@section('content')


    <!-- banner section start  -->
    <section class="page_banner registation_details_page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="page_banner_content">
                        <h2>Blog Details Page</h2>
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('front.blog.index') }}">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section Start  -->
    <section class="blog">
        <div class="container">

            <div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-md-12 col-lg-9">
                    <div class="blog_details">
                        <img class="thumbnail" src="{{ asset('upload/blog') }}/{{ $data->image }}"
                            alt="{{ $data->image }}">
                        <ul>
                            {{-- <li><i class="fa-solid fa-eye"></i> 200 People</li>
                            <li><i class="fa-solid fa-heart"></i> 50 Love</li> --}}
                            <li><i class="fa-solid fa-comment"></i> {{ $data->comments_count->count() }} Comment</li>
                            <li><i class="fa-solid fa-calendar-days"></i> {{ getCreatedAT($data->created_at) }}</li>
                            <li><i class="fa-solid fa-user"></i> {{ optional($data->user)->name }}</li>
                        </ul>

                        <h4>{{ $data->title }}</h4>

                        <p>{{ $data->short_description }}</p>
                        <p>{{ $data->description }}</p>
                    </div>

                    <div class="comments-form">
                        <div class="title">
                            <h4>Leave a comments</h4>
                        </div>
                        <form action="{{ route('front.blog.comment.store') }}" method="POST" class="contact-comments">
                            @csrf
                            <div class="row">

                                <input type="hidden" value="{{ $data->id }}" name="blog_id">
                                <div class="col-md-12">
                                    <div class="form-group comments">
                                        <!-- Comment -->
                                        <textarea name="body" class="form-control" placeholder="Comment"></textarea>
                                    </div>
                                    <div class="form-group full-width submit">
                                        <button type="submit">
                                            Comment
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="blog_comment pt-5">
                        <h4>Comment ({{ $data->comments_count->count() }})</h4>

                        @foreach ($data->comments as $comment)
                            <div class="media">
                                @if (optional($comment->commentUser)->image != null)
                                    <img src="{{ asset('upload/user') }}/{{ optional($comment->commentUser)->image }}"
                                        class="mr-3" alt="...">
                                @else
                                    <img src="{{ asset('default/profile.png') }}" class="mr-3" alt="...">
                                @endif

                                <div class="media-body">
                                    <h5 class="mt-0">{{ optional($comment->commentUser)->name }}
                                        <span>{{ getCreatedAT($comment->created_at) }}</span>
                                        {{-- <a class="reply-link"
                                            value="{{ $comment->id }}" href="javascript:;"><i
                                                class="fas fa-reply-all"></i>Reply</a> --}}
                                    </h5>
                                    {{ $comment->body }}

                                    @foreach ($comment->replies as $replay)
                                        <div class="media">
                                            <a class="mr-3" href="#">
                                                @if (optional($replay->commentUser)->image != null)
                                                    <img src="{{ asset('upload/user') }}/{{ optional($replay->commentUser)->image }}"
                                                        class="mr-3" alt="...">
                                                @else
                                                    <img src="{{ asset('default/profile.png') }}" class="mr-3"
                                                        alt="...">
                                                @endif
                                            </a>
                                            <div class="media-body">
                                                <h5 class="mt-0">{{ optional($replay->commentUser)->name }}
                                                    <span>{{ getCreatedAT($replay->created_at) }}</span>
                                                    {{-- <a
                                                        class="reply-link" href="javascript:;"
                                                        value="{{ $replay->id }}"><i
                                                            class="fas fa-reply-all"></i>Reply</a> --}}
                                                </h5>
                                                {{ $replay->body }}
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="blog_sidebar">
                        <h6 class="subtitle">Populer Blog</h6>

                        <div class="small_item">
                            <div class="blog_img">
                                {{-- <img src="./assets/img/blog/5.webp" alt=""> --}}
                            </div>
                            <div class="item_content">
                                <h6><a href="#">Basic web design for beginer course</a></h6>

                            </div>
                        </div>

                    </div>


                    <div class="blog_sidebar">
                        <h6 class="subtitle">Latest Blog</h6>
                        @foreach ($latest_blogs as $latest_blog)
                            <div class="small_item">
                                <div class="blog_img">
                                    <img src="{{ asset('upload/blog') }}/{{ $latest_blog->image }}"
                                        alt="{{ $latest_blog->image }}">
                                </div>
                                <div class="item_content">
                                    <h6><a
                                            href="{{ route('front.blog.details', $latest_blog->slug) }}">{{ $latest_blog->title }}</a>
                                    </h6>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- Blog Section End  -->

    {{-- <script>
        let replayBtn = document.querySelectorsAll('.reply-link');

        replayBtn.addEventListener("click", function(e){
            alert(e);
        })
    </script> --}}

@endsection
