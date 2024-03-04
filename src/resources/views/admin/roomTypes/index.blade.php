<title>Room Types management - Skyrim Hotel</title>
<x-adminLayout>
    <div class="slideDown">
        @if (session('success'))
            @include('partials.flashMsgSuccessCenter')
        @endif
    </div>
    {{-- HEADING --}}
    <div class="text-primary mb-5">
        <h3 class="fw-bold">Room Types Management</h3>
    </div>
    {{-- ACTION  --}}
    <div class="row d-flex justify-content-between align-items-center">
        {{-- Button  --}}
        <div class="col-12 col-md-4 mb-3 d-flex justify-content-between justify-content-md-start">
            <a href="{{ route('admin.roomTypes.create') }}" class="d-flex align-items-center me-3">
                <i class="me-2 bi bi-plus-circle"></i>Add new room type
            </a>
            <a href="{{ route('admin.roomTypes.downloadPdf') }}" class="d-flex align-items-center">
                <i class="me-2 bi bi-download"></i>Export
            </a>
        </div>
        <div class="col-12 col-md-4 d-md-flex align-items-center justify-content-end">
            {{-- SEARCH --}}
            <form class="d-flex input-group me-md-3 mb-3" method="get">
                <div class="input-group">
                    <input type="search" class="form-control rounded-start w-auto" placeholder="Search" name="search"
                        id="search" value="{{ $search }}" aria-label="Search"
                        aria-describedby="search-addon" />
                    <input type="hidden" name="pagination_num" value="{{ $paginationNum }}" class="hidden">
                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            {{-- pagination  --}}
            <form action="" method="get" class="mb-3">
                <select name="pagination_num" id="ajaxSelect" class="form-select w-auto" onchange="this.form.submit()">
                    <option value="5" {{ $paginationNum == 5 ? 'selected' : '' }}>5 records</option>
                    <option value="10" {{ $paginationNum == 10 ? 'selected' : '' }}>10 records</option>
                    <option value="15" {{ $paginationNum == 15 ? 'selected' : '' }}>15 records</option>
                    <option value="20" {{ $paginationNum == 20 ? 'selected' : '' }}>20 records</option>
                </select>
                <input type="hidden" name="search" value="{{ $search }}" class="hidden">
            </form>
        </div>
    </div>
    @if (count($roomTypes) != 0)
        {{-- MAIN  --}}
        <div class="overflow-x-auto">
            <table class="table align-middle mb-0 bg-white border">
                <thead class="table-primary">
                    <tr>
                        <th class="align-middle">ID</th>
                        <th class="align-middle">Type name</th>
                        <th class="align-middle">Description</th>
                        <th class="text-center align-middle">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roomTypes as $roomType)
                        <tr>
                            <td>
                                {{ $roomType->id }}
                            </td>
                            <td>
                                {{ $roomType->name }}
                            </td>
                            <td>
                                {{ $roomType->description }}
                            </td>

                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('admin.roomTypes.edit', $roomType) }}"
                                        class="btn btn-tertiary me-3">
                                        Edit
                                    </a>
                                    <button class="btn btn-tertiary text-danger" data-mdb-ripple-init
                                        data-mdb-modal-init data-mdb-target="#deleteModal">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-4">
            {{ $roomTypes->onEachSide(2)->links() }}
        </div>

        <!-- DeleteModal -->
        <div class="modal slideUp" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="deleteModalLabel">
                            Are you sure?
                        </h5>
                        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">You won't be able to revert this!</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light rounded-9" data-mdb-ripple-init
                            data-mdb-dismiss="modal">Cancel</button>
                        <form method="post" action="{{ route('admin.roomTypes.destroy', $roomType) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger rounded-9" data-mdb-ripple-init>
                                Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        No results
    @endif
</x-adminLayout>
