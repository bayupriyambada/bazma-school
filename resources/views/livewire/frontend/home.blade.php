@section('pageTitle', $pageTitle . ' - SMK TI BAZMA')
<div>

    <div class="row row-cards">
        <div class="col-md-12 col-xl-12">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="row row-0">
                            <div class="col-12">
                                <img src="{{ asset('assets/static/photos/bazma.jpg') }}" class="w-100 object-cover"
                                    style="height: 500px;" alt="Card side image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xl">
        <div class="page-body">
            <div class="col-md-12 col-xl-12">
                <div class="row row-cards">
                    <div class="col-md-7 col-lg-9 col-sm-12">
                        <div class="row row-cards">
                            <div class="col-12">
                                <h3><b>Recent Career</b></h3>
                                @livewire('frontend.pages.home.careercomponent')
                            </div>
                            <div class="col-12">
                                <h3><b>Recent Image</b></h3>
                                @livewire('frontend.pages.home.gallery-images-component')
                            </div>
                            <div class="col-12">
                                <h3><b>Recent Videos</b></h3>
                                @livewire('frontend.pages.home.gallery-videos-component')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-3 col-sm-12">
                        <div class="row row-cards">
                            <div class="col-12">
                                <h3><b>Information</b></h3>
                                @livewire('frontend.pages.home.information-component')
                            </div>
                            <div class="col-12">
                                <h3><b>Subjects</b></h3>
                                @livewire('frontend.pages.home.subjects-component')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
