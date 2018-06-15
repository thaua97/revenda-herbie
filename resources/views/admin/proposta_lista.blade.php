@extends('adminlte::page')

@section('title', 'Propostas')

@section('content_header')

@if ($acao==1)
<h2>Inclusão de Carros
@else ($acao ==2)
<h2>Alteração de Carros
@endif

  <a href="{{ route('carros.index') }}" class="btn btn-primary pull-right" role="button">Voltar</a>
</h2>

@endsection

@section('content')

<table class="table table-striped">
    <tr>
      <th> Nome </th>
      <th> CPF</th>
      <th> E-mail </th>
      <th> Ações </th>
    </tr>
  @forelse($propostas as $p)
    <tr>
      <td> {{$p->nome}} </td>
      <td> {{$p->cpf}} </td>
      <td> {{$c->email}} </td>
      <td> {{date_format($c->created_at, 'd/m/Y')}} </td>
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