<div>
    <div class="row row-cards">
        @forelse ($otherCareers as $item)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card card-sm">
                    <a href="{{ route('p.career.details', $item->slug) }}" class="d-block"><img
                            src="{{ Storage::url($item->image) }}" class="card-img-top" height="200"></a>
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
        @empty
            <div class="card p-2">
                <span class="text-danger">
                    You don't have the data yet
                </span>
            </div>
        @endforelse
    </div>
</div>
