@section('pageTitle', 'Edit ' . $name . '- SMK TI BAZMA')
<div>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <a href="{{ route('pages.gallery.images.index') }}" class="btn btn-yellow ms-auto">Go Back</a>
                    </div>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="col-md-6 col-xl-12">
                        <form wire:submit.prevent="update">
                            <div class="mb-3">
                                <label class="form-label required">Name Gallery Images</label>
                                <input type="text" wire:model.defer="name"
                                    class="form-control @error('name') is-invalid @enderror" name="example-text-input"
                                    placeholder="Eg: Teacher Example">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Picture</label>
                                <input type="file" class="form-control" id="exampleInputName" wire:model="picture"
                                    value="{{ $picture }}">
                                @if ($oldPicture)
                                    Photo Preview:
                                    <img class="mt-4" width="200" height="100"
                                        src="{{ Storage::url($oldPicture) }}">
                                @elseif ($picture)
                                    <img class="mt-4" width="200" height="100"
                                        src="{{ $picture->temporaryUrl() }}">
                                @endif
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
@endpush
