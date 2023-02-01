@section('pageTitle', 'About School - SMK TI BAZMA')
<div>
    <div>
        <div class="row row-cards">
            <div class="col-md-12 col-xl-12">
                <div class="row row-cards">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form wire:submit.prevent="updateTitleAndTag()">
                                    <div class="mb-3">
                                        <label class="form-label required">Name Gallery</label>
                                        <input type="text" wire:model="site_title" class="form-control @error('name') is-invalid @enderror"
                                            name="example-text-input" placeholder="Eg: Gallery Example">
                                        @error('site_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">TagLine Title</label>
                                        <input type="text" wire:model="tag_title" class="form-control @error('tag_title') is-invalid @enderror"
                                            name="example-text-input" placeholder="Eg: TagLine School">
                                        @error('tag_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Phone Number</label>
                                        <input type="text" wire:model="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                                            name="example-text-input" placeholder="Eg: TagLine School">
                                        @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Address</label>
                                        <input type="text" wire:model="address" class="form-control @error('address') is-invalid @enderror"
                                            name="example-text-input" placeholder="Eg: TagLine School">
                                        @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Email</label>
                                        <input type="text" wire:model="email" class="form-control @error('email') is-invalid @enderror"
                                            name="example-text-input" placeholder="Eg: TagLine School">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Location (embed google maps)</label>
                                        <input type="text" wire:model="location" class="form-control @error('location') is-invalid @enderror"
                                            name="example-text-input" placeholder="Eg: TagLine School">
                                        @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" wire:loading.attr="disabled"
                                        class="btn btn-primary ms-auto mt-2">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
