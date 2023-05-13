@extends('landing.layouts.main')

@section('content')
    <section class="home_banner_area">
        <div class="container box_1620">
            <div class="banner_inner d-flex align-items-center">
                <div class="banner_content">
                    @foreach ($user as $data)
                        <div class="media">
                            <div class="d-flex">
                                <img src="{{ asset('admin/foto/user/' . $data['image']) }}" width="800px" height="800px" alt="">
                            </div>
                            <div class="media-body">

                                <div class="personal_text">
                                    <h6>Hello Everybody, i am</h6>
                                    <h3>{{ $data->name }}</h3>
                                    <h4>{{ $data->tag }}</h4>
                                    <p>{{ $data->desc }}</p>
                                    <ul class="list basic_info">

                                        <li><a href="#"><i class="lnr lnr-phone-handset"></i>{{ $data->phone }}</a>
                                        </li>
                                        <li><a href="#"><i class="lnr lnr-envelope"></i> {{ $data->email }}</a></li>
                                        <li><a href="#"><i class="lnr lnr-home"></i>{{ $data->address }}</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
