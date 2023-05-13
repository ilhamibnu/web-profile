@extends('landing.layouts.main')

@section('title', 'Ilham Ibnu Ahmad | Web Profile')

@section('content')
    <section id="home-section" class="hero">
        <div class="home-slider  owl-carousel">
            <div class="slider-item ">
                <div class="overlay"></div>
                <div class="container">
                    @foreach ($user as $datauser)
                        <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end"
                            data-scrollax-parent="true">
                            {{-- <div class="one-third js-fullheight order-md-last img"
                                style="background-image:url({{ asset('admin/foto/user/' . $datauser['image']) }});">
                                <div class="overlay"></div>
                            </div> --}}
                            <div class="one-forth d-flex  align-items-center ftco-animate"
                                data-scrollax=" properties: { translateY: '70%' }">
                                <div class="text">

                                    <span class="subheading">Hello!</span>
                                    <h1 class="mb-4 mt-3">I'm <span>{{ $datauser->name }}</span></h1>
                                    <h2 class="mb-4">{{ $datauser->tag }}</h2>
                                    <p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a> <a href="#"
                                            class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
        <div class="container">
            @foreach ($user as $item)
                <div class="row d-flex">
                    <div class="col-md-6 col-lg-5 d-flex">
                        <div class="img-about img d-flex align-items-stretch">
                            <div class="overlay"></div>
                            <div class="img d-flex align-self-stretch align-items-center"
                                style="background-image:url({{ asset('admin/foto/user/' . $item['image']) }});">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate">

                                <h1 class="big">About</h1>
                                <h2 class="mb-4">About Me</h2>
                                <p>{{ $item->desc }}
                                </p>
                                <ul class="about-info mt-4 px-md-0 px-2">
                                    <li class="d-flex"><span>Name:</span> <span>{{ $item->name }}</span></li>
                                    <li class="d-flex"><span>Address:</span> <span>{{ $item->address }}</span></li>
                                    <li class="d-flex"><span>Email:</span> <span>{{ $item->email }}</span></li>
                                    <li class="d-flex"><span>Phone: </span> <span>{{ $item->phone }}</span></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="ftco-section" id="blog-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Blog</h1>
                    <h2 class="mb-4">Our Blog</h2>
                    <p></p>
                </div>
            </div>
            <div class="row d-flex">
                @foreach ($post as $datapost)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="/detail-blog/{{ $datapost->id }}" class="block-20"
                                style="background-image: url({{ asset('admin/foto/post/' . $datapost['image']) }});">
                            </a>
                            <div class="text mt-3 float-right d-block">
                                <div class="d-flex align-items-center mb-3 meta">
                                    <p class="mb-0">
                                        <span class="mr-2">{{ $datapost['created_at'] }}</span>
                                        <a href="#" class="mr-2">{{ $datapost->user->name }}</a>
                                        {{-- <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a> --}}
                                    </p>
                                </div>
                                <h3 class="heading"><a href="/detail-blog/{{ $datapost->id }}">{{ $datapost->judul }}</a>
                                </h3>
                                <p>{{ $datapost->sub }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
