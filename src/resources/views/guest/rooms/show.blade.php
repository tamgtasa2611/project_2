<title>Room {{$room->name}} - Skyrim Hotel</title>
{{--<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>--}}
<script src="{{asset('plugins/calendar/index.global.min.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });
        calendar.render();
    });
</script>
<x-guestLayout>
    <section id="rooms" class="m-nav">
        <div class="container">
            <div class="pt-3 mb-3 position-relative">
                {{--alert login thanh cong--}}
                @if (session('success'))
                    @include('partials.flashMsgSuccess')
                @endif
                {{--alert book fail--}}
                @if (session('failed'))
                    @include('partials.flashMsgFail')
                @endif
                @if ($errors->has('checkin'))
                    @foreach ($errors->get('checkin') as $error)
                        {{session()->flash('failed', $error)}}
                        @include('partials.flashMsgFail')
                        {{session()->forget('failed')}}
                    @endforeach
                @endif
                @if ($errors->has('checkout'))
                    @foreach ($errors->get('checkin') as $error)
                        {{session()->flash('failed', $error)}}
                        @include('partials.flashMsgFail')
                        {{session()->forget('failed')}}
                    @endforeach
                @endif
                @if ($errors->has('guest_num'))
                    @foreach ($errors->get('checkin') as $error)
                        {{session()->flash('failed', $error)}}
                        @include('partials.flashMsgFail')
                        {{session()->forget('failed')}}
                    @endforeach
                @endif
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('guest.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('guest.rooms')}}">Rooms</a></li>
                    </ol>
                </nav>
            </div>
            {{--            room detail--}}
            <div class="mb-5 row g-3 h-auto">
                {{--                room info--}}
                <div class="col-12 col-lg-6">
                    <div class="w-100 h-100 d-flex flex-column border rounded-5 overflow-hidden shadow-sm">
                        @if(count($roomImages) > 1)
                            <!-- Carousel wrapper -->
                            <div id="carouselMaterialStyle"
                                 class="carousel slide carousel-fade w-100 overflow-hidden rounded-5"
                                 data-mdb-ride="carousel"
                                 data-mdb-carousel-init>
                                <!-- Indicators -->
                                <div class="carousel-indicators">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($roomImages as $image)

                                        <button type="button" data-mdb-target="#carouselMaterialStyle"
                                                data-mdb-slide-to="{{$i}}"
                                                class="{{$image == $roomImages[0] ? 'active' : '' }}"
                                                aria-current="{{$image == $roomImages[0] ? 'true' : '' }}"
                                                aria-label="Slide {{$i}}"></button>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </div>

                                <!-- Inner -->
                                <div class="carousel-inner w-100 rounded-5 shadow-sm overflow-hidden">
                                    <!--  item -->
                                    @foreach($roomImages as $image)
                                        <div
                                            class="carousel-item overflow-hidden ratio ratio-16x9 rounded-5 {{$image == $roomImages[0] ? 'active' : '' }}">
                                            <img src="{{asset('storage/admin/rooms/'.$image->path)}}"
                                                 class="w-100 object-fit-cover d-block tran-3 rounded-5"/>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Inner -->

                                <!-- Controls -->
                                <button class="carousel-control-prev" type="button"
                                        data-mdb-target="#carouselMaterialStyle"
                                        data-mdb-slide="prev">
                                <span aria-hidden="true">
                                    <i class="bi bi-chevron-left fs-2"></i>
                                </span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                        data-mdb-target="#carouselMaterialStyle"
                                        data-mdb-slide="next">
                                <span aria-hidden="true">
                                    <i class="bi bi-chevron-right fs-2"></i>
                                </span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!-- Carousel wrapper -->
                        @else
                            <div class="rounded-5 shadow-sm overflow-hidden">
                                <!--  item -->
                                @foreach($roomImages as $image)
                                    <div
                                        class="carousel-item overflow-hidden ratio ratio-16x9 rounded-5  {{$image == $roomImages[0] ? 'active' : '' }}">
                                        <img src="{{asset('storage/admin/rooms/'.$image->path)}}"
                                             class="w-100 object-fit-cover d-block tran-3 rounded-5"/>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="d-flex flex-column flex-fill overflow-hidden">
                            <div class="p-3 pb-0 d-flex justify-content-between">
                                <div>
                                    <h3 class="mb-2 fw-bold text-primary">
                                        Room {{$room->name}}
                                    </h3>
                                    <div class="d-flex">
                                        <div class=" badge  badge-primary rounded-pill">
                                            <i class="bi bi-house me-1"></i> {{$room->roomType->name}}
                                        </div>
                                        <div class=" badge  badge-primary rounded-pill ms-2">
                                            <i class="bi bi-people me-1"></i> {{$room->capacity}}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="text-warning mb-2 text-end">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </div>
                                    <div class=" badge  badge-warning rounded-pill">
                                        <i class="bi bi-hand-thumbs-up me-1"></i> 100 reviews
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 flex-fill d-flex align-items-end">
                                <div
                                    class="col-12 p-0 h-100 d-flex justify-content-between align-items-end">
                                    <div class="d-flex align-items-end mb-2 mb-md-0">
                                        <h3 class="m-0 fw-bold text-success">
                                            ${{$room->roomType->base_price}}<span
                                                class="text-muted fs-6">/night</span>
                                            <p class="fs-7 text-muted m-0">
                                                Includes taxes and fees
                                            </p>
                                        </h3>
                                    </div>
                                    @auth('guest')
                                        <a class="btn btn-primary rounded-9 modalBtn" data-mdb-ripple-init
                                           data-mdb-modal-init href="#bookModal"
                                           data-id={{$room->id}}>
                                            BOOK now
                                        </a>
                                    @endauth
                                    @guest('guest')
                                        <div class="d-flex align-items-end">
                                            <div>
                                                Please
                                                <a href="{{route('guest.login')}}" class="text-decoration-underline">sign
                                                    in</a>
                                                to book a reservation
                                            </div>
                                        </div>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                room calendar--}}
                <div class="col-12 col-lg-6">
                    <div
                        class="bg-white rounded-5 border p-3 shadow-sm h-100 w-100 row justify-content-between m-0">
                        <div class="col-12 p-0">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BookModal -->
            <div class="modal slideUp" id="bookModal" style="min-width: fit-content !important;"
                 tabindex="-1"
                 aria-labelledby="bookModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="min-width: fit-content !important;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold text-primary text-capitalize" id="bookModalLabel">
                                <i class="bi bi-pencil-square me-2"></i>Booking Details
                            </h5>
                            <div class="">
                                <button type="button" class="btn-close" data-mdb-ripple-init
                                        data-mdb-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="modal-body row">
                            <form class="col-12" method="post"
                                  action="{{route('guest.bookRoom')}}">
                                @csrf
                                @method('POST')
                                <div class="row gx-3">
                                    <div class="col col-md-6 mb-4"> <!-- checkin input -->
                                        <div class="tran-3">
                                            <label class="form-label" for="checkin">Check-in date</label>
                                            <input type="date" id="checkin" name="checkin" value="today"
                                                   class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col col-md-6 mb-4">  <!-- checkout input -->
                                        <div class="tran-3">
                                            <label class="form-label" for="checkout">Check-out date</label>
                                            <input type="date" id="checkout" name="checkout"
                                                   class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-none mb-4 bg-danger-subtle text-danger rounded-5 p-3" id="dateError">

                                </div>
                                <div class="w-100 mb-4">     <!-- guest num input -->
                                    <div class="tran-3">
                                        <label class="form-label" for="guest_num">Number of guests</label>
                                        <input type="number" id="guest_num" name="guest_num"
                                               value="{{$room->capacity}}"
                                               class="form-control" placeholder="1 guest"
                                               step="1" min="1" max="10" required/>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            Days booked:
                                        </div>
                                        <div id="dayBooked">
                                            0 day
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            Amount:
                                        </div>
                                        <div class="text-success">
                                            <input class="visually-hidden" hidden id="basePriceModal"
                                                   value="{{$room->roomType->base_price}}">
                                            $<span id="amount">0.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 fs-7 text-center">
                                    The booking guest's details will be your account information
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="w-100">
                                        <input id="id" name="id" hidden class="visually-hidden"
                                               value="">
                                        <button class="btn btn-primary btn-block rounded-9"
                                                id="bookBtn" type="submit"
                                                data-mdb-ripple-init>
                                            BOOK
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{--            rating--}}
            <div class="mb-5">
                <h4 class="fw-bold text-primary">Reviews & Ratings</h4>
            </div>
        </div>
    </section>
    <script src="{{asset('plugins/calendar/moment.min.js')}}"></script>
    <script>
        moment().format();
    </script>
</x-guestLayout>
