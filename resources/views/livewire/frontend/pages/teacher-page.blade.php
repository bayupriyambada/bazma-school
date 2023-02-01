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
        @foreach ($teachers as $item)
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-4 text-center">
                        @if ($item->picture)
                        <span class="avatar avatar-xl mb-3 avatar-rounded"
                            style="background-image: url({{ Storage::url($item->picture) }})"></span>
                        @else
                            <span class="avatar avatar-xl mb-3 avatar-rounded"
                                style="background-image: url('https://ui-avatars.com/api/?name={{ $item->name }}')"></span>
                        @endif
                        <h3 class="m-0 mb-1"><a href="#">{{ $item->name }}</a></h3>
                        <div class="text-muted">{{ $item->lesson->name_lesson }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
