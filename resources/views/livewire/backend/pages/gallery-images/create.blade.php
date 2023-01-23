@section('pageTitle', 'Create Gallery Images - SMK TI BAZMA')
<div>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <a href="{{ route('pages.teacher.index') }}" class="btn btn-yellow ms-auto">Go Back</a>
                    </div>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="col-md-6 col-xl-12">
                        <form wire:submit.prevent="create()">
                            <div class="mb-3">
                                <label class="form-label">Your Name</label>
                                <input type="text" wire:model.defer="name"
                                    class="form-control @error('name') is-invalid @enderror" name="example-text-input"
                                    placeholder="Eg: Teacher Example">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Picture</label>
                                <input type="file" class="form-control" id="exampleInputName" wire:model="picture">
                                <div wire:loading wire:target="picture">Uploading...</div>
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
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
