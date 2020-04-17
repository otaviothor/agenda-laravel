@extends('template.app')

@section('content')

  <div class="row center">
    <ul class="pagination">
      @foreach (range('A', 'Z') as $letra)
        @if ($letra !== $criterio)
          <li class="waves-effect">
            <a href="{{ url("pessoas/{$letra}") }}">{{ $letra }}</a>
          </li>
        @endif
      @endforeach
    </ul>
  </div>

  <div class="row">
    <h3>Critério: {{ $criterio }}</h3>
  </div>

  <div class="row white-text">
    @if(sizeof($pessoas) == 0)
      <div class="col s12">
        <div class="card-panel teal z-depth-2">
          <h4>Nenhum registro encontrado</h4>
        </div>
      </div>
    @else
      @foreach($pessoas as $pessoa)
        <div class="col s12 m4 l3">
          <div class="card-panel teal z-depth-2">
            <h4>{{ $pessoa->nome }}</h4>
            @foreach($pessoa->telefones as $telefone)
              <p>({{ $telefone->ddd }}) {{ $telefone->telefone }}</p>
            @endforeach
            <p class="right-align">
              <a href="{{ url("/pessoas/{$pessoa->id}/editar") }}" class="white-text tooltipped" data-tooltip="Editar">
                <span class="material-icons">create</span>
              </a>
              <a href="{{ url("/pessoas/{$pessoa->id}/excluir") }}" class="white-text tooltipped" data-tooltip="Excluir">
                <span class="material-icons">delete</span>
              </a>
            </p>
          </div>
        </div>
      @endforeach
    @endif
  </div>
@endsection