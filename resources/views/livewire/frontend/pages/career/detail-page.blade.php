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
        {{-- @dump($closed <= $registration_deadline) --}}
        @if ($closed <= $registration_deadline)
        <div class="col-xl-12 col-md-12 col-12">
            <div class="row row-cards">
                <div class="col-xl-4 col-md-4 col-12">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card card-sm">
                                <img src="{{ Storage::url($image) }}" class="p-2" height="250" width="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="empty">
                                    <b>
                                        <h3>Scan QR Link:</h3>
                                    </b>
                                    {!! QrCode::size(150)->generate($link_url ?? URL::current()) !!}
                                    <div class="empty-action">
                                        <a href="{{ $link_url ?? URL::current() }}" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="10" cy="10" r="7"></circle>
                                                <line x1="21" y1="21" x2="15" y2="15">
                                                </line>
                                            </svg>
                                            Click Link / Scan QR
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-8 col-12">
                    <div class="row row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <b>
                                        <h3>Career Title:</h3>
                                    </b>
                                    <h1>{{ Str::ucfirst($name) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <b>
                                        <h3>Description Career:</h3>
                                    </b>
                                    <p>{!! $content !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <b>
                                        <h3>Career Registration Deadline:</h3>
                                    </b>
                                    <p>{{ $registration_deadline ?? 'Not Found' }}</p>

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
        @else
        <div class="col-xl-12 col-md-12 col-12">
            <div class="empty">
                <div class="empty-img">
                </div>
                <p class="empty-title text-danger">Tutup</p>

            </div>
        </div>
        @endif
        <div class="col-xl-12 col-md-12">
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
        </div>
    </div>
</div>
@push('js')
    <script type="text/javascript">
        var Clipboard = new ClipboardJS('.click-clipboard');
    </script>
@endpush
