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
        @foreach ($galleries as $item)
            <div class="col-sm-6 col-lg-4">
                <div class="card card-sm">
                    <x-embed width height="400" url="{{ $item->video }}" />

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
