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
                                    style="height: 450px;" alt="Card side image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-12">
            <div class="row row-cards">
                <div class="col-md-7 col-lg-9 col-sm-12">
                    <h3><b>Recent Career</b></h3>
                    <div class="row row-cards">
                        @foreach ($otherCareers as $item)
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="{{ route('p.career.details', $item->slug) }}" class="d-block"><img
                                            src="{{ Storage::url($item->image) }}" class="card-img-top"
                                            height="200"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <div>{{ $item->name }}</div>
                                                <div class="text-muted">{{ $item->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-5 col-lg-3 col-sm-12">
                    <h3><b>Subjects</b></h3>
                    @foreach ($lessons as $item)
                        <div class="col-sm-12 col-md-6 col-lg-12">
                            <div class="card card-sm mb-2">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div><b>{{ $item->name_lesson }}</b></div>
                                            <div class="text-muted">{{ $item->code_lesson }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
