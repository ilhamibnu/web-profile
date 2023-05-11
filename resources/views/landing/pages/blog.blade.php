@extends('landing.layouts.main')

@yield('content')

<section class="home_banner_area">
    <div class="container box_1620">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @foreach ($post as $data)
                            <article class="row blog_item">
                                <div class="col-md-9">

                                    <div class="blog_post">
                                        <img src="{{ asset('landing/img/blog/main-blog/m-blog-1.jpg') }}" alt="">
                                        <div class="blog_details">
                                            <a href="/detail-blog/{{ $data->id }}">
                                                <h2>{{ $data->judul }}</h2>
                                            </a>
                                            <p>{{ $data->sub }}</p>
                                            <a href="/detail-blog/{{ $data->id }}" class="white_bg_btn">View
                                                More</a>
                                        </div>
                                    </div>

                                </div>
                            </article>
                        @endforeach
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">

                                {{ $post->links() }}

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    @foreach ($user as $userdata)
                    @endforeach
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="{{ asset('landing/img/blog/author.png') }}"
                                alt="">
                            <h4>{{ $userdata->name }}</h4>
                            <p>{{ $userdata->tag }}</p>
                            {{-- <div class="social_icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div> --}}
                            <p>{{ $userdata->desc }}</p>
                            <div class="br"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
