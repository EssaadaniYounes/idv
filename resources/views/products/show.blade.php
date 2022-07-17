@extends('layouts.app')

@section('content')

    <div class="main-section hero-area-fix">

        @include('partials._header')


    </div><!--main-section end-->
    <section class="pager-section">
        <div class="container">
            <div class="pager-content text-center">
                <h2>{{ $product->title }}</h2>
            </div><!--pager-content end-->
            <h2 class="page-titlee">{{ $branch->brand }}</h2>
        </div>
    </section><!--pager-section end-->

    <section class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="event-single">
                        <div class="event-gallery-sec">
                            <div class="event-gallery">
                                <a href="{{ asset('images/products/main_images/'.$product->main_img ) }}" title="" class="html5lightbox" data-group="set1">
                                    <img src="{{ asset('images/products/main_images/'.$product->main_img ) }}" alt="">
                                </a>
                            </div><!--event-gallery end-->

                            <div class="row">
                                @if(!empty(json_decode($product->extra_imgs)))
                                @foreach(json_decode($product->extra_imgs) as $img)
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                    <div class="event-gallery">
                                        <a href="{{ asset('/images/products/extra/'.$img ) }}" title="" class="html5lightbox" data-group="set1">
                                            <img src="{{ asset('images/products/extra/'.$img ) }}" alt="">
                                        </a>
                                    </div><!--event-gallery end-->
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div><!--event-gallery-sec end-->
                        <p>{{ $product->description }}</p>
                        <h3>Fonctionalities</h3>
                        <ul class="ordrd">
                            <li>Program opening</li>
                            <li>Dance and have fun</li>
                            <li>Present gifts to students</li>
                            <li>Program ending</li>
                        </ul>

                    </div><!--event-single end-->
                </div>
                <div class="col-lg-3">
                    <div class="sidebar class-sidebar position-static">
                        <div class="classes-col">
                            <div class="class-thumb">
                                <img src="{{ asset('images/products/main_images/'.$product->main_img ) }}" alt="{{ $product->title }}" class="w-100">
                            </div>
                            <div class="class-info">
                                <h3><a href="products/show/{{ $product->id }}" title="">{{ $product->title }}</a></h3>
                                <p>{{ $product->reference }}</p>

                            </div>
                        </div><!--classes-col end-->
                    </div><!--sidebar end-->
                </div>
            </div>
        </div>
    </section><!--page-content end-->


    @include('partials._min_contact')

@endsection
