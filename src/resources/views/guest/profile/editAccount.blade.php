<title>Edit account - Skyrim Hotel</title>
<x-guestLayout>
    <section id="profile-section" class="m-nav">
        <div class="container">
            <div class="row py-5 justify-content-center position-relative">
                {{--alert save/cancel--}}
                @if (session('success'))
                    @include('partials.flashMsgSuccess')
                @endif
                {{--                MENU--}}
                <div class="col-10 col-lg-3 p-4 border rounded-5 shadow-sm">
                    @include('partials.guestProfile')
                </div>
                {{--                MENU--}}

                {{--                CONTENT--}}
                <div class="col-10 col-lg-9 p-4 ms-0 ms-lg-auto
                d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="text-primary fw-bold mb-4 mb-lg-0">
                            Edit account</h4>
                    </div>
                    {{--                    form--}}
                    <form method="post" action="{{route('guest.editAccount')}}"
                          enctype="multipart/form-data"
                          class="">
                        @csrf
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

                        <!-- Password input -->
                        <div class="mb-4">
                            <div data-mdb-input-init class="form-outline input-group"
                                 id="show_hide_password">
                                <input type="password" id="password" name="password" class="form-control"
                                       value="{{old('password')}}" required minlength="6"/>
                                <a href="#!" class="input-group-text">
                                    <i class="bi bi-eye-slash" aria-hidden="true"></i>
                                </a>
                                <label class="form-label" for="password">Password</label>
                            </div>
                            @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $error)
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

                        <!-- Submit button -->
                        <div class="d-flex justify-content-between justify-content-md-end align-items-center">
                            <a data-mdb-ripple-init href=""
                               class="btn btn-secondary me-2 rounded-9 tran-2">
                                Cancel
                            </a>
                            <button data-mdb-ripple-init type="submit"
                                    class="btn btn-primary rounded-9 tran-2">
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
