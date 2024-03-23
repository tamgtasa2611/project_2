<title>Edit account - Skyrim Hotel</title>
<x-guestLayout>
    <section id="profile-section" class="m-nav">
        <div class="container">
            <div class="row py-5 justify-content-center position-relative">
                {{--                MENU--}}
                <div class="col-10 col-lg-3 p-4 border rounded-5 shadow-sm">
                    @include('partials.guest.guestProfile')
                </div>
                {{--                MENU--}}

                {{--                CONTENT--}}
                <div class="col-10 col-lg-9 p-4 ms-0 ms-lg-auto
                d-flex flex-column justify-content-between">
                    {{--alert edit success--}}
                    @if (session('success'))
                        @include('partials.flashMsgSuccess')
                    @endif
                    {{--alert edit fail--}}
                    @if (session('failed'))
                        @include('partials.flashMsgFail')
                    @endif
                    <div>
                        <h4 class="text-primary fw-bold mb-4">
                            Edit account</h4>
                    </div>
                    {{--                    form--}}
                    <form method="post" action="{{route('guest.updateAccount')}}"
                          enctype="multipart/form-data"
                          class="mb-0">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-12 col-lg-9">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row mb-4">
                                    <div class="col">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" id="first_name" name="first_name" class="form-control"
                                                   value="{{$guest->first_name}}" required/>
                                            <label class="form-label" for="first_name">First name</label>
                                        </div>
                                        @if ($errors->has('first_name'))
                                            @foreach ($errors->get('first_name') as $error)
                                                <span class="text-danger fs-7">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col">
                                        <div data-mdb-input-init class="form-outline">
                                            <input type="text" id="last_name" name="last_name" class="form-control"
                                                   value="{{$guest->last_name}}" required/>
                                            <label class="form-label" for="last_name">Last name</label>
                                        </div>
                                        @if ($errors->has('last_name'))
                                            @foreach ($errors->get('last_name') as $error)
                                                <span class="text-danger fs-7">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <!-- Email input -->
                                <div class="mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="email" id="email" name="email" class="form-control"
                                               value="{{$guest->email}}" required/>
                                        <label class="form-label" for="email">Email address</label>
                                    </div>
                                    @if ($errors->has('email'))
                                        @foreach ($errors->get('email') as $error)
                                            <span class="text-danger fs-7">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>

                                <!-- Phone Number input -->
                                <div class="mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="tel" id="phone" name="phone" class="form-control"
                                               value="{{$guest->phone_number}}" maxlength="20" required/>
                                        <label class="form-label" for="phone">Phone number</label>
                                    </div>
                                    @if ($errors->has('phone'))
                                        @foreach ($errors->get('phone') as $error)
                                            <span class="text-danger fs-7">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            {{-- Image --}}
                            <div class="col-12 col-lg-3">
                                <div class="mb-4">
                                    <input type="file" class="form-control" id="image" name="image" value=" "/>
                                </div>
                                <div>
                                    <img
                                        src="{{ $guest->image != "" ? asset('storage/admin/guest/' . $guest->image) : asset('images/noavt.jpg') }}"
                                        alt="guest_image"
                                        class="w-100 h-auto">
                                </div>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <div
                            class="d-flex flex-column-reverse flex-lg-row justify-content-between justify-content-md-end align-items-center">
                            <a data-mdb-ripple-init href="{{ route('guest.editAccount') }}"
                               class="btn btn-secondary col-12 col-lg-auto me-lg-3 rounded-9 tran-2">
                                Cancel
                            </a>
                            <button data-mdb-ripple-init type="submit"
                                    class="btn btn-primary  col-12 col-lg-auto mb-3  mb-lg-0 rounded-9 tran-2">
                                Save
                            </button>
                        </div>
                    </form>
                    {{--                    form--}}
                </div>
                {{--                CONTENT--}}
            </div>
        </div>
    </section>
</x-guestLayout>
