<title>Rooms - Skyrim Hotel</title>
<x-guestLayout>
    <section id="rooms" class="m-nav">
        <div class="container">
            {{--            search form--}}
            <div class="pt-5 mb-5">
                <form method="get"
                      class="bg-white p-3 m-0 shadow-sm">
                    <div class="row g-3">
                        <div class="col-12 col-lg-3">
                            <!-- checkin input -->
                            <div data-mdb-input-init class="form-outline ">
                                <i class="bi bi-calendar-plus trailing"></i>
                                <input id="checkin" name="checkin" type="text"
                                       placeholder="Check In"
                                       class="my-input form-control form-icon-trailing form-control-lg"
                                       value="{{$search['checkin']}}"
                                >
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <!-- checkout input -->
                            <div data-mdb-input-init class="form-outline ">
                                <i class="bi bi-calendar-plus trailing"></i>
                                <input id="checkout" name="checkout" type="text"
                                       placeholder="Check Out"
                                       value="{{$search['checkout']}}"
                                       class="my-input form-control form-icon-trailing form-control-lg"
                                >
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <!-- guest num input -->
                            <div class="form-outline" data-mdb-input-init>
                                <input type="number" id="guest_num" name="guest_num"
                                       class="my-input form-control form-control-lg"
                                       step="1" min="1" max="10" placeholder="Guests"
                                       value="{{$search['guest_num']}}"/>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <!-- Submit button -->
                            <button data-mdb-ripple-init type="submit"
                                    class="btn btn-lg btn-primary rounded-0 tran-3 btn-block">
                                Check Availability
                            </button>
                        </div>
                    </div>
                </form>
                {{--        mcdatepicker--}}
                <script>
                    const datePicker1 = MCDatepicker.create({
                        el: '#checkin',
                        theme: {
                            theme_color: '#3b71ca',

                        },
                        bodyType: 'inline',
                        dateFormat: 'dd-mm-yyyy',
                        closeOnBlur: true,
                        selectedDate: new Date(`{{date('Y-m-d', strtotime($search['checkin']))}}`),
                        minDate: new Date(),
                        maxDate: new Date(new Date().setFullYear(new Date().getFullYear() + 1)),
                        jumpToMinMax: true,
                        customCancelBTN: 'Cancel'
                    });

                    const datePicker2 = MCDatepicker.create({
                        el: '#checkout',
                        theme: {
                            theme_color: '#3b71ca',

                        },
                        bodyType: 'inline',
                        dateFormat: 'dd-mm-yyyy',
                        closeOnBlur: true,
                        selectedDate: new Date(`{{date('Y-m-d', strtotime($search['checkout']))}}`),
                        minDate: new Date(),
                        maxDate: new Date(new Date().setFullYear(new Date().getFullYear() + 1)),
                        jumpToMinMax: true,
                        customCancelBTN: 'Cancel'
                    });
                </script>
            </div>
            {{--           end search form--}}

            {{--            heading--}}
            <div class="mb-5">
                <h6 class="display-6 text-primary fw-bold m-0">
                    {{$countRoom}} hotel room(s) available
                </h6>
            </div>
            {{--            end heading--}}

            {{--            rooms--}}
            <div class="mb-5 row m-0">
                <div class="col-3 d-none d-lg-block border rounded-0 p-0 bg-white shadow-sm"
                     style="height: fit-content !important;">
                    <div class="fw-bold text-primary p-3 fs-6">
                        Filter by <i class="ms-2 bi bi-sliders"></i>
                    </div>
                    <hr class="m-0">
                    <form class="p-3 m-0">
                        {{-- price filter--}}
                        <div class="mb-4">
                            <div class="mb-3 fw-bold fs-6">
                                Price
                            </div>
                            <div class="mx-3">
                                <div class="row gx-3">
                                    <div class="col">
                                        <label for="from" class="form-label">From</label>
                                        <input type="number" id="from" class="form-control" name="from_price"
                                               placeholder="$0" value=""/>
                                    </div>
                                    <div class="col">
                                        <label for="to" class="form-label">To</label>
                                        <input type="number" id="to" class="form-control" name="to_price"
                                               placeholder="$1000"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end price filter--}}

                        {{--                       rating filter--}}
                        <div class="mb-4">
                            <div class="mb-3 fw-bold fs-6">
                                Rating
                            </div>
                            <div class="ms-3">
                                @php
                                    $starFill = 5;
                                    $star = 0;
                                @endphp
                                @for($rate = 5; $rate >= 1; $rate--)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                               name="rating" value="{{$rate}}"
                                               id="rating_{{$rate}}"
                                            {{$rating == $rate ? 'checked' : ''}}
                                        />
                                        <label class="form-check-label"
                                               for="rating_{{$rate}}">
                                            @for($i = $starFill; $i >= 1; $i--)
                                                <i class="bi bi-star-fill text-warning"></i>
                                            @endfor
                                            @for($j = 0; $j < $star; $j++)
                                                <i class="bi bi-star text-warning"></i>
                                            @endfor
                                                        (5)
                                        </label>
                                    </div>
                                    @php
                                        $starFill--;
                                        $star++;
                                    @endphp
                                @endfor
                            </div>
                        </div>
                        {{--                       end rating filter--}}

                        {{--                        room type filter--}}
                        <div class="mb-4">
                            <div class="mb-3 fw-bold fs-6">
                                Room type
                            </div>
                            <div class="ms-3">
                                @foreach($roomTypes as $roomType)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$roomType->id}}"
                                               id="roomType_{{$roomType->id}}" name="roomType"
                                            {{$roomType->room_quantity == 0 ? 'disabled' : ''}}/>
                                        <label class="form-check-label"
                                               for="roomType_{{$roomType->id}}">{{$roomType->name}}
                                            ({{$roomType->room_quantity}})
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--                       end room type filter--}}

                        <div class="row gx-3">
                            <div class="col">
                                <a href="{{route('guest.rooms')}}" class="btn btn-secondary btn-block rounded-0"
                                   data-mdb-ripple-init>Reset</a>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary btn-block rounded-0"
                                        data-mdb-ripple-init>Apply
                                </button>
                            </div>
                        </div>
                        {{--                            search--}}
                        <input type="text" name="checkin" value="{{$search['checkin']}}" class="visually-hidden"
                               hidden>
                        <input type="text" name="checkout" value="{{$search['checkout']}}" class="visually-hidden"
                               hidden>
                        <input type="text" name="guest_num" value="{{$search['guest_num']}}" class="visually-hidden"
                               hidden>
                        {{--                                view--}}
                        <input type="text" name="view" value="{{$view}}" class="visually-hidden" hidden>
                    </form>
                </div>

                {{--                right side--}}
                <div class="col-12 col-lg-9 ps-0 ps-lg-3 pe-0">
                    <div class="w-100 d-flex justify-content-between align-items-center mb-3">
                        {{--                        VIEW GIRD/LIST FORM--}}
                        <form class="d-none d-md-flex m-0 align-items-center">
                            <div>
                                <input class="btn-check tran-2" type="radio" name="view" value="grid"
                                       id="grid" onchange="this.form.submit()" {{$view == 'grid' ? 'checked' : ''}}
                                />
                                <label class="btn btn-outline-light rounded-0 tran-2 text-primary fw-bold"
                                       for="grid"> <i class="bi bi-grid fs-5"></i></label>
                            </div>
                            <div class="ms-3">
                                <input class="btn-check tran-2" type="radio" name="view" value="list"
                                       id="list" onchange="this.form.submit()"
                                    {{$view == 'list' ? 'checked' : ''}}/>
                                <label class="btn btn-outline-light rounded-0 tran-2 text-primary fw-bold"
                                       for="list"> <i class="bi bi-list fs-5"></i></label>
                            </div>
                            {{--                            search--}}
                            <input type="text" name="checkin" value="{{$search['checkin']}}" class="visually-hidden"
                                   hidden>
                            <input type="text" name="checkout" value="{{$search['checkout']}}" class="visually-hidden"
                                   hidden>
                            <input type="text" name="guest_num" value="{{$search['guest_num']}}"
                                   class="visually-hidden"
                                   hidden>
                            {{--                            sort--}}
                            <input type="text" name="sort" value="{{$sort}}" class="visually-hidden" hidden>
                            {{--                            price--}}
                            <input type="text" name="from_price" value="{{$price['from_price']}}"
                                   class="visually-hidden"
                                   hidden>
                            <input type="text" name="to_price" value="{{$price['to_price']}}"
                                   class="visually-hidden"
                                   hidden>
                        </form>
                        {{--                        VIEW GIRD/LIST FORM--}}

                        {{--                        SORTING--}}
                        <div class="d-flex align-items-center justify-content-between col-12 col-md-auto">
                            <div class="text-primary fw-bold me-3 fs-6">
                                Sort by<i class="ms-2 bi bi-arrow-down-up"></i>
                            </div>
                            <form class="m-0">
                                <select class="form-select auto-submit" name="sort" id="sort"
                                        aria-label="sort" onchange="this.form.submit()">
                                    <option value="0" {{$sort == 0 ? 'selected' : ''}}>Recommended</option>
                                    <option value="1" {{$sort == 1 ? 'selected' : ''}}>Rating: Low to High</option>
                                    <option value="2" {{$sort == 2 ? 'selected' : ''}}>Rating: High to Low</option>
                                    <option value="3" {{$sort == 3 ? 'selected' : ''}}>Price: Low to High</option>
                                    <option value="4" {{$sort == 4 ? 'selected' : ''}}>Price: High to Low</option>
                                </select>
                                {{--                            search--}}
                                <input type="text" name="checkin" value="{{$search['checkin']}}" class="visually-hidden"
                                       hidden>
                                <input type="text" name="checkout" value="{{$search['checkout']}}"
                                       class="visually-hidden"
                                       hidden>
                                <input type="text" name="guest_num" value="{{$search['guest_num']}}"
                                       class="visually-hidden"
                                       hidden>
                                {{--                                view--}}
                                <input type="text" name="view" value="{{$view}}" class="visually-hidden" hidden>
                                {{--                            price--}}
                                <input type="text" name="from_price" value="{{$price['from_price']}}"
                                       class="visually-hidden"
                                       hidden>
                                <input type="text" name="to_price" value="{{$price['to_price']}}"
                                       class="visually-hidden"
                                       hidden>
                            </form>
                        </div>
                        {{--                        SORTING--}}
                    </div>

                    {{--                    ROOMS DIV--}}
                    @if($view == 'grid')
                        <div id="rooms_div" class="row row-cols-1 row-cols-md-2 gx-md-3">
                            @foreach($rooms as $room)
                                <div class="col-12 col-md-6 overflow-hidden">
                                    <div class="border rounded-0 bg-white shadow-sm row m-0 mb-3 ">
                                        <div class="col-12 p-0 overflow-hidden rounded-0 position-relative"
                                             style="height: 260px">
                                            <a href="{{route('guest.rooms.show', $room)}}">
                                                @if(count($room->images) != 0)
                                                    <img src="{{asset('storage/admin/rooms/'.$room->images[0]->path)}}"
                                                         alt="room_img"
                                                         class="img-fluid shadow-sm rounded-0 tran-3"/>
                                                @else
                                                    <img src="{{asset('images/noimage.jpg')}}" alt="room_img"
                                                         class="img-fluid shadow-sm rounded-0 tran-3"/>
                                                @endif
                                            </a>
                                        </div>

                                        <div class="col-12 row m-0 p-0 p-3 justify-content-between flex-column">
                                            <div
                                                class="col-12 p-0 d-flex justify-content-between align-items-center mb-3">
                                                <div>
                                                    <a href="{{route('guest.rooms.show', $room)}}">
                                                        <h4 class="fw-bold m-0 mb-2">
                                                            Room {{$room->name}}
                                                        </h4>
                                                    </a>
                                                    <div class="d-flex">
                                                        <div class="badge badge-primary">
                                                            <i class="bi bi-house me-1"></i> {{$room->roomType->name}}
                                                        </div>
                                                        <div class="badge badge-primary ms-2">
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
                                                    <div class="badge badge-warning">
                                                        <i class="bi bi-hand-thumbs-up me-1"></i> 100 reviews
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 row m-0 justify-content-between align-items-center p-0">
                                                <div class="col-6 p-0">
                                                    <div class="mb-2 fw-bold text-success">
                                                        <i class="bi bi-stars me-2 "></i>Special Offers
                                                    </div>
                                                    <div>
                                                        <ul class="list-unstyled fs-7 border-success border-start border-2 ps-2">
                                                            <li class="fst-italic">
                                                                <i class="bi bi-check me-2"></i>Free cancellation
                                                            </li>
                                                            <li class="fst-italic">
                                                                <i class="bi bi-check me-2"></i>No prepayment needed
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class=" col-6 d-flex flex-column align-items-end p-0">
                                                    <div class="text-end mb-2">
                                                        <h5 class="m-0 fw-bold text-success ">
                                                            ${{$room->roomType->base_price}}<span
                                                                class="text-muted fs-7">/night</span>
                                                        </h5>
                                                        <div class="fs-7 ms-2">Includes taxes and fees</div>
                                                    </div>
                                                    <a href="{{route('guest.rooms.show', $room)}}"
                                                       class="btn btn-primary rounded-0">
                                                        Book now
                                                    </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div id="rooms_div" class="d-flex flex-column">
                            @foreach($rooms as $room)
                                <div class="border rounded-0 shadow-sm row m-0 mb-3 bg-white overflow-hidden">
                                    <div class="col-4 p-0 overflow-hidden rounded-0 position-relative"
                                         style="height: 200px">
                                        <a href="{{route('guest.rooms.show', $room)}}">
                                            @if(count($room->images) != 0)
                                                <img src="{{asset('storage/admin/rooms/'.$room->images[0]->path)}}"
                                                     alt="room_img"
                                                     class="img-fluid shadow-sm rounded-0 tran-3"/>
                                            @else
                                                <img src="{{asset('images/noimage.jpg')}}" alt="room_img"
                                                     class="img-fluid shadow-sm rounded-0 tran-3"/>
                                            @endif
                                        </a>
                                    </div>

                                    <div class="col-8 row m-0 p-3 justify-content-between flex-column">
                                        <div class="col-12 p-0 d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <a href="{{route('guest.rooms.show', $room)}}">
                                                    <h4 class="fw-bold m-0 mb-2">
                                                        Room {{$room->name}}
                                                    </h4>
                                                </a>
                                                <div class="d-flex">
                                                    <div class="badge badge-primary">
                                                        <i class="bi bi-house me-1"></i> {{$room->roomType->name}}
                                                    </div>
                                                    <div class="badge badge-primary ms-2">
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
                                                <div class="badge badge-warning">
                                                    <i class="bi bi-hand-thumbs-up me-1"></i> 100 reviews
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 row m-0 justify-content-between align-items-center p-0">
                                            <div class="col-6 p-0">
                                                <div class="mb-2 fw-bold text-success">
                                                    <i class="bi bi-stars me-2 "></i>Special Offers
                                                </div>
                                                <div>
                                                    <ul class="list-unstyled fs-7 border-success border-start border-2 ps-2">
                                                        <li class="fst-italic">
                                                            <i class="bi bi-check me-2"></i>Free cancellation
                                                        </li>
                                                        <li class="fst-italic">
                                                            <i class="bi bi-check me-2"></i>No prepayment needed
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class=" col-6 d-flex flex-column align-items-end p-0">
                                                <div class="text-end mb-2">
                                                    <h5 class="m-0 fw-bold text-success ">
                                                        ${{$room->roomType->base_price}}<span
                                                            class="text-muted fs-7">/night</span>
                                                        <span class="text-secondary"></span>
                                                    </h5>
                                                    <div class="fs-7 ms-2">Includes taxes and fees</div>
                                                </div>
                                                <a href="{{route('guest.rooms.show', $room)}}"
                                                   class="btn btn-primary rounded-0">
                                                    Book now
                                                </a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    {{--                   END ROOMS DIV--}}

                    <div>
                        {{$rooms->onEachSide(2)->links()}}
                    </div>
                </div>
            </div>
            {{--            end rooms--}}
        </div>
    </section>
</x-guestLayout>
