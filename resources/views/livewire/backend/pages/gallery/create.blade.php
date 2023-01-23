@section('pageTitle', 'Create Gallery - SMK TI BAZMA')
<div>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <a href="{{ route('pages.gallery.index') }}" class="btn btn-yellow ms-auto">Go Back</a>
                    </div>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="col-md-6 col-xl-12">
                        <form wire:submit.prevent="create()">
                            <div class="mb-3">
                                <label class="form-label required">Name Gallery</label>
                                <input type="text" wire:model.defer="name"
                                    class="form-control @error('name') is-invalid @enderror" name="example-text-input"
                                    placeholder="Eg: Gallery Example">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Video (Url)</label>
                                <input type="text" wire:model.defer="video"
                                    class="form-control @error('video') is-invalid @enderror" name="example-text-input"
                                    placeholder="Eg: Url Youtube">
                                @error('video')
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
