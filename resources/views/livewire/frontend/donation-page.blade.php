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
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {!! $donations !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
