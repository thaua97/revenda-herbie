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
          <th> Id do veiculo <th>
          <th> Data </th>
        </tr>
      @forelse($testes as $t)
        <tr>
          <td> {{$t->nome}} </td>
          <td> {{$t->email}} </td>
          <td> {{$t->modelo}}</td>
          <td> {{$t->carro_id}} </td>
          <td> {{$t->data}} </td>
        </tr>
      @empty
      <div class="container">
          <tr><td colspan=12> Não há Agendamentos cadastrados ou filtro da pesquisa não
              encontrou registros </td></tr>
      </div>
      @endforelse
      </table>

      @endsection
      
      @section('js')
        <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
      @endsection
