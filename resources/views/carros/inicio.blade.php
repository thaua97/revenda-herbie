@extends('layouts.pub')
@section('page')
<home>
    <span slot="lista">
        <v-layout row>
            @foreach($carros as $c)
            <v-flex :key="n" sm4>
                <v-card>
                    <v-card-media 
                    src="{{url('storage/'.$c->foto)}}"
                    height="200px"
                    >
                        <v-container fluid fill-height>
                            <v-layout fill-height>
                                <v-flex xs12 align-end flexbox>
                                    <div class="headline white--text">
                                        {{$c->modelo}}
                                    </div>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-media>
                    <v-card-title>
                        <div>
                            <span class="grey--text">Marca: {{$c->marca['nome']}}</span><br>
                        <span>Ano: {{$c->ano}}</span><br>
                            <span>Combustivel: {{$c->combustivel}}</span>
                        </div>
                    </v-card-title>
                    <v-card-actions>
                    <v-btn outline block color="purple" href="{{route('site.show', $c->id)}}">Fazer Proposta</v-btn>
                    </v-card-actions>
                </v-card>
            </v-flex>    
            @endforeach
        </v-layout>
    </span>
</home>
@endsection   
