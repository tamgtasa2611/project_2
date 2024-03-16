<title>Home - Skyrim Hotel</title>
<x-guestLayout>
    {{--    HERO--}}
    <section id="hero" class="m-nav mb-5">
        <div
            class="fade-in load-hidden hero-section"
            style="background-image: url('{{asset('images/home2.jpg')}}')">
            <div class="container mh-80">
                <div class="row mh-80 border-0 m-0 text-white">
                    <div
                        class="col-12 col-md-6 p-0 mh-80 d-flex flex-column text-center align-items-center text-md-start align-items-md-start justify-content-center fade-left fade-in load-hidden">
                        <h5 class="fw-bolder display-5">
                            A dream stay for your bucket list trip
                        </h5>
                        <p class="lead">
                            Make it a trip to remember in a vacation home
                        </p>
                        <a href="" class="btn btn-primary tran-3 w-fit btn-lg shadow-lg rounded-9">
                            Discover vacation rentals
                        </a>
                    </div>
                    <div class="col-12 col-md-6 p-0 mh-80 d-flex align-items-center justify-content-center">
                        <form method="post" action="{{route('guest.rooms.search')}}"
                              class="border rounded-5 shadow-lg p-4 bg-white m-0 fade-right fade-in load-hidden">
                            @csrf
                            @method('POST')
                            <h2 class="text-primary fw-bold mb-4 text-capitalize text-center">
                                Stay somewhere great
                            </h2>
                            <div class="row">
                                <div class="col">
                                    <!-- checkin input -->
                                    <div class="mb-4 tran-3">
                                        <label class="form-label" for="checkin">Check-in date</label>
                                        <input type="date" id="checkin" name="checkin" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- checkout input -->
                                    <div class="mb-4 tran-3">
                                        <label class="form-label" for="checkout">Check-out date</label>
                                        <input type="date" id="checkout" name="checkout" class="form-control"/>
                                    </div>
                                </div>
                            </div>

                            <!-- guest num input -->
                            <div class="mb-4 tran-3">
                                <label class="form-label" for="guest_num">Number of guests</label>
                                <input type="number" id="guest_num" name="guest_num" class="form-control"
                                       step="1" min="1" max="10"/>
                            </div>

                            <!-- Submit button -->
                            <button data-mdb-ripple-init type="submit"
                                    class="btn btn-primary rounded-9 tran-3 btn-block">
                                Search<i class="bi bi-search ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--HERO--}}

    {{--  ROOMS  --}}
    <section id="rooms" class="mb-5 h-auto">
        <!-- Background image -->
        <div class="container">
            <div
                class="w-100 py-5 d-flex justify-content-start align-items-center">
                <div class="w-100 d-flex flex-column justify-content-center align-items-center
                 fade-in fade-bottom load-hidden">
                    <h1 class="display-6 text-center fw-bold mb-3 text-primary">
                        Designer room to fall in love with</h1>
                    <div class="mt-5 justify-content-center row">
                        <!-- Carousel wrapper -->
                        <div id="carouselMaterialStyle" class="carousel slide carousel-fade col-10"
                             data-mdb-ride="carousel"
                             data-mdb-carousel-init>
                            <!-- Indicators -->
                            <div class="carousel-indicators">
                                <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="0"
                                        class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="1"
                                        aria-label="Slide 2"></button>
                                <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="2"
                                        aria-label="Slide 3"></button>
                            </div>

                            <!-- Inner -->
                            <div class="carousel-inner rounded-5 shadow-4-strong overflow-hidden">
                                <!-- Single item -->
                                <div class="carousel-item active">
                                    <img src="{{asset('images/1.png')}}"
                                         class="w-100 d-block tran-3"/>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Double Room</h5>
                                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                    </div>
                                </div>

                                <!-- Single item -->
                                <div class="carousel-item">
                                    <img src="{{asset('images/2.png')}}"
                                         class="w-100 d-block tran-3"/>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Deluxe City View</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>

                                <!-- Single item -->
                                <div class="carousel-item">
                                    <img src="{{asset('images/3.png')}}"
                                         class="w-100 d-block tran-3"/>
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>King Bedroom</h5>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Inner -->

                            <!-- Controls -->
                            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMaterialStyle"
                                    data-mdb-slide="prev">
                                <span aria-hidden="true">
                                    <i class="bi bi-chevron-left fs-2"></i>
                                </span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-mdb-target="#carouselMaterialStyle"
                                    data-mdb-slide="next">
                                <span aria-hidden="true">
                                    <i class="bi bi-chevron-right fs-2"></i>
                                </span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- Carousel wrapper -->
                    </div>
                    <div class="row mt-5 justify-content-center">
                        <div class="text-center col-10 col-lg-9">
                            Skyrim Hotel offers its guests various stylishly furnished, comfortable design rooms in four
                            categories. All our beds are finished in extra sizes to provide even more sleeping comfort.
                            Each
                            design room or suite has its own individual character. Inspired with the nature, we divided
                            our
                            rooms in three primary elements: sun, water and earth.
                        </div>
                    </div>
                    <div class="mt-5">
                        <a href="/" class="link-primary pb-1 border-bottom border-primary">
                            DISCOVER ROOMS
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </section>
    {{--  ENDROOMS  --}}

    {{-- INTRODUCTION --}}
    <section id="introduction" class="mb-5 h-auto">
        <!-- Background image -->
        <div class="container">
            <div
                class="w-100 py-5 d-flex justify-content-start align-items-center">
                <div class="w-100 d-flex flex-column justify-content-center align-items-center
                 fade-in load-hidden">
                    <h1 class="display-6 text-center fw-bold mb-3 text-primary fade-top">
                        The glamorous hotel in the heart of Skyrim</h1>
                    <div class="row mt-5">
                        <div class="col-12 col-lg-4 fade-left">
                            <div class="d-flex justify-content-center mb-4">
                                <div class="badge badge-primary p-4 rounded-circle">
                                    <i class="bi bi-headset fs-4"></i>
                                </div>
                            </div>
                            <h6 class="fw-bold text-primary-emphasis text-center mb-4">24/7 Room Services</h6>
                            <p class="px-3 text-center">Whether you need a delicious meal, a refreshing drink, or a
                                relaxing massage, our room services are available 24/7 to cater to your needs.</p>
                        </div>

                        <div class="col-12 col-lg-4 fade-bottom">
                            <div class="d-flex justify-content-center mb-4">
                                <div class="badge badge-primary p-4 rounded-circle">
                                    <i class="bi bi-person-walking fs-4"></i>
                                </div>
                            </div>
                            <h6 class="fw-bold text-primary-emphasis text-center mb-4">Diverse Guide Tour</h6>
                            <p class="px-3 text-center">
                                If you want to explore the city and its attractions, our guide tour service is the best
                                way to do it. You can choose from our various packages or customize your own itinerary.
                            </p>
                        </div>

                        <div class="col-12 col-lg-4 fade-right">
                            <div class="d-flex justify-content-center mb-4">
                                <div class="badge badge-primary p-4 rounded-circle">
                                    <i class="bi bi-bicycle fs-4"></i>
                                </div>
                            </div>
                            <h6 class="fw-bold text-primary-emphasis text-center mb-4">Free Fitness Center</h6>
                            <p class="px-3 text-center">If you want to stay fit and healthy during your stay, our
                                fitness center service is the perfect choice for you. Feel free to enjoy our
                                state-of-the-art
                                equipments</p>
                        </div>
                    </div>
                    <div class="mt-5 fade-bottm">
                        <a href="/" class="link-primary pb-1 border-bottom border-primary">
                            EXPLORE SERVICES
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ENDINTRODUCTION --}}

    {{--  JOIN  --}}
    <section id="join" class=" h-auto bg-light ">
        <!-- Background image -->
        <div class="container">
            <div class="row py-3">
                <div class="col-12 col-md-6 col-lg-3 p-3 d-flex align-items-center fade-left fade-in load-hidden">
                    <img src="{{asset('images/join.png')}}" alt="join"
                         class="img-fluid rounded-5 shadow-3">
                </div>
                <div
                    class="col-12 col-md-6 col-lg-9 p-3 fade-right fade-in load-hidden d-flex text-center text-md-start align-items-center align-items-md-start flex-column justify-content-center">
                    <h5 class="fw-bold display-5 text-primary text-capitalize mb-4">
                        Join our team
                    </h5>
                    <p class="text-justify mb-4">
                        As a member of Skyrim Hotel, you’ll be recognized and rewarded across the global collection of
                        hotels of Global Skyrim Hotel Alliance. We offer recognition from Day One — so our benefits,
                        DISCOVERY
                        Dollars (D$), Experiences and Live Local are available to you instantly, at all membership tiers
                        at any of our properties, at home or away, with or without a stay.
                    </p>
                    <a href="" class="btn btn-primary tran-3 w-fit rounded-9">
                        Find out more<i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </section>
    {{--  ENDJOIN  --}}
</x-guestLayout>
