@extends('layouts.pub')
@section('page')
<div class="container">
    <br>
    <br>
    <div class="row">
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    @if(Storage::exists($reg->foto))
                        <img class="responsive" src="{{url('storage/'.$reg->foto)}}" alt="foto">
                    @else
                        <img class="responsive" src="https://png.pngtree.com/element_origin_min_pic/17/04/13/3281ed9397418c690ce9586ef9a416da.jpg">
                    @endif
                </div>
                <div class="card-content">
                    <span class="grey-text"><small>Modelo</small></span>
                    <span class="card-title">{{ $reg->modelo }}</span>
                </div>
            </div>
        </div>
        <div class="col s12 m8">
            <div class="row">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12 m5">
                                <span class="grey-text"><small>ano</small></span>
                                <span class="card-title">{{ $reg->ano }}</span>
                            </div>
                            <div class="col s12 m7">
                                <span class="grey-text"><small>Combustivel</small></span>
                                <span class="card-title">{{$reg->combustivel}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m4">
                                <span class="grey-text"><small>Cor</small></span>
                                <span class="card-title">{{$reg->cor}}</span>
                            </div>
                            <div class="col s12 m8">
                                    <span class="grey-text"><small>Preço</small></span>
                                    <span class="card-title green-text">{{$reg->preco}}</span>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="grey-text text-darken-1">Solicitar Test Drive</h5>
            <div class="row">
            <form action="{{ route('site.store') }}" method="POST" class="col s12">
                {{ csrf_field()}}
                <input type="text" name="carro_id" type="text" value="{{$reg->id}}" hidden >
                <div class="row">
                    <div class="input-field col s12">
                        <input id="nome" type="text" name="nome" class="validate">
                        <label for="nome">Nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">         
                        <input id="data" type="date" name="data" class="datepicker">
                        <label for="data">Data do teste</label>
                    </div>
                </div>
                <div class="row center-align">
                    <input class="btn btn-flat block" type="submit" value="enviar">
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
     $(document).ready(function(){
        $('.datepicker').datepicker();
    });
</script>