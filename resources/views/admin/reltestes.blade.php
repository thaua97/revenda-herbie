
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <h1>Revenda Herbie</h1>
        <h2>Relatorio de Veículos Cadastrados</h2>

        <table>
            <tr>
                <td> Nome </td>
                <td> E-mail </td>
                <td> Modelo </td>
                <td> Data </td>
                <td> Id do veiculo </td>
            </tr>
            @foreach($testes as $t)
                <tr>
                    <td>{{$t->nome}}</td>
                    <td>{{$t->email}}</td>
                    <td>{{$t->modelo}}</td>
                    <td>{{$t->data}}</td>
                    <td>{{$t->carro_id}}</td>
                </tr>
            @endforeach    
        </table>

      <!--JavaScript at end of body for optimized loading-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    </body>
  </html>