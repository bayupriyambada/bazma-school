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
        <div class="row justify-content-center mt-4">
              <div class="col-8">
                <div class="card">
                  <div class="card-body">
                    <div class="divide-y">
                        @foreach ($informations as $item)
                        <div>
                          <div class="row">
                            <div class="col-auto">
                              <span class="avatar">{{$loop->iteration}}</span>
                            </div>
                            <div class="col">
                                <a href="{{ route("p.information.details", $item->slug) }}">
                                    <div class="text-truncate">
                                      {{$item->name}}
                                    </div>
                                    <div class="text-muted">{!!Str::limit($item->description, 100)!!}</div>
                                    <div class="text-muted">{{$item->created_at->diffForHumans()}}</div>
                                </a>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
