<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD Table</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Link to CSS files -->
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
    <style>
        .table {
            color: white;
        }

        .crud-table {
            margin-top: 100px;
        }
    </style>
</head>

<body>



    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">Hotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Header -->
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

    <!-- CRUD Table Section -->
    <section class="section bg-primary crud-table">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- CRUD Table Content -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Room Type</th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check Out</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->fullname }}</td>
                                    <td>{{ $reservation->email }}</td>
                                    <td>{{ $reservation->phonenumber }}</td>
                                    <td>{{ $reservation->roomtype }}</td>
                                    <td>{{ $reservation->checkin }}</td>
                                    <td>{{ $reservation->checkout }}</td>
                                    <td>{{ $reservation->totalCost }}</td>
                                    <td>
                                        <a href="{{ route('edit', $reservation->id) }}"
                                            class="btn btn-sm btn-info">Update</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('destroy', $reservation->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this reservation?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            <!-- Additional data rows -->
                        </tbody>
                    </table>
                    <div class="text-center mt-4">
                        <a href="{{ route('create') }}" class="btn btn-primary"
                            style="color: black; background-color: white;">Create</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End CRUD Table Section -->

    <!-- Footer -->
    <footer class="section footer-section">
        <!-- Footer content here -->
    </footer>
    <!-- End Footer -->

    <!-- Scripts -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
