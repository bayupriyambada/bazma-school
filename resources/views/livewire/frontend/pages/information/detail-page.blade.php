@section('pageTitle', $pageTitle . ' ' . $name . ' - SMK TI BAZMA')
<div>
    <div class="row row-cards">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $pageTitle . ' ' . $name }}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12 col-12">
            <div class="row row-cards">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="row row-cards">
                        {{-- <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <b>
                                        <h3>Career Title:</h3>
                                    </b>
                                    <h1>{{ Str::ucfirst($name) }}</h1>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <b>
                                        <h3>Description Information:</h3>
                                    </b>
                                    <p>{!! $description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12">
            <h3>Share:</h3>
            <div class="row row-cards">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" readonly id="clipboard" class="form-control"
                                value="{{ URL::current() }}">
                            <button class="btn click-clipboard btn-primary" data-clipboard-target="#clipboard"
                                type="button">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-12 col-md-12">
            <h3>Other Career</h3>
            <div class="row row-cards">
                @foreach ($otherCareers as $item)
                <div class="col-sm-12 col-md-6 col-lg-3">
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
                @endforeach
            </div>
        </div> --}}
    </div>
</div>
@push('js')
<script type="text/javascript">
    var Clipboard = new ClipboardJS('.click-clipboard');
</script>
@endpush
