<title>Edit admin information - Skyrim Hotel</title>
<x-adminLayout>
    <div class="p-3 bg-white rounded-5 shadow-3 mb-3">
        <div class="text-primary">
            <h4 class="fw-bold m-0">Admins Management</h4>
        </div>
    </div>

    {{-- FORM  --}}
    <div class="bg-white border rounded-5 shadow-3 overflow-hidden">
        <div class="row d-flex justify-content-center">
            <form method="post" action="{{ route('admin.admins.update', $admin) }}" enctype="multipart/form-data"
                  class="bg-white p-5 border rounded-5 shadow-sm col-md-8">
                @csrf
                @method('PUT')
                {{--                    heading --}}
                <div class="d-flex justify-content-center align-items-center mb-5">
                    <h4 class="text-primary fw-bold">Edit admin information</h4>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div data-mdb-input-init class="form-outline">
                                    <input type="text" id="first_name" name="first_name" class="form-control"
                                           value="{{ $admin->first_name }}" required/>
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
                                           value="{{ $admin->last_name }}" required/>
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
                                       value="{{ $admin->email }}" required/>
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
                            <div data-mdb-input-init class="form-outline input-group" id="show_hide_password">
                                <input type="password" id="password" name="password" class="form-control"
                                       value="{{ $admin->password }}" required minlength="6"/>
                                <a href="#!" class="input-group-text">
                                    <i class="bi bi-eye-slash" aria-hidden="true"></i>
                                </a>
                                <label class="form-label" for="password">Password (hashed)</label>
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
                                       value="{{ $admin->phone_number }}" maxlength="20" required/>
                                <label class="form-label" for="phone">Phone number</label>
                            </div>
                            @if ($errors->has('phone'))
                                @foreach ($errors->get('phone') as $error)
                                    <span class="text-danger fs-7">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>

                        <!-- status input -->
                        <div class="mb-4 d-flex flex-column align-items-center flex-md-row">
                            <div class="w-25 mb-3 mb-md-0">
                                Status:
                            </div>
                            <div class="w-75 d-flex justify-content-center justify-content-md-end">
                                <div class="me-3">
                                    <input class="btn-check tran-2" type="radio" name="level" value="0"
                                           id="owner" {{ $admin->level == 0 ? 'checked' : '' }} />
                                    <label class="btn btn-outline-light tran-2 text-primary fw-bold"
                                           for="owner">Owner</label>
                                </div>

                                <div>
                                    <input class="btn-check tran-2" type="radio" name="level" value="1"
                                           id="employee" {{ $admin->level == 1 ? 'checked' : '' }} />
                                    <label class="btn btn-outline-light tran-2 text-danger fw-bold"
                                           for="employee">Employee</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Image --}}
                    <div class="col-12 col-lg-4">
                        <div class="mb-4">
                            <input type="file" class="form-control" id="image" name="image" value=" "/>
                        </div>
                        <div class="mb-4">
                            <img
                                src="{{ $admin->image != "" ? asset('storage/admin/admins/' . $admin->image) : asset('images/noavt.jpg') }}"
                                alt="admin_image"
                                class="w-100 h-auto">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a data-mdb-ripple-init href="{{ route('admin.admins') }}" class="btn btn-tertiary tran-2">
                        Back
                    </a>
                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary tran-2">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-adminLayout>
