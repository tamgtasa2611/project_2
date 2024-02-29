<nav class="navbar navbar-expand-lg fixed-top py-0 tran-2 bg-white border border-white shadow-0"
     id="navbar">
    <div class="container py-3">
        {{--        brand--}}
        <div class="w-25">
            <a class="navbar-brand p-0" href="/home">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="24">
            </a>
        </div>
        {{--        navigation --}}
        <div class="justify-content-center w-50	d-none d-lg-flex">
            <ul class="navbar-nav mb-lg-0 w-100 justify-content-between">
                {{--                home--}}
                <li class="nav-item">
                    <a class="nav-link tran-2
                    {{request()->routeIs('customer.home') ? 'active' : ''}}"
                       href="{{route('customer.home')}}">Home</a>
                </li>
                {{--                rooms--}}
                <li class="nav-item dropdown">
                    <a class="nav-link tran-2" href="/"
                       aria-expanded="false" id="dropdown2"
                       data-mdb-toggle="dropdown">
                        Rooms <i class="bi bi-caret-down-fill fs-7 ms-1"></i>
                    </a>
                    <ul class="dropdown-menu mt-0 tran-3 bg-white border shadow-sm animate slideIn"
                        aria-labelledby="dropdown2">
                        <li><a class="dropdown-item tran-2" href="#">Single Room</a></li>
                        <li><a class="dropdown-item tran-2" href="#">Double Room</a></li>
                        <li><a class="dropdown-item tran-2" href="#">Triple Room</a></li>
                    </ul>
                </li>
                {{--services--}}
                <li class="nav-item dropdown">
                    <a class="nav-link tran-2" href="/"
                       aria-expanded="false" id="dropdown2"
                       data-mdb-toggle="dropdown">
                        Services <i class="bi bi-caret-down-fill fs-7 ms-1"></i>
                    </a>
                    <ul class="dropdown-menu mt-0 tran-3 bg-white border shadow-sm animate slideIn"
                        aria-labelledby="dropdown2">
                        <li><a class="dropdown-item tran-2" href="#">Guided tour</a></li>
                        <li><a class="dropdown-item tran-2" href="#">Event planning</a></li>
                        <li><a class="dropdown-item tran-2" href="#">Restaurant</a></li>
                        <li><a class="dropdown-item tran-2" href="#">Fitness center</a></li>
                        <li><a class="dropdown-item tran-2" href="#">Spa & Massage</a></li>
                        <li><a class="dropdown-item tran-2" href="#">Laundry</a></li>
                    </ul>
                </li>
                {{--contact--}}
                <li class="nav-item">
                    <a class="nav-link tran-2
                    {{request()->routeIs('customer.contact') ? 'active' : ''}}"
                       href="{{route('customer.contact')}}">Contact</a>
                </li>
                {{--about--}}
                <li class="nav-item">
                    <a class="nav-link tran-2
                    {{request()->routeIs('customer.about') ? 'active' : ''}}"
                       href="{{route('customer.about')}}">About Us</a>
                </li>

            </ul>
        </div>

        {{--        login btn--}}
        <div class="w-25 d-flex justify-content-end	d-none d-lg-flex">
            <a class="btn btn-tertiary px-3 tran-2 me-2 rounded-9" href="{{route('customer.login')}}"
               data-mdb-ripple-init>
                Log in
            </a>
            <a class="btn btn-primary px-3 tran-2 rounded-9" href="{{route('customer.signup')}}"
               data-mdb-ripple-init>
                Sign up
            </a>
        </div>

        {{--        account btn--}}
        {{--        <div class="w-25 d-flex justify-content-end	d-none d-lg-flex">--}}
        {{--            <!-- Icon -->--}}
        {{--            <div class="dropdown me-3">--}}
        {{--                <a class="text-reset tran-2 dropdown-toggle hidden-arrow"--}}
        {{--                   aria-expanded="false" id="dropdown3"--}}
        {{--                   data-mdb-toggle="dropdown" href="#" role="button">--}}
        {{--                    <i class="bi bi-bell-fill"></i>--}}
        {{--                    <span class="badge rounded-pill badge-notification bg-danger">1</span>--}}
        {{--                </a>--}}
        {{--                <ul class="end-0 dropdown-menu dropright mt-0 tran-3 bg-white border shadow-sm animate slideIn"--}}
        {{--                    aria-labelledby="dropdown3">--}}
        {{--                    <li><a class="dropdown-item tran-2" href="#">Notification 1</a></li>--}}
        {{--                    <li><a class="dropdown-item tran-2" href="#">Notification 1</a></li>--}}
        {{--                    <li><a class="dropdown-item tran-2" href="#">Notification 1</a></li>--}}
        {{--                </ul>--}}
        {{--            </div>--}}

        {{--            <!-- Notifications -->--}}
        {{--            <div class="dropdown">--}}
        {{--                <a class="text-reset tran-2  dropdown-toggle hidden-arrow"--}}
        {{--                   aria-expanded="false" id="dropdown4"--}}
        {{--                   data-mdb-toggle="dropdown" href="#" role="button">--}}
        {{--                    <i class="bi bi-gear-fill"></i>--}}
        {{--                </a>--}}
        {{--                <ul class="end-0 dropdown-menu dropright mt-0 tran-3 bg-white border shadow-sm animate slideIn"--}}
        {{--                    aria-labelledby="dropdown4">--}}
        {{--                    <li><a class="dropdown-item tran-2" href="#">My bookings</a></li>--}}
        {{--                    <li><a class="dropdown-item tran-2" href="#">Settings</a></li>--}}
        {{--                    <li>--}}
        {{--                        <hr class="m-0">--}}
        {{--                    </li>--}}
        {{--                    <li><a class="dropdown-item tran-2" href="#">Sign out</a></li>--}}
        {{--                </ul>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        account btn--}}

        {{--       responsive list button --}}
        <div class="text-end navbar-toggler border-0 p-0">
            <a class="text-reset" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
               aria-controls="offcanvasExample">
                <i class="bi bi-list"></i>
            </a>
        </div>

        {{--        responsive nav bar button--}}
        <div class="offcanvas offcanvas-start tran-3 d-lg-none" tabindex="-1" id="offcanvasExample"
             aria-labelledby="offcanvasExampleLabel" style="width: 240px">
            <div class="offcanvas-body d-flex flex-column justify-content-between">
                <div class="w-100 flex-fill mb-3">
                    Your name
                    <hr>
                    <ul class="navbar-nav nav-fill mb-lg-0 h-75 w-100 align-items-start">
                        <li class="nav-item w-100 text-start">
                            <a class="nav-link active tran-2 row d-flex m-0" aria-current="page" href="#">
                                <i class="bi bi-house-fill col-2"></i>
                                <div class="col-10">
                                    Home
                                </div>
                            </a>
                        </li>

                        <li class="nav-item w-100 text-start">
                            <a class="nav-link tran-2  row d-flex m-0" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <i class="bi bi-door-closed-fill col-2"></i>
                                <div class="col-10">
                                    Rooms
                                </div>
                            </a>
                        </li>

                        <li class="nav-item w-100 text-start">
                            <a class="nav-link tran-2 row d-flex m-0 " href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <i class="bi bi-chat-heart-fill col-2"></i>
                                <div class="col-10">
                                    Services
                                </div>
                            </a>
                        </li>

                        <li class="nav-item w-100 text-start">
                            <a class="nav-link tran-2 row d-flex m-0" aria-current="page" href="#">
                                <i class="bi bi-image-fill col-2"></i>
                                <div class="col-10">
                                    Gallery
                                </div>
                            </a>
                        </li>

                        <li class="nav-item w-100 text-start">
                            <a class="nav-link tran-2 row d-flex m-0" aria-current="page" href="#">
                                <i class="bi bi-telephone-fill col-2"></i>
                                <div class="col-10">
                                    Contact
                                </div>
                            </a>
                        </li>

                        <li class="nav-item w-100 text-start">
                            <a class="nav-link tran-2 row d-flex m-0" aria-current="page" href="#">
                                <i class="bi bi-info-circle-fill col-2"></i>
                                <div class="col-10">
                                    About Us
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="w-100 d-flex flex-column justify-content-between align-items-end">
                    <a class="btn btn-secondary px-3 tran-2 mb-2 rounded-9 w-100" href="#">
                        Log in
                    </a>
                    <a class="btn btn-primary px-3 tran-2 rounded-9 w-100" href="#">
                        Sign up
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
