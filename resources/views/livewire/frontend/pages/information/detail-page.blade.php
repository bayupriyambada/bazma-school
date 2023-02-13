@section('pageTitle', $name . ' - SMK TI BAZMA')
<div>
    <div class="container-xl">
        <div class="page-body">
            <div class="row row-cards">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ $name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="row row-cards">
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="row row-cards">
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
                <div class="col-xl-12 col-md-12 col-12">
                    <h3>Share:</h3>
                    <div class="row row-cards">
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="input-group">
                                        <input type="text" readonly id="clipboard" class="form-control"
                                            value="{{ URL::current() }}">
                                        <button class="btn click-clipboard btn-primary"
                                            data-clipboard-target="#clipboard" type="button">Copy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@push('js')
    <script type="text/javascript">
        var Clipboard = new ClipboardJS('.click-clipboard');
    </script>
@endpush
