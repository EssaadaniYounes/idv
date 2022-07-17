@extends('layouts.app')

@section('content')

    <div class="main-section hero-area-fix home_section">

        @include('partials._header')

        <section class="main-banner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="banner-text wow fadeInLeft" data-wow-duration="1000ms">
                            <h2><span>{{ $branches[0]->brand }}</span> {{ $branches[0]->title }}</h2>
                            <p>{{ nl2br($branches[0]->description) }}</p>

                        </div>
                    </div>
                    <!--<div class="col-lg-5 col-md-5">
                        <div class="banner-img wow zoomIn" data-wow-duration="1000ms">
                            <img src="assets/img/water_2.png" alt="" width="100%">
                        </div>
                        <div class="elements-bg wow zoomIn" data-wow-duration="1000ms"></div>
                    </div>
                    -->
                </div>
            </div>
        </section><!--main-banner end-->

        <h2 class="main-title">{{ $branches[0]->brand }}</h2>

    </div><!--main-section end-->

    <section class="about-us-section">
        <div  class="container">
            <div class="section-title text-center">
                <h2><span> Branches</span></h2>
            </div><!--section-title end-->
            <div class="about-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                            <a href="/">
                            <div class="abt-col wow fadeInUp" data-wow-duration="1000ms">
                                <img src="{{ asset('assets/img/branches/'.$branches[0]->logo) }}" alt="" width="100px">
                                <h3>{{ $branches[0]->brand }}</h3>
                                <p>{{ $branches[0]->title }}</p>
                            </div><!--abt-col end-->
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                            <a href="../branch2">
                                <div class="abt-col wow fadeInUp" data-wow-duration="1000ms">
                                    <img src="{{ asset('assets/img/branches/'.$branches[1]->logo) }}" alt="" width="100px">
                                    <h3>{{ $branches[1]->brand }}</h3>
                                    <p>{{ $branches[1]->title }}</p>
                                </div><!--abt-col end-->
                            </a>
                        </div>
                    </div>
                </div>
            </div><!--about-rw end-->
        </div>
    </section><!--about-us-section end-->


    <section class="classes-page">
        <div class="container">
            <div class="section-title text-center">
                <h2><span>Products</span></h2>
            </div><!--section-title end-->

            <div class="classes-section">
                <div class="classes-sec">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="classes-col">
                                <div class="class-thumb">
                                    <img src="{{ asset('images/products/main_images/'.$product->main_img ) }}" alt="{{ $product->title }}" class="w-100">
                                    <a href="products/{{ $product->id }}" title="" class="crt-btn">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                                <div class="class-info">
                                    <h3><a href="products/{{ $product->id }}" title="">{{ $product->title }}</a></h3>
                                    <p>{{ $product->reference }}</p>

                                </div>
                            </div><!--classes-col end-->
                        </div>
                        @endforeach
                    </div>
                </div><!--classes-sec end-->
                <!--
                <div class="mdp-pagiation">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link active" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">15</a></li>
                        </ul>
                    </nav>
                </div>
                -->
            </div>
            <br>
            <br>
            <br>
        </div>
    </section><!--classes-page end-->

    @include('partials._min_contact')

@endsection
