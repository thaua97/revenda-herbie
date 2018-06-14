@extends('layouts.pub')
@section('page')

  <div class="container">
    <div class="row">
        @foreach($carros as $c)
        <div class="col s12 m4">
          <div class="card">
            <div class="card-image">
                @if($c->img == '')
                    <img class="responsive" src="https://png.pngtree.com/element_origin_min_pic/17/04/13/3281ed9397418c690ce9586ef9a416da.jpg">
                @else
                    <img class="responsive" src="">                    
                @endif
              <a class="btn-floating halfway-fab waves-effect waves-light bgnv" href="{{ route('site.show', $c->id)}}"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
                <span class="card-title">{{$c->modelo}}</span>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
@endsection
