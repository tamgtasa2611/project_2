<title>Contact - Skyrim Hotel</title>
<x-guestLayout>
    <section id="rooms" class="m-nav">
        <div class="container">
            {{--            form--}}
            <div class="pt-5 mb-5">
                <form
                    class="border rounded-5 shadow-sm p-3 bg-white m-0">
                    <div class="row">
                        <div class="col-lg-3 col-xl-4 mb-4 mb-lg-0"> <!-- checkin input -->
                            <div class="tran-3">
                                <label class="form-label" for="checkin">Check-in date</label>
                                <input type="date" id="checkin" name="checkin" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-4 mb-4 mb-lg-0">  <!-- checkout input -->
                            <div class="tran-3">
                                <label class="form-label" for="checkout">Check-out date</label>
                                <input type="date" id="checkout" name="checkout" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-2 mb-4 mb-lg-0">     <!-- guest num input -->
                            <div class="tran-3">
                                <label class="form-label" for="guest_num">Number of guests</label>
                                <input type="number" id="guest_num" name="guest_num" class="form-control"
                                       step="1" min="1" max="10" required/>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xl-2 d-flex align-items-end">
                            <!-- Submit button -->
                            <button data-mdb-ripple-init type="submit"
                                    class="btn btn-primary rounded-9 tran-3 btn-block">
                                Search<i class="bi bi-search ms-2"></i>
                            </button>
                        </div>
                    </div>


                </form>
            </div>
            {{--           end form--}}
            {{--            heading--}}
            <div class="mb-5">
                <h6 class="display-6 text-primary fw-bold">
                    {{$totalRoom}} hotel room(s) available
                </h6>
            </div>
            {{--            end heading--}}
            {{--            rooms--}}
            <div class="mb-5 row m-0">
                <div class="col-3 d-none d-lg-block border rounded-5 p-0 shadow-sm"
                     style="height: fit-content !important;">
                    <div class="fw-bold text-primary p-3">
                        Filter by <i class="ms-2 bi bi-sliders"></i>
                    </div>
                    <hr class="m-0">
                    <div class="p-3">
                        <div class="mb-3">
                            <div class="mb-2 fw-bold">
                                Room type
                            </div>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"/>
                                    <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 fw-bold">
                                Room type
                            </div>
                            <div>
                                @foreach($roomTypes as $roomType)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$roomType->id}}"
                                               id="roomType_{{$roomType->id}}"/>
                                        <label class="form-check-label"
                                               for="roomType_{{$roomType->id}}">{{$roomType->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-9 ps-0 ps-lg-3 pe-0">
                    <div class="w-100 d-flex justify-content-between align-items-center mb-3">
                        {{--                        VIEW GIRD/LIST FORM--}}
                        <form class="d-none d-md-flex m-0 align-items-center">
                            <div>
                                <input class="btn-check tran-2" type="radio" name="view" value="grid"
                                       id="grid" onchange="this.form.submit()" {{$view == 'grid' ? 'checked' : ''}}
                                />
                                <label class="btn btn-outline-light rounded-5 tran-2 text-primary fw-bold"
                                       for="grid"> <i class="bi bi-grid fs-5"></i></label>
                            </div>
                            <div class="ms-3">
                                <input class="btn-check tran-2" type="radio" name="view" value="list"
                                       id="list" onchange="this.form.submit()"
                                    {{$view == 'list' ? 'checked' : ''}}/>
                                <label class="btn btn-outline-light rounded-5 tran-2 text-primary fw-bold"
                                       for="list"> <i class="bi bi-list fs-5"></i></label>
                            </div>
                        </form>
                        {{--                        VIEW GIRD/LIST FORM--}}

                        {{--                        SORTING--}}
                        <div class="d-flex align-items-center justify-content-between col-12 col-md-auto">
                            <div class="text-primary fw-bold me-3">
                                Sort by<i class="ms-2 bi bi-arrow-down-up"></i>
                            </div>
                            <form class="m-0">
                                <select class="form-select auto-submit" name="sort" id="sort"
                                        aria-label="sort" onchange="this.form.submit()">
                                    <option value="0" selected>Recommended</option>
                                    <option value="1">Rating: Low to High</option>
                                    <option value="2">Rating: High to Low</option>
                                    <option value="3">Price: Low to High</option>
                                    <option value="4">Price: High to Low</option>
                                </select>
                            </form>
                        </div>
                        {{--                        SORTING--}}
                    </div>

                    {{--                    ROOMS DIV--}}
                    @if($view == 'list')
                        <div id="rooms_div" class="d-flex flex-column">
                            @foreach($rooms as $room)
                                <div class="border rounded-5 p-3 shadow-sm row m-0 mb-3 overflow-hidden">
                                    <div class="col-4 p-0 overflow-hidden rounded-5" style="height: 200px">
                                        @foreach($room->images as $image)
                                            <img src="{{asset('storage/admin/rooms/'.$image->path)}}" alt="room_img"
                                                 class="img-fluid shadow-sm rounded-5 tran-3"/>
                                        @endforeach
                                    </div>

                                    <div class="col-8 row m-0 ps-3 pe-0 justify-content-between flex-column">
                                        <div class="col-12 p-0 d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <a href="">
                                                    <h4 class="fw-bold m-0 mb-2">
                                                        Room {{$room->name}}
                                                    </h4>
                                                    <div class="d-flex">
                                                        <div class="badge badge-primary rounded-pill">
                                                            <i class="bi bi-house me-1"></i> {{$room->roomType->name}}
                                                        </div>
                                                        <div class="badge badge-primary rounded-pill ms-2">
                                                            <i class="bi bi-people me-1"></i> {{$room->capacity}}
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div>
                                                <div class="text-warning mb-2">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i>
                                                </div>
                                                <div class="badge badge-warning rounded-pill">
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
                                                <a href="" class="btn btn-primary rounded-9">
                                                    Book now
                                                </a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div id="rooms_div" class="row row-cols-1 row-cols-md-2 gx-md-3">
                            @foreach($rooms as $room)
                                <div class="col-12 col-md-6 overflow-hidden">
                                    <div class="border rounded-5 p-3 shadow-sm row m-0 mb-3 ">
                                        <div class="col-12 p-0 overflow-hidden rounded-5" style="height: 260px">
                                            @foreach($room->images as $image)
                                                <img src="{{asset('storage/admin/rooms/'.$image->path)}}" alt="room_img"
                                                     class="img-fluid shadow-sm rounded-5 tran-3"/>
                                            @endforeach
                                        </div>

                                        <div class="col-12 row m-0 p-0 pt-3 justify-content-between flex-column">
                                            <div
                                                class="col-12 p-0 d-flex justify-content-between align-items-center mb-3">
                                                <div>
                                                    <a href="">
                                                        <h4 class="fw-bold m-0 mb-2">
                                                            Room {{$room->name}}
                                                        </h4>
                                                        <div class="d-flex">
                                                            <div class="badge badge-primary rounded-pill">
                                                                <i class="bi bi-house me-1"></i> {{$room->roomType->name}}
                                                            </div>
                                                            <div class="badge badge-primary rounded-pill ms-2">
                                                                <i class="bi bi-people me-1"></i> {{$room->capacity}}
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div>
                                                    <div class="text-warning mb-2">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-half"></i>
                                                    </div>
                                                    <div class="badge badge-warning rounded-pill">
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
                                                    <a href="" class="btn btn-primary rounded-9">
                                                        Book now
                                                    </a></div>
                                            </div>
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
