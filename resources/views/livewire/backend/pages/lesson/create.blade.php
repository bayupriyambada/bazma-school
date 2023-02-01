@section('pageTitle', 'Create Lesson - SMK TI BAZMA')
<div>
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <a href="{{ route('pages.lesson.index') }}" class="btn btn-yellow ms-auto">Go Back</a>
                    </div>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="col-md-6 col-xl-12">
                        <form wire:submit.prevent="create()">
                            <div class="mb-3">
                                <label class="form-label">Code Lesson</label>
                                <input type="text" wire:model.defer="code_lesson"
                                    class="form-control @error('code_lesson') is-invalid @enderror"
                                    name="example-text-input" placeholder="Eg: MK001">
                                @error('code_lesson')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name Lesson</label>
                                <input type="text" wire:model.defer="name_lesson"
                                    class="form-control @error('name_lesson') is-invalid @enderror"
                                    name="example-text-input" placeholder="Eg: English">
                                @error('name_lesson')
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
