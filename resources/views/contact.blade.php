@extends('layouts.app')

@section('content')

    <div class="main-section hero-area-fix">
        @include('partials._header')
    </div><!--main-section end-->

    <section class="pager-section">
        <div class="container">
            <div class="pager-content text-center">
                <h2>Contact</h2>

            </div><!--pager-content end-->
            <h2 class="page-titlee">IdroValencia</h2>
        </div>
    </section><!--pager-section end-->

    <section class="page-content">
        <div class="container">
            <div class="mdp-map">
                <!--<iframe src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
-->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48904.48934440173!2d-0.13859065829964437!3d39.99659443038835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5ffd99f5e4f857%3A0x1c02af723e135d00!2s12006%20Castell%C3%B3n%20de%20la%20Plana%2C%20Castell%C3%B3n%2C%20Spain!5e0!3m2!1sen!2sma!4v1645054369799!5m2!1sen!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            </div><!--mdp-map end-->
            <div class="mdp-contact">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="comment-area">
                            <h3>Enviar Mensaje</h3>
                            <form id="contact-form" method="post" action="#">
                                <div class="response"></div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="name" placeholder="Nombre" required>
                                        </div><!--form-group end-->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="email" placeholder="Email" required>
                                        </div><!--form-group end-->
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Mensaje"></textarea>
                                        </div><!--form-group end-->
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-submit text-left">
                                            <button type="button" id="submit" class="btn-default">Enviar <i class="fa fa-long-arrow-alt-right"></i></button>
                                        </div><!--form-submit end-->
                                    </div>
                                </div>
                            </form>
                        </div><!--comment-area end-->
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <div class="mdp-our-contacts">
                            <h3>Contactos</h3>
                            <ul>
                                <li>
                                    <div class="d-flex flex-wrap">
                                        <div class="icon-v">
                                            <img src="assets/img/icon15.png" alt="">
                                        </div>
                                        <div class="dd-cont">
                                            <h4>Phone</h4>
                                            <span>+34 342 5446 67</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex flex-wrap">
                                        <div class="icon-v">
                                            <img src="assets/img/icon16.png" alt="">
                                        </div>
                                        <div class="dd-cont">
                                            <h4>work time</h4>
                                            <span>Mon - Fri 8 AM - 5 PM</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex flex-wrap">
                                        <div class="icon-v">
                                            <img src="assets/img/icon17.png" alt="">
                                        </div>
                                        <div class="dd-cont">
                                            <h4>Dirección</h4>
                                            <span>Franklin St, Greenpoint Ave</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div><!--mdp-our-contacts end-->
                    </div>
                </div>
            </div><!--mdp-contact end-->
        </div>
    </section><!--page-content end-->
@endsection
