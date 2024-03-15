<title>Room {{$room->name}} - Skyrim Hotel</title>
<x-guestLayout>
    <section id="rooms" class="m-nav">
        <div class="container">
            <div class="pt-5 mb-5">
                <h6 class="m-0 display-6 text-primary fw-bold">Room {{$room->name}}</h6>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('guest.home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('guest.rooms')}}">Rooms</a></li>
                    </ol>
                </nav>
            </div>
            {{--            room detail--}}
            <div class="mb-5 row">
                <div class="col-5">
                    <div style="height: 300px">
                        @if(count($roomImages) > 1)
                            <!-- Carousel wrapper -->
                            <div id="carouselMaterialStyle"
                                 class="carousel slide carousel-fade h-100 overflow-hidden rounded-5"
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
                                <div class="carousel-inner rounded-5 shadow-3 overflow-hidden">
                                    <!--  item -->
                                    @foreach($roomImages as $image)
                                        <div class="carousel-item {{$image == $roomImages[0] ? 'active' : '' }}">
                                            <img src="{{asset('storage/admin/rooms/'.$image->path)}}"
                                                 class="w-100 d-block tran-3"/>
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
                            <div class="h-100 rounded-5 shadow-3 overflow-hidden">
                                <!--  item -->
                                @foreach($roomImages as $image)
                                    <div class="carousel-item {{$image == $roomImages[0] ? 'active' : '' }}">
                                        <img src="{{asset('storage/admin/rooms/'.$image->path)}}"
                                             class="w-100 d-block tran-3"/>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-7">
                    <div class="bg-white rounded-5 border p-3 shadow-sm h-100">
                        aaaaaaaaaaaaaaaaa
                    </div>
                </div>
            </div>

            {{--            rating--}}
            <div class="mb-5">
                <h4 class="fw-bold text-primary">Reviews & Ratings</h4>
            </div>
        </div>
    </section>
</x-guestLayout>
