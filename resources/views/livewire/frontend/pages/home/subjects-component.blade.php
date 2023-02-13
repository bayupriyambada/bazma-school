<div>

    @forelse ($lessons as $item)
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
    @empty
    <div class="card p-2">
        <span class="text-danger">
            You don't have the data yet
        </span>
    </div>
    @endforelse
</div>
