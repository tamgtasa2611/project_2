<title>Add new room type - Skyrim Hotel</title>
<x-adminLayout>
    @if (session('failed'))
        @include('partials.flashMsgFail')
    @endif
    {{-- HEADING --}}
    <div class="text-primary mb-5">
        <h3 class="fw-bold">Room Types Management</h3>
    </div>
    {{-- FORM  --}}
    <div class="row d-flex justify-content-center">
        <form method="post" action="{{ route('admin.roomTypes.store') }}" enctype="multipart/form-data"
            class="bg-white p-5 rounded-5 border shadow-sm col-md-8 col-lg-6 col-xl-4">
            @csrf
            {{--                    heading --}}
            <div class="d-flex justify-content-center align-items-center mb-5">
                <h4 class="text-primary fw-bold">Add a new room type</h4>
            </div>

            <!-- name input -->
            <div class="mb-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                        required />
                    <label class="form-label" for="name">Type name</label>
                </div>
                @if ($errors->has('name'))
                    @foreach ($errors->get('name') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif
            </div>

            <!-- description Number input -->
            <div class="mb-4">
                <div data-mdb-input-init class="form-outline">
                    <textarea id="description" name="description" class="form-control" value="{{ old('description') }}" rows="4"></textarea>
                    <label class="form-label" for="description">Description</label>
                </div>
                @if ($errors->has('description'))
                    @foreach ($errors->get('description') as $error)
                        <span class="text-danger fs-7">{{ $error }}</span>
                    @endforeach
                @endif
            </div>

            <div class="d-flex justify-content-between">
                <a data-mdb-ripple-init href="{{ route('admin.roomTypes') }}" class="btn btn-tertiary rounded-9 tran-2">
                    Back
                </a>
                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-primary rounded-9 tran-2">
                    Add
                </button>
            </div>
        </form>
    </div>

</x-adminLayout>
