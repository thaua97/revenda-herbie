@extends('layouts.pub')
@section('page')
  <div class="container">
    <div class="row">
        <div class="col s12">
            <div style="padding-top:20px;" class="col s12 m1">
              <button form="search" type="submit" class="btn-floating waves-effect waves-light bgnv">
                <i class="material-icons">search</i>
              </button>
            </div>
            <div class="col s12 m11">
                <form id="search" class="" action="{{ route('carros.search')}}" method="post">
                    {{ csrf_field() }}
                    <div class="input-field">
                      <input id="search" name="pesq" class="validate" type="search">
                      <label for="search">Qual o valor que você procura?</label>
                    </div>
                  </form>
            </div>
          </div>
        <h4>Destaques</h4>
        
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
                <span class="card-title">{{$d->modelo}} </span>
                <span class="card-title">{{$d->preco}} </span>
            </div>
          </div>
        </div>
        @else
        @endif
        @empty
        @endforelse
    </div>
    <div class="divider"></div>
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
                <span class="green-text">{{$c->preco}}</span>
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
