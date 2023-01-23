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
        @foreach ($galleryImages as $item)
            <div class="col-sm-6 col-lg-4">
                <div class="card card-sm">
                    <a href="#" class="d-block"><img src="{{ Storage::url($item->picture) }}" class="card-img-top"
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
