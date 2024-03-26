<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotel Reservation</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400|Playfair+Display:400,700"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />

    <link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/font-awesome.min.css') }}" />

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <header class="site-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4 site-logo" data-aos="fade">
                    <a href="http://laravelhotelreserve.test/home"><em>Villa</em></a>
                </div>
                <div class="col-8">
                    <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <!-- END menu-toggle -->

                    <div class="site-navbar js-site-navbar">
                        <nav role="navigation">
                            <div class="container">
                                <div class="row full-height align-items-center">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled menu">
                                            <li>
                                                <a href="index.html">Home</a>
                                            </li>
                                            <li>
                                                <a href="hotel.html">Hotel</a>
                                            </li>
                                            <li>
                                                <a href="about.html">About</a>
                                            </li>
                                            <li>
                                                <a href="blog.html">Blog</a>
                                            </li>
                                            <li class="active">
                                                <a href="contact.html">Hotel Reservation</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 extra-info">
                                        <div class="row">
                                            <div class="col-md-6 mb-5">
                                                <h3>Contact Info</h3>
                                                <p>
                                                    2022947477@student.uitn.edu.com
                                                </p>
                                                <p>019-5783840</p>
                                            </div>
                                            <div class="col-md-6">
                                                <h3>Connect With Us</h3>
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <a href="#">Twitter</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Facebook</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Instagram</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END head -->
    <section class="site-hero overlay page-inside" style="background-image: url('{{ asset('img/img_6.jpg') }}')">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center">
                    <h1 class="heading" data-aos="fade-up">
                        Hotel Reservation
                    </h1>
                    <p class="sub-heading mb-5" data-aos="fade-up" data-aos-delay="100">
                        Booking System
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-primary contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <footer class="section footer-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-3 mb-5">
                    <ul class="list-unstyled link">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Rooms</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-5">
                    <ul class="list-unstyled link">
                        <li><a href="#">Our Location</a></li>
                        <li><a href="#">The Hosts</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Restaurant</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-5 pr-md-5 contact-info">
                    <p>
                        <span class="d-block">Phone:</span>
                        <span>019-5783840</span>
                    </p>
                    <p>
                        <span class="d-block">Email:</span>
                        <span> 2022947477@student.uitn.edu.com</span>
                    </p>
                </div>
                <div class="col-md-3 mb-5">
                    <p>Sign up for our newsletter</p>
                    <form action="#" class="footer-newsletter">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your email..." />
                            <button type="submit" class="btn">
                                <span class="fa fa-paper-plane"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row bordertop pt-5">
                <p class="col-md-6 text-left"></p>
                <p class="col-md-6 text-right social">
                    <a href="#"><span class="fa fa-tripadvisor"></span></a>
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-twitter"></span></a>
                </p>
            </div>
        </div>
    </footer>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
