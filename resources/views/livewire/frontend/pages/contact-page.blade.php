@section('pageTitle', $pageTitle . ' - SMK TI BAZMA')
<div>
    <div class="row row-cards">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $pageTitle }}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="row row-cards">
                <div class="col-xl-8 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form wire:submit.prevent="create">
                                <div class="mb-3">
                                    <label class="form-label required">Your Name</label>
                                    <input type="text" class="form-control" wire:model.defer="name"
                                        name="example-text-input" placeholder="Enter your name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Email</label>
                                    <input type="text" class="form-control" wire:model.defer="email"
                                        name="example-text-input" placeholder="Enter email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Subjects</label>
                                    <input type="text" class="form-control" wire:model.defer="subjects"
                                        name="example-text-input" placeholder="Enter subjects">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" wire:model.defer="description" name="example-textarea-input" rows="6"
                                        placeholder="Content.."></textarea>
                                </div>
                                <small class="form-hint">
                                    Note: The purpose of this form is for what information you want to convey.
                                </small>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.582401377344!2d106.68681521391007!3d-6.574269166093577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69db2b478d2725%3A0xa31558d4689b78c5!2sIslamic%20Boarding%20School%20SMK%20TI%20BAZMA!5e0!3m2!1sen!2sid!4v1674409300491!5m2!1sen!2sid"
                                        height="300" width="320" allowfullscreen loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <b>
                                        <p>Address:</p>
                                    </b>
                                    <span>Jl. Raya Cikampak Cicadas, RT.1/RW.1, Cicadas, Kec. Ciampea, Kabupaten Bogor,
                                        Jawa Barat 16620
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <b>
                                        <p>Phone:</p>
                                    </b>
                                    <span>08 1111 4433 9
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <b>
                                        <p>Email:</p>
                                    </b>
                                    <span>info@smktibazma.sch.id
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
