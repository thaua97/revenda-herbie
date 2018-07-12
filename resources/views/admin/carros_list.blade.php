@extends('adminlte::page')

@section('title', 'Cadastro de Carros')

@section('content_header')
    <h1>Cadastro de Carros
    <a href="{{ route('carros.create') }}"
       class="btn btn-primary pull-right" role="button">Novo</a>
    </h1>
@endsection

@section('content')

@if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
@endif

<table class="table table-striped">
  <tr>
    <th> id </th>
    <th> Modelo </th>
    <th> Marca </th>
    <th> Cor </th>
    <th> Ano </th>
    <th> Preço R$ </th>
    <th> Combustível </th>
    <th> Data Cad. </th>
    <th> Foto </th>
    <th> Ações </th>
    <th> Destaque </th> 
  </tr>
@forelse($carros as $c)
  <tr>
    <td> {{$c->id}} </td>
    <td> {{$c->modelo}} </td>
    <td> {{$c->marca->nome}} </td>
    <td> {{$c->cor}} </td>
    <td> {{$c->ano}} </td>
    <td> {{number_format($c->preco, 2, ',', '.')}} </td>
    <td> {{$c->combustivel}} </td>
    <td> {{date_format($c->created_at, 'd/m/Y')}} </td>
    <td>
      @if (Storage::exists($c->foto))
        <img src="{{url('storage/'.$c->foto)}}" alt="foto"
        style="width:80px; height:50px;">
      @else
        <img src="{{url('storage/fotos/nophoto.png')}}" alt="sem foto"
        style="width:80px; height:50px;">
      @endif
    </td>
    <td>
      
        <a href="{{route('carros.edit', $c->id)}}"
            class="btn btn-warning btn-sm" title="Alterar"
            role="button"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;       
        <form style="display: inline-block"
              method="post"
              action="{{route('carros.destroy', $c->id)}}"
              onsubmit="return confirm('Confirma Exclusão?')">
               {{method_field('delete')}}
               {{csrf_field()}}
              <button type="submit" title="Excluir"
                      class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
        </form>
    </td>
    <td>
        @if($c->destaque == "")          
        <a href="{{route('carros.destaque', $c->id)}}"
          class="btn btn-warning btn-sm" title="Destaque"
          role="button"><i class="far fa-star"></i></a> &nbsp;&nbsp;
        @else
            <a href="{{route('carros.destaque', $c->id)}}"
                class="btn btn-success btn-sm" title="Destaque"
                role="button"><i class="fa fa-star"></i></a> &nbsp;&nbsp;
        @endif 
    </td>
  </tr>
  @if ($loop->last)
    <tr>
      <td colspan=8> Soma dos preços dos veículos cadastrados R$:
        {{number_format($soma, 2, ',', '.')}} </td>
    </tr>
    <tr>
      <td colspan=8> Preço Médio dos veículos cadastrados R$:
        {{number_format($c->avg('preco'), 2, ',', '.')}} </td>
    </tr>
  @endif

@empty
  <tr><td colspan=8> Não há carros cadastrados ou filtro da pesquisa não
                     encontrou registros </td></tr>
@endforelse
</table>

{{ $carros->links() }}

@endsection

@section('js')
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@endsection
