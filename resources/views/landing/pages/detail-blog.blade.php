@extends('landing.layouts.main')

@section('title')
    Detail Blog | {{ $post->judul }}
@endsection

@section('content')
    <section class="hero-wrap js-fullheight" style="background-image: url({{ asset('landing/images/bg_1.jpg') }});"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-12 ftco-animate pb-5 mb-3 text-center">
                    <h1 class="mb-3 bread">Blog Single Post</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a
                                href="/#blog-section">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog
                            Single <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <img src="{{ asset('admin/foto/post/' . $post['image']) }}" alt="" class="img-fluid">
                    <br></br>
                    <h2 class="mb-3">{{ $post->judul }}</h2>
                    <p>{{ $post->desc }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
