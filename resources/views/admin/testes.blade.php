@extends('adminlte::page')

@section('title', 'Lista de Agendamentos')

@section('content_header')
    <h1>Lista de Agendamentos
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
          <th> Nome </th>
          <th> E-Mail </th>
          <th> Modelo </th>
          <th> Data </th>
        </tr>
      @forelse($carros as $c)
        <tr>
          <td> {{$c->modelo}} </td>
          <td> {{$c->marca->nome}} </td>
          <td> {{$c->cor}} </td>
          <td> {{$c->cor}} </td>
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
        <tr><td colspan=8> Não há Agendamenjtos cadastrados ou filtro da pesquisa não
                           encontrou registros </td></tr>
      @endforelse
      </table>
      
      {{ $carros->links() }}
      
      @endsection
      
      @section('js')
        <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
      @endsection
