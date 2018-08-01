@extends('flewLa.master')
@section('page-content')
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url(images/slide_2.jpg);">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <h2>Get in touch. Don't be shy.</h2>
                                <p class="fh5co-lead">Designed with <i class="icon-heart"></i> by the fine folks at <a
                                            href="http://freehtml5.co" target="_blank">FreeHTML5.co</a></p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>

    <div class="fh5co-contact animate-box">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-md-push-2 animate-box">
                    <h2>Contact Details</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts. Far far away, behind the word mountains, far from the countries Vokalia
                        and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove. Far far
                        away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
                        blind texts. Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p><br><br>

                </div>
                <div class="col-md-3">
                    <h3>Contact Info.</h3>
                    <ul class="contact-info">
                        <li><i class="icon-map"></i>198 West 21th Street, Suite 721 New York NY 10016</li>
                        <li><i class="icon-phone"></i>+ 1235 2355 98</li>
                        <li><i class="icon-envelope"></i><a href="#">info@yoursite.com</a></li>
                        <li><i class="icon-globe"></i><a href="#">www.yoursite.com</a></li>
                    </ul>
                </div>
                <div class="col-md-8 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
                    <form method="post" id="contact">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="name" name="name" class="form-control" placeholder="Name" type="text">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="email" name="email" class="form-control" placeholder="Email" type="text">
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <textarea id="message" name="message" class="form-control" id="" cols="30" rows="7"
                                          placeholder="Message"></textarea>
                                    <span class="error help-block"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input value="Send Message" class="btn btn-primary" type="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection