<h1>Revenda Herbie</h1>
<h2>Relatorio de Veículos Cadastrados</h2>

<table>
    <tr>
        <td>Modelo</td>
        <td>Ano</td>
        <td>Preço R$: </td>
    </tr>
    @foreach($carros as $c)
        <tr>
            <td>{{$c->modelo}}</td>
            <td>{{$c->ano}}</td>
            <td>{{number_format($c->preco, 2, ',', '.')}}</td>
        </tr>
    @endforeach    
</table>