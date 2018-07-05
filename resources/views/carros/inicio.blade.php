@extends('layouts.pub')
@section('page')

  <div class="container">
    <div class="row">
        <h4>Destaques</h4>
        <div class="divider"></div>
        <br>
        @forelse($carros as $d)
        @if($d->destaque == "*")
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
                @if(Storage::exists($d->foto))
                  <img class="responsive" src="{{url('storage/'.$d->foto)}}" alt="foto">
                @else
                  <img class="responsive" src="https://png.pngtree.com/element_origin_min_pic/17/04/13/3281ed9397418c690ce9586ef9a416da.jpg">
                @endif
              <a class="btn-floating halfway-fab waves-effect waves-light bgnv" href="{{ route('site.show', $d->id)}}"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
                <span class="card-title">{{$d->modelo}}</span>
            </div>
          </div>
        </div>
        @else
        @endif
        @empty
        @endforelse
    </div>
    <div class="row">
        <h4>Outros modelos</h4>
        <div class="divider"></div>
        <br>
        @forelse($carros as $c)
        @if($c->destaque == "")
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
                @if(Storage::exists($c->foto))
                  <img class="responsive" src="{{url('storage/'.$c->foto)}}" alt="foto">
                @else
                  <img class="responsive" src="https://png.pngtree.com/element_origin_min_pic/17/04/13/3281ed9397418c690ce9586ef9a416da.jpg">
                @endif
              <a class="btn-floating halfway-fab waves-effect waves-light bgnv" href="{{ route('site.show', $c->id)}}"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
                <span class="card-title">{{$c->modelo}}</span>
            </div>
          </div>
        </div>
        @else
        @endif
        @empty
        @endforelse
    </div>
  </div>
@endsection
