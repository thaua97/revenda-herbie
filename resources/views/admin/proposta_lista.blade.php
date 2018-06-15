@extends('adminlte::page')

@section('title', 'Propostas')

@section('content_header')

  <a href="{{ route('propostas.index') }}" class="btn btn-primary pull-right" role="button">Voltar</a>

</h2>

@endsection

@section('content')
<div class="container">
<table class="table table-striped">
    <tr>
      <th> Id </th>
      <th> Nome </th>
      <th> CPF</th>
      <th> E-mail </th>
      <th> Data </th>
      <th> Ações </th>
    </tr>
  @forelse($propostas as $p)
    <tr>
      <td> {{$p->id}} </td>
      <td> {{$p->nome}} </td>
      <td> {{$p->cpf}} </td>
      <td> {{$p->email}} </td>
      <td> {{date_format($p->created_at, 'd/m/Y')}} </td>
      <td>
          <a href="{{route('propostas.show', $p->id)}}"
              class="btn btn-warning btn-sm" title="Vizualizar"
              role="button"><i class="fa fa-edit"></i></a> &nbsp;&nbsp;
              @if($p->destaque == "")          
              <a href="{{route('propostas.destaque', $p->id)}}"
                class="btn btn-default btn-sm" title="Destaque"
                role="button"><i class="fa fa-star"></i></a> &nbsp;&nbsp;
              @else
                  <a href="{{route('propostas.destaque', $p->id)}}"
                      class="btn btn-success btn-sm" title="Destaque"
                      role="button"><i class="fa fa-star"></i></a> &nbsp;&nbsp;
              @endif 
      </td>
    </tr>
  
  @empty
    <tr>
      <td class="center" colspan=8> Não há propostas cadastradas ou filtro da pesquisa não encontrou registros </td>
    </tr>
  @endforelse
  </table>
  
  {{ $propostas->links() }}
</div>

@endsection