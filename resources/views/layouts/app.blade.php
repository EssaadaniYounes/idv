<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IdroValencia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="IdroValencia - Website" />
    <meta name="author" content="merkulove">
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
</head>


<body>



<div class="wrapper">

    @yield('content')



    <footer>
        <div class="container">
            <div class="top-footer">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-sm-6">

                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="widget widget-about">
                            <img src="{{ asset('assets/img/branches/'.$branches[0]->logo) }}" alt="">
                            <p>{{ $branches[0]->description }}</p>
                        </div><!--widget-about end-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget widget-contact">
                            <ul class="contact-add">
                                <li>
                                    <div class="contact-info">
                                        <img src="assets/img/icon1.png" alt="">
                                        <div class="contact-tt">
                                            <h4>Phone</h4>
                                            <span>+2 342 5446 67</span>
                                        </div>
                                    </div><!--contact-info end-->
                                </li>
                                <li>
                                    <div class="contact-info">
                                        <img src="assets/img/icon2.png" alt="">
                                        <div class="contact-tt">
                                            <h4>Work Time</h4>
                                            <span>Mon - Fri 8 AM - 5 PM</span>
                                        </div>
                                    </div><!--contact-info end-->
                                </li>
                                <li>
                                    <div class="contact-info">
                                        <img src="assets/img/icon3.png" alt="">
                                        <div class="contact-tt">
                                            <h4>Direction</h4>
                                            <span>Franklin St, Greenpoint Ave</span>
                                        </div>
                                    </div><!--contact-info end-->
                                </li>
                            </ul>
                        </div><!--widget-contact end-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="widget widget-links">
                            <h3 class="widget-title">Quick Links</h3>
                            <ul>
                                <li><a href="/" title="">EMPRESA</a></li>
                                <li><a href="/branch2" title="">{{ $branches[1]->brand }}</a></li>
                                <li><a href="/contact" title="">Contact </a></li>

                            </ul>
                        </div><!--widget-links end-->
                    </div>

                </div>
            </div><!--top-footer end-->
            <div class="bottom-footer">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <p>© Copyrights 2022 {{ $branches[0]->description }} All rights reserved</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <ul class="social-links">
                            <li><a href="#" title=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" title=""><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#" title=""><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!--bottom-footer end-->
        </div>
    </footer><!--footer end-->

</div>


<audio src="{{ asset('assets/water.mp3') }}" autoplay loop></audio>


<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.js') }}"></script>
<script src="{{ asset('assets/js/html5lightbox.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/tweenMax.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ripples-min.js') }}"></script>

<script>

    $(document).ready(function (){



        $('.hero-area-fix').ripples({
            resolution: 712,
            dropRadius: 20,
            //perturbance: 0.04,
            perturbance: 0.01,
        });



    });
    function PlaySound(soundobj) {
        var thissound=document.getElementById(soundobj);
        thissound.play();
    }

    function StopSound(soundobj) {
        var thissound=document.getElementById(soundobj);
        thissound.pause();
        thissound.currentTime = 0;
    }

</script>

</body>

</html>
