<title>Room Types management - Skyrim Hotel</title>
<x-adminLayout>
    <div class="slideDown">
        @if (session('success'))
            @include('partials.flashMsgSuccessCenter')
        @endif
    </div>
    <div class="text-primary mb-3">
        <h3 class="fw-bold m-0">Room Types Management</h3>
    </div>

    {{-- MAIN  --}}
    <div class="border rounded-5 shadow-sm overflow-hidden">
        <div class="p-3 d-flex flex-column flex-md-row justify-content-between rounded-top border-bottom">
            <div class="text-primary mb-3 mb-md-0">
                <i class="bi bi-table me-2"></i>Room Types Datatable
            </div>
            {{-- Button  --}}
            <div class="d-flex align-items-center justify-content-start justify-content-md-end">
                <a href="{{ route('admin.roomTypes.create') }}" class="d-flex align-items-center me-3">
                    <i class="me-2 bi bi-plus-circle"></i>Add new room type
                </a>
                <a href="{{ route('admin.roomTypes.downloadPdf') }}" class="d-flex align-items-center">
                    <i class="me-2 bi bi-download"></i>Export
                </a>
            </div>
        </div>
        <div class="p-3 bg-white rounded-bottom text-muted">
            @if (count($roomTypes) != 0)
                <table
                    class="tran-3 table table-bordered  align-middle mb-0 bg-white border w-100"
                    id="dataTable">
                    <thead>
                    <tr>
                        <th class="align-middle text-center">ID</th>
                        <th class="align-middle">Name</th>
                        <th class="align-middle">Description</th>
                        <th class="align-middle text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roomTypes as $roomType)
                        <tr>
                            <td class="text-center">
                                {{ $roomType->id }}
                            </td>
                            <td class="text-break">
                                {{ $roomType->name }}
                            </td>
                            <td class="text-break">
                                {{ $roomType->description }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('admin.roomTypes.edit', $roomType) }}"
                                       class="btn btn-tertiary me-3">
                                        Edit
                                    </a>
                                    <a class="btn btn-tertiary text-danger" data-mdb-ripple-init
                                       data-mdb-modal-init href="#deleteModal{{$roomType->id}}">
                                        Delete
                                    </a>
                                </div>
                                <!-- DeleteModal -->
                                <div class="modal slideUp" id="deleteModal{{$roomType->id}}" tabindex="-1"
                                     aria-labelledby="deleteModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger" id="deleteModalLabel">
                                                    <i class="bi bi-x-circle me-2"></i>Are you sure?
                                                </h5>
                                                <button type="button" class="btn-close" data-mdb-ripple-init
                                                        data-mdb-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">You won't be able to revert this!</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light rounded" data-mdb-ripple-init
                                                        data-mdb-dismiss="modal">Cancel
                                                </button>
                                                <form method="post"
                                                      action="{{ route('admin.roomTypes.destroy', $roomType) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger rounded" data-mdb-ripple-init>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                No results
            @endif
        </div>
    </div>
</x-adminLayout>
<script>
    $(document).ready(function () {
        $("#dataTable").DataTable({
            columnDefs: [
                {
                    orderable: true,
                    targets: 3,
                },
            ],
            pagingType: "full_numbers",
            layout: {
                topEnd: {
                    search: {
                        text: "",
                        placeholder: "Type to search...",
                    },
                },
                bottomEnd: {
                    paging: {
                        numbers: 3,
                    },
                },
            },
        });
    });
</script>
