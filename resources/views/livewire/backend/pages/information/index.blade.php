@section('pageTitle', 'Information - SMK TI BAZMA')
<div>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <a href="{{ route('pages.information.create') }}" class="btn btn-primary ms-auto">Add New Data</a>
                    </div>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                        <div class="text-muted">
                            Show
                            <div class="mx-2 d-inline-block">
                                <input type="number" wire:model="paginateLesson" class="form-control form-control-sm"
                                    aria-label="Lesson count">
                            </div>
                            entries
                        </div>
                        <div class="ms-auto text-muted">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="search" wire:model="q" class="form-control form-control-sm"
                                    placeholder="Search name...">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="6 15 12 9 18 15"></polyline>
                                    </svg>
                                </th>
                                <th>Name Teacher</th>
                                <th>Lesson</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($information as $item)
                                <tr>
                                    <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                            aria-label="Select invoice"></td>
                                    <td><span class="text-muted">{{ $loop->iteration }}</span></td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>
                                        <span class="badge bg-danger me-1"></span> {{ $item->slug }}
                                    </td>
                                    <td class="text-end">
                                        <a class="btn btn-yellow btn-icon"
                                            href="{{ route('pages.information.edit', $item->uuid) }}">Edit</a>
                                        <a class="btn btn-red btn-icon" href="#"
                                            wire:click.prevent="$emit('confirmDelete', {{ json_encode($item->uuid) }})">Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {{ $information->links() }}
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
                    <div>If you want to delete this data {{ $name }}, it cannot be restored</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">Cancel</button>
                    <button wire:click.prevent="delete()" type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">Yes, Delete!</button>
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
