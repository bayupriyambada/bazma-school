@section('pageTitle', 'Lesson - SMK TI BAZMA')
<div>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <a href="{{ route('pages.lesson.create') }}" class="btn btn-primary ms-auto">Add New Data</a>
                    </div>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                        <div class="text-muted">
                            Show
                            <div class="mx-2 d-inline-block">
                                <input type="text" wire:model="paginateLesson" class="form-control form-control-sm"
                                    value="8" size="3" aria-label="Lesson count">
                            </div>
                            entries
                        </div>
                        <div class="ms-auto text-muted">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="search" wire:model="q" class="form-control form-control-sm"
                                    aria-label="Search Code, Name Lesson">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select all invoices"></th>
                                <th class="w-1">No.
                                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="6 15 12 9 18 15"></polyline>
                                    </svg>
                                </th>
                                <th>Code Lesson</th>
                                <th>Name Lesson</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allLessons as $lesson)
                                <tr>
                                    <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                            aria-label="Select invoice"></td>
                                    <td><span class="text-muted">{{ $loop->iteration }}</span></td>
                                    <td><a href="invoice.html" class="text-reset"
                                            tabindex="-1">{{ $lesson->code_lesson }}</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger me-1"></span> {{ $lesson->name_lesson }}
                                    </td>
                                    <td class="text-end">
                                        <span class="dropdown">
                                            <button class="btn dropdown-toggle align-text-top"
                                                data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item"
                                                    href="{{ route('pages.lesson.edit', $lesson->uuid) }}">
                                                    Edit
                                                </a>
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="$emit('confirmDelete', {{ json_encode($lesson->uuid) }})">
                                                    Delete
                                                </a>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {{ $allLessons->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- delete Modal --}}
    <div wire:ignore.self class="modal modal-blur fade" id="deleteData" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">Are you sure?</div>
                    <div>If you want to delete, deleted data cannot be restored.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">Cancel</button>
                    <button wire:click.prevent="delete()" type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">Yes, delete {{ $name_lesson }}</button>
                </div>
            </div>
        </div>
    </div>
    {{-- delete Modal --}}
    @push('js')
        <script>
            window.addEventListener('showModalDelete', function(event) {
                $('#deleteData').modal('show')
            })
            window.addEventListener('hideModalDelete', function(event) {
                $('#deleteData').modal('hide')
            })
        </script>
    @endpush
</div>
