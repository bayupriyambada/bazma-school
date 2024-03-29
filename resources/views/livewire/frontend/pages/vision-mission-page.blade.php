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
        <div class="col-xl-12 col-md-12" wire:poll>
            <div class="row row-cards">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {!! $content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
