<title>Edit room information - Skyrim Hotel</title>
<x-adminLayout>
    {{--------------- MAIN --------------}}
    <div class="p-3 bg-white rounded-5 shadow-3 mb-3">
        <div class="text-primary">
            <h4 class="fw-bold m-0">Rooms Management</h4>
        </div>
    </div>

    <div class="bg-white border rounded-5 shadow-3 overflow-hidden">
        <div
            class="p-3 rounded-top border-bottom">
            <div class="text-primary">
                <i class="bi bi-pencil-square me-2"></i>Edit room
            </div>
        </div>
        {{-- FORM  --}}

        <form method="post" action="{{ route('admin.rooms.update', $room) }}" enctype="multipart/form-data"
              class="m-0">
            @csrf
            @method('PUT')
            <div class="row flex-column flex-lg-row">
                <div class="col-12 col-lg-6 col-xl-4">
                    <!-- name input -->
                    <div class="p-3 col-12">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="name" name="name" class="form-control"
                                   value="{{ $room->name }}" required/>
                            <label class="form-label" for="name">Name</label>
                        </div>
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span class="text-danger fs-7">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <!-- capacity input -->
                    <div class="p-3 pt-0">
                        <div data-mdb-input-init class="form-outline">
                            <input type="number" id="capacity" name="capacity" class="form-control"
                                   value="{{ $room->capacity }}" min="1" max="10"
                                   required/>
                            <label class="form-label" for="capacity">Capacity</label>
                        </div>
                        @if ($errors->has('capacity'))
                            @foreach ($errors->get('capacity') as $error)
                                <span class="text-danger fs-7">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <!-- room type input -->
                    <div class="p-3 pt-0">
                        <select class="form-select" name="room_type_id" aria-label="room_type"
                                required {{count($roomTypes) == 0 ? 'disabled' : ''}}>
                            @if(count($roomTypes) == 0)
                                <option selected>No room type available</option>
                            @else
                                @foreach($roomTypes as $roomType)
                                    <option
                                        value="{{$roomType->id}}"
                                        {{$room->room_type_id == $roomType->id ? 'selected' : ''}}>
                                        {{$roomType->name}}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('room_type_id'))
                            @foreach ($errors->get('room_type_id') as $error)
                                <span class="text-danger fs-7">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>

                    <!-- image input -->
                    <div class="p-3 pt-0">
                        <label class="form-label" for="customFile">Add room images</label>
                        <input type="file" class="form-control" name="images[]" accept=".jpg,.jpeg,.webp,.png"
                               multiple/>
                        @if ($errors->has('images[]'))
                            @foreach ($errors->get('images[]') as $error)
                                <span class="text-danger fs-7">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-8">
                    {{--                    neu co anh --}}
                    @if(count($roomImages) != 0)
                        <div class="border m-3 rounded-5">
                            <div class="border-bottom p-3">
                                <i class="bi bi-image me-2"></i>Current room images
                            </div>
                            <div
                                class="p-3 pt-0 row row-cols-1 row-cols-md-2 row-cols-xl-4">
                                @foreach($roomImages as $path)
                                    <div class="overflow-hidden rounded-5 pt-3 h-100 room-img">
                                        <img src="{{asset('storage/admin/rooms/' . $path)}}"
                                             class="w-100 h-100 object-fit-cover border rounded-5"
                                             alt="room_img">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class=" d-flex justify-content-between justify-content-md-start border-top p-3">
                <a data-mdb-ripple-init href="{{ route('admin.rooms') }}"
                   class="btn btn-secondary rounded-9 tran-2 me-3">
                    Back
                </a>
                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit"
                        class="btn btn-primary rounded-9 tran-2">
                    Update
                </button>
            </div>
        </form>

    </div>

</x-adminLayout>
