@extends('layouts.app')

@section('content')

    <div class="main-section hero-area-fix">

        @include('partials._header')

    </div><!--main-section end-->
    <section class="pager-section">
        <div class="container">
            <div class="pager-content text-center">
                <h2>{{ $branches[1]->brand }}</h2>
            </div><!--pager-content end-->
            <h2 class="page-titlee">{{ $branches[1]->brand }}</h2>
        </div>
    </section><!--pager-section end-->

    <section class="classes-page">
        <div class="container">
            <div class="section-title text-center">
                <br>
                <br>
                <h2><span>Products of {{ $branches[1]->brand }}</span></h2>
            </div><!--section-title end-->

            <div class="classes-section">
                <div class="classes-sec">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="classes-col">
                                    <div class="class-thumb">
                                        <img src="{{ asset('assets/img/products/main_images/'.$product->main_img ) }}" alt="{{ $product->title }}" class="w-100">
                                        <a href="products/show/{{ $product->id }}" title="" class="crt-btn">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </div>
                                    <div class="class-info">
                                        <h3><a href="products/show/{{ $product->id }}" title="">{{ $product->title }}</a></h3>
                                        <p>{{ $product->reference }}</p>

                                    </div>
                                </div><!--classes-col end-->
                            </div>
                        @endforeach
                    </div>
                </div><!--classes-sec end-->
            </div>
            <br>
            <br>
            <br>
        </div>
    </section><!--classes-page end-->

    <section class="about-us-section">
        <div  class="container">
            <div class="section-title text-center">
                <h2><span> Brand 2</span></h2>
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

    @include('partials._min_contact')

@endsection
