@extends('landing.layouts.main')

@yield('content')

<section class="banner_area">
    <div class="box_1620">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Blog Details</h2>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="blog.html">Blog</a>
                        <a href="single-blog.html">Blog Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog_area single-post-area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">

                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset('landing/img/blog/feature-img1.jpg') }}"
                                alt="">
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2>{{ $post->judul }}</h2>
                        <p class="excert">
                            {{ $post->desc }}
                        </p>
                    </div>
                    {{-- <div class="col-lg-12">
                            <div class="quotes">
                                MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why
                                you should have to spend money on boot camp when you can get the MCSE study materials
                                yourself at a fraction of the camp price. However, who has the willpower to actually sit
                                through a self-imposed MCSE training.
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <img class="img-fluid" src="img/blog/post-img1.jpg" alt="">
                                </div>
                                <div class="col-6">
                                    <img class="img-fluid" src="img/blog/post-img2.jpg" alt="">
                                </div>
                                <div class="col-lg-12 mt-25">
                                    <p>
                                        MCSE boot camps have its supporters and its detractors. Some people do not
                                        understand why you should have to spend money on boot camp when you can get the
                                        MCSE
                                        study materials yourself at a fraction of the camp price. However, who has the
                                        willpower.
                                    </p>
                                    <p>
                                        MCSE boot camps have its supporters and its detractors. Some people do not
                                        understand why you should have to spend money on boot camp when you can get the
                                        MCSE
                                        study materials yourself at a fraction of the camp price. However, who has the
                                        willpower.
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                </div>

            </div>

        </div>
    </div>
</section>
